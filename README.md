# laravel-pilot
This package is a wrapper of Pilot CRM API Client PHP Class for Laravel Framework.

## Installation

Run the following command and provide the latest stable version:

```bash
composer require zephia/laravel-pilot
```

Then register this service provider with Laravel in config/app.php:

```php
'providers' => [
    ...
    Zephia\LaravelPilot\LaravelPilotServiceProvider::class,
    ...
]
```

Publish config file:

```bash
php artisan vendor:publish --provider='Zephia\LaravelPilot\LaravelPilotServiceProvider' --tag="config"
```

Add **PILOT_APP_KEY** and **PILOT_API_DEBUG** constants to your .env file:

```
PILOT_APP_KEY=YOUR-PILOT-APP-KEY
PILOT_API_DEBUG=false
```

## Usage
### Create and store lead

See fields documentation at [official Pilot API reference](http://www.pilotsolution.com.ar/home/api.php)

```php
<?php

/**
 * Create Lead
 */

// From array (field names without "pilot_" prefix)
$lead_data = new \Zephia\PilotApiClient\LeadData([
    'business_type_id' => 1,
    'contact_type_id' => 1,
    'suborigin_id' => 'FFFF0000',
    'firstname' => 'John',
    'lastname' = 'Doe',
    'phone' => '+543512345678',
    'email' => 'john.doe@domain.com'
]);

// Using setters (camelcase)
$lead_data = new \Zephia\PilotApiClient\LeadData();
$lead_data->setBusinessTypeId(1);
$lead_data->setContactTypeId(1);
$lead_data->setSuboriginId('FFFF0000');
$lead_data->setFirstName('John');
$lead_data->setLastName('Doe');
$lead_data->setPhone('+543512345678');
$lead_data->setEmail('john.doe@domain.com');

/**
 * Store Lead
 */
$pilot = app('pilot')->storeLead($lead_data);

// Returns API response.
```

