$(document).ready(function(){
	
	$('#q').autocomplete({
	    source: '../../system/engines/root_search/instant/instant',
	    minLength: 1,
	    select: function(event, ui) {
	        var url = ui.item.id;
	        if (url != '#') {
	            location.href = url
	        }
	    },
	    open: function(event, ui) {
	        $(".ui-autocomplete").css("z-index", 1000)
	    }
	})
	
});