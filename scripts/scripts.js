var showRegisterFormCont = $("#registerBtnContainer"); // Registration form button container
var showRegisterFormBtn = $("#registerBtn")      // Registration button 
var showLoginFormCont = $("#loginBtnContainer"); // Login form button container
var showLoginFormBtn = $("#loginBtn")            // Login button 
var loginForm = $("#loginForm");                 // Login Form
var registerForm = $("#registerForm");           // Registration Form
var loginBtn = $("#submit");                     // Login Submit Button
let registerBtn = $("#register");                // Register Submit Button
var loading = $("#loading");                     // Loading Data Div for Registration
var loginMsgs= $("#loginMsgs");                  // Div to hold our messages for login

$(showRegisterFormBtn).click(function() {
    
  $(loginForm).css('display', 'none');
  $(registerForm).css('display', 'block');
  $(showLoginFormCont).css('display', 'block');
  $(showRegisterFormCont).css('display', 'none');
})

$(showLoginFormBtn).click(function() {
  
  $(loginForm).css('display', 'block');
  $(registerForm).css('display', 'none');
  $(showLoginFormCont).css('display', 'none');
  $(showRegisterFormCont).css('display', 'block');
})


// JS Code To control the visibility of the Show/Hide Password button. 
const visibilityBtn = document.getElementById("visibilityBtn")
visibilityBtn.addEventListener("click",toggleVisibility)

function toggleVisibility (){
  const passwordInput = document.getElementById("password-register")
  const icon = document.getElementById("viewBtn")
  if (passwordInput.type == "password"){
    passwordInput.type = "text"
    icon.innerText = "visibility_off"
}
  else{
    passwordInput.type = "password"
    icon.innerText = "visibility"
  }
}


// JS Code to control enabling Register button only after all the fields are properly filled. 
// let input = document.querySelector(".form-group1");
// let button = document.getElementById("register")
// button.disabled = true;
// console.log("Reached outside  function and disabled button")
// input.addEventListener("change",stateHandle)


// function stateHandle (){
//   console.log("Reached stateHandle function")
//   if (document.getElementById("password-register").value === "" || document.getElementById("name").value === "" || document.getElementById("email").value === "" || document.getElementById("username-register").value === ""){
//     console.log("Leaving button disabled")
//     button.disabled = true
//   }
//   else{
//     button.disabled = false
//   }
// }

// JQuery to control and Send AJAX request with FormData for Register. 
$(registerBtn).click(function(e) {
  e.preventDefault();
  var formData = {
      
    "name" : $('input[name="register[name]"]').val(),
    "email" : $('input[name="register[email]"]').val(),
    "username" : $('input[name="register[username]"]').val(),
    "password" : $('input[name="register[password]"]').val()
                           
};

$.ajax({
        
  type:'post',
  url:'orchestrator.php',
  data:{action: 'register', formData:formData},
  beforeSend:  function() {
          $(loading).removeClass("hide").addClass("show");
          $(loading).html("<h5>Creating Acc11...</h5>");
  
  },
  
})


.done(function(data) {   //Callback once our Ajax in complete
  console.log(data)    //Send our data to the console
  setTimeout(function() {  //Set a Timeout wrapper around to run after 2 seconds.
      
      $(loading).removeClass("alert-info").addClass("alert-success");
      $(loading).html("<h5>Success!</h5>");
      $(loading).fadeOut(2000);
                
          setTimeout(function() {
                $(loading).removeClass("show").addClass("hide");
          }, 2000);

  }, 2000);

   $(registerForm)[0].reset();  //Reset our form after submission
   //button.disabled = true;

});

})



// JQuery to control and Send AJAX request with FormData for Login. 
$(loginBtn).click(function(e) {
  e.preventDefault();
  var formData = {
    "username" : $('input[name="user[username]"]').val(),
    "password" : $('input[name="user[password]"]').val()
                           
};

$.ajax({
        
  type:'post',
  url:'orchestrator.php',
  data:{action: 'login', formData:formData},
  cache: false,
  success: function(response) {
    console.log("In here")
    console.log(response)
    
    var jsonData = JSON.parse(response);
    if (jsonData.success == "1") {
      var lEmail = localStorage.setItem('email', formData["username"]);
      window.location.href = "my_profile.php";
    }
   else if (jsonData.success == "0") {
    console.log("User doesnt exist")
    $(loading_login).removeClass("hide").addClass("show");
    $(loading_login).html("<h5>Please Enter Valid Credentials!</h5>");
    $(loading_login).fadeOut(2000);
    setTimeout(function() {
      $(loading_login).removeClass("show").addClass("hide");
}, 2000);
}
}
})
})
