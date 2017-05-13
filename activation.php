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
    <div class="flat-formact">
        <ul class="tabs">
            <li>
                <a href="#activate" class="active">Activate</a>
            </li>
        </ul>
        <div id="activate" class="form-a ction show">
            <h1>Activate Account</h1>

            <form method="post" action="emailconfirmation.php" name="login">
                <ul>
                    <li>
                        <input type="text" placeholder="Email Address" name="email"/>
                    </li>
                    <li>
                        <input type="password" placeholder="Password" name="password"/>
                    </li>
                    <li>
                        <input type="text" placeholder="Activation Code" name="actcode"/>
                    </li>
                    <li>
                        Year Graduate:
                        <select name="year" placeholder="Year Graduate">
                            <option></option>
                            <?php yearSelect(); ?>
                        </select>
                    </li>
                    <li>
                        <input type="submit" name="submit" value="Activate" class="button" />
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