<?php
defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		/* Default View */
		/* $this->load->view('welcome_message');  */
		/* Activities */
		/* echo "I AM MAIN CLASS";  */
		/* Act CountDown */
		date_default_timezone_set('Asia/Manila');
		$time_now = date('G:i:s');
		$date_now = date('M d,Y');
		$time_arr = explode(':', $time_now);
		$hr =  24 - $time_arr[0];
		$min =  60 - $time_arr[1];
		$sec =  60 - $time_arr[2];
		$time_remain = ($hr*3600)+($min*60)+$sec;
		$view_data['vdata'] = array('time_remain' => $time_remain,'date_today' => $date_now); 
		$this->load->view('countdown/countdown',$view_data);
	}
		/* first activity */
/* 	public function hello()
	{
		echo 'Hello World!';
	}
	public function say_hi()
	{
		echo 'Hi';
	}
	 public function say_anything($any1, $any2)
	{
		echo $any1 . str_replace('%20',' ',$any2);
	}
	public function danger()
	{
		redirect('/main');
	}  */
	/* User def */
	public function world()
	{
		$this->load->view('world');
	}
	public function ninja()
	{
		$view_data['vdata'] = array('numofninja' => NULL);
		$this->load->view('ninja', $view_data);
	}
	public function ninja2($ninjanum)
	{
		$view_data['vdata'] = array('numofninja' => $ninjanum);
		$this->load->view('ninja', $view_data);
	}
	/* Users */
	public function users()
	{
		$this->load->view('users/index');
	}
	public function new()
	{
		$this->load->view('users/new');
	}
	public function create()
	{
		$this->load->view('users/create');
	}
	public function count()
	{
		$count = $this->session->userdata('count');
		$count =  $count + 1;
		$this->session->set_userdata('count', $count);
		$this->load->view('users/count');
	}
	public function reset()
	{
		session_destroy();
		$this->load->view('users/reset');
	}
	public function say($say,$count)
	{
		$this->session->set_userdata('count', $count); 
		$this->session->set_userdata('say', str_replace('%20',' ',$say));
		$this->load->view('users/say');
	}
	public function mprep()
	{
		$view_data['vdata'] = array(
			'name' => "Michael Choi",
			'age'  => 40,
			'location' => "Seattle, WA",
			'hobbies' => array("Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
		);
		$this->load->view('users/mprep', $view_data);
	}
	/* Feedbackform */
	

}
