<?php
require_once "conexion.php";
class ModeloMateria
{
  static public function mdlInfoMaterias()
  {
    $stmt = Conexion::conectar()->prepare("select * from materia join horario on horario.id_materia=materia.id_materia ORDER BY RAND()");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoMateriasRegistradas()
  {

    $stmt = Conexion::conectar()->prepare("select * from materia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoListaMaterias()
  {

    $stmt = Conexion::conectar()->prepare("select * from materia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegMateria($data)
  {
    $nomMateria = $data["nomMateria"];
    $contenidoMateria = $data["contenidoMateria"];

    $stmt = Conexion::conectar()->prepare("insert into materia(nombre_materia, contenido_materia) values('$nomMateria','$contenidoMateria')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoMateria($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from materia where id_materia=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDetalleMateria($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from materia left join horario on horario.id_materia=materia.id_materia  where materia.id_materia=$id ");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* MOSTRAR ULTIMO GRUPO Q INICIARA CLASES*/
  static public function mdlDetalleCurso($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from grupo where id_grupo=(select max(id_grupo) from grupo where id_curso=$id)");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select count(id_modulo) as cantidad from modulo where id_curso=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlMateriasModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select distinctrow materia.nombre_materia, modulo.costo_modulo, modulo.desc_modulo, curso.img_curso from modulo_materia
    join modulo on modulo.id_modulo=modulo_materia.id_modulo
    join materia on materia.id_materia=modulo_materia.id_materia
    JOIN curso on curso.id_curso=modulo.id_curso
    where curso.id_curso=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCostoModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select distinct modulo.costo_modulo, modulo.desc_modulo from modulo_materia
    join modulo on modulo.id_modulo=modulo_materia.id_modulo
    join materia on materia.id_materia=modulo_materia.id_materia
    JOIN curso on curso.id_curso=modulo.id_curso
    where curso.id_curso=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDetalleCursoSeleccionado($id){
    $stmt = Conexion::conectar()->prepare("select * from curso
    where id_curso=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditMateria($data)
  {
    $idMateria = $data["idMateria"];
    $nomMateria = $data["nomMateria"];
    $costoMateria = $data["costoMateria"];
    $contenidoMateria = $data["contenidoMateria"];

    $estadoMateria = $data["estadoMateria"];
    $imgMateria = $data["imgMateria"];

    $stmt = Conexion::conectar()->prepare("update materia set nombre_materia='$nomMateria', contenido_materia='$contenidoMateria', costo_materia='$costoMateria', img_materia='$imgMateria', estado_materia='$estadoMateria' where id_materia=$idMateria");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliMateria($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from materia where id_materia=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadMaterias()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as materia from materia");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ===================================
  HORARIO MATERIA
  =====================================*/
  static public function mdlInfoHorarioMaterias()
  {
    $stmt = Conexion::conectar()->prepare("select * from horario left 
    join materia on materia.id_materia=horario.id_materia
    join docente on docente.id_docente=horario.id_docente");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHorarioMateria($data)
  {
    $nomCurso = $data["nomCurso"];
    $nombreGrupo = $data["nombreGrupo"];
    $nomMateria = $data["nomMateria"];
    $nomDocente = $data["nomDocente"];
    $horaInicio = $data["horaInicio"];
    $horaFin = $data["horaFin"];
    $diaclase = json_encode($data["diaclase"]);

    $stmt = Conexion::conectar()->prepare("insert into horario(id_materia, id_docente, dias, hora_inicio, hora_fin, id_curso, id_grupo) values($nomMateria, $nomDocente, '$diaclase', '$horaInicio', '$horaFin', '$nomCurso', '$nombreGrupo' )");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoHorarioMateria($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from horario where id_horario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHorarioMateria($data)
  {
    $idHorarioMateria = $data["idHorarioMateria"];
    $nomMateria = $data["nomMateria"];
    $nomDocente = $data["nomDocente"];
    $horaInicio = $data["horaInicio"];
    $horaFin = $data["horaFin"];
    $diaclase = json_encode($data["diaclase"]);

    $stmt = Conexion::conectar()->prepare("update horario set id_materia='$nomMateria', id_docente='$nomDocente', dias='$diaclase', hora_inicio='$horaInicio', hora_fin='$horaFin' where id_horario=$idHorarioMateria");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliAsigHorario($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from horario where id_horario=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  /* ===================================
  ASIGANCION DE MATERIAS A MODULOS
  =====================================*/
  static public function mdlMateriaModulo()
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_materia 
    join materia on materia.id_materia=modulo_materia.id_materia
    join modulo on modulo.id_modulo=modulo_materia.id_modulo
    join curso on curso.id_curso=modulo.id_curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlMateriaVerModulo()
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_materia 
    join materia on materia.id_materia=modulo_materia.id_materia
    join modulo on modulo.id_modulo=modulo_materia.id_modulo
    join curso on curso.id_curso=modulo.id_curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegModMateria($data)
  {
    $nomMateria = $data["nomMateria"];
    $nomModulo = $data["nomModulo"];

    $stmt = Conexion::conectar()->prepare("insert into modulo_materia(id_modulo, id_materia) values($nomModulo, $nomMateria )");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlMateriaModulos($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_materia where id_modulo_materia=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditModMateria($data)
  {
    $idAsignacion = $data["idAsignacion"];
    $nomMateria = $data["nomMateria"];
    $nomModulo = $data["nomModulo"];

    $stmt = Conexion::conectar()->prepare("update modulo_materia set id_modulo=$nomModulo, id_materia=$nomMateria where id_modulo_materia=$idAsignacion");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliModMateria($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from modulo_materia where id_modulo_materia=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }
  

  static public function mdlMateriaMod($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo 
 
    where id_curso=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlMatMod($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_materia join materia on materia.id_materia=modulo_materia.id_materia 
    where id_modulo=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function ctrMatModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_materia join materia on materia.id_materia=modulo_materia.id_materia 
    where id_modulo=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }
}
