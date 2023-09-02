<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Unilane\Formularios\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Contact\Model\ConfigInterface;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\DataObject;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class InvoicePost implements HttpPostActionInterface
{
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var Context
     */
    private $context;

    /**
     * @var MailInterface
     */
    private $mail;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param Context $context
     * @param ConfigInterface $contactsConfig
     * @param MailInterface $mail
     * @param DataPersistorInterface $dataPersistor
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        ConfigInterface $contactsConfig,
        MailInterface $mail,
        DataPersistorInterface $dataPersistor,
        LoggerInterface $logger = null
    ) {
        $this->context = $context;
        $this->mail = $mail;
        $this->dataPersistor = $dataPersistor;
        $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
    }

    /**
     * Post user question
     *
     * @return Redirect
     */
    public function execute()
    {
        try{
         /**
             * @var mail
             */
            $mail = new PHPMailer(true);
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'luis.pruebasqar@outlook.com';                     //SMTP username
            $mail->Password   = 'D11DB6B02A.123';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = '587';
            //Datos de facturación 
            $foliopedido   = $_POST['foliopedido'];
            $razonsocial   = $_POST['razonsocial'];
            $fisicamoral   = $_POST['fisicamoral'];
            $rfc           = $_POST['rfc'];
            $regimenfiscal = $_POST['regimenfiscal'];
            $cfdi          = $_POST['cfdi'];
            //Domicilio Fiscal 
            $calle        = $_POST['calle'];
            $noexterno    = $_POST['noexterno'];
            $nointerno    = $_POST['nointerno'];
            $colonia      = $_POST['colonia'];
            $ciudad       = $_POST['ciudad'];
            $municipio    = $_POST['municipio'];
            $estado       = $_POST['estado'];
            $codigopostal = $_POST['codigopostal'];
            //Datos de contacto
            $telefono   = $_POST['telefono'];
            $correoelec = $_POST['correoelec'];
            //Archivo
            $nombreArchivo = $_FILES["archivo"]["name"];
            $rutaTemporal  = $_FILES["archivo"]["tmp_name"];
            //Attachments
            $mail->setFrom('luis.pruebasqar@outlook.com', 'Unilane');
            $destinatarios = [
                'luis.pruebasqar@outlook.com' => 'Unilane',
                $correoelec => "A quien corresponda"
            ];
            foreach ($destinatarios as $email => $nombre) {
                $mail->addAddress($email, $nombre);
            }
            if($nombreArchivo !=""){
                $mail->addAttachment($rutaTemporal,$nombreArchivo);//Add attachments
            }
            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'QUIERO SER PROVEEDOR EN UNILANE';
            $mail->Body    = '                                 
                        <img src="C:\xampp\htdocs\magento\pub\media\wysiwyg\smartwave\porto\homepage\34\unilane.png" alt="Imagen" style="display: block; max-width: 30%;">
                        <br>
                        <br>
                        <h3> Datos de facturación </h3>
                        <p> <strong>Folio Pedido o No. Orden:</strong> '.$foliopedido.'</p>
                        <p> <strong>Razón Social:</strong> '.$razonsocial.'</p>
                        <p> <strong>Persona Física o Moral:</strong> '.$fisicamoral.'</p>
                        <p> <strong>RFC:</strong> '.$rfc.'</p>
                        <p> <strong>Regimen Fiscal:</strong> '.$regimenfiscal.'</p>
                        <p> <strong>Uso de CFDI:</strong> '.$cfdi.'</p>
                        <hr>
                        <h3> Datos de contacto </h3>                        
                        <p> <strong>Calle del domicilio:</strong> '.$calle.'</p>
                        <p> <strong>Número Externo:</strong> '.$noexterno.'</p>
                        <p> <strong>Colonia:</strong> '.$nointerno.'</p>
                        <p> <strong>Municipio:</strong> '.$colonia.'</p>
                        <p> <strong>Ciudad:</strong> '.$ciudad.'</p>
                        <p> <strong>Estado:</strong> '.$estado.'</p>
                        <p> <strong>Código Postal:</strong> '.$codigopostal.'</p>
                        <hr>
                        <h3> Datos de contacto </h3>                        
                        <p> <strong>Teléfono:</strong> '.$telefono.'</p>
                        <p> <strong>Correo Electrónico:</strong> '.$correoelec.'</p>';                        
            if ($mail->Send())
                 echo "<script>alert('Formulario enviado exitosamente.');</script>";
            else
                 echo "<script>alert('Error al enviar el formulario');</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        //return $this->resultRedirectFactory->create()->setPath('contact/index');
    }
}
