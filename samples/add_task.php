<?php

namespace NetSuite\WebServices;
require_once '../PHPToolkit/NetSuiteService.php';
require_once "../PHPToolkit/NSconfig.php";

$service = new NetSuiteService();

// create Task record
$task = new Task();
$task->title = "New Customer Follow-up";
$task->priority = TaskPriority::_high;

$request = new AddRequest();
$request->record = $task;

$addResponse = $service->add($request);
if (!$addResponse->writeResponse->status->isSuccess) {
    echo "ADD ERROR";
} else {
    echo "ADD SUCCESS, id " . $addResponse->writeResponse->baseRef->internalId;
}

?> 

