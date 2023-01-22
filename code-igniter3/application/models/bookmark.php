<?php
class bookmark extends CI_Model
{
    function add_bookmark($bm_name, $bm_url, $bm_folder)
    {
        $query = "INSERT INTO bookmark(Name,URL,folder,created_at,updated_at) VALUES(?,?,?,?,?)";
        $values = array($bm_name, $bm_url, $bm_folder,date("Y-m-d, H:i:s"),date("Y-m-d, H:i:s"));
        $this->db->query($query,$values);
    }
    function get_all_bookmark()
    {
        return $this->db->query("SELECT bookmark_id,folder, name, URL FROM bookmark")->result_array();
    }
    function delete_bookmark_by_id($bookmark_id)
    {
        $query = "DELETE FROM bookmark WHERE bookmark_id = ?";
        $value = array($bookmark_id);
        $this->db->query($query,$value);
    }
}
