<?php

namespace NetSuite\WebServices;
require_once '../PHPToolkit/NetSuiteService.php';

$service = new NetSuiteService();
$service->setPassport($nsaccount = 'MYACCT1', $nsemail = 'jDoe@netsuite.com', $nsrole = '3', $nspassword = 'mySecretPwd');

$service->setSearchPreferences(false, 20);

$emailSearchField = new SearchStringField();
$emailSearchField->operator = "startsWith";
$emailSearchField->searchValue = "j";

$search = new EmployeeSearchBasic();
$search->email = $emailSearchField;

$request = new SearchRequest();
$request->searchRecord = $search;

$searchResponse = $service->search($request);

if (!$searchResponse->searchResult->status->isSuccess) {
    echo "SEARCH ERROR";
} else {
    echo "SEARCH SUCCESS, records found: " . $searchResponse->searchResult->totalRecords;
}

?>

