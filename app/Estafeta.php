<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estafeta extends Model
{

    public static function crear_guia($request)
    {
        $request = (Object) $request->all();
        /*<DRAlternativeInfo xsi:type="dto:DRAlternativeInfo">
              <address1 xsi:type="xsd:string">'.$i->Alter_address1.'</address1>
              <address2 xsi:type="xsd:string">'.$i->Alter_address2.'</address2>
              <cellPhone xsi:type="xsd:string">'.$i->Alter_cellPhone.'</cellPhone>
              <city xsi:type="xsd:string">'.$i->Alter_city.'</city>
              <contactName xsi:type="xsd:string">'.$i->Alter_contactName.'</contactName>
              <corporateName xsi:type="xsd:string">'.$i->Alter_corporateName.'</corporateName>
              <customerNumber xsi:type="xsd:string">'.$i->Alter_customerNumber.'</customerNumber>
              <neighborhood xsi:type="xsd:string">'.$i->Alter_neighborhood.'</neighborhood>
              <phoneNumber xsi:type="xsd:string">'.$i->Alter_phoneNumber.'</phoneNumber>
              <state xsi:type="xsd:string">'.$i->Alter_state.'</state>
              <valid xsi:type="xsd:boolean">'.$i->Alter_valid.'</valid>
              <zipCode xsi:type="xsd:string">'.$i->Alter_zipCode.'</zipCode>
           </DRAlternativeInfo>*/

//dd($request);
$i = (Object) [

'content'                  => $request->contenido_del_envio, /* Contenido del envío Char(1 a 25) (SI) */
'deliveryToEstafetaOffice' => $request->forma_de_entrega,/* Si es “True”, el envío es “Entrega Ocurre” es decir se entregará en una oficina Estafeta en lugar del domicilio del destinatario (bolean) (SI)*/
'numberOfLabels'           => $request->numero_de_etiquetas, /* Número de etiquetas que se desean imprimir con el tipo de servicio min:1 mx:70 (SI)*/
'officeNum'                => $request->numero_de_oficina, /* Número de Oficina Estafeta string (000 a 999) (SI)*/
'originZipCodeForRouting'  => $request->codigo_postal_destino, /* Código postal del domicilio destino del envío Char(5) Decimal(5) (SI)*/
'parcelTypeId'             => $request->tipo_de_envio, /* Tipo de envío int(1 - sobre, 4 - paquete) (SI)*/
'serviceTypeId'            => $request->tipo_de_servicio, /* Identificador de tipo de Servicio Estafeta para la impresión de guías Char(2) (SI)*//*Consultar lista de servicios con su asesor de ventas (SI)*/
'valid'                    => 'true', /* (SI)*/
'weight'                   => $request->peso_del_envio, /* Peso del envío Float (0.5 a 99.00) (SI)*/
'paperType'                => $request->tipo_de_papel,
/*Tipo de papel para impresión de la guía.
    1 - Papel Bond Tamaño Carta
    En esta modalidad la cara de la hoja es
    dividida en 2 secciones, en una de ellas se
    imprime la guía y en la otra se imprime el
    contrato de la guía.
    Requiere impresora Láser.
    (Ver Anexo C)

    2 - Papel Etiqueta Térmica de 6 x 4 pulgadas
    En esta modalidad la guía se imprime en la
    Etiqueta térmica (no se imprime contrato de
    la guía)
    Requiere impresora Térmica.
    (Ver Anexo B)

    3 - Plantilla Tamaño Oficio de 4 Etiquetas
    En esta modalidad la plantilla está dividida
    en 4 cuadrantes donde cada uno es una*/
/*



$request->telefono_destinatario
$request->celular_destinatario
*/
/*




*/


'aditionalInfo'        => ($request->informacion_adicional_del_envio ?? '.'), /* Información adicional sobre el envío Char(1 a 25) (NO) */
'contentDescription'   => ($request->descripcion_del_contenido ?? '.'),        /* Descripcion del contenido del envío Char(100) (NO) */
'costCenter'           => ($request->centro_de_costos ?? '1'),      /* Centro de Costos del cliente al que pertenece el envío Char(1 a 10) (NO) */
'destinationCountryId' => ($request->pais_de_envio ?? '.'), /* País del envío, solo se requiere definir en caso de que el envío sea hacia el extranjero (EU -Estados Unidos) (NO)*/
'reference'            => ($request->referencia ?? '.'), /* Texto que sirve como referencia adicional para que Estafeta ubique mas fácilmente el domicilio destino Char(1 a 25) (NO)*/
'returnDocument'       => 'false', /* Campo que indica si el envío requiere la impresión de una guía adicional para el manejo de documento de retorno (NO)*/
'quadrant'             => 0, /* Cuadrante de inicio de impresión de guías. 1-4 – impresora láser. Solo aplica cuando paperType sea 3. (1,2,3,4)*/


//  Persona a quien va dirigido el envio
'Cliente_address1'       => $request->direccion_destinatario, /* Línea 1 de Dirección Char(1 a 30) (SI)*/
'Cliente_neighborhood'   => $request->colonia_destinatario, /* Colonia Char(1 a 50) (SI)*/
'Cliente_city'           => $request->ciudad_destinatario, /* Ciudad Char(1 a 50) (SI)*/
'Cliente_zipCode'        => $request->codigo_postal_destinatario, /*Código Postal Char(5) Decimal(5) (SI)*/
'Cliente_state'          => $request->estado_destinatario, /* Estado Char(1 a 50) (SI)*/
'Cliente_contactName'    => $request->contacto_destinatario /* Nombre de la persona de Contacto Char(1 a 30) (SI)*/,
'Cliente_corporateName'  => $request->razon_social_destinatario, /* Razón social Char(1 a 50) (SI)*/
'Cliente_customerNumber' => $request->numero_cliente_destinatario, /* Número de Cliente Estafeta. Puede tratarse del Número de Cliente origen o destino Char(7) (SI)*/

'Cliente_address2'       => '35', /* Línea 2 de Dirección Char(1 a 30) (NO)*/
'Cliente_cellPhone'      => ($request->celular_destinatario ?? '.'), /* Número de celular de la persona de contacto Char(0 a 20) (NO)*/
'Cliente_phoneNumber'    => ($request->telefono_destinatario ?? '.'), /* Teléfono Char(5 a 25) (NO)*/
'Cliente_valid'          => 'true',



//Objeto que contiene la información del quien envia
'Tecno_address1'       => env('TECNO_DIRECCION'), /* Línea 1 de Dirección Char(1 a 30) (SI)*/
'Tecno_city'           => env('TECNO_CIUDAD'), /* Ciudad Char(1 a 50) (SI)*/
'Tecno_contactName'    => env('TECNO_CONTACTO') /* Nombre de la persona de Contacto Char(1 a 30) (SI)*/,
'Tecno_corporateName'  => env('TECNO_RAZON_SOCIAL'), /* Razón social Char(1 a 50) (SI)*/
'Tecno_customerNumber' => env('TECNO_NUMERO_DE_CLIENTE'), /* Número de Cliente Estafeta. Puede tratarse del Número de Cliente origen o destino Char(7) (SI)*/
'Tecno_neighborhood'   => env('TECNO_COLONIA'), /* Colonia Char(1 a 50) (SI)*/
'Tecno_state'          => env('TECNO_ESTADO'), /* Estado Char(1 a 50) (SI)*/
'Tecno_zipCode'        => env('TECNO_CODIGO_POSTAL'), /*Código Postal Char(5) Decimal(5) (SI)*/

'Tecno_address2'       => env('TECNO_DIRECCION2'), /* Línea 2 de Dirección Char(1 a 30) (NO)*/
'Tecno_cellPhone'      => env('TECNO_CELULAR'), /* Número de celular de la persona de contacto Char(0 a 20) (NO)*/
'Tecno_phoneNumber'    => env('TECNO_TELEFONO'), /* Teléfono Char(5 a 25) (NO)*/
'Tecno_valid'          => 'true',




// informacion adicional
'Alter_address1'       => 'CERRADA DE CEYLAN', /* Línea 1 de Dirección Char(1 a 30) (SI)*/
'Alter_city'           => 'AZCAPOTZALCO', /* Ciudad Char(1 a 50) (SI)*/
'Alter_contactName'    => 'CARLOS MATEOS', /* Nombre de la persona de Contacto Char(1 a 30) (SI)*/
'Alter_corporateName'  => 'INTERNET SA  DE CV', /* Razón social Char(1 a 50) (SI)*/
'Alter_customerNumber' => '0000000', /* Número de Cliente Estafeta. Puede tratarse del Número de Cliente origen o destino Char(7) (SI)*/
'Alter_neighborhood'   => 'INDUSTRIAL', /* Colonia Char(1 a 50) (SI)*/
'Alter_state'          => 'DF', /* Estado Char(1 a 50) (SI)*/
'Alter_zipCode'        => '02300', /*Código Postal Char(5) Decimal(5) (SI)*/

'Alter_address2'       => '539', /* Línea 2 de Dirección Char(1 a 30) (NO)*/
'Alter_cellPhone'      => '55555555', /* Número de celular de la persona de contacto Char(0 a 20) (NO)*/
'Alter_phoneNumber'    => '6666666666', /* Teléfono Char(5 a 25) (NO)*/
'Alter_valid'          => 'true',

                                    ];
        $xml = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:est="http://estafetalabel.webservices.estafeta.com">
                       <soapenv:Header/>
                       <soapenv:Body>
                          <est:createLabel soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
                             <in0 xsi:type="dto:EstafetaLabelRequest" xmlns:dto="http://dto.estafetalabel.webservices.estafeta.com">
                                <customerNumber xsi:type="xsd:string">'.env('ESTAFETA_CREATE_LABEL_CUSTNUM').'</customerNumber>
                                <!--1 or more repetitions:-->
                                <labelDescriptionList xsi:type="dto:LabelDescriptionList">

                                   <aditionalInfo xsi:type="xsd:string">'.$i->aditionalInfo.'</aditionalInfo>
                                   <content xsi:type="xsd:string">'.$i->content.'</content>
                                   <contentDescription xsi:type="xsd:string">'.$i->contentDescription.'</contentDescription>
                                   <costCenter xsi:type="xsd:string">'.$i->costCenter.'</costCenter>
                                   <deliveryToEstafetaOffice xsi:type="xsd:boolean">'.$i->deliveryToEstafetaOffice.'</deliveryToEstafetaOffice>
                                   <destinationCountryId xsi:type="xsd:string">'.$i->destinationCountryId.'</destinationCountryId>
                                   <destinationInfo xsi:type="dto:DestinationInfo">
                                      <address1 xsi:type="xsd:string">'.$i->Cliente_address1.'</address1>
                                      <address2 xsi:type="xsd:string">'.$i->Cliente_address2.'</address2>
                                      <cellPhone xsi:type="xsd:string">'.$i->Cliente_cellPhone.'</cellPhone>
                                      <city xsi:type="xsd:string">'.$i->Cliente_city.'</city>
                                      <contactName xsi:type="xsd:string">'.$i->Cliente_contactName.' SANCHEZ</contactName>
                                      <corporateName xsi:type="xsd:string">C'.$i->Cliente_corporateName.'</corporateName>
                                      <customerNumber xsi:type="xsd:string">'.$i->Cliente_customerNumber.'</customerNumber>
                                      <neighborhood xsi:type="xsd:string">'.$i->Cliente_neighborhood.'</neighborhood>
                                      <phoneNumber xsi:type="xsd:string">'.$i->Cliente_phoneNumber.'</phoneNumber>
                                      <state xsi:type="xsd:string">'.$i->Cliente_state.'</state>
                                      <valid xsi:type="xsd:boolean">'.$i->Cliente_valid.'</valid>
                                      <zipCode xsi:type="xsd:string">'.$i->Cliente_zipCode.'</zipCode>
                                   </destinationInfo>
                                   <numberOfLabels xsi:type="xsd:int">'.$i->numberOfLabels.'</numberOfLabels>
                                   <officeNum xsi:type="xsd:string">'.$i->officeNum.'</officeNum>
                                   <originInfo xsi:type="dto:OriginInfo">
                                      <address1 xsi:type="xsd:string">'.$i->Tecno_address1.'</address1>
                                      <address2 xsi:type="xsd:string">'.$i->Tecno_address2.'</address2>
                                      <cellPhone xsi:type="xsd:string">'.$i->Tecno_cellPhone.'</cellPhone>
                                      <city xsi:type="xsd:string">'.$i->Tecno_city.'</city>
                                      <contactName xsi:type="xsd:string">'.$i->Tecno_contactName.'</contactName>
                                      <corporateName xsi:type="xsd:string">'.$i->Tecno_corporateName.'</corporateName>
                                      <customerNumber xsi:type="xsd:string">'.$i->Tecno_customerNumber.'</customerNumber>
                                      <neighborhood xsi:type="xsd:string">'.$i->Tecno_neighborhood.'</neighborhood>
                                      <phoneNumber xsi:type="xsd:string">'.$i->Tecno_phoneNumber.'</phoneNumber>
                                      <state xsi:type="xsd:string">'.$i->Tecno_state.'</state>
                                      <valid xsi:type="xsd:boolean">'.$i->Tecno_valid.'</valid>
                                      <zipCode xsi:type="xsd:string">'.$i->Tecno_zipCode.'</zipCode>
                                   </originInfo>
                                   <originZipCodeForRouting xsi:type="xsd:string">'.$i->originZipCodeForRouting.'</originZipCodeForRouting>
                                   <parcelTypeId xsi:type="xsd:int">'.$i->parcelTypeId.'</parcelTypeId>
                                   <reference xsi:type="xsd:string">'.$i->reference.'</reference>
                                   <returnDocument xsi:type="xsd:boolean">'.$i->returnDocument.'</returnDocument>
                                   <serviceTypeId xsi:type="xsd:string">'.$i->serviceTypeId.'</serviceTypeId>
                                   <valid xsi:type="xsd:boolean">True</valid>
                                   <weight xsi:type="xsd:float">'.$i->weight.'</weight>
                                </labelDescriptionList>
                                <labelDescriptionListCount xsi:type="xsd:int">1</labelDescriptionListCount>
                                <login xsi:type="xsd:string">'.env('ESTAFETA_CREATE_LABEL_USER').'</login>
                                <paperType xsi:type="xsd:int">'.$i->paperType.'</paperType>
                                <password xsi:type="xsd:string">'.env('ESTAFETA_CREATE_LABEL_PASS').'</password>
                                <quadrant xsi:type="xsd:int">'.$i->quadrant.'</quadrant>
                                <suscriberId xsi:type="xsd:string">'.env('ESTAFETA_CREATE_LABEL_ID').'</suscriberId>
                                <valid xsi:type="xsd:boolean">'.$i->valid.'</valid>
                             </in0>
                          </est:createLabel>
                       </soapenv:Body>
                    </soapenv:Envelope>';

        $headers = array(
                            "Content-type: text/xml;charset=\"utf-8\"",
                            "Accept: text/xml",
                            "Cache-Control: no-cache",
                            "SOAPAction:http://tempuri.org/createLabel",
                            "Pragma: no-cache",
                            "Content-length: ".strlen($xml),
                        );

        // PHP cURL
        $ch = curl_init();

        curl_setopt_array($ch, Array(
            CURLOPT_URL            => env('ESTAFETA_CREATE_LABEL_URL'),
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $xml,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING       => 'UTF-8'
        ));

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        curl_close($ch);

        libxml_use_internal_errors(true);
        $sxe = simplexml_load_string($response);
        if ($sxe === false) {
            echo "Failed loading XML\n";
            foreach(libxml_get_errors() as $error) {
                echo "\t", $error->message;
            }
        }

        $xml_obj = self::xml_to_array($response, 1, 'resultDescription')['soapenv:Envelope']['soapenv:Body']['multiRef'];

        $labelPDF = $xml_obj[0]['labelPDF']['value'];

        foreach ($xml_obj as $key => $i) {
            if($key > 0){
                if($i['resultDescription']['value'] != 'OK'){
                    $numero_de_guia = $i['resultDescription']['value'];
                }
            }
        }

        $nombre_del_PDF = $numero_de_guia.".pdf";

        $pdf_decoded = base64_decode ($labelPDF);
        $pdf = fopen ('guiasPDF/'.$nombre_del_PDF,'w');
        //$pdf = fopen ($nombre_del_PDF,'w');
        fwrite ($pdf,$pdf_decoded);
        fclose ($pdf);

        /*header("Content-disposition: attachment; filename=".$nombre_del_PDF."");
        header("Content-type: MIME");
        readfile($nombre_del_PDF);*/

        return $nombre_del_PDF;

    }


    public static function xml_to_array($contents, $get_attributes=1, $priority = 'tag') {
            if(!$contents) return array();

            if(!function_exists('xml_parser_create')) {
                //print "'xml_parser_create()' function not found!";
                return array();
            }
            //Get the XML parser of PHP - PHP must have this module for the parser to work
            $parser = xml_parser_create('');
            xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
            xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
            xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
            xml_parse_into_struct($parser, trim($contents), $xml_values);
            xml_parser_free($parser);

            if(!$xml_values) return;//Hmm...

            //Initializations
            $xml_array = array();
            $parents = array();
            $opened_tags = array();
            $arr = array();

            $current = &$xml_array; //Refference

            //Go through the tags.
            $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
            foreach($xml_values as $data) {
                unset($attributes,$value);//Remove existing values, or there will be trouble

                //This command will extract these variables into the foreach scope
                // tag(string), type(string), level(int), attributes(array).
                extract($data);//We could use the array by itself, but this cooler.

                $result = array();
                $attributes_data = array();

                if(isset($value)) {
                    if($priority == 'tag') $result = $value;
                    else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
                }

                //Set the attributes too.
                if(isset($attributes) and $get_attributes) {
                    foreach($attributes as $attr => $val) {
                        if($priority == 'tag') $attributes_data[$attr] = $val;
                        else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                    }
                }

                //See tag status and do the needed.
                if($type == "open") {//The starting of the tag '<tag>'
                    $parent[$level-1] = &$current;
                    if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                        $current[$tag] = $result;
                        if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                        $repeated_tag_index[$tag.'_'.$level] = 1;

                        $current = &$current[$tag];

                    } else { //There was another element with the same tag name

                        if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                            $repeated_tag_index[$tag.'_'.$level]++;
                        } else {//This section will make the value an array if multiple tags with the same name appear together
                            $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                            $repeated_tag_index[$tag.'_'.$level] = 2;

                            if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                                $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                                unset($current[$tag.'_attr']);
                            }

                        }
                        $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                        $current = &$current[$tag][$last_item_index];
                    }

                } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
                    //See if the key is already taken.
                    if(!isset($current[$tag])) { //New Key
                        $current[$tag] = $result;
                        $repeated_tag_index[$tag.'_'.$level] = 1;
                        if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

                    } else { //If taken, put all things inside a list(array)
                        if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...

                            // ...push the new element into that array.
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;

                            if($priority == 'tag' and $get_attributes and $attributes_data) {
                                $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                            }
                            $repeated_tag_index[$tag.'_'.$level]++;

                        } else { //If it is not an array...
                            $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                            $repeated_tag_index[$tag.'_'.$level] = 1;
                            if($priority == 'tag' and $get_attributes) {
                                if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well

                                    $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                                    unset($current[$tag.'_attr']);
                                }

                                if($attributes_data) {
                                    $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                                }
                            }
                            $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                        }
                    }

                } elseif($type == 'close') { //End of tag '</tag>'
                    $current = &$parent[$level-1];
                }
            }

            return($xml_array);
    }


}
