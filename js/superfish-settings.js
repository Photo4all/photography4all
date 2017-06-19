/**
 * File superfish-settings.js.
 * O superfish permite usar as keys do tecnado para o menu drop
 * a tag menu é a nav-menu
 * atrasa no menu para evitar que por acidente saia do menu
 */

jQuery(document).ready(function($){
	var breakpoint = 600;
    var sf = $('ul.clearfix');// a variavel sf guarda o unordered list de de todo o menu
	
    if($(document).width() >= breakpoint){
        sf.superfish({  //  neste item tem um atraso de 200 e corre rapido
            delay: 200,
            speed: 'fast'
        });
    }
	
    $(window).resize(function(){
        if($(document).width() >= breakpoint & !sf.hasClass('sf-js-enabled')){
            sf.superfish({
                delay: 200,
                speed: 'fast'
            });
        } else if($(document).width() < breakpoint) {
            sf.superfish('destroy');
        }
    });
});
   