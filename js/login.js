$(document).ready(function(){
	$('#lbutton').click(function(){
		//alert();
		login();
	});

});

function login(){

	if($('#username').val()=='' &&  $('#password').val()==''){
		alert('Please Enter user name and password');
		$('#u_name').focus();
	}	
	else if ($('#password').val()==''){
		alert('Please Enter password');
		$('#password').focus();
	}
	else if($('#username').val()==''){
		alert('Please Enter user name');
		$('#u_name').focus();
	}else if($('#username').val()!='' &&  $('#password').val()!=''){
		validate_login();
	}


}


function validate_login(){
	$.post("index.php/main/login", {
        user_name:$('#username').val(),
        password:$('#password').val()
    }, function(r){
       if(r==1){
       location.href='http://localhost:81/mangala/';
       }else{
       	alert("Wrong login Information");
       }

    },"json");


}

