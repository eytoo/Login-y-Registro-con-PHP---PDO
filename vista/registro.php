<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>

<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="registroCode.php" method="POST" role="form">
							<legend>Registro de usuarios</legend>
							<div class="form-group">
								<label for="nombre">Nombre</label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa tu nombre">
							</div>

							<div class="form-group">
								<label for="email">E-mail</label>
								<input type="email" name="txtEmail" class="form-control" id="email"  required placeholder="Ingresa tu dirección de e-mail">
							</div>

							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="usuario">
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="txtPassword" class="form-control" required id="password" placeholder="****">
							</div>

							<button type="submit" class="btn btn-success">Registrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>