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
				console.log(data);
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
				console.log(data);
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
			obj = JSON.parse(data);
			if (obj['response']['code'] == 2) {
				window.location = "/login";
			}
				console.log(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {}
		});
	});
	
	
});