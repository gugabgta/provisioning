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
    let erro = element[2];
    let idSolicitacao = element[1];
    
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
    var $temp = $("<input>")
    $("body").append($temp)
    $temp.val($(element).text()).select()
    document.execCommand("copy")
    $temp.remove()
}

function message(message){
    let textarea = $('.response')
    textarea.text(message)
}

function createRows(data){
    var myList = $('.tbody')
    let i = 0
    for(element of data){
        let tableRow = $('<tr>');
        tableRow.addClass('linha')
        tableRow.attr('id','row'+i)
        let tableId = $('<td>').text(element.id_solicitacao_provisioning)
        let tableErro = $('<td>').text(element.xml_envio)
        let tableOperacao = $('<td>').text(element.operacao_gsim)
        let tableNumero = $('<th>').text(i+1)
        let tableIcon = $('<th>')
        let icon = $('<button>')
        icon.addClass('send-button')
        icon.attr('id',i)

        let values = getAllElementValuesAsString(Object.entries(element))

        icon.attr('onclick','resolve([' + i + ',' + values + '])')
        console.log(icon.attr('onclick'))
        icon.text('Solução')
        tableIcon.append(icon)
        tableRow.append(tableNumero)
        tableRow.append(tableId)
        tableRow.append(tableErro)
        tableRow.append(tableOperacao)
        tableRow.append(tableIcon)
        myList.append(tableRow)
        i++
    }
}

function getAllElementValuesAsString(element){
    let array = []
    let i = 0
    for(key of element){
        if(typeof(key[1]) == 'string'){
            array[i] = "'" + key[1] + "'"
        }
        else{
            array[i] = key[1]
        }
        i++
    }
    array.join(',')
    return array;
}

function deveRemover(erro){
    switch(erro){
        case 1001:
            return false;
        default:
            return true;
    }
}
