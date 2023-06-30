<?php
include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" href="assets/image/icon.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User| Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

  <!-- iCheck -->
  <link rel="stylesheet" href="assets/css/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/css/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="assets/css/summernote-bs4.min.css">

  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/select2.min.css">
  <link rel="stylesheet" href="assets/css/style.css">

</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/image/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block">Scripts Webmasters</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Hébergements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Publicitaire
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="publication.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listes</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Comparatif des régies publicitaires</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-11">
                    <button type="button" class="btn btn-primary" id="modal-bup-filter">
                      Filtre
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="list-table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th style="width: 52px;">Avis</th>
                    <th>Statut</th>
                    <th>Paiements déclarés sur FoxyRating</th>
                    <th>Solution de paiement</th>
                    <th>Entrée sur FoxyRating</th>
                    <th>Seuil de paiement</th>
                    <th>Type de régie publicitaire</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'function.php';
                    triePub();
                    ?>
                                        </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="publication.php">
              <div class="form-group">
                <label>Nom de domaine inclus</label>
                <select id="domain_name" class="form-control" style="width: 100%;" name="domain_name">
                  <option value="" selected>Tous</option>
                  <option value="Oui">Oui</option>
                  <option value="1 an seulement">1 an seulement</option>
                  <option value="Non">Non</option>
                </select>
              </div>
              <div class="form-group">
                <label>Base de données</label>
                <select id="database" class="form-control" style="width: 100%;" name="database">
                  <option value="" selected>Tous</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="Illimité">Illimité</option>
                </select>
              </div>
              <div class="form-group">
                <label>données Espace disque (en Go) </label>
                <select id="space_disk" class="form-control" style="width: 100%;" name="space_disk">
                  <option value="" selected>Tous</option>
                  <option value="< 100">
                    < 100 </option>
                  <option value="100">100</option>
                  <option value="200">200</option>
                  <option value="300">300</option>
                  <option value="400">400</option>
                  <option value="500">500</option>
                  <option value="600">600</option>
                  <option value="700">700</option>
                  <option value="800">800</option>
                  <option value="900">900</option>
                  <option value="Illimité">Illimité</option>
                </select>
              </div>
              <div class="form-group">
                <label>Comptes mail</label>
                <select id="compte_mail" class="form-control" style="width: 100%;" name="compte_mail">
                  <option value="" selected>Tous</option>
                  <option value="< 50">
                    < 50</option>
                  <option value="50 - 500">50 - 500</option>
                  <option value="500 - 1000">500 - 1000</option>
                  <option value="Illimité">Illimité</option>
                </select>
              </div>
              <div class="form-group">
                <label>Multisite</label>
                <select id="multisite" class="form-control" style="width: 100%;" name="multisite">
                  <option value="" selected>Tous</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="Illimité">Illimité</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-check-label" for="exampleCheck1">Certificat SSL inclus</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="certificat" id="inlineRadio1"
                         value="1" checked>
                  <label class="form-check-label" for="inlineRadio1">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="certificat" id="inlineRadio2"
                         value="0">
                  <label class="form-check-label" for="inlineRadio2">Non</label>
                </div>

              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button id="close-modal" type="button" class="btn btn-secondary">Fermer</button>
            <input type="submit" class="btn btn-primary" value="Envoyer">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="filter-publicity-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filtrer les sites ou applications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="publication.php">
            <div class="modal-body">
              <div class="form-group">
                <label>Statut</label>
                <select id="statut" class="form-control" style="width: 100%;" name="statut">
                  <option value="" selected>Tous</option>
                  <option value="Sérieux">Sérieux</option>
                  <option value="Prometteur">Prometteur</option>
                  <option value="Standard">Standard(Nouveau)</option>
                  <option value="Douteux">Douteux</option>
                  <option value="Arnaque">Arnaque</option>
                  <option value="Fermé">Fermé</option>
                </select>
              </div>
              <div class="form-group">
                <label>Solution de paiement</label>
                <div class="select2-purple">
                  <select id="mode_pay" class="form-control " style="width: 100%;" name="mode_pay">
                    <option value="" selected>Tous</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Skrill">Skrill</option>
                    <option value="Payza">Payza</option>
                    <option value="Virement bancaire">Virement bancaire</option>
                    <option value="Chèque cadeau">Chèque cadeau</option>
                    <option value="Chèque bancaire">Chèque bancaire</option>
                    <option value="Cadeaux">Cadeaux</option>
                    <option value="Codes">Codes</option>
                    <option value="Autre">Autre</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Type de régie publicitaire</label>
                <select id="type_pub" class="form-control" style="width: 100%;" name="type_pub">
                  <option value="" selected>Tous</option>
                  <option value="Régle au CPM">Régle au CPM</option>
                  <option value="Plateforme d'affiliation">Plateforme d'affiliation</option>
                  <option value="Régle au CPC">Régle au CPC</option>
                  <option value="Petite régie">Petite régie</option>
                </select>
              </div>

            </div>
            <div class="modal-footer">
              <input type="submit" name="submit1" class="btn btn-primary" value="Envoyer">
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2023</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->

<script src="assets/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script src="assets/js/responsive.bootstrap4.min.js"></script>
<script src="assets/js/select2.full.min.js"></script>

</body>

</html>