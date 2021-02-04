<?php
namespace App\Helpers;

class EstadoTransaccion{
    public $exiteError  =   false;
    public $mensaje     =   self::PROCESO_EXITOSO;
    public $data        =   null;

    public const PROCESO_EXITOSO       = "Proceso ejecutado";
    public const PROCESO_ERRONEO       = "Hubo un error ";
}