<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mytix-AdminPage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
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
    }

    input{
        color: aliceblue;
        transition: width 0.4s ease-in-out; 
        -webkit-transition: width 0.4s ease-in-out;
    }

    input:focus{
        width: 100%;
    }

    .seltab{
        position: absolute;
        left: 47%;
        color: black;
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

    function selected()
    {

    }
</script>
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
    <div style="color:aliceblue; width:80%; position:relative; margin:auto">
        <div class="tab" style="text-align:center">
            <button class="tablinks" onclick="tabbed(event, 'Read')" style="color:black">Read</button>
            <button class="tablinks" onclick="tabbed(event, 'Create')" style="color:black">Create</button>
            <button class="tablinks" onclick="tabbed(event, 'Update')" style="color:black">Update</button>
            <button class="tablinks" onclick="tabbed(event, 'Delete')" style="color:black">Delete</button>
        </div>
        <br>
        <select class="seltab">
            <option value="user" selected="selected">User</option>
            <option value="creditCard">Credit Card</option>
            <option value="cinema">Cinema</option>
            <option value="schedule">Schedule</option>
            <option value="movie">Movie</option>
            <option value="roomType">Room Type</option>
            <option value="transaction">Transaction</option>
        </select>
        <div id="Read" class="tabcontent">
            <h3>Read</h3>
            <hr>
            <form action="">
            @yield('content')
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%">
            </form>
        </div>        
        <div id="Create" class="tabcontent">
            <h3>Create</h3>
            <hr>
            <form action="">
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%">
            </form>
        </div>
        <div id="Update" class="tabcontent">
            <h3>Update</h3>
            <hr>
            <form action="">
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%">
            </form>
        </div>
        <div id="Delete" class="tabcontent">
            <h3>Delete</h3>
            <hr>
            <form action="">
                <input type="submit" value="Submit" name="Submit" style="color:black; width:7%; position:relative; left:47%">
            </form>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
</html>