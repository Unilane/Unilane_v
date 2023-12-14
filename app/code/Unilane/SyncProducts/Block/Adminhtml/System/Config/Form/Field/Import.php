<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Unilane\SyncProducts\Block\Adminhtml\System\Config\Form\Field;
use Magento\Backend\Block\Template\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Filesystem\Io\File;
use Magento\Framework\App\ResourceConnection;
use Magento\Sales\Model\OrderFactory;
/**
 * @api
 */
class Import extends \Magento\Config\Block\System\Config\Form\Field
{
    private $productFactory;
    private $productRepository;
    protected $objectManager;
    private File $file;
    protected $orderFactory;
    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        ProductRepositoryInterface            $productRepository,
        File                                  $file,
        OrderFactory $orderFactory,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        array $data = []        
    )
    {
        parent::__construct($context, $data);
        $this->productFactory = $productFactory;
        $this->productRepository = $productRepository;
        $this->file = $file;
        $this->_objectManager = $objectManager;
        $this->orderFactory = $orderFactory;
    }

    /**
     * @inheritdoc
     */
    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {      
        //$connect = $this->connectCT();
        //if($connect){
            $this->importProducts();
        //}        
    }
    
    public function importProducts(){  
        //$this->specs();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $mediaDir = $objectManager->get('Magento\Framework\App\Filesystem\DirectoryList')->getPath('media');
        //CT
        $dataCt  = file_get_contents("C:\Users\luis.olivarria\Desktop\productsjson\dataPrueba.json");
        $productsData  = json_decode($dataCt, true);
        $data = [];
        $noExisten = [];
        foreach($productsData as $key => $productdata){
            try{
                $producto = $this->productRepository->get($productdata['clave']);
            }
            catch(Exception $e){
                $producto = null;
            }
            if($producto == null){                
                array_push($data, $productdata);
            }        
        }
        if($data){
            try {
                foreach($data as $product){
                    $items = $this->productFactory->create();
                    $sumaExistencia = 0;
                    $pro = $product['existencia'];
                    foreach($pro as $existencia){
                        $sumaExistencia += $existencia;
                    }
                    $precioIva = $product['precio'] * 1.16;                
                    $precioivaxtipocambio = $precioIva * $product['tipoCambio'];
                    $precioReal = $precioivaxtipocambio * 1.05;
                    $nombreCategoria = $product['subcategoria'];                    
                    //Funcion que devuele el ID de la subcategoria
                    $Category_Id = $this->getCategoryId($nombreCategoria);
                    if($Category_Id == false){
                        array_push($noExisten,$nombreCategoria.", ");
                        continue;
                    }
                    else{
                        //Funcion que devuelve el Path donde se guardara el producto
                        $path        = $this->getPathWithCategoryId($Category_Id);
                    }
                    //Desgloza las categorias y las almacena en una variable
                    $pathC       = explode("/",$path);
                    $root        = $pathC[1];
                    $category    = $pathC[3];
                    $subcategory = $pathC[4];
                    //Codigo que hace el guardado del producto con la informacion del json de CT
                    $items->setAttributeSetId(4);
                    $items->setName(ucfirst(strtolower($product['nombre']."-".$product['clave'])));
                    $items->setSku($product['clave']);
                    $items->setPrice($precioReal);
                    $items->setVisibility(4);
                    $items->setStatus(1);
                    $items->setTypeId('simple');
                    $items->setTaxClassId(2);
                    $items->setWebsiteIds([1]);
                    if(@$producto->getCtSpecs() == null){
                        $specs = "<ul>";
                        if($productdata["especificaciones"] != null){
                             foreach($productdata["especificaciones"] as $especificacion){
                                     $specs .= "<li>"." ".$especificacion["tipo"].": ".$especificacion["valor"]."</li>";
                             }
                             $specs .= "</ul>";
                             $producto->setCtSpecs($specs != null ? $specs : "");
                         }
                     }
                    if($items->getShortDescription() == null){
                        $items->setShortDescription($product["descripcion_corta"]);
                    }
                    //ICECAT
                    $items->setGtinEan($product['upc'] == "" || null ? $product['ean'] : $product['upc']);
                    $items->setBrandName($product['marca']);
                    $items->setProductCode($product['numParte']);                    
                    $items->setCategoryIds([
                        $root,$category,$subcategory
                    ]);
                    $items->setStockData(
                        array( 
                        'use_config_manage_stock' => 1,                       
                        'manage_stock' => 1,
                        'is_in_stock' => 1,   
                        'qty' => $sumaExistencia
                        )
                    );   
                    if(count($product['promociones']) > 0){
                        if(@$product['promociones'][0]['tipo'] == "importe"){
                            $precioPromocion = $product['promociones'][0]['promocion'] * $product['tipoCambio'];
                            $items->setSpecialPrice($precioPromocion);
                            $items->setSpecialFromDate($product['promociones'][0]['vigencia']['inicio']);
                            $items->setSpecialFromDateIsFormated(true);
                            $items->setSpecialToDate($product['promociones'][0]['vigencia']['fin']);
                            $items->setSpecialToDateIsFormated(true);
                        }
                        else{
                            $porsentaje = $product['promociones'][0]['promocion'] / 100;
                            $valor = $precioReal * $porsentaje;
                            $precioPromo = $precioReal - $valor;
                            $precioPromocion = $precioPromo * $product['tipoCambio'];
                            $items->setSpecialPrice($precioPromocion);
                            $items->setSpecialFromDate($product['promociones'][0]['vigencia']['inicio']);
                            $items->setSpecialFromDateIsFormated(true);
                            $items->setSpecialToDate($product['promociones'][0]['vigencia']['fin']);
                            $items->setSpecialToDateIsFormated(true);
                        }
                    }
                    $filename = md5($product['imagen']);
                    $filepath = $mediaDir . '/catalog/product/imgct/' . $filename.'.jpg';
                    file_put_contents($filepath, file_get_contents(trim($product['imagen'])));
                    $imgUrl = $filepath;
                    $items->addImageToMediaGallery($imgUrl, ['image', 'small_image', 'thumbnail'], false, false); 
                    $items->save();
                }
                $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/subCategorias.log');
                $logger = new \Zend_Log();
                $logger->addWriter($writer);
                $logger->info($noExisten);    
            } catch (Exception $e) {
                $data = [];
            }           
        }
        else{
        }
        //INGRAM   
    }
    public function connectCT(){
        //FTP
        // Configuración de la conexión FTP
        $ftp_server = '216.70.82.104'; // Reemplaza con la dirección del servidor FTP
        $ftp_user = 'HMO0410'; // Reemplaza con tu nombre de usuario FTP
        $ftp_pass = 'Z6v3Bh7*k@lLcXTGR0!P'; // Reemplaza con tu contraseña FTP

        // Ruta al archivo JSON en el servidor FTP
        $remote_file = 'catalogo_xml/productos.json'; // Reemplaza con la ruta de tu archivo JSON

        // Ruta local donde guardarás el archivo JSON descargado
        $local_file = '/home/master/json/product.json'; // Reemplaza con la ruta de tu elección en tu servidor local

        // Establece la conexión FTP
        $ftp_conn = ftp_connect($ftp_server);
        if (!$ftp_conn) {
            die('No se pudo conectar al servidor FTP.');
        }

        // Inicia sesión en el servidor FTP
        if (ftp_login($ftp_conn, $ftp_user, $ftp_pass)) {
            // Descarga el archivo JSON
            if (ftp_get($ftp_conn, $local_file, $remote_file, FTP_ASCII, 0)) {
                return true;
            } else {
                return false;
            }

            // Cierra la conexión FTP
            ftp_close($ftp_conn);
        } else {
            echo "Error al iniciar sesión en el servidor FTP.";
        }
        //FIN FTP
    }
    
    public function getCategoryId($name){
        $subCategorias = [
            245 => "Cables USB", 243 => "Adaptadores de Energía", 243 => "Inversores de Energia", 242 => "Reemplazos", 241 => "Bancos de Batería",
            240 => "Convertidores AV", 240 => "Transformadores", 239 => "Supresores", 238 => "Regletas y Multicontactos", 237 => "Estaciones de Carga",
            236 => "Reguladores", 235 => "No Breaks y UPS", 234 => "Baterías", 233 => "Barra de Contactos", 232 => "SSD para servidores", 232 => "Storage",
            231 => "Procesadores para Servidores", 230 => "Memorias RAM para Servidores", 229 => "Fuentes de Poder para Servidores", 228 => "Discos Duros para Servidores",
            227 => "Cables para Servidores", 226 => "Gabinetes de Piso", 226 => "Gabinetes para Montaje", 226 => "Servidores", 226 => "Servidores Rack", 226 => "Unidades Ópticas para Servidores",
            223 => "Tarjetas de Acceso", 218 => "Camaras Deteccion", 217 => "Accesorios para seguridad", 215 => "Soportes para Video Vigilancia", 214 => "Sirenas para Video Vigilancia",
            213 => "Monitores para Video Vigilancia", 212 => "Kits de Video Vigilancia", 211 => "Grabadoras Digitales", 211 => "Grabadores analógicos", 211 => "Kit Analógicos HD",
            211 => "Videovigilancia", 210 => "Fuentes de Poder para Video Vigilancia", 209 => "Cámara bala análogica", 125 => "Cámaras", 166 => "Cámaras de Video Vigilancia",
            209 => "Cámaras domo analógicas", 209 => "Cámaras PTZ analógicas", 208 => "Cables y conectores", 207 => "Accesorios para Video Vigilancia", 207 => "Gabinete para Almacenaje",
            206 => "Inyectores PoE", 205 => "Antenas", 204 => "Accesorios para Racks", 203 => "Networking", 203 => "PDU", 203 => "Switches", 202 => "Amplificadores Wifi",
            202 => "Extensores de Red", 202 => "Hub y Concentadores Wifi", 200 => "Access Points", 201 => "Routers", 199 => "Accesorios para Cables", 199 => "Bobinas",
            199 =>  "Cables de Red", 199 =>  "Fibras Ópticas", 199 =>  "Herramientas", 199 =>  "Herramientas para red", 199 => "Jacks", 197 => "Adaptadores de Ethernet",
            197 => "Adaptadores Inalámbricos", 105 => "Adaptadores para Apple", 104 => "Adaptadores para Audio", 197 => "Adaptadores para Red", 197 => "Adaptadores USB Red",
            197 => "Tarjetas para Red", 198 => "Accesorios de Redes", 198 => "Adaptadores de Red", 198 => "Convertidor de medios", 198 => "Transceptores",
            196 => "Consumibles POS", 196 => "Etiquetas", 195 => "Baterías POS", 195 => "Cables POS", 194 => "Digitalizadores de Firmas", 193 => "Terminales POS",
            192 => "Monitores POS", 191=> "Lectores de Códigos de Barras", 190 => "Impresoras POS", 189 => "Cajones de Dinero", 188 => "Kit Punto de Venta",
            187 => "Pcs de Escritorio Gaming", 186 => "Monitores Gaming", 185 => "Laptops Gaming", 184 => "Tarjetas de Video Gaming", 183 => "Consolas y Video Juegos",
            183 => "Controles Gaming", 183 => "Pilas", 183 => "Soporte para Control", 182 => "Escritorio Gaming", 181 => "Sillas Gaming", 180 => "Motherboards Gaming",
            179 => "Gabinetes Gaming", 178 => "Fuentes de Poder Gaming", 177 => "Kits de Teclado y Mouse Gaming", 177 => "Teclados Gaming", 177 => "Mouse Gaming",
            175 => "Mouse Pads Gaming", 174 => "Diademas Gaming", 172 => "Hidrolavadoras", 169 => "Sensores", 169 => "Sensores para Vídeo Vigilancia", 168 => "Paneles para Alarma",
            106 => "Adaptadores USB", 78 => "Accesorios para PCs", 78 => "Kits para Teclado y Mouse", 167 => "Acceso", 165 => "Cámara Inteligentes", 165 => "Cámaras Inteligentes",
            164 => "Cerraduras", 164 => "Seguridad Inteligente", 164 => "Timbres", 163 => "Sensores Wifi", 160 => "Contactos Inteligentes Wifi", 160 => "Control Inteligente",
            161 => "Iluminación", 161 => "Interruptores Wifi", 159 => "Control de Acceso", 158 => "Checadores", 158 => "Lector de Huella", 158 => "Reconocimiento Facial",
            158 => "Tiempo y Asistencia", 156 => "Equipo",156 => "Salud",156 => "Termómetros",155 => "Desinfectantes",154 => "Caretas",154 => "Cubrebocas", 153 => "Aspiradoras",
            152 => "Microondas",151 => "Aires Acondicionados",150 => "Pantallas Profesionales", 149 => "Video Conferencia", 148 => "Análogos", 148 => "Central Telefónica",
            148 => "Sistemas Análogos", 148 => "Telefonía para empresas", 148 => "Teléfonos Analógicos", 148 => "Teléfonos Digitales", 148 => "Teléfonos IP", 148 => "Teléfonos para Hogar",
            148 => "Teléfonos SIP", 147 => "Escritorio de Oficina", 146 => "Ergonomia", 146 => "Sillas de Oficina", 145 => "Almacenamiento Óptico",145 => "Contabilidad",
            145 => "Quemadores DVD y BluRay", 143 => "Accesorios de Papeleria", 143 => "Articulos de Escritura",143 => "Basico de Papeleria", 143 => "Cuadernos",
            143 => "Papelería", 143 => "Plumas Interactivas", 142 => "Mantenimiento", 141 => "Refacciones", 140 => "Cabezales", 139 => "Accesorios para impresoras",
            139 => "Gabinetes para Impresoras", 138 => "Cintas", 137 => "Papel",136 => "Tóners", 135 => "Cartuchos", 134 => "Plotters", 133 => "Rotuladores", 132 => "Escaner",
            131 => "Multifuncionales", 130 => "Impresoras",129 => "Soporte para TV", 129 => "Soporte Videowall", 129 => "Soportes", 128 => "Soporte para Proyector",
            127 => "Limpieza", 126 => "Controles", 125 => "Accesorios para Camaras", 124 => "Lentes",122 => "Micrófonos", 121 => "Home Theaters", 120 => "Bocina Portatil",
            120 => "Bocinas", 120 => "Bocinas Gaming", 120 => "Bocinas y Bocinas Portátiles", 119 => "Audífonos para Apple", 119 => "Base Diademas", 119 => "Diademas",
            119 => "Diademas y Audífonos", 118 => "Audífonos", 118 => "Audífonos para Apple",118 => "Auriculares", 118 => "Earbuds", 118 => "In Ears", 118 => "On Ear",
            118 => "on-ear",118 => "Perifericos Apple", 118 => "Reproductores MP3",117 => "Patinetas",116 => "Streaming", 116 => "Televisiones", 115 => "Pantallas de Proyección",
            115 => "Proyectores",114 => "Power banks",113 => "Smartwatch", 112 => "Cables Lightning",112 => "Cargadores", 111 => "Accesorios de Telefonía", 111 => "Accesorios para Celulares",                       
            111 => "Celulares", 111 => "Equipo para Celulares", 111 => "Transmisores", 110 => "Gabinetes para Discos Duros", 109 => "Memorias Flash",109 => "Memorias USB",
            107 => "Adaptadores para Disco Duro", 107 => "Almacenamiento Externo",108 => "Discos Duros", 108 => "Discos Duros Externos", 108 => "SSD", 104 => "Adaptadores Displayport",
            104 => "Adaptadores DVI", 104 => "Adaptadores HDMI",104 => "Adaptadores para Video", 106 => "Adaptadores Tipo C",104 => "Adaptadores USB para Video",
            104 => "Adaptadores VGA", 102 => "Cables Serial", 101 => "Cables Coaxial", 101 => "Cables de Video", 101 => "Cables Displayport", 101 => "Cables DVI",
            101 => "Cables HDMI", 101 => "Cables KVM",101 => "Cables VGA",100 => "Cables de Audio", 99 => "Cables de Alimentación", 99 => "Cables de Energía",
            95 => "Fundas y Maletines", 96 => "Mochila Gaming", 123 => "Mochilas y Maletines",95 => "Fundas Laptops",95 => "Fundas para Tablets", 95 => "Protectores para Tablets",
            94 => "Filtro de Privacidad",93 => "Concentradores Hub",93 => "Docking Station",92 => "Candados Laptops",91 => "Bases Enfriadoras", 90 => "Accesorios para Laptops",
            90 => "Adaptadores para Laptops", 90 => "Baterias Laptops", 90 => "Pantallas Laptops", 90 => "Teclados Laptops", 89 => "Tarjetas de Sonido", 89 => "Tarjetas de Video",
            89 => "Tarjetas Paralelas", 89 => "Tarjetas Seriales", 88 => "Motherboards", 87 => "Microprocesadores",86 => "Memorias RAM", 85 => "Lectores de Memorias",
            84 => "Gabinetes para Computadoras",83 => "Fuentes de Poder",82 => "Enfriamiento y Ventilación", 98 => "Webcams",91 => "Bases", 97 => "Soporte de Monitor",
            97 => "Soporte Laptops", 97 => "Soportes para PCs", 79 => "Monitores", 79 => "Monitores Curvos", 77 => "Teclados", 76 => "Mouse", 76 => "Mouse Pads",
            75 => "iPad", 75 => "Soporte para Tablets",75 => "Tabletas",74 => "Workstations de Escritorio", 74 => "Workstations Gaming", 74 => "Workstations Móviles",
            73 => "Mini PC", 72 => "MacBook", 71 => "iMac",70 => "PCs de Escritorio",69 => "Laptops",68 => "All In One"
         ];
         $value_id = array_search($name, $subCategorias);
         return $value_id;
    }

    public function getPathWithCategoryId($Category_Id){
        $resource = \Magento\Framework\App\ObjectManager::getInstance()->get(ResourceConnection::class);
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('catalog_category_entity');
        $sql = "SELECT path FROM $tableName WHERE entity_id = :entity_id";
        $params = [
            'entity_id' => $Category_Id            
        ];
        $results = $connection->fetchAll($sql, $params);
        return $results[0]["path"];
    }

    public function specs(){
        $dataCt  = file_get_contents("C:\Users\luis.olivarria\Desktop\productsjson\dataPrueba.json");
        $productsData  = json_decode($dataCt, true);
        foreach($productsData as $productdata){
            try{
                $producto = $this->productRepository->get($productdata['clave']);
                if($producto){
                    if(@$producto->getCtSpecs() == null){
                        $specs = "<ul>";
                        if($productdata["especificaciones"] != null){
                             foreach($productdata["especificaciones"] as $especificacion){
                                     $specs .= "<li>"." ".$especificacion["tipo"].": ".$especificacion["valor"]."</li>";
                             }
                             $specs .= "</ul>";
                             $producto->setCtSpecs($specs != null ? $specs : "");
                         }
                     }
                }
            }
            catch(Exception $e){
                $producto = null;
            }           
        }
    }
}
