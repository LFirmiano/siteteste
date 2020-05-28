<?php include "conexaoDB.php"; ?>
<?php include "functions.php"; ?>
<?php islogged(); ?>

<h1> PERFIL </h1>

<h2> Seja bem vindo <?php echo $_SESSION['nome'] ?></h2>

<?php

    echo "CPF: " . $_SESSION['cpf'];
    echo "<br>";
    echo "SENHA: " . $_SESSION['password'];
    echo "<br>";
?>

<form action="editarF.php">
<input type="submit" name="submit" value="Editar">
</form>
<form action="index.php.php">
<input type="submit" name="delete" value="Deletar">
</form>
<form action="index.php.php">
<input type="submit" name="logout" value="Deslogar">
</form>
