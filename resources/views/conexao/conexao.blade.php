@extends('layout')


@section('conteudo')

<div class="container-gustavo">
    <form action="xmldecode" method="get" id="form">
        <textarea id="textarea" name="textarea" placeholder="XML"><div class="font-textarea"></div></textarea>
        <div class="espaco">
            <input type="text" id="idProvisioning" name="idProvisioning" placeholder="ID Provisioning">
            <button id="botao" type="submit" class="btn btn-outline-danger">Enviar</button>
        </div>
    </form>

    <img src="https://spotlights-feed.github.com/spotlights/game-off-2020/github-game-off-2020.gif" style="height: 150px; width: 250px; float: left" class="d-block width-fit mx-auto">
</div>

<script type="text/javascript" src="../resources/js/conexao.js"></script>

<style> <?php include '../resources/css/layout.css';?> </style>

@endsection
