function mensagem() {
    let form = document.getElementById('form');
    let text = document.getElementById('textarea');
    let xml = text.value;
    form.action = form.action + "/" + xml;
    console.log(form.action);
    console.log(text.value);
}
