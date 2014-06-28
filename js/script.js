var searchArgs = {
			'query': "",
			'hitsPerPage': 2,
			'getRankingInfo': 1
		}
$(document).ready(function() {
	downvoteActive = false;
	upvoteActive = false;
	if ($('#upvote').hasClass("btn-primary")) {
		$('#upvote').css("background-color", "#17C3B9");
		upvoteActive = true;
	}
	if ($('#downvote').hasClass("btn-primary")) {
		$('#downvote').css("background-color", "#17C3B9");
		downvoteActive = true;
	}
	$('#upvote').click(function(evt) {
		if (upvoteActive) {
			return;
		}
		if (downvoteActive) {
			$("#rating").html(parseInt($("#rating").html()) + 2);
		} else {
			$("#rating").html(parseInt($("#rating").html()) + 1);
		}
		upvoteActive = true;
		downvoteActive = false;
		var hw = $("#postid").val();
		$.ajax({
			url: "/api/vote",
			type: "POST",
			data: {
				isUpvote: true,
				hw: hw
			},
			success: function(data, textStatus, jqXHR) {
				obj = JSON.parse(data);
				if (obj['response']['code'] == 2) {
					window.location = "/login";
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {}
		});
		$('#downvote').removeClass('btn-primary');
		$('#downvote').css("background-color", "");
		$(this).addClass('btn-primary');
		$(this).css("background-color", "#17C3B9");
	});
	$('#upvote').hover(

	function() {
		if (upvoteActive == false) {
			$(this).addClass('btn-primary');
		}
	}, function() {
		if (upvoteActive == false) {
			$(this).removeClass('btn-primary');
		}
	});
	$('#downvote').click(function(evt) {
		if (downvoteActive) {
			return;
		}
		if (upvoteActive) {
			$("#rating").html(parseInt($("#rating").html()) - 2);
		} else {
			$("#rating").html(parseInt($("#rating").html()) - 1);
		}
		downvoteActive = true;
		upvoteActive = false;
		var hw = $("#postid").val();
		$.ajax({
			url: "/api/vote",
			type: "POST",
			data: {
				isUpvote: false,
				hw: hw
			},
			success: function(data, textStatus, jqXHR) {
				obj = JSON.parse(data);
				if (obj['response']['code'] == 2) {
					window.location = "/login";
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {}
		});
		$('#upvote').removeClass('btn-primary');
		$('#upvote').css("background-color", "");
		$(this).addClass('btn-primary');
		$(this).css("background-color", "#17C3B9");
	});
	$('#downvote').hover(

	function() {
		if (downvoteActive == false) {
			$(this).addClass('btn-primary');
		}
	}, function() {
		if (downvoteActive == false) {
			$(this).removeClass('btn-primary');
		}
	});
	$('#download').click(function(evt) {
		var hw = $("#postid").val();
		$.ajax({
			url: "/api/download",
			type: "POST",
			data: {
				hw: hw
			},
			success: function(data, textStatus, jqXHR) {
				if (data['response']['code'] == 2) {
					$('#download').popover({
						html: true,
						title: "Login Required",
						placement: 'top',
						content: "Please click the button below to log in. You may then return to this page to download the file for <strong>free</strong>.<br><br><a id='login' style='width:100%' href='/login' class='btn btn-sm btn-primary' target='_blank'>Log in</a>"
					}).popover("show");
					$('#login').click(function() {
						$('#download').popover("hide");
					});
				}
				if (data['response']['code'] == 3) {
					alert("A download link could not be generated because this homework does not exist.");
				}
				if (data['response']['code'] == 1) {
					window.location.href = data['response']['message'];
					setTimeout(function() {
						window.location.reload();
					}, 1000);
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {}
		});
	});
	var timer;
	var lastQuery;
	$("#search").bind("change paste keyup", function() {
		var val = $(this).val();
		if (lastQuery == val) {
			return;
		}
		clearTimeout(timer);
		var ms = 750; // milliseconds
		if (val == "") {
			location.get = "";
			$(document).attr('title', "Search");
		} else {
			location.get = "q=" + val;
			$(document).attr('title', val);
		}
		timer = setTimeout(function() {
			if (lastQuery == val) {
				return;
			} else if (val.length > 2) {
				$('#status').html("Loading results...");
				searchArgs.query = val;
				updateSearchResults();
			} else {
				$('#status').html("<h2>Oops!</h2><h4>You must enter at least three charecters to search.</h4>");
			}
		}, ms);
	});
	$("#search").trigger("change");
	$('#filter-type').dropdown();
	$("input[name='filter-type']").change(function() {
		searchArgs.numericFilters = "type=" + $(this).val().toString();
		updateSearchResults();
	});
});
$(document).ready(updateFullHeightSections);
$(window).on('resize', updateFullHeightSections);

function updateFullHeightSections() {
	var height = $(window).height() - 54;
	$('.fullHeight').css('min-height', height + 'px');
}

function updateSearchResults() {
	lastQuery = searchArgs.query;
	var options = new Array();
	for (key in searchArgs) {
		options.push(key + '=' + searchArgs[key]);
	}
	var optionsString = options.join('&');
	$.ajax({
		url: "https://D35BVK4GKY.algolia.io/1/indexes/Homework Hunt/query",
		type: "POST",
		headers: {
			"X-Algolia-API-Key": "9beee9c6119a7380a2827db0cf8b5f2e",
			"X-Algolia-Application-Id": "D35BVK4GKY"
		},
		data: JSON.stringify({
			"params": optionsString
		}),
		success: function(data, textStatus, jqXHR) {
			if (data['nbHits'] == 0) {
				$('#status').html("<h2>Sorry!</h2><h4>No matching results were found for " + data['query'] + ".</h4>");
			} else {
				if (data['page'] == 0) {
					data['page'] = 1;
				}
				var pluralResults;
				if (data['nbHits'] > 1) {
					pluralResults = "s";
				} else {
					pluralResults = "";
				}
				$('#status').html("Page " + data['page'] + " of " + data['nbPages'] + " for " + data['nbHits'] + " result" + pluralResults + " found.");
				var html;
				for (var i = 0; i < data['hits'].length; i++) {
					var hit = data['hits'][i];
					console.log(hit);
					html += "<tr><td><a href='/hw/" + hit['objectID'] + "'>" + hit['title'] + "</a><p>" + hit['_snippetResult']['content']['value'] + "</p></td></tr>";
				}
				$('#results').html(html);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {}
	});
}
