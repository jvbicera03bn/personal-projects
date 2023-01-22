// jQuery document ready
$(document).ready(function () {
    function notif() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById("table").innerHTML = this.responseText;
        }
        xhttp.open("GET", "fetch_chat.php");
        xhttp.send();
    }
    setInterval(function () {
        table();
    }, 1);
});
