<?php
namespace StudioRaz\DeployerExtraTasks\Deployer\Dev;

use function Deployer\localhost;
use function Deployer\set;

localhost('dev')
    ->setDeployPath(__DIR__ . '/../../../../../..')
    ->set('current_path', __DIR__ . '/../../../../../../..');;