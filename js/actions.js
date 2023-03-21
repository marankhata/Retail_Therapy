$(document).ready(function(){


    
$("#LoginForm").submit(function(event){
event.preventDefault();
formLoginSubmit();
});

function formLoginSubmit() {
    var LOGIN=1;
    var EMAIL=document.getElementById("LOGIN_EMAIL");
    var PASSWORD=document.getElementById("LOGIN_PASSWORD");
    if( EMAIL.value.length>0 && PASSWORD.value.length>0){
    
        $.ajax({
            type:"POST",
            data: {
            LOGIN:LOGIN, 
            EMAIL:document.getElementById("LOGIN_EMAIL").value,
            PASSWORD:document.getElementById("LOGIN_PASSWORD").value
            },
            url:"actions.php",
            success: function(basariligiris)
            {
                if ($.trim(basariligiris)=="ADMIN") 
                {
                    window.location = "panel/index.php";
                }
                if ($.trim(basariligiris)=="LOGIN_SUCCESS") 
                {
                    window.location = "index.php";
                }
                else 
                {
                    document.getElementById("error_login").innerHTML=basariligiris;
                }
            
            
            }
        });
    }else{
      $('#error_login').text("*Make sure all fields are filled*"); 
    }
    } 
})


$("#RegisterForm").submit(function(event){
//alert('intercept');
event.preventDefault();
formRegisterSubmit();
});


    var pass1 = document.getElementById('RE_PASSWORD');
    var pass2 = document.getElementById('PASSWORD');


    pass1.addEventListener('keyup', validatePassword);
    pass2.addEventListener('keyup', validatePassword);
    var status = false;
  function validatePassword() {
    status = false;
    if (pass2.value == pass1.value || (pass2.value.length == 0)) {
        status = true;
        $('#error').text(""); 
    } 
    
    else {
        $('#error').text("*Passwords don't match*"); 
    }
    return status;
    }


function formRegisterSubmit() {

var FIRST_NAME=document.getElementById("FIRST_NAME").value;
var LAST_NAME=document.getElementById("LAST_NAME").value;
var BIRTHDAY=document.getElementById("BIRTHDAY").value;
var GENDER=document.getElementById("GENDER").value;
var PHONE_NUMBER=document.getElementById("PHONE_NUMBER").value;
var CITY=document.getElementById("CITY").value;
var ADDRESS=document.getElementById("ADDRESS").value;


var REGISTER=1;
if(status && pass2.value.length>0 && pass1.value.length>0){

    $.ajax({
        type:"POST",
        data: {
        FIRST_NAME:FIRST_NAME, 
        EMAIL:document.getElementById("EMAIL").value,
        LAST_NAME:LAST_NAME,
        PASSWORD:document.getElementById("PASSWORD").value,
        BIRTHDAY:BIRTHDAY,
        CITY:CITY,
        PHONE_NUMBER:PHONE_NUMBER,
		REGISTER:REGISTER,
		GENDER:GENDER
        },
        url:"actions.php",
        success: function(basariligiris)
        {
            if ($.trim(basariligiris)=="ok") 
            {
                window.location = "index.php?registersuccess=1";
            }
            else 
            {
                document.getElementById("error").innerHTML=basariligiris;
            }
        
        
        }
    });
}else{
  $('#error').text("*Passwords don't match*"); 
}

}
























