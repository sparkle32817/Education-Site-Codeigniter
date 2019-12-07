var items = $(".list-wrapper .list-item");
var numItems = items.length;
var perPage = 4;
items.slice(perPage).hide();
$('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    onPageClick: function(pageNumber) {
        var showFrom = perPage * (pageNumber - 1);
        var showTo = showFrom + perPage;
        items.hide().slice(showFrom, showTo).show();
    }
});
var items1 = $(".list-wrapper1 .list-item1");
	var numItems = items1.length;
	var perPage = 4;
	items1.slice(perPage).hide();
	$('#pagination-container-on').pagination({
	    items: numItems,
	    itemsOnPage: perPage,
	    prevText: "&laquo;",
	    nextText: "&raquo;",
	    onPageClick: function(pageNumber) {
	        var showFrom = perPage * (pageNumber - 1);
	        var showTo = showFrom + perPage;
	        items1.hide().slice(showFrom, showTo).show();
    }
});
