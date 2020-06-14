function xttp_r(id_,link_)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById(id_).innerHTML =
    this.responseText;
    }
};
xhttp.open("GET", link_, true);
xhttp.send();
}
