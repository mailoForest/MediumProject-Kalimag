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