$(document).ready(function() {
	var data = localStorage.getItem('list');
	var list = [];

	if (data) {
		list = JSON.parse(data);
		console.log(list)
		for (let i of list) {
			$(`.add-book[data-id=${i.id}]`).attr('disabled', 'disabled');
		}
	}

	$('.add-book-div').each(function() {
		var context = $(this);

		context.find('button').click(function() {
			toastr.success('Add book to form success');
			var bookData = {};
			$(this).attr('disabled', 'disabled');
			bookData.id = $(this).data('id');
			bookData.title = context.find('a').html();
			list.push(bookData);
			localStorage.setItem('list', JSON.stringify(list));
		})
	})
	
	$('.chooseBooks').click(function() {
		$('.listBooks').html('');
		for (let i of list) {
			$('.listBooks').append(`
				<p class="list-group-item delete-book" id="${i.id}">
					<span> 
						<a href="/books/${i.id}">
							${i.title}
						</a>
					</span>
					<span class="badge badge-danger">
						<button class="glyphicon glyphicon-remove deleteBook" data-id="${i.id}"></>
					</span> 
				</p> 
			`)
		}

		$('.deleteBook').click(function() {
			toastr.success('Remove book from form success');
			id = $(this).data('id');
			var book = document.getElementById(id);
			book.remove();
			list.splice(list.findIndex(item => item.id === id), 1);
			localStorage.setItem('list', JSON.stringify(list));
		})  
	})    

	$(function () {
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

		$('[data-mask]').inputmask()
	
		$('#reservationdate').datetimepicker({
			format: 'L'
		});

		$('#reservation').daterangepicker()

		$('#reservationtime').daterangepicker({
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
			format: 'MM/DD/YYYY hh:mm A'
			}
		})   
	})
})

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

$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});
