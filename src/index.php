<?php

namespace StudioRaz\DeployerExtraTasks;

require __DIR__ . '/Deployer/constants.php';

/** localhost */
require __DIR__ . '/Deployer/dev/localhost-env.php';
require __DIR__ . '/Deployer/dev/build-static.php';

/** magento */
require __DIR__ . '/Deployer/magento/set_cache_prefix.php';
require __DIR__ . '/Deployer/magento/cleanup_cache_prefix.php';

/** studioraz */
require __DIR__ . '/Deployer/studioraz/hyva_build_tailwind.php';

/** deployer  */
require __DIR__ . '/Deployer/deploy/vendors.php';
