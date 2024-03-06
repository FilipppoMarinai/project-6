<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    require_once './Classe.php';

    class ApiAlunniController{
        function index(Request $request, Response $response, $args) {
            $classe = new Classe();
            $response->getBody()->write(json_encode($classe, JSON_PRETTY_PRINT));
            return $response->withHeader("Content-Type", "application/json")->withStatus(200);
        }

        function show(Request $request, Response $response, $args) {
            $classe = new Classe();
            $name = $args['nome'];
            $alunno = $classe->search($name, true);

            if($alunno == null){
                $response->getBody()->write(json_encode(["Error" => "Alunno non presente"], JSON_PRETTY_PRINT));
                return $response->withHeader("Content-Type", "application/json")->withStatus(404);
            }
            else{
                $response->getBody()->write(json_encode($alunno, JSON_PRETTY_PRINT));
                return $response->withHeader("Content-Type", "application/json")->withStatus(200);
            }
        
        }
    }
?>