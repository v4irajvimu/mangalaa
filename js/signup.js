$(document).ready(function(){

  $(document).on("submit","#form_signup",function(e) {
    e.preventDefault();
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
        location.href="http://localhost/mangalaa/?action=login";
      }
    });
  }

  });


  function validate_signup(){








confirm_password
    if($("#name").val()=="")
        { 
          alert("Please Enter Name");
          return false;
      }
      else if($("#nic").val()=="")
      {
        alert("Please Enter nic");
        return false;
    }
    else if($("#address").val()=="")
    {
        alert("Please Enter address");
        return false;
    }
    else if($("#email").val()==0)
    {
        alert("Please Enter email");
        return false;
    }
    else if($("#tp_mobile").val()==0)
    {
        alert("Please Enter tp_mobile");
        return false;
    }
    else if($("#tp_fixed").val()==0)
    {
        alert("Please Enter tp_fixed");
        return false;
    }
    else if($("#password").val()==0)
    {
        alert("Please Enter password");
        return false;
    }
    else if($("#confirm_password").val()==0)
    {
        alert("Please Enter confirm_password");
        return false;
    }
    else if($("#confirm_password").val()!==$("#confirm_password").val())
    {
        alert("Password Not Matched");
        return false;
    }
    else{
      return true;
    }
}

});

