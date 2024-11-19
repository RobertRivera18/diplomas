<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Usuario.php");
    /*TODO: Inicializando Clase */
    $inspeccion = new Inspeccion();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["op"]){

        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["id_inspeccion"])){
                $inspeccion->insert_inspeccion($_POST["nombre_cliente"],$_POST["direccion"],$_POST["sistema_id"]);
            }else{
                $inspeccion->update_inspeccion($_POST["id_inspeccion"],$_POST["nombre_cliente"],$_POST["direccion"],$_POST["sistema_id"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $usuario->delete_usuario($_POST["usu_id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
                $datos=$inspeccion->get_inspeccion();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["nombre_cliente"];
                    $sub_array[] = $row["direccion"];
                   
                    if ($row["sistema_id"] == 1) {
                        $sub_array[] = "Paneles Solares";
                    } elseif ($row["sistema_id"] == 2) {
                        $sub_array[] = "Baterías de Respaldo";
                    } elseif ($row["sistema_id"] == 3) {
                        $sub_array[] = "Paneles Solares y Baterías";
                    }
                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_inspeccion"].');"  id="'.$row["id_inspeccion"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_inspeccion"].');"  id="'.$row["id_inspeccion"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
                break;
        /*TODO: Listar todos los usuarios pertenecientes a un curso */
        case "listar_cursos_usuario":
            $datos=$usuario->get_cursos_usuario_x_id($_POST["cur_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["usu_nom"]." ".$row["usu_apep"]." ".$row["usu_apem"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "listar_detalle_usuario":
            $datos=$usuario->get_usuario_modal($_POST["cur_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = "<input type='checkbox' name='detallecheck[]' value='". $row["usu_id"] ."'>";
                $sub_array[] = $row["usu_nom"];
                $sub_array[] = $row["usu_apep"];
                $sub_array[] = $row["usu_apem"];
                $sub_array[] = $row["usu_correo"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "guardar_desde_excel":
            $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_apep"],$_POST["usu_apem"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_sex"],$_POST["usu_telf"],$_POST["rol_id"],$_POST["usu_dni"]);
            break;

    }
?>