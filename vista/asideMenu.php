<?php
function habilitado($idPermiso)
{
  $id = $_SESSION["idUsuario"];
  $permiso = ControladorUsuario::ctrUsuarioPermiso($id, $idPermiso);
  return $permiso;
}
?>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="pruebaB">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="inicio" class="brand-link">
        <img src="assest/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8" style="width:300px">
        <span class="brand-text font-weight-light">Hermen LTDA</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assest/dist/img/user_default.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION['nombre_usuario']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php if (habilitado(1) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VUsuario" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de usuarios</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (habilitado(7) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-street-view"></i>
                  <p>
                    Personal
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VPersonal" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de Personal</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (habilitado(2) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-handshake"></i>
                  <p>
                    Clientes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VCliente" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de clientes</p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
<a href="FNuevoCliente" class="nav-link">
<i class="far fa-circle nav-icon text-info"></i>
<p>Registrar Cliente</p>
</a>
</li> -->
                </ul>
              </li>
            <?php } ?>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-teeth"></i>
                <p>
                  Proveedores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VProveedor" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de proveedores</p>
                  </a>
                </li>
              </ul>
            </li>

            <?php if (habilitado(3) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-grip-horizontal"></i>
                  <p>
                    Productos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VProducto" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Lista de productos</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VCategoria" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Tipo Producto</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VTalla" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Talla</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VColor" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Color</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VGrupo" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Grupo</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VDiseno" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Diseño</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VMedida" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Unidad de Medida</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (habilitado(4) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-cash-register"></i>
                  <p>
                    Salidas
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="FSalidaVenta" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Nota Ventas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="FSalidaOtros" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Nota Salidas Otros</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="RNotaSalidaOtros" class="nav-link">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Detalle Salida Otros</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="RNotaSalida" class="nav-link">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Detalle Ventas</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (habilitado(5) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                    Ingreso
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>


                <ul class="nav nav-treeview">

                  <!--<li class="nav-item">
                <a href="FOtrosIngresos" class="nav-link">
                <i class="far fa-circle nav-icon text-info"></i>
                <p>Otros Ingresos</p>
                </a>
                </li>-->
                  <li class="nav-item">
                    <a href="FNEmpaque" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Ingreso por Empaque</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="FNDevolucion" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Ingreso por Devolución</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="FNProveedor" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Ingreso Prov. Externos</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="FNAjuste" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Ingreso Ajuste de Inv.</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="FNOtrosIng" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Otros Ingresos</p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
                  <a href="VEmpaques" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Lista de Empaques</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="FNotaIngreso" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Nota de Ingreso</p>
                  </a>
                </li> -->

                  <li class="nav-item">
                    <a href="RNotaIngreso" class="nav-link">
                      <i class="far fa-circle nav-icon text-warning"></i>
                      <p>Reporte Notas de Ingreso</p>
                    </a>
                  </li>
                </ul>
              </li>
            <?php } ?>

            <?php if (habilitado(6) != null) {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>
                    Reportes
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <!--              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VReporte" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Reportes rep</p>
                  </a>
                </li>
              </ul>-->
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="VRepMenorProd" class="nav-link">
                      <i class="far fa-circle nav-icon text-info"></i>
                      <p>Rep. Menor p/producto</p>
                    </a>
                  </li>
                </ul>
                <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VRepMovimiento" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Rep. Movimientos</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="VRepClasificacion" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p>Rep. Clasificación</p>
                  </a>
                </li>
              </ul> -->
              </li>
            <?php } ?>

            <li class="nav-item">
              <a href="salir" class="nav-link text-cyan">
                <i class="fas fa-power-off nav-icon"></i>
                <p>
                  Salir
                </p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>