function deleteFunc(btn, id) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "ajax/delete.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        console.log(btn);
        btn.closest("tr").remove();
        }
    }
}
function editFunc(id) {
    window.location.href='edit.php?id='+id;
}