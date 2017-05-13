<?php

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
    <link rel="stylesheet" href="../css/style.css">
    <script>
        var msgpass = "";
        var msgpass2 = "";
        var msgpass1 = "";

        function checkPass()
        {
            p1 = document.getElementsByName("password")[0].value;
            p2 = document.getElementsByName("password2")[0].value;
            if (p2 == null || p2 == ""){
                msgpass2 = "Password Confirmation is Required";
                document.getElementById("left").innerHTML = msgpass2;
                msgpass = msgpass2;
                document.getElementsByName("password2")[0].style.backgroundColor = "red";

            } else if (p1.search(p2) == -1)
            {
                msgpass = "Password dont match";
                document.getElementById("left").innerHTML = msgpass;
                document.getElementsByName("password")[0].style.backgroundColor = "red";
                document.getElementsByName("password2")[0].style.backgroundColor = "red";
            } else {
                document.getElementById("left").innerHTML = "";
                document.getElementsByName("password2")[0].style.backgroundColor = "lightgreen";
                msgpass = "Password Match";
            }
        }

        function checkPass1() {
            p1 = document.getElementsByName("password")[0].value;
            if (p1 == null || p1 == ""){
                msgpass1 = "Password is Required";
                document.getElementById("left").innerHTML = msgpass1;
                document.getElementsByName("password")[0].style.backgroundColor = "red";
                msgpass = msgpass1;
            } else {
                document.getElementsByName("password")[0].style.backgroundColor = "lightgreen";
                document.getElementById("left").innerHTML = "";
                msgpass1 = p1;
            }
        }


    </script>

</head>

<body>


<html lang="en">
<head>
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
<body>

<div class="container">
    <div class="flat-formact">
        <ul class="tabs">
            <li>
                <a class="active">Forgot Password</a>
            </li>
        </ul>
        <div id="forgotform" class="form-action show">
            <h1>Password Reset</h1>

            <form method="post" action="passreset.php" name="login">
                <ul>
                    <li>
                        <input type="text" placeholder="Email Address" name="email"/>
                    </li>
                    <li>
                        <input type="password" placeholder="New Password" name="password" onblur="checkPass1()" required/>
                    </li>
                    <li>
                        <input type="password" placeholder="Confirm Password" name="password2" onblur="checkPass()" required/>
                    </li>
                    <li>
                        <input type="text" placeholder="Verification Code" name="actcode" required/>
                    </li>
                    <li>
                        Year Graduate:
                        <select name="year" placeholder="Year Graduate">
                            <option></option>
                            <?php yearSelect(); ?>
                        </select>
                    </li>
                    <li>
                        <input type="submit" name="submit" value="Reset" class="button" />
                    </li>
                </ul>
            </form>
        </div>
        <div id = "left">
        </div>
    </div>

</div>
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>

<script src="js/index.js"></script>




</body>
</html>