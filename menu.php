<?php
  if ($p == 'home') {
    $home = "active";
  }
  elseif ($p == 'cadastro') {
    $cadastro = "active";
  }
  elseif ($p == 'impressao') {
    $impressao = "active";
  }
 
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand <?='$home'?><" href="index.php">Home</a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?="$cadastro"?>"><a href="index.php?p=cadastro">Cadastro </a></li>
        <li class="<?="$impressao"?>"><a href="index.php?p=impressao">Impressão</a></li>
      </ul>
      
    </div>
  </div>
</nav>