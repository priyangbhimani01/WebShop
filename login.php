<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="mystyle.css">
    <style>
        
    </style>
    <script src="login.js">
    </script>

</head>

<body class="start1">
    <div class="login-container1" style="border: solid black;">
        <h1 class="heading1">Login</h1>
        <form >
            <div class="input-group1"  >
                <label  class="labeling1" for="username">Username:</label><br>
                <input  class="inputing1" type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="input-group1">
                <label class="labeling1" for="password">Password:</label><br>
                <input class="inputing1" type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="button-group1">
                <button type="submit" class="btn1" onclick="return check();">Login</button><br>
                <a href="registration.php"><button type="button" class="register-btn1">Register</button></a>
            </div>
        </form>
    </div>
</body>
</html>
