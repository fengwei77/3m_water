$(function(){
	$('.accordion-cell').click(function (){

  		if ($(this).hasClass('collapsed'))
  		{
  			$(this).removeClass('collapsed');
  			$(this).siblings().removeClass('expanded');
   			$(this).addClass('expanded');
    		$(this).siblings().addClass('collapsed');

        $(this).addClass('detail-open');
        $(this).siblings().removeClass('detail-open');

        $(this).children('img.candidate-pset').hide();
  		}
  	});
});