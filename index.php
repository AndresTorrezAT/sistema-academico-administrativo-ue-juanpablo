<?php

// CONTROLADORES
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/cursos.controlador.php";
require_once "controladores/materias.controlador.php";
require_once "controladores/docentes.controlador.php";
require_once "controladores/administrativos.controlador.php";
require_once "controladores/estudiantes.controlador.php";
require_once "controladores/inscritos.controlador.php";
require_once "controladores/horarios.controlador.php";
require_once "controladores/mensajes.controlador.php";
require_once "controladores/asignaciones.controlador.php";
require_once "controladores/calificaciones.controlador.php";
require_once "controladores/dimenciones.controlador.php";
require_once "controladores/detalle-calificaciones.controlador.php";
require_once "controladores/asistencias.controlador.php";
require_once "controladores/comportamiento.controlador.php";
require_once "controladores/gestion.controlador.php";

// MODELOS
require_once "modelos/usuarios.modelo.php";
require_once "modelos/cursos.modelo.php";
require_once "modelos/materias.modelo.php";
require_once "modelos/docentes.modelo.php";
require_once "modelos/administrativos.modelo.php";
require_once "modelos/estudiante.modelo.php";
require_once "modelos/responsables.modelo.php";
require_once "modelos/inscripciones.modelo.php";
require_once "modelos/detalles.modelo.php";
require_once "modelos/horarios.modelo.php";
require_once "modelos/mensajes.modelo.php";
require_once "modelos/asignaciones.modelo.php";
require_once "modelos/calificaciones.modelo.php";
require_once "modelos/dimenciones.modelo.php";
require_once "modelos/detalle-calificaciones.modelo.php";
require_once "modelos/asistencias.modelo.php";
require_once "modelos/comportamiento.modelo.php";
require_once "modelos/gestion.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();