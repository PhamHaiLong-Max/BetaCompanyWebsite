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
    <h3>
        What would you like to do?
    </h3>
    <form method="post" id="manage1" action="manage1.php">
        <fieldset class="form-field">
            <legend><strong class="legend-box">Display list of applications</strong></legend>
            <br />
            <p>To display all EOIs, simply leave the fields empty! Beware, however, that if the job ref field is filled, in, no matter what you fill in first and last name, it wouldn't be searched!</p>
            <p>
                <label for="jobno">Search by job reference number</label> 
                <span class="fill-in-box">
                    <input type="text" name="jobno" id="jobno" maxlength="5" size="20" pattern="[A-Z,a-z0-9]{5}"/>
                </span>
            </p>
            <input type="hidden" name="direct" value="DITME"/>
            <p>
                <label for="firstname">Search by first name</label>
                <span class="fill-in-box">
                    <input type="text" name= "firstname" id="firstname" maxlength="20" size="35" pattern="[A-Za-z]{1,20}"/>
                </span>
            </p>
            <p>
                <label for="lastname">Search by last name</label> 
                <span class="fill-in-box">
                    <input type="text" name= "lastname" id="lastname" maxlength="20" size="35" pattern="[A-Za-z]{1,20}"/>
                </span>
            </p>
            <input class="go" type="submit" value="-- Go --"/>
        </fieldset>
    </form>
    <form method="post" id="manage2" action="manage2.php">
        <fieldset class="form-field">
            <legend><strong class="legend-box">Delete all EOIs with a specified job reference number</strong></legend>
            <br />
            <input type="hidden" name="direct" value="DITME"/>
            <p>
                <label for="lastname">Job reference number: </label> 
                <span class="fill-in-box">
                    <input type="text" name= "jobid" id="jobid" maxlength="5" size="10" pattern="{5}"/>
                </span>
            </p>
            <input class="go" type="submit" value="-- Go --"/>
        </fieldset>
    </form>
    <form method="post" id="manage3" action="manage3.php">
        <fieldset class="form-field">
            <legend><strong class="legend-box">Changing application's status</strong></legend>
            <br />
            <input type="hidden" name="direct" value="DITME"/>
            <p>
                <label for="lastname">ID of the targeted EOI: </label> 
                <span class="fill-in-box">
                    <input type="text" name= "eoiid" id="eoiid" maxlength="5" size="10" pattern="[0-9]{1,10}"/>
                </span>
            </p>
            <p>
                <label for="status">Choose a status you want: </label> 
                <select name="status" id="status">
                    <option value="New">New</option>			
                    <option value="Current">Current</option>	
                    <option value="Final">Final</option>
                </select>
            </p>
            <input class="go" type="submit" value="-- Go --"/>
        </fieldset>
    </form>
    <p>To log out, <a href="logout.php">click me</a>!</p>
    </section>
    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>