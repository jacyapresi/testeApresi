<?php 
###### para inserir o cadastro do cliente #######
$nome = @$_POST['nome'];
$edit = @$_GET['edit'];

if ($nome != '' and $edit =='') {
  $email = @$_POST['email'];
  $telefone = @$_POST['telefone'];
$query = "INSERT INTO clientes (nome , email , telefone) 
VALUES ('$nome', '$email', '$telefone')";
mysql_query($query);
}
###### para editar o cadastro do cliente #######
if ($edit !='' and $nome !='') {
  $email = @$_POST['email'];
  $telefone = @$_POST['telefone'];
$quer = ("UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone' where ID='$edit'");  
mysql_query($quer);      

ECHO "O Aluno " .$nome. " foi atualizado!!!";
}
      ?>


<form class="navbar-form navbar-left" role="search" action="index.php?p=impressao" method ="POST">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Localizar" name="busca">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>

<div class="container">
	<table class="table table-bordered">
      <caption><h1>Lista de Clientes Cadastrados</h1></caption>
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Telefone</th>
           <th>Ações</th>
        </tr>
      </thead>
      <tbody>

      <?php 

       $del = @$_GET['del']; 
       $cli = @$_GET['cli']; 
       if ($del !='') {
       $p = ("DELETE FROM clientes WHERE ID=$del"); 
       if(!mysql_query($p)) {
        
      }else{

      ?>

      <div class="alert alert-succes" role="alerta"> O Cliente <?php echo $cli;?> foi excluido!! </div>

      <?php 
             
             }
             } 
             ###### para paginação #######
             $busca=@$_POST['busca'];
             if ($busca !='') {
             	$q2 = "SELECT * FROM clientes where nome like '%$busca%'";
             }else{
             	$q2 = 'SELECT * FROM clientes';
             }
              $result2 = mysql_query($q2);
              $num_rows = mysql_num_rows($result2);
              $paginas = ceil($num_rows / 5);
              $pagi = @$_GET['pag'];

              if ($pagi == "") {
                $pagi=0;
              }else{
                $pagi = $pagi-1;
              }
              $pagi = $pagi*5;

              $busca=@$_POST['busca'];
             if ($busca !='') {
             	$q = "SELECT * FROM clientes where nome like '%$busca%' limit $pagi,5";
             }else{
             	$q = "SELECT * FROM clientes LIMIT $pagi,5";
             }
              
             


              $result = mysql_query($q);      
              while ($row = mysql_fetch_array($result)) {

      ?>

        <tr>
          <th scope="row"><?php echo $row ['ID']; ?></th>
          <td><?php echo $row ['nome']; ?></td>
          <td><?php echo $row ['email']; ?></td>
          <td><?php echo $row ['telefone']; ?></td>        
          <td><a class="glyphicon glyphicon-trash" href="index.php?p=impressao&del=<?php echo $row['ID']; ?>&cli=<?php echo $row['nome']; ?>"></a>
          <a class="glyphicon glyphicon-pencil" href="index.php?p=cadastro&edit=<?php echo $row['ID']; ?>&cli=<?php echo $row['nome']; ?>"></a></td>
        </tr>

        <?php 
        }

         ?>

      </tbody>
    </table>
<center>
  <?php 
$pag=1;

   ?>

   <?php 
$pag=1;
$volta = @$_GET['pag'];
if ($volta=='' or $volta == 1) {
  $volta =1;
  $antseta = 'disabled';
  $prox = 2;
}elseif ($volta>1 and $volta<$paginas) {
  $ant = $volta -1; 
  $prox = $volta +1;
}else{
  $ant = $volta -1;
  $proxseta = 'disabled';
}

 ?>

<nav>
  <ul class="pagination">
    <li class= "<?php echo @$antseta; ?>">
      <a href="index.php?p=impressao&pag=<?php echo $ant; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php 
    $pagin = @$_GET['pag'];  
    if ($pagin =="") {
      $pagin = 1;
    }
while ( $pag <= $paginas) {
  if ($pag == $pagin) {
    $ativo = "class=\"active\"";
  }else{
    $ativo="";
  }
     ?>
    <li <?php echo $ativo; ?>><a href="index.php?p=impressao&pag=<?php echo $pag; ?>"><?php echo $pag; ?></a></li>
  <?php 
$pag++;
} ?>  
    <li class='<?php echo @$proxseta; ?>'>
      <a href="index.php?p=impressao&pag=<?php echo $prox; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</center>
<?php //echo $pagin; ?>

    </div>