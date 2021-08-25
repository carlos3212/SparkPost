<?php

    require('./vendor/autoload.php');

    //Variables para sparkpost.
    use SparkPost\SparkPost;
    use GuzzleHttp\Client;
    use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

    //Api key.
    $key = "485467f9a14764c703f3ae4dc6470ffa20f8cd65";

    //Para envio de correos con template.
    $template_id = "test_template";

    //Correos masivos desde csv.
    $correos_masivos = array();

    //Creamos un request.
    $httpClient = new GuzzleAdapter(new Client());

    //Cremos el objeto sparkpost con el api key.
    $sparky = new SparkPost($httpClient,["key" => $key]);

    
  //Obter id plantilla
  $id_plantilla = $_POST['id_plantilla'];
  $id_campaña = $_POST['id_campaña'];
    
   // Obtenmos la clase config base de datos
   //Base usuarios
        include_once "./config/base_de_datos.php";
        $sentencia = $base_de_datos->query("Select campana.id_campana, campana.nombre_campana,plantilla.id_plantilla,
        plantilla.titulo,plantilla.asunto,plantilla.mensaje,plantilla.documento,
        usuarios.nombre, usuarios.correo, usuarios.tipo_campana, usuarios.tipo_plantilla
        From campana, plantilla, usuarios
        Where campana.id_campana = $id_campaña and plantilla.id_plantilla = $id_plantilla and usuarios.tipo_campana = $id_campaña and usuarios.tipo_plantilla = $id_plantilla");
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //Obter id plantilla
    //$id -> $usuarios->tipo_plantilla;

    //Base Plantilla
        //$sentenciap = $base_de_datos->query("select id, titulo ,asunto, mensaje from plantilla  WHERE id = $id ");
        //$plantillaP = $sentenciap->fetchAll(PDO::FETCH_OBJ);


                /*
                    'address' => [
                        'name' => $row[0] Nombre del usuario,
                        'email' => $row[1] Correo del ususario
                    ],
                    'metadata' => [
                        'name' => $row[0] Variable a utilizarse en el template html.
                    ]
                */
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
                
                //Sandbox true para pruebas.
                'options' => [
                    'open_tracking' => true,
                    'click_tracking' => true,
                    'sandbox' => true
                ],
                'recipients' => $correos_masivos,
                //From -> email test@sparkpostbox.com para pruebas
                
                'content' => [
        
                    'from' => [
                        'name' => $usuario->titulo,
                        'email' => 'test@sparkpostbox.com'
                    ],
                    'subject' => $usuario->asunto,
                    'html' => '<html><body><h1>Congratulations, {{name}}!</h1>' .$usuario->mensaje.'</p></body></html>',
                    'text' => 'Congratulations, {{name}}! You just sent your very first mailing!'
                ] 
                
           
            ]);
        }
            

          
            try {
                //Creamos el response.
                $response = $create->wait();
                echo $response->getStatusCode()."\n";
                print_r($response->getBody())."\n";
                print("MENSAJE ENVIADO CON EXITO")."\n";

            } catch (\Exception $e) {
                print("Error");
                echo $e->getCode();
                echo $e->getMessage();
            
            }

     


?>