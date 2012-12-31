NetSuite-PHP-Client
===================

This PHP Client is based on the [NetSuite PHP Toolkit](http://www.netsuite.com/portal/developers/resources/suitetalk-sample-applications.shtml) and is made available, with permission, under the [Toolkit License Agreement](https://github.com/TribeHR/NetSuite-PHP-Client/blob/master/LICENSE.md).


## Using this Library
-----------
First, make sure you have a valid NetSuite account - as you'll need your account and authentication information in order to use this library.

The following is a simplified example to illustrate fetching a customer from within a NetSuite account

```
// Set the namespace and require the necessary library files
namespace NetSuite\WebServices;
require_once('./path_to_library/NetSuiteService.php');

// Instantiate the library, referencing the whole namespace
$service = new NetSuiteService();

// Set your authentication credentials
$service->setPassport(
	$nsaccount = 'MYACCT1',
	$nsemail = 'jDoe@netsuite.com',
	$nsrole = '3',
	$nspassword = 'mySecretPwd');

// Create a new Get request (since getting a customer)
$request = new GetRequest();

// Specify that we're looking for a customer. #931 to be specific
$request->baseRef = new RecordRef();
$request->baseRef->internalId = "931";
$request->baseRef->type = "customer";

// Get the object
$getResponse = $service->get($request);
```

## Frequently Asked Questions
-----------
### How do I connect to a different endpoint?
NetSuite endpoint information is specified in NSconfig.php. You can specify a new end point or host by modifying `$nsendpoint` and/or `$nshost`, however this version of the client was generated against the 2012_2 release.


## Credits
-----------
Written by the clever folks at [TribeHR](http://tribehr.com)