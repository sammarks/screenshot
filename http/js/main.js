var visible = false;

// debulked onresize handler
function on_resize(c, t) {
	onresize = function () {
		if (visible) {
			visible = false;
			$('img').addClass('hidden');
		}
		clearTimeout(t);
		t = setTimeout(c, 300);
	};
	return c;
}

function rebuildDimensions() {

	var width = -1 * ($('img').width() / 2);
	var height = -1 * ($('img').height() / 2);

	$('img').css({
		'margin-top': height,
		'margin-left': width
	});

	if (!visible) {
		visible = true;
		$('img').removeClass('hidden');
	}

}

(function ($) {
	$(function () {

		on_resize(rebuildDimensions);
		$('img').load(function() {
			rebuildDimensions();
		});

	});
})(jQuery);
