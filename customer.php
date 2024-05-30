<?php
include("cusconnection.php");
include("nav.php");
error_reporting(0);
?>
<html>
    <head>
        <title>Customer Add</title>
        <link rel="stylesheet" href="customer.css">
        <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
 
    <body>
        
        <form action="#" autocomplete="off" onsubmit="return validation()">
        <h1 id="h"><center><b><u>Customer Add</center></u></b></h1>
   
        <center>
      <div class="container">
            <table>
                <tr>
                    <th>Customer Number</th>
                    <td>
                    <input type="text" name="cno" placeholder="customer number" required><br><span id="cnoo"></span>
                </td>
                
                </tr>
                <tr>
                    <th>Customer Name</th>
                    <td>
                    <input type="text" name="cname" placeholder="Customer Name"><br><span id="cnamee"></span>
                    </td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input type="radio" id="male" name="gender" value="Male">
                    <label for="name">Male</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label id="k"for="name">Female</label>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>
                    <input type="text" name="phone" placeholder="Phone Number" required><br><span id="phonee"></span>
                </td>
                </tr>
               
                <tr>
                    <th>Address</th>
                    <td><textarea name="address" rows="3" cols="30" id="addresss" placeholder="Address"></textarea></td>
                </tr>
                <tr>
                    <th>Credit Limit</th>
                    <td>
                    <input type="text" name="credit" placeholder="Credit Limit"><br><span id="creditt"></span>    
                    
                </tr>
                <tr>
                    <th>Balance</th>
                    <td>
                    <input type="text" name="balance" placeholder="Balance"><br><span id="balancee"></span>    
                   
                </tr>
                <tr><td align="center" colspan="2"><a href="sign.html"><input type="submit" id="btn" name="submit"></a></td></tr>
            </table>
            
            
</form>
<script type="text/javascript">
            function validation(){
                var cno=document.getElementById('cno').value;
                var cname=document.getElementById('cname').value;
                var phone=document.getElementById('phone').value;
                    if(cno==""){
                        document.getElementById('cnoo').innerHTML="Please enter the customer number";
                        return false;
                    }
                    else{
                        document.getElementById('cnoo').innerHTML="";
                    }

                    if(cname==""){
                        document.getElementById('cnamee').innerHTML="Please enter the user name";
                        return false;
                    }
                    
                    if(!isNaN(cname)){
                        document.getElementById('cnamee').innerHTML="Please enter the alphabets only";
                    return false;
                    }
                    else{
                        document.getElementById('cnamee').innerHTML="";
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
$cn=$_GET['cno'];
$cna=$_GET['cname'];
$ge=$_GET['gender'];
$ph=$_GET['phone'];
$ad=$_GET['address'];
$cre=$_GET['credit'];
$ba=$_GET['balance'];


$query="insert into cus values('$cn','$cna','$ge','$ph','$ad','$cre','$ba')";
$data=mysqli_query($conn,$query);
//conn is the name in the connection file
if($data)
{
    echo "New Customer Added";
}
else{
   echo  "Failed to insert Data into Database";
}
}