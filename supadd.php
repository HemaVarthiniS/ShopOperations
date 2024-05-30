<?php
include("cusconnection.php");
include("nav.php");
error_reporting(0);
?>

<html>
    <head>
        <title>Supplier Add</title>
        <link rel="stylesheet" href="customer.css">
        <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
 
    <body>
        
    <form action="#" autocomplete="off" onsubmit="return validation()">
        <h1 id="h"><center><b><u>Supplier Add</center></u></b></h1>
   
        
      <div class="container">
            <table>
                <tr>
                    <th>Supplier Number</th>
                    <td><input type="text" name="sno" placeholder="Supplier number"><br><span id="snoo"></span></td>
                   
                
                </tr>
                <tr>
                    <th>Supplier Name</th>
                    <td><input type="text" name="sname" placeholder="Supplier Name"><br><span id="snamee"></span></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><input type="text" name="phone" placeholder="Phone Number"><br><span id="phonee"></span></td>
                </tr>
               
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" rows="3" cols="30" id="addresss" placeholder="Address"></textarea></td>
                </tr>
                <tr>
                    <th>GST Number</th>
                    <td><input type="text" name="gst" placeholder="GST Number"><br><span id="gstt"></span></td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td><input type="text" name="product" placeholder="product"><br><span id="productt"></span></td>
                </tr>
                <tr><td align="center" colspan="2"><a href="sign.html"><input type="submit" id="btn" name="submit"></a></td></tr>
            </table>
      </div>        
    </form>
    <script type="text/javascript">
            function validation(){
                var sno=document.getElementById('sno').value;
                var sname=document.getElementById('sname').value;
                var phone=document.getElementById('phone').value;
                    if(sno==""){
                        document.getElementById('snoo').innerHTML="Please enter the customer number";
                        return false;
                    }
                    else{
                        document.getElementById('snoo').innerHTML="";
                    }

                    if(sname==""){
                        document.getElementById('snamee').innerHTML="Please enter the user name";
                        return false;
                    }
                    
                    if(!isNaN(cname)){
                        document.getElementById('snamee').innerHTML="Please enter the alphabets only";
                    return false;
                    }
                    else{
                        document.getElementById('snamee').innerHTML="";
                    }
                    if(phone==""){
                        document.getElementById('phonee').innerHTML="Please enter the user name";
                    }
                    if(isNaN(phone)){
                        document.getElementById('phonee').innerHTML="Please enter the number only";
                    return false;
                    }
                    if(phone.length<10){
                        document.getElementById('phonee').innerHTML="Please enter 10 digits character in the box";
                    return false;
                    }
                    if(phone.length>10){
                        document.getElementById('phonee').innerHTML="Please enter 10 digits character in the box";
                    return false;
                    }
                    else{
                        document.getElementById('phonee').innerHTML="";
                    }
            }
        </script>

            
           
    </body>
</html>

<?php
if($_GET['submit'])
{
$sn=$_GET['sno'];
$sna=$_GET['sname'];
$ph=$_GET['phone'];
$ad=$_GET['address'];
$gs=$_GET['gst'];
$pro=$_GET['product'];


$query="insert into sup values('$sn','$sna','$ph','$ad','$gs','$pro')";
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