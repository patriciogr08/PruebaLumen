<?php

namespace App\Http\Repositories;
use Illuminate\Support\Facades\DB; 
use App\Http\Repositories\DetalleRepository;
use PhpParser\Node\Stmt\TryCatch;

class FacturaRepository{
    private $cab_id;
    private $cab_cliente;
    private $cab_estado;

    public function __construct($data=NULL){
        $this->cab_id        =   $data['cab_id']         ??null;
        $this->cab_cliente   =   $data['cab_cliente']     ??null;
        $this->cab_estado    =   $data['cab_estado']   ??null;
    }

    public function listar(){
        try {
            $respuesta=DB::select("SELECT * from cabecera where cab_estado='A'");
            return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }   
    }

    public function buscarCabecera($id){
        try {
            $respuesta=DB::select("SELECT * from cabecera where cab_estado='A' and cab_id=$id");
            return $respuesta;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }   
    }

    public function insertarCabecera(){
        try {   
            $respuesta = DB::select("SELECT insertarcabecera('$this->cab_cliente','A')");
            return $respuesta;
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }  
    }

    public function actualizarCabecera(){
        try {
            $respuesta = DB::update("UPDATE cabecera set cab_cliente='$this->cab_cliente' where cab_id=$this->cab_id");
            return $respuesta;
        } catch (\Exception $e) {       
            throw new \Exception($e->getMessage());
        }       
    }
    

    public function eliminadoFisico($id){   
        try {
            $respuesta=DB::delete("DELETE FROM cabecera WHERE cab_id=$id");
            return $respuesta;
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }       
    }
}