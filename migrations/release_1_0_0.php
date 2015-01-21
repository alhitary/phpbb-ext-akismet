<?php
/**
*
* @package phpBB Extension - Gothick Akismet
* @copyright (c) 2015 Matt Gibson Creative Ltd.
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace gothick\akismet\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['gothick_akismet_api_key']) &&
		 	isset($this->config['gothick_akismet_url']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('gothick_akismet_api_key', '')),
			array('config.add', array('gothick_akismet_url', '')),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_AKISMET_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_AKISMET_TITLE',
				array(
					'module_basename'	=> '\gothick\akismet\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
