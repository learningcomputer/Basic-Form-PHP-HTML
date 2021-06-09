<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["date"])) {
        $dateErr = "Date is required";
    } else {
        $date = test_input($_POST["date"]);
    }
    if (empty($_POST["time"])) {
        $timeErr = "Time is required";
    } else {
        $time = test_input($_POST["time"]);
    }

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $pass = test_input($_POST["password"]);
    }

    if (empty($_POST["status"])) {
        $statusErr = "Status is required";
    } else {
        $status = test_input($_POST["status"]);
    }

    if (empty($_POST["location"])) {
        $locErr = "Location is required";
    } else {
        $location = test_input($_POST["location"]);
    }


    $sql = "SELECT id FROM personnel WHERE name = '$name' and password = '$pass'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $sql2 = "INSERT INTO attendance (Date, Time, Name,  Password, Status, Location)
VALUES ('$date', '$time', '$name', '$pass', '$status','$location')";


        if ($conn->query($sql2) === TRUE) {
            $QSmessage = "You have successfully checked-in!";
            echo "<script type='text/javascript'>alert('$QSmessage');</script>";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        $LImessage = "Your Name or Password is invalid!";
        echo "<script type='text/javascript'>alert('$LImessage');</script>";
    }
    $conn->close();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
