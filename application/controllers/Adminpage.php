<?php 
/**
 * 
 */
class Adminpage extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('genre_model');
		$this->load->model('film_model');
		$this->load->model('jadwal_model');
	}

	function view($page='home')
	{
		if(!file_exists(APPPATH.'views/back/page/'.$page.'.php')){
			show_404();
		}

		if(!$this->session->userdata('login_admin')){
			redirect('adminpage/login');
		}

		$data = array(
			'admin' => $this->user_model->detail_user(),
			'dt_genre' => $this->genre_model->get_genre(),
			'dt_film' => $this->film_model->get_film(),
			'dt_jadwal' => $this->jadwal_model->get_jadwal(),
			 );

		$this->load->view('back/template/header', $data);
		$this->load->view('back/page/'.$page);
		$this->load->view('back/template/footer');
	}

	function login()
	{
		$this->load->view('back/login');
	}

	function aksilogin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$user_id = $this->user_model->login($username, $password);

		if($user_id){
			
			$user_data = array(
				'user_id' => $user_id->id_admin,
				'admin_level' => $user_id->level,
				'login_admin' => true
			);

			$this->session->set_userdata($user_data);

			redirect('admin');
		} else {
			
			$this->session->set_flashdata('login_failed', 'Login is invalid');

			redirect('adminpage/login');
		}
	}

	function logout(){
		
		$this->session->unset_userdata('login_admin');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('admin_level');

		$this->session->set_flashdata('user_loggedout', 'You are now logged out');

		redirect('adminpage/login');
	}
}