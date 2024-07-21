<?php

namespace StudioRaz\DeployerExtraTasks;

require __DIR__ . '/Deployer/magento/set_cache_prefix.php';
require __DIR__ . '/Deployer/magento/cleanup_cache_prefix.php';
require __DIR__ . '/Deployer/magento/kill_cron.php';
require __DIR__ . '/Deployer/deploy/vendors.php';
