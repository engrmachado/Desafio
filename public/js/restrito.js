$(function(){
		
		$("#btn_adc_colors").click(function(){
		$("#form_Colors")[0].reset();

		$("#modal_colors").modal();
	});

	$("#btn_adc_users").click(function(){
		$("#form_usuarios")[0].reset();

		$("#modal_usuarios").modal();
	});

	

$("#form_usuarios").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrito/ajax_salvar_usuarios",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_salvar_user").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_usuarios").modal("hide");
					swal("Sucesso!","Usuários salvo com sucesso!", "success");
					dt_usuarios.ajax.reload();
				
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});

$("#btn_listar_usuarios").click(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrito/ajax_get_usuarios_data",
			dataType: "json",
			data: {"users_id": $(this).attr("users_id")},
			success: function(response) {
				clearErrors();
				$("#form_usuarios")[0].reset();
				$.each(response["input"], function(id, value) {
					$("#"+id).val(value);
				});
				$("#modal_usuarios").modal();
				document.getElementById('user_password_confirm').value="";
			}
		})

		return false;
	});

	



	function active_btn_usuario(){

		$(".btn-editar-usuario").click(function() {
			$.ajax({
				type: "POST",
			url: BASE_URL + "restrito/ajax_get_usuarios_data",
			dataType: "json",
				data: {"users_id": $(this).attr("users_id")},
				success: function(response) {
					clearErrors();
					$("#form_usuarios")[0].reset();
					$.each(response["input"], function(id, value) {
						$("#"+id).val(value);
					});
					$("#modal_usuarios").modal();
				}
			})
		});
		$(".btn-del-usuario").click(function() {

			users_id = $(this);
			swal({
				title: "Atenção!",
				text: "Deseja deletar esse Usuario?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor:"#d9534f",
				confirmButtonText:"Sim",
				canclButtontext:"sim",
				closeOnConfirm:true,
				closeOnCancel:true,
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "POST",
						url: BASE_URL + "restrito/ajax_delete_usuario_data",
						dataType: "json",
						data: {"users_id": users_id.attr("users_id")},
						success: function(response) {
							swal("Sucesso!", "Ação executada com sucesso", "success");
							dt_usuarios.ajax.reload();
						}
					})
				}
			})

		});
	}

	var dt_usuarios = $("#dt_usuarios").DataTable({
		"oLanguage": DATATABLE_PTBR,
		"autoWidth": false,
		"processing":true,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "restrito/ajax_lista_users",
			"type": "POST",
		},
		"columnDefs":[
		{ targets: "no-sort", orderable: false },
		{ targets: "dt-center", className: "dt-center"},
		],
		"drawCallback": function() {
			active_btn_usuario();
		}

	});

})