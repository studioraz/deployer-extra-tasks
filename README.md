# Custom Deployer Tasks

A Composer package containing custom Deployer tasks for Magento, shared across multiple projects.

## Installation

```bash
composer require studioraz/deployer-extra-tasks
```

## Usage

Add the following to your `deploy.php`:

```php
require 'recipe/magento2.php';
require 'vendor/studioraz/deployer-extra-tasks/src/index.php';

after('deploy:shared', 'magento:set_cache_prefix');
after('deploy:magento', 'magento:cleanup_cache_prefix');
before('deploy:cleanup', 'studioraz:cron:kill');
```

## Custom Tasks

### Magento Set Cache Prefix

Updates the cache id_prefix on deploy.

### Magento Cleanup Cache Prefix

Cleans up the cache id_prefix environment files.

### Kill Magento Cron Process

Kills all Magento cron processes related to the current deployment.

### Install Vendors

Installs composer vendors for the Magento project.
