<?php
include("cusconnection.php");
$pno = $cat = $pname = $unit = $who = $stock = "";
$deletemessage = ""; // Initialize delete message variable

// Check if product number is provided and fetch product details
if(isset($_GET['pno'])) {
    $pno = $_GET['pno'];
    $query = "SELECT * FROM pro WHERE pno = '$pno'";
    $result = mysqli_query($conn, $query);
    
    if($row = mysqli_fetch_assoc($result)) {
        $cat = $row['category'];
        $pname = $row['pname'];
        $unit = $row['unit'];
        $who = $row['whosupply'];
        $stock = $row['stock'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Check if deletion button is clicked
    if(isset($_POST['delete'])) {
        // Retrieve product number
        $pno = $_POST['pno'];

        // Prepare delete query
        $query = "DELETE FROM pro WHERE pno='$pno'";

        // Execute query
        if (mysqli_query($conn, $query)) {
            $deletemessage = "Record deleted successfully";
        } else {
            $deletemessage = "Error deleting record: " . mysqli_error($conn);
        }
    } 
}

include("nav.php");
error_reporting(0);
?>
<html>
    <head>
        <title>Product Delete</title>
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
            <form name="add" action="#" method="POST" onsubmit="validateForm()">   
                <center>
                    <h1 id="h"><center><b><u>Product Delete</center></u></b></h1>
                    <table>
                        <tr>
                            <th>Category</th>
                            <td>
                                <select id="items" name="category">
                                    <option value="rice" <?php if ($cat == 'rice') echo 'selected'; ?>>Rice</option>
                                    <option value="spices" <?php if ($cat == 'spices') echo 'selected'; ?>>Spices</option>
                                    <option value="flour" <?php if ($cat == 'flour') echo 'selected'; ?>>Flour</option>
                                    <option value="oil" <?php if ($cat == 'oil') echo 'selected'; ?>>Oil</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Product Number</th>
                            <td><input type="text" name="pno" placeholder="product number" value="<?php echo $pno; ?>"><br><span id="pnoo"></span></td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td><input type="text" name="pname" placeholder="Product Name" value="<?php echo $pname; ?>"><br><span id="pnamee"></span></td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td>
                                <select id="units" name="unit">
                                    <option value="Kilogram" <?php if ($unit == 'Kilogram') echo 'selected'; ?>>Kilogram</option>
                                    <option value="Gram" <?php if ($unit == 'Gram') echo 'selected'; ?>>Gram</option>
                                    <option value="Litre" <?php if ($unit == 'Litre') echo 'selected'; ?>>Litre</option>
                                    <option value="MilliLitre" <?php if ($unit == 'MilliLitre') echo 'selected'; ?>>MilliLitre</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Who supply</th>
                            <td>
                                <select name="whosupply">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","hema");
                                    $s=mysqli_query($con,"select * from sup");
                                    while($r=mysqli_fetch_array($s)){
                                        ?>
                                        <option value="<?php echo $r['sname']; ?>" <?php if ($r['sname'] == $who) echo 'selected'; ?>><?php echo $r['sname'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Stock</th>
                            <td><input type="text" name="stock" placeholder="Stock" value="<?php echo $stock; ?>"><br><span id="stockk"></span></td>
                        </tr>
                        <tr>
                            
                                <tr><td align="center" colspan="2"><a href="sign.html"><input type="submit" id="btn" name="submit"></a></td></tr>
                        </tr>
                    </table>
                </center>
            </form>  
        </div>
        <div class="table-container">
            <h2><u>Product Details</u></h2>
            <table id="edit" border="1">
                <tr>
                    <th>Product Number</th>
                    <th>Product Name</th>
                </tr>
                <?php
                // Fetch all products from the database
                $query = "SELECT * FROM pro";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><a href='{$_SERVER['PHP_SELF']}?pno=" . $row['pno'] . "'>" . $row['pno'] . "</a></td>";
                    echo "<td>" . $row['pname'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <?php
        // Display delete message
        if (!empty($deletemessage)) {
            echo "<p>$deletemessage</p>";
        }
        ?>
    </body>
</html>
