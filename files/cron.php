<?php
define('PACKAGE_ID', 1);
require_once(__DIR__ . '/global.php');
use wcf\data\application\ApplicationList;
use wcf\data\cronjob\CronjobAction;
use wcf\system\WCF;

$applicationList = new ApplicationList();
$applicationList->readObjects();

foreach ($applicationList->getObjects() as $application) {
	WCF::loadRuntimeApplication($application->packageID);
}

$action = new CronjobAction([], 'executeCronjobs');
$action->executeAction();

WCF::getSession()->delete();
