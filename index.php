<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Videojuegos de GameStation</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/81f9e7ba51.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<h1 class="mt-4 mb-4 text-center">Videojuegos de GameStation</h1>

			<div class="row mb-4">
				<div class="col-12 col-md-6">
					<button id="btn-agregar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminJuego">
						<i class="fas fa-plus"></i> Agregar
					</button>
					<button id="btn-eliminar" class="btn btn-danger" disabled>
						<i class="fas fa-trash"></i> Eliminar
					</button>
				</div>
				<div class="col-12 col-md-6">
					<div class="input-group">
						<input id="busqueda" type="text" class="form-control" placeholder="Buscar videojuego">
						<button id="btn-buscar" class="btn btn-outline-secondary" type="button">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			
			<div class="d-flex justify-content-center mt-2 mb-2">
				<div class="spinner-border text-primary" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
			</div>
			<table id="tabla-videojuegos" class="table table-striped" style="width:100%">
			</table>
			<nav aria-label="Page navigation example">
				<ul id="paginacion" class="pagination justify-content-center">
					<li class="page-item">
						<a class="page-link" href="#" data-pagina="1">&lt;</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="modal fade" id="adminJuego" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Administrar Videojuegos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="form-videojuego">
						<input type="hidden" id="id" name="id">
						<div class="mb-3">
							<input type="hidden" id="id" name="id">
							<label for="nombre" class="form-label">Nombre</label>
							<input type="text" class="form-control" id="nombre" name="nombre" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Categoría</label>
							<select class="form-control" id="categoria">
								<option value="Accion">Acción</option>
								<option value="Aventura">Aventura</option>
								<option value="Deportes">Deportes</option>
								<option value="Disparos">Disparos</option>
								<option value="Estrategia">Estrategia</option>
								<option value="Rol">Rol</option>
								<option value="RPG">RPG</option>
								<option value="Simulacion">Simulación</option>
								<option value="Otros">Otros</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label" >Dificultad</label>
							<select class="form-control" id="dificultad">
								<option value="Facil">Facil</option>
								<option value="Normal">Normal</option>
								<option value="Dificil">Dificil</option>
								<option value="Extremo">Extremo</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Año de lanzamiento</label>
							<input type="number" class="form-control" id="lanzamiento" name="lanzamiento" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Precio</label>
							<input type="number" class="form-control" id="precio" name="precio" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
        			<button type="button" class="btn btn-primary" id="guardarVideojuego">Guardar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
				</div>
				</div>
			</div>
		</div>		
		<?php
		?>
	</body>
</html>
