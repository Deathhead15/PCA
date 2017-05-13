<?php
if(isset($_SESSION['is_valid'])){
    unset($_SESSION['is_valid']);
}

if(isset($_COOKIE['user'])){
    unset($_COOKIE['user']);
}
require_once 'connect.php';
setcookie('try', 3);
$try = $_COOKIE['try'];

if(isset($_POST["submit"]) && !empty($_POST["submit"])) {

    $chkemail = $_POST['email'];
    $chkpass = $_POST['password'];
    $chyear = $_POST['year'];


    $select_db = mysqli_select_db($conn, 'batch') or die($dberror2);

        $query = mysqli_query($conn, "SELECT * FROM `$chyear` WHERE email='$chkemail'");
        $numrows = mysqli_num_rows($query);
        if($numrows!==0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
                $dbemail = $row['email'];
                $dbpassword = $row['password'];
                $dbactivated = $row['activated'];

            }

            if($chkemail==$dbemail&&$chkpass==$dbpassword)
            {
                if($dbactivated!=1)
                {
                    echo '<script language="javascript">';
                    echo 'alert("Account not yet activated");';
                    echo '</script>';
                    header("Location:activation.php");
                    exit;
                } else
                {
                    echo '<script language="javascript">';
                    echo 'alert("You are logged in!");';
                    echo '</script>';
                    @$_SESSION ['username'] = $dbusername;
                    $_SESSION['is_valid'] = true;
                    setcookie('user', $dbemail);
                    header("Location:../pca/index.php");
                }
            }
            else {

                echo '<script language="javascript">';
                echo 'alert("You have inputted an invalid username, password or batch year! \n You have ' . $try . ' tries left!");' ;
                echo '</script>';
            }
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("User does not exists!")';
            echo '</script>';
        }
}

    function yearSelect()
    {
        for($x=2015; $x>=1960; $x--)
        {
            echo '<option value="' .$x . '">' . $x . '</option>';
        }
    }

?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Pasay City Academy</title>
        <link rel="stylesheet" href="css/style.css">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Pasay City Academy</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<script type="text/javaScript">
        var msgfname = "";
        var msglname = "";
        var msgmail = "";
        var msgpass = "";
        var msgpass2 = "";
        var msgpass1 = "";
        var pm = "";
        var check=0;

        function focusFunc(name) {
            document.getElementsByName(name)[0].style.backgroundColor = "yellow";
        }

        function checkPass1() {
            p1 = document.getElementsByName("pass1")[0].value;
            if (p1 == null || p1 == ""){
                msgpass1 = "Password is Required";
                document.getElementById("left").innerHTML = msgpass1;
                document.getElementsByName("pass1")[0].style.backgroundColor = "red";
                msgpass = msgpass1;
            } else if (p1.length < 3 || p1.length > 8 ){
                msgpass1 = "Password is either less then 3 characters or more than 8 characters";
                document.getElementById("left").innerHTML = msgpass1;
                document.getElementsByName("pass1")[0].style.backgroundColor = "red";
                msgpass = msgpass1;
            } else {
                document.getElementsByName("pass1")[0].style.backgroundColor = "lightgreen";
                document.getElementById("left").innerHTML = "";
                msgpass1 = p1;
                check +=1 ;
            }
        }

        function checkFname()
        {
            var x = document.getElementsByName("firstname")[0].value;
            if (x == null || x == "") {
                document.getElementsByName("firstname")[0].style.backgroundColor = "red";
                msgfname = "Firstname should be filled out";
                document.getElementById("left").innerHTML = msgfname;
            } else if (x.length < 3) {
                
                document.getElementsByName("firstname")[0].style.backgroundColor = "red";
                msgfname = "Firstname should more than two characters";
                document.getElementById("left").innerHTML = msgfname;
            } else {
                document.getElementsByName("firstname")[0].style.backgroundColor = "lightgreen";
                document.getElementById("left").innerHTML = "";
                msgfname = x;
                check +=1 ;
            }
        }

        function checkLname()
        {
            var x = document.getElementsByName("lastname")[0].value;
            if (x == null || x == "") {
                document.getElementsByName("lastname")[0].style.backgroundColor = "red";
             
                msglname = "Lastname should be filled out";
                document.getElementById("left").innerHTML = msglname;
            } else if (x.length < 3) {
                document.getElementsByName("lastname")[0].style.backgroundColor = "red";
               
                msglname = "Lastname should more than two characters";
                document.getElementById("left").innerHTML = msglname;
            } else {
                
                document.getElementsByName("lastname")[0].style.backgroundColor = "lightgreen";
                document.getElementById("left").innerHTML = "";
                msglname = x;
                check +=1 ;
            }
        }

        function checkEmail()
        {
            mail = document.getElementsByName("email")[0].value;
            valid = document.getElementsByName("email")[0].getAttribute("pattern");
            if (mail == null || mail == ""){
                msgmail = "Email Address is Required";
                document.getElementById("left").innerHTML = msgmail;
                document.getElementsByName("email")[0].style.backgroundColor = "red";
            } else if (mail.search(valid) == -1)
            {
                msgmail = "Invalid Email Address";
                document.getElementById("left").innerHTML = msgmail;
                document.getElementsByName("email")[0].style.backgroundColor = "red";
            } else {
                document.getElementById("left").innerHTML = "";
                document.getElementsByName("email")[0].style.backgroundColor = "lightgreen";
                msgmail = mail;
                check +=1 ;
            }
        }

        function checkPass()
        {
            p1 = document.getElementsByName("pass1")[0].value;
            p2 = document.getElementsByName("pass2")[0].value;
            if (p2 == null || p2 == ""){
                msgpass2 = "Password Confirmation is Required";
                document.getElementById("left").innerHTML = msgpass2;
                msgpass = msgpass2;
                document.getElementsByName("pass2")[0].style.backgroundColor = "red";
               
            } else if (p1.search(p2) == -1)
            {
                msgpass = "Password dont match";
                document.getElementById("left").innerHTML = msgpass;
                document.getElementsByName("pass1")[0].style.backgroundColor = "red";
                document.getElementsByName("pass2")[0].style.backgroundColor = "red";
            } else {
                document.getElementById("left").innerHTML = "";
                document.getElementsByName("pass2")[0].style.backgroundColor = "lightgreen";
                msgpass = "Password Match";
                check +=2 ;
            }
        }

        function checkCell()
        {

            var x = document.getElementsByName("cellphone")[0].value;
            if (x == null || x == "") {
                document.getElementsByName("cellphone")[0].style.backgroundColor = "red";
                msglname = "Cellular Number should be filled out";
                document.getElementById("left").innerHTML = msglname;
            } else if (x.length < 3) {
                document.getElementsByName("cellphone")[0].style.backgroundColor = "red";
                msglname = "Cellular Number should more than two characters";
                document.getElementById("left").innerHTML = msglname;
            } else if (x.length > 12) {
                document.getElementsByName("cellphone")[0].style.backgroundColor = "red";
                msglname = "Cellular Number should not exceed twelve characters";
                document.getElementById("left").innerHTML = msglname;
            } else {
                document.getElementsByName("cellphone")[0].style.backgroundColor = "lightgreen";
                document.getElementById("left").innerHTML = "";
                msglname = x;
                check +=1 ;
            }
        }

        function checkPhone()
        {
            var x = document.getElementsByName("telephone")[0].value;
            if (x == null || x == "") {
                document.getElementsByName("telephone")[0].style.backgroundColor = "red";
                msglname = "Cellular Number should be filled out";
                document.getElementById("left").innerHTML = msglname;
            } else if (x.length < 3) {
                document.getElementsByName("telephone")[0].style.backgroundColor = "red";
                msglname = "Cellular Number should more than two characters";
                document.getElementById("left").innerHTML = msglname;
            } else if (x.length > 10) {
                document.getElementsByName("telephone")[0].style.backgroundColor = "red";
                msglname = "Cellular Number should not exceed twelve characters";
                document.getElementById("left").innerHTML = msglname;
            } else {
                document.getElementsByName("telephone")[0].style.backgroundColor = "lightgreen";
                document.getElementById("left").innerHTML = "";
                msglname = x;
                check +=1 ;
            }
        }

    if (check>=7){
            document.getElementsByName("register").disabled = false;
    } else {  document.getElementsByName("register").disabled = true;}



    </script>

    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Login</a>
                </li>
                <li>
                    <a href="#register">Register</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <h1>Login</h1>
                <form method="post" action="index.php" name="login">
                    <ul>
                        <li>
                            Email Address<input type="text" placeholder="E-mail Address" name="email"/>
                        </li>
                        <li>
                            Password<input type="password" placeholder="Password" name="password"/>
                        </li>
                        <li>
                            Year Graduated
                            <select name="year" placeholder="Year Graduate">
                                <option></option>
                               <?php yearSelect(); ?>
                            </select>
                        </li>
                        <li>
                            <input type="submit" name="submit" value="Login" class="button" />
                        </li>
                    </ul>
                    <a id="forgot"  href="forpass.php">Forgot Password</a>
                </form>
            </div>
            <!--/#login.form-action-->
            <div id="register" class="form-action hide">
                <h1>Register</h1>
                
                <form method="post" 
                      action="registration.php"
                      name="registration form">
                    <ul>
                        <li>
                            Email Address<input type="text" placeholder="E-mail Address (example@example.com)" name="emailreg" onfocus="focusFunc('email')" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required />
                        </li>
                        <li>
                            Firstname<input type="text" placeholder="Firstname (John)" name="firstname" onfocus="focusFunc('firstname')" onblur="checkFname()" required/>
                        </li>
						<li>
                            MaidenName (Woman) / LastName (Man)<input type="text" placeholder="Lastname (Smith)" name="lastname" onfocus="focusFunc('lastname')" onblur="checkLname()" required/>
                        </li>
                        <li>
                            Spouse LastName<input type="text" placeholder="Spouse Lastname (Doe)" name="marriedname" onfocus="focusFunc('marriedname')" onblur="checkLname()"/>
                        </li>
                        <li>
                            Address<textarea rows="1" cols="60" placeholder="Address" name="address" onfocus="focusFunc('address')" required/></textarea>
                        </li>
						<li>
                            Cellular Number<input type="text" placeholder="Cellular Number (09171234567)" onfocus="focusFunc('cellphone')" onblur="checkCell()" name="cellphone" required />
                        </li>
                        <li>
                            Telephone Number<input type="text" placeholder="Telephone Number (028887766)" onfocus="focusFunc('telephone')" onblur="checkPhone()" name="telephone" />
                        </li>
                        <li>
                            Date of Birth<input type="date" placeholder="Date of Birth" name="birthday" />
                        </li>
                        <li>
                            Password<input type="password" placeholder="Password"  name="pass1" onfocus="focusFunc('pass1')" onblur="checkPass1()" required/>
                        </li>
						<li>
                            Confirm Password<input type="password" placeholder="Confirm Password" name="pass2" onfocus="focusFunc('pass2')" onblur="checkPass()" required/>
                        </li>
                        <li>
                            Year Graduated
                            <select name="year" required>
                                <option></option>
                                <?php yearSelect(); ?>
                            </select>
                        </li>
                        <li>
                            <input type="submit" name="register" id="reg" value="Register" class="button"/>
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
            <div id = "left">
            </div>

        </div>

    </div>
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
