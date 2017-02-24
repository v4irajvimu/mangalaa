$(document).ready(function(){

  $("#btnSignup ").click(function() {
  	alert();
    validate_signup();
    if (validate_signup()) {
    var frm = $('#form_signup');
    
    $.ajax({
      type: frm.attr('method'),
      url: frm.attr('action'),
      data: frm.serialize(),
      dataType: 'json',
      success: function (pid){
        alert("Signed up Succesfully");
        location.href="http://localhost:81/mangala/?action=login";
      }
    });
  }

  });

  function validate_signup(){
if($("#fname").val()=="")
    { 
      alert("Please Enter Name");
      return false;
  }
  else if($("#uid").val()==0)
  {
    alert("Please Enter User ID");
    return false;
}
else if($("#password").val()==0)
{
    alert("Please Enter Password");
    return false;
}
else if($("#description").val()==0)
{
    alert("Please Enter Description");
    return false;
}
else{
  return true;
}
}

});

