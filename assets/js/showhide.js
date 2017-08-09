// script source: https://stackoverflow.com/a/32618268

$(function() { // encapsulate your code into a function and pass it to jQuery
	$(".hiddenInput").hide();
	$(".showHideCheck").on("change", function() {
		$this = $(this);
		$input = $this.parent().find(".hiddenInput");
		if ($this.is(":checked")) {
			$input.slideDown();
		} else {
			$input.slideUp();
		}
	});
});