<?php

namespace App\Http\Controllers;
use App\Helpers\EstadoTransaccion;
use App\Http\BusinessLayers\Factura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    private $et;
    private $factura;

    
	function __construct(){
        $this->et        = new EstadoTransaccion();
        $this->factura   = new Factura();
    }

    public function listar()
    {
        try{
            $this->et->data = $this->factura->listar();            
        }catch(\Exception $e){
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }        
        return response()->json($this->et);    
    }

    public function buscarCabecera($id)
    {
        try{
            $this->et->data = $this->factura->buscarCabecera($id);            
        }catch(\Exception $e){
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }        
        return response()->json($this->et);
    }

    public function listarFacturasDetalle()
    {
        try{
            $this->et->data = $this->factura->listarFacturasDetalle();            
        }catch(\Exception $e){
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }        
        return response()->json($this->et);
    }

    public function listarFacturaDetalle($id)
    {
        try{
            $this->et->data = $this->factura->listarFacturaDetalle($id);            
        }catch(\Exception $e){
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }        
        return response()->json($this->et);
    }

    
     public function insertar(Request $request){
        try {
            $datos = json_decode($request->getContent(),true);
            $this->factura = $this->factura->grabarFactura($datos);
            return response()->json($this->et);
        } catch (\Exception $e) {
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }
    }

    public function actualizar(Request $request){
        try {
            $datos = json_decode($request->getContent(),true);
            $this->et = $this->factura->actualizarFactura($datos);
            $this->dataos = $datos;
        } catch (\Exception $e) {
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }
        return response()->json($this->et);
    }

    public function eliminar($id){
        try{
            $this->et       = $this->factura->borrarFactura($id);
        }catch(\Exception $e){
            $this->et->existeError  = true;
            $this->et->mensaje      = 'Error: ' . $e->getMessage();
        }        
        return response()->json($this->et);
    }
}
