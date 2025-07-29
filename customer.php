<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <link rel="stylesheet" href="mystyle.css" type="text/css">
  <style>
    .error {
        border: 2px solid red;
    }
    .success {
        border: 2px solid green;
    }
  </style>
  <script src="customer.js">
    
  </script>
</head>
<body class="withbg">


  <div class="customer_content">
    <header>
      <h2>USER AREA</h2>
      <p>View and update your personal information below.</p>
    </header>

    
      <form class="forming">
        <label class="labeling5" for="username">Username:</label>
        <input class="inputing5" type="text" id="username" name="username"  placeholder="Enter your username"><br><br>
        <label class="labeling5" for="password">Password:</label>
        <input class="inputing5" type="password" id="password" name="password"  placeholder="Enter your password"><br><br>
        <button type="submit" class="shop_btn" onclick="return check();">Update</button>
      </form>
    </div>
</body>
</html>

