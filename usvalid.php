<?php

include 'constant/config.php';
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Prepare and execute the query
        $query = "SELECT * FROM admin WHERE Username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($password == $row['Password']) {
                // Successful login
                echo $_SESSION['username'] = $username;
                header('Location: create.php');
                exit;
            } else {
                // Invalid password
                echo 'Invalid username or password.';
            }
        } else {
            // Invalid username
            echo 'Invalid username or password.';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
