<?php
  session_start();
  if(isset($_SESSION["email"]))
  {
    $email = $_SESSION["email"];
    include("../con_db.php");
    $consulta = "SELECT * FROM persona WHERE email = '$email'";
    $resul = mysqli_query($conex, $consulta);
    $filas = mysqli_fetch_row($resul);
  }
  else
  {
    header("location:./../login.php");
  }

  $id = $_GET["id"];


require './vendor/autoload.php';
ob_start();


?>

<html>
  <head>
  <meta charset="utf-8">
</head>

<body>
  <div>
    <table width="100%">
      <tr>
        
        <td width="120px">
          <img align="left" src="https://www.encb.ipn.mx/assets/files/encb/img/escudos/logo-ipn.png" width="115px" height="120px">
        </td>

        <td width="120px">
          <img align="right" src="https://www.escom.ipn.mx/images/conocenos/escudoESCOM.png" width="118px">
        </td>

      </tr>

      <tr>

        <td colspan="2">
          <br>
          <center><h1>INSTITUTO POLITÉCNICO NACIONAL</h1></center>
        </td>

      </tr>
     
      <tr>
     
        <td colspan="2">
          <br>
          <center><h2> ESCUELA SUPERIOR DE CÓMPUTO </h2></center>
        </td>
     
      </tr>
    </table>
  </div>

  <div>
    <p>
      Acuse de recibo
    </p>
    <p>
      Su documento subido ha sido recibido con el siguiente folio:
      <?php
        //Consulta para obtener el id de la tabla tesis
        //imprimir id con strong
        echo "<strong>".$id."</strong>";
      ?> <br>
      Muchas gracias por su colaboración.
      <br>
  </div>
  <br><br>
  <center><img src="https://images.emojiterra.com/google/android-11/share/1f44c.jpg" width="357px"></center>

  <p>
    ¡La tecnica al servicio de la patria!
  </p>

</html>

<?php

$html = ob_get_clean();
use Dompdf\Dompdf;
use Dompdf\Options;
//$dompdf = new DOMPDF(array('enable_remote' => true));
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->load_html($html);
$dompdf->render(); 
$output = $dompdf->output();
file_put_contents('Comprobante.pdf', $output);
//$dompdf->stream("Comprobante.pdf", array('Attachment'=>'true'));



// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './phpmailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'danimoncruz41@gmail.com';                     // SMTP username
    $mail->Password   = 'Omarmoreno1$';                               // SMTP password
    
    

    //Recipients
    $mail->setFrom('danimoncruz41@gmail.com', 'ESCOMUNIDAD');
    $mail->addAddress($email);               // Name is optional

    // Attachments
    $mail->addAttachment('Comprobante.pdf');         // Add attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Acuse de recibo';
    $mail->Body    = '<b>No olvides guar este documento porque en él está tu folio.</b>';

    $mail->send();
} catch (Exception $e) {
    //alerta con el error
    echo "<script>alert('Error al enviar el correo, intenta de nuevo.');</script>";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo '<script>window.location.href="./index.php";</script>';



?>