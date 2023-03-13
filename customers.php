<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/customer.ico">
    <link rel="stylesheet" href="style.css">
    <title>Customers Database</title>
<style>

table {
    border-collapse:separate;
    width: 100%;
    color:black;
    border: 1px solid #222831;
    font-size: 25px;
    text-align: center;
}
td{
    border-left: 1px solid #222831;
    border-right: 1px solid #222831;
}
th {
    background-color: #222831;
    color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}

nav ul li{
    list-style: none;
    margin: 50px 20px;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
}
#menuBtn{
    width: 50px;
    position: fixed;
    right: 65px;
    top: 35px;
    z-index: 2;
    cursor: pointer;
}
 
</style>
</head>
<body>
       <!--    Navigation Bar  -->
       <div class="navbar">
            <a href="index.html"><img src="/images/bank-img.jpg" alt="Bank" height="80px" width="80px"></a>
            <p style="font-size: 20px;display: inline;color: white;font-size: x-large;margin: 0;position: absolute;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">The Sparks Bank</p>
            <div class="nav-link">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="customers.php">View Customers</a></li>
                <li><a href="transfer.php">Transfer Money</a></li>
                <li><a href="index.html">About Us</a></li>
                <li><a href="index.html">Contact Us</a></li>
              </ul>
            </div>  
        </div>
        <!--  Navigation Bar End    -->
    <div style="font-family: 'Gabriela', serif;   font-size: 40px;text-align: center;margin: 20px;">Bank's  Customers</div>
<table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Balance</th>
    </tr>

<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "world";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


$sql = "SELECT * FROM `customers`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);

// Display the rows returned by the sql query
if($num> 0){
    

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
       
        
    echo "<tr>";
    echo "<td>" . $row["Id"]. "</td><td>" . $row["Name"] . "</td>
    <td>" . $row["Email"] . "</td><td>". $row["current_balance"] . "</td>";
    echo "</tr>";
}
echo "</table>";
}
?>
</table>
</body>
</html>