<?php
define('PACKAGE_ID', 1);
require_once(__DIR__ . '/global.php');
use wcf\data\application\ApplicationList;
use wcf\data\cronjob\CronjobAction;
use wcf\system\background\BackgroundQueueHandler;
use wcf\system\WCF;

$applicationList = new ApplicationList();
$applicationList->readObjects();

foreach ($applicationList->getObjects() as $application) {
	WCF::loadRuntimeApplication($application->packageID);
}

$action = new CronjobAction([], 'executeCronjobs');
$action->executeAction();

// send up to 5 outstanding mails
$limit = min(5, BackgroundQueueHandler::getInstance()->getRunnableCount());
for($i=0; $i < $limit; $i++) {
	BackgroundQueueHandler::getInstance()->performNextJob();
}

WCF::getSession()->delete();
