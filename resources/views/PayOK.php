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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</head>
<style>
    @font-face {
        font-family: logoFont;
        src: url(../views/assets/fonts/SIMPLIFICA.ttf);
    }

    @font-face {
      font-family: navbarFont;
      src: url(../views/assets/fonts/SIMPLIFICA.ttf);
    }

    @font-face {
      font-family: searchFont;
      src: url(../views/assets/fonts/SIMPLIFICA.ttf);
    }

    body {
      background-size: cover;
    }

    .logo {
      font-family: logoFont;
      font-size: 36px;
    }

    .navs {
      font-family: navbarFont;
      font-size: 26px;
    }

    .Header {
      font-family: logoFont;
      font-size: 36px;
    }

    .search {
      font-family: searchFont;
      font-size: 20px;
    }
</style>
<script>

</script>
<body style="color:aliceblue; background-color: #27363b">
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="Main.php">JAVTix</a>
            </div>
            <ul class="nav navbar-nav navs">
            <li class="view zoom">
                <a href="#myCarousel"><span class="glyphicon glyphicon-home"></span></a>
            </li>
            <li class="navs view zoom">
                <a href="#mov">Movies</a>
            </li>
            <li class="navs view zoom">
                <a href="#toggleButton">Cinema</a>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right navs view zoom">
                <li>
                    <a href="User.php">
                        <span class="glyphicon glyphicon-user"></span> User</a>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        <h2 style="text-align:center; margin: 20px 0px 20px 0px">Transaction was a success!</h2>
    </div>
    <div style="position:absolute; left:45%">
        <a href="Main.php">
            <button>Return to main page</button>
        </a>
    </div>
</body>
</html>