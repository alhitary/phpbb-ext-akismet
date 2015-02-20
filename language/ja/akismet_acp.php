<?php
/**
 *
 * @package phpBB Extension - Gothick Akismet
 * @copyright (c) 2015 Matt Gibson Creative Ltd.
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */
if (! defined('IN_PHPBB'))
{
	exit();
}

if (empty($lang) || ! is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang,
		array(
				'ACP_AKISMET_WELCOME' => 'Gothick Akismet �g���@�\�ւ悤����',
				'ACP_AKISMET_INTRO' => '���̊g���@�\��SPAM���炠�Ȃ��̌f����ی삷�邽�߂�<a href="http://akismet.com">Automatic Akismet</a>�T�[�r�X���g�p���A�^�킵���V�K���e�𒼐ڎ����I�ɏ��F�҂��ɂ��܂��B',
				'ACP_AKISMET_ADMINS_AND_MODS_OKAY' => '�f���̊Ǘ��ҋy�у��f���[�^�[����̑S�Ă̓��e�͊��S�Ƀ`�F�b�N���o�C�p�X���܂��B',
				'ACP_AKISMET_SIGN_UP' => '���̊g���@�\���g�p����ɂ́A�܂��ŏ���<a href="http://akismet.com">API�L�[�̂��߂ɃT�C���A�b�v����</a>�A���ꂩ��ȉ��ɂ��̃L�[����͂��܂��B',
				'ACP_AKISMET_UNENCRYPTED_WARNING' => '�V�K�g�s�b�N�y�ѓ��e�̓`�F�b�N���邽�߂�Akismet�T�[�o�[�ֈÍ�������Ă��Ȃ��A�܂�W����HTTP����ēn����܂��B',

				'ACP_AKISMET_SETTING_CHANGED' => 'Akismet�ݒ���X�V���܂���', // For log
				'ACP_AKISMET_SETTING_SAVED' => '�ݒ��ۑ����܂���',

				'ACP_AKISMET_API_KEY' => 'Akismet API �L�[',
		));
