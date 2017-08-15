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

$(function() { // encapsulate your code into a function and pass it to jQuery
	$(".hiddenInput_ebook").hide();
	$(".showHideCheck_ebook").on("change", function() {
		$this = $(this);
		$input = $this.parent().find(".hiddenInput_ebook");
		if ($this.is(":checked")) {
			$input.slideDown();
		} else {
			$input.slideUp();
		}
	});
});
