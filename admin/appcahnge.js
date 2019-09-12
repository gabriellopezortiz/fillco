$(document).ready(function(){//Aqui se encierra todos los metod que quiero call in jquery
    console.log("Jquery esta funcionando ingeniero Duarte tranquilo fino"); 
    
/*Lo primero es declarar la variable que me va captuarar el arreglo fuera de la funcion*/
var arregloJavascript;
var control;
var valorcualquiera="578";

var grwreg= "";

var gggg = "";

var contadorVeces=0;
var esPositivoddd = "";



    $('#cod_malla').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });


    $('#pilas').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });

    $('#numero_tallos').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });

    $('#grado').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });

    $('#cod_bloque').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });


 


    $('#pilas').blur(function(){
        console.log("Aqui se va a activar el envio de la informacion.");
        var pilas = $('#pilas').val();
        console.log("este es el valor del codigo a mostrar."+pilas);

            $.ajax({//
                url:'controlador.php',
                type:'POST',
                data: {pilas:pilas},
                success: function (response) {
                    console.log(response);
                    

                    
                    
                    guardar(response);
                       
                    

                }//final de la funcion response desde el servidor cuando esta completado
            });//fina de la funcio ajax     


    });//final de la primera funcio que pierde el foco en el primer input




        function guardar(recibida){
            
             grwreg = recibida;
             arregloJavascript = JSON.parse(grwreg);//convierto la candena json en un objeto 

            console.log("esto es  lo que muestrodddddd" +grwreg);
            arregloJavascript.forEach(o => { console.log(arregloJavascript);})

            return grwreg;
        }


     //$( "#login" ).focus();

        $('#cod_bloque').change(function(){
            x=('#cod_bloque');
            console.log("Aqui se va a activar el envio de la informacion.");
            var cod_bloque = $('#cod_bloque').val();
            console.log("este es el valor del bloue."+cod_bloque);

            var porsi = grwreg;

            console.log('si m traej el valor'+porsi);

            var arregloJavascript = JSON.parse(porsi);//convierto la candena json en un objeto

            var esPositivo = 0;
            for (x in arregloJavascript) {
              
               

              var control = arregloJavascript[x].codigo.indexOf(cod_bloque);

              if (control != -1){

                  console.log("algun dato coincidio");
                  esPositivo = 1;
                  $('button[type="submit"]').removeAttr("disabled");
                  $("#cod_bloque").css("background-color", "blue");
              }
            }

            if(esPositivo==0){

                console.log("POR FIN");

               
                $("#cod_bloque").css("background-color", "red");
                $("#cod_bloque").css("color", "white");

                


                $('button[type="submit"]').attr('disabled','disabled');

                document.getElementById('sonido').play(); 

                //$(".audio").play();        
  


               }
    
            
        
        });//final de la primera funcio que pierde el foco en el primer input



        $("#recepcion").submit(function(e){
             
           var variablesRecibidas = {

            cod_malla: $("#cod_malla").val(),
            id_finca: $("#id_finca").val(),            
            pilas: $("#pilas").val(),//esta variable es la principal de donde saco los codigos de los bloques
            numero_tallos: $("#numero_tallos").val(),
            grado: $("#grado").val(),
            cod_bloque: $("#cod_bloque").val(),
            quien_ingreso_registro: $("#quien_ingreso_registro").val(),
            

           };

           $.post('procesarRecepcion.php', variablesRecibidas, function (response){

                console.log(response);
                $("#recepcion").trigger('reset');
                $("#cod_malla").focus();
                contadorVeces++;
                $("#contadorResetInput").val(contadorVeces);
                $("#contadorResetInput").css("font-weight","bold");
                $("#contadorResetInput").css("background-color","#D8F2F5");
                $("#contadorResetInput").css("font-size","17px");
               




           }); 

            //console.log(variablesRecibidas);//esto es para ver el objeto con las variables recibidas
            //console.log("enviando");
            e.preventDefault();
          });
    

            $("#contadorReset").submit(function(evento){

              contadorVeces = 0;

                     $("#contadorResetInput").val(contadorVeces);
                     
                         evento.preventDefault(); 



                });

        


  });//final de la funcion que lee todo el documento