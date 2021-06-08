<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc'?>
    <title>Beta - Log in</title>
    <link rel="stylesheet" href="styles/style.css"/>
    <script src="scripts/apply.js"></script>
    <script src="scripts/enhancement.js"></script>
</head>
<body>
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
    <p>To continue, you must log in first!</p>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Submit">
    </form>
    <?php
        function sanitise_input($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        //session starto
        session_start();
        //if there is input
        if(!empty($_POST))
        {
            if (isset($_POST['username']) && isset($_POST['password']))
            {
                //sanitise input
                $username=sanitise_input($_POST['username']);
                $password=sanitise_input($_POST['password']);
                //getting username and password for database
                require_once("settings.php");
                //Getting info from database
                $conn = @mysqli_connect($host,
                $user,
                $pwd,
                $sql_db
                );
                $query="SELECT * FROM users WHERE username like '$username' AND password like '$password';";
                $result=mysqli_query($conn ,$query);
                //Verify user password and set $_SESSION
                if(mysqli_num_rows($result) >= 1)
                {
                    $_SESSION['user_id']='good-to-go';
                    header("location: manage.php");
                }
                else
                {
                    echo '<h3>INVALID ACCOUNT!</h3>';
                }
            }
        }
    ?>
    </section>
    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>