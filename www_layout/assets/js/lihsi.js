/**
*
* @authors Your Name (you@example.org)
* @date    2017-09-06 16:28:10
* @version $Id$
*/
// if the image in the window of browser when the page is loaded, show that image
var orangeWidth = $(window).width();
var currentWidth = $(window).width();

$(document).ready(function() {
    resetMobileMenu();
    showWidth();
    $('#test-width').hide();
});

$(window).resize(function() {

    currentWidth = $(window).width();

    if(orangeWidth!=currentWidth)
    {
        resetMobileMenu();
    }

    showWidth();
});

$(window).scroll(function() {
});

$(function(){

    $('header .switch span').click(function(){
        if($(this).hasClass("ti-menu"))
        {
            $('nav').show();
            $(this).removeClass("ti-menu");
            $(this).addClass("ti-close");
        }
        else
        {
            $('nav').hide();
            $(this).addClass("ti-menu");
            $(this).removeClass("ti-close");
        }
    });
});

function gotop(){
    $("html,body").animate({scrollTop:0},1000,"easeOutExpo");
    return false;
}

function resetMobileMenu()
{
    $('header .switch span').addClass("ti-menu");
    $('header .switch span').removeClass("ti-close");
    
    if(currentWidth > 960) {
        $('nav').show();
    }
    else
    {
        $('nav').hide();
    }
}

//image over change image
var sourceSwap = function () {
    var $this = $(this);
    var newSource = $this.data('alt-src');
    $this.data('alt-src', $this.attr('src'));
    $this.attr('src', newSource);
}

$(function() {
    $('img[data-alt-src]').each(function() { 
        new Image().src = $(this).data('alt-src'); 
    }).hover(sourceSwap, sourceSwap); 
});

function showWidth()
{
    currentWidth = $(window).width();
    currentHeight = $(window).height()

    $("#test-width").text(currentWidth+"-"+currentHeight);
}

function closeMask(a, b)
{
    $('.'+a).hide();

    if(b!="")
    {
        $('.'+b).show();
    }
}