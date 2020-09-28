<?php
require_once 'classes/usuarios.php';
$u = new Usuario;
?>


<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
	<div id="corpo-form">
		<h1>Entrar</h1>
      <form method="POST" >
        <!--espaçamentos para os usuários inserirem seu email e senha -->
      	<input type="email" placeholder="Usuário" name="email">
      	<input type="password" placeholder="Senha" name="senha">
      	<input type="submit" value="ACESSAR">
      	<a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se</strong></a>
        <!--botão de cadastro -->
      </form>
  </div>
  <?php
   if(isset($_POST['email']))
{ 
     $email = addslashes($_POST['email']);
     $senha = addslashes($_POST['senha']);
    
    if(!empty($email) && !empty($senha))
    {
          $u->conectar("projeto_login","localhost","root","");
          if($u->msgErro == "")
          {
              if($u->logar($email,$senha))
              {
                    header("location: areaPrivada.php");
              }
              else
              {
                   ?>
                   <div class="msg-erro">
                        Email e/ou senha estão incorretos!
                   </div>
                   <?php
              }
          }
          else
          {
              ?>
              <div class="msg-erro">
                   <?php echo "Erro: ".$u->msgErro; ?>
              </div>
              <?php
            
        }
    }else
    {
        ?>
        <div class="msg-erro">
            Preencha todos os campos!
        </div>
        <?php
    } 
}
?>
</body>
</html>