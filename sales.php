<?php
include("cusconnection.php");

$pno = $cat = $pname = $who = $up = "";

// Check if product number is provided and fetch product details
if (isset($_GET['pno'])) {
    $pno = $_GET['pno'];
    $query = "SELECT * FROM pro WHERE pno = '$pno'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $cat = $row['category'];
        $pname = $row['pname'];

        $who = $row['whosupply'];
        $up = $row['unitprice'];
    }
}

include("nav.php");
error_reporting(0);
?>
<html>
<head>
    <title>Sales</title>
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            margin: 0 0 0 220px;
            float: left;
        }

        .form-container {
            width: 45%;
            float: left;
        }

        #edit {
            float: right;
            display: flex;
        }

        #edit {
            margin-right: 265px;
        }

        h2 {
            font-size: 30px;
            font-family: "Times New Roman", Times, serif;
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 20px blue, 0 0 5px darkblue;
        }
    </style>
    <script>
        // Function to calculate total price
        function calculateTotalPrice() {
            var quantity = document.getElementById("quantity").value;
            var unitPrice = document.getElementById("unitPrice").value;
            var totalPrice = parseFloat(quantity) * parseFloat(unitPrice);
            document.getElementById("totalPrice").value = totalPrice.toFixed(2);
        }
    </script>
</head>

<body>
<div class="container">
    <form name="add" action="#" method="post">
        <center>
            <h1 id="h"><center><b><u>sales</u></b></center></h1>
            <table>
                <tr>
                    <th>purchase Date</th>
                    <td><input type="date" id="purchaseDate" name="date" required><br><span id="pnoo"></span>
                    </td>
                </tr>
               <tr>
                    <th>Customer</th>
                    <td>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "hema");
                        $s = mysqli_query($con, "SELECT * FROM cus");
                        ?>
                        <select name="name">
                            <?php
                            while ($r = mysqli_fetch_array($s)) {
                                ?>
                                <option><?php echo $r['cusname']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Product Number</th>
                    <td><input type="text" name="pno" placeholder="product number"
                               value="<?php echo $pno; ?>"><br><span id="pnoo"></span></td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td><input type="text" name="pname" placeholder="Product Name"
                               value="<?php echo $pname; ?>"><br><span id="pnamee"></span></td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td><input type="text" id="quantity" name="quantity" placeholder="Quantity"
                               oninput="calculateTotalPrice()" required></td>
                </tr>
                <tr>
                    <th>Unit Price</th>
                    <td><input type="text" id="unitPrice" name="unitprice" placeholder="Unit Price"
                               value="<?php echo $up; ?>"><br><span id="unitpricee"></span></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td><input type="text" id="totalPrice" name="total" placeholder="Total Price"
                               value="<?php echo $totalPrice; ?>"></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" id="btn" name="submit"></td>
                </tr>
            </table>
        </div>
    </form>
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
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><a href='{$_SERVER['PHP_SELF']}?pno=" . $row['pno'] . "'>" . $row['pno'] . "</a></td>";
                echo "<td>" . $row['pname'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
if ($_POST['submit']) {
    $date = $_POST['date'];
    $cn = $_POST['name'];
    $pnu = $_POST['pno'];
    $pna = $_POST['pname'];

    $qu = $_POST['quantity'];
    $unit = $_POST['unitprice'];
    $total = $_POST['total'];

    $query = "insert into sales values('$date','$cn','$pnu','$pna','$qu','$unit','$total')";
    $data = mysqli_query($conn, $query);
    //conn is the name in the connection file
    if ($data) {
        echo "Data inserted into Database";
    } else {
        echo "Failed to insert Data into Database";
    }
}
?>
