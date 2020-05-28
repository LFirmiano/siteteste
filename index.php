<?php include "conexaoDB.php"; ?>
<?php include "functions.php"; ?>

<center><form action="dashF.php" method="post">
    <div style="">
        <label for="mail"><strong>CPF/CNPJ</strong></label><br>
        <input type="text" id="username" name="codigo" required>
    </div><br>
   <div>
        <label for="password"><strong>Senha</strong></label><br>
        <input type="password" id="password" name="password" required>
    </div><br>
    <input type="submit" name="submit" value="Entrar">
    <br><br>
    <a href="recuperarsenha.php">Esqueci minha senha</a>
</form></center>