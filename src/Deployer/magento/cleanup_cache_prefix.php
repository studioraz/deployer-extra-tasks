<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\Magento;

use function Deployer\desc;
use function Deployer\task;
use function Deployer\run;

use const StudioRaz\DeployerExtraTasks\Deployer\ENV_CONFIG_FILE_PATH;
use const StudioRaz\DeployerExtraTasks\Deployer\TMP_ENV_CONFIG_FILE_PATH;

desc('Cleanup cache id_prefix env files');
task('magento:cleanup_cache_prefix', function () {
    run('rm {{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
    run('rm {{release_or_current_path}}/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
    run('mv {{deploy_path}}/shared/{{magento_dir}}/' . TMP_ENV_CONFIG_FILE_PATH . ' {{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
    run('{{bin/symlink}} {{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH . ' {{release_path}}/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
});
