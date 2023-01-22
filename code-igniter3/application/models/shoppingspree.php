<?php
class shoppingspree extends CI_Model
{
    public function get_items()
    {
        return $this->db->query("SELECT * FROM shopp")->result_array();
    }
    public function get_cart_quantity()
    {
        return $this->db->query("SELECT sum(quantity) as cart_quantity FROM cart_id1;")->result_array();
    }
    public function get_cart()
    {
        return $this->db->query("SELECT * FROM cart_id1")->result_array();
    }
    public function get_cart_items()
    {
        return $this->db->query("SELECT shopp.item_id,shopp.item_name,shopp.item_price,cart_id1.quantity FROM shopp INNER JOIN cart_id1 ON shopp.item_id = cart_id1.item_id")->result_array();
    }
    public function buy_item($item_id, $item_quantity)
    {
        $query = "INSERT INTO `cart_id1`(`item_id`,`quantity`,`created_at`,`updated_at`)VALUES(?,?,?,?)";
        $values = array($item_id, $item_quantity, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
        $this->db->query($query, $values);
    }
    public function item_add_quantity($item_id, $new_quantity)
    {
        $query = "UPDATE cart_id1 SET quantity = ? WHERE item_id = ?";
        $values = array($new_quantity, $item_id);
        $this->db->query($query, $values);
    }

    public function remove_item_oncart($cart_item_id)
    {
        $query = "DELETE FROM cart_id1 WHERE item_id = ?";
        $value = array($cart_item_id);
        $this->db->query($query, $value);
    }
}
