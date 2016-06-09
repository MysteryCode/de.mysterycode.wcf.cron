<?php

namespace wcf\action;
use wcf\data\cronjob\CronjobAction;

/**
 * executes cronjobs on page calls - or prevents execution
 * 
 * @author	Florian Gail
 * @copyright	2016 Florian Gail <https://www.mysterycode.de/>
 * @license	Kostenlose Plugins <https://downloads.mysterycode.de/license/6-kostenlose-plugins/>
 * @package	de.mysterycode.wcf.cron
 * @category	WCF
 */
class CronjobExecuteAction extends AbstractAction {
	/**
	 * @see wcf\action\Action::readParameters()
	 */
	public function execute() {
		$action = new CronjobAction(array(), 'executeCronjobs');
		$action->executeAction();
	}
}
