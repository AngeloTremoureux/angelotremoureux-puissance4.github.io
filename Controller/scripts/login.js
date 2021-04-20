const form = document.getElementById('formRegister');
if (form) {
   form.addEventListener('submit', function (e) {
      // prevent the form from submitting
      if (!verifFormulaire()) {
         e.preventDefault();
      }
   });
}


function hideAll() {
   $("#usernameLength").hide();
   $("#usernameChars").hide();
   $("#passwordLength").hide();
}



function verifFormulaire() {
   const regex = /^([a-zA-Z_-]*)$/g;
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