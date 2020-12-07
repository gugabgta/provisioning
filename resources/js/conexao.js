function mensagem() {
    let form = document.getElementById('form');
    let text = document.getElementById('textarea');
    let xml = text.value;
    form.action = form.action + "/" + xml;
    console.log(form.action);
    console.log(text.value);
}

function ajax() {
    fetch('conexao', {method = 'post'}) //retorna promise
    .then((response) => {
	    console.log(response.json())
    })
}
console.log('ta carregando');
document.getElementById("botao").addEventListener("click", function(event){
    event.preventDefault()
});

