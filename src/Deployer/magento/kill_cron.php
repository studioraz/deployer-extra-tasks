<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\Magento;

use function Deployer\get;
use function Deployer\run;
use function Deployer\writeln;

task('studioraz:cron:kill', function () {
    $projectPath = get('deploy_path');

    $result = run("ps aux | grep -E '.*{$projectPath}.*bin/magento' | grep -v grep | awk '{print \$2}'", ['silent' => true]);

    if (!empty($result)) {
        writeln($result);
        $pids = preg_split('/\s+/', trim($result));
        foreach ($pids as $pid) {
            run("kill -9 {$pid} 2>&1");
        }
    } else {
        writeln('No Magento cron processes found to kill.');
    }
});
