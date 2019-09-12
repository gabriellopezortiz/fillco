$(document).ready(function(){//Aqui se encierra todos los metod que quiero call in jquery
    console.log("Jquery esta funcionando ingeniero Duarte"); 

    var contadorVeces=0;
    
    var nombreFlorKeyup='';

 $('#cod_malla').blur(function (){
       
        //this.value = (this.value + '').replace(/[^0-9]/g, '');
        console.log("Esta aqui el codigo de barras primera parte");
        var cod_malla = $('#cod_malla').val();
        console.log("este es el codigo de mallas ingresado ahora " +cod_malla);


         $.ajax({//
                url:'controladorValidarMalla2.php',
                type:'POST',
                data: {cod_malla:cod_malla},
                success: function (response) {
                    console.log(response);                       
                    var guardoRespuesta = response;

                    console.log("esta es la respuesta"+guardoRespuesta);//este es el objeto json
                      

                  myObj = JSON.parse(response);

                  for (x in myObj) {
                      codMalla = myObj[x].cod_malla;
                      nombreFlorKeyup = myObj[x].nombre;
                  }

               

                console.log('esta es mi guia, el nombre de la flor'+nombreFlorKeyup);

                //if (nombreFlorKeyup == ''){

                  if (Object.entries(myObj).length === 0) {//esto es si el objeto esta vacio


                    console.log('No hay retorno de datos');
                    $("#cod_malla").focus();
                    var valorvacio='';
                    $("#cod_malla").val(valorvacio);
                    //document.getElementById('sonido').play(); 
                   
                    $("#cod_malla").css("background-color", "red");
                    
                    //$("#cod_malla").val('');
                    $('button[type="submit"]').attr('disabled','disabled');
                    document.getElementById('sonido').play(); 
                    console.log("dio positivo codigo de malla usandose en este momento linea 54");

                        //$("#cod_malla").css("background-color", "red");
                        //$("#cod_malla").css("color", "white");
                        


                }else{

                     console.log('Si hay retorno de datos estoy en la linea 63');

                   $('button[type="submit"]').removeAttr("disabled");
                   $("#cod_malla").css("background-color", "white");
                   $("#cod_malla").submit();

                }

                 /*if (nombreFlorKeyup != null){

                   //document.getElementById('sonido').pause(); 
                  $('button[type="submit"]').removeAttr("disabled");
                  $("#cod_bloque").css("background-color", "white");


                  //$("#cod_malla").submit();
                }*/

               
                     

                   



                                                      

                   

                        }//final de la funcion response desde el servidor cuando esta completado
                      });//final de la funcio ajax     
                });// final de  $('#cod_malla').keyup(function (){





          $("#salida").submit(function(e){             
           var variableRecibida = {
               cod_malla: $("#cod_malla").val()
                                  };

           $.post('controladorValidarMalla.php', variableRecibida, function (response){

              $("#salida").trigger('reset');
              $("#cod_malla").focus();
              contadorVeces++;

                console.log('Estos son las variables que muestro ya en formulario enviado'+response);
                //var valores = JSON.parse(response);//convierto la candena json en un objeto
                myObj = JSON.parse(response);

                for (x in myObj) {
                  codMalla = myObj[x].cod_malla;
                  nombreFlor = myObj[x].nombre;
                }

               

                console.log('esta es mi guia del envio del formulario '+nombreFlor);

                if (response == null) {
                  console.log("ejecuto esto");
                        //execute
                    }else{console.log("no me traje nada");}

                var varibleFinal1 = 'MALLA DE SALIDA '+codMalla;
                var varibleFinal2 = 'FLOR DE SALIDA '+nombreFlor;
                
                
                $("#mallaSacada").val(varibleFinal1); 
                $("#variedadSacada").val(varibleFinal2); 

                
               
                /* Sintaxis por defecto */
                var valorContador = 'MALLAS LEIDAS: '+  contadorVeces;
                 $("#valorCuenta").val(valorContador); 
               console.log('Se este esjecutando el contador en la linea 141' + valorContador );
               




           }); 
             
          
          
            $("#cod_malla").css("background-color", "white");
            //document.getElementById('sonido').pause(); 

              e.preventDefault();
            
          });


 




        
        


  });//final de la funcion que lee todo el documento