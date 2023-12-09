(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })();

let loginBtn = document.getElementById("login");
loginBtn.addEventListener("click", login);
console.log(loginBtn);

  function login(){
    // alert("Hello");
      $(document).ready(function(){
          var data = {
              username: $('#username').val(),
              password: $('#password').val(),
          };
  
          $.ajax({
              url: 'php/login.php',
              type: 'post',
              data: data,
              success: function(response){
                  alert(response);
                  // response;
                  // if(response == 'Login Successful'){
                  //     window.location.reload();
                  // }
              }
          });
      });
  
      
  }

