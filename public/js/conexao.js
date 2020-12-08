function ajax() {
    let loading = $('.lds-ellipsis');
    loading.attr('style','display: inline-block')
    $.get('/problems', (data) =>{
        data = JSON.parse(data)
        createRows(data);
    }).then(function(){
        loading.attr('style','display: none')
    })
    //$('.submit-button').attr('disabled', true)
}

function resolve(element){
    
    let pai = $('#row'+element[0])
    let erro = element[1];
    let idSolicitacao = element[2];
    
    if(deveRemover(erro)){
        pai.attr('style', 'display: none')
    }

    $.post('/resolve',{
        method: "POST",
        body:{
            "problema": erro,
            "idSolicitacao": idSolicitacao
        }
    }).then(response => {
        message(response)
        $('.copy-to-clipboard').attr('hidden', false)
        $('copy-to-clipboard').on('click', copyToClipboard('.response'))
    });
    
}

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

function message(message){
    let textarea = $('.response')
    textarea.text(message)
}

function createRows(data){
    var myList = $('.tbody');
    for(let i = 0; i < data.length; i++){
        let tableRow = $('<tr>');
        tableRow.addClass('linha')
        tableRow.attr('id','row'+i)
        let tableId = $('<td>').text(data[i].id_solicitacao_provisioning);
        let tableErro = $('<td>').text(data[i].xml_envio)
        let tableNumero = $('<th>').text(i+1) 
        let tableIcon = $('<th>')
        let icon = $('<button>')
        let elements = [i, data[i].xml_envio, data[i].id_solicitacao_provisioning]
        icon.addClass('send-button')
        icon.attr('id',i)
        console.log(elements)
        icon.attr('onclick','resolve([' + elements + '])')
        icon.text('Solucionar')
        tableIcon.append(icon)
        tableRow.append(tableNumero)
        tableRow.append(tableId)
        tableRow.append(tableErro)
        tableRow.append(tableIcon)
        myList.append(tableRow)
    }
}

function deveRemover(erro){
    switch(erro){
        case 1001:
            return false;
        default:
            return true;
    }
}