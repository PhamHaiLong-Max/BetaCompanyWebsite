<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc' ?>
    <title>Creating apply record...</title>
</head>
<body>
    <?php
        function sanitise_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //blocking direct access
        if(!isset ($_POST["firstname"]))
            header("location: apply.php");
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
        else
        {
            //sanitizing the input
            
            $jobno = sanitise_input($_POST["id"]);
            $firstname = sanitise_input($_POST["firstname"]);
            $lastname = sanitise_input($_POST["lastname"]);
            $date = sanitise_input($_POST["date"]);
            $street = sanitise_input($_POST["address1"]);
            $suburb = sanitise_input($_POST["address2"]);
            $state = sanitise_input($_POST["state"]);
            $postcode = sanitise_input($_POST["postcode"]);
            $email = sanitise_input($_POST["email"]);
            $phone = sanitise_input($_POST["phone"]);
            $otherskills = sanitise_input($_POST["skill"]);
            
            //validation
            $i=0;
            //must check at least 1 skill
            if(empty($_POST['skilllist'])&&empty($_POST["otherskill"]))
            {
                echo "<p>You haven't checked a skill!</p>";
                $i=1;
            }
            //job reference number
            if(!preg_match('/^[A-Za-z0-9]{5}$/', $jobno))
            {
                echo "<p>Invalid job reference number!</p>";
                $i=1;
            }
            //first name
            if(!preg_match('/^[A-Za-z ]{1,25}$/', $firstname))
            {
                echo "<p>Invalid first name!</p>";
                $i=1;
            }
            //last name
            if(!preg_match('/^[A-Za-z ]{1,25}$/', $lastname))
            {
                echo "<p>Invalid last name!</p>";
                $i=1;
            }
            //date of birth
            $birthyear=explode('/', $date);
            $age=date("Y");
            $age=$age-$birthyear[2];
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date)||$age<16||$age>80)
            {
                echo "<p>Invalid date of birth!</p>";
                $i=1;
            }
            //gender
            if(!isset($_POST["gender"]))
            {
                echo "<p>How do you even de-select gender?? What sorcery was that??</p>";
            }
            //street
            if(!preg_match('/^[A-Za-z ]{1,40}$/', $street))
            {
                echo "<p>Invalid street!</p>";
                $i=1;
            }
            //suburb
            if(!preg_match('/^[A-Za-z ]{1,40}$/', $suburb))
            {
                echo "<p>Invalid suburb!</p>";
                $i=1;
            }
            //state
            if($state!="vic"&&$state!="nsw"&&$state!="qld"&&$state!="nt"&&$state!="wa"&&$state!="sa"&&$state!="tas"&&$state!="act")
            {
                echo "<p>Invalid state!</p>";
                $i=1;
            }
            //postcode
            if(!preg_match('/^[0-9]{4}$/', $postcode))
            {
                echo "<p>Invalid postcode!</p>";
                $i=1;
            }
            //validating the postcode-state pair
            switch($state){
                case "vic":
                    if(!strcmp($postcode[0], "3")&&!strcmp($postcode[0], "8"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                break;
                case "nsw":
                    if(!strcmp($postcode[0], "1")&&!strcmp($postcode[0], "2"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                case "qld":
                    if(!strcmp($postcode[0], "4")&&!strcmp($postcode[0], "9"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                case "nt":
                    if(!strcmp($postcode[0], "0"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                case "wa":
                    if(!strcmp($postcode[0], "6"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                case "sa":
                    if(!strcmp($postcode[0], "5"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                case "tas":
                    if(!strcmp($postcode[0], "7"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                case "act":
                    if(!strcmp($postcode[0], "0"))
                    {
                        $i=1;
                        echo '<p>Invalid postcode!</p>';
                    }
                    break;
                }
            //email
            if(!preg_match('/^[\w-\.]+@([\w-]+\.)+[\w-.]{1,20}$/', $email))
            {
                echo "<p>Invalid email!</p>";
                $i=1;
            }
            //phone
            if(!preg_match('/^[0-9 ]{8,12}$/', $phone))
            {
                echo "<p>Invalid phone number!</p>";
                $i=1;
            }
            
            //other skills checked then text box must be filled
            if(!empty($_POST["otherskill"]))
            {
                if(!preg_match('/^.{1,400}$/', $otherskills))
                {
                    echo "<p>You ticked 'Other skills', yet the textbox is empty!</p>";
                    $i=1;
                }
            }
            //if no invalid inputs found
            if($i==0)
            {
                //if table does not exist then create the table
                if(!mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'eoi'")))
                    mysqli_query($conn, "CREATE TABLE `s102255792_db`.`eoi` ( `EOInumber` INT NOT NULL AUTO_INCREMENT , `jobno` VARCHAR(5) NOT NULL , `firstname` VARCHAR(100) NOT NULL , `lastname` VARCHAR(100) NOT NULL , `street` VARCHAR(100) NOT NULL , `suburb` VARCHAR(100) NOT NULL , `state` VARCHAR(100) NOT NULL , `postcode` INT(4) NOT NULL , `email` VARCHAR(100) NOT NULL , `phone` INT(20) NOT NULL , `otherskills` TEXT NULL , `status` VARCHAR(20) NOT NULL DEFAULT 'New', PRIMARY KEY (`EOInumber`)) ENGINE = InnoDB;");
                if(!mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'applicantskills'")))
                {
                    mysqli_query($conn, "CREATE TABLE `s102255792_db`.`applicantskills` ( `EOInumber` INT NOT NULL , `skilldesc` VARCHAR(20) NOT NULL , INDEX (`EOInumber`)) ENGINE = InnoDB;");
                    mysqli_query($conn, "ALTER TABLE `applicantskills` ADD FOREIGN KEY (`EOInumber`) REFERENCES `eoi`(`EOInumber`) ON DELETE CASCADE ON UPDATE CASCADE;");
                }
                //run query for insert info
                $query="insert into eoi (jobno, firstname, lastname, street, suburb, state, postcode, email, phone, otherskills) values ('$jobno', '$firstname', '$lastname', '$street', '$suburb', '$state', '$postcode', '$email', '$phone', '$otherskills');";
                $result=mysqli_query($conn ,$query);
                if(!$result)
                {
                    echo "<p>Something is wrong with ", $query, "</p>";
                }
                else
                {
                    $result=mysqli_query($conn, "SELECT MAX(EOInumber) AS EOInumber from eoi ;");
                    $id=mysqli_fetch_assoc($result);
                    //getting skills
                    $id=$id["EOInumber"];
                    if(!empty($_POST['skilllist']))
                    {
                        foreach($_POST['skilllist'] as $selected)
                        {
                            mysqli_query($conn, "insert into applicantskills (EOInumber, skilldesc) values ('$id', '$selected');");
                        }
                    }
                    echo '<p>Successfully created applicant record!</p>';
                    echo '<p>Your applicant ID is ', $id, '</p>';
                }
            }
            echo '<p>To go back, <a href="apply.php">click here</a></p>';
            mysqli_close($conn);
        }
    ?>
</body>
</html>