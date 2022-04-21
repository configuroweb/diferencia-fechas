<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Calcular diferencia entre dos fechas</title>
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">

  <link type="text/css" href="css/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
  <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript">
    $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
      dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mi?', 'Juv', 'Vie', 'Sab'],
      dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
      weekHeader: 'Sm',
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: '-100:+2',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    $(function() {
      $('#moda1').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss'
      });

      $('#moda2').datetimepicker({
        showSecond: true,
        timeFormat: 'hh:mm:ss',
        stepHour: 2,
        stepMinute: 10,
        stepSecond: 10
      });
    });
  </script>

  <style type="text/css">
    pre {
      padding: 20px;
      background-color: #ffffcc;
      border: solid 1px #fff;
    }

    .wrapper {
      background-color: #ffffff;
      width: 800px;
      border: solid 1px #eeeeee;
      padding: 20px;
      margin: 0 auto;
    }

    .example-container {
      background-color: #f4f4f4;
      border-bottom: solid 2px #777777;
      margin: 0 0 40px 0;
      padding: 20px;
    }

    .example-container p {
      font-weight: bold;
    }

    .example-container dt {
      font-weight: bold;
      height: 20px;
    }

    .example-container dd {
      margin: -20px 0 10px 100px;
      border-bottom: solid 1px #fff;
    }

    .example-container input {
      width: 150px;
    }

    .clear {
      clear: both;
    }

    #ui-datepicker-div {
      font-size: 80%;
    }

    /* css para controlar timepicker */
    .ui-timepicker-div .ui-widget-header {
      margin-bottom: 8px;
    }

    .ui-timepicker-div dl {
      text-align: left;
    }

    .ui-timepicker-div dl dt {
      height: 25px;
    }

    .ui-timepicker-div dl dd {
      margin: -25px 10px 10px 65px;
    }

    .ui-timepicker-div td {
      font-size: 90%;
    }
  </style>
</head>

<body>

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="https://www.configuroweb.com/">ConfiguroWeb</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>


        </ul>
      </div>
    </nav>
  </header>

  <!-- Begin page content -->

  <div class="container">
    <h1 class="mt-5">Calcular diferencia entre dos fechas</h1>
    <hr>
    <div class="row">
      <div class="col-12 col-md-6">
        <!-- Contenido -->

        <form method="POST" action="">
          <div class="form-group">
            <label for="fecha">Fecha inicial:</label>
            <input required type="text" class="form-control" name="fecha1" placeholder="Ingrese fecha inicial" id="moda1" value="<?php if (isset($_POST["fecha1"])) {
                                                                                                                                    echo $_POST["fecha1"];
                                                                                                                                  } ?>">
          </div>


          <div class="form-group">
            <label for="fecha">Fecha actual:</label>
            <input required type="text" class="form-control" name="fecha2" placeholder="Ingrese fecha actual" id="moda2" value="<?php if (isset($_POST["fecha2"])) {
                                                                                                                                  echo $_POST["fecha2"];
                                                                                                                                } ?>">
          </div>
          <input name="calculo" type="hidden" value="v">
          <input class="btn btn-primary" type="submit" value="Calcular diferencia">
        </form>

        <!-- Fin Contenido -->
      </div>
    </div><!-- Fin row -->
    <br>
    <div class="row">
      <div class="col-12 col-md-6">

        <?php
        if (isset($_POST["calculo"])) {

          $fecha1 = $_POST["fecha1"];
          $fecha2 = $_POST["fecha2"];

          $fechainicial = new DateTime($fecha1);
          //fecha inicial 
          $fechaactual = new DateTime($fecha2);
          //fecha de cierre 
          $diferencia = $fechainicial->diff($fechaactual);

        ?>
          <ul class="list-group">
            <li class="list-group-item"><strong>Años: </strong><?php echo $diferencia->format('%Y Años'); ?></li>
            <li class="list-group-item"><strong>Meses: </strong><?php echo $diferencia->format('%m Meses'); ?></li>
            <li class="list-group-item"><strong>Dias: </strong><?php echo $diferencia->format('%d Dias'); ?></li>
            <li class="list-group-item"><strong>Horas: </strong><?php echo $diferencia->format('%H horas'); ?></li>
            <li class="list-group-item"><strong>Minutos: </strong><?php echo $diferencia->format('%i minutos'); ?></li>
            <li class="list-group-item"><strong>Segundos: </strong><?php echo $diferencia->format('%s segundos'); ?></li>
          </ul>
        <?php
        }
        ?>
      </div>
    </div><!-- Fin row -->

  </div><!-- Fin container -->
  <footer class="footer">
    <div class="container">
      <span class="text-muted">
        <p><a href="https://configuroweb.com/" target="_blank">ConfiguroWeb</a></p>
      </span>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

</body>

</html>