<?php
/**
 * A sample data object for user by Junction.
 * 
 * <p>This is a very simple data object which only has getters and
 * setters for the properties defined in the Schema/JunctionUser.xml
 * mapping file.
 */
class JunctionUser {
        
        private $_id;
        
        private $_email;
        
        private $_password;
        
        private $_created;
        
        public function __construct() {
        
        }
        
        public function getId() {
                return $this->_id;
        }
        
        public function setId($id) {
                $this->_id = $id;
        }
        
        public function getEmail() {
                return $this->_email;
        }
        
        public function setEmail($email) {
                $this->_email = $email;
        }
        
        public function getPassword() {
                return $this->_password;
        }
        
        public function setPassword($password) {
                $this->_password = $password;
        }
        
        public function getDate() {
                return $this->_created;
        }
        
        public function setDate($date) {
                $this->_created = $date;
        }
}
?>