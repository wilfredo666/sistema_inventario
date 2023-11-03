<?php
/* require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php"; */
session_start();
$path = parse_url($_SERVER['REQUEST_URI']);
//id estudiante
$id = $path["query"];
$idEstudiante = $id;
//datos del estudainte
$estudiante = ControladorEstudiante::ctrInfoEstudiante($id);

$cursoEstudiante = ControladorEstudiante::ctrCursosEstudiante($id);
/* var_dump($cursoEstudiante); */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pb-0">
        <div class="container-fluid d-flex justify-content-center" style="padding-top: 2px; padding-bottom: 2px; font-size: 20px;">
            INFORMACIÓN DE CURSOS DEL ESTUDIANTE <p class="text-bold mb-0"> - <?php echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante']; ?></p>
        </div>
        <?php
        if ($_SESSION["perfil"] == "Administrador") {
        ?>
            <div class="alert mt-0 mb-1" style="background-color: #F1F7C1; padding-top: 2px; padding-bottom: 2px;" role="alert">
                <strong>Nota: </strong> * Para registrar notas, haga click sobre cada materia.
            </div>
        <?php
        } elseif ($_SESSION["perfil"] == "Estudiante") {
        ?>
            <div class="alert mt-0 mb-1" style="background-color: #9EE473; padding-top: 2px; padding-bottom: 2px;" role="alert">
                <strong>Nota: </strong> * Para ver más detalles de <b>TU NOTA</b>, haga click sobre cada materia.
            </div>
        <?php
        }
        ?>

    </section>

    <section class="content">

        <div class="row container-fluid h-100">
            <div class="col-md-12">
                <div class="card card-row card-dark">
                    <div class="card-header bg-dark  d-flex justify-content-center">
                        <h3 class="card-title">
                            LISTA DE CURSOS
                        </h3>
                    </div>
                    <div class="card-body row ">
                        <?php
                        $cantidadCurso = 0;
                        foreach ($cursoEstudiante as $curso) {
                            $cantidadCurso = $cantidadCurso + 1;
                        ?>
                            <div class="col-md-4">
                                <div class="card card-info card-outline">
                                    <div class="card-header">
                                        <h5 class="card-title"><?php echo $curso['titulo_curso'] ?></h5>
                                        <div class="card-tools">
                                            <a class="btn btn-tool btn-link"><?php echo $cantidadCurso; ?></a>
                                            <a class="btn btn-tool">
                                                <i class="fas fa-chalkboard"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $moduloMateria = ControladorMateria::ctrMateriaMod($curso['id_curso']);
                                        foreach ($moduloMateria as $modulo) {
                                        ?>
                                            <p class="btn-sm btn-info d-flex justify-content-between" style="cursor:none;"><?php echo ($modulo['desc_modulo']) ?> - <span class="text-xs text-right"> Total Puntaje </span> </p>

                                            <?php
                                            $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
                                            /* para ver las materia de los modulos */
                                            foreach ($MatMod as $value) {
                                                $idCurso =  $curso['id_curso'];
                                                $idModulo =  $modulo['id_modulo'];
                                                $idMateria =  $value['id_materia'];
                                            ?>
                                                <div class="ml-2 mb-2 d-flex justify-content-between">
                                                    <button class="btn btn-sm btn-default text-bold text-dark mr-2" style="width: 270px;" onclick="MNotaEstudiante('<?php echo $idEstudiante . '-' . $idCurso . '-' . $idModulo . '-' . $idMateria; ?>')"><?php echo $value["nombre_materia"]; ?> - <i class="fas fa-edit"></i></button>

                                                    <?php
                                                    /* require "../../controlador/notaControlador.php";
                                                       require "../../modelo/notaModelo.php"; */
                                                    $notas = ControladorNota::ctrNotaEstudiante($idEstudiante, $idMateria, $idModulo, $idCurso);
                                                    $detalleNota = json_decode($notas['desc_nota']);
                                                    if ($notas == false) {
                                                    ?>
                                                        0
                                                    <?php
                                                    } elseif ($detalleNota->examen != "") {
                                                        $notaPromConExamen = ($detalleNota->examen + $detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 4;
                                                    ?>
                                                        <?php
                                                        echo  number_format($notaPromConExamen, 1) . " " . "";
                                                        ?>
                                                    <?php
                                                    } else {
                                                        $notaPromSinExamen = ($detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 3;
                                                    ?>
                                                        <?php
                                                        echo  number_format($notaPromSinExamen, 1) . " " . "";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                        <?php
                                            }/* FIN de para ver las materia de los modulos */
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function MNotaEstudiante(id) {
        let identificativo = id.split('-');
        var obj = {
            idEstudiante: identificativo[0],
            idCurso: identificativo[1],
            idModulo: identificativo[2],
            idMateria: identificativo[3],
        }

        $("#modal-default").modal("show")
        $.ajax({
            type: "POST",
            url: "vista/nota/FNuevoNota.php",
            data: obj,
            cache: false,
            success: function(data) {
                $("#content-default").html(data)
                console.log(identificativo);
            }
        })
    }
</script>