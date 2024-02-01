<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>navBar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="styles.css">
    <style>
       .container {
            width: 70%;
            height: 30%;
            padding: 20px;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center; /* Center the content within the header */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox to center the list items */
            justify-content: center; /* Horizontally center the list items */
        }

        nav ul li {
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        nav ul li a:hover {
            color: #ff0;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                
                
                <?php
                    if (isset($_SESSION["useremail"])) {
                        echo "<li><a href='survey.php'>Dashboard</a></li>";
                        echo "<li><a href='#'>Welcome, ".$_SESSION["useremail"]."</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                        echo "<li><a href='createsurvey.php'>Create A Survey</a></li>";
                        echo "<li><a href='my_surveys.php'>My Surveys</a></li>";

                    } else {
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='registration.php'>Registration</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>

    <div class="container">
        
    </div>

    <script src="jquery-3.2.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>
