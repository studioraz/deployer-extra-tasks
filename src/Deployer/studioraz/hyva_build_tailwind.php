<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\StudioRaz;

use function Deployer\desc;
use function Deployer\get;
use function Deployer\run;
use function Deployer\task;
use function Deployer\writeln;

desc('Builds Tailwind CSS for Hyva themes');
task('studioraz:hyva:build:tailwind', function () {
    $themes = get('hyva_themes');
    foreach ($themes as $theme => $path) {
        run("cd {{release_or_current_path}}/{{magento_dir}}/$path/web/tailwind && npm install && npm run build-prod");
    }
});