$(document).ready(function(){//Aqui se encierra todos los metod que quiero call in jquery
    console.log("Jquery esta funcionando ingeniero Duarte tranquilo fino"); 

    var contadorVeces=0;
    
    var nombreFlorKeyup='';

 $('#cod_malla').keyup(function (e){
       
        this.value = (this.value + '').replace(/[^0-9]/g, '');
        console.log("Esta aqui el codigo de barras.");
        var cod_malla = $('#cod_malla').val();
        console.log("este es el codigo de malalas."+cod_malla);


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

               

                console.log('esta es mi guia'+nombreFlorKeyup);

                if (nombreFlorKeyup == ''){

                    console.log('No hay retorno de datos');
                    $("#cod_malla").focus();
                    var valorvacio='';
                    $("#cod_malla").val(valorvacio);
                    //document.getElementById('sonido').play(); 
                   
                    $("#cod_malla").css("background-color", "red");
                    
                    //$("#cod_malla").val('');
                    $('button[type="submit"]').attr('disabled','disabled');
                    document.getElementById('sonido').play(); 
                    console.log("dio positivo codigo de malla usandose");

                        //$("#cod_malla").css("background-color", "red");
                        //$("#cod_malla").css("color", "white");
                        
                       

                }else{

                 $('button[type="submit"]').removeAttr("disabled");
                 $("#cod_bloque").css("background-color", "white"); 
                 $( "#salida" ).submit();
                                

                }

                
               
                     

                   



                                                      

                   

                        }//final de la funcion response desde el servidor cuando esta completado
                      });//final de la funcio ajax     


                });// final de  $('#cod_malla').keyup(function (){




          $("#salida").submit(function(e){




         
           

              //console.log(variablesRecibidas);//esto es para ver el objeto con las variables recibidas
              //console.log("enviando");
              

              e.preventDefault();
            });


          



 




        
        


  });//final de la funcion que lee todo el documento