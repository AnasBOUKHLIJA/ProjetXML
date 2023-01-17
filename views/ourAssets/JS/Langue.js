const changeLangue = (lang) => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/ProjetXML/controllers/changeLangue.php", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        langue: lang,
        href: window.location.href
    }));
    xhr.onload = function() {
        console.log(this.responseText);
        console.log(window.location.href);
        window.location.reload();
    }
}