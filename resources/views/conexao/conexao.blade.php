@extends('layout')


@section('conteudo')

<div class="container-gustavo">
    <form action="xmldecode" method="get" id="form">
        <textarea id="textarea" name="textarea" placeholder="XML"></textarea>
        <div class="espaco">
            <input type="text" id="idProvisioning" name="idProvisioning" placeholder="ID Provisioning">
            <button id="botao" type="submit" class="btn btn-outline-danger">Enviar</button>
        </div>
    </form>
</div>

<script type="text/javascript" src="../resources/js/conexao.js"></script>

<style> <?php include '../resources/css/layout.css';?> </style>

@endsection
