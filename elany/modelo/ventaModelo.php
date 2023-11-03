<?php
require_once "conexion.php";

class ModeloVenta
{
    static public function mdlInfoVenta()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM venta JOIN cliente ON cliente.id_cliente=venta.id_cliente
        JOIN empleado ON empleado.id_empleado=venta.id_empleado");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt->null;
    }

    static public function mdlRegVenta($data)
    {
        $personal = $data["personal"];
        $cliente = $data["cliente"];
        $nuevaVenta = $data["nuevaVenta"];
        $selectedProd = $data["selectedProd"];
        $totalCosto = $data["totalCosto"];
        $metodoPago = $data["metodoPago"];
        $totalCostoSalon = $data["totalCostoSalon"];
        $totalCostoPersonal = $data["totalCostoPersonal"];

        date_default_timezone_set('America/La_Paz');
        $fecha = date('Y-m-d');

        $stmt = Conexion::conectar()->prepare("insert into venta(codigo_venta, id_cliente, id_empleado, detalle_productos, ingreso_salon, ingreso_empleado, total, tipo_pago, fecha_emision) values('$nuevaVenta','$cliente','$personal', '$selectedProd','$totalCostoSalon','$totalCostoPersonal','$totalCosto','$metodoPago','$fecha')");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt->null;
    }

    static public function mdlInfoVentas($id)
    {
        $stmt = Conexion::conectar()->prepare("select * from venta 
        JOIN cliente ON cliente.id_cliente=venta.id_cliente 
        JOIN empleado ON empleado.id_empleado=venta.id_empleado 
        where id_venta=$id");
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt->null;
    }

    /* static public function mdlEditVenta($data)
    {
        $idVenta = $data["idVenta"];
        $codVenta = $data["codVenta"];
        $categoria = $data["categoria"];
        $descVenta = $data["descVenta"];
        $precioVenta = $data["precioVenta"];
        $estadoVenta = $data["estadoVenta"];

        $stmt = Conexion::conectar()->prepare("update Venta set cod_serv='$codVenta', descripcion_serv='$descVenta', precio_serv='$precioVenta', id_categoria='$categoria', estado_serv='$estadoVenta' where id_Venta=$idVenta");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt->null;
    } */

    static function mdlEliVenta($data)
    {
        $stmt = Conexion::conectar()->prepare("delete from venta where id_venta=$data");
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->null;
    }

    /*=============================================
	MOSTRAR VENTAS
	=============================================*/
    static public function mdlMostrarVentas()
    {

        $stmt = Conexion::conectar()->prepare("select count(*) as venta from venta");
        $stmt->execute();

        return $stmt->fetchColumn();
        $stmt->close();
        $stmt->null;
    }

    static public function mdlMostrarVentasSalon()
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM venta ORDER BY id_venta DESC");
        $stmt->execute();

        return $stmt->fetch();
        $stmt->close();
        $stmt->null;
    }

    static public function mdlReportePersonal($serv)
    {
        $id = $serv["idPersonal"];
        $fechaDesde = $serv["fechaDesde"];
        $fechaHasta = $serv["fechaHasta"];

        if ($id == "Todos") {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM venta JOIN cliente ON cliente.id_cliente=venta.id_cliente WHERE fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta'");
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM venta JOIN cliente ON cliente.id_cliente=venta.id_cliente where id_empleado='$id' AND fecha_emision BETWEEN '$fechaDesde' AND '$fechaHasta'");
        }

        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt->null;
    }

}
