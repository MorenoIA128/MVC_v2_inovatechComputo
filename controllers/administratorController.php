<?php
class administratorController extends Administrator
{
	function index()
	{
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function pedido()
	{
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>idPedido</th>
					<th>idCliente</th>
					<th>fecha</th>
					<th>total</th>
					<th>metodoDePago</th>
					<th>direccion</th>
					<th>numeroDeSeguimiento</th>
					<th>fechaDeEntrega</th>
					<th>idEmpleado</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach (parent::get_view_users() as $data) {
					?>
					<tr>
						<td>
							<?php echo $data->idPedido; ?>
						</td>
						<td>
							<?php echo $data->idCliente; ?>
						</td>
						<td>
							<?php echo $data->fecha; ?>
						</td>
						<td>
							<?php echo $data->total; ?>
						</td>
						<td>
							<?php echo $data->metodoDePago; ?>
						</td>
						<td>
							<?php echo $data->direccion; ?>
						</td>
						<td>
							<?php echo $data->numeroDeSeguimiento; ?>
						</td>
						<td>
							<?php echo $data->fechaDeEntrega; ?>
						</td>
						<td>
							<?php echo $data->idEmpleado; ?>
						</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									Seleccionar <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="#" onclick="ModalUpdate(
											'<?php echo $data->idPedido; ?>',
											'<?php echo $data->idCliente; ?>',
											'<?php echo $data->fecha; ?>',
											'<?php echo $data->total; ?>',
											'<?php echo $data->metodoDePago; ?>',
											'<?php echo $data->direccion; ?>',
											'<?php echo $data->numeroDeSeguimiento; ?>',
											'<?php echo $data->fechaDeEntrega; ?>',
											'<?php echo $data->idEmpleado; ?>');">
											Actualizar
										</a>
									</li>
									<li>
										<a href="#" onclick="deletePedido('<?php echo $data->idPedido; ?>');">Borrar</a>
									</li>
								</ul>
							</div>

						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
		<?php
	}

	function deletePedido()
	{
		if (isset($_REQUEST['idPedido'])) {
			parent::set_delete_user($_REQUEST['idPedido']);
		}
	}

	function registerPedido()
	{
		$data = array(
			'idPedido' => $_REQUEST['idPedido'],
			'idCliente' => $_REQUEST['idCliente'],
			'fecha' => $_REQUEST['fecha'],
			'total' => $_REQUEST['total'],
			'metodoDePago' => $_REQUEST['metodoDePago'],
			'direccion' => $_REQUEST['direccion'],
			'numeroDeSeguimiento' => $_REQUEST['numeroDeSeguimiento'],
			'fechaDeEntrega' => $_REQUEST['fechaDeEntrega'],
			'idEmpleado' => $_REQUEST['idEmpleado']
		);

		parent::set_register_user($data);
	}

	function updatePedido()
	{
		$data = array(
			'idPedido' => $_REQUEST['idPedido'],
			'idCliente' => $_REQUEST['idCliente'],
			'fecha' => $_REQUEST['fecha'],
			'total' => $_REQUEST['total'],
			'metodoDePago' => $_REQUEST['metodoDePago'],
			'direccion' => $_REQUEST['direccion'],
			'numeroDeSeguimiento' => $_REQUEST['numeroDeSeguimiento'],
			'fechaDeEntrega' => $_REQUEST['fechaDeEntrega'],
			'idEmpleado' => $_REQUEST['idEmpleado']
		);

		parent::set_update_user($data);
	}
}
