<?php
include 'header.php';
require_once __DIR__ . "/app/model/Estagiobanco.php";

$Estagiosbanco= new Estagiosbanco();

$estagios = $Estagiosbanco->listarestagios();
?>

<section class='section'>
    <div class='container'>
        <h2 class='title has-text-centered'>Lista de Estágios</h2>

        <table class='table is-striped is-hoverable is-fullwidth'>
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Funcionário</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

<?php foreach($estagios as $estagio): ?>
    <tr>
        <td><?= htmlspecialchars($estagio->getempresa()) ?></td>
        <td><?= htmlspecialchars($estagio->getfuncionario()) ?></td>
        <td><?= htmlspecialchars($estagio->getdata()) ?></td>
        <td><?= htmlspecialchars($estagio->gethorario()) ?></td>
        <td>
            <a class="button is-small is-info" href="editar_estagio.php?id=<?= htmlspecialchars($estagio->getid()) ?>">Editar</a>
            <a class="button is-small is-danger" href="index.php?acao=excluir&id=<?= htmlspecialchars($estagio->getid()) ?>" onclick="return confirm('Tem certeza que deseja excluir este estágio?')">Excluir</a>
        </td>
    </tr>
<?php endforeach; ?>

            </tbody>
        </table>

        <div class='has-text-centered'>
            <a class='button is-light' href='conteudo.php'>Voltar para Conteúdo</a>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
