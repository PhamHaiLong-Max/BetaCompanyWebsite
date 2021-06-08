<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.inc'?>
    <title>Beta - Apply</title>
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
        APPLY
    </h2>
    <section class="content-box">
    <h3>
        Do you want to become a potential candidate for our position? Fill out the form below to apply!
    </h3>
    <br />
    <form id="regform" method="post" action="processEOI.php" novalidate="novalidate">
        <fieldset class="form-field">
            <legend><strong class="legend-box">Generic information</strong></legend>
                <br />
		        <p>
                    <label for="id">Job reference number:</label> 
                    <span class="fill-in-box">
                        <input type="text" name= "id" id="id" minlength="5" maxlength="5" size="20" required="required" pattern="[A-Z,a-z0-9]{5}" placeholder="5 alphanumeric chars"/>
                    </span>
                </p>
                <p>
                    <label for="firstname">First name:</label>
                    <span class="fill-in-box">
                        <input type="text" name= "firstname" id="firstname" maxlength="20" size="35" required="required" pattern="[A-Za-z]{1,20}" placeholder="Max 20 alpha characters"/>
                    </span>
                </p>
                <p>
                    <label for="lastname">Last name:</label> 
                    <span class="fill-in-box">
                        <input type="text" name= "lastname" id="lastname" maxlength="20" size="35" required="required" pattern="[A-Za-z]{1,20}" placeholder="Max 20 alpha characters"/>
                    </span>
                </p>
                <p>
                    <label for="date">Date of birth:</label> 
                    <span>
                        <input type="text" name= "date" id="date" required="required" pattern="\d{1,2}/\d{1,2}/\d{4}" placeholder="dd/mm/yyyy"/>
                        <span id="wrongdate"></span>
                    </span>
                </p>
                
        </fieldset>

        <fieldset class="form-field">
                <legend><strong class="legend-box">Personal details</strong></legend>
                    <br />
                    <p id="gender">Gender:
                        <input type="radio" name="gender" id="female" value="female" checked="checked"/>
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="male" value="male"/>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="other-gender" value="other-gender"/>
                        <label for="other-gender">Other</label>
                    </p>
                    <p>
                        <label for="address1">Street address: </label>
                        <input type="text" name="address1" id="address1" maxlength="40" size="80" required="required" placeholder="max 40 characters"/>
                    </p>
                    <p>
                        <label for="address2">Suburb/town: </label>
                        <input type="text" name="address2" id="address2" maxlength="40" size="80" required="required" placeholder="max 40 characters"/>
                    </p>
                    <p>
                        <label for="state">State: </label> 
                        <select name="state" id="state">
                            <option value="vic">VIC</option>			
                            <option value="nsw">NSW</option>	
                            <option value="qld">QLD</option>
                            <option value="nt">NT</option>
                            <option value="wa">WA</option>	
                            <option value="sa">SA</option>	
                            <option value="tas">TAS</option>	
                            <option value="act">ACT</option>
                        </select>
                    </p>
                    <p>
                        <label for="postcode">Postcode: </label>
                        <input type="text" name="postcode" id="postcode" maxlength="4" size="4" required="required" pattern="[0-9]{4}"/>
                        <span id="wrongpostcode"></span>
                    </p>
                    <p>
                        <label for="email">Email address: </label>
                        <input type="email" name="email" id="email" size="60" required="required"/>
                    </p>
                    <p>
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" id="phone" size="18" required="required" pattern="[0-9 ]{1,18}"/>
                    </p>
                    <p>
                        Skill lists:
                    </p>
                    <p>
                        <input type="checkbox" id="teamwork" name="skilllist[]" value="teamwork" checked="checked"/>
                        <label for="teamwork">Teamwork</label>
                    </p>
                    <p>
                        <input type="checkbox" id="computer" name="skilllist[]" value="computer" checked="checked"/>
                        <label for="computer">Basic computer skills</label>
                    </p>
                    <p>
                        <input type="checkbox" id="communication" name="skilllist[]" value="communication"/>
                        <label for="communication">Technical communication</label>
                    </p>
                    <p>
                        <input type="checkbox" id="decision" name="skilllist[]" value="decision"/>
                        <label for="decision">Decision making</label>
                    </p>
                    <p>
                        <input type="checkbox" id="crit-thinking" name="skilllist[]" value="crit-thinking"/>
                        <label for="crit-thinking">Critical thinking</label>
                    </p>
                    <p>
                        <input type="checkbox" id="sql" name="skilllist[]" value="sql"/>
                        <label for="sql">SQL experience</label>
                    </p>
                    <p>
                        <input type="checkbox" id="mysql" name="skilllist[]" value="mysql"/>
                        <label for="mysql">MySQL experience</label>
                    </p>
                    <p>
                        <input type="checkbox" id="other" name="otherskill"/>
                        <label for="other">Other skills</label>
                    </p>
                    <p>
                        <textarea id="other-skills" name="skill" rows="7" cols="80" placeholder="Write your other skills here..."></textarea>
                    </p>
        </fieldset>
        <input class="submit-button" id="submit" type= "submit" value="Apply"/>
    </form>
    </section>


    <footer>
        <?php include 'footer.inc'; ?>
    </footer>
</body>
</html>