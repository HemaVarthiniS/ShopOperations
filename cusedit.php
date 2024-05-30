<?php
include("cusconnection.php");

$cno = $cname = $gender = $phone = $address = $credit = $balance = "";

// Check if customer number is provided and fetch customer details
if(isset($_GET['cno'])) {
    $cno = $_GET['cno'];
    $query = "SELECT * FROM cus WHERE cusid = '$cno'";
    $result = mysqli_query($conn, $query);
    
    if($row = mysqli_fetch_assoc($result)) {
        $cname = $row['cusname'];
        $gender = $row['gen'];
        $phone = $row['phone'];
        $address = $row['add'];
        $credit = $row['cre'];
        $balance = $row['bal'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cno = $_POST['cno'];
    $cname = $_POST['cname'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $credit = $_POST['credit'];
    $balance = $_POST['balance'];

    // Prepare update query
    $query = "UPDATE cus SET cusname='$cname', gen='$gender', phone='$phone', `add`='$address', cre='$credit', bal='$balance' WHERE cusid='$cno'";


    // Execute query
    if (mysqli_query($conn, $query)) {
        $updateMessage = "Record updated successfully";
    } else {
        $updateMessage = "Error updating record: " . mysqli_error($conn);
    }
}

include("nav.php");
error_reporting(0);
?>
<html>
<head>
    <title>Customer Edit</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            float:left;
        }
        .form-container {
            width: 55%;
            float:left;
        }
        #edit{
           float:right;
           display:flex;
        }
        .container{
            margin:0 0 0 220px;
        }
        #edit{
            margin-right:265px;
        }
    </style>
</head>
<body>  
<div class="container">
    <div class="form-container">
        <form method="post" autocomplete="off" onsubmit="return validation()" id="form">
            <h1 id="h"><b><u>Customer Edit</u></b></h1>
            <table>
                <tr>
                    <th>Customer Number</th>
                    <td>
                        <input type="text" name="cno" value="<?php echo $cno; ?>" placeholder="customer number" readonly><br>
                        <span id="cnoo"></span>
                    </td>
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td>
                        <input type="text" name="cname" value="<?php echo $cname; ?>" placeholder="Customer Name"><br>
                        <span id="cnamee"></span>
                    </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>
                        <input type="radio" id="male" name="gender" value="Male" <?php if($gender == 'Male') echo 'checked'; ?>>
                        <label for="name">Male</label>
                        <input type="radio" id="female" name="gender" value="Female" <?php if($gender == 'Female') echo 'checked'; ?>>
                        <label id="k" for="name">Female</label>
                    </td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>
                        <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone Number"><br>
                        <span id="phonee"></span>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" rows="3" cols="30" id="addresss" placeholder="Address"><?php echo $address; ?></textarea></td>
                </tr>
                <tr>
                    <th>Credit Limit</th>
                    <td>
                        <input type="text" name="credit" value="<?php echo $credit; ?>" placeholder="Credit Limit"><br>
                        <span id="creditt"></span>    
                    </td>
                </tr>
                <tr>
                    <th>Balance</th>
                    <td>
                        <input type="text" name="balance" value="<?php echo $balance; ?>" placeholder="Balance"><br>
                        <span id="balancee"></span>    
                    </td>
                </tr>
                <tr><td align="center" colspan="2"><input type="submit" id="btn" name="submit"></td></tr>
            </table>
        </form>
    </div>
    </div>
    <div class="table-container">
        <h2 id=h2">Customer Details</h2>
        <table id="edit" border="1">
            <tr>
                <th>Customer Number</th>
                <th>Customer Name</th>
            </tr>
            <?php
            // Fetch all customers from the database
            $query = "SELECT * FROM cus";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><a href='{$_SERVER['PHP_SELF']}?cno=" . $row['cusid'] . "'>" . $row['cusid'] . "</a></td>";
                echo "<td>" . $row['cusname'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>


</body>
</html>
