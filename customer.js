function nightMode(){
    document.getElementById('img_day').style.display = 'none';
    document.getElementById('img_dark').style.display = 'block';

    const root = document.querySelector(':root');
    root.style.setProperty('--c1', '#0E0B16');
    root.style.setProperty('--c4', '#E7DFDD');
    root.style.setProperty('--c5white', 'white');
    root.style.setProperty('--c6black', 'black');
    root.style.setProperty('--c3', '#4717F6');
    root.style.setProperty('--c2', '#A239CA');

    document.body.style.setProperty('background-image', "url('https://img.freepik.com/premium-photo/grocery-store-with-shelves-vegetables-berries-generative-ai_438099-16120.jpg')");


}

function dayMode(){
    document.getElementById('img_dark').style.display = 'none';
    document.getElementById('img_day').style.display = 'block';

    const root = document.querySelector(':root');
    root.style.setProperty('--c1', 'white');
    root.style.setProperty('--c4', '#efefef');
    root.style.setProperty('--c5white', 'black');
    root.style.setProperty('--c6black', 'white');
    root.style.setProperty('--c3', '#caebf2');
    root.style.setProperty('--c2', '#caebf2');

    document.body.style.setProperty('background-image', "url('https://t3.ftcdn.net/jpg/03/11/27/96/360_F_311279691_wfNvKEXKX3cyYFsZ7OttC2C5xkf8Y2BL.jpg')");

}

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

