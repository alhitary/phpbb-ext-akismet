<?php
/**
 * Akismet custom "post in queue" notification
 *
 * @package phpBB Extension - Gothick Akismet
 * @copyright (c) 2015 Matt Gibson Creative Ltd.
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

namespace gothick\akismet\notification\type;

class post_in_queue extends \phpbb\notification\type\post_in_queue
{
	public function get_type()
	{
		return 'gothick.akismet.notification.type.post_in_queue';
	}

	/**
	 * Get email template
	 *
	 * @return string|bool
	 */
	public function get_email_template()
	{
		return '@gothick_akismet/post_in_queue';
	}
}
