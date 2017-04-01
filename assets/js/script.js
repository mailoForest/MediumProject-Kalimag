/**
 * Created by HP Pavilion 17 on 4.3.2017 г..
 */
function showGoTop() {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        document.getElementById('goTop').style.visibility = "visible";
    } else {
        document.getElementById('goTop').style.visibility = "hidden";
    }
}
function setClassActive(id) {
    document.getElementById(id).setAttribute('class', 'active');
}

function showAccountBar() {
    document.getElementById('account-bar').style.visibility = 'visible';
}
function hideAccountBar() {
    document.getElementById('account-bar').style.visibility = 'hidden';
}
function showLoginBar() {
    document.getElementById('login-wrapper').style.visibility = 'visible';
}
function showRegisterBar() {
    document.getElementById('register-wrapper').style.visibility = 'visible';
}
function hideLogBar() {
    document.getElementById('login-wrapper').style.visibility = 'hidden';
    document.getElementById('register-wrapper').style.visibility = 'hidden';
}

var emailField = document.getElementById('email');
var newMail = document.getElementById('reg-email');
var pass = document.getElementById('password-log');
var password = document.getElementById('reg-password');
var repeatPass = document.getElementById('repeat-pass');
var hasErrors = true;

function isValidEmail(username) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(username);
}
function login(){
emailField.onblur = function() {
	if (isValidEmail(emailField.value)){ 
		emailField.style.border = "2px solid green";
//		var email = $('#email').val();
//		$.post('http://localhost/MediumProject-Kalimag/check.php',{ email: email }, 
//				function(data){
//			if (data == 1) {
//				var container = document.getElementById("mail");
//				var errorMessage = document.createElement('span');
//				errorMessage.className = 'error';
//				errorMessage.textContent = 'Няма регистриран потребител с този имейл';
//				emailField.style.border = "2px solid red";
//				container.appendChild(errorMessage);
//				hasErrors = true;
//			}else{
//			    hasErrors = false;
//				emailField.style.border = "2px solid green";
//				emailField.style.borderRadius = "5px"
//			}
//		});
	}
	else
		{
		var errorContainer = document.getElementById("mail");
		var errorMessage = document.createElement('span');
		errorMessage.className = 'error';
		errorMessage.textContent = 'Невалиден имейл';
		errorMessage.style.color = 'red';
		errorContainer.appendChild(errorMessage);
		emailField.style.border = "2px solid red";
		hasErrors = true;
	}
}

pass.onkeyup = function(){
	var password = $('#password-log').val();
	var email = $('#email').val();
	$.post('http://localhost/MediumProject-Kalimag/check.php',{ password: password, email: email }, 
			function(data){
		console.log(password, email);
		if (data == 1) {
			pass.style.backgroundColor = "green";
			hasErrors = false;
		}else {
			pass.style.backgroundColor = "red";
			hasErrors = true;
		}
});
}
emailField.onfocus = function() {
	var errorMessage = document.querySelector("#mail > .error");
	if (errorMessage) {
		errorMessage.parentNode.removeChild(errorMessage);
		emailField.style.border = "none";
		hasErrors = false;
	}
};
}
	
function registration(){
repeatPass.onblur = function() {
	if (password.value !== repeatPass.value){
		hasErrors = true;
		var errorContainer = document.getElementById("regPassword");
		var errorMessage = document.createElement('span');
		errorMessage.className = 'error';
		errorMessage.textContent = 'Паролите не съвпадат';
		errorMessage.style.color = 'red';
		errorContainer.appendChild(errorMessage);
		repeatPass.style.border = "2px solid red";
	} else {
		repeatPass.style.border = "2px solid green";
		hasErrors = false;
	}
	
}

newMail.onblur = function() {
	if (isValidEmail(newMail.value)){ 

	var email = $('#reg-email').val();
	$.post('http://localhost/MediumProject-Kalimag/check.php',{ email: email }, 
			function(data){
		if (data == 1) {
			var container = document.getElementById("emails");
			var errorMessage = document.createElement('span');
			errorMessage.className = 'error';
			errorMessage.textContent = 'Вече има регистриран потребител с този имейл';
			newMail.style.border = "2px solid red";
			container.appendChild(errorMessage);
			hasErrors = true;
		} else {
			newMail.style.border = "2px solid green";
			hasErrors = false;
		}
	});
	}
	else
	{
	var errorContainer = document.getElementById("emails");
	var errorMessage = document.createElement('span');
	errorMessage.className = 'error';
	errorMessage.textContent = 'Невалиден имейл';
	errorMessage.style.color = 'red';
	errorContainer.appendChild(errorMessage);
	newMail.style.border = "2px solid red";
	hasErrors = true;
}
};
newMail.onfocus = function() {
	var errorMessage = document.querySelector("#emails > .error");
	if (errorMessage) {
		errorMessage.parentNode.removeChild(errorMessage);
		hasErrors = false;
	}
};

repeatPass.onfocus = function() {
	var errorMessage = document.querySelector("#regPassword > .error");
	if (errorMessage) {
		errorMessage.parentNode.removeChild(errorMessage);
		repeatPass.style.border = "2px solid green";
		hasErrors = false;
	}
};
}
if (emailField){
	login();
}

if (password){
	registration();
}
document.forms[0].onsubmit = function(event) {
	if (hasErrors) {
		event.preventDefault();
	}
}
document.forms[1].onsubmit = function(event) {
	if (hasErrors) {
		event.preventDefault();
	}
}
