<?php include "conexaoDB.php"; ?>
<?php include "functions.php"; ?>


<center><form action="#" method="post">
    <div>
        <label><strong>Nome</strong></label><br>
        <input type="text" id="nomeuser" name="nome">
    </div><br>
    <div>
        <label><strong>Sobrenome</strong></label><br>
        <input type="text" id="sobrenomeuser" name="sobrenome">
    </div><br>
    <div>
        <label><strong>E-mail</strong></label><br>
        <input type="text" id="email" name="email">
    </div><br>
   <div>
        <label><strong>Senha</strong></label><br>
        <input type="password" id="password" name="password">
    </div><br>
    <label for="sexo"><strong>Sexo:</strong></label><br>
      <input type="radio" name="sexo" value="masculino"><strong>Masculino</strong><br>
      <input type="radio" name="sexo" value="feminino"> <strong>Feminino</strong><br>
      <input type="radio" name="sexo" value="naoBinario"> <strong>Não binario</strong>
    <div>
        <label><strong>CPF</strong></label><br>
        <input type="text" id="cpf" name="cpf">
    </div><br>
    <div>
        <label><strong>Data de Nascimento</strong></label><br>
        <input type="text" id="dataNascimento" name="dataNasc">
    </div><br>
    <div>
        <label><strong>Telefone</strong></label><br>
        <input type="text" id="telefone" name="telefone">
    </div><br>
    <div>
        <label><strong>Endereço</strong></label><br>
        <input type="text" id="endereço" name="endereco">
    </div><br>
    <div>
        <label><strong>Numero</strong></label><br>
        <input type="text" id="numero" name="numero">
    </div> 
    <div>
        <label><strong>Complemento</strong></label><br>
        <input type="text" id="complemento" name="complemento">
    </div><br>

    <input type="submit" name="submit" value="Cadastrar">
   </form><center>

<?php criarFisica(); ?>