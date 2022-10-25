<?php  
namespace milwuakee\api\warehouse;

require_once "./milwaukee_api_controller.php";
require_once "./milwaukee_api_data.php"; 
require_once "./milwaukee_woocommerce_data.php";

use milwaukee\api\controller as apicontroller;
use milwuakee\api\data as data;
use WoocommerceOrder;

class WarehouseAPIController extends apicontroller\APIController {
    private $username = "xcel";
    private $password = "5xJr6Qm7GRYmGhm";
    private $bearer;

    function __construct($url) {
        parent::__construct($url);
    }

    public function get_access_token(): string | bool {
        $ch = curl_init("{$this->url}login");
        $payload = [
            "body" => json_encode(array(
                "login" => $this->username,
                "password" => $this->password
            )),
            "headers" => ["Content-Type:application/json"]
        ];


        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload["body"]);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $payload["headers"]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

        $result = curl_exec($ch);
        curl_close($ch);

        if($result) {
            $body = json_decode($result);
            $this->bearer = $body->access_token;
            return $this->bearer;
        } 

        return false;
    }

    public function request_handler(string $endpoint, array $payload, array $options = []): array | bool {
        $ch = curl_init("{$this->url}{$endpoint}");

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        if(isset($options)) {
            foreach($options as $key => $value) {
                curl_setopt($ch, $key, $value);
            }    
        }

        $response = curl_exec($ch);
        curl_close($ch);

        if($response) return json_decode($response);

        return false;
    }
}

$warehouse_api_controller = new WarehouseAPIController('https://wms.xbsgroup.pl:7777/api/Integration/');


function send_woocommerce_order($order) {
    global $warehouse_api_controller;

    $token = $warehouse_api_controller->get_access_token();
    $payload = data\CREATE_DOCUMENT_WZ;
    $payload['externalIdentifier'] = $order->id;
    $payload['currencySymbol'] = $order->currency;
    $payload['requestedShippingDate'] = $order->date_created["date"];
    $payload['shippingToContractorDate'] = $order->date_created["date"];
    $payload['positions'] = [
        [
            "assortmentSymbol" => '922-S',
            "quantityRequested" => '1'
        ]
    ];
    $payload['shippingAddress'] = $order->shipping_address;
    $response = $warehouse_api_controller->request_handler('CreateDocumentWZ', $payload, [
        CURLOPT_HTTPHEADER => ["Content-Type:application/json", "Authorization:Bearer {$token}"],
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => true,
        CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
        CURLOPT_RETURNTRANSFER => true
    ]);

}

send_woocommerce_order(new WoocommerceOrder());
$token = $warehouse_api_controller->get_access_token();
$response = $warehouse_api_controller->request_handler('GetAssortments', data\GET_ASSORTMENTS_BODY, [
    CURLOPT_HTTPHEADER => ["Content-Type:application/json", "Authorization:Bearer {$token}"],
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_SSL_VERIFYHOST => true,
    CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
    CURLOPT_RETURNTRANSFER => true
]);

echo $warehouse_api_controller->get_access_token();