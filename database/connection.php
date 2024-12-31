<?php



// Database configuration
$servername = 'localhost';
$username = "root";
$password = '';
$dbname = 'situation';


// Check connection
try {
    // Create connection
    $conn = new PDO("mysql:host={$servername};dbname={$dbname}",$username , $password );
} catch (PDOException $e){
    echo "failed to connect";
}
?>
