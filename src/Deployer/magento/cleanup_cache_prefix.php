<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\Magento;

use function Deployer\run;

task('magento:cleanup_cache_prefix', function () {
    run('rm {{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
    run('rm {{release_or_current_path}}/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
    run('mv {{deploy_path}}/shared/{{magento_dir}}/' . TMP_ENV_CONFIG_FILE_PATH . ' {{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
    run('{{bin/symlink}} {{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH . ' {{release_path}}/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
});
