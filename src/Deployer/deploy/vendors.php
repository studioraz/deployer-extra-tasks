<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\Deploy;

use function Deployer\run;
use function Deployer\warning;
use function Deployer\commandExist;

task('deploy:vendors', function () {
    if (!commandExist('unzip')) {
        warning('To speed up composer installation setup "unzip" command with PHP zip extension.');
    }
    run('cd {{release_or_current_path}}/{{magento_dir}} && {{bin/composer}} {{composer_action}} {{composer_options}} 2>&1');
});
