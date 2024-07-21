<?php

namespace StudioRaz\DeployerExtraTasks;

require __DIR__ . '/Deployer/constants.php';
require __DIR__ . '/Deployer/magento/set_cache_prefix.php';
require __DIR__ . '/Deployer/magento/cleanup_cache_prefix.php';
require __DIR__ . '/Deployer/studioraz/cron_kill.php';
require __DIR__ . '/Deployer/studioraz/hyva_build_tailwind.php';
require __DIR__ . '/Deployer/deploy/vendors.php';
