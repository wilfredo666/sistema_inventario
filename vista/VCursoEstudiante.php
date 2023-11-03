<?php
/* require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php"; */

$path = parse_url($_SERVER['REQUEST_URI']);
$id = $path["query"];
/* $materia = ControladorMateria::ctrInfoMateria($id); */
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <?php
  $moduloMateria = ControladorMateria::ctrMateriaMod($id);
  /* $idModulo = $moduloMateria['id_modulo']; */
  /* var_dump( $moduloMateria) */
  foreach ($moduloMateria as $value) {

  ?>
    <section class="content ml-1">
      <p class="font-weight-light h4">Módulo - <?php echo ($value['desc_modulo']) ?></p>
      <div class="row ml-1">
        <?php
        $MatMod = ControladorMateria::ctrMatMod($value['id_modulo']);

        foreach ($MatMod as $value) {
        ?>

          <div class="col-md-3">
            <div class="card card-success shadow-sm">
              <div class="card-header">
                <h3 class="card-title">Materia</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                Nota: 0 pts.
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        <?php
        }
        ?>
      </div>
    </section>
  <?php
  }
  ?>
</div>