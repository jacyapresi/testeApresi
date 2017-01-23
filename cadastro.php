<?php 
##### quando clicar em editar cliente ir para o botao editar ####
$edit = @$_GET['edit'];
$botao = 'Cadastrar';
if ($edit !='') {
	$botao = "Editar";
	$query = "SELECT * FROM clientes where ID = '$edit'";
$result = mysql_query($query);	
$row = mysql_fetch_array($result);
}
 
?>

<div class="container">

<caption><h1>Cadastre aqui seu cliente</h1></caption><br>

			<form action="index.php?p=impressao&edit=<?= @$row['ID']; ?>" method ='POST'>
		  <div class="form-group">
		    <label for="exampleInputNome">Nome</label>
		    <input type="nome" class="form-control" id="exampleInputNome" name="nome" value="<?= @$row['nome']; ?>" >
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?= @$row['email'] ?>">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputTelefone">Telefone</label>
		    <input type="telefone" class="form-control" id="exampleInputTelefone" name="telefone" value="<?= @$row['telefone'] ?>">
		  </div>
		  <button type="submit" class="btn btn-default"><?php echo $botao ?></button>
		</form>

</div>
