$(document).ready(function(){
   

    window.onresize = function (event) {
      changeScreen();
    }
    changeScreen();

    function changeScreen(){
        screenHeight = window.innerHeight;
        if(window.fullScreen || screen.width == 768 || window.innerWidth > 2500){
          screenHeight = screen.height;
        }
        
        $('.admincontent > section').eq(0).css('height',(screenHeight)+'px');
        $('.admincontent > section > div > div:nth-of-type(1)').eq(0).css('height',(screenHeight)+'px');
        $('.admincontent > section > div > div:nth-of-type(2)').eq(0).css('height',(screenHeight)+'px');
    }
});