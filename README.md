Sure, here's your updated `README.md` file with the command to add the repository included in the installation instructions:

# StudioRaz Deployer Extra Tasks

A Composer package containing custom Deployer tasks for Magento, shared across multiple projects.

## Installation

First, add the custom repository to deployer's composer.json file. 

```bash
composer config repositories.studioraz-private-packagist composer https://repo.packagist.com/studioraz/
```

Then, require the package:

```bash
composer require studioraz/deployer-extra-tasks
```

## Usage

Add the following to your `deploy.php` immediately after the Magento recipe is included:

```php
require 'vendor/studioraz/deployer-extra-tasks/src/index.php';
```

## Extra Tasks

### Magento Set Cache Prefix

Updates the cache id_prefix on deploy.

### Magento Cleanup Cache Prefix

Cleans up the cache id_prefix environment files.

### Kill Magento Cron Process

Kills all Magento cron processes related to the current deployment.

### Install Vendors

Installs composer vendors for the Magento project.
```

This updated `README.md` file includes the command to add the repository before requiring the package, ensuring that the custom repository is correctly configured before attempting to install the package.
