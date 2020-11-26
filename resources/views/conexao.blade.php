<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="containerzao">
        <div class="contain container-esquerda">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
        <div class="contain container-direita">
            <form action="xmldecode" method="get" id="form">
                <label for="textarea">XML: </label><br>
                <textarea id="textarea" name="textarea"></textarea><br>
                <label for="idProvisioning">id provisioning: </label><br>
                <input type="text" id="idProvisioning" name="idProvisioning">
                <button id="botao"> Botão </button>
            </form>
        </div>
    </div>    
</body>
<script>
    function mensagem() {
        event.preventDefault();
        let form = document.getElementById('form');
        let text = document.getElementById('textarea');
        let xml = text.value;
        form.action = form.action + "/" + xml;
        console.log(form.action);
        console.log(text.value);
    }
</script>
<?php 
        var_dump($_POST)
    ?>
<style>
    .containerzao{
        margin-top: 20px;
        border-width: 2px;
        height: 800px;
        width: 1700px;
        margin-left: 5px;
        /*display: inline;*/
    }

    .container-esquerda {
        float: left;
        width: 180px;
        height: 100%;
        border-style: dotted;
        border-width: 2px;
        box-shadow: 4px 3px 3px grey;
    }

    .container-direita {
        float: right;
        margin-left: 2px;
        border-style: dotted;
        border-width: 2px;
        width: 88%;
        height:100%;
        align-items: top;
        box-shadow: 4px 3px 3px grey;
    }​

    #lili{
        font-size: 50px;
        text-align: center;
    }

    #botao{
        width: 100px;
        height: 40px;
        border-radius: 10px;
        background-color: #ff0000;
        color: #ffffff;
    }

    textarea {
        margin-left: 20px;
        margin-bottom: 10px;
        resize: none;
        width: 900px;
        height: 650px;
    }

    input {
        margin-left: 20px;
    }

    label {
        margin-left: 20px;
    }
</style>
</html>