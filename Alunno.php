<?php
    class Alunno{
        protected $name;
        protected $surname;
        protected $age;

        public function Alunno($name, $surname, $age){
            $this->setName($name);
            $this->setSurname($surname);
            $this->setAge($age);
        }

        public function getName(){
            return $this->name;
        }

        public function getSurname(){
            return $this->surname;
        }

        public function getAge(){
            return $this->age;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setSurname($surname){
            $this->surname = $surname;
        }

        public function setAge($age){
            $this->age = $age;
        }

        public function display(){
            return "Name: " . $this->getName() . " Surname: " . $this->getSurname() . " Age: " . $this->getAge() . "<br>";
        }
    }
?>