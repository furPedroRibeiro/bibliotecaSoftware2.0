<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik&family=Square+Peg&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap"
    rel="stylesheet"
  />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      :root {
        --corPrincipal: #1b3d26;
        --textColor: rgb(67, 89, 67);
      }
      body {
        background-color: var(--textColor);
        color: var(--corPrincipal);
        font-size: 17px;
        font-family: 'Open Sans', sans-serif;
      }
      .header {
      display: flex;
      justify-content: center;
      align-items: center;

      height: 12vh;
      width: 100%;
      background-color: var(--corPrincipal);
      color: var(--textColor);

      font-family: 'Rubik', sans-serif;
      font-family: 'Square Peg', cursive;
      font-size: 60px;
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
        border-bottom: 1px solid var(--corPrincipal);
        padding: 0.7vw;

        transition: width 0.3s ease-in-out;

        width: 70vw;

        background-color: var(--textColor);
        color: white;
        outline: none;
      }
      input:focus {
        width: 75vw;
      }
      input::placeholder{
        color: var(--corPrincipal);
        font-size: 17px;
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
        color: var(--corPrincipal);
        font-family: 'Open Sans', sans-serif;
      }
      table{
            width: 15rem;
            text-align: justify;
            border: 1px solid var(--corPrincipal);
        }
        th{
            width: 15rem;
            border-bottom: 1px solid var(--corPrincipal);
            text-align: justify;
            padding: 0.2rem;
        }
        td{
            width: 15rem;
            border-left: 1px solid var(--corPrincipal);
            padding: 0.2rem;
        }
    </style>
  </head>
  <body>
  <header class="header">
      <div class="textLogo"><span>AdInfinitum</span></div>
    </header>
    <div class="main">
    <h1>Gêneros</h1>
        <?php
            include('biblioteca.php');
            echo "<table>
            <tr>
            <th>Código</th>
            <th>Nome</th>
            </tr>
            ";
            MostrarGenero();
            echo "
            </table>";
        ?>
        <h1>Editoras</h1>
        <?php
            echo "<table>
            <tr>
            <th>Código</th>
            <th>Nome</th>
            </tr>
            ";
            MostrarEditora();
            echo "
            </table>";
        ?>
    <div class="form">
      <h1>Cadastrar Livro</h1>
      <form action="" method="post" class="form" name="autor">
        <input
          type="text"
          name="titulo"
          id="titulo"
          placeholder="Digite o título do livro: "
        />
        <label for="ano">Ano do livro:</label>
        <input type="date" name="ano" id="ano">
        <input type="text" name="classif" id="classif" placeholder="Classificação do livro:">
        <input type="text" name="estado" id="estado" placeholder="Digite o estado do livro:">
        <input type="text" name="editora" id="editora" placeholder="Digite o código da editora:">
        <input type="text" name="genero" id="genero" placeholder="Digite o código do gênero:">
        <input type="text" name="isbn" id="isbn" placeholder="ISBN do livro:">
        <input type="text" name="qtd" id="qtd" placeholder="Quantidade de livros:">
        <input type="text" name="sinopse" id="sinopse" placeholder="Sinopse do livro:">
        <button class="buttonDefault" name="livro">Enviar</button>
      </form>
    </div>
    <a href="cad.php"><button class="buttonDefault" name="livro">Voltar</button></a>
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
      <a href="pageAdm.html" style="margin-bottom: 10vh;"><button class="buttonDefault">Voltar</button></a>
      </div>
    </div>
  </body>
</html>
<?php

    if($_POST){
        if(isset($_POST['cadastroUsu'])){
          $resultado = cadastrarUsuario($_POST['rm'], $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['userStatus'], $_POST['adm']); 
        } else if(isset($_POST['genero'])){
          $resultado = CadastrarGenero($_POST['nome']);
        } else if(isset($_POST['editora'])){
          $resultado = CadastrarEditora($_POST['nome']);
        } else if(isset($_POST['autor'])){
          $resultado = CadastrarAutor($_POST['nome']);
        } else if(isset($_POST['livro'])){
          CadastrarLivro($_POST['ano'], $_POST['classif'], $_POST['estado'], $_POST['editora'], $_POST['genero'], $_POST['isbn'], $_POST['qtd'], $_POST['sinopse'], $_POST['titulo']);
      }
    }
      
?>
