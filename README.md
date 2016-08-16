# laravel-pilot
This package is and implementation of Pilot CRM API for Laravel Framework.

## Installation

Run the following command and provide the latest stable version:

```bash
composer require zephia/laravel-pilot
```

Then register this service provider with Laravel in config/app.php:

```php
'providers' => [
    ...
    Zephia\Pilot\PilotServiceProvider::class,
    ...
]
```

Publish config file:

```bash
php artisan vendor:publish --provider='Zephia\Pilot\PilotServiceProvider' --tag="config"
```

Add **PILOT_APP_KEY** and **PILOT_API_DEBUG** constants to your .env file:

```
PILOT_APP_KEY=YOUR-PILOT-APP-KEY
PILOT_API_DEBUG=false
```

## Usage
### Store

```php
<?php

$lead_data = [
    'firstname' => 'John',
    'lastname' = 'Doe',
    'phone' => '+543512345678',
    'email' => 'john.doe@domain.com'
];
$business_type_id = 1;
$contact_type_id = 1;

$pilot = app('pilot')->storeLead($lead_data, $business_type_id, $contact_type_id);

// Returns API response.
```

