$(document).ready(function(){
  $("#formLogin").validetta({
    bubblePosition: 'bottom',
      bubbleGapTop: 10,
      bubbleGapLeft: -5,
      onValid:function(e){
        e.preventDefault(); //Cancelar el submit
        $.ajax({
          url:"./php/login_AX.php",
          method:"POST",
          data:$("#formLogin").serialize(),
          cache:false,
          success:function(respAX){
            let AX = JSON.parse(respAX);
            $.alert({
              title:"CBTIS dice:",
              content:"<h5 class='blue-text'>"+AX.msj+"</h5>",
              theme:"supervan",
              onDestroy:function(){
                if(AX.cod == 1){
                  window.location.href = "./php/alumno.php";
                }
              }
            });
          }
        });
      }
  });
});