var updateBtn = $("#updatedetails");
var lEmail = localStorage.getItem('email')

console.log("Reached the script file")
console.log(lEmail)

$(updateBtn).click(function(e) {
  console.log("Reached onclick")
  e.preventDefault();
  var formData = {
    "name" : $('input[name="register[name]"]').val(),
    "email" : $('input[name="register[email]"]').val(),
    "password" : $('input[name="register[password]"]').val() ,
    "username" : lEmail                 
};

$.ajax({
        
  type:'post',
  url:'login.php',
  data:{action: 'update', formData:formData},
  beforeSend:  function() {
          $(loading).removeClass("hide").addClass("show");
          $(loading).html("<h5>Updating the Account</h5>");
  
  },
  
})

.done(function(data) {
  console.log(data)    //Send our data to the console
  setTimeout(function() {  //Set a Timeout wrapper around to run after 2 seconds.
      
      $(loading).removeClass("alert-info").addClass("alert-success");
      $(loading).html("<h5>Updated Details Successfully!</h5>");
      $(loading).fadeOut(2000);
                
          setTimeout(function() {
                $(loading).removeClass("show").addClass("hide");
          }, 2000);

  }, 2000);

})

})