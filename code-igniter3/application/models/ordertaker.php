<?php
class ordertaker extends CI_Model
{
    function show_orders()
    {
        return $this->db->query("SELECT * FROM ordertaker")->result_array();
    }
    function add_order($order_msg)
    {
        $query = 'INSERT INTO `codeigniter`.`ordertaker`(`order_msg`,`created_at`,`updated_at`)VALUES(?,?,?);';
        $value = array($order_msg, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        $this->db->query($query, $value);
    }
}
?>