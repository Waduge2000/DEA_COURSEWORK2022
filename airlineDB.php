<?php
$depart = $_POST["depart"];
$destination = $_POST["destination"];
$departureDate = $_POST["depatureDate"];
$destinationDate = $_POST["destinationDate"];

$host= "localhost";
$dbname = "airline";
$username = "root";
$password = "";

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
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

mysqli_stmt_bind_param($stmt, "ssii",$depart,$destination,$depatureDate,$destinationDate);

mysqli_stmt_execute($stmt);

echo "Record saved.";
?>
