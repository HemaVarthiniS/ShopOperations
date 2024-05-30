    <?php
    include("cusconnection.php");

    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Login</title>
            <link rel="stylesheet" href="syle.css">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        </head>
        <body>
        <div class="wrapper">
                <form name="form" action="index.php" onsubmit="return isvalid()" method="POST">
                    <h1>Login</h1>
                    <div class="input-box">
                        <input type="text" id="user" name="user" placeholder="Username" >
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" id="pass" name="pass" placeholder="Password" >
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
            <script>
        function isvalid() {
            var user = document.form.user.value;
            var pass = document.form.pass.value;

            if (user.length === 0 && pass.length === 0) {
                alert("Username and password fields are empty!!");
                return false;
            } else if (user.length === 0) {
                alert("Username field is empty!!");
                return false;
            } else if (pass.length === 0) {
                alert("Password field is empty!!");
                return false;
            }

            // Validation passed
            return true;
        }
    </script>


    <?php
    if(isset($_POST['user'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
            
            $sql="select * from login where username='$username' and password='$password'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count=mysqli_num_rows($result);
            if($count==1){
                header("Location:home.php");
                echo "hello";
            }
            else{
                echo '<script>
                window.location.href="index.php";
                alert("Login failed. Invalid username or password");
                </script>';
            }
            
            }
            
            ?>
        </body>
    </html>