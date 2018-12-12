function markaEkle() {
     var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         var x = document.getElementsByClassName("content");
        x[0].innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "markaekle.php", true);
    xhttp.send();
}