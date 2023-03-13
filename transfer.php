<!DOCTYPE html>
<html>
<head>
  <style>
    .transfer-form {
      width: 500px;
      margin: 0 auto;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 2px 5px #ccc;
    }

    .transfer-form h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    .transfer-form label {
      display: block;
      margin-bottom: 10px;
    }

    .transfer-form input[type="text"],
    .transfer-form input[type="number"] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .transfer-form input[type="submit"] {
      width: 100%;
      background-color: #4caf50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .transfer-form input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/customer.ico">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/images/transfer.ico">
    <title>Transfer Amount</title>
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

  <form class="transfer-form" method="post" action="<?php echo ($_SERVER['PHP_SELF']) ?>" enctype="application/x-www-form-urlencoded">
    <h1>Transfer Money</h1>
    <label for="from-account">Sender's Account No:</label>
    <input type="number" id="" name="from_account" required>
    <label for="to-account">Receiver's Account No:</label>
    <input type="number" id="" name="to_account" required>
    <label for="amount">Amount:</label>
    <input type="number" id="" name="amount" required>
    <input type="submit" value="Transfer">
  </form>

  <?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "SHAanup@1MY";
$database = "world";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else 
{
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
//Get the form data
$from_account = $_POST["from_account"];
$to_account = $_POST["to_account"];
$amount = $_POST["amount"];

// Begin a transaction
$query = "START TRANSACTION";
mysqli_query($conn, $query);

// Transfer the money from the "from" account to the "to" account
$query = "UPDATE `customers` SET `current_balance` = `current_balance`-$amount WHERE `Id`=$from_account";
mysqli_query($conn, $query);

$query = "UPDATE `customers` SET `current_balance` = `current_balance`+$amount WHERE `Id`=$to_account";
mysqli_query($conn, $query);
// Commit the transaction
$query = "COMMIT";
if(mysqli_query($conn, $query)) echo "AMOUNT TRANSFERRED SUCCESSFULLY";



// Close the connection
mysqli_close($conn);
}}
?>

</body>
</html>
