<?php

    require('./vendor/autoload.php');

    //Variables para sparkpost.
    use SparkPost\SparkPost;
    use GuzzleHttp\Client;
    use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
    
    //Api key.
    $key = "485467f9a14764c703f3ae4dc6470ffa20f8cd65";

    //Creamos un request.
    $httpClient = new GuzzleAdapter(new Client());

    //Cremos el objeto sparkpost con el api key.
    $parky = new SparkPost($httpClient,["key" => $key]);

    //Definimos el name y el id del template.
    $tamplate = "test template";
    $template_id = "test_template";

    $dominio = "sparkpostbox.com";

    //Template en text plain.
    $plain_text = "Prueba";

    $html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<body>
  <p><strong>Ejemplo de template en sparkpost.</strong></p>
</body>
</html>
HTML;

    $amp_html = <<<HTML
<!doctype html>
<html ⚡4email>
<head>
  <meta charset="utf-8">
  <style amp4email-boilerplate>body{visibility:hidden}</style>
  <script async src="https://cdn.ampproject.org/v0.js"></script>
</head>
<body>
Hello World! Let's get started using AMP HTML together!
</body>
</html>
HTML;

    $create = $parky->request('POST', 'templates', [
        'name' => $tamplate,
        'id' => $template_id,
        'content' => [
        'from' => "from@$dominio",
        'subject' => 'Test',
        'text' => $plain_text,
        'html' => $html,
        'amp_html' => $amp_html,
        ],
    ]);
  
    try {
        $response = $create->wait();
        echo $response->getStatusCode()."\n";
        print_r($response->getBody())."\n";
    } catch (\Exception $e) {
        echo $e->getCode()."\n";
        echo $e->getMessage()."\n";
    }



?>