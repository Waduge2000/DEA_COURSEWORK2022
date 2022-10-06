<?php
$depart=$_POST['depart'];
$destination=$_POST['destination'];
$departureDate=$_POST['departureDate'];
$destinationDate=$_POST['destinationDate'];

$conn =new mysqli('localhost','root','','','airline');
if($conn->connect_error)
{
die('Connection Failed : '.$conn->connect_error);
}
else
{
    $stmt =$conn->prepare("insert into ticket(depart,destination,departureDate,destinationDate)
    values(?,?,?,?)");
    $stmt->bind_param("ssii",$depart,$destination,$depatureDate,$destinationDate);
    $stmt->execute();
    echo "Booked the ticket successfully";
    $stmt->close();
    $conn->close();
}
?>