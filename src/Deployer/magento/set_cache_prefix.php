<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\Magento;

use function Deployer\download;
use function Deployer\get;
use function Deployer\run;
use function Deployer\upload;

task('magento:set_cache_prefix', function () {
    $tmpConfigFile = tempnam(sys_get_temp_dir(), 'deployer_config');
    download('{{deploy_path}}/shared/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH, $tmpConfigFile);
    $envConfigArray = include($tmpConfigFile);

    $prefixUpdate = get('magento_cache_id_prefix') . '_' . get('release_name') . '_';

    if (isset($envConfigArray['cache']['frontend']['default']['backend_options']['preload_keys'])) {
        $oldPrefix = $envConfigArray['cache']['frontend']['default']['id_prefix'];
        $preloadKeys = $envConfigArray['cache']['frontend']['default']['backend_options']['preload_keys'];
        $newPreloadKeys = [];
        foreach ($preloadKeys as $preloadKey) {
            $newPreloadKeys[] = preg_replace('/^' . $oldPrefix . '/', $prefixUpdate, $preloadKey);
        }
        $envConfigArray['cache']['frontend']['default']['backend_options']['preload_keys'] = $newPreloadKeys;
    }

    $envConfigArray['cache']['frontend']['default']['id_prefix'] = $prefixUpdate;
    $envConfigArray['cache']['frontend']['page_cache']['id_prefix'] = $prefixUpdate;

    $envConfigStr = '<?php return ' . var_export($envConfigArray, true) . ';';
    file_put_contents($tmpConfigFile, $envConfigStr);

    upload($tmpConfigFile, '{{deploy_path}}/shared/{{magento_dir}}/' . TMP_ENV_CONFIG_FILE_PATH);

    unlink($tmpConfigFile);

    run('rm {{release_or_current_path}}/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);

    run('{{bin/symlink}} {{deploy_path}}/shared/{{magento_dir}}/' . TMP_ENV_CONFIG_FILE_PATH . ' {{release_path}}/{{magento_dir}}/' . ENV_CONFIG_FILE_PATH);
});
