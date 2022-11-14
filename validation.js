/*function validate(inputpassword) 
{ 
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
if(inputpassword.value.match(decimal)) 
{ 
alert('Correct, try another...')
return true;
}
else
{ 
alert('Wrong...!')
return false;
}
} */

function validate(){
    var pass = document.getElementById('password');
    var upper = document.getElementById('upper');
    var lower = document.getElementById('lower');
    var num = document.getElementById('number');
    var len = document.getElementById('length');
    var sp_char = document.getElementById('special_char');

    //check if pass value contain a number
    if(pass.value.match(/[0-9]/)){
        //match is a function which matchs a regular expression
// password contain 0 to 9 number then
num.style.color = 'green'
    } 
    else {
        //otherwise
        num.style.color = 'red'
    }
    // same way just copy and paste
    //check if pass value contain an uppercase
    if(pass.value.match(/[A-Z]/)){
        //match is a function which matchs a regular expression
// password contain A to Z number then
upper.style.color = 'green'
    } 
    else {
        //otherwise
        upper.style.color = 'red'
    }
    //check if pass value contain an lowercase
    if(pass.value.match(/[a-z]/)){
        //match is a function which matchs a regular expression
// password contain a to z number then
lower.style.color = 'green'
    } 
    else {
        //otherwise
        lower.style.color = 'red'
    }
    //check if pass value contain special character
    if(pass.value.match(/[<\,\.\?\>\@\~\!\`\#\$\%\^\&\*\(\)\-\|\+\=\_]/)){
        //match is a function which matchs a regular expression
// password contain A to Z number then
sp_char.style.color = 'green'
    } 
    else {
        //otherwise
        sp_char.style.color = 'red'
    }
    //checking length of password
    
    if(pass.value.length < 6){
        //match is a function which matchs a regular expression
// password contain A to Z number then
len.style.color = 'red'
    } 
    else {
        //otherwise
        len.style.color = 'green'
    }



}

function ValidateEmail(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  
    if (input.value.match(validRegex)) {
  
      alert("Valid email address!");
  
      document.form1.email.focus();
  
      return true;
  
    } else {
  
      alert("Invalid email address!");
  
      document.form1.email.focus();
  
      return false;
  
    }
  
  }

  

