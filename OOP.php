<?php
namespace emad;

    abstract class A {
        
    }
    
    interface B {
        public function function_name($param);
    }
    
    class User extends A implements B {
        static $num = 0;
        private $name;
        private $email;
        private $pass;
        protected $adrs;

        public function __construct($name) {
            $this->setName($name);
            User::$num += 1;
        }
        
        public function __destruct() {
            User::$num -= 1;            
        }
        
        public function getName() {
            return $this->name;
        }
    
        public function getEmail()
        {
            return $this->email;
        }
    
        public function getPass()
        {
            return $this->pass;
        }
    
        public function setName($name)
        {
            $this->name = $name;
        }
    
        public function setEmail($email)
        {
            $this->email = $email;
        }
    
        public function setPass($pass)
        {
            $this->pass = $pass;
        }
        
        public function function_name($param) {
            
        }
    
        
    }
?>

<?php 
    
    $obj = new \emad\User("OBJ1");
    $obj2 = new \emad\User("OBJ2");
    echo $obj->getName();
    echo User::$num;
?>