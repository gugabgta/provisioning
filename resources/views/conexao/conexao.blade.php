@extends('layout')

@section('css')
<link rel="stylesheet" href="css/conexao.css">
@endsection

@section('content')

<div class="left-container">
    <div class="botao-loading">
        <button id="botao" class="submit-button" onclick="ajax()">Find All</button>
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    
    <table class="table table-hover">
        <thead style="text-align: center">
            <tr>
                <th scope="col"></th>
                <th scope="col">ID solicitacao</th>
                <th scope="col">Erro</th>
                <th scope="col">Operação</th>
            </tr>
        </thead>
        <tbody class="tbody" style="text-align: center">
        </tbody>
    </table>
</div>
    
<div class="right-container">
    <textarea class="response" disabled></textarea>
    <span class="copy-to-clipboard" style="margin-right: 80px; margin-top: 20px" hidden><i class="far fa-copy fa-2x"></i></span>
</div>

<script src=/js/conexao.js>
</script>

@endsection
