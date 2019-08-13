<section style="min-height: calc(100vh - 83px);" class="light-bg">
			<div class="container">
				<div class="row">
					<div class=" col-lg-offset-3  col-lg-6 text-center" >
						<div  class="section-title">
							<br/>
							<h2 > AREA RESTRITA</h2>
														
						</div>
					</div>
				</div>
				<div class="row">
					<div class=" col-lg-offset-5  col-lg-2 text-center" >
						<div  class="form-group">
							<a id="btn_listar_usuarios" class="btn btn-link" users_id="<?=$users_id?>"><i class="fa fa-user"></i></a>
							<a class="btn btn-link" href="restrito/logoff"><i class="fa fa-sign-out"></i></a>
						</div>
					</div>
				</div>
			<div class="container">
 				
 				<ul class="nav nav-tabs">
 				
 					
 					<li class="active"> <a href="#tab_usuarios" role="tab" data-toggle="tab">Usuários</a></li>
 				</ul>

	 			<div class="tab-content">
	 			
	 				
	 			<div id="tab_usuarios" class="tab-pane active">
	 					<div class="container-fluid">
	 						<h2 class="text-center"><strong>&nbsp;&nbsp;&nbsp;Genrenciar Usuários</strong></h2>
	 						<a id="btn_adc_users" class="btn btn-primary"><i class="fa fa-plus">&nbsp;Adicionar Usuários</i></a> <br/><br/>
	 					<table id="dt_usuarios" class="table table-striped table-bordered">
							<thead>
	 							<tr class="tableheader">

	 								<th> Login</th>
	 								<th> Nome </th>
	 								<th> E-mail</th>
	 								<th class="dt-center no-sort"> Ações</th>
	 							</tr>
	 						</thead>
	 						<tbody>
	 						</tbody>
	 					  </table>
	 					</div>
	 				</div>
	 			</div>
			</div>
</section>

<div id="modal_colors" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h4 class="modal-title">Cores</h4>
			</div>

			<div class="modal-body">
				<form id="form_Colors">
				 <input id="color_id" name="color_id" hidden>
				 	<div class="form-group">
				 		<label class="col-lg-2 control-label">Nome</label>
				 	<div class="col-lg-10">
				 	<input id="name_color" name="name_color" class="form-control" maxlength="100">
				 	<span class="help-block"></span>
				 </div>
				</div>
				
				<div class="form-group text-center">
				 <button type="submit" id="btn_salvar_colors" class="btn btn-primary">
				 <i class="fa fa-save">&nbsp;&nbsp;Salvar</i>
				</button>
				<span class="help-block"></span>
				</div>
			  </form>
			</div>
		</div>
	</div>
</div>

<div id="modal_usuarios" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">x</button>
				<h4 class="modal-title">Usuários</h4>
			</div>

			<div class="modal-body">
				<form id="form_usuarios">
				 <input id="users_id" name="users_id" hidden>
				 	<div class="form-group">
				 		<label class="col-lg-2 control-label">Login</label>
				 	<div class="col-lg-10">
				 	<input id="user_login" name="user_login" class="form-control" maxlength="100">
				 	<span class="help-block"></span>
				 </div>
				</div>
				<div class="form-group">
				 <label class="col-lg-2 control-label">Nome Completo</label>
				 	<div class="col-lg-10">
				 	<input id="user_full_name" name="user_full_name" class="form-control" maxlength="100">
				 	<span class="help-block"></span>
				 </div>
				</div>

				<div class="form-group">
				 <label class="col-lg-2 control-label">Escolha a cor</label>
				 	<div class="col-lg-10">
				 	<input type="color" id="user_color" name="user_color" class="form-control">
				 	<span class="help-block"></span>
				 </div>
				</div>


				<div class="form-group">
				<label class="col-lg-2 control-label">E-mail</label>
				 	<div class="col-lg-10">
				 	<input id="user_email" name="user_email" class="form-control">
				  	<span class="help-block"></span>
				 </div>
				</div>

			




				<div class="form-group">
				 <label class="col-lg-2 control-label">Confirmar E-mail</label>
				 	<div class="col-lg-10">
				 	<input id="user_email_confirm" name="user_email_confirm" class="form-control">
				 
				 	<span class="help-block"></span>
				 </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label">Senha</label>
				 	<div class="col-lg-10">
				 	<input type="password" id="user_password" name="user_password" class="form-control">
				 
				 	<span class="help-block"></span>
				 </div>
				</div>

				<div class="form-group">
				<label class="col-lg-2 control-label">Confirmar Senha</label>
				 	<div class="col-lg-10">
				 	<input type="password" id="user_password_confirm=" name="user_password_confirm" class="form-control">
				 	
				 	<span class="help-block"></span>
				 </div>
				</div>

				<div class="form-group text-center">
				 <button type="submit" id="btn_salvar_user" class="btn btn-primary">
				 <i class="fa fa-save">&nbsp;&nbsp;Salvar</i>
				</button>
				<span class="help-block"></span>
				</div>
			  </form>
			</div>
		</div>
	</div>
</div>