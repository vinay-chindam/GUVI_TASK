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
  })()

let registerBtn = document.getElementById("register");
registerBtn.addEventListener("click", register);
console.log(registerBtn);

function register(){
  // alert("Hello");
    $(document).ready(function(){
        var data = {
            name: $('#fullname').val(),
            email: $('#email').val(),
            gender: $('#gender').val(),
            dob: $('#dob').val(),
            username: $('#username').val(),
            password: $('#password').val(),
        };

        $.ajax({
            url: 'php/register.php',
            type: 'post',
            data: data,
            success: function(response){
                alert(response);
                if(response == 'Login Successful'){
                    window.location.reload();
                }
            }
        });
    });

    
}