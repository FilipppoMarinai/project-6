<?php
    require "./Alunno.php";

    class Classe{
        private $alunni;

        public function Classe(){
            $alunno1 = new Alunno("Marco", "Rossi", 32);
            $alunno2 = new Alunno("Luca", "Verdi", 44);
            $alunno3 = new Alunno("Paolo", "Bianchi", 23);
            $alunno4 = new Alunno("Marco", "Viola", 45);
            $this->alunni = array($alunno1, $alunno2, $alunno3, $alunno4);
        }

        public function getAlunni(){
            $ret = array();
            foreach($this->alunni as $alunno){
                $ret[] = ["nome"=>$alunno->getName(), "cognome"=>$alunno->getSurname(), "eta"=>$alunno->getAge()];
            }

            return json_encode($ret, JSON_PRETTY_PRINT);
        }

        public function search($name){
            $isAlunno = false;
            foreach($this->alunni as $alunno){
                if(strtolower($alunno->getName()) == strtolower($name)){
                    echo $alunno->display();
                    $isAlunno = true;
                    break;
                }
            }

            if(!$isAlunno){
                echo "Alunno non presente";
            }
        }
    }
?>