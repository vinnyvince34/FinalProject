<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mytix-Movie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
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
</style>
<body style="background-color: #27363b">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Main.php">Mytix</a>
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
    </div>
    <footer>

    </footer>
</body>
</html>