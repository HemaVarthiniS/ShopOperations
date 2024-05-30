<?php
include("cusconnection.php");

$sno = $sname = $phone = $address = $gst = $product = "";
$updateMessage = "";

// Check if supplier number is provided and fetch supplier details
if(isset($_GET['sno'])) {
    $sno = $_GET['sno'];
    $query = "SELECT * FROM sup WHERE sid = '$sno'";
    $result = mysqli_query($conn, $query);
    
    if($row = mysqli_fetch_assoc($result)) {
        $sname = $row['sname'];
        $phone = $row['phone'];
        $address = $row['address'];
        $gst = $row['gst'];
        $product = $row['product'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Retrieve form data
    $sno = $_POST['sno'];
    $sname = $_POST['sname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gst = $_POST['gst'];
    $product = $_POST['product'];

    // Prepare update query
    $query = "UPDATE sup SET `sname`='$sname', `phone`='$phone', `address`='$address', `gst`='$gst', `product`='$product' WHERE sid='$sno' ";

    // Execute query
    if (mysqli_query($conn, $query)) {
        $updateMessage = "Record updated successfully";
    } else {
        $updateMessage = "Error updating record: " . mysqli_error($conn);
    }
}
include("nav.php");
?>

<html>
<head>
    <title>Supplier Edit</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            margin:0 0 0 220px;
            float:left;
        }
        .form-container {
            width: 45%;
            float:left;
        }
        #edit{
           float:right;
           display:flex;
        }
        #edit{
            margin-right:265px;
        }
        h2{
    font-size:30px;
    font-family: "Times New Roman", Times, serif;
    color: white;
    text-shadow: 1px 1px 2px black, 0 0 20px blue, 0 0 5px darkblue; 
}
    </style>
</head>
<body>
<div class="container"> 
    <form action="#" method="POST" autocomplete="off">
        <h1 id="h"><b><u>Supplier Edit</u></b></h1>      
        <table>
            <tr>
                <th>Supplier Number</th>
                <td><input type="text" name="sno" placeholder="Supplier number" value="<?php echo $sno; ?>"><br><span id="snoo"></span></td>
            </tr>
            <tr>
                <th>Supplier Name</th>
                <td><input type="text" name="sname" placeholder="Supplier Name" value="<?php echo $sname;?>"><br><span id="snamee"></span></td>
            </tr> 
            <tr>
                <th>Phone Number</th>
                <td><input type="text" name="phone" placeholder="Phone Number" value="<?php echo $phone;?>" ><br><span id="phonee"></span></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><textarea name="address" rows="3" cols="30" id="addresss" placeholder="Address"><?php echo $address; ?></textarea></td>
            </tr>
            <tr>
                <th>GST Number</th>
                <td><input type="text" name="gst" placeholder="GST Number" value="<?php echo $gst;?>"><br><span id="gstt"></span></td>
            </tr>
            <tr>
                <th>Product</th>
                <td><input type="text" name="product" placeholder="product" value="<?php echo $product;?>" ><br><span id="productt"></span></td>
            </tr>
            <tr><td align="center" colspan="2"><input type="submit" id="btn" name="submit"></td></tr>
        </table>
    </form>
</div>        

<div class="table-container">
    <h2><u>Supplier Details</u></h2>
    <table id="edit" border="1">
        <tr>
            <th>Supplier Number</th>
            <th>Supplier Name</th>
        </tr>
        <?php
        // Fetch all suppliers from the database
        $query = "SELECT * FROM sup";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='{$_SERVER['PHP_SELF']}?sno=" . $row['sid'] . "'>" . $row['sid'] . "</a></td>";
            echo "<td>" . $row['sname'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<?php
// Display update message
if (!empty($updateMessage)) {
    echo "<p>$updateMessage</p>";
}
?>

</body>
</html>
