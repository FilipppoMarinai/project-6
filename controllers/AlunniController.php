<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    require_once './Classe.php';

    class AlunniController{
        function index(Request $request, Response $response, $args) {
            $classe = new Classe();
            $response->getBody()->write($classe->getAlunni());
            return $response;
        }

        function show(Request $request, Response $response, $args) {
            $classe = new Classe();
            $name = $args['nome'];

            if($classe->search($name, false) == null){
                $response->getBody()->write("Alunno non presente");
                return $response->withStatus(404);
            }
            else{
                $response->getBody()->write($classe->search($name, false));
                return $response->withStatus(200);
            }
        
        }
    }
?>