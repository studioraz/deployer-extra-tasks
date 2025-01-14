<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\Dev;

use function Deployer\desc;
use function Deployer\task;
use function Deployer\run;
use function Deployer\currentHost;
use function Deployer\writeln;
use function Deployer\invoke;
use function Deployer\set;


desc('Build static content on local env.');
task('dev:build-static', function() {
    // Check if the current host is localhost
    if (currentHost()->getAlias() !== 'localhost') {
        writeln('Error: this task can only be executed on localhost.');
        throw new \Exception('Error: this task can only be executed on localhost.');
    }

    // Delete var/view_preprocessed and pub/static/*
    writeln('Clearing var/view_preprocessed and pub/static...');
    run('cd {{release_or_current_path}}/{{magento_dir}} && rm -rf var/view_preprocessed pub/static/*');

    invoke('magento:deploy:assets');
    invoke('magento:cache:flush');

});