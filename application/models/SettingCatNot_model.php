<?php
class SettingCatNot_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function insert_category($user_id, $name, $type) {  
        $data = array(  
            'user_id' => $user_id,  
            'name' => $name,  
            'type' => $type,
            'created_at' => date('Y-m-d H:i:s')
        );  
  
        return $this->db->insert('categories', $data);  
    }  

    public function insert_notification($data) {
        return $this->db->insert('notification_settings', $data);
    }
}
?>