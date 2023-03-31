<?php

namespace wcf\system\event\listener;

use wcf\page\AbstractPage;
use wcf\system\WCF;

/**
 * disables automatic cronjob execution via page call
 *
 * @author       Florian Gail
 * @copyright    2016 Florian Gail <https://www.mysterycode.de/>
 * @license      Kostenlose Plugins <https://downloads.mysterycode.de/license/6-kostenlose-plugins/>
 * @package      de.mysterycode.wcf.cron
 * @category     WCF
 */
class CronjobDisableExecutionListener extends AbstractEventListener
{
    public function onAssignVariables(): void
    {
        if (\CRONJOB_EXECUTE) {
            return;
        }

        WCF::getTPL()->assign([
            'executeCronjobs' => false,
        ]);
    }
}
