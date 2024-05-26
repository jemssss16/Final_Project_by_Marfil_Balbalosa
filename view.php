<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <style>
        /* CSS for the hotel booking table */
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f4f4f9;
}

table {
    width: 100%;
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
