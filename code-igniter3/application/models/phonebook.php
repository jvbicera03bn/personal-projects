<?php
class phonebook extends CI_Model
{
    function show_phonebook()
    {
        return $this->db->query("SELECT name, contact_number, phonebook_id FROM phonebook")->result_array();
    }
    function del_phonebook($id)
    {
        $query = "DELETE FROM phonebook WHERE phonebook_id = ?";
        $value = array($id);
        $this->db->query($query, $value);
    }
    function add_phonebook($pb_name,$pb_contact)
    {
        $query = "INSERT INTO phonebook(name,contact_number,created_at,updated_at) VALUES(?,?,?,?)";
        $values = array($pb_name, $pb_contact, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        $this->db->query($query, $values);
    }
    function edit_phonebook($pb_id,$pb_name,$pb_contact)
    {
        $query = "UPDATE phonebook SET name = ?, contact_number = ? WHERE phonebook_id = ?";
        $values = array($pb_name, $pb_contact, $pb_id);
        $this->db->query($query, $values);
    }
}
