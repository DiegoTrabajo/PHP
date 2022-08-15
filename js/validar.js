$().ready(function() {  

    $.validator.addMethod("validarRut", function (value, element) {
    var pattern = /^\d{1,3}(?:.\d{1,3}){2}-[\dkK]$/;
    return this.optional(element) || pattern.test(value);
  }, "escribe rut");

    
  $.validator.addMethod("validarEmail", function (value, element) {
     var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
     return this.optional(element) || pattern.test(value);
  }, "Formato del email incorrecto");


    $("#formulario").validate({
   
   rules: {

    Rut:{

      required: true,
      minlength:8,
      validarRut: true

      
    },
    Nombre:{

      required: true
    },
    Correo:{
      required: true,
      email: true
    },
    Candidato:{

      required: true
    }
   },
   messages: {
      Rut: "El formato es 11.111.111-1.",
      Nombre : "El campo es obligatorio.",
      Correo : "El campo es obligatorio",
      Candidato : "El campo es obligatorio",
    }
    

})
  
$("#Enviar").click(function() {
	if ($("#formulario").valid() == false ) {
		return;
	}
  let Rut = $("#Rut").val()
  let Nombre = $("#Nombre").val()
  let Correo = $("#Correo").val()
  let Candidato = $("#Candidato").val()

});

     
     $('#Enviar').click(function() {

     	if ($("#formulario").valid() == false ) {
		return;
	}  
      var Rut= $('#Rut').val(); 
      var Nombre= $('#Nombre').val(); 
      var Correo= $('#Correo').val(); 
      var Candidato= $('#Candidato').val(); 

      var ruta="Ru="+Rut+"&Nom="+Nombre+"&Corr="+Correo+"&Candi="+Candidato;
      console.log(ruta);

      $.ajax({
        url: 'back.php',
        type: 'POST',
        data: ruta,
      })
      .done(function(res) {
        $('#respuesta').html(res);
      })
      .fail(function() {
        $('#respuesta').html("res");
      })
      .always(function(res) {
        console.log(res);
      });
      

     });  
  });