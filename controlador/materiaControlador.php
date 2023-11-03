<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegMateria" ||
        $ruta["query"] == "ctrEditMateria" ||
        $ruta["query"] == "ctrEliMateria" ||
        $ruta["query"] == "ctrRegHorarioMateria" ||
        $ruta["query"] == "ctrEditHorarioMateria" ||
        $ruta["query"] == "ctrEliAsigHorario" ||
        $ruta["query"] == "ctrRegModMateria" ||
        $ruta["query"] == "ctrEditModMateria" ||
        $ruta["query"] == "ctrEliModMateria" ||
        $ruta["query"] == "ctrMatModulo" ||
        $ruta["query"] == "ctrBusMateria"
    ) {
        $metodo = $ruta["query"];
        $Materia = new ControladorMateria();
        $Materia->$metodo();
    }
}

class ControladorMateria
{
    static public function ctrInfoMateriasRegistradas()
    {
        $respuesta = ModeloMateria::mdlInfoMateriasRegistradas();
        return $respuesta;
    }

    //lista las materias que tengan un horario asignado
    static public function ctrInfoMaterias()
    {
        $respuesta = ModeloMateria::mdlInfoMaterias();
        return $respuesta;
    }

    static public function ctrRegMateria()
    {
        require "../modelo/materiaModelo.php";

        $data = array(
            "nomMateria" => $_POST["nomMateria"],
            "costoMateria" => $_POST["costoMateria"],
            "contenidoMateria" => $_POST["contenidoMateria"],
        );

        $respuesta = ModeloMateria::mdlRegMateria($data);
        echo $respuesta;
    }

    static public function ctrInfoMateria($id)
    {
        $respuesta = ModeloMateria::mdlInfoMateria($id);
        return $respuesta;
    }

    static public function ctrEditMateria()
    {
        require "../modelo/materiaModelo.php";

        $imgProdActual = $_POST["imgActMateria"];

        $imgProducto = $_FILES["ImgMateria"];

        if ($imgProducto["name"] == "") {
            $imagen = $imgProdActual;
        } else {

            $imagen = $imgProducto["name"];
            $archImagen = $imgProducto["tmp_name"];

            move_uploaded_file($archImagen, "../assest/dist/img/materias/" . $imagen);
        }

        $data = array(
            "idMateria" => $_POST["idMateria"],
            "nomMateria" => $_POST["nomMateria"],
            "costoMateria" => $_POST["costoMateria"],
            "contenidoMateria" => $_POST["contenidoMateria"],
            "estadoMateria" => $_POST["estadoMateria"],
            "imgMateria" => $imagen,
        );

        $respuesta = ModeloMateria::mdlEditMateria($data);
        echo $respuesta;
    }

    static public function ctrEliMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloMateria::mdlEliMateria($data);
        echo $respuesta;
    }

    static public function ctrCantidadMaterias()
    {
        $respuesta = ModeloMateria::mdlCantidadMaterias();
        return $respuesta;
    }

    /* ============================================= HORARIO MATERIA */
    static public function ctrInfoListaMaterias()
    {
        $respuesta = ModeloMateria::mdlInfoListaMaterias();
        return $respuesta;
    }
    static public function ctrInfoHorarioMateria()
    {
        $respuesta = ModeloMateria::mdlInfoHorarioMaterias();
        return $respuesta;
    }
    static public function ctrRegHorarioMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = array(
            "nomMateria" => $_POST["nomMateria"],
            "nomDocente" => $_POST["nomDocente"],
            "horaInicio" => $_POST["horaInicio"],
            "horaFin" => $_POST["horaFin"],
            "diaclase" => $_POST["diaclase"],
            "nomCurso" => $_POST["nomCurso"],
            "nombreGrupo" => $_POST["nombreGrupo"],
        );

        /* var_dump($data); */
        $respuesta = ModeloMateria::mdlRegHorarioMateria($data);
        echo $respuesta;
    }

    static public function ctrInfoHorarioMaterias($id)
    {
        $respuesta = ModeloMateria::mdlInfoHorarioMateria($id);
        return $respuesta;
    }

    static public function ctrEditHorarioMateria()
    {
        require "../modelo/materiaModelo.php";

        $data = array(
            "idHorarioMateria" => $_POST["idHorarioMateria"],
            "nomMateria" => $_POST["nomMateria"],
            "nomDocente" => $_POST["nomDocente"],
            "horaInicio" => $_POST["horaInicio"],
            "horaFin" => $_POST["horaFin"],
            "diaclase" => $_POST["diaclase"]
        );

        $respuesta = ModeloMateria::mdlEditHorarioMateria($data);
        echo $respuesta;
    }
    /* PARA MOSTRAR DETALLE DEL CURSO */
    static public function ctrDetalleCurso($id)
    {
        $respuesta = ModeloMateria::mdlDetalleCurso($id);
        return $respuesta;
    }

    static public function ctrCantidadModulo($id)
    {
        $respuesta2 = ModeloMateria::mdlCantidadModulo($id);
        return $respuesta2;
    }

    static public function ctrMateriasModulo($id)
    {
        $respuesta2 = ModeloMateria::mdlMateriasModulo($id);
        return $respuesta2;
    }

    static public function ctrCostoModulo($id)
    {
        $respuesta2 = ModeloMateria::mdlCostoModulo($id);
        return $respuesta2;
    }

    static public function ctrDetalleCursoSeleccionado($id)
    {
        $respuesta = ModeloMateria::mdlInfoDetalleCursoSeleccionado($id);
        return $respuesta;
    }

    static public function ctrInfoDetalleMateria($id)
    {
        $respuesta = ModeloMateria::mdlInfoDetalleMateria($id);
        return $respuesta;
    }

    static public function ctrEliAsigHorario()
    {
        require "../modelo/materiaModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloMateria::mdlEliAsigHorario($data);
        echo $respuesta;
    }

    /*ASIGNACION DE MATERIAS -> MODULOS  */
    static public function ctrMateriaModulo()
    {
        $respuesta = ModeloMateria::mdlMateriaModulo();
        return $respuesta;
    }

    static public function ctrMateriaVerModulo()
    {
        $respuesta = ModeloMateria::mdlMateriaVerModulo();
        return $respuesta;
    }


    static public function ctrRegModMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = array(
            "nomModulo" => $_POST["nomModulo"],
            "nomMateria" => $_POST["nomMateria"],
        );
        $respuesta = ModeloMateria::mdlRegModMateria($data);
        echo $respuesta;
    }

    static public function ctrMateriaModulos($id)
    {
        $respuesta = ModeloMateria::mdlMateriaModulos($id);
        return $respuesta;
    }

    static public function ctrEditModMateria()
    {
        require "../modelo/materiaModelo.php";

        $data = array(
            "idAsignacion" => $_POST["idAsignacion"],
            "nomModulo" => $_POST["nomModulo"],
            "nomMateria" => $_POST["nomMateria"],
        );

        $respuesta = ModeloMateria::mdlEditModMateria($data);
        echo $respuesta;
    }

    static public function ctrEliModMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = $_POST["id"];
        $respuesta = ModeloMateria::mdlEliModMateria($data);
        echo $respuesta;
    }

    /* PARA BUSCAR MATERIAS DEL MUDULO */
    static public function ctrMateriaMod($id)
    {
        $respuesta = ModeloMateria::mdlMateriaMod($id);
        return $respuesta;
    }
    static public function ctrMatMod($id)
    {
        $respuesta = ModeloMateria::mdlMatMod($id);
        return $respuesta;
    }
    static public function ctrMatModulo()
    {
        $id = $_POST['id'];
        require "../modelo/materiaModelo.php";
        require "../modelo/notaModelo.php";
        require "../controlador/notaControlador.php";
        $respuesta = ModeloMateria::ctrMatModulo($id);
        // iteramos las materias de la consulta $respuesta
        foreach ($respuesta as $value) {
?>
            <div class="card card-info shadow-sm col-md-6">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $value["nombre_materia"]; ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: flex; justify-content: space-between;">

                    <?php
                    $notas = ControladorNota::ctrNotaEstudiante($id, $value["id_materia"], $modulo['id_modulo'], $cursoEstudiante['id_curso']);
                    $detalleNota = json_decode($notas['desc_nota']);

                    if ($notas == false) {
                    ?>
                        <div class="btn-group">
                            Nota: 0 pts.
                        </div>
                    <?php
                    } elseif ($detalleNota->examen != "") {
                        $notaPromConExamen = ($detalleNota->examen + $detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 4;

                    ?>
                        <div class="btn-group">
                            <?php
                            echo "Nota: " . $notaPromConExamen . " " . " pts.";
                            ?>
                        </div>
                    <?php
                    } else {
                        $notaPromSinExamen = ($detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 3;
                    ?>
                        <div class="btn-group">
                            <?php
                            echo "Nota: " . $notaPromSinExamen . " " . " pts.";
                            ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="btn-group">
                        <?php
                        $idCurso =  $cursoEstudiante['id_curso'];
                        $idGrupo =  $cursoEstudiante['id_grupo'];
                        $idModulo =  $modulo['id_modulo'];
                        $idMateria =  $value['id_materia'];
                        ?>
                        <button class="btn btn-sm btn-secondary" onclick="MNotaEstudiante('<?php echo $id . '-' . $idCurso . '-' . $idGrupo . '-' . $idModulo . '-' . $idMateria; ?>')">Añadir Nota
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
<?php
        }
    }
}
