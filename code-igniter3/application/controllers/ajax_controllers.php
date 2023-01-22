<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ajax_controllers extends CI_Controller{
    /* Order taker */
    public function view_orderpage()
    {
        $this->load->view('Ajax/ordertaker/ordertaker.php');
    }
    public function view_orderform()
    {
        $this->load->model('ordertaker');
        $orders = $this->ordertaker->show_orders();
        $view_data['vdata'] = array('orders' => $orders);
        $this->load->view('Ajax/Ordertaker/partial.php', $view_data);
    }
    public function take_order()
    {
        $this->load->model('ordertaker');
        $new_order = $this->input->post('order_message');
        $this->ordertaker->add_order($new_order);
        $orders = $this->ordertaker->show_orders();
        $view_data['vdata'] = array('orders' => $orders);
        $this->load->view('Ajax/Ordertaker/partial.php', $view_data);
    }
    /* No Ajax */
    /* public function view_orderform()
    {
        $this->load->model('ordertaker');
        $orders = $this->ordertaker->show_orders();
        $view_data['vdata'] = array('orders' => $orders);
        $this->load->view('Ajax/ordertaker/ordertaker.php', $view_data);
    }
    public function take_order()
    {
        $this->load->model('ordertaker');
        $new_order = $this->input->post('order_form');
        $this->ordertaker->add_order($new_order);
        redirect('order');
    } */
}
?>