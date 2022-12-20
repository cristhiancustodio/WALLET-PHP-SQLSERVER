<?php 

    class User{
        //Propiedades
        public $id;
        public $user;
        public $password;
        public $name;
        
        function __construct($id,$user,$password,$name)
        {
            //iniciamos las propiedades
            $this->id = $id;
            $this->user = $user;
            $this->password = $password;
            $this->name = $name;
        }
    }

?>