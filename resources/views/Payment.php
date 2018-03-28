<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JAVtix-Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    @font-face {
        font-family: logoFont;
        src: url(Englebert-Regular.ttf)
    }

    input{
        color: aliceblue;
        background-color: #27363b;
        border: none;
        border-bottom: 2px solid aliceblue;
        transition: width 0.4s ease-in-out;
        -webkit-transition: width 0.4s ease-in-out;
    }

    input:focus{
        width: 100%;
    }
</style>
<script>

</script>
<body style="background-color: #27363b">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Main.php">JAVtix</a>
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="Main.php">Home</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="User.php">
                        <span class="glyphicon glyphicon-user"></span> Sign Up</a>
                </li>
                <li>
                    <a href="User.php">
                        <span class="glyphicon glyphicon-log-in"></span> Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div style="color:aliceblue">
        <h3 style="text-align:center">Cart</h3>
        <hr>
        <div style="padding:10px 100px 10px 100px">
            <form action="PayOK.php">
                <h5>Credit Card Number</h5>
                <input type="text" value="" name="creditCardNumber" style="color:black" require>
                <h5>Address</h5>
                <input type="text" value="" name="address" style="color:black" require>
                <h5>Zip Code</h5>
                <input type="text" value="" name="address" style="color:black" require>
                <br>
                <br>
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%; background-color: grey; border: 2px solid black"> 
            </form>
        </div>
    </div>
</body>
</html>