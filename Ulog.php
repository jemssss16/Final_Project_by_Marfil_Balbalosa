<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
      body {
  background-image: url("https://img.freepik.com/free-photo/view-luxurious-hotel-hallway_23-2150683497.jpg");
  background-repeat: no-repeat, repeat;
  background-size: cover;
 
}
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Login container styles */
.login-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    text-align: center;
}

.login-container h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #1a1a2e;
}

.login-container h2 {
    font-size: 20px;
    margin-bottom: 20px;
    color: #e94560;
}

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.form-group input[type="text"],
.form-group input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-left: auto;
    margin-right: auto;
    display: block;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}


    </style>
</head>

<body>
    <div class="login-container">
        <h1>Hotel Transylvania <br>For User</h1>
        
        <h2>Login</h2>
        <form  method="post" action="usvalid.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="submit" value="login">
        </form>
    </div>
</body>
</html>



