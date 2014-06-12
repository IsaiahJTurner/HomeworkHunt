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
});