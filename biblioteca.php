<?php
  session_start();
  $user = 'root';
  $pass = '';
  $banco = 'projetobiblioteca';
  $server = 'localhost';
  $conn = new mysqli($server, $user, $pass, $banco);
  if(!$conn){
    echo "Erro de conexão ".$conn->error;
  }
  /* Metodos do CRUD do Administrador */
  function Login($email, $senha, $tipo){
      $sql = 'SELECT * FROM usuario WHERE email = "'.$email.'" AND senha = "'.$senha.'"';
      $res  = $GLOBALS['conn']->query($sql);
      if($res->num_rows > 0){
          $retorno['erro'] = false;
          $user = $res->fetch_object();
          $retorno['dados'] = $user;
      } else{
          $retorno ['erro'] = true;
      }
      if($tipo == 'json'){
        return json_encode($retorno);
      }else {
        return $retorno;
      }
      }
          function cadastrarUsuario($rm,$nome,$email,$senha,$userstatus,$adm){
        $sql = 'INSERT INTO usuario(rm, nome, email, senha, user_status, adm) VALUES ('.$rm.',"'.$nome.'","'.$email.'","'.$senha.'","'.$userstatus.'","'.$adm.'")';
        $destino = 'usuario/fotos/'.$rm;
        if (is_dir($destino)){
            mkdir($destino, 0777);
        }
        $res = $GLOBALS['conn']->query($sql);
        if($res){
          echo "Usuário cadastrado com sucesso!";
        }else{
          echo "Erro ao cadastrar ADM";
        }
        }
  function ExcluirUsuario($rm){
    $sql = 'DELETE FROM usuario WHERE rm = '.$rm;
    $res = $GLOBALS['conn']->query($sql);

    if($res)
      echo "Excluído com sucesso!";
    else 
      echo "Erro ao excluir";
  }
  function AtualizarUsuario($rm,$nome,$nasc,$gen,$tel){
    $sql = 'UPDATE usuario SET nome = "'.$nome.'",dt_nascimento = "'.$nasc.'", genero = "'.$gen.'", telefone = "'.tel.'" WHERE rm ='.$rm;
    $res = GLOBALS ['conn']-> query($sql);
    if($res)
      echo "Atualizado com sucesso!";
    else
      echo "Erro ao atualizar";
  }
  function TrocarFoto($rm,$foto){
    $destino = 'usuario/fotos/'.$rm.'/'.$foto['name'];
    if(move_uploaded_file($foto['tmp_name'], $destino)){
      $sql = 'SELECT * FROM usuario WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      $user = $res->fetch_array();
      unlink($user['perfil']);
      $sql = 'UPDATE usuario SET perfil "'.$destino.'" WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Atualizado com sucesso";
      }
      else{
        echo "Erro ao atualizar foto";
      }
    }
  }
  function TrocarSenha(){
    $nova_senha = ""; //fazer método
    $sql = 'UPDATE usuario SET senha ="'.$nova_senha.'" WHERE rm = '.$rm;
    $res = GLOBALS['conn']->query($sql);
    $user = $res->fetch_array();
    if(mail($user['email'], "Biblioteca [nova senha]",$msg)){
      $sql = 'UPDATE usuario SET senha = "'.$nova_senha.'" WHERE rm = '.$rm;
      $res = $GLOBALS['conn']->query($sql);
      if($res){
        echo "Nova senha encaminhada para seu email!";
      } else{
        echo "Erro ao trocar a senha. Tente novamente";
      }
    }
  }
  function CadastrarGenero($nome){
    $sql = 'INSERT INTO genero VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function ExcluirGenero($cd){
    $sql = 'DELETE FROM genero WHERE cd ='.$cd;
    $res = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Gênero excluído";
    } else {
      echo "Erro ao excluir, verifique se há livros utilizando.";
    }
  }
  function CadastrarEditora($nome){
    $sql = 'INSERT INTO editora VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Editora cadastrada";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function CadastrarAutor($nome){
    $sql = 'INSERT INTO autor VALUES (null, "'.$nome.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Autor cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
  function MostrarAutor(){
    $query = "SELECT * from autor";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function MostrarGenero(){
    $query = "SELECT * from genero";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function MostrarEditora(){
    $query = "SELECT * from editora";
    $result = $GLOBALS['conn']->query($query);
    if($result){
      while($fetch = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($fetch as $field => $value) {
            echo '<td>'.$value.'</td>' ;
        }
      }
    } else{
      echo "Erro";
    }
  }
  function CadastrarLivro($ano, $classificacao, $estado, $id_editora, $id_genero, $isbn, $qtd, $sinopse, $titulo){
    $sql = 'INSERT INTO livro(ano, capa, cd, classificacao, estado, id_editora, id_genero, isbn, qtd, sinopse, titulo) VALUES ("'.$ano.'", null, null, "'.$classificacao.'", "'.$estado.'", "'.$id_editora.'", "'.$id_genero.'", "'.$isbn.'", "'.$qtd.'", "'.$sinopse.'", "'.$titulo.'")';
    $res  = $GLOBALS['conn']->query($sql);
    if($res){
      echo "Livro cadastrado";
    } else {
      echo "Erro ao cadastrar"; 
    }
  }
?>