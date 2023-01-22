<?php
class sports_player extends CI_Model
{
    function get_all_player()
    {
        return $this->db->query("SELECT * FROM sports_player;")->result_array();
    }
    function search_player($textsearch,$gender1,$gender2,$sport1,$sport2,$sport3,$sport4,$sport5)
    {
        if(!str_contains($textsearch, ' ')){
            $fullname = array($textsearch,'');
        } elseif (!empty($textsearch)){
            $fullname = explode(" ",$textsearch);
        } else {
            $fullname = array('','');
        }
        $query ='SELECT * FROM sports_player WHERE gender = ? or gender =  ? or sports = ? or sports = ? or 
        sports = ? or sports = ? or sports = ? or first_name = ? or last_name = ?';
        $values = array($gender1,$gender2,$sport1,$sport2,$sport3,$sport4,$sport5,$fullname[0],$fullname[1]);
        return $this->db->query($query,$values)->result_array();
    }
}