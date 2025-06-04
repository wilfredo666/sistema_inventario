<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <section class="content">
    <h4 class="table-title">Lista de Ingresos</h4>
    <table id="DataTable" class="table table-bordered table-striped table-compresed">
      <thead>
        <tr>
          <th>#</th>
          <th>Código Ingreso</th>
          <th>Ingreso Por:</th>
          <th>Personal</th>
          <th>Fecha</th>
          <th>observación</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $ingreso = ControladorVenta::ctrInfoIngresos();
        $c = 0;
        foreach ($ingreso as $value) {
          $c = $c + 1;
        ?>
          <tr>
            <td><?php echo $c; ?></td>
            <td><?php echo $value["codigo"]; ?></td>
            <td><?php
                $codigo = $value["codigo"];

                $tipo = '';
                if (strpos($codigo, 'I') === 0) {
                  $segundaLetra = substr($codigo, 1, 1);
                  switch ($segundaLetra) {
                    case 'O':
                      $tipo = 'Otros';
                      break;
                    case 'E':
                      $tipo = 'Empaque';
                      break;
                    case 'A':
                      $tipo = 'Ajuste';
                      break;
                    case 'P':
                      $tipo = 'Proveedor';
                      break;
                    case 'D':
                      $tipo = 'Devolucion';
                      break;
                    default:
                      $tipo = 'Otros';
                      break;
                  }
                } else {
                  $tipo = 'Otros';
                }
                echo $tipo;
                ?></td>
            <td><?php echo $value["personal"]; ?></td>
            <td><?php echo $value["fecha"]; ?></td><!--  -->
            <td><?php echo $value["observacion"]; ?></td><!--  -->
            <td>
              <div class="btn-group">
                <!-- funciones script en archivo reporte.js -->
                <button class="btn btn-xs btn-info" onclick="MVerNotaIngreso('<?php echo $value['id']; ?>', '<?php echo $value['codigo']; ?>')">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-xs  btn-danger" onclick="EliNotaIngreso('<?php echo $value['id']; ?>', '<?php echo $value['codigo']; ?>')">
                  <i class="fas fa-trash"></i>
                </button>
                <a href="vista/reporte/repImpIngreso.php?id=<?php echo $value['id']; ?>&&cod=<?php echo $value['codigo']; ?>" class="btn btn-xs btn-dark" target="_blank">
                  <i class="far fa-file-powerpoint"></i>
                </a>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </section>
</div>