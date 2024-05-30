<?php
include("cusconnection.php");
include("nav.php");
error_reporting(0);
?>

<html>
    <head>
        <title>Product Add</title>
        <link rel="stylesheet" href="customer.css">
        <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
 
    <body>
        <form name="add" action="#" onsubmit="validateForm()">
        <h1 id="h"><center><b><u>Product Add</center></u></b></h1>
   
        <center>
      <div class="container">
            <table>
            <tr>
                    <th>Category</th>
                    <td><select id="items" name="items">
                        <option value="rice" selected>Rice</option>
                        <option value="spices">Spices</option>
                        <option value="flour">flour</option>
                        <option value="oil">oil</option>
                        <!-- Add more options as needed -->
                    </select></td>
                   
                
                </tr>
                <tr>
                    <th>Product Number</th>
                    <td><input type="text" name="pno" placeholder="product number"><br><span id="pnoo"></span></td>
                   
                
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td><input type="text" name="pname" placeholder="Product Name"><br><span id="pnamee"></span></td>
                </tr>
            
               
                <tr>
                    <th>Unit</th>
                    <td><select id="units" name="units">
                        <option value="Kilogram" selected>Kilogram</option>
                        <option value="Gram">Gram</option>
                        <option value="Litre">Litre</option>
                        <option value="MilliLitre">MilliLitre</option>
                        <!-- Add more options as needed -->
                    </select></td>
                </tr>
                <tr>
                <th>Who supply</th>
                <td>
                    <?php
                        $con=mysqli_connect("localhost","root","","hema");
                        $s=mysqli_query($con,"select * from sup");
                    ?>
                    <select name="who">
                        <?php
                            while($r=mysqli_fetch_array($s)){
                                ?>
                                <option><?php echo $r['sname'];?></option>
                            <?php
                            }
                        ?>
                    </select>
                </td>
                </tr>
                <tr>
                    <th>Unit Price</th>
                    <td><input type="text" name="price" placeholder="price"><br><span id="pricee"></span></td>
                </tr>
                
                <tr><td align="center" colspan="2"><a href="sign.html"><input type="submit" id="btn" name="submit"></a></td></tr>
                       </table>
      </div>
</form>  
                

            
<script type="text/javascript">
            function validation(){
                var pno=document.getElementById('pno').value;
                var pname=document.getElementById('pname').value;
                //var who=document.getElementById('who').value;
                if(pno==""){
                        document.getElementById('pnoo').innerHTML="Please enter the customer number";
                        return false;
                    }
                    else{
                        document.getElementById('pnoo').innerHTML="";
                    }


                    if(pname==""){
                        document.getElementById('pnamee').innerHTML="Please enter the product name";
                        return false;
                    }
                    
                    if(!isNaN(pname)){
                        document.getElementById('pnamee').innerHTML="Please enter the alphabets only";
                    return false;
                    }
                    else{
                        document.getElementById('pnamee').innerHTML="";
                    }
                    
            }
        </script>

            
           


    </body>
</html>

<?php
if($_GET['submit'])
{
$cat=$_GET['items'];
$sn=$_GET['pno'];
$sna=$_GET['pname'];

$ad=$_GET['units'];
$gs=$_GET['who'];
$up=$_GET['price'];



$query="insert into pro values('$cat','$sn','$sna','$ad','$gs','$up')";
$data=mysqli_query($conn,$query);
//conn is the name in the connection file
if($data)
{
    echo "Data inserted into Database";
}
else{
   echo  "Failed to insert Data into Database";
}
}
?>