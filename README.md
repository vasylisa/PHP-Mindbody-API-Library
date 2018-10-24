# PHP Mindbody API Library

This library provides a set of PHP classes which allow one to interface with the [Mindbody SOAP API 0.5.1](http://www.mindbodyonline.com/api) in a fairly simple way.

The API's main documentation is available through the [API portal](https://developers.mindbodyonline.com/PublicDocumentation/GettingStarted).

## Preparation

Before you can make use of this library, you will need to get a set of [API credentials from Mindbody](https://developers.mindbodyonline.com/Home/SignUp).

As well, you will need to know your Site ID. Your API credentials must be authorized for your Site ID using the SiteService::GetActivationCode method or use [Web-form](https://developers.mindbodyonline.com/PublicDocumentation/SiteActivation?version=v5.1) (require developer auth).

The API sandbox information can be found via the [API FAQ](https://developers.mindbodyonline.com/PublicDocumentation/FAQs?version=v5.1). You can use [Sandbox account](https://clients.mindbodyonline.com/ASP/adm/home .asp?studioid=-99) with username *Siteowner* and password *apitest1234*.

This library will of course require the SOAP extension be installed and enabled in your PHP installation, and allow_url_fopen must be enabled.

## Installation

The most simple method of installation is via [Composer](http://getcomposer.org/). Simply add the [vasylisa/mindbody-api](https://packagist.org/packages/vasylisa/mindbody-api) package as a requirement and update your project.

Alternatively, you can simply clone this project from [GitHub](https://github.com/vasylisa/mindbody-api).

This library supports PSR-0 autoloading, though you need to register the MindbodyAPI namespace as being in the root of the library, as opposed to vendor-prefixed.

## Basic Usage

Here is a very basic usage example for the Site Service class, which should print out a full informational listing on locations associated with your specified site.

```php
<?php
require 'vendor/autoload.php';

$service = MindbodyAPI\MindbodyClient::service('SiteService');

$credentials = $service::credentials(
    'YourSourceName',
    'YourPassword',
    [
        -99 // Your Site ID(s)
    ]
);

$request   = $service::request('GetLocations', $credentials);
$locations = $service->GetLocations($request);

var_dump($locations);
```

```php
<?php
require 'vendor/autoload.php';

$service = MindbodyAPI\MindbodyClient::service('AppointmentService');

$credentials = $service::credentials(
    'YourSourceName',
    'YourPassword',
    [
        -99 // Your Site ID(s)
    ]
);

$userCredentials = $service::userCredentials(
    'Siteowner',
    'apitest1234',
    [
        -99 // Your Site ID(s)
    ]
);

$request = $service::request('AddOrUpdateAppointments', $credentials, $userCredentials);

$appointment    = $service::structure('Appointment', [
    'Location'      => $service::structure('Location', ['ID' => $locationId]),
    'Staff'         => $service::structure('Staff', ['ID' => $staffId]),
    'Client'        => $service::structure('Client', ['ID' => $clientId]),
    'SessionType'   => $service::structure('SessionType', ['ID' => $sessionTypeId]),
    'StartDateTime' => $date->format('Y-m-d\TH:i:s'),
]);

$request->Request->UpdateAction = $appointment->ID ? 'Update' : 'AddNew';
$request->Request->Appointments = [$appointment];

$response = $service->AddOrUpdateAppointments($request);
```

```php
<?php
require 'vendor/autoload.php';

$service = MindbodyAPI\MindbodyClient::service('AppointmentService');

$credentials = $service::credentials(
    'YourSourceName',
    'YourPassword',
    [
        -99 // Your Site ID(s)
    ]
);

$request = $service::request('GetStaffAppointments', $credentials);

$request->Request->StaffCredentials = $service::staffCredentials(
    'Siteowner',
    'apitest1234',
    [
        -99 // Your Site ID(s)
    ]
);

$request->Request->StaffIDs       = $staffID;
$request->Request->ClientIDs      = $clientIDs;
$request->Request->AppointmentIDs = $appointmentIDs;
$request->Request->LocationIDs    = $locationIDs;
$request->Request->StartDate      = $startDate ? $startDate->format('Y-m-d\TH:i:s') : null;
$request->Request->EndDate        = $endDate ? $endDate->format('Y-m-d\TH:i:s') : null;

$response = $service->GetStaffAppointments($request);
```
