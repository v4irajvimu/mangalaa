$(document).ready(function(){
	$('#lbutton').click(function(){
		//alert();
		login();
	});

});

function login(){

	if($('#email').val()=='' &&  $('#password').val()==''){
		alert('Please Enter Email and password');
		$('#email').focus();
	}	
	else if ($('#password').val()==''){
		alert('Please Enter password');
		$('#password').focus();
	}
	else if($('#email').val()==''){
		alert('Please Enter Email');
		$('#email').focus();
	}else if($('#email').val()!='' &&  $('#password').val()!=''){
		validate_login();
	}


}


function validate_login(){
	$.post("index.php/main/login", {
        email:$('#email').val(),
        password:$('#password').val()
    }, function(r){
       if(r==1){
       location.href='http://localhost/mangalaa/';
       }else{
       	alert("Wrong login Information");
       }

    },"text");


}

