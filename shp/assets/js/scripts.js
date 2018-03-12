
$(document).ready(function(){
	
	$(function(){

    $(".dropdown-menu.dropdown-menu1").on('click', 'li a', function(){
     $(this).parents('ul').parents(".btn-group.btn-group1").children(".btn.dropdown-toggle").text($(this).text());
     $(this).parents('ul').parents(".btn-group.btn-group1").children(".btn.dropdown-toggle").val($(this).text());
	 var id = $(this).attr('id');
	var data_insert_to =  $(this).parents('ul').parents(".btn-group.btn-group1").children(".btn.dropdown-toggle").attr('data-inserted-to');
	 $('#'+data_insert_to).val(id);
	 
   });

});
$('.navbar-toggle').click(function() {
 if ($(this).hasClass("navBtnActive") ) 
 {
  $( "#bs-navbar" ).animate({ left: "-300px"}, 500 );
  $( "#bs-navbar" ).removeClass('navShadow');
  $(this).removeClass('navBtnActive');
 } 
 else 
 {
  $( "#bs-navbar" ).animate({ left: "0" }, 500 );
  $( "#bs-navbar" ).addClass('navShadow');
  $(this).addClass('navBtnActive');
 } 
});
});
