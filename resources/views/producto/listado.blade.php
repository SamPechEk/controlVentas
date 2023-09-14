
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registrar venta</title>
  <link rel="stylesheet" href="{{asset('public/styles.css')}}"> 
  <link rel="stylesheet" href="{{asset('public/bootstrap.min.css')}}"> 
</head>
<body id="body">
    <div id="particles-js">
		
    </div>
    <div class="container dark">
      <nav class="dark navbar ">
        <div class="col-md-10 col-lg-10 col-xs-6 col-sm-6">
            <h1 class="titulos">Registrar venta </h1><h4 class="titulos">Total de la venta ${{$total_ventas}}</h4>
        </div>
        <div class="col-md-2 col-lg-2 col-xs-6 col-sm-6">
          <button class="interruptor" id="interruptor">
            <span class="span"><img src="{{asset('public/sol.png')}}" class="span"></span>
            <span class="span"><img src="{{asset('public/luna.png')}}" class="span"></span>
          </button>
        </div>	
      </nav>		
    </div>	
  
	<div class="container content">
		<div id="app" class="row pt-3">
			<div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="titulos">Agrega un producto</h4>
          </div>
          <div v-if="bandera==1" class="alert alert-danger" role="alert">
							@{{mensaje}}
				</div>
					<form id="datos" class="card-body" action="{{action('ProductoController@save')}}" method="POST">
             {{csrf_field()}}
						<div class="form-group">
							<input type="text" v-model="nombre" name="nombre" placeholder="Ingrese el nombre del producto" class="form-control">
						</div>
						<div class="form-group">
							<input type="number" v-model="precio" step="0.01" min="1" name="precio" placeholder="Ingrese el precio del producto" class="form-control">
						</div>
						<div class="form-group">
							<input type="number" v-model="cantidad" name="cantidad" min="1" placeholder="Ingrese la cantidad de productos" class="form-control">
						</div>
						<input @click="validar_producto($event)" type="submit" class="boton btn btn-success btn-block" name="operacion" value="Agregar">
					</form>
					</div>
				</div>				
				<div id="lista" class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
            <div clas="card mb-4">
              <div class="card-body">
              <table class="table ">
                <tr>
                  <th><strong class="letras">Producto:</strong></th>
                  <th><strong class="letras">Precio:</strong></th>
                  <th><strong class="letras">Cantidad:</strong></th>
                  <th><strong class="letras">Total:</strong></th>
                  
                  <th>
                    <form id="datos" action="{{action('ProductoController@save')}}" method="POST">
                      {{csrf_field()}}
                      
                      <input @click="confirmar_eliminar($event)" type="submit" class="btn btn-danger boton" name="operacion" value="Limpiar">
                    </form>
                  </th>
                </tr>
                <tr v-for="elemento in producto">
                  
                  <td><span class="letras">@{{elemento.nombre}}</span></td>
                  <td><span class="letras">@{{elemento.precio}}</span></td>
                  <td><span class="letras">@{{elemento.cantidad}}</span></td>
                  <td><span class="letras">@{{elemento.total}}</span></td>
                  <td>
                    <form id="datos" action="{{action('ProductoController@save')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="idproducto" :value="elemento.idproducto">
                    <input @click="confirmar_eliminar($event)" type="submit" class="btn btn-danger boton" name="operacion" value="Eliminar">
                  </form>
                </td>
                </tr>
          </table>
              </div>
            </div>
           
				</div>
				
			</div>
			
		</div>
		
  </div>
  <script src="{{asset('public/particles.min.js')}}"></script>
  <script src="{{asset('public/ambiente.js')}}"></script>
  <script src="{{asset('public/jquery.min.js')}}"></script>
  <script src="{{asset('public/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/vue.js')}}"></script>
  <script>
    new Vue({
      el:'#app',
      data:{
        producto:<?php echo json_encode($lista);?>,
        nombre:"",
        precio:"",
        cantidad:"",
        bandera:0,
        mensaje:""

        

      }
      ,methods:{
        validar_producto:function(event) {
								this.bandera=0;
								this.mensaje="Falta";
								if (this.nombre==="") {
                  this.mensaje+=" el nombre";
									this.bandera=1;
									

								}
								if (this.precio==="") {
                  this.mensaje+=" el precio";
									this.bandera=1;
								}
                if (this.cantidad==="") {
                  this.mensaje+=" la cantidad";
                  this.bandera=1;
	
								}
                this.mensaje+=".";
								if (this.bandera==1) {
									event.preventDefault();
								}
							},
        confirmar_eliminar:function(event){
							if (!confirm("¿Estas seguro de eliminar este registro?")) {
								event.preventDefault();
							}
						}
      }
    });
  </script>
</body>
</html>
