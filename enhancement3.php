<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.inc'?>
    <title>Beta - Enhancements 3</title>
    <link rel="stylesheet" href="styles/style.css"/>
</head>
<body>
    <a id="top"></a>
    <div class="nav-logo">
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
        ENHANCEMENTS 3
    </h2>
    <section class="content-box">
        <h2>I. Applied a child table (FOREIGN KEY relationship) to store the skills of each EOI, featuring CASCADING function:</h2>
        <br/>
        <p>
            I created a separated table for storing the skills of each EOI. It is linked to the 'eoi' table in a relationship manner between 
            the EOI ID. Basically, the ID of the skill table is from the EOI table. This reduces data  redundancies.
        </p>
        <br/>
        <p>
            Moreover, I applied the CASCADING feature to the child table (the 'applicantskills' table). If a record is erased from the 'eoi' 
            table, the respective rows indicating the skills in the child table with the matching ID will also be deleted. Information integrity 
            is therefore secured.
        </p>
        <br/>
        <p>Credit: <a href="https://stackoverflow.com/questions/46509466/delete-row-from-child-table-when-a-row-from-parent-table-gets-deleted">https://stackoverflow.com/questions/46509466/delete-row-from-child-table-when-a-row-from-parent-table-gets-deleted</a></p>
        <br/>
        <p>This feature can be checked by going to the <a href="manage.php">manage page</a>.</p>
        <br/>
        <hr/>
        <h2>II. Account system for managers</h2>
        <br/>
        <p>
            I added a log in/log out system to prevent unauthorized users to get access to the manage.php page.
        </p>
        <br/>
        <p>Basically, it utilizes the session function to store the variable as long as the session remains. Logging out is carried out by 
            destroying the session. Logging in requires input from a log in form, and then the account is searched in the 'users' table in 
            the database. If no match is found, re-prompt.
        </p>
        <br/>
        <p>Credit: <a href="https://stackoverflow.com/questions/11314373/creating-a-login-system-in-php">https://stackoverflow.com/questions/11314373/creating-a-login-system-in-php</a></p>
        <br/>
        <p><a href="manage.php">Click here</a> to go to the Manage page, where the account authorization process is implemented.</p>
    </section>

    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>