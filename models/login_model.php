<?php
class login_model extends Model {
    public function __construct() {
        parent::__construct(); 
    }

    function loginDo($account, $password) {
        $sth = $this->db->prepare("SELECT id FROM  account WHERE account = :account AND password = MD5(:password)");
        $sth->execute(array(
            ":account"  => $account,
            ":password" => $password
        ));

        $count = $sth->rowCount();
        if($count > 0) {
            return TRUE;
        }
        else {
            return FALSE; 
        }
                
    }
}
