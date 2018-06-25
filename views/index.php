<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SEGEDS Admin - Sistema de Gerenciamento de Solicitações</title>
    <!-- Bootstrap core CSS-->
    <link href="<?= BASE_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?= BASE_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?= BASE_URL ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= BASE_URL ?>assets/css/sb-admin.css" rel="stylesheet">
    <!-- Carrega CSS assets-->
    <?php foreach ($this->css as $css): ?>
        <link rel="stylesheet" type="text/css" href="<?= BASE_URL . $css ?>">
    <?php endforeach; ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?= BASE_URL ?>home">SEGEDS Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <?php if (!empty($_SESSION) && $_SESSION['tipo_id'] < 5) { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nova Solicitação">
                    <a class="nav-link" href="<?= BASE_URL ?>solicitacao">
                        <i class="fa fa-fw fa-edit"></i>
                        <span class="nav-link-text">Nova Solicitação</span>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Solicitações">
                <a class="nav-link" href="<?= BASE_URL ?>solicitacoes">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Solicitações</span>
                </a>
            </li>
            <!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">-->
            <!--                <a class="nav-link" href="charts.html">-->
            <!--                    <i class="fa fa-fw fa-area-chart"></i>-->
            <!--                    <span class="nav-link-text">Charts</span>-->
            <!--                </a>-->
            <!--            </li>-->

            <?php if (!empty($_SESSION) && $_SESSION['tipo_id'] < 4) { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                    <a class="nav-link" href="<?= BASE_URL ?>usuariolist">
                        <i class="fa fa-fw fa-user-o"></i>
                        <span class="nav-link-text">Usuários</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($_SESSION) && $_SESSION['tipo_id'] < 5) { ?>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clientes">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
                       data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">Clientes</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="<?= BASE_URL ?>clientenew?s=home"><i class="fa fa-fw fa-user-plus"></i> Adicionar
                                Novo</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>clientelist"><i class="fa fa-fw fa-cog"></i> Gerenciar</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configurações">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages"
                       data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-gears"></i>
                        <span class="nav-link-text">Configurações</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="<?= BASE_URL ?>localidadelist"><i class="fa fa-fw fa-map-o"></i> Localidades</a>
                        </li>
                        <li>
                            <a href="<?= BASE_URL ?>servicoslist"><i class="fa fa-wrench"></i> Serviços</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">-->
            <!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"-->
            <!--                   data-parent="#exampleAccordion">-->
            <!--                    <i class="fa fa-fw fa-sitemap"></i>-->
            <!--                    <span class="nav-link-text">Menu Levels</span>-->
            <!--                </a>-->
            <!--                <ul class="sidenav-second-level collapse" id="collapseMulti">-->
            <!--                    <li>-->
            <!--                        <a href="#">Second Level Item</a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">Second Level Item</a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a href="#">Second Level Item</a>-->
            <!--                    </li>-->
            <!--                    <li>-->
            <!--                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third-->
            <!--                            Level</a>-->
            <!--                        <ul class="sidenav-third-level collapse" id="collapseMulti2">-->
            <!--                            <li>-->
            <!--                                <a href="#">Third Level Item</a>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <a href="#">Third Level Item</a>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <a href="#">Third Level Item</a>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfil">
                <a class="nav-link" href="<?= BASE_URL ?>perfil">
                    <i class="fa fa-fw fa-user-circle-o"></i>
                    <span class="nav-link-text">Perfil</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto" style="width: 100%; justify-content: flex-end; position: relative">
            <li class="nav-item dropdown"  style="position: absolute; left: 0" >
                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="d-lg-none">Notificações
              <span class="badge badge-pill badge-warning"></span>
            </span>
                    <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle" id="circulo_notificacoes" style="display: none"></i>
            </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Novas Notificações:</h6>
                    <div class="dropdown-divider"></div>

                    <div id="notificacoes">

                    </div>

                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item" style="margin-left: 50px">
                <form class="form-inline my-2 my-lg-0 mr-lg-2">
                    <div class="input-group">
                        <div class="form-control"
                             style="border-radius: 0; font-size: 12px; margin-top: 5px"><?= $_SESSION['nome'] . " | " . $_SESSION['tipo_nome'] ?></div>
                        <span class="input-group-append">
              </span>
                    </div>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa fa-power-off"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">

        <main>
            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        </main>

        <div class="card-footer small text-muted">Bem Vindo!</div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small></small>
            </div>
        </div>
    </footer>
    <!-- Botao para subir scroll-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Pergunta de confirmação-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" id="logout" style="color: #fff">Sair</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= BASE_URL ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= BASE_URL ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?= BASE_URL ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= BASE_URL ?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?= BASE_URL ?>vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= BASE_URL ?>assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?= BASE_URL ?>assets/js/sb-admin-datatables.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/sb-admin-charts.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/index.js"></script>
    <!-- Carregar js assets-->
    <?php foreach ($this->js as $js): ?>
        <script type="text/javascript" src="<?= BASE_URL . $js ?>"></script>
    <?php endforeach; ?>
    <script type="text/javascript">var BASE_URL = "<?php echo BASE_URL; ?>";</script>
    <script type="text/javascript">var tipo_id = "<?php echo $_SESSION['tipo_id']; ?>";</script>
</div>
</body>

</html>