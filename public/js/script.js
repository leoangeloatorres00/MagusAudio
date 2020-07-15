$(document).ready(function(){
    window.onresize = function (event) {
      changeScreen();
    }
    changeScreen();

    $(window).scroll(function() {
      var height = $(this).scrollTop();
      var backgroundColor = 'white';
      if(checkRoute() != 'premium'){
        backgroundColor = 'transparent';
        if(height > 200) {
            backgroundColor = 'rgba(255,255,255, 0.8)';
        }
      }
      $('.navbar').css('background',backgroundColor);
    });
});

function checkRoute(){
  var url = $(location).attr("href");
  var route = url.substr(url.lastIndexOf('/') + 1);
  return route;
}

$("[data-trigger]").on("click", function(){
  var trigger_id =  $(this).attr('data-trigger');
  if(!$(trigger_id).hasClass('show')){
    $(trigger_id).toggleClass("show");
  }
});

$(document).on('click',function (event) {
  ($(event.target).closest(".navbar").length || 
  $(".navbar-collapse.show").length 
  && $(".navbar-collapse.show").collapse("hide"))
});
      
$(document).on('keydown', function(event) {
  if(event.keyCode === 27) $(".navbar-collapse").removeClass("show"); 
});

$(".btn-close").click(function(e){
  $(".navbar-collapse").removeClass("show");
});

$('.btnLogin').on('click',function(){
  changeHomeContent();
  $('.login > .row:nth-of-type(3)').removeClass('d-none');
});

$('.btnSignup').on('click',function(){
  changeHomeContent();
  $('.login > .row:nth-of-type(1)').removeClass('d-none');
});

$('.backsignup').on('click',function(){
  changeHomeContent();
  $('.login > .row:nth-of-type(1)').removeClass('d-none');
});

$('.btnSignupwithemail').on('click',function(){
  changeHomeContent();
  $('.login > .row:nth-of-type(2)').removeClass('d-none');
})

function changeHomeContent(){
  if(checkRoute() == 'science' || checkRoute() == 'premium'){
    $('#exampleModal').modal('show');
  }

  if(!$('.main-s1').hasClass('d-none')){
    $('.main-s1').addClass('d-none');
  }

  $('.login > .row.h-100').each(function(i, obj) {
    if(! $('.login > .row.h-100').eq(i).hasClass('d-none')){
      $('.login > .row.h-100').eq(i).addClass('d-none');
    }
  });
}

function changeScreen(){
    screenHeight = window.innerHeight;
    if(window.fullScreen || screen.width == 768 || window.innerWidth > 2500){
      screenHeight = screen.height;
    }

    $('.main section').eq(0).css('height',(screenHeight)+'px');
    $('.main section').eq(1).css('height',(screenHeight*0.60)+'px');
    $('.main section').eq(3).css('height',(screenHeight*0.40)+'px');

    $('.science section').eq(0).css('height',(screenHeight)+'px');
    
    premium_adjustment = 1;
    if(screen.width <= 500){
      premium_adjustment = 1.2;
    }
    $('.premium section').eq(0).css('height',(screenHeight*premium_adjustment)+'px');
    $('.premium .carousel-item').css('height',(screenHeight*premium_adjustment)+'px');

    if(checkRoute() == 'science'){
      S3scienceTop = $('.science section:nth-of-type(3)').position().top;
      
      $('.science .image > .frequency').css('width', $('.footer-container').css('width'));
      $('.science .image > .frequency').css('top', S3scienceTop - 220);
    }
    
    $('.navbar').css('width', $('.footer-container').css('width'));
}