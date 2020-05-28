<?php include "conexaoDB.php"; ?>
<?php include "functions.php"; ?>

<center><form action="#" method="post">
    <div>
        <label><strong>Nome</strong></label><br>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome ou o nome da empresa" required>
    </div><br>
    <div>
        <label><strong>E-mail</strong></label><br>
        <input type="text" id="email" name="email" placeholder="Digite seu e-mail" required>
    </div><br>
    <div>
        <label for="servico"><strong>Serviço:</strong></label><br>
        <select id="servico" name="servico">
           <option value="contabilidade_geral">Contabilidade Geral</option>
           <option value="consultoria_financeira">Consultoria Financeira</option>
           <option value="consultoria_organizacional">Consultoria Organizacional</option>
           <option value="consultoria_empresarial">Consultoria Empresarial</option>
           <option value="administracao_condominial">Administração Condominial</option>
           <option value="assessoria_trabalhista">Assessoria Trabalhista</option>
           <option value="assessoria_tributaria">Assessoria Tributária</option>
        </select>
    </div><br>
    <div>
        <label for="necessidade"><strong>Necessidades:</strong></label><br>
        <textarea name="necessidades" placeholder="Coloque suas necessidades aqui!" cols="30" rows="5" required></textarea>
    </div>
    <input type="submit" name="submit" value="Solicitar">
    <?php  enviarOrcamento(); ?>
</form></center>
