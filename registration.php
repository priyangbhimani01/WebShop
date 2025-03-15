<!DOCTYPE html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="mystyle.css">
    <style>
        .error {
            border: 2px solid red;
        }
        .success {
            border: 2px solid green;
        }
    </style>
    <script src="registration.js">
    </script>
</head>
<body class="start">
    
    <div class="login-container">
        <h1 class="heading2">REGISTER</h1>

        <form>
            <div class="input-group">
                <label class="label" for="username">Username : </label><br> 
                <input class="input" type="text" id="username" name="username"  placeholder="Enter username"/>
            </div>

            <div class="input-group">
                <label class="label" for="password">Password : </label><br>
                <input class="input" type="password" id="password" name="password"  placeholder="Enter password"/>
            </div>   

            <div class="input-group">    
                <label class="label" for="ConfirmPassword">Confirm Password : </label><br>
                <input class="input" type="password" id="ConfirmPassword" placeholder="Repeat password"/>
            </div>  

            <div class="button-group">
                <button type="submit" class="btn" onclick="return check();"> Register </button>
                 <a href="login.php">
                    <button type="button" class="backto-login"> Cancel </button> 
                 </a>
            </div>

        </form>
    </div>
</body>
</html>