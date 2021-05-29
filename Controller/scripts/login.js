const form = document.getElementById('formRegister');
if (form) {
   form.addEventListener('submit', function (e) {
      // prevent the form from submitting
      if (!verifFormulaire()) {
         e.preventDefault();
         // grecaptcha.ready(function() {
         //    grecaptcha.execute('6LdY4OkaAAAAAOw4RyVGtcwhCbrSkBDwjqrTMbAG', {action: 'create_comment'}).then(function(token) {
         //       $('#formLogin').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
         //       $.post("../account/login",{username: username, password: password, token: token}, function(result) {
         //               console.log(result);
         //               if(result.success) {
         //                       alert('Thanks for posting comment.')
         //               } else {
         //                       alert('You are spammer ! Get the @$%K out.')
         //               }
         //       });
         //    });
         // });
      }
   });
}


function hideAll() {
   $("#usernameLength").hide();
   $("#usernameChars").hide();
   $("#passwordLength").hide();
}
function verifFormulaire() {
   const regex = /^([a-zA-Z0-9_-]*)$/g;
   let isOk = true;
   hideAll();
   if ($("input#username").val().length < 3 || $("#username").val().length > 20) {
      $("#username").focus();
      $("#usernameLength").show();
      isOk = false;
   }
   if (!($("input#username").val().match(regex))) {
      $("input#username").focus();
      $("#usernameChars").show();
      isOk = false;
   }
   if ($("input#password").val().length < 3 || $("input#password").val().length > 40) {
      $("#password").focus();
      $("#passwordLength").show();
      isOk = false;
   }
   if (isOk) {
      return true;
   }
   else {
      return false;
   }
   
}