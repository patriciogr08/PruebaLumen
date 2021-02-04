<?php
namespace App\Http\Repositories;
use Illuminate\Support\Facades\DB; 

class DetalleRepository{
    private $det_id;
    private $cab_id;
    private $det_producto;
    private $det_cantidad;
    private $det_valor;
    private $det_estado;

    public function __construct($data=NULL){
        $this->det_id        =   $data['det_id']         ??null;
        $this->cab_id        =   $data['cab_id']         ??null;
        $this->det_producto  =   $data['det_producto']   ??null;
        $this->det_cantidad  =   $data['det_cantidad']   ??null;
        $this->det_valor     =   $data['det_valor']      ??null;
        $this->det_estado    =   $data['det_estado']     ??null;
    }

    public function listar(){
        try {
            $respuesta=DB::select("SELECT * FROM detalle where det_estado='A'");
            return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }   
    }

    public function buscarDetalleFactura($id){
        try {
            $respuesta=DB::select("SELECT * FROM detalle where det_estado='A' and cab_id=$id");
            return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }   
    }

    public function insertarDetalle($idFactura){
        try {
                $respuesta = DB::select("SELECT insertardetalle($idFactura,'$this->det_producto','$this->det_cantidad','$this->det_valor','A')");
            return $respuesta;
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }  
    }

   public function actualizarDetalle($idFactura,$json){
        try {
                $jsonAux = json_encode($json);
                $respuesta = DB::update("SELECT actualizarDetalle($idFactura,'$jsonAux')");  
                return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function eliminadoFisico($id){
        try {
            $respuesta=DB::delete("DELETE FROM detalle WHERE cab_id=$id");
            return $respuesta;
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }       
    }
    

}