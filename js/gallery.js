/* JavaScript Document */


jQuery(document).ready(function(){
    /* Alerta para testar se o jQuery esta a carregar */
//    alert('O Script esta a carregar !');           
    
    jQuery('.gallery a').each(function(){        
//        var captionText = jQuery(this).parent().find('span').html();        
//        jQuery(this).attr({'data-lightbox':'slideshow','title':captionText});
        jQuery(this).attr('data-lightbox','slideshow');
    });    
    
})


