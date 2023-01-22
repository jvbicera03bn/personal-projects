<?php
defined('BASEPATH') or exit('No direct script access allowed');

class act_controllers2 extends CI_Controller
{
    /* Sports Player */
    function view_players()
    {
        $this->load->model('sports_player');
        $records = $this->sports_player->get_all_player();
        $view_data['vdata'] = array('players'=> $records);
        $this->load->view('sports_player/sportsplayers.php', $view_data);
    }
    function search_players()
    {
        $this->load->model('sports_player');
        $gender1 = $this->input->post('gender1');
        $gender2 = $this->input->post('gender2');
        $sport1 = $this->input->post('sports1');
        $sport2 = $this->input->post('sports2');
        $sport3 = $this->input->post('sports3');
        $sport4 = $this->input->post('sports4');
        $sport5 = $this->input->post('sports5');
        $textsearch = $this->input->post('player_search');
        $records = $this->sports_player->search_player($textsearch,$gender1, $gender2, $sport1, $sport2, $sport3, $sport4, $sport5);
        $view_data['vdata'] = array('players'=> $records);
        $this->load->view('sports_player/sportsplayers.php', $view_data);
    }

}