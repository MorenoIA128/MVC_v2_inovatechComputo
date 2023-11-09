function objectAjax() {
	var xmlhttp = false;
	try {
	  xmlhttp = new XMLHttpRequest();
	} catch (e) {
	  try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	  } catch (E) {
		xmlhttp = false;
	  }
	}
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
  }
  
  addEventListener('load', read, false);
  
  function read() {
	$.ajax({
	  type: 'POST',
	  url: '?c=administrator&m=pedido',
	  beforeSend: function () {
		$("#information").html("Procesando, espere por favor...");
	  },
	  success: function (response) {
		$("#information").html(response);
	  }
	});
  }
  
  function register() {
	idPedido = document.formUser.idPedido.value;
	idCliente = document.formUser.idCliente.value;
	fecha = document.formUser.fecha.value;
	total = document.formUser.total.value;
	metodoDePago = document.formUser.metodoDePago.value;
	direccion = document.formUser.direccion.value;
	numeroDeSeguimiento = document.formUser.numeroDeSeguimiento.value;
	fechaDeEntrega = document.formUser.fechaDeEntrega.value;
	idEmpleado = document.formUser.idEmpleado.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registerPedido", true);
	ajax.onreadystatechange = function () {
	  if (ajax.readyState == 4) {
		if (ajax.status == 200) {
		  read();
		  alert('Los datos se guardaron correctamente.');
		  $('#addUser').modal('hide');
		}
	  }
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(
	  "idPedido=" + idPedido +
	  "&idCliente=" + idCliente +
	  "&fecha=" + fecha +
	  "&total=" + total +
	  "&metodoDePago=" + metodoDePago +
	  "&direccion=" + direccion +
	  "&numeroDeSeguimiento=" + numeroDeSeguimiento +
	  "&fechaDeEntrega=" + fechaDeEntrega +
	  "&idEmpleado=" + idEmpleado
	);
  }
  
  function update() {
	idPedido = document.formUserUpdate.idPedido.value;
	idCliente = document.formUserUpdate.idCliente.value;
	fecha = document.formUserUpdate.fecha.value;
	total = document.formUserUpdate.total.value;
	metodoDePago = document.formUserUpdate.metodoDePago.value;
	direccion = document.formUserUpdate.direccion.value;
	numeroDeSeguimiento = document.formUserUpdate.numeroDeSeguimiento.value;
	fechaDeEntrega = document.formUserUpdate.fechaDeEntrega.value;
	idEmpleado = document.formUserUpdate.idEmpleado.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updatePedido", true);
	ajax.onreadystatechange = function () {
	  if (ajax.readyState == 4) {
		if (ajax.status == 200) {
		  read();
		  $('#updatePedido').modal('hide');
		}
	  }
	};
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	ajax.send(
	  "idPedido=" + idPedido +
	  "&idCliente=" + idCliente +
	  "&fecha=" + fecha +
	  "&total=" + total +
	  "&metodoDePago=" + metodoDePago +
	  "&direccion=" + direccion +
	  "&numeroDeSeguimiento=" + numeroDeSeguimiento +
	  "&fechaDeEntrega=" + fechaDeEntrega +
	  "&idEmpleado=" + idEmpleado
	);
  }
  
  function deletePedido(idPedido) {
	if (confirm('¿Está seguro de eliminar este registro?')) {
	  ajax = objectAjax();
	  ajax.open("POST", "?c=administrator&m=deletePedido", true);
	  ajax.onreadystatechange = function () {
		if (ajax.readyState == 4) {
		  if (ajax.status == 200) {
			read();
		  }
		}
	  };
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	  ajax.send("idPedido=" + idPedido);
	}
  }
  
  function ModalRegister() {
	$('#addUser').modal('show');
  }
  
  function ModalUpdate(idPedido, idCliente, fecha, total, metodoDePago, direccion, numeroDeSeguimiento, fechaDeEntrega, idEmpleado) {
	document.formUserUpdate.idPedido.value = idPedido;
	document.formUserUpdate.idCliente.value = idCliente;
	document.formUserUpdate.fecha.value = fecha;
	document.formUserUpdate.total.value = total;
	document.formUserUpdate.metodoDePago.value = metodoDePago;
	document.formUserUpdate.direccion.value = direccion;
	document.formUserUpdate.numeroDeSeguimiento.value = numeroDeSeguimiento;
	document.formUserUpdate.fechaDeEntrega.value = fechaDeEntrega;
	document.formUserUpdate.idEmpleado.value = idEmpleado;
	$('#updatePedido').modal('show');
  }
  