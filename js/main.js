jQuery(document).ready(function() {
    
    jQuery("#telefono").mask("(99) 9999-9999");
    
    jQuery("#tooltip1").mouseenter(function(e) {
        $("#tool1").css("left", e.pageX + 5);
        $("#tool1").css("top", e.pageY - 55);
        jQuery("#tool1").fadeIn(200);
    });
    
    jQuery("#tooltip1").mouseleave(function() {
        jQuery("#tool1").fadeOut(200);
    });
    
    
    jQuery("#tooltip2").mouseenter(function(e) {
        $("#tool2").css("left", e.pageX + 5);
        $("#tool2").css("top", e.pageY - 50);
        jQuery("#tool2").fadeIn(200);
    });
    
    jQuery("#tooltip2").mouseleave(function() {
        jQuery("#tool2").fadeOut(200);
    });
    
    
    jQuery("#tooltip3").mouseenter(function(e) {
        $("#tool3").css("left", e.pageX + 5);
        $("#tool3").css("top", e.pageY - 50);
        jQuery("#tool3").fadeIn(200);
    });
    
    jQuery("#tooltip3").mouseleave(function() {
        jQuery("#tool3").fadeOut(200);
    });
    
    
    jQuery("#tooltip4").mouseenter(function(e) {
        $("#tool4").css("left", e.pageX + 5);
        $("#tool4").css("top", e.pageY - 150);
        jQuery("#tool4").fadeIn(200);
    });
    
    jQuery("#tooltip4").mouseleave(function() {
        jQuery("#tool4").fadeOut(200);
    });
    
    jQuery.validator.addMethod("textonly", function(value) {
            return String(value).match(/^[a-zA-Z\sáéíóúAÉÍÓÚÑñüÜ]+$/);
        }, 'Ha introducido un caracter inválido'
    );
        
    //Validate form
    jQuery("#rodarSeguro-form").validate({
        rules :{
            nombre : {
                required : true,
                minlength: 5,
                maxlength: 70,
                'textonly': true
            },
            email : {
                required : true,
                email    : true
            },
            telefono : {
                required: true
            },
            sexo: {
                required: true
            },
            edad : {
                number: true,
                required : true,
                min : 12,
                max : 99
            }
        },
        onfocusout: function (element) {
            if(jQuery(element).valid()){
                jQuery(element).css("background-color", "white");
                jQuery("#error_"+ jQuery(element).attr("name")).css("display", "none");
            }
        },
        messages : {
            nombre:{
                required: "Proporcione su nombre completo",
                minlength: "Su nombre debe tener entre 15 y 70 caracteres",
                maxlength: "La contraseña debe tener entre 6 y 10 caracteres"                
            },
            email: {
                required : "El email es obligatorio",
                email: "Proporciona una dirección de correo electrónico válida"
            },
            telefono : {
                required: "Escriba su teléfono"
            },
            sexo: {
                required: "Indique su sexo"
            },
            edad : {
                number: "Introduzca sólo números",
                required : "Su edad es requerida",
                min: "La edad debe ser mayor o igual a 12 y menor o igual a 99",
                max: "La edad debe ser mayor o igual a 12 y menor o igual a 99"
            }
        },
        errorPlacement: function (error, element) {
                jQuery("#error_"+element.attr("name")).css("display", "block");
                element.css("background-color", "pink");
                jQuery("#error_"+element.attr("name")).attr("title", error.text());
        }      
    });
});