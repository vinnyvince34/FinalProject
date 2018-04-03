<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mytix-User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">


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

    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    .tabcontent {
        display: none;
        padding: 6px 12px;
        margin: auto;
    }

    input{
        color: aliceblue;
        background-color: #27363b;
        border: none;
        border-bottom: 2px solid aliceblue;
    }

    input:focus{
        transition: width 0.4s ease-in-out;
        -webkit-transition: width 0.4s ease-in-out;
        width: 100%;
    }

</style>
<script>
    function tabbed(evt, tab) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(tab).style.display = "block";
            evt.currentTarget.className += " active";
        }

    window.onload = function() {
        tabbed(event, 'LogIn');
    };
</script>
<body style="background-color: #27363b">
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
    <br>
    <div style="color:aliceblue; width:80%; position:relative; margin:auto">
        <div class="tab" style="text-align:center">
            <button class="tablinks" onclick="tabbed(event, 'SignUp')" style="color:black">Sign Up</button>
            <button class="tablinks" onclick="tabbed(event, 'LogIn')" style="color:black">Log In</button>
        </div>
        <div id="SignUp" class="tabcontent">
            <h3>Sign Up</h3>
            <hr>
            <form action="">
                <h5>First Name</h5>
                <input type="text" value="" name="firstName" style="color:black" require>
                <h5>Last Name</h5>
                <input type="text" value="" name="lastName" style="color:black" require>
                <h5>Email</h5>
                <input type="email" value="" name="email" style="color:black" require>
                <h5>Password</h5>
                <input type="password" value="" name="password" style="color:black" require>
                <h5>Phone Number</h5>
                <input type="text" value="" name="phone" style="color:black" require>
                <h5>Gender</h5>
                <select name="" id="" style="color:black">
                    <option value="" selected disabled>Select</option>
                    <option value="">Male</option>
                    <option value="">Female</option>
                </select>
                <h5>Birth date</h5>
                <input type="date" name="bday"><br>
                <h5>City</h5>
                <input type="text" name="city"><br>
                <br><br>
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%; background-color: grey; border: 2px solid black">
            </form>
        </div>
        <div id="LogIn" class="tabcontent">
            <h3>Log In</h3>
            <hr>
            <form action="">
                <h5>Email</h5>
                <input type="email" value="" name="email" style="color:black" require>
                <h5>Password</h5>
                <input type="password" value="" name="password" style="color:black" require>
                <br><br>
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%; background-color: grey; border: 2px solid black">
            </form>
        </div>
    </div>
</body>
</html>
