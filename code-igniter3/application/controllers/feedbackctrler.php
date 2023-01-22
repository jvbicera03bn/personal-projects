<?php
defined('BASEPATH') or exit('No direct script access allowed');

class feedbackctrler extends CI_Controller
{
    public function feedback()
    {
        $this->load->view('feedback_form/feedback');
    }
    public function result()
    {
        $name = $this->input->post('name');
        $course = $this->input->post('course');
        $rate = $this->input->post('rate');
        $reason = $this->input->post('reason');
        $post_data['post'] = array('name' => $name, 'rate'=>$rate,'reason'=>$reason,'course'=>$course);
        $this->load->view('feedback_form/result',$post_data);
    }
}