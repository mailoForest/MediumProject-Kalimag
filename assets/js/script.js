/**
 * Created by HP Pavilion 17 on 4.3.2017 г..
 */
function setClassActive(id) {
    document.getElementById(id).setAttribute('class', 'active');
}
function showAccountBar() {
    document.getElementById('account-bar').style.visibility = 'visible';
}
function hideAccountBar() {
    document.getElementById('account-bar').style.visibility = 'hidden';
}