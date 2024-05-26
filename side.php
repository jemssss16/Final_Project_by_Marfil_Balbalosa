<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Hotel</title>
    <style>/* General styles */
/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    display: flex;
    background-color: #f4f4f9;
}

/* Sidebar styles */
.sidebar {
    height: 100vh;
    width: 250px;
    background-color: #1a1a2e;
    padding-top: 20px;
    position: fixed;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar h2 {
    color: #e94560;
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    letter-spacing: 1px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: #e0e0e0;
    display: block;
    padding: 12px 20px;
    transition: background 0.3s, color 0.3s;
    font-size: 18px;
}

.sidebar ul li a:hover {
    background-color: #e94560;
    color: #ffffff;
}

/* Content styles */
.content {
    margin-left: 250px;
    padding: 40px;
    flex-grow: 1;
}

.content h1 {
    color: #333;
    font-size: 32px;
    margin-bottom: 20px;
    border-bottom: 2px solid #e94560;
    padding-bottom: 10px;
}

.content p {
    color: #666;
    font-size: 18px;
    line-height: 1.6;
}

</style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="aview.php">View Record</a></li>
            <li><a href="User_mngr.php">User Management</a></li>
            <li><a href="login.php">Logout</a></li>
        </ul>
    </div>
   
</body>
</html>
