/*
 * Author: Pham Hai Long - 102255792
 * Target: apply.php
 * Purpose: for glory (and points)
 * Created: 4/11/2019
 * Last updated: 4/13/2019
 * Credits: idk :<
*/

"use strict";

//variable to enable/disable input validation. 1 is ON, 0 is OFF
var debug=0;

//checking whether the user is >15 and <80 yrs old
function checkdate(date){
    /*breaking down date of birth input*/
    var inputdate = date.split("/");
    var day=inputdate[0];
    var month=inputdate[1];
    var year=inputdate[2];
    /*get the current time*/
    var d = new Date();
    var curyear=d.getFullYear();
    var curmonth=d.getMonth();
    var curday=d.getDate();

    /*validation*/
    if(curyear-year==15)
    {
        if(curmonth==month)
        {
            if(curday>=day)
                return true;
            else
                return false;
        }
        else if(curmonth<month)
            return true;
        else
            return false;
    }
    else if(curyear-year==80)
    {
        if(curmonth==month)
        {
            if(curday<=day)
                return true;
            else
                return false;
        }
        else if(curmonth>month)
            return true;
        else
            return false;
    }
    else if(curyear-year<15||curyear-year>80)
        return false;
    else
        return true;
}

//checking whether the postcode matches the state
function checkstate(postcode, state){
    var x=postcode.split("");
    x=x[0];
    var result = 0;
    switch(state){
        case "vic":
            if(x!=3&&x!=8)
                result=1;
            break;
        case "nsw":
            if(x!=1&&x!=2)
                result=1;
            break;
        case "qld":
            if(x!=4&&x!=9)
                result=1;
            break;
        case "nt":
            if(x!=0)
                result=1;
            break;
        case "wa":
            if(x!=6)
                result=1;
            break;
        case "sa":
            if(x!=5)
                result=1;
            break;
        case "tas":
            if(x!=7)
                result=1;
            break;
        case "act":
            if(x!=0)
                result=1;
            break;
    }
    if(result==0)
        return true;
    if(result==1)
        return false;
}

//checking whether other skill is checked
function checkOtherSkills(){
    if(document.getElementById("other").checked==true)
    {
        if(document.getElementById("other-skills").value=="")
            return false;
        else
            return true;
    }
}

//session storing
function storedata(skilllist){
    sessionStorage.firstname = document.getElementById("firstname").value;
    sessionStorage.lastname = document.getElementById("lastname").value;
    sessionStorage.date = document.getElementById("date").value;
    sessionStorage.address1 = document.getElementById("address1").value;
    sessionStorage.address2 = document.getElementById("address2").value;
    sessionStorage.state = document.getElementById("state").value;
    sessionStorage.postcode = document.getElementById("postcode").value;
    sessionStorage.email = document.getElementById("email").value;
    sessionStorage.phone = document.getElementById("phone").value;
    sessionStorage.skilllist = skilllist;
    sessionStorage.otherskills = document.getElementById("other-skills").value;
    sessionStorage.gender = getgender();
}

//function for getting the value of the nuisance input type radio called "gender"
function getgender(){
    var gender = "Unknown";
    var genderArray = document.getElementById("gender").getElementsByTagName("input");
    for(var i = 0; i < genderArray.length; i++){
        if(genderArray[i].checked)
            gender = genderArray[i].value;
    }
    return gender;
}

//function for prefilling the user's details
function prefill(){
    if(sessionStorage.firstname!= undefined)
    {
        var uncheck1 = 0;
        var uncheck2 = 0;
        var skill = sessionStorage.skilllist.split(" ");
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("lastname").value = sessionStorage.lastname;
        document.getElementById("date").value = sessionStorage.date;
        document.getElementById("address1").value = sessionStorage.address1;
        document.getElementById("address2").value = sessionStorage.address2;
        document.getElementById("state").value = sessionStorage.state;
        document.getElementById("postcode").value = sessionStorage.postcode;
        document.getElementById("email").value = sessionStorage.email;
        document.getElementById("phone").value = sessionStorage.phone;
        document.getElementById("other-skills").value = sessionStorage.otherskills;
        switch(sessionStorage.gender){
            case "female":
                document.getElementById("female").checked = true;
                break;
            case "male":
                document.getElementById("male").checked = true;
                break;
            case "other-gender":
                document.getElementById("other-gender").checked = true;
                break;
        }
        for(var i = 0; i < skill.length; i++)
        {
            switch(skill[i]){
                case "1":
                    uncheck1 = 1;
                    break;
                case "2":
                    uncheck2 = 1;
                    break;
                case "3":
                    document.getElementById("communication").checked = true;
                    break;
                case "4":
                    document.getElementById("decision").checked = true;
                    break;
                case "5":
                    document.getElementById("crit-thinking").checked = true;
                    break;
                case "6":
                    document.getElementById("sql").checked = true;
                    break;
                case "7":
                    document.getElementById("mysql").checked = true;
                    break;
                case "8":
                    document.getElementById("other").checked = true;
                    break;
            }
        }
        if(uncheck1 == 0)
            document.getElementById("teamwork").checked = false;
        if(uncheck2 == 0)
            document.getElementById("computer").checked = false;
    }
}


//function for validating everything
function validate(){
    var result=true;
    var skilllist = "";
    //which skills are ticked?
    if(document.getElementById("teamwork").checked)
        skilllist += "1 ";
    if(document.getElementById("computer").checked)
        skilllist += "2 ";
    if(document.getElementById("communication").checked)
        skilllist += "3 ";
    if(document.getElementById("decision").checked)
        skilllist += "4 ";
    if(document.getElementById("crit-thinking").checked)
        skilllist += "5 ";
    if(document.getElementById("sql").checked)
        skilllist += "6 ";
    if(document.getElementById("mysql").checked)
        skilllist += "7 ";
    if(document.getElementById("other").checked)
        skilllist += "8";
    

    //checking date of birth
    if(checkdate(document.getElementById("date").value)==false)
    {
        document.getElementById("date").style.borderColor="red";
        document.getElementById("wrongdate").textContent="Your date of birth is not accepted.";
        document.getElementById("wrongdate").style.color="red";
        result = false;
    }

    //checking state and postcode
    if(checkstate(document.getElementById("postcode").value, document.getElementById("state").value)==false)
    {
        document.getElementById("postcode").style.borderColor="red";
        document.getElementById("wrongpostcode").textContent="Invalid input. Not a match with your selected state.";
        document.getElementById("wrongpostcode").style.color="red";
        result = false;
    }

    //checking if other skills is checked
    if(checkOtherSkills()==false)
    {
        document.getElementById("other-skills").style.borderColor="red";
        document.getElementById("other-skills").placeholder="Please fill me in";
        document.getElementById("other-skills").style.color="red";
        result = false;
    }




    //final return
    if(result==false){
        document.getElementById("submit").style.borderColor="red";
        document.getElementById("submit").style.color="red";
    }
    else
        storedata(skilllist);

    sessionStorage.result=result;
    return result;
}


//case of apply.php
function init2(){
    prefill();
    //passing in the job ref number
    if(localStorage.jobid == "DA103" || localStorage.jobid == "CS301")
    {
        document.getElementById("id").value = localStorage.jobid;
        document.getElementById("id").readOnly = true;
        localStorage.jobid = "undefined";
    }
    else
        document.getElementById("id").readOnly = false;
    var regForm = document.getElementById("regform"); //get ref to the HTML element
    if(debug==1)
        regForm.onsubmit = validate;
    
}

//passing job id
var jobid;

function jobref1(){
    localStorage.jobid = "DA103";
}

function jobref2(){
    localStorage.jobid = "CS301";
}

//case of jobs.php
function init1(){
    var applybutton1 = document.getElementById("apply1");
    var applybutton2 = document.getElementById("apply2");
    applybutton1.onclick = jobref1;
    applybutton2.onclick = jobref2;
}

//initial function
function init(){
    var nani = document.getElementsByTagName("div")[0].id;
    if(nani == "omaewamou")
        init1();
    if(nani == "shindeiru")
        init2();
}

window.onload=init;