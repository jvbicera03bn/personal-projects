<?php
class authentication extends CI_Model
{
    function register($fname,$lname,$email,$password,$contact)
    {
        $query = "INSERT INTO authentication2(`password`,`first_name`,`last_name`,`email`,`contact`,`updated_at`,`created_at`)VALUES(?,?,?,?,?,?,?)";
        $values = array($password, $fname, $lname, $email, $contact, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        $this->db->query($query, $values);
    }
    function get_all_account()
    {
        return $this->db->query("SELECT * FROM authentication2")->result_array();
    }
    function authenticate_acc($email_contact)
    {
        return $this->db->query("SELECT * FROM authentication2 Where email = '$email_contact' or contact = '$email_contact';")->result_array();
    }
    function failed_login($email_contact)
    {
        $query = "UPDATE authentication2 SET failed_log_in = '?' WHERE email = '?' or contact = '?'";
        $values = array(date("Y-m-d, H:i:s"), $email_contact, $email_contact);
        $this->db->query($query, $values);
    }
}
