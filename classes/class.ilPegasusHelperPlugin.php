<?php
include_once('./Services/UIComponent/classes/class.ilUserInterfaceHookPlugin.php');

/**
 * Class ilPegasusHelperPlugin
 *
 * @author Stefan Wanzenried <sw@studer-raimann.ch>
 * @author Martin Studer <ms@studer-raimann.ch>
 */
class ilPegasusHelperPlugin extends ilUserInterfaceHookPlugin
{

    /**
     * @var ilPegasusHelperPlugin
     */
    protected static $instance;


    /**
     * @return ilPegasusHelperPlugin
     */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }


    /**
     * @return string
     */
    public function getPluginName()
    {
        return 'PegasusHelper';
    }

    /**
     * Before update processing
     */
    protected function beforeUpdate()
    {
        /**
         * @var ilPluginAdmin $ilPluginAdmin
         */
        global $ilPluginAdmin;
        if(!$ilPluginAdmin->isActive(IL_COMP_SERVICE, 'UIComponent', 'uihk', 'REST')) {
            ilUtil::sendFailure('Please install the ILIAS REST Plugin first!',true);
            return false;
        }
        return true;
    }
}