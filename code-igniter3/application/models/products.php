<?php
class products extends CI_Model
{
    public function getProduct()
    {
        return $this->db->query("SELECT * FROM products")->result_array();
    }
    public function searchItem_bycategory($category)
    {
        $query = "SELECT * FROM products WHERE product_category = ? ";
        $values = array( $category); 
        return $this->db->query($query, $values)->result_array();
    }
    public function searchItem_byname($keyword)
    {
        $query = "SELECT * FROM products WHERE product_name = ?";
        $values = array($keyword);
        return $this->db->query($query, $values)->result_array();
    }
}