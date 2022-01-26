//errors gets passed through and are parsed to form a string message
function get_error_msg(errors){
    var msg = 'The password has the following errors:\n';
    for(var i=0;i<errors.length;i++)
      msg += ' - ' + errors[i] + '\n';
    return msg;
}

window.onload = function(){
    var form = document.getElementById('formid');
    var first_pass = form.pwd;
    var second_pass = form.pwd2;

    var validate_password = function(event){
        var errors = validate_pass(first_pass.value);
        if(second_pass.value !== first_pass.value) {										//Checks if two passwords are similar
            document.getElementById("pwd2error").innerHTML = 'Two passwords must match.';    
            //first_pass.setCustomValidity('The two passwords must match.');
            //event.preventDefault()
            //event.stopPropagation()
        } else if(errors.length > 0) {
            var error_msg = get_error_msg(errors);
            //second_pass.setCustomValidity(error_msg);
            document.getElementById("pwderror").innerHTML = error_msg;
            //event.preventDefault()
            //event.stopPropagation()
        }
        else
            second_pass.setCustomValidity('');
        };

    first_pass.onchange = validate_password;											//Function called whenever a password is changed
    second_pass.onchange = validate_password;
};

/* eslint no-unused-vars: 0 */

//checks password and puts errors into array
function validate_pass(pass){
    var minimum_length = 6;
    var errors = [];
    if(pass.length<minimum_length)
        errors.push("Too short (min length = 6)");
    if(pass.match(/[^a-zA-Z0-9]/))
        errors.push("Only alphanumeric chars allowed");
    if(!pass.match(/[a-z]/))
        errors.push("Lower case letter required");
    if(!pass.match(/[A-Z]/))
        errors.push("Upper case letter required");
    if(!pass.match(/[0-9]/))
        errors.push("Number required");
    return errors;
}