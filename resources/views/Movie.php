<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mytix-Movie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    @font-face {
        font-family: logoFont;
        src: url(Englebert-Regular.ttf)
    }

    .text {
        display: block;
        width: 100px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    th, tr, td{
        padding-bottom: 10px;
    }

    input{
        color: aliceblue;
        background-color: #27363b;
        border: none;
        border-bottom: 2px solid aliceblue;
    }

    .seats{
        position: relative;
        left: 21.5%;
        text-align: center;
        border-spacing: 100px 20px;
        border-collapse: separate;
    }
</style>
<script>
    var app = angular.module("myApp", []);
    app.controller("myCtrl", function($scope) {
    $scope.seats = [
        {seatA:'A1',seatB:'B1',seatC:'C1',seatD:'D1',seatE:'E1'},
        {seatA:'A2',seatB:'B2',seatC:'C2',seatD:'D2',seatE:'E2'},
        {seatA:'A3',seatB:'B3',seatC:'C3',seatD:'D3',seatE:'E3'},
        {seatA:'A4',seatB:'B4',seatC:'C4',seatD:'D4',seatE:'E4'},
        {seatA:'A5',seatB:'B5',seatC:'C5',seatD:'D5',seatE:'E5'}
        ];
    });

    var timeByCategory = {
    xxi: ["10:00 - 12:30", "13:00 - 15:30", "16:00 - 18:30", "19:00 - 21:30","22:00 - 00:30"],
    cgv: ["10:10 - 12:40", "13:10 - 15:40", "16:10 - 18:40", "19:10 - 21:40","22:10 - 00:40"],
    }

    function changetime(value) {
        if (value.length == 0) document.getElementById("time").innerHTML = "<option></option>";
        else {
            var catOptions = "";
            for (var categoryId in timeByCategory[value]) {
                catOptions += "<option>" + timeByCategory[value][categoryId] + "</option>";
            }
            document.getElementById("time").innerHTML = catOptions;
        }
    }
</script>
<body ng-app="myApp" ng-controller="myCtrl" style="background-color: #27363b">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand logo" href="Main.php">JAVTix</a>
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="Main.php">Home</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="User.php">
                        <span class="glyphicon glyphicon-user"></span> User</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div style="color:aliceblue">
        <table cellspacing="10" style="position:relative; left:25%">
            <tr>
                <td>
                    <img src="Mov5.jpg" class="view">
                </td>
                <td>
                    <iframe width="500" height="350" src="https://www.youtube.com/embed/gCcx85zbxz4">
                    </iframe>
                </td>
            </tr>
        </table>
        <br>
        <table style="position:relative; left:25%; color:aliceblue">
            <tr>
                <td style="width:750px">
                    Officer K (Ryan Gosling), a new blade runner for the Los Angeles Police Department, unearths a long-buried secret that has
                    the potential to plunge what's left of society into chaos. His discovery leads him on a quest to find Rick Deckard
                    (Harrison Ford), a former blade runner who's been missing for 30 years.
                </td>
            </tr>
        </table>
        <h2 id="schedule" style="text-align:center">Schedule</h2>
        <hr>
        <div class="row" style="width:100%" align="center">
            <div class="col-sm-6">
                <table style="color:aliceblue">
                    <tr>
                        <th style="text-align:center">
                            <h3>CGV</h3>
                        </th>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            10:00 - 12:30
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            13:00 - 15:30
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            16:00 - 18:30
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            19:00 - 21:30
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            22:00 - 00:30
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <table style="color:aliceblue">
                    <tr>
                        <th style="text-align:center">
                            <h3>XXI</h3>
                        </th>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            10:10 - 12:40
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            13:10 - 15:40
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            16:10 - 18:40
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            19:10 - 21:40
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            22:10 - 00:40
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="text-align:center">
            <h3>Interested?</h3>
            <form action="Payment.php">
                <h4>Seats</h4>
                <table class="seats">
                    <tr ng-repeat="x in seats">
                        <td>Screen</td>
                        <td><input type="checkbox" name="chosen" value="chosen">{{ x.seatA }}</td>
                        <td><input type="checkbox" name="chosen" value="chosen">{{ x.seatB }}</td>
                        <td><input type="checkbox" name="chosen" value="chosen">{{ x.seatC }}</td>
                        <td><input type="checkbox" name="chosen" value="chosen">{{ x.seatD }}</td>
                        <td><input type="checkbox" name="chosen" value="chosen">{{ x.seatC }}</td>
                    </tr>  
                </table>
                <h5>Cinema</h5>
                <select name="cinemaSelect" id="cinemaSelect" style="color:black" onChange="changetime(this.value);">
                    <option value="" style="color:grey" disabled selected>Select</option>
                    <option value="xxi" style="color:black">XXI</option>
                    <option value="cgv" style="color:black">CGV</option>
                </select>
                <h5>Time</h5>
                <select  name="time" id="time" style="color:black">
                    <option value="" style="color:grey" disabled selected>Select</option>
                </select>
                <br><br>
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:absolute; left:46.5%; background-color: grey; border: 2px solid black">
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <footer>
    </footer>
</body>
</html>