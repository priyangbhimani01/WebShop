function check(){

    var usernameField = document.getElementById('username');
    var passwordField = document.getElementById('password');

    var ipt_username = usernameField.value;
    var ipt_password = passwordField.value;

    var hasUpperCase = /[A-Z]/.test(ipt_username);
    var hasLowerCase = /[a-z]/.test(ipt_username);

    // let isValid = true;

    if(ipt_username.length < 5) {
        alert("Please use at least five characters for Username");
        usernameField.classList.remove('success');
        usernameField.classList.add('error');
        return false;
    } else {
        usernameField.classList.remove('error');
        usernameField.classList.add('success');
    }

    if(!hasUpperCase || !hasLowerCase) {
        alert("Please use at least one uppercase and one lowercase letter for Username.");
        usernameField.classList.remove('success');
        usernameField.classList.add('error');
        return false;
    } else {
        usernameField.classList.remove('error');
        usernameField.classList.add('success');
    }

    if(ipt_password.length < 10) {
        alert("Please use at least 10 characters for Password");
        passwordField.classList.remove('success');
        passwordField.classList.add('error');
        return false;
    } else {
        passwordField.classList.remove('error');
        passwordField.classList.add('success');
    }


    return true;

}
