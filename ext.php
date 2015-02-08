<?php
/**
 * Akismet Extension
 *
 * @package phpBB Extension - Gothick Akismet
 * @copyright (c) 2015 Matt Gibson Creative Ltd.
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace gothick\akismet;
/**
* Extension class for custom enable/disable/purge actions
*
* We need this because we're adding notification types. We
* can't leave this to the migrations, as, for example, the
* revert_data only runs when the admin chooses to delete the
* extension data, not just when the extension is disabled.
* If they simply disable the extension, we *must* ensure
* that our custom notifications are purged/disabled, as
* otherwise the board will continue trying to use them even
* though their code is disabled.
*/
class ext extends \phpbb\extension\base
{
	/**
	* Enable our notifications.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	* @access public
	*/
	public function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				/* @var $phpbb_notifications \phpbb\notification\manager */
				$phpbb_notifications = $this->container->get('notification_manager');
				$phpbb_notifications->enable_notifications('gothick.akismet.notification.type.topic_in_queue');
				$phpbb_notifications->enable_notifications('gothick.akismet.notification.type.post_in_queue');
				return 'notifications';
			break;
			default:
				// Run parent enable step method
				return parent::enable_step($old_state);
			break;
		}
	}
	/**
	* Disable our notifications.
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	* @access public
	*/
	public function disable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				/* @var $phpbb_notifications \phpbb\notification\manager */
				$phpbb_notifications = $this->container->get('notification_manager');
				$phpbb_notifications->disable_notifications('gothick.akismet.notification.type.topic_in_queue');
				$phpbb_notifications->disable_notifications('gothick.akismet.notification.type.post_in_queue');
				return 'notifications';
			break;
			default:
				// Run parent disable step method
				return parent::disable_step($old_state);
			break;
		}
	}
	/**
	* Purge our notifications
	*
	* @param mixed $old_state State returned by previous call of this method
	* @return mixed Returns false after last step, otherwise temporary state
	* @access public
	*/
	public function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				/* @var $phpbb_notifications \phpbb\notification\manager */
				$phpbb_notifications = $this->container->get('notification_manager');
				$phpbb_notifications->purge_notifications('gothick.akismet.notification.type.topic_in_queue');
				$phpbb_notifications->purge_notifications('gothick.akismet.notification.type.post_in_queue');
				return 'notifications';
			break;
			default:
				// Run parent purge step method
				return parent::purge_step($old_state);
			break;
		}
	}
}