$(function() {
        console.log("Jquery esta funcionando ingeniero Duarte tranquilo"); 
        $('#codigo_variedad').keyup(function() {

            let codigo_variedad = $('#codigo_variedad').val();
            //console.log(pilas);
            

            $.ajax({

                url:'controlador.php',
                type:'POST',
                data: {codigo_variedad:codigo_variedad},
                success: function(response) {

                    //console.log(response);
                    
                }
            })
        })





});