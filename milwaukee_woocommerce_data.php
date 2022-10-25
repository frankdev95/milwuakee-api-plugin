<?php 

class WoocommerceOrder {
    public $id = "3524";
    public $currency = "EUR";
    public $date_created;
    public $shipping_address = [
        "first_name" => "Nova",
        "last_name" => "TEST",
        "company" => "Ignore email",
        "address_1" => "Calugareni",
        "address_2" => "12",
        "city" => "Bacau",
        "state" => "BC",
        "postcode" => "600407",
        "country" => "RO",
        "phone" => ""
    ];

    function __construct() {
        $this->date_created =  [
            "date" => date('c')
        ];
    }
}