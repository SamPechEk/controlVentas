<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Producto;

class ProductoController extends Controller{

	public function fake(){
		for ($i=1; $i < 20 ; $i++) { 
			$producto=new Producto();
			$producto->nombre='producto'.$i;
			$producto->precio=$i*$i;
			$producto->cantidad=$i;
			$producto->total=$producto['precio']*$producto['cantidad'];
			$producto->save();
		}
		return $this->listado();
	}

	public function listado(){
		$productos=Producto::all();
		$datos['lista']=$productos;
		$total_ventas=0;
		foreach ($productos as $i) {
			$total_ventas+=$i->total;
		}

		
		$datos['total_ventas']=$total_ventas;
		
		return view('producto.listado')->with($datos);
	}


	public function save(Request $r){
		$datos=$r->all();
		
		if($r->isMethod('post')){
			switch ($datos['operacion']) {
				case 'Agregar':
				$producto=new Producto();
				$producto->nombre=$datos['nombre'];
				$producto->precio=$datos['precio'];
				$producto->cantidad=$datos['cantidad'];
				$producto->total=$datos['precio']*$datos['cantidad'];
				$producto->save();
				break;
				case 'Eliminar':
				$producto=Producto::find($datos['idproducto']);
				$producto->delete();
				break;
				
				case 'Limpiar':
				$productos=Producto::all();
				foreach ($productos as $i) {
					$limpiar=Producto::find($i['idproducto']);
					$limpiar->delete();
				}
				
				break;
			}
			
		}
		return $this->listado();
	}


}




