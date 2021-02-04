<?php

namespace App\Http\BusinessLayers;
use App\Http\Repositories\DetalleRepository;
use Symfony\Component\VarDumper\VarDumper;
use App\Helpers\EstadoTransaccion;

class Detalle
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function listar(){
        try {
            $detalles = new DetalleRepository();
            $respuesta   =$detalles->listar();
            return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function buscarDetalle($id){
        try {
            $detalleRepo = new DetalleRepository();
            $respuesta   =$detalleRepo->buscarDetalleFactura($id);
            return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }     
    }
}