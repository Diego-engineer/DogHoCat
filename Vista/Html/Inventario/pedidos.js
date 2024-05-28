
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

function openModal(codigoInsumo) {
    document.getElementById("codigoInsumo").value = codigoInsumo;
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


function submitForm() {
    var form = document.getElementById("pedidoForm");
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../Controlador/controlpedidos.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
                modal.style.display = "none";
            } else if (xhr.readyState === 4) {
                alert("Error al enviar el formulario.");
            }
        };
    xhr.send(new URLSearchParams(formData).toString());

}