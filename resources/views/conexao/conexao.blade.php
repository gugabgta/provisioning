@extends('layout')

@section('content')

<div class="left-container">
    <div class="botao-loading">
        <button id="botao" class="submit-button" onclick="ajax()">Find All</button>
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">ID solicitacao</th>
                <th scope="col">Erro</th>
                <th scope="col">Operação</th>
            </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
    </table>
</div>
    
<div class="right-container">
    <textarea class="response" disabled>
    </textarea>
</div>

<style> <?php include '../resources/css/conexao.css'; ?> </style>

<script>

function ajax() {
    let loading = $('.lds-ellipsis');
    loading.attr('style','display: inline-block')
    $.get('/problems', (data) =>{
        data = JSON.parse(data)
        createRows(data);
    }).then(function(){
        loading.attr('style','display: none')
    })
}

function clique(element){
    
    erro = element[0];
    idSolicitacao = element[1];

    $.post('/resolve',{
        method: "POST",
        body:{
            "problema": erro,
            "idSolicitacao": idSolicitacao
        }
    }).then(response => message(response));
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
        icon.addClass('send-button')
        icon.attr('id',i)
        icon.attr('onclick','clique([' + data[i].xml_envio + "," + data[i].id_solicitacao_provisioning + '])')
        icon.text('Enviar')
        tableIcon.append(icon)
        tableRow.append(tableNumero)
        tableRow.append(tableId)
        tableRow.append(tableErro)
        tableRow.append(tableIcon)
        myList.append(tableRow)
    }
}
</script>

@endsection
