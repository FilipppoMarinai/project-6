<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    require_once './Classe.php';
    require_once './Alunno.php';

    class AlunniController{
        function index(Request $request, Response $response, $args) {
            $classe = new Classe();
            $response->getBody()->write($classe->getAlunni());
            return $response;
        }

        function show(Request $request, Response $response, $args) {
            $classe = new Classe();
            $name = $args['nome'];
            $alunno = $classe->search($name, false);

            if($alunno == null){
                $response->getBody()->write("Alunno non presente");
                return $response->withStatus(404);
            }
            else{
                $response->getBody()->write($alunno->display());
                return $response->withStatus(200);
            }
        
        }

        function updateAlunno(Request $request, Response $response, $args){
            $classe = new Classe();
            $nome = $args['nome'];

            if($nome == null){
                $response->getBody()->write(json_encode(["result" => false, "Error" => "parametro 'nome' non inserito"], JSON_PRETTY_PRINT));
                return $response->withStatus(404);
            }
            else{
                $body = $request->getBody()->getContents();
                $parsedBody = json_decode($body, true);
                $name = $parsedBody['name'];
                $alunno = $classe->search($nome, false);

                if($alunno == null){
                    $response->getBody()->write(json_encode(["result" => false, "Error" => "Alunno non presente"], JSON_PRETTY_PRINT));
                    return $response->withStatus(404);
                }
                else{
                    $alunno->setName($name);

                    $response->getBody()->write("Nome dell'alunno aggiornato con successo: " . $alunno->display());
                    return $response->withStatus(200);
                }
            }
        }

        function createAlunno(Request $request, Response $response, $args){
            $classe = new Classe();

            $body = $request->getBody()->getContents();
            $parsedBody = json_decode($body, true);
            $nome = $parsedBody['name'];
            $cognome = $parsedBody['surname'];
            $eta = $parsedBody['age'];

            $alunno = new Alunno($nome, $cognome, $eta);

            $response->getBody()->write(json_encode($alunno));
            return $response->withStatus(201);
        }

        function remove(Request $request, Response $response, $args){
            $classe = new Classe();
            $nome = $args['nome'];

            if($nome == null){
                $response->getBody()->write(json_encode(["Result" => false, "Error" => "Parametro nome non inserito"], JSON_PRETTY_PRINT));
                return $response->withStatus(404);
            }
            else{
                $classe = new Classe();
                $alunno = $classe->search($nome, false);

                if($alunno == null){
                    $response->getBody()->write(json_encode(["Result" => false, "Error" => "Alunno non presente"], JSON_PRETTY_PRINT));
                    return $response->withStatus(404);
                }
                else{

                    $response->getBody()->write(json_encode(["Result" => true], JSON_PRETTY_PRINT));
                    return $response->withStatus(200);
                }
                
            }
            
        }
    }
?>