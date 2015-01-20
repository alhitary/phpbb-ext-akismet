<?php
/**
 *
 * @package phpBB Extension - Akismet
 * @copyright (c) 2015 Matt Gibson gothick@gothick.org.uk
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */



namespace gothick\akismet\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface
{
    static public function getSubscribedEvents()
    {
        return array(
                'core.user_setup'						=> 'load_language_on_setup',
                'core.page_header'						=> 'add_page_header_link',
                'core.posting_modify_submit_post_before' => 'check_submitted_post'
                
        );
    }

    /* @var \phpbb\controller\helper */
    protected $helper;

    /* @var \phpbb\template\template */
    protected $template;

    /**
     * Constructor
     *
     * @param \phpbb\controller\helper	$helper		Controller helper object
     * @param \phpbb\template			$template	Template object
     */
    public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template)
    {
        $this->helper = $helper;
        $this->template = $template;
    }

    public function load_language_on_setup($event)
    {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
                'ext_name' => 'gothick/akismet',
                'lang_set' => 'common',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }

    public function add_page_header_link($event)
    {
        $this->template->assign_vars(array(
                'U_DEMO_PAGE'	=> $this->helper->route('gothick_akismet_controller', array('name' => 'world')),
        ));
    }
    public function check_submitted_post($event)
    {
        $data = $event['data'];
        // Whatever the post status was before, this will override it and mark it as
        // unapproved.
        $data['force_approved_state'] = ITEM_UNAPPROVED;
        $event['data'] = $data;  
    }
}
