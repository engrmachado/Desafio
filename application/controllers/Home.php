<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		

		$data = array(
				"scripts",
					"owl.carousel.min.js",
					"theme-scripts.js"
			

			
			);
	 		
			$this->template->show("home", $data); 
		

	
	}
}
