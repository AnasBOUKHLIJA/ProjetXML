const supprimer = (target,code) => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/ProjetXML/Suppression", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        target,
        code
    }));
    xhr.onload = function() {
        console.log(this.responseText);
        location.replace(this.responseText);
    }
}
const hide = (target,code,value) => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/ProjetXML/Cache", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        target,
        code,
        value
    }));
    xhr.onload = function() {
        console.log(this.responseText);
        location.replace(this.responseText);
    }
}