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
