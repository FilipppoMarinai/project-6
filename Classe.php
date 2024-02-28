<?php
    require "./Alunno.php";

    class Classe implements JsonSerializable{
        private $alunni;

        public function Classe(){
            $alunno1 = new Alunno("Marco", "Rossi", 32);
            $alunno2 = new Alunno("Luca", "Verdi", 44);
            $alunno3 = new Alunno("Paolo", "Bianchi", 23);
            $alunno4 = new Alunno("Marco", "Viola", 45);
            $this->alunni = array($alunno1, $alunno2, $alunno3, $alunno4);
        }

        public function search($name, $isJson){
            $a;
            foreach($this->alunni as $alunno){
                if(strtolower($alunno->getName()) == strtolower($name)){
                    if($isJson){
                        $a = [
                            "name" => $alunno->getName(),
                            "surname" => $alunno->getSurname(),
                            "age" => $alunno->getAge()
                        ];
                    }
                    else{
                        $a = $alunno->display();
                    }
                    
                    break;
                }
            }
            return $a;
        }

        public function getAlunni(){
            $string = "";
            foreach($this->alunni as $alunno){
                $string .= $alunno->display();
            }
            return $string;
        }

        public function jsonSerialize(){
            $a = [
                "alunni" => $this->alunni
            ];

            return $a;
        }
    }
?>