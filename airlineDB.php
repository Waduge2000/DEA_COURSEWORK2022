<?php
$depart = $_POST["depart"];
$destination = $_POST["destination"];
$departureDate = $_POST["departureDate"];
$destinationDate = $_POST["destinationDate"];

$host= "localhost";
$dbname = "airline";
$username = "root";
$password = "";

$conn = mysqli_connect($host,$username, $password, $dbname);
if (mysqli_connect_errno())
{
    die("Connection error : " . mysqli_connect_error());
}
 
$sql = "INSERT INTO ticket (depart,destination,departureDate,destinationDate)
        VALUES (?,?,?,?)";

$stmt =mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt,$sql))
{
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",$depart,$destination,$departureDate,$destinationDate);

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>
