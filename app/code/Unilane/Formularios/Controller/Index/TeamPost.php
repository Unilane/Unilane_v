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

class TeamPost implements HttpPostActionInterface
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
        try {
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
            $nombre        = $_POST['nombre'];
            $correoDestino = $_POST['correo'];
            $telefono      = $_POST['telefono'];
            $area          = $_POST['area'];
            $mensaje       = $_POST['mensaje'];
            $nombreArchivo = $_FILES["archivo"]["name"];
            $rutaTemporal  = $_FILES["archivo"]["tmp_name"];        
            //Recipients
            $mail->setFrom('luis.pruebasqar@outlook.com', 'Unilane');
            $mail->addAddress($correoDestino, $nombre); //Add a recipient        
            //Attachments
            $mail->addAttachment($rutaTemporal,$nombreArchivo);//Add attachments        
            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'únete al equipo unilane';
            $mail->Body    = '                                 
                        <img src="C:\xampp\htdocs\magento\pub\media\wysiwyg\smartwave\porto\homepage\34\unilane.png" alt="Imagen" style="display: block; max-width: 30%;">
                        <br>
                        <br>
                        <p> Nombre del solicitante: '.$nombre.'</p>
                        <p> Telefono: '.$telefono.'</p>
                        <p> Area prometida: '.$area.'</p>
                        <p> Mensaje: '.$mensaje.'</p>';
                        
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
