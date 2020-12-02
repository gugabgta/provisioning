@extends('layout')

@section('content')

<div class="float-container container-gustavo">
    <div class="left-container">
        <form action="xmldecode" method="get" id="form">
            <textarea class="main-textarea"id="textarea" name="textarea" placeholder="XML"></textarea>
            <div class="espaco">
                <input type="text" id="idProvisioning" name="idProvisioning" placeholder="ID Provisioning">
                <button id="botao" type="submit" class="submit-button">Enviar</button>
            </div>
        </form>
    </div>
    <div class="right-container">
        <textarea class="response" disabled></textarea>
    </div>
</div>
<script type="text/javascript" src="../resources/js/conexao.js"></script>

<style> <?php include '../resources/css/conexao.css';?></style>

@endsection

