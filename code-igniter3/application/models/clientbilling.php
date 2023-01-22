<?php
class clientBilling extends CI_Model
{ 
    function get_def_records()
    {
        return $this->db->query("SELECT MONTHNAME(charged_datetime) as month, YEAR(charged_datetime) as year, SUM(amount) as total FROM billing GROUP BY MONTHNAME(charged_datetime)")->result_array();
    }
    function pass_records_to_view()
    {
        $this->load->model('clientBilling');
    }
}
?>