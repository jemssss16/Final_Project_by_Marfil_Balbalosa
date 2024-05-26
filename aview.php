<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <style>
   /* General styles */
body {
    font-family: Arial, sans-serif;
    margin-left: 260px;
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

/* Table styles */
table {
    width: 100%;
    margin-left: 260px;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

a.btn {
    padding: 8px 12px;
    text-decoration: none;
    color: white;
    border-radius: 4px;
    margin: 2px;
    display: inline-block;
}

a.btn-info {
    background-color: #17a2b8;
}

a.btn-info:hover {
    background-color: #138496;
}

a.btn-danger {
    background-color: #dc3545;
}

a.btn-danger:hover {
    background-color: #c82333;
}


    </style>
</head>
<body>
    <?php
include "side.php";
require_once 'constant/config.php';
    try {
        $stmt = $conn->prepare("SELECT ID, Fullname, Email ,Room_Type ,Guest_No ,Arrival_date ,Departure_date ,Pickup FROM booking");
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Room Type</th><th>Guest no</th><th>Arrival date</th><th>Departure Date</th><th>Pickup</th><th>Action</th></tr>";
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                echo "<tr>
                        <td>".$row["ID"]."</td>
                        <td>".$row["Fullname"]."</td>
                        <td>".$row["Email"]."</td>
                        <td>".$row["Room_Type"]."</td>
                        <td>".$row["Guest_No"]."</td>
                        <td>".$row["Arrival_date"]."</td>
                        <td>".$row["Departure_date"]."</td>
                        <td>".$row["Pickup"]."</td>
                        <td>
                            <a class='btn btn-info' href='update.php?id=". $row['ID'] ."'>Edit</a>&nbsp;
                            <a class='btn btn-danger' href='delete.php?id=". $row['ID'] ."'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>
