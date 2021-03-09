<?php
include("includes/db1.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>


    <style>
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: url() no-repeat;
    background-size: cover;
}
 
.container {
    width: 350px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #191970;
}
 
#div_login h1 {
    float: left;
    font-size: 40px;
    border-bottom: 4px solid #191970;
    margin-bottom: 50px;
    padding: 13px;
}
 
#div_login {
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    border-bottom: 1px solid #191970;
}

#div_login div{
    clear: both;
    margin-top: 10px;
    padding: 5px;
}
 
.fa {
    width: px;
    float: left;
    text-align: center;
}
 
#div_login input {
    border: none;
    outline: none;
    background: none;
    font-size: 18px;
}

#div_login input{
    width: 100%;
    padding: 8px;
    color: black;
    background: #d6d6d6;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    margin: 12px 0;
}

 
#div_login input[type=submit]{
    width: 100%;
    padding: 8px;
    color: #ffffff;
    background: none #191970;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    margin: 12px 0;
    transition: 1s;
}

#div_login input[type=submit]:hover{
    background: #5959b9;
    transition: 1s;
}

    </style>

</head>
<body>


<div class="container">
    <form method="post" action="">
        <div id="div_login">
            <h1>Admin Login</h1>
            <div>
                <input type="text" class="textbox" id="username" name="username" placeholder="Username" />
            </div>
            <div>
                <input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Submit" name="submit" id="submit" />
            </div>
        </div>
    </form>
</div>


</body>
</html>



<?php


if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from login where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: insert_product.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
  


?>