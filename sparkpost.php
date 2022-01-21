<?php

    require('./vendor/autoload.php');

    //Variables para sparkpost.
    use SparkPost\SparkPost;
    use GuzzleHttp\Client;
    use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

    //Api key.
    $key = "f3f40c35750a5bce7ce337a3bf3af6be4877074a";

    //Para envio de correos con template.
    $template_id = "test_template";

    //Correos masivos desde csv.
    $correos_masivos = array();

    //Creamos un request.
    $httpClient = new GuzzleAdapter(new Client());

    //Cremos el objeto sparkpost con el api key.
    $sparky = new SparkPost($httpClient,["key" => $key]);

   //pasamors parametros de envio base
   $tipo_campana=($_GET['tipo_campana']);
   $tipo_plantilla=($_GET['tipo_plantilla']);
   $id_envio=($_GET['id_envio']);

   // Obtenmos la clase config base de datos
   //Base usuarios
   include_once "./config/base_de_datos.php";
        
   $sentencia = $base_de_datos->query("Select campana.nombre_campana,
   plantilla.titulo,plantilla.asunto,plantilla.mensaje,plantilla.documento,
   usuarios.nombre, usuarios.correo, envio.id_envio, 
   envio.tipo_campana, envio.tipo_plantilla
   From campana, plantilla, usuarios, envio
   Where envio.id_envio = $id_envio and campana.id_campana = $tipo_campana
   and plantilla.id_plantilla = $tipo_plantilla and usuarios.plantilla = $tipo_plantilla");
   $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);   

   foreach($usuarios as $usuario ){
    $data = [
        'address' => [
            'name' => $usuario->nombre ,
            'email' =>  $usuario->correo
        ],
        'metadata' => [
            'name' => $usuario->nombre 
        ]
    ];
    
    array_push($correos_masivos, $data);
} 

               //Creamos el envio de correos.
            foreach($usuarios as $usuario){
                    
                $create = $sparky->transmissions->post([
                             
               'content' => [
                        'from' => [
                            'name' => $usuario->titulo,
                            'email' => "soporte@spark.crmmelendez.com",
                        ],
                        'subject' => $usuario->asunto,
                        'html' => '<html><body><h1><p>' .$usuario->mensaje.'</p></body></html>',
                        'text' => 'Congratulations, {{name}}! You just sent your very first mailing!',
                    ],
                    'substitution_data' => ['name' => 'YOUR_FIRST_NAME'],
                    'recipients' => $correos_masivos
            ]);

            try {
                //Creamos el response.
                $response = $create->wait();
                echo $response->getStatusCode()."\n";
                print_r($response->getBody())."\n";

            } catch (\Exception $e) {
                echo $e->getCode();
                echo $e->getMessage();
            
            }

        }


?>