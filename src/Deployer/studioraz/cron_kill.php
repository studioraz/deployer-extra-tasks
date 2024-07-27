<?php

namespace StudioRaz\DeployerExtraTasks\Deployer\StudioRaz;

use function Deployer\desc;
use function Deployer\get;
use function Deployer\run;
use function Deployer\task;
use function Deployer\writeln;

desc('Kill Magento cron process');
task('studioraz:cron:kill', function () {
    // Get the project path from the deployer variable
    $projectPath = get('deploy_path');

    if (!is_string($projectPath)) {
        writeln('The deploy_path should be a string.');
        return;
    }

    // Find all processes related to Magento cron within the specified project folder and kill them
    $result = run("ps aux | grep -E '.*{$projectPath}.*bin/magento' | grep -v grep | awk '{print \$2}'", ['silent' => true]);

    if (!empty($result)) {
        writeln('Magento cron processes found. Killing them.');
        // Split the result into an array of PIDs
        $pids = preg_split('/\s+/', trim($result));
        if ($pids === false) {
            writeln('Error splitting process IDs.');
            return;
        }
        foreach ($pids as $pid) {
            $pid = trim($pid);
            // Ensure the PID is a valid number
            if (is_numeric($pid) && $pid > 0) {
                // Check if the process is still running before attempting to kill it
                $isRunning = run("ps -p {$pid}", ['silent' => true, 'no_throw' => true]);
                if (!empty($isRunning)) {
                    try {
                        run("kill -9 {$pid}");
                        writeln("Process {$pid} has been killed.");
                    } catch (\Exception $e) {  // Use global \Exception
                        writeln("Failed to kill process {$pid}: " . $e->getMessage());
                    }
                } else {
                    writeln("Process {$pid} is not running anymore.");
                }
            } else {
                writeln("Invalid PID: {$pid}");
            }
        }
    } else {
        writeln('No Magento cron processes found to kill.');
    }
});
