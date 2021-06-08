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
        $jobno = sanitise_input($_POST["jobno"]);
        $firstname = sanitise_input($_POST["firstname"]);
        $lastname = sanitise_input($_POST["lastname"]);
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
            //query is for list of eois, query2 is for the skills
            $query="select * from eoi";
            $query2="SELECT eoi.EOInumber, applicantskills.skilldesc FROM eoi INNER JOIN applicantskills ON eoi.EOInumber=applicantskills.EOInumber;";
            //searching by job reference number
            if(!empty($_POST["jobno"]))
            {
                $jobno=$_POST["jobno"];
                $query="SELECT * FROM eoi WHERE jobno like '$jobno';";
                $query2="SELECT eoi.EOInumber, applicantskills.skilldesc FROM eoi INNER JOIN applicantskills ON eoi.EOInumber=applicantskills.EOInumber WHERE eoi.jobno like '$jobno';";
            }
            //searching by first and last name
            else if(!empty($_POST["firstname"])||!empty($_POST["lastname"]))
            {
                $firstname=$_POST["firstname"];
                $lastname=$_POST["lastname"];
                $query="SELECT * FROM eoi WHERE firstname like '$firstname%' AND lastname like '$lastname%';";
                $query2="SELECT eoi.EOInumber, applicantskills.skilldesc FROM eoi INNER JOIN applicantskills ON eoi.EOInumber=applicantskills.EOInumber WHERE eoi.firstname like '$firstname%' AND eoi.lastname like '$lastname%';";
            }
            $result=mysqli_query($conn ,$query);
            if(!$result)
            {
                echo "<p>The table is non-existence. This is due to the table being dropped from the database.</p>";
            }
            else if(mysqli_num_rows($result) < 1)
            {
                echo "<p>No results found!</p>";
            }
            else
            {
                //printing out all applications
                echo "<h3>All applications:</h3>";
                echo "<div><table class=\"ditme\">\n";
                echo "<tr>\n "
                //headers
                ."<th scope=\"col\">ID</th>\n "
                ."<th scope=\"col\">Job Code</th>\n "
                ."<th scope=\"col\">First name</th>\n "
                ."<th scope=\"col\">Last name</th>\n "
                ."<th scope=\"col\">Street</th>\n "
                ."<th scope=\"col\">Suburb</th>\n "
                ."<th scope=\"col\">State</th>\n "
                ."<th scope=\"col\">Postcode</th>\n "
                ."<th scope=\"col\">Email</th>\n "
                ."<th scope=\"col\">Phone</th>\n "
                ."<th scope=\"col\">Other skills</th>\n "
                ."<th scope=\"col\">Status</th>\n "
                ."</tr>\n";
                //print data
                while($row=mysqli_fetch_assoc($result))
                {
                    echo "<tr>\n ";
                    echo "<td>", $row["EOInumber"],"</td>\n ";
                    echo "<td>", $row["jobno"],"</td>\n ";
                    echo "<td>", $row["firstname"],"</td>\n ";
                    echo "<td>", $row["lastname"],"</td>\n ";
                    echo "<td>", $row["street"],"</td>\n ";
                    echo "<td>", $row["suburb"],"</td>\n ";
                    echo "<td>", $row["state"],"</td>\n ";
                    echo "<td>", $row["postcode"],"</td>\n ";
                    echo "<td>", $row["email"],"</td>\n ";
                    echo "<td>", $row["phone"],"</td>\n ";
                    echo "<td>", $row["otherskills"],"</td>\n ";
                    echo "<td>", $row["status"],"</td>\n ";
                    echo "</tr>\n ";
                }
                echo "</table></div>\n ";
                echo "<br/>";
                //printing out the skills of each applicant
                echo "<h3>Skill list of each applicant:</h3>";
                echo "<div><table>\n";
                echo "<tr>\n "
                ."<th scope=\"col\">ID</th>\n "
                ."<th scope=\"col\">Skill</th>\n "
                ."</tr>\n";
                //select query
                $result2=mysqli_query($conn ,$query2);
                while($row2=mysqli_fetch_assoc($result2))
                {
                    echo "<tr>\n ";
                    echo "<td>", $row2["EOInumber"],"</td>\n ";
                    echo "<td>", $row2["skilldesc"],"</td>\n ";
                    echo "</tr>\n ";
                }
                echo "</table></div>\n ";
                mysqli_close($conn);
            }
        }
    ?>
    </section>
    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>