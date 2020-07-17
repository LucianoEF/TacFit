<!DOCTYPE html>
<!--
    Tela de login default para todo desenvolvido por:
    @Luciano Eduardo Ferreira
    Date 16/01/2020
-->
<html lang='pt-br'>
    <head>
        <title>:: TacFit ::</title>
        <meta charset='UTF-8'>
        <meta http-equiv = 'Content-Type' content='text/html; charset=UTF-8'>
        <link rel="stylesheet" type="text/css" href="assets/css/estilo_login.css">
        <script type="text/javascript" src="assets/js/menu_js.js"></script>

    </head>
    <body>
        <br>
        <br>
        <br>
        
        <span href="#" class="button" id="toggle-login">.:TacFit:.</span>

        <div id="login">
          <div id="triangle"></div>
          <h1><img src="assets/images/login_icon.png" alt="login" width="64" height="64" title="Login" /> </h1>
          
          <form name="acesso" method="post" action="core/logar.php">
              <input type="text" name="usuario" placeholder="Usuario" autofocus />
              <input type="password" name="senha" placeholder="Senha" />
            <input type="submit" value="Acessar" />
          </form>
        </div>
    </body>
</html>