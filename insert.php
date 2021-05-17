<?php
include_once 'db.php';

if(isset($_POST['submit']))
{ 
    $name=$_POST['name'];
    $date= $_POST['date'];
    $time= $_POST['time'];
     $email= $_POST['email'];
     $website= $_POST['website'];
     $comment= $_POST['comment'];
     $gender= $_POST['gender'];


$sql = "INSERT INTO testTable (Name, Date, Time, Email, Website, Comment, Gender)
VALUES ('$name','$date', '$time', '$email', '$website', '$comment', '$gender')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>