$(document).ready(function() {
	var data = localStorage.getItem('list');
	var dataId = localStorage.getItem('listId');
	var list = [];
	var listId = [];

	if (data) {
		list = JSON.parse(data);
		for (let i of list) {
			$(`.add-book[data-id=${i.id}]`).attr('disabled', 'disabled');
		}
	}

	if (dataId) {
		listId = dataId.split(',');
	}

	$('.add-book-div').each(function() {
		var context = $(this);

		context.find('button').click(function() {
			toastr.success('Add book to form success');
			var bookData = {};
			$(this).attr('disabled', 'disabled');
			bookData.id = $(this).data('id');
			bookData.title = context.find('.book-name').html();
			bookData.image = context.find('img').attr('src');
			list.push(bookData);
			listId = list.map(x => x.id);
			localStorage.setItem('list', JSON.stringify(list));
			localStorage.setItem('listId', listId);
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
			listId = list.map(x => x.id);
			localStorage.setItem('list', JSON.stringify(list));
			localStorage.setItem('listId', listId);
		})  
	})    

	$('.log-out, #send').click(function() {
		localStorage.removeItem('list');
		localStorage.removeItem('listId');
	})

	$(function() {
		$('.list-selected-books').html('');
		for (let i of list) {
			$('.list-selected-books').append(`
				<div class="col-md-3 product-men add-book-div">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="${i.image}" alt="" class="pro-image-front">
							<img src="${i.image}" alt="" class="pro-image-back">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="/books/${i.id}" class="link-product-add-cart">QUICK VIEW</a>
								</div>
							</div>
						</div>

						<div class="item-info-product">
							<h4><a class="book-name" href="/books/${i.id}">${i.title}</a></h4>

							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
								<button class="add-book" disabled data-id="${i.id}">
									ADD TO FORM
								</button>
							</div>
						</div>
					</div>
				</div>
			`)
		}
	})

	$('.number_of_borrow_books').append(`
		<input type="text" name="number_of_borrow_books" disabled value="${Object.keys(list).length}">
		<label class="top-label">Number of borrow books</label>
		<span></span>
	`)

	$('.display-none').append(`
		<input type="text" name="book_id" value="${listId}">
	`)

	$(function () {
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

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
