<?php

require_once "classes/registro_cartaofidelidade.class.php";

$registros = new registro_cartaoFidelidade();
$registros = $registros->clientesPorLojaLimit10($_SESSION['empresa_id']);

// INCLUINDO NAVBAR
$ativo = "dashboard";
include "include/navbar.php";
?>

<div class="container" style="margin-top: 70px; margin-bottom: 70px;">
    <?php getAlerta(); ?>
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card text-white bg-primary m-1 mt-3 text-center">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-users"></i> Clientes Fidelizados</h3>
                    <p class="card-text"><span class="spinner-border spinner-border-sm" role="status"
                                               aria-hidden="true"></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card text-white bg-warning m-1 mt-3 text-center">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-ticket-alt"></i> Cupons Abertos</h3>
                    <p class="card-text"><span class="spinner-border spinner-border-sm" role="status"
                                               aria-hidden="true"></span></p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card text-white bg-success m-1 mt-3 text-center">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-check-circle"></i> Cupons Completados</h3>
                    <h2 class="card-text font-weight-light">34</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Clientes</h5>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Numero</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cupons</th>
                            <th scope="col">Andamento</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($registros as $chave => $valor): ?>
                            <tr>
                                <th scope="row"><?= $valor['numero'] ?></th>
                                <td><?= $valor['nome'] ?></td>
                                <td><?= $valor['nome_cartao'] ?></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                             style="width: <?= $valor['andamento'] ?>0%" aria-valuenow="30"
                                             aria-valuemin="0" aria-valuemax="100"><?= $valor['andamento'] ?>/10
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="registro_clientes.php" class="btn btn-outline-dark float-right">Ver Tudo</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "classes/footer.php" ?>

