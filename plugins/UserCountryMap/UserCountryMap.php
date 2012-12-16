<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 * @version $Id: $
 *
 * @category Piwik_Plugins
 * @package Piwik_UserCountryMap
 */

/**
 *
 * @package Piwik_UserCountryMap
 */
class Piwik_UserCountryMap extends Piwik_Plugin
{
    public function getInformation()
    {
        return array(
            'name' => 'User Country Map',
            'description' => 'This plugin shows a world map of your visitors location.',
            'author' => 'Piwik',
            'author_homepage' => 'http://piwik.org/',
            'version' => '2.0',
            'translationAvailable' => true
        );
    }

    public function postLoad()
    {
        Piwik_AddWidget('General_Visitors', Piwik_Translate('UserCountryMap_VisitorMap'), 'UserCountryMap', 'worldMap');
    }

    public function getListHooksRegistered()
    {
        $hooks = array(
            'AssetManager.getJsFiles' => 'getJsFiles',
            'AssetManager.getCssFiles' => 'getCssFiles'
        );
        return $hooks;
    }

    /**
     * @param Piwik_Event_Notification $notification  notification object
     */
    public function getJsFiles($notification)
    {
        $jsFiles = &$notification->getNotificationObject();
        $jsFiles[] = "plugins/UserCountryMap/js/vendor/raphael-min.js";
        $jsFiles[] = "plugins/UserCountryMap/js/vendor/jquery.qtip.min.js";
        $jsFiles[] = "plugins/UserCountryMap/js/vendor/kartograph.js";
        $jsFiles[] = "plugins/UserCountryMap/js/vendor/chroma.min.js";
        $jsFiles[] = "plugins/UserCountryMap/js/vendor/kmeans.js";
        $jsFiles[] = "plugins/UserCountryMap/js/piwik-map.js";
    }

    public function getCssFiles($notification)
    {
        $cssFiles = &$notification->getNotificationObject();
        $cssFiles[] = "plugins/UserCountryMap/css/qtip.css";
    }
}
