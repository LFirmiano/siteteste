<?php include "conexaoDB.php"; ?>
<?php include "functions.php"; ?>

<center>
<form action="#" method="post">
    <label for="email"><strong>Digite seu email</strong></label>
    <br><br>
    <input type="text" name="email" placeholder="Digite seu email">
    <br><br>
    <input type="submit" name="submit" value="Enviar">
    <?php recuperarSenha(); ?>
</form>
</center>