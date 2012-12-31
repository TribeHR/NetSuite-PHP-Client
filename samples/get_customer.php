<?php

namespace NetSuite\WebServices;
require_once '../PHPToolkit/NetSuiteService.php';
require_once "../PHPToolkit/NSconfig.php";

$service = new NetSuiteService();
$service->setPassport($nsaccount, $nsemail, $nsrole, $nspassword);

$request = new GetRequest();
$request->baseRef = new RecordRef();
$request->baseRef->internalId = "931";
$request->baseRef->type = "customer";
$getResponse = $service->get($request);

if (!$getResponse->readResponse->status->isSuccess) {
    echo "GET ERROR";
} else {
    $customer = $getResponse->readResponse->record;
    echo "GET SUCCESS, customer:";
    echo "\nCompany name: ". $customer->companyName;
    echo "\nInternal Id: ". $customer->internalId;
    echo "\nEmail: ". $customer->email;
}

?>

