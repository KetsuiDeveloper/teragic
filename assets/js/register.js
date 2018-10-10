$(function(){
    $('#submit-r').click(function(e){
        e.preventDefault();
        var $username = $('#username-r').val(),
        $email = $('#email-r').val(),
        $gender = $('#gender-r').val(),
        $password = $('#password-r').val(),
        $reppasword = $('#reppassword-r').val(),
        $submit = $('#submit-r');
        $message_box = $('.message_box');


        var url = "./data/process/register.php",
        isUserAvailable = false;
        //checks
        if($username == "" || $email == "" || $gender == "" || $password == "" || $reppasword == ""){
            showMessage("Complete todos los campos", false);
        } else if($password != $reppasword){
            showMessage("Las contraseñas no coinciden", false);
        } else if($password.length < 6){
            showMessage("La contraseña debe tener un minimo de 6 caracteres", false);
        } else if(!validateEmail($email)){
            showMessage("Email no válido", false);
        } else{
            checkUsernameAvailable($username, $email);
        }
        
        //FUNCTIONS
        function showMessage(message, state){
            $message_box.removeClass('green_alert');
            $message_box.removeClass('red_alert');
            $message_box.html(message);
            if(state){
                $message_box.addClass('green_alert');
            } else{
                $message_box.addClass('red_alert');
            }
            $message_box.removeClass('d-none');
        }
        function checkUsernameAvailable(username, email){
            $submit.attr('disabled', 'disabled');
            $submit.addClass('disabled');
            $.ajax({
                type: "GET",
                url: "data/checkers/username.php?user="+username+"&email="+email,
                dataType: "json",
                success: function(resp) {
                    $submit.removeAttr('disabled');
                    $submit.removeClass('disabled');
                    isUserAvailable = resp;
                    if(!isUserAvailable){
                        showMessage("Nombre de usuario/email no disponible", false);
                    } else{
                        //todo bien
                        
                        //send email
                        $.post( "data/process/register.php", { username: $username, email: $email, gender: $gender, password: $password, reppassword: $reppasword })
                        .done(function(data) {
                            showMessage("Se ha enviado un correo de confirmacion", true);
                        });
                    }
                },
                error: function(resp){
                    $submit.removeAttr('disabled');
                    $submit.removeClass('disabled');
                    showMessage("Ha ocurrido un error, ponte en contacto con el Administrador.", false);
                }
              });
        }
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    });
});