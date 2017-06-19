/* JavaScript Document */

jQuery(document).ready(function($) {

// 8.1 - RWD Menus (How to Create a Responsive Navigation)                  
// alert ('Ficheiro menu.js com o script esta a funcionar !!!');
                    
			var pull 		= $('#pull');
				menu 		= $('#mainNav ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
                
jQuery(document).ready(function($) {
    // irá obter o URL completo na barra de endereços
    var url = window.location.href; 

    // percorre cada "a" tag 
    $("#mainNav a").each(function() {
            // verifica se é o mesmo na barra de endereços
        if(url == (this.href)) { 
            $(this).closest("li").addClass("active");
        }
    });
});