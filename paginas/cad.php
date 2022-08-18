<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      :root {
        --corPrincipal: #1b3d26;
        --textColor: rgb(237, 236, 227);
      }
      body {
        background-color: var(--corPrincipal);
      }
      .main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-top: 5vh;
        gap: 10vh;
      }
      .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 3vh;
        padding-top: 5vh;
      }
      input {
        border: none;
        border-bottom: 1px solid whitesmoke;
        padding: 0.7vw;

        transition: width 0.3s ease-in-out;

        width: 70vw;

        background-color: var(--corPrincipal);
        color: white;
        outline: none;
      }
      input:focus {
        width: 75vw;
      }
      .buttonDefault {
        background-image: linear-gradient(
          to right,
          #0ba360,
          #3cba92,
          #30dd8a,
          #2bb673
        );
        box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);

        color: var(--textColor);
        border: none;
        border-radius: 3px;

        width: 70vw;
        height: 5vh;

        cursor: pointer;

        padding: 1vh;
      }
      .buttonDefault:hover {
        transition: width 0.5s ease-in-out;
        width: 75vw;
      }
      h1 {
        color: var(--textColor);
        font-family: 'Open Sans', sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="main">
      <div class="form">
      <h1>Cadastrar gênero</h1>
      <form action="" method="post" class="form" name="genero">
        <input
          type="text"
          name="nome"
          id="nome"
          placeholder="Digite o gênero: "
        />
        <button class="buttonDefault" name="genero">Enviar</button>
      </form>
      </div>
      <div class="form">
      <h1>Cadastrar usuário</h1>
      <form action="" method="post" class="form" name="usuario">
        <input
          type="text"
          name="rm"
          id="rm"
          placeholder="Digite o rm: "
        />
        <input
          type="text"
          name="nome"
          id="nome"
          placeholder="Digite o nome: "
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Digite o email: "
        />
        <input type="password" name="senha" id="senha" placeholder="Digite a senha:">
        <input type="text" name="userStatus" id="userStatus" placeholder="Status:">
        <label for="adm">É um administrador?</label>
        <select name="adm" id="adm">
          <option value="0">Não</option>
          <option value="1">Sim</option>
        </select>
        <button class="buttonDefault" name="cadastroUsu">Enviar</button>
      </form>
      </div>
      <div class="form">
      <h1>Cadastrar editora</h1>
      <form action="" method="post" class="form" name="editora">
        <input
          type="text"
          name="nome"
          id="nome"
          placeholder="Digite o nome da editora: "
        />
        <button class="buttonDefault" name="editora">Enviar</button>
      </form>
      </div>
      <div class="form">
      <h1>Cadastrar autor</h1>
      <form action="" method="post" class="form" name="autor">
        <input
          type="text"
          name="nome"
          id="nome"
          placeholder="Digite o autor: "
        />
        <button class="buttonDefault" name="autor">Enviar</button>
      </form>
      </div>
      <a href="pageAdm.html"><button class="buttonDefault">Voltar</button></a>
    </div>
  </body>
</html>
<?php
    include('biblioteca.php');

    if($_POST){
        if(isset($_POST['cadastroUsu'])){
          $resultado = cadastrarUsuario($_POST['rm'], $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['userStatus'], $_POST['adm']); 
        } else if(isset($_POST['genero'])){
          $resultado = CadastrarGenero($_POST['nome']);
        } else if(isset($_POST['editora'])){
          $resultado = CadastrarEditora($_POST['nome']);
        } else if(isset($_POST['autor'])){
          $resultado = CadastrarAutor($_POST['nome']);
        }
    }
      
?>
