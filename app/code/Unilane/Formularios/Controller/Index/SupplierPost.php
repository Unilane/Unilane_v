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

class SupplierPost implements HttpPostActionInterface
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
            //INFORMACION DE LA EMPRESA
            $nombreRazon = $_POST['nombrerazon'];
            $sitioweb    = $_POST['sitioweb'];
            $sku         = $_POST['sku'];
            $productos   = $_POST['productos'];
            $marcas      = $_POST['marcas'];
            $ubicacion    = $_POST['ubicacion'];
            //INFORMACION DE CONTACTO
            $nombre           = $_POST['nombre'];
            $apellidos        = $_POST['apellidos'];
            $telefonoContacto = $_POST['telefonoContacto'];
            $extension        = $_POST['extension'];
            $correo           = $_POST['correo'];
            //Recipients
            $mail->setFrom('luis.pruebasqar@outlook.com', 'Unilane');
            $destinatarios = [
                'luis.pruebasqar@outlook.com' => 'Unilane',
                $correo => $nombre.' '.$apellidos
            ];
            foreach ($destinatarios as $email => $nombre) {
                $mail->addAddress($email, $nombre);
            }           
            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'QUIERO SER PROVEEDOR EN UNILANE';
            $mail->Body    = '                                 
                        <img src="C:\xampp\htdocs\magento\pub\media\wysiwyg\smartwave\porto\homepage\34\unilane.png" alt="Imagen" style="display: block; max-width: 30%;">
                        <br>
                        <br>
                        <h3> INFORMACION DE LA EMPRESA </h3>
                        <p> <strong>Nombre o Razon social:</strong> '.$nombreRazon.'</p>
                        <p> <strong>Nombre del sitio web de la empresa:</strong> '.$sitioweb.'</p>
                        <p> <strong>cantidad de SKU de los productos de la empresa:</strong> '.$sku.'</p>
                        <p> <strong>Productos de la empresa:</strong> '.$productos.'</p>
                        <p> <strong>Marcas de la empresa:</strong> '.$marcas.'</p>
                        <p> <strong>Ubicacion de la empresa:</strong> '.$ubicacion.'</p>
                        <hr>
                        <h3> INFORMACION DEL CONTACTO </h3>                        
                        <p> <strong>Nombre del solicitante:</strong> '.$nombre.'</p>
                        <p> <strong>Telefonodel solicitante:</strong> '.$telefonoContacto.'</p>
                        <p> <strong>Extension del numero de telefono del solicitante:</strong> '.$extension.'</p>
                        <p> <strong>Correo del solicitante:</strong> '.$correo.'</p>';
                        
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
