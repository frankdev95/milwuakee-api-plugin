<?php 

namespace milwuakee\api\data;

const GET_ASSORTMENTS_BODY = [
    "columns" => [
        "Id",
        "Name",
        "Symbol",
        "AdditionalSymbol"
    ],
    "assortmentSymbols" => [],
    "barcode" => "",
    "isUnitLock" => false,
    "isActive" => true,
    "assortmentTypeIds" => [],
    "assortmentGroupIds" => [],
    "warehouseIds" => [181]
];

const CREATE_DOCUMENT_WZ = [
    
    "isReservationsDespatchCreatingAllowed" => true,
    "createDocumentFromReservationsDespatchAfterCommit" => false,
    "externalIdentifier" => "628c9998e00b86dbff4d8976",
    "externalNumber" => "test usług Raben_01",
    "orderNumber" => "test usług Raben",
    "targetWarehouse" => "9599",
    "contractor" => "9599_001",
    "assortmentOwner" => "9599_001",
    "currencySymbol" => "PLN",
    "requestedShippingDate" => "2022-10-17T00:00:00+02:00",
    "shippingToContractorDate" => "2022-10-18T00:00:00+02:00",
    "positions" => [
        [
            "assortment" => "1000012560",
            "quantityRequested" => "20"
        ]
    ],
    "shippingDefinitionCode" => "Raben_Onyks_Prolog",
    "additionalInfo" => "test usług Raben",
    "remarks" => null,
    "shipmentRemarks" => "Raben_Onyks_Prolog",
    "costsCenterNumber" => "9555",
    "contractorInvoiceNumber" => "0000000363284782",
    "shippingAddress" => [
        "name" => "4801000006 JM-CD SKARBIMIERZ",
        "street" => "BIEDRONKOWA 1",
        "houseNumber" => ".",
        "apartmentNumber" => null,
        "postalCode" => "49-318",
        "city" => "SKARBIMIERZ/K.BRZEGU",
        "region" => "",
        "countryCode" => "PL",
        "contact" => null
    ],
    "shippingService" => [
        "shippingServiceTypeName" => "Cargo Premium",
        "serviceParameters" => [
            [
                "serviceId" => 5,
                "parameterValue" => false
            ],
            [
                "serviceId" => 33,
                "parameterValue" => true
            ],
            [
                "serviceId" => 34,
                "parameterValue" => "08:30-09:30"
            ],
            [
                "serviceId" => 181,
                "parameterValue" => true
            ],
            [
                "serviceId" => 184,
                "parameterValue" => true
            ],
            [
                "serviceId" => 180,
                "parameterValue" => "08:00-16:00"
            ],
            [
                "serviceId" => 183,
                "parameterValue" => "JERONSKABI"
            ],
            [
                "serviceId" => 187,
                "parameterValue" => true
            ],
            [
                "serviceId" => 1,
                "parameterValue" => false
            ],
            [
                "serviceId" => 9,
                "parameterValue" => ""
            ]
        ]
    ]
];