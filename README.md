# Stack Reporter Bundle for Symfony

A simple Symfony bundle that provides system information endpoints.

## Installation

Install the bundle with Composer:

```bash
composer require grayloon/stack-reporter-symfony
```

## Configuration

Add configuration to your `config/packages/grayloon_stack_reporter.yaml` file:

```yaml
grayloon_stack_reporter:
    api_key: 'YO-KEY' # Your secure API key
```

### For all Symfony versions (5.x, 6.x, 7.x):

1. Register the bundle in `config/bundles.php`:

```php
// config/bundles.php
return [
    // other bundles...
    Grayloon\StackReporter\StackReporterBundle::class => ['all' => true],
];
```

2. Import the routes in your `config/routes.yaml`:

```yaml
# config/routes.yaml
stack_reporter:
    resource: '../vendor/grayloon/stack-reporter-symfony/src/Controller/'
    type: attribute
```

### Additional steps for Symfony 5.x (versions before 5.3)

For Symfony versions before 5.3, we'll load the controller directly, bypassing PHP 8 attributes.

```yaml
# config/routes/stack_reporter.yaml
grayloon_stack_reporter_api_info:
    path: /api/v1/stack-reporter
    controller: Grayloon\StackReporter\Controller\ApiController::info

# config/routes.yaml
stack_reporter_routes:
    resource: './routes/stack_reporter.yaml'
```

## Usage

Once installed and configured, an endpoint is created to accept a post request with your site's key.

- `/api/v1/stack-reporter`
  - Symfony version
  - PHP version
  - Node version

## Example Response

```json
{
  "symfony_version": "6.4.0",
  "php_version": "8.2.12",
  "node_version": "22.14.0"
}
```

## Requirements

- PHP 7.2.5 or higher
- Symfony 5.0 or higher

## License

This bundle is available under the MIT License.