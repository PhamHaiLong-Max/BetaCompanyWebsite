<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc'?>
    <title>Beta - Manage</title>
    <link rel="stylesheet" href="styles/style.css"/>
    <script src="scripts/apply.js"></script>
    <script src="scripts/enhancement.js"></script>
</head>
<body>
    <?php
        if(!isset($_POST['direct']))
            header("location: manage.php");
        //start session
        session_start();
        if(!isset($_SESSION['user_id']))
        {
            //redirect to login page
            header("Location: login.php");
        }
    ?>
    <a id="top"></a>
    <div class="nav-logo" id="shindeiru">
        <?php include 'menu.inc' ?>
    </div>
    
    <hr />
    <section id="title-block">
        <img id="title-logo" src="images/betalogo.png" alt="Beta Logo" width="200" height="200"/>
        <h1 id="main-title">
            BETA COMPANY
        </h1>
    </section>
    <h2 class="headings">
        MANAGE
    </h2>
    <section class="content-box">
    <?php
        echo '<p>To go back, <a href="manage.php">click here</a>!</p>';
        function sanitise_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //getting username and password for database
        require_once("settings.php");
        //connect to database
        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );
        //failed connection
        if(!$conn)
        {
            echo "<p>Request failed!</p>";
        }
        //successful connection
        else
        {
            if(!empty($_POST["jobid"]))
            {
                $jobno = sanitise_input($_POST["jobid"]);
                $query="DELETE FROM eoi WHERE jobno like '$jobno';";
                $result=mysqli_query($conn ,$query);
                if(!$result)
                {
                    echo "<p>The table is non-existence. This is due to the table being dropped from the database.</p>";
                }
                else if(mysqli_affected_rows($conn)<1)
                {
                    echo "<p>No deletion made since no result is found!</p>";
                }
                else
                {
                    echo "<p>Deletion successful! A total of ", mysqli_affected_rows($conn), " EOIs were deleted!</p>";
                }
            }
            else
                echo "<p>No job reference number was entered!</p>";
            mysqli_close($conn);
        }
    ?>
    </section>
    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>