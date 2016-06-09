<?php
require_once(__DIR__ . '/global.php');
use wcf\system\cronjob\CronjobScheduler;
CronjobScheduler::getInstance()->executeCronjobs();
