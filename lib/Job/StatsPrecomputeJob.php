<?php
namespace OCA\ClubSuiteStats\Job;

use OCP\BackgroundJob\TimedJob;

class StatsPrecomputeJob extends TimedJob {
    public function __construct() { parent::__construct(); }
    public function run($argument) {
        // placeholder: call services to warm cache (to be implemented with DI in real app)
    }
}
