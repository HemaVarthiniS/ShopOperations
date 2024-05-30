<?php
// Include FPDF library
require('./fpdf186/fpdf.php');

// Include database connection
include("cusconnection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];

    // Retrieve sales data within the specified date range from the database
    $query = "SELECT * FROM sales WHERE sdate BETWEEN '$fromDate' AND '$toDate'";
    $result = mysqli_query($conn, $query);

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font for the document
    $pdf->SetFont('Arial', 'B', 12);

    // Add a title to the PDF
    $pdf->Cell(0, 10, 'Sales Report', 0, 1, 'C');

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Set font for table headers
        $pdf->SetFont('Arial', 'B', 10);

        // Add table headers
        $pdf->Cell(30, 10, 'Sales Date', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Customer Name', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Product Number', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Product Name', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Quantity', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Unit Price', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Total Price', 1, 1, 'C');

        // Set font for table rows
        $pdf->SetFont('Arial', '', 10);

        // Add table data
        while ($row = mysqli_fetch_assoc($result)) {
            $pdf->Cell(30, 10, $row['sdate'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['cname'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['pno'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['pname'], 1, 0, 'C');
            $pdf->Cell(20, 10, $row['qua'], 1, 0, 'C');
            $pdf->Cell(20, 10, $row['uprice'], 1, 0, 'C');
            $pdf->Cell(30, 10, $row['tprice'], 1, 1, 'C');
        }
    } else {
        // If no data available, display a message
        $pdf->Cell(0, 10, 'No sales data available for the selected date range.', 0, 1, 'C');
    }

    // Output the PDF
    $pdf->Output();

    // Close the database connection
    mysqli_close($conn);
}
include("nav.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="date"] {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 8px 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Select Date Range</h2><center><p>(for sales)</p></center>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="fromDate">From:</label>
        <input type="date" id="fromDate" name="fromDate">
        <label for="toDate">To:</label>
        <input type="date" id="toDate" name="toDate">
        <input type="submit" value="Generate Report">
    </form>
</body>
</html>
