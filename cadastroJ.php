<?php include "conexaoDB.php"; ?>
<?php include "functions.php"; ?>

<center><form action="#" method="post">
    <div>
        <label><strong>Razão Social</strong></label><br>
        <input type="text" id="razaosocial" name="razaoSocial">
    </div><br>
    <div>
        <label><strong>E-mail</strong></label><br>
        <input type="text" id="email" name="email">
    </div><br>
   <div>
        <label><strong>Senha</strong></label><br>
        <input type="password" id="password" name="password">
    </div><br>
    <div>
        <label><strong>CNPJ</strong></label><br>
        <input type="text" id="cnpj"  name="cnpj">
    </div><br>
    <div>
        <label><strong>Telefone</strong></label><br>
        <input type="tel" id="telefone" name="telefone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}">
    </div><br>
        <input type="submit" name="submit" value="Cadastrar">
   </form><center>

<?php criarJuridica(); ?>