<?php
//$db1 = new SQLite3('world_sql_content_e2e6f97ab386457d36c5c857d6b98fa3/world_sql_content_e2e6f97ab386457d36c5c857d6b98fa3.sqlite3');
if(isset($_GET['uid']) && $_GET['uid'] != '') {
$db2 = new SQLite3('world_sql_content_e2e6f97ab386457d36c5c857d6b98fa3/world_sql_content_e2e6f97ab386457d36c5c857d6b98fa3.sqlite3');

$uid = $_GET['uid'];
$results = $db2->query("select * from DestinyLoreDefinition where id = '".base64_decode($uid)."'");

while ($row = $results->fetchArray()) {
  $lore = ($row['json']);
  $a = (json_decode($lore));

  $de = ['Derivante', 'Colméia', 'Despertos', 'Desperto'];
  $para = ['Drifter', 'Hive', 'Awoken', 'Awoken'];
  $t = str_replace($de, $para, $a->displayProperties->description);
  $n = str_replace($de, $para, $a->displayProperties->name);
  $l = str_replace($de, $para, $a->subtitle);

}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .initial:first-letter {
      color: #903;
      float: left;
      font-size: 75px;
      line-height: 60px;
      padding-top: 1px;
      padding-right: 8px;
      padding-left: 3px;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <span class="brand-text font-weight-light">Lorebook</span>
      </a>

    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">
                  <blockquote>
                    <p style="font-size: 36px;"><?= $n ?></p>
                    <small><i><?= $l ?></i></small>
                  </blockquote>
                </h5>
                <p class="card-text initial">
                  <i><?= str_replace("\n\n", "<br><br>", $t) ?></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php } ?>
