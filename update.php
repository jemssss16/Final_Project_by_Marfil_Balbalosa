<?php 
require_once 'constant/config.php';

if (isset($_POST['update'])) {
    
    $id = $_POST['id'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $select = $_POST['select'];
    $guest = $_POST['guest'];
    $arr = $_POST['adate'];
    $depart = $_POST['Ddate'];
    $pick = $_POST['pickup'];
   
    $sql = "UPDATE booking SET Fullname = :fname, Email = :email ,Room_Type = :select ,Guest_No = :guest ,Arrival_date = :arr ,Departure_date = :depart ,Pickup = :pick WHERE id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':select', $select);
        $stmt->bindParam(':guest', $guest);
        $stmt->bindParam(':arr', $arr);
        $stmt->bindParam(':depart', $depart);
        $stmt->bindParam(':pick', $pick);
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        echo "Record updated successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM booking WHERE id = :id";
    try {
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            $name = $row['Fullname'];
            $email = $row['Email'];
            $select = $row["Room_Type"];
            $guest = $row["Guest_No"];
            $arr = $row["Arrival_date"];
            $depart = $row["Departure_date"];
            $pick = $row['Pickup'];
?>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Form Styles */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}

fieldset {
    border: none;
    padding: 0;
    margin: 0;
}

legend {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #1a1a2e;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="number"],
input[type="datetime-local"],
select {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="radio"] {
    margin-right: 10px;
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
<h2>User Update Form</h2>
<form action="" method="post">
    <fieldset>
        <legend>Personal information:</legend>
        Full Name:<br>
        <input type="text" name="fullname" value="<?php echo $name; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <br>
        Email:<br>
        <input type="email" name="email" value="<?php echo $email; ?>">
        <br><br>
        Room Type:<br>
        <Select name="select" id="select" value="<?php echo $select; ?>">
                <option disable>Please Select</option>
                <option value="Standard Room(1 to 2 Peole)">Standard Room(1 to 2 Peole)</option>
                <option value="Family Room(1 to 4 Peole)">Family Room(1 to 4 Peole)</option>
                <option value="Private Room(1 to 3 Peole)">Private Room(1 to 3 Peole)</option>
            </Select>
        <br><br>
        Guest no:<br>
        <input type="number" name="guest" value="<?php echo $guest; ?>">
        <br><br>
        Arrival Date:<br>
        <input type="datetime-local" name="adate" value="<?php echo $arr; ?>">
        <br><br>
        Departure Date:<br>
        <input type="datetime-local" name="Ddate" value="<?php echo $depart; ?>">
        <br><br>
        Free Pick:<br>
        <input type="radio" name="pickup" value="<?php echo $pick; ?>"> Yes Please!-Pick me up on arrival
        <input type="radio" name="pickup" value="<?php echo $pick; ?>">Nop Thanks - I'll make my own way there
        <br><br>
        <input type="submit" value="Update" name="update">
    </fieldset>
</form>
<?php
        } else { 
            header('Location: view.php');
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
