<?php

class License{
    public $id;
    public $email;    
    public $name;
    public $registered;
    public $status;
    public $groupId;
    
    public function __construct($id, $email, $name, $registered, $status = null, $groupId, $displayName = ''){
        $this->id = $id;        
        $this->email = $email;        
        $this->name = $name;
        $this->registered = $registered;
        $this->status = $status;
        $this->groupId = $groupId;
        if($displayName) {
            $this->displayName = $displayName;
        } else {
            $this->displayName = substr($name, 0, 14);
        }

    }
    
    public function isNew(){
        try{
            if($this->id == null){
                return true;
                echo "true";
            }else{
                return false;
                echo "false";
            }   
        }catch(Exception $e){
            error_log("Error - trackknack_" . $_SESSION['db'] . " - isNew(): ". print_r($e, true));
        }
    }
    
}
?>
