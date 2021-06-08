<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.inc'?>
    <title>Beta - Enhancements 2</title>
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
        ENHANCEMENTS 2
    </h2>
    <section class="content-box">
        <h2>I. Application form has a countdown timer:</h2>
        <p>
            I implemented the method 'setInterval' and 'getTime()' to create a countdown which will redirect to the index page after a certain amount of time 
            has passed since the APPLY page is opened.
             The variable 'minute' can be adjusted to test this new feature. It is situated in the 'enhancements.js' file. The timer only works in the APPLY 
             page.
        </p>
        <br/>
        <p>Credit: <a href="https://www.developerdrive.com/2019/02/build-countdown-timer-pure-javascript/">https://www.developerdrive.com/2019/02/build-countdown-timer-pure-javascript/</a></p>
        <br/>
        <p><a href="apply.php">Click here</a> to go the Apply page, where the timer is implemented.</p>
        <br/>
        <hr/>
        <h2>II. Warning/alert sound effect:</h2>
        <p>
            I added an mp3 file to the script folder, and plays the audio when the condition is met - when the APPLY page's timer ends and when the 
            validation of the form fails. I added this mainly to aid with user's experience when they are try to submit an invalid form. It will notify them 
            so that they know that the form needs correcting. This feature uses the method 'new Audio()', '.play()', 'sessionStorage' and 'setInterval()'.
        </p>
        <br/>
        <p>However, there is a small problem: if the browser is set to block audio auto play, the sound effect wouldn't be played. The block must be 
            cancelled so that this feature can work.
        </p>
        <br/>
        <p>To test this feature, simply enters an invalid date of birth (greater than year 2004 or less than year 1939), mismatched postcode and state, or 
            tick the "Other skill" box without entering anything in the textbox below that option.
        </p>
        <br/>
        <p>Credit: <a href="https://www.youtube.com/watch?time_continue=266&amp;v=VlwSz2dXK_8">https://www.youtube.com/watch?time_continue=266&amp;v=VlwSz2dXK_8</a></p>
        <br/>
        <p><a href="apply.php">Click here</a> to go to the APPLY page, where the sound effect is implemented.</p>
    </section>

    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>