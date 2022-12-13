function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}

function on_ok() {
    document.getElementById("overlay_ok").style.display = "block";
}

function off_ok() {
    document.getElementById("overlay_ok").style.display = "none";
}

function validateForm() {
    let validtitulo =       document.forms["envioForm"]["titulo"].value;
    let validremetente =    document.forms["envioForm"]["email_remetente"].value;
    let validdestinatario = document.forms["envioForm"]["email_destinatario"].value;
    let validassunto =      document.forms["envioForm"]["assunto"].value;

    if ( validtitulo == "" || validremetente == "" || validdestinatario == "" || validassunto || "") {
        alert("Preencha os campos");
        return false;
    } else {
        document.getElementById("overlay_ok").style.display = "block";
    }
}
