$(document).ready(function(){
  var rango = [2020,2020];
  $('.datepicker').datepicker({
    format:"yyyy-mm-dd",
    autoClose:true,
    minDate:new Date(2020,0,1),
    maxDate:new Date(2020,11,31),
    yearRange:rango,
    i18n:{
      months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
      monthsShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
      weekdays:["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
      weekdaysShort:["Dom","Lun","Mar","Mie","Jue","Vie","Sab"],
      weekdaysAbbrev:["D","L","M","M","J","V","S"]
    }
  });

  $("#formRegistro").validetta({
    bubblePosition: 'bottom',
      bubbleGapTop: 10,
      bubbleGapLeft: -5,
      onValid:function(e){
        e.preventDefault(); //Cancelar el submit
        let boleta = $("#boleta").val();
        let nombre = $("#nombre").val();
        let correo = $("#correo").val();
        let fechaNac = $("#fechaNac").val();
        let contrasena = $("#contrasena").val();
        $.ajax({
          url:"./php/index_AX.php",
          method:"POST",
          data:{boleta:boleta, nombre:nombre, correo:correo, fechaNac:fechaNac, contrasena:contrasena},
          cache:false,
          success:function(respAX){
            let AX = JSON.parse(respAX);
            $.alert({
              title:"TWeb 2021-1",
              content:"<h5 class='blue-text'>"+AX.msj+"</h5>",
              theme:"supervan",
              onDestroy:function(){
                if(AX.cod == 1){
                  location.reload();
                }
              }
            });
          }
        });
      }
  });
});