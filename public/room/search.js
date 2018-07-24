function inWidth(){
    document.querySelector('html').style.fontSize=window.innerWidth/10.80+'px';
}
inWidth();

 $('.card-bottom').click(function(){
     $('.card-display').hide(function(){
         $('#main').css({'height':'auto'});
         return 1000;
     });
     $('.result-display').show(1000);

 });

 if(document.getElementsByClassName('message1').length===0){
     $('.kong').show(600);
 }