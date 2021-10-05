<?php

    require('./vendor/autoload.php');

    //Variables para sparkpost.
    use SparkPost\SparkPost;
    use GuzzleHttp\Client;
    use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

use function Composer\Autoload\includeFile;

//Api key.
    $key = "b2df037e84a6b87846c474913499000973520c6d";

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
                    
                     
               
                
               // $imag= $usuario->documento;
                //echo"<img src=$imag alt=''width='50%' height='50%' >"; 
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
                     <p>  <img src=unodepiera.png alt=unodepiera/> </p></body></html>',
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