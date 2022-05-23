<?php

namespace wcf\action;

use wcf\data\cronjob\CronjobAction;

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

        $action = new CronjobAction([], 'executeCronjobs');
        $action->executeAction();
    }
}
