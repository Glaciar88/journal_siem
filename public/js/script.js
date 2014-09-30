function togglePrint(el) {
 var items = $(el).closest(".mash_item").find(".row").not(":first");
 $(el).val() == 2 ? items.slideDown() : items.slideUp();
}

$(function () {
      $('ul#sideMenu ul').each(function(index, el) {
        var a = $(this).prev();
        a.addClass('collapsed').click(function() {
          $(el).slideToggle(200, function () {
          a.toggleClass('collapsed expanded');
        });
      return false;
    });
  });
})

