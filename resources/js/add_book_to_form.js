paypal.minicart.render({
    action: '#'
});

if (~window.location.search.indexOf('reset=true')) {
    paypal.minicart.reset();
}

$(document).ready(function() {						
    $().UItoTop({ easingType: 'easeOutQuart' });								
});

addEventListener("load", function() 
{ 
    setTimeout(hideURLbar, 0); 
}, false);

function hideURLbar()
{ 
    window.scrollTo(0,1); 
} 

$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	    type: 'default', //Types: default, vertical, accordion           
	    width: 'auto', //auto or any width like 600px
	    fit: true,   // 100% fit in a container
	    closed: 'accordion', // Start closed if in accordion view
	    activate: function(event) { // Callback function if tab is switched
	        var $tab = $(this);
	        var $info = $('#tabInfo');
        	var $name = $('span', $info);
	        $name.text($tab.text());
	        $info.show();
	    }
    });
    
	$('#verticalTab').easyResponsiveTabs({
	    type: 'vertical',
	    width: 'auto',
	    fit: true
	});
});

jQuery(document).ready(function($) {
    $(".scroll").click(function(event){		
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
});
