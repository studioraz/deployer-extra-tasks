# StudioRaz Deployer Extra Tasks

A Composer package containing custom Deployer tasks for Magento, shared across multiple projects.

## Installation

First, add the custom repository to Deployer's composer.json file:

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

### Build Tailwind CSS for Hyva Themes

Builds Tailwind CSS files for specified Hyva themes.

#### Configuration

Set the `hyva_themes` configuration with the theme paths in your `deploy.php`:

```php
set('hyva_themes', [
    'magento2-default-theme' => 'vendor/hyva-themes/magento2-default-theme',
    'magento2-hyva-base-theme' => 'vendor/studioraz/magento2-hyva-base-theme'
]);
```
This task will iterate over the specified themes and run the Tailwind build process for each.