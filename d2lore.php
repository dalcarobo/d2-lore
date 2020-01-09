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

  <title>Lorebook Destiny 2</title>

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <span class="brand-text font-weight-light">Lorebook</span>
      </a>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <span class="float-left"><strong>Grimório do Destiny 2</strong></span>
                <table id="table-lores" class="table table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Título</th>
                  </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="form-group">
                  <span class="float-left"><strong>Pesquisa por termo</strong></span>
                  <input type="text" class="form-control" id="search" name="search">
                </div>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary" id="search-term">Buscar</a>
              </div>
            </div>
          </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function () {



        const table = $('#table-lores').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            responsive: true,
            ordering: true,
            info: true,
            autoWidth: false,
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
            },
            "ajax": {
                "url": "getLore.php",
                "type": "POST"
            },
            "columns": [
                {'data': 'hash'},
                {
                    'data': null,
                    "render": function (a, b, c) {
                        return "<a href='lore.php?uid=" + c['id'] + "'>" + c['nome'] + "</a>";
                    }
                }
            ]
        });
        table.draw();


        $("#search-term").click(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'getLore.php',
                data: {
                    search: $("#search").val()
                },
                success: function (retorno) {
                    let r = JSON.parse(retorno);
                    table.clear().draw();
                    table.rows.add(r.data); // Add new data
                    table.draw();
                }
            });
        });
    });
</script>
</body>
</html>
