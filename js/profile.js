$(document).ready(function(){
    let content = document.getElementById('content');

    $.ajax({
        url: 'php/profile.php',
        type: 'get',
        success: function(response){
            str = ''
            for (key in response){
                str += `<p> <b>${key}</b> : ${response[key]} </p>`;
            }
            content.innerHTML = str;
        }
    });
});