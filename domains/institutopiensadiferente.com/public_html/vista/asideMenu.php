<?php

$id = $_SESSION["idUsuario"];
$estudiante = ControladorEstudiante::ctrInfoDatosEstudiante($id);

/* var_dump($estudiante); */
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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="https://institutopiensadiferente.com/" class="nav-link" target="_blank">Portada</a>
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
                <span class="brand-text font-weight-light">WEB Académico</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <?php
                if ($_SESSION["perfil"] == "Administrador") {
                ?>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assest/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION["nombre_usuario"] ?></a>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($_SESSION["perfil"] == "Estudiante") {
                ?>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="assest/dist/img/estudiantes/<?php echo $estudiante['img_estudiante'] ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block" id="usuarioLogin"><?php echo $_SESSION["nombre_usuario"] ?></a>
                        </div>
                    </div>
                <?php
                }
                ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <?php
                        if ($_SESSION["perfil"] == "Administrador") {
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
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                    <p>
                                        Docentes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="VDocente" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Docentes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-id-card"></i>
                                    <p>
                                        Estudiantes
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="VEstudiante" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Estudiantes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header text-yellow">ADMINISTRAR</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-network-wired"></i>
                                    <p>
                                        Cursos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="VGrupo" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Grupos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="VCurso" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Cursos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="VModulo" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Módulos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="VMateria" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Materias</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>
                                        Asignaciones
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="VGrupoEstudiante" class="nav-link">
                                            <i class="far fa-circle nav-icon text-warning"></i>
                                            <p>Asig. Estudiante-Curso</p>
                                        </a>
                                        <!-- <a href="VDocenteMateria" class="nav-link">
                                            <i class="far fa-circle nav-icon text-warning"></i>
                                            <p>Asig. Docente-Materia</p>
                                        </a> -->
                                        <a href="VModuloMateria" class="nav-link">
                                            <i class="far fa-circle nav-icon text-warning"></i>
                                            <p>Asig. Materia-Módulo</p>
                                        </a>
                                        <a href="VHorarioMateria" class="nav-link">
                                            <i class="far fa-circle nav-icon text-warning"></i>
                                            <p>Asig. Horario-Materia</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-header text-yellow">OTROS</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-satellite-dish"></i>
                                    <p>
                                        Noticias
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="VNoticia" class="nav-link">
                                            <i class="far fa-circle nav-icon text-info"></i>
                                            <p>Lista de Noticias</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="salir" class="nav-link" style="color:yellow">
                                    <i class="fas fa-power-off nav-icon"></i>
                                    <p>
                                        Salir
                                    </p>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                        <?php
                        $id = $_SESSION["idUsuario"];
                        $estudiante = ControladorEstudiante::ctrInfoDatosEstudiante($id);
                        /* var_dump($cantidad); */

                        if ($_SESSION["perfil"] == "Estudiante") {
                            $cantidad = ControladorEstudiante::ctrCantidadCursosEst($estudiante['id_estudiante']);
                            $_SESSION["cantidadCurso"] =  $cantidadCur = $cantidad['cantidad'];
                        ?>
                            <!-- MI PERFIL -->
                            <li class="nav-item">
                                <a href="inicio" class="nav-link">
                                    <i class="nav-icon fas fa-window-maximize"></i>
                                    <p>
                                        Panel Principal
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="VPerfil" class="nav-link">
                                    <i class="nav-icon fas fa-user-cog"></i>
                                    <p>
                                        Mi Perfil
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header text-yellow">ACADÉMICO</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>
                                        Mis Cursos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <?php
                                $cursos = ControladorEstudiante::ctrCursosEstudiante($estudiante['id_estudiante']);
                                if (isset($cursos) & $cursos != "") {
                                    foreach ($cursos as $val) {
                                        $idCurso = $val['id_curso']
                                ?>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="VCursoEstudiante?<?php echo $idCurso ?>" class="nav-link">
                                                    <i class="far fa-circle nav-icon text-warning"></i>
                                                    <p><?php echo $val["titulo_curso"] ?></p>
                                                </a>
                                            </li>
                                        </ul>
                                <?php
                                    }
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <a href="salir" class="nav-link" style="color:yellow">
                                    <i class="fas fa-power-off nav-icon"></i>
                                    <p>
                                        Salir
                                    </p>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>