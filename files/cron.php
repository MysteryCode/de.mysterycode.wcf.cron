<?php
require_once('./global.php');
use wcf\system\cronjob\CronjobScheduler;
CronjobScheduler::getInstance()->executeCronjobs();
