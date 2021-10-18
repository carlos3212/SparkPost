<?php

    require('./vendor/autoload.php');

    //Variables para sparkpost.
    use SparkPost\SparkPost;
    use GuzzleHttp\Client;
    use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

use function Composer\Autoload\includeFile;

//Api key.
    $key = "be62ef330c0d38d08b6987f792317831dba3bcca";

    //Para envio de correos con template.
    $template_id = "test_template";

    //Correos masivos desde csv.
    $correos_masivos = array();

    //Creamos un request.
    $httpClient = new GuzzleAdapter(new Client());

    //Cremos el objeto sparkpost con el api key.
    $sparky = new SparkPost($httpClient,["key" => $key]);

    
  //Obter id plantilla
  $tipo_campana=($_GET['tipo_campana']);
  $tipo_plantilla=($_GET['tipo_plantilla']);
  $id_envio=($_GET['id_envio']);
  $imagen = "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
  gAAAAArAksAAAAANYEFgAAAABrAgsAAACANYEFAAAAwJrAAgAAAGBNYAEAAACwJrAAAAAAWBNYAAAAAKwJLAAAAADW
  BBYAAAAAawILAAAAgDWBBQAAAMCawAIAAABgTWABAAAAsCawAAAAAFgTWAAAAACsCSwAAAAA1gQWAAAAAGsCCwAAAI
  A1gQUAAADAmsACAAAAYE1gAQAAALAmsAAAAABYE1gAAAAArAksAAAAANYEFgAAAABrAgsAAACANYEFAAAAwJrAAgAA
  AGBNYAEAAACwJrAAAAAAWBNYAAAAAKwJLAAAAADWBBYAAAAAawILAAAAgDWBBQAAAMCawAIAAABgTWABAAAAsCawAA
  AAAFgTWAAAAACsCSwAAAAA1gQWAAAAAGsCCwAAAIA1gQUAAADAmsACAAAAYE1gAQAAALAmsAAAAABYE1gAAAAArAks
  AAAAANYEFgAAAABrAgsAAACANYEFAAAAwJrAAgAAAGBNYAEAAACwJrAAAAAAWBNYAAAAAKwJLAAAAADWBBYAAAAAaw
  ILAAAAgDWBBQAAAMCawAIAAABgTWABAAAAsCawAAAAAFgTWAAAAACsCSwAAAAA1gQWAAAAAGsCCwAAAIA1gQUAAADA
  msACAAAAYE1gAQAAALAmsAAAAABYE1gAAAAArAksAAAAANYEFgAAAABrAgsAAACANYEFAAAAwJrAAgAAAGBNYAEAAA
  CwJrAAAAAAWBNYAAAAAKwJLAAAAADWBBYAAAAAawILAAAAgDWBBQAAAMCawAIAAABgTWABAAAAsCawAAAAAFgTWAAA
  AACsCSwAAAAA1gQWAAAAAGsCCwAAAIA1gQUAAADAmsACAAAAYE1gAQAAALAmsAAAAABYE1gAAAAArAksAAAAANYEFg
  AAAABrAgsAAACANYEFAAAAwJrAAgAAAGBNYAEAAACwJrAAAAAAWBNYAAAAAKwF+E5/4W1esxIAAAAASUVORK5CYII=";
  
    
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
                    'html' => '<html><body>' .$usuario->mensaje.'</p>
                     <p> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA4QAAAFKCAIAAADKUQaBAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUA
                     AAAJcEhZcwAADsMAAA7DAcdvqGQAAP+lSURBVHhepP1p32zb
                     </p>
                     </body></html>',
                    'text' => 'Congratulations, {{name}}! You just sent your very first mailing!'
                      
                    ] 
                    
                
           
            ]);
            
        }
            

          
            try {
                //Creamos el response.
                $response = $create->wait();
                echo $response->getStatusCode()."\n";
                print_r($response->getBody())."\n";
                echo("MENSAJE ENVIADO CON EXITO")."\n";
                header("Location: envioMensaje.php");

            } catch (\Exception $e) {
                print("Error");
                echo $e->getCode();
                echo $e->getMessage();
            
            }

     


?>