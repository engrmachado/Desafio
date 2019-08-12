$(function(){
	
	$("#btn_adc_cursos").click(function(){
		clearErrors();
		$("#form_cursos")[0].reset();
		$("#curso_img_path").attr("src", "");
		$("#modal_curso").modal();
	});

	$("#btn_adc_membro").click(function(){
		clearErrors();
		$("#form_membro")[0].reset();
		$("#membro_img_path").attr("src", "");
		$("#modal_membro").modal();
	});

	$("#btn_adc_users").click(function(){
		$("#form_usuarios")[0].reset();

		$("#modal_usuarios").modal();
	});

	
	$("#btn_upload_curso_img").change(function () {
		uploadImg($(this), $("#curso_img_path"), $("#curso_img"));
	});

	$("#btn_upload_membro_img").change(function (){
		uploadImg($(this), $("#membro_img_path"), $("#membro_img"));
	});

$("#form_cursos").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrito/ajax_salvar_curso",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_salvar_curso").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_curso").modal("hide");
					swal("Sucesso!","Curso salvo com sucesso!", "success");
				
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
	});

$("#form_membro").submit(function() {

		$.ajax({
			type: "POST",
			url: BASE_URL + "restrito/ajax_salvar_membro",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function() {
				clearErrors();
				$("#btn_salvar_membro").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function(response) {
				clearErrors();
				if (response["status"]) {
					$("#modal_membro").modal("hide");
					swal("Sucesso!","Membro salvo com sucesso!", "success");
				
				} else {
					showErrorsModal(response["error_list"])
				}
			}
		})

		return false;
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

	var dt_course = $("#dt_courses").DataTable({
	
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "restrito/ajax_lista_cursos",
			"type": "POST",
		}
	})
})