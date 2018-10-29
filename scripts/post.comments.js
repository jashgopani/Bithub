$(document).ready(function() {
	$(".toggle-Comment").click(function() {
		var x = $(this).attr("data-togId");
		$(".commentBox").not("#commentBox" + x).slideUp("fast");
		$("#commentBox" + x).slideToggle("fast");
		$("#commentInput" + x).focus();
	});
});