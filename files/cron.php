<?php

require_once(__DIR__ . '/global.php');

use wcf\data\user\User;
use wcf\system\background\BackgroundQueueHandler;
use wcf\system\cronjob\CronjobScheduler;
use wcf\system\WCF;

if (!\defined('OFFLINE') || !OFFLINE) {
    WCF::getSession()->changeUser(new User(null, [
        'userID' => 0,
        'username' => 'System',
    ]), true);
    WCF::getSession()->disableUpdate();

    CronjobScheduler::getInstance()->executeCronjobs();

    // send up to 5 outstanding mails
    $limit = \min(5, BackgroundQueueHandler::getInstance()->getRunnableCount());
    for ($i = 0; $i < $limit; $i++) {
        BackgroundQueueHandler::getInstance()->performNextJob();
    }
}

WCF::getSession()->delete();
