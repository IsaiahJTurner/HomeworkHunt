$(document).ready(function() {
	var upvoteActive = false;
	var downvoteActive = false;
	$('#upvote').click(function(evt) {
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
		$('#downvote').removeClass('btn-danger');
		$('#downvote').css("background-color", "");
		$(this).addClass('btn-success');
		$(this).css("background-color", "#47a447");
	});
	$('#upvote').hover(

	function() {
		if (upvoteActive == false) {
			$(this).addClass('btn-success');
		}
	}, function() {
		if (upvoteActive == false) {
			$(this).removeClass('btn-success');
		}
	});
	$('#downvote').click(function(evt) {
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
		$('#upvote').removeClass('btn-success');
		$('#upvote').css("background-color", "");
		$(this).addClass('btn-danger');
		$(this).css("background-color", "#d2322d");
	});
	
	
	
	
	
	$('#downvote').hover(

	function() {
		if (downvoteActive == false) {
			$(this).addClass('btn-danger');
		}
	}, function() {
		if (downvoteActive == false) {
			$(this).removeClass('btn-danger');
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
						content: "Please click the button below to log in. You may then return to this page to download the file.<br><br><a style='width:100%' href='/login' class='btn btn-sm btn-primary' target='_blank'>Log in</a>"
					}).popover("show");
				}
				if (data['response']['code'] == 3) {
					alert("A download link could not be generated because this homework does not exist.");
				}
				if (data['response']['code'] == 1) {
					window.location.href = data['response']['message'];
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {}
		});
	});
	
	
	
	
	
	
	var timer;
	$("#search").bind("change paste keyup", function() {
		$('#status').html("Loading results...");
		clearTimeout(timer);
		var ms = 750; // milliseconds
		var val = $(this).val();
		if (val == "") {
			location.get = "";
			$(document).attr('title', "Search");
		} else {
			location.get = "q=" + val;
			$(document).attr('title', val);
		}
		timer = setTimeout(function() {
			if (val.length > 2) {
				updateSearchResults(val);
			} else {
				$('#status').html("No matching results found.");
			}
		}, ms);
	});
	$( "#search" ).trigger( "change" );
});

function updateSearchResults(q) {
	var optionsArray = {
		'query': q,
		'hitsPerPage': 2,
		'getRankingInfo': 1
	};
	var options = new Array();
	for (key in optionsArray) {
		options.push(key + '=' + optionsArray[key]);
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
				$('#status').html("No matching results found.");
			} else {
				$('#status').html(data['nbHits'] + " results found.");
				var html;
				for (var i=0; i<data['hits'].length; i++) {
				var hit = data['hits'][i];
				console.log(hit);
					html += "<tr><td><a href='/hw/'" + hit['objectID'] + ">" + hit['title'] + "</a><p>" + hit['_snippetResult']['content']['value'] + "</p></td></tr>";
				}
				$('#results').html(html);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {}
	});
}