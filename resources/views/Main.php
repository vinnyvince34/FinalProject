<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mytix-Main</title>
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

    footer {
      text-align: center;
    }

    .logo {
      font-family: logoFont;
      font-size: 32px;
    }

    .logoFooter {
      pointer-events: none;
    }

    .ads {
      width: 100%;
    }

    .view {
        transition: transform .2s;
        margin: 0 auto;
    }

    .view:hover{
        transform: scale(1.5);
        filter: saturate(50%);
    }

    .navbar {
      margin-bottom: 0;
    }

    .container-search {
      margin-left: 570px;
      width: auto;
      text-align: center;
    }

    #hide{
        width: 100%;
        text-align: center;
        margin-top: 20px;
        display: none;
    }

    #toggleButton
    {
        position:relative; left:50%;
        color:aliceblue;
    }

    a:link
    {
        color:aliceblue;
        text-decoration: none;
    }

    a:visited
    {
        color:aliceblue;
        text-decoration: none;
    }

    a:hover
    {
        color:aliceblue;
        cursor: pointer;
        text-decoration: none;
    }
</style>
<script>
    var status = "more";
    function Show() {
        if (status == "less") {
            document.getElementById("toggleButton").innerText = "See Less";
            status = "more";
            var x = document.getElementById("hide");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        } else if (status == "more") {
            document.getElementById("toggleButton").innerText = "See More";
            status = "less"
            var x = document.getElementById("hide");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    }
</script>
<body style="background-color: #27363b">
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:100%">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner">
        <div class="item active" align="middle" style="height:700px">
            <img src="Mov1.jpg" style="width:110%; position:absolute; top:-30%">
            <div class="carousel-caption">
                <h3>Star Wars: The New Hope</h3>
            </div>
        </div>

        <div class="item" align="middle" style="height:700px;">
            <img src="Mov2.jpg" style="width:120%; position:absolute; top:-80%">
            <div class="carousel-caption">
                <h3>Star Wars: The Empire Strikes Back</h3>
            </div>
        </div>

        <div class="item" align="middle" style="height:700px">
            <img src="Mov3.jpg" style="position:absolute; top:-90%">
            <div class="carousel-caption">
                <h3>Star Wars: Revenge of the Jedi</h3>
            </div>
        </div>

        <div class="item" align="middle" style="height:700px">
            <img src="Mov4.jpg" style="position:absolute; top:-20%">
            <div class="carousel-caption">
                <h3>Back From the Future</h3>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand logo" href="Main.php">JAVTix</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="view zoom">
              <a href="#myCarousel"><span class="glyphicon glyphicon-home"></span></a>
          </li>
          <li class="view zoom">
              <a href="#mov">Movies</a>
          </li>
          <li class="view zoom">
              <a href="#toggleButton">Cinema</a>
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
<nav class="navbar navbar-inverse">
  <div class="container-search">
    <ul class="nav navbar-nav">
      <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Select Movie...
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="#">Action</a>
         <a class="dropdown-item" href="#">Another action</a>
         <a class="dropdown-item" href="#">Something else here</a>
       </div>
     </li>
     <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select City...
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
      <li>
        <a href="#" class="btn view zoom"><span class="glyphicon glyphicon-search">Search</span></a>
      </li>
    </ul>
  </div>
</nav>
<div style="color:aliceblue">
    <h2 id="mov" style="text-align:center">Now Playing</h2>
    <hr>
    <div class="row" style="width:100%" align="center">
        <div class="col-sm-3">
            <a href="Movie.php"><img src="Mov5.jpg" class="view"></a>
        </div>
        <div class="col-sm-3">
            <img src="Mov6.jpg" class="view">
        </div>
        <div class="col-sm-3">
            <img src="Mov7.jpg" class="view">
        </div>
        <div class="col-sm-3">
            <img src="Mov8.jpg" class="view">
        </div>
        <br>
    <br>
    </div>
    <div id="hide" style="padding:10pt 0pt 0pt 0pt">
        <div class="row" style="width:100%" align="center">
            <div class="col-sm-3">
                <img src="Mov9.jpg" class="view">
            </div>
            <div class="col-sm-3">
                <img src="Mov10.jpg" class="view">
            </div>
            <div class="col-sm-3">
                <img src="Mov11.jpg" class="view">
            </div>
            <div class="col-sm-3">
                <img src="Mov12.jpg" class="view">
            </div>
        </div>
    </div>
    <br>
    <a id="toggleButton" onclick="Show()" href="javascript:void(0);">See More</a>
    <h2 style="text-align:center">Cinemas</h2>
    <hr>
    <div class="row" style="width:100%" align="center">
        <div class="col-sm-6">
            <img src="CGV.png" class="view">
        </div>
        <div class="col-sm-6">
            <img src="XXI.png" class="view">
    </div>
    <br>
    <h2 id="promo" style="text-align:center">Promotion</h2>
    <hr style="width:101%">
    <h2 id="ads" style="text-align:center">Ads</h2>
    <br>
    <br>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:101%">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active" align="middle">
                <img src="ad1.png">
            </div>
        </div>

        <div class="carousel-inner">
            <div class="item" align="middle">
                <img src="ad2png">
            </div>
        </div>

        <div class="carousel-inner">
            <div class="item" align="middle">
                <img src="ad3.png">
            </div>
        </div>

        <div class="carousel-inner">
            <div class="item" align="middle">
                <img src="ad4.png">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <hr style="width:101%">
    <footer>
      <p>COPYRIGHT 2018. JAVTix ALL RIGHTS RESERVED.</p>
    </footer>
</div>
</body>
</html>
