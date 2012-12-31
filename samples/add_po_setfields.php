<?php

namespace NetSuite\WebServices;
require_once '../PHPToolkit/NetSuiteService.php';
require_once "../PHPToolkit/NSconfig.php";

$service = new NetSuiteService();
$service->setPassport($nsaccount, $nsemail, $nsrole, $nspassword);

$purchaseOrderFields = array (
    'entity' 	=> array ('internalId' => 38),
    'itemList' 	=> array (
        'item' => array (
            array(	'item' => array('internalId' => 15),
                'quantity' => 5)) ,
        'replaceAll' => true
    )
);

$po = new PurchaseOrder();
setFields($po, $purchaseOrderFields);

$request = new AddRequest();
$request->record = $po;

$addResponse = $service->add($request);

if (!$addResponse->writeResponse->status->isSuccess) {
    echo "ADD ERROR";
} else {
    echo "ADD SUCCESS, id " . $addResponse->writeResponse->baseRef->internalId;
}

?>