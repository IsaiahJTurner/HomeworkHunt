$(document).ready(function() {
	$('#upvote').click(function(evt) {
		$.ajax({
			url: "/api/vote",
			type: "POST",
			data: {
				isUpvote: true
			},
			success: function(data, textStatus, jqXHR) {
				console.log("Upvoted");
			},
			error: function(jqXHR, textStatus, errorThrown) {}
		});
	});
});