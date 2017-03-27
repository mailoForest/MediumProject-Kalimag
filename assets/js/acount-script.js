function isValidEmail(username) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(username);
}

function personalSeting() {
    document.getElementById('security').style.display = 'none';
    document.getElementById('personalData').style.display = 'block';
}
function securitySeting() {
    document.getElementById('security').style.display = 'block';
    document.getElementById('personalData').style.display = 'none';
}
function changeEmail() {
    document.getElementById('new-email').style.display = 'block';
}
function quitChangeEmail() {
    document.getElementById('new-email').style.display = 'none';
}

function changePass() {
    document.getElementById('new-pass').style.display = 'block';
}
function quitChangePass() {
    document.getElementById('new-pass').style.display = 'none';
}

function change() {
	var newEmail = document.getElementById('newEmail').value;
	
	var email = $('#newEmail').val();
	var newPassword = $('#newPassword').val();
	$.post('http://localhost/MediumProject-Kalimag/security-options.php',{ email: email, newPassword:newPassword }, 
		function(data){
			if(data==true){	
				document.getElementById('new-email').style.display = 'none';
				document.getElementById('oldEmail').style.display = 'none';
				document.getElementById('done-change-mail').style.display = 'block';
				document.getElementById('createdMail').innerHTML = newEmail;
			}else	
				document.getElementById('newPassword').style.backgroundColor = 'red';
		});		
};

function changePassword() {
	var newPass = $('#newPass').val();
	var oldPassword = $('#oldPassword').val();
	var repeatPass = $('#repeatPass').val();
	$.post('http://localhost/MediumProject-Kalimag/security-options.php',{ newPass: newPass, oldPassword:oldPassword, repeatPass:repeatPass }, 
		function(data){
			if(data==true){	
				document.getElementById('new-pass').style.display = 'none';
				document.getElementById('doneChangePass').style.display = 'block';
			}else	
				document.getElementById('repeatPass').style.backgroundColor = 'red';
				document.getElementById('oldPassword').style.backgroundColor = 'red';
		});		
};

var emailField = document.getElementById('newEmail');
emailField.onblur = function() {
	if (isValidEmail(emailField.value)){ 

	var email = $('#newEmail').val();
	$.post('http://localhost/MediumProject-Kalimag/check.php',{ email: email }, 
			function(data){
		if (data == 1) {
			emailField.style.border = "2px solid red";
		} else {
			emailField.style.border = "2px solid green";
		}
	});
	}else {
		emailField.style.border = "2px solid red";
	}
}

