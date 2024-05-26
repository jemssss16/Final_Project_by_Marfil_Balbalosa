<?php

require_once 'constant/config.php';
try {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $select = $_POST['select'];
    $guest = $_POST['guest'];
    $arr = $_POST['adate'];
    $depart = $_POST['Ddate'];
    $pick = $_POST['pickup'];

    $select_query = "SELECT * FROM booking WHERE email = :email";
    $stmt1 = $conn->prepare($select_query);
    $stmt1->bindParam(':email', $email);
    $stmt1->execute();

    if($stmt1->rowCount() > 0) {
        echo "User already exist!";
    }else {
        $sql = "INSERT INTO booking(Fullname, Email ,Room_Type ,Guest_No ,Arrival_date ,Departure_date ,Pickup) VALUES(:fname, :email, :select,:guest, :arr, :depart, :pick)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':select', $select);
        $stmt->bindParam(':guest', $guest);
        $stmt->bindParam(':arr', $arr);
        $stmt->bindParam(':depart', $depart);
        $stmt->bindParam(':pick', $pick);

        $stmt->execute();
    
        echo "Data inserted";
    }

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>