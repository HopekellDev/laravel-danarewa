# Laravel DanArewa

Laravel DanArewa is a Laravel 10+ package that provides a clean wrapper around the DanArewaTech identity verification API. It offers a Facade-based interface for verification, clearance, validation, and user wallet inquiries.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hopekelldev/laravel-danarewa.svg?style=flat-square)](https://packagist.org/packages/hopekelldev/laravel-danarewa)
[![Total Downloads](https://img.shields.io/packagist/dt/hopekelldev/laravel-danarewa.svg?style=flat-square)](https://packagist.org/packages/hopekelldev/laravel-danarewa)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/quality/g/HopekellDev/laravel-danarewa/main.svg?style=flat-square)](https://scrutinizer-ci.com/g/HopekellDev/laravel-danarewa/?branch=main)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D8.0-777BB4.svg?style=flat-square)](https://www.php.net/)
[![Laravel Version](https://img.shields.io/badge/Laravel-%3E%3D10.0-FF2D20.svg?style=flat-square)](https://laravel.com/)
[![GuzzleHTTP Version](https://img.shields.io/badge/GuzzleHTTP-%3E%3D7.0-3F7E95.svg?style=flat-square)](https://github.com/guzzle/guzzle)

## Requirements
- PHP >= 8.0
- Laravel >= 10.0
- GuzzleHTTP >= 7.0

## Installation
Install the package via Composer:

```bash
composer require hopekelldev/laravel-danarewa
```

## Configuration
### Publish Configuration File
Run the following command to publish the configuration file:

```bash
php artisan vendor:publish --tag=config --provider="HopekellDev\DanArewa\DanArewaServiceProvider"
```

### Environment Variables
Add the following to your `.env` file:

```dotenv
DANAREWA_API_KEY=your_api_key_here
DANAREWA_BASE_URL=https://danarewatech.com.ng/api
```

## Usage Example
Here’s how to use the package to verify an NIN:

```php
use DanArewa;

// Example: Verify NIN
$response = DanArewa::make()->verifications()->ninVerification('12345678901');

if ($response && ($response['status'] ?? false) === 'success') {
    $data = $response['data'];
    // Process success
} else {
    $error = $response['message'] ?? 'Verification failed';
}
```

## Available Methods
| Category         | Method                                      | Description                      |
|------------------|---------------------------------------------|----------------------------------|
| Verifications    | `verifications()->ninVerification($nin)`    | Verify NIN by number            |
| Verifications    | `verifications()->phoneVerification($phone)`| Verify NIN by registered phone  |
| Verifications    | `verifications()->bvnVerification($bvn)`    | Verify BVN number               |
| Verifications    | `verifications()->trackingIdVerification($trackingId)` | Verify by Tracking ID |
| IPE Clearance    | `ipeClearance()->ipeClearance($trackingID)` | Instant IPE Clearance           |
| IPE Clearance    | `ipeClearance()->ipeClearanceStatus($trackingID)` | Check IPE status          |
| Validation       | `validation()->validate($nin)`              | Validate ID                     |
| Validation       | `validation()->validateStatus($nin)`        | Check validation status         |
| User Wallet      | `userDetails()->walletBalance()`            | Get user wallet balance         |

## Controller Usage Example
Here’s an example of how to use the package in a Laravel controller:

```php
use HopekellDev\DanArewa\Facades\DanArewa;

public function verifyNIN(Request $request)
{
    $response = DanArewa::verifications()->ninVerification($request->nin);

    return response()->json($response);
}
```

## License
This package is released under the MIT License.

## Author
**Ezenwa Hopekell**

- GitHub: [HopekellDev](https://github.com/HopekellDev)
- Email: hopekelltech@gmail.com

## Contributions & Issues
Found a bug or have a feature request? Feel free to open an issue or submit a pull request on [GitHub](https://github.com/HopekellDev/laravel-danarewa).