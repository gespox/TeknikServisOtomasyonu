var modal = document.getElementById('login1');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function openForm1() {
    document.getElementById("myForm1").style.display = "block";
    document.getElementById("myForm").style.display = "none";
}

function closeForm1() {
    document.getElementById("myForm1").style.display = "none";
}
function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("myForm1").style.display = "none";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}