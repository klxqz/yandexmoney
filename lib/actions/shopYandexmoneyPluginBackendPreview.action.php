<?php

/**
 * @author wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
class shopYandexmoneyPluginBackendPreviewAction extends waViewAction {

    public function execute() {
        $plugin = wa()->getPlugin('yandexmoney');
        $this->view->assign('settings', $plugin->getSettings());
        $this->setTemplate('plugins/yandexmoney/templates/Yandexmoney.html');
    }

}
