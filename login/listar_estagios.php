<?php

include 'header.php'; ?>


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

<?php foreach($usuarios as $usuario):?>
    <tr>
<td><?=$usuario-></td>
    </tr>
    <?php endforeach?>

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