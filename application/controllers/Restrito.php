<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrito extends CI_Controller {


	public function __construct(){

		parent::__construct();
		
		$this->load->library("session");


	}

	
	public function index(){




	if($this->session->userdata("users_id")){  //verificando a variavel de session se está logado 
		$data = array(
				"style" => array(
					"dataTables.bootstrap.min.css",
					"datatables.min.css"
				),
				"scripts" => array(
					"sweetalert2.all.min.js",
					"datatables.min.js",
					
					"util.js",
					"restrito.js"
				),

				"users_id" =>$this->session->userdata("users_id")
			);
	 		


		$this->template->show("restrito", $data);
	}else{   //caso nao esteja logo returna login.php
			$data = array(
				"scripts" => array(
					"util.js",
					"login.js"
				)
			);
	 		
			$this->template->show("login", $data); 
		}
	}

	public function logoff(){  //quebrar a senssão 
		$this->session->sess_destroy();
		header("location: ".base_url() . "restrito");
	}

	public function ajax_login(){
		
		if(!$this->input->is_ajax_request()){
			exit("nenhum acesso de script direto é permitido!");
		} //função para evitar acesso de invasão (segurança)



		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();

		$username = $this->input->post("username");
		$password = $this->input->post("password");

		if(empty($username)){
			$json["status"] = 0;
			
			$json["error_list"] ["#username"] = "Usuario e senha nao pode ser vazio";
		}else {
			$this->load->model("users_model"); //chamando script do banco de dados
			$result = $this->users_model->get_user_data($username);
			if ($result){
				$users_id = $result->users_id;
				$password_hash = $result->password_hash;
				if(password_verify($password, $password_hash)){
					$this->session->set_userdata("users_id", $users_id);
				}else {
					$json["status"] = 0;
				}
			}else {
				$json["status"] = 0;
			}
		}
		if($json["status"] ==0){

		$json ["error_list"]["#btn_login"] = "usuario ou senha incorreta";
		
		}
		
		echo json_encode($json);
	}
		





public function ajax_salvar_usuarios(){
		
	 if(!$this->input->is_ajax_request()){
			exit("nenhum acesso de script direto é permitido!");
		} //função para evitar acesso de invasão (segurança)


	
		$json = array();
		$json["status"] = 1;
		$json["error_list"] = array();


		$this->load->model("users_model");

		$data = $this->input->post();

			if (empty($data["user_login"])) {
			$json["error_list"]["#user_login"] = "Nome do curso é obrigatório!";
		
		} else {
			if ($this->users_model->is_duplicated("user_login", $data["user_login"], $data["users_id"])) {
				$json["error_list"]["#user_login"] = "Login já existente!";
			}
		}

		if (empty($data["user_full_name"])) {
			$json["error_list"]["#user_full_name"] = "Nome completo é obrigatório!";
		
		} 



		if (empty($data["user_email"])) {
			$json["error_list"]["#user_email"] = "E-mail é obrigatorio!";
		
		} else {
			if ($this->users_model->is_duplicated("user_email", $data["user_email"], $data["users_id"])) {
				$json["error_list"]["#user_email"] = "e-mail já existente!";
			} else {
				if ($data["user_email"] != $data["user_email_confirm"]){
					$json["error_list"]["#user_email"] ="";
					$json["error_list"]["#user_email_confirm"] = "E-mail não confere";

				}
			}
		}

		if (empty($data["user_password"])) {
			$json["error_list"]["#user_password"] = "Senha é obrigatorio!";
		
		} else {
				if ($data["user_password"] != $data["user_password_confirm"]) {
					$json["error_list"]["#user_password"] ="";
					$json["error_list"]["#user_password_confirm"] = "Senha não confere";

				}
		}

		
		if (!empty($json["error_list"])) {
			$json["status"] = 0;
		} else {

			$data["password_hash"] = password_hash($data["user_password"], PASSWORD_DEFAULT);

			unset($data["user_password"]);
			unset($data["user_password_confirm"]);
			unset($data["user_email_confirm"]);

			if (empty($data["users_id"])) {
				$this->users_model->insert($data);
			} else {
				$users_id = $data["users_id"];
				unset($data["users_id"]);
				$this->users_model->update($users_id, $data);
			}
		}




		echo json_encode($json);

	}	

	public function ajax_get_usuarios_data(){
		
	 if(!$this->input->is_ajax_request()){
			exit("nenhum acesso de script direto é permitido!");
		} //função para evitar acesso de invasão (segurança)


	
		$json = array();
		$json["status"] = 1;
		$json["input"] = array();


		$this->load->model("users_model");

		$users_id = $this->input->post("users_id");

 		$data =  $this->users_model->get_data($users_id)->result_array()[0];


 		$json["input"]["users_id"] = $data["users_id"];

 		$json["input"]["user_login"] = $data["user_login"];

 		$json["input"]["user_full_name"] = $data["user_full_name"];

 		$json["input"]["user_email"] = $data["user_email"];

 		$json["input"]["user_email_confirm"] = $data["user_email"];

 		$json["input"]["user_password"] = $data["password_hash"];

 		$json["input"]["user_password_confirm"] = $data["password_hash"];

	


		echo json_encode($json);

	}	





public function ajax_delete_usuario_data(){
		
	 if(!$this->input->is_ajax_request()){
			exit("nenhum acesso de script direto é permitido!");
		} //função para evitar acesso de invasão (segurança)


	
		$json = array();
		$json["status"] = 1;
	
		$this->load->model("users_model");
		$users_id = $this->input->post("users_id");
		$this->users_model->delete($users_id);


		echo json_encode($json);

	}	




	public function ajax_lista_users(){
		
		if (!$this->input->is_ajax_request()){
			exit("nenhum acesso de script direto permitido");

		}
			
			$this->load->model("users_model");
			$users = $this->users_model->get_datable();

			$data =  array();
			foreach ($users as $user) {

				$row = array();
				
				$row[] = '<style=""><span style= color:'.$user->user_color.'>'.$user->user_login.'</style>';
				$row[] = '<style=""><span style= color:'.$user->user_color.'>'.$user->user_full_name.'</style>';
				//$row[] = $user->user_login;
				$row[] = '<style=""><span style= color:'.$user->user_color.'>'.$user->user_email.'</style>';
			
				
				

				

								
				$row[] = '<div style="display: inline=block;">
								<button  class= "btn btn-primary btn-editar-usuario" users_id ="'.$user->users_id.'">
									<i class= "fa fa-edit"></i>
								</button>

								

								<button  class= "btn btn-danger btn-del-usuario" users_id ="'.$user->users_id.'">
									<i class= "fa fa-times"></i>
								</button>




							</div>';

					$data[] = $row;
			}

			$json = array(

				"draw" => $this->input->post("draw"),
				"recordsTotal" => $this->users_model->records_total(),
				"recordsFiltered" => $this->users_model->records_filtered(),
				"data" => $data,

			);

		echo json_encode($json);
	}
}





		
/* echo password_hash("rogerio", PASSWORD_DEFAULT);  gera uma hash de senha */

		/*$this->load->model("users_model");

		print_r($this->users_model->get_user_data("rmachado")); teste de array cadastro de usuários*/
   


