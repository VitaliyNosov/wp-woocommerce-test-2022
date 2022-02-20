document.addEventListener("DOMContentLoaded", function() {

var colorBlock = function(){

    $('.example').bcp();
    $('.example').on('pcb.refresh', function (e) {
      let color = $(this).bcp('color');
      if (color.value) {
          $(this).css({
              backgroundColor: color.value,
              borderColor: color.value,
              color: color.dark ? '#000' : '#000'
          });
      }
    });

}

colorBlock();


var select = function(){

    $('select.dropdown').each(function() {

        var dropdown = $('<div />').addClass('dropdown selectDropdown');
    
        $(this).wrap(dropdown);
    
        var label = $('<span />').text($(this).attr('placeholder')).insertAfter($(this));
        var list = $('<ul />');
    
        $(this).find('option').each(function() {
            list.append($('<li />').append($('<a />').text($(this).text())));
        });
    
        list.insertAfter($(this));
    
        if($(this).find('option:selected').length) {
            label.text($(this).find('option:selected').text());
            list.find('li:contains(' + $(this).find('option:selected').text() + ')').addClass('active');
            $(this).parent().addClass('filled');
        }
    
    });
    
    $(document).on('click touch', '.selectDropdown ul li a', function(e) {
        e.preventDefault();
        var dropdown = $(this).parent().parent().parent();
        var active = $(this).parent().hasClass('active');
        var label = active ? dropdown.find('select').attr('placeholder') : $(this).text();
    
        dropdown.find('option').prop('selected', false);
        dropdown.find('ul li').removeClass('active');
    
        dropdown.toggleClass('filled', !active);
        dropdown.children('span').text(label);
    
        if(!active) {
            dropdown.find('option:contains(' + $(this).text() + ')').prop('selected', true);
            $(this).parent().addClass('active');
        }
    
        dropdown.removeClass('open');
    });
    
    $('.dropdown > span').on('click touch', function(e) {
        var self = $(this).parent();
        self.toggleClass('open');
    });
    
    $(document).on('click touch', function(e) {
        var dropdown = $('.dropdown');
        if(dropdown !== e.target && !dropdown.has(e.target).length) {
            dropdown.removeClass('open');
        }
    });
    
    // light
    $('.switch input').on('change', function(e) {
        $('.dropdown, body').toggleClass('light', $(this).is(':checked'));
    });

}

select();


// Использует "updated_cart_totals" что бы скрипт
// работал после удаления товара

$( document.body ).on( 'updated_cart_totals', function(){
    select();
    console.log('Удаленеи товара');
    colorBlock();
});



});


$(function($) {
	
	//=============================================================================
	//  yith wishlist counter
	//=============================================================================

	function getCookie(name) {
	    var dc = document.cookie;
	    var prefix = name + "=";
	    var begin = dc.indexOf("; " + prefix);
	    if (begin == -1) {
	        begin = dc.indexOf(prefix);
	        if (begin != 0) return null;
	    }
	    else
	    {
	        begin += 2;
	        var end = document.cookie.indexOf(";", begin);
	        if (end == -1) {
	        end = dc.length;
	        }
	    }
	    // because unescape has been deprecated, replaced with decodeURI
	    //return unescape(dc.substring(begin + prefix.length, end));
	    return decodeURIComponent(decodeURIComponent((dc.substring(begin + prefix.length, end))));
	}

	if ($('.wishlist_items_number').length ) {


		var wishlistCounter = 0;

		/*
		**	Check for Yith cookie
		*/
		var wlCookie = getCookie("yith_wcwl_products");

		if ( wlCookie != null ) {
            wlCookie = wlCookie.slice(0, wlCookie.indexOf(']') + 1);
			var products = JSON.parse(wlCookie);
			wishlistCounter =  Object.keys(products).length;
		} else 	{
			wishlistCounter = Number($('.wishlist_items_number').html());
		}

		/*
		**	Increment counter on add
		*/
		$('body').on( 'added_to_wishlist' , function(){
			wishlistCounter++;
			getbowtied_update_wishlist_count(wishlistCounter);
		});

		/*
		**	Decrement counter on remove
		*/
		$('body').on( 'removed_from_wishlist' , function(){
			wishlistCounter--;
			getbowtied_update_wishlist_count(wishlistCounter);
		});

		function getbowtied_update_wishlist_count(count) {
			if ( ( typeof count === "number" && isFinite(count) && Math.floor(count) === count ) && count >=0 ) {
				$('.wishlist_items_number').html(count);
			} 
		}

		getbowtied_update_wishlist_count(wishlistCounter);

	}

	//=============================================================================
	//  END yith wishlist counter
	//=============================================================================

});






