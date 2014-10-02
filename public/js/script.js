function togglePrint(el) {
 var items = $(el).closest(".mash_item").find(".row").not(":first");
 $(el).val() == 2 ? items.slideDown() : items.slideUp();
}

$(function () {
      $('ul#sideMenu ul').each(function(index, el) {
        var a = $(this).prev();
		if (a.attr('name') == 'expanded'){
			a.addClass('expanded').click(function() {
		  $(el).slideToggle(200, function () {
		  a.toggleClass('expanded collapsed');
		  a.removeAttr('name');
		});
	  return false;
	});
			
		} else {
		a.addClass('collapsed').click(function() {
		  $(el).slideToggle(200, function () {
		  a.toggleClass('collapsed expanded');
		});
	  return false;
	});
  }
})
})

