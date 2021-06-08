<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc'?>
    <title>Beta - About</title>
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
        ABOUT
    </h2>
    <section class="content-box">
        <figure>
            <img src="images/me.jpg" alt="A picture of me"/>
        </figure>
        <h4>ABOUT ME</h4>
        <br />

        <dl>
            <dt>Name:</dt>
                <dd>Pham Hai Long (Max)</dd>
            <dt>Student number:</dt>
                <dd>102255792</dd>
            <dt>Tutor's name:</dt>
                <dd>Mr. Humphrey Obie</dd>
            <dt>Course:</dt>
                <dd>COS10020 - Creating Web Application</dd>
        </dl>
        <h5>My timetable:</h5>
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th>8:30-9:30</th>
                        <td rowspan="2">Calculus and Applications</td>
                        <td rowspan="3"></td>
                        <td rowspan="2">Requirements Analysis and Modelling</td>
                        <td rowspan="2">Calculus and Applications</td>
                </tr>
                <tr>
                    <th>9:30-10:30</th>
                </tr>
                <tr>
                    <th>10:30-11:30</th>
                        <td rowspan="4"></td>
                        <td rowspan="4"></td>
                        <td rowspan="2">Developing Technical Software</td>
                </tr>
                <tr>
                    <th>11:30-12:30</th>
                        <td rowspan="2">Developing Technical Software</td>
                </tr>
                <tr>
                    <th>12:30-13:30</th>
                    <td rowspan="2"></td>
                </tr>
                <tr>
                    <th>13:30-14:30</th>
                        <td></td>
                </tr>
                <tr>
                    <th>14:30-15:30</th>
                        <td rowspan="2">Creating Web Applications</td>
                        <td rowspan="2">Creating Web Applications</td>
                        <td rowspan="2">Creating Web Applications</td>
                        <td rowspan="2">Requirements Analysis and Modelling</td>
                </tr>
                <tr>
                    <th>15:30-16:30</th>
                </tr>
                <tr>
                    <th>16:30-17:30</th>
                        <td rowspan="2"></td>
                        <td rowspan="2">Developing Technical Software</td>
                        <td rowspan="2">Requirements Analysis and Modelling</td>
                        <td rowspan="2">Calculus and Applications</td>
                </tr>
                <tr>
                    <th>17:30-18:30</th>
                </tr>
                                        
            </tbody>
        </table>
        <br />
        <p id="my-email">
            Email: <a href="mailto:102255792@student.swin.edu.au">102255792@student.swin.edu.au</a>
        </p>
        </section>
    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>