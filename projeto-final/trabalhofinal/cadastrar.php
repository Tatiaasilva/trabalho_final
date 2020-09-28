<?php
//php incluindo o documento usuarios
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastre-se</title>
	<link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>


              
               <style type="text/css">
         .logo
            {
           margin-right: 400px;
            font-family: 'Crimson Text', serif, font-size -2px;
            color:  ;     
            }
         </style>



          
       <!--inicio da nav-bar-->
     <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm bg-transparent fixed-top"> <a href="#" class="navbar-brand font-weight-bold d-block d-lg-none"></a>
  
    <div id="navbarContent" class="collapse navbar-collapse">
        <ul class="navbar-nav mx-auto">
          <h4 class="logo" style="color: #87CEEB">HA BORDO</h4><!--titulo usado como logo-->
          
            <!--itens da nav-->
            <li class="nav-item dropdown megamenu"><a id="megamneu" href="index.html" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link  font-weight-bold text-uppercase">Ínicio</a>
            <li class="nav-item"><a href="destino.html" class="nav-link font-weight-bold text-uppercase">Destinos</a></li>
            <li class="nav-item"><a href="promo.html" class="nav-link font-weight-bold text-uppercase">Pacotes</a></li>
            <li class="nav-item"><a href="sobrenos.html" class="nav-link font-weight-bold text-uppercase">Contato</a></li>

        </ul>
    </div>
</nav>
<body>
<div id="corpo-form-Cad">
		<h1>Cadastrar</h1>
    <form method="POST">
      <!--Declarando os espaçamentos para conclusão do cadastro-->
      <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
      <input type="text" name="telefone" placeholder="telefone" maxlength="30">
      <input type="email" name="email" placeholder="Usuário" maxlength="40">
      <input type="password" name="senha" placeholder="Senha" maxlength="15">
      <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
      <input type="submit" value="Cadastrar">
      <a href="telalogin.php">Já concluiu seu cadastro?<strong>faça login aqui</strong></a>
      <!--botao de cadastro e botão de login para entrar na página inicial-->
    </form>
</div>
<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{ 
     $nome = addslashes($_POST['nome']);
     $telefone = addslashes($_POST['telefone']);
     $email = addslashes($_POST['email']);
     $senha = addslashes($_POST['senha']);
     $confirmarSenha = addslashes($_POST['confSenha']);
     //verificar se esta preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("projeto_login","localhost","root","");
        if($u->msgErro == "")//se esta tudo ok
        {
             if($senha == $confirmarSenha)
             {
                    if($u->cadastrar($nome,$telefone,$email,$senha))
                    {
                           ?>
                           <div id="msg-sucesso">
                           Cadastrado com sucesso! Acesse para entrar!
                           </div>
                           <?php
                    }
                    else
                    {
                          ?>
                          <div class="msg-erro">
                              Email ja cadastrado!
                          </div>
                          <?php
                    }
             }
             else
             {    
                ?>
                <div class="msg-erro">
                    Senha e confirmar senha não correspondem
                </div>
                <?php

             }
        }       
        else
        {
              ?>
              <div class="msg-erro"> 
                   <?php echo "Erro: ".$u->msgErro;?>
              </div>
              <?php
        } 
    }else
    {     
         ?>
         <div class="msg-erro">
              preencha todos os campos!
         </div>
         <?php
    }     
}


?>
</body>
</html>