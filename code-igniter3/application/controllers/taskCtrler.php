<?php
defined('BASEPATH') or exit('No direct script access allowed');

class taskCtrler extends CI_Controller
{
    public function raffle_draw()
    {
        $random = rand(1000000, 9999999);
        if ($this->input->post('reset') === "TRUE") {
            $this->input->post('reset', "FALSE");
            $this->session->unset_userdata('first_run');
            session_destroy();
        }
        if (empty($this->session->userdata('first_run'))) {
            $view_data['vdata'] = array('claim_count' => 0, 'randcode' => $random);
            $this->session->set_userdata('first_run', 1);
            $this->load->view('Raffle Draw/raffle_draw', $view_data);
        } else {
            $new_count = $this->input->post('count');
            $new_count = $new_count + 1;
            $view_data['vdata'] = array('claim_count' => $new_count, 'randcode' => $random);
            $this->load->view('Raffle Draw/raffle_draw', $view_data);
        }
    }
    /* for moneybutton game */
    public function moneybuttongame()
    {
        if ($this->input->post('reset') === "Reset Game" and !isset($first_run)) {
            unset($first_run);
            $this->session->unset_userdata('money');
            $this->session->unset_userdata('chance');
            $this->session->unset_userdata('no_chance');
        }
        if (!isset($first_run) and empty($this->input->post('bets'))) {
            $first_run = true;
            $this->session->set_userdata('money', 500);
            $this->session->set_userdata('chance', 10);
            $this->session->set_userdata('history', array());
            $this->load->view('Money Button Game/moneybuttongame');
        }
        if (!empty($this->input->post('bets'))) {
            /* updates the money */
            if ($this->session->userdata('chance') === 0) {
                $this->session->set_userdata('no_chance', 0);
                $this->load->view('Money Button Game/moneybuttongame');
            } else {

                $random = rand(intval($this->input->post('range1')), intval($this->input->post('range2')));
                $cur_money = $this->session->userdata('money');
                $new_money = $cur_money + $random;
                $this->session->set_userdata('money', $new_money);
                /* updates the chance */
                $cur_chance = $this->session->userdata('chance');
                $new_chance = $cur_chance - 1;
                $this->session->set_userdata('chance', $new_chance);
                /* Applying bet type */
                $risk = $this->input->post('bets');
                /* Adding previous bet to array */
                $cur_history = $this->session->userdata('history');
                if ($random > 0) {
                    $cur_history[] = array('color' => 'blue', 'rng' => $random, 'money' => $new_money, 'risk' => $risk, 'chance' => $new_chance);
                } else {
                    $cur_history[] = array('color' => 'red', 'rng' => $random, 'money' => $new_money, 'risk' => $risk, 'chance' => $new_chance);
                }
                $this->session->set_userdata('history', $cur_history);

                $this->load->view('Money Button Game/moneybuttongame');
            }
        }
    }
    /* for Bookmark */
    public function viewbookmarks()
    {
        $this->output->enable_profiler(TRUE);
        $this->load->model('bookmark');
        $bookmarks = $this->bookmark->get_all_bookmark();
        $view_data['vdata'] = array('bookmarks' => $bookmarks);
        $this->load->view('Bookmarks/bookmarks', $view_data);
    }
    public function add_bookmarks()
    {
        $this->load->model('bookmark');
        $name = $this->input->post('Name');
        $url = $this->input->post('URL');
        $folder = $this->input->post('folder');
        $this->bookmark->add_bookmark($name, $url, $folder);
        /* var_dump($inputdata); */
        redirect('/bookmarks');
    }
    public function delete_bookmarks()
    {
        $del_id = $this->input->post('delete_id');
        $del_name = $this->input->post('delete_name');
        $del_folder = $this->input->post('delete_folder');
        $del_url = $this->input->post('delete_url');
        $view_data['vdata_del'] = array('delete_id' => $del_id, 'delete_name' => $del_name, 'delete_folder' => $del_folder, 'delete_url' => $del_url,);
        $this->load->view('Bookmarks/del_marks', $view_data);
    }
    public function confirm_delete()
    {
        $this->load->model('bookmark');
        if ($this->input->post('choise') === "Yes") {
            $del_id = $this->input->post('del_id');
            $this->bookmark->delete_bookmark_by_id($del_id);
            redirect('/bookmarks');
        } elseif ($this->input->post('choise') === "No") {
            redirect('/bookmarks');
        }
    }
    /* Phonebook */
    public function phonebook()
    {
        $this->load->model('phonebook');
        $records = $this->phonebook->show_phonebook();
        $view_data['phonerecords'] = array('phonerecords' => $records);
        $this->load->view('phonebook/phonebooks', $view_data);
    }
    public function pb_choice()
    {
        $choice = $this->input->post('action_rec');
        $name = $this->input->post('action_name');
        $contact = $this->input->post('action_contact');
        $id = $this->input->post('action_id');
        $place = $this->input->post('action_place');
        $view_data['rec_choice'] = array('name' => $name, 'contact' => $contact, 'id' => $id, 'place' => $place);
        /* var_dump($choice); */
        if ($choice === 'Show') {
            $this->load->view('phonebook/specificpbooks', $view_data);
        } elseif ($choice === 'Edit') {
            $this->load->view('phonebook/edit', $view_data);
        } elseif ($choice === 'Go Back') {
            redirect('phonebook');
        } elseif ($choice === 'Add new contact') {
            $this->load->view('phonebook/add');
        } elseif ($choice === 'Delete') {
            $del_id = $this->input->post('action_id');
            $this->session->set_flashdata('del_id', $del_id);
            redirect('phonebook/delete');
        }
    }
    public function pb_edit()
    {
        $edit_id = $this->input->post('action_id');
        $edit_name = $this->input->post('edit_name');
        $edit_contact = $this->input->post('edit_contact');
        $this->load->model('phonebook');
        $this->phonebook->edit_phonebook($edit_id, $edit_name, $edit_contact);
        redirect('phonebook');
    }
    public function pb_del()
    {
        $del_id = $this->session->flashdata('del_id');
        $this->load->model('phonebook');
        $this->phonebook->del_phonebook($del_id);
        redirect('phonebook');
    }
    public function pb_add()
    {
        $add_contact = $this->input->post('add_contact');
        $add_name = $this->input->post('add_name');
        $this->load->model('phonebook');
        $this->phonebook->add_phonebook($add_name, $add_contact);
        redirect('phonebook');
    }
    /* Authentication 2 */
    public function authentications()
    {
        $this->load->model('authentication');
        $this->load->library("form_validation");
        $custom_error = array('is_unique' => '{field} is already in use', 'required' => '{field} is required.');
        $this->form_validation->set_rules("first_name", "First Name", "trim|required|min_length[2]", $custom_error);
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required|min_length[2]", $custom_error);
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[authentication2.email]", $custom_error);
        $this->form_validation->set_rules("contact", "Contact Number", "trim|required|numeric|is_unique[authentication2.contact]", $custom_error);
        $this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]", $custom_error);
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required|matches[password]", $custom_error);
        /* Register */
        if ($this->form_validation->run() === FALSE) {
            $view_data["vdata"] = array('register_status' => FALSE);
            $this->load->view('authentication/authentications', $view_data);
        } else {
            /* If no errors Will Register account */
            $view_data["vdata"] = array('register_status' => TRUE);
            $this->load->view('authentication/authentications', $view_data);
            $fname = $this->input->post('first_name');
            $lname = $this->input->post('last_name');
            $email = $this->input->post('email');
            $contact = $this->input->post('contact');
            $password = $this->input->post('password');
            $this->authentication->register($fname, $lname, $email, $password, $contact);
        }
    }
    public function login()
    {
        $this->load->model('authentication');
        $input_email = $this->input->post('email');
        $input_password = $this->input->post('password');
        $infos = $this->authentication->authenticate_acc($input_email);
        if (empty($infos[0])) {
            $view_data["vdata"] = array('register_status' => TRUE);
            $this->session->set_userdata('login_status', 'no account');
            redirect('authentication');
        } else {
            $acc_pass = $infos[0]['password'];
            if ($input_password == $acc_pass) {
                $view_data['vdata'] = array('acc_info' => $infos);
                $this->load->view('authentication/logged_in',$view_data);
            } else {
                $this->authentication->failed_login($input_email, $input_password);
                $this->session->set_userdata('login_status', 'no password');
                redirect('authentication');
            }
        }
    }
    public function logout(){
        session_destroy();
        redirect('authentication');
    }
}
