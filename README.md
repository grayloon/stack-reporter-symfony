# Stack Reporter Bundle for Symfony

A simple Symfony bundle that provides system information endpoints.

## Installation

Install the bundle with Composer:

```bash
composer require grayloon/stack-reporter
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
    resource: '../vendor/grayloon/stack-reporter/src/Controller/'
    type: attribute
```

### Additional steps for Symfony 5.x (versions before 5.3)

For Symfony versions before 5.3, you'll need to install SensioFrameworkExtraBundle to support PHP 8 attributes for routing:

```bash
composer require sensio/framework-extra-bundle
```

## Usage

Once installed and configured, visit the following endpoints:

- `/api/info` - Returns basic system information in JSON format including:
  - Symfony version
  - PHP version
  - Project name
  - Current time

## Example Response

```json
{
  "symfony_version": "6.4.0",
  "php_version": "8.2.12",
  "project_name": "stack-reporter",
  "current_time": "2025-05-20 13:45:22"
}
```

## Requirements

- PHP 7.2.5 or higher
- Symfony 5.0 or higher

## License

This bundle is available under the MIT License.