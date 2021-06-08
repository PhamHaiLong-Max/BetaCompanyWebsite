/*
 * Author: Pham Hai Long - 102255792
 * Target: apply.php
 * Purpose: for glory (and points)
 * Created: 4/13/2019
 * Last updated: 4/13/2019
 * Credits: https://www.developerdrive.com/2019/02/build-countdown-timer-pure-javascript/ (together with tutorials from W3school)
 *          https://www.youtube.com/watch?time_continue=266&v=VlwSz2dXK_8
*/

"use strict"

//timer countdown
var starttimer = new Date().getTime();
var minute = 30;
var endtimer = starttimer + minute*60*1000;

setInterval(myTimer, 1000);

function myTimer(){
    starttimer = new Date().getTime();
    if(starttimer > endtimer){
        soundFX();
        alert("Pending application form timed out!");
        window.location = "index.php";
    }
}


//sound effect for warnings
function soundFX(){
    var SFX = new Audio();
    SFX.src = "scripts/SFX.mp3";
    SFX.play();
}

//play SFX if validation fails
setInterval(check, 1);

function check(){
    if(sessionStorage.result=="false"){
        soundFX();
        sessionStorage.result=true;
    }
}