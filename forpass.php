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
    <div class="flat-formforgot">
        <ul class="tabs">
            <li>
                <a href="#forpass" class="active">Forgot Password</a>
            </li>
        </ul>
        <div id="forpass" class="form-action show">
            <h1>Forgot Password</h1>

            <form method="post" action="passcode.php" name="forgot">
                <ul>
                    <li>
                        <input type="text" placeholder="Enter Your Email Address" name="email"/>
                    </li>                    <li>
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