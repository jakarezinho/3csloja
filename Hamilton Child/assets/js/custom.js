jQuery( document ).ready( function( $ ) {
	$('#quero').on('click', function(){

		$('#encomendar').slideToggle("slow");
	})
	$('#top').on('click', function(){

		$('#encomendar').slideToggle("slow");
	})
	

function menu_toggle (){
		$('#top_content').slideToggle("slow");
}

	$('#boton_top').on('click', function(){
		menu_toggle ();

	})

	$('#close').on('click', function(){
		menu_toggle ();

	})


});

document.addEventListener('DOMContentLoaded', function() {
  window.onscroll = function(ev) {
    document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
	  console.log(ev)
  };
});