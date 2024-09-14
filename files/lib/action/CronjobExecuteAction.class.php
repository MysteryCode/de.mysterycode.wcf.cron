<?php

namespace wcf\action;

use wcf\data\user\User;
use wcf\system\cronjob\CronjobScheduler;
use wcf\system\WCF;

/**
 * executes cronjobs on page calls - or prevents execution
 *
 * @author       Florian Gail
 * @copyright    2016 Florian Gail <https://www.mysterycode.de/>
 * @license      Kostenlose Plugins <https://downloads.mysterycode.de/license/6-kostenlose-plugins/>
 * @package      de.mysterycode.wcf.cron
 * @category     WCF
 */
class CronjobExecuteAction extends AbstractAction
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        parent::execute();

        WCF::getSession()->changeUser(new User(null, [
            'userID' => 0,
            'username' => 'System',
        ]), true);
        WCF::getSession()->disableUpdate();

        CronjobScheduler::getInstance()->executeCronjobs();
    }
}
