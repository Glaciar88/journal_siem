function togglePrint(el) {
 var items = $(el).closest(".mash_item").find(".row").not(":first");
 $(el).val() == 2 ? items.slideDown() : items.slideUp();
}