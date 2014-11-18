<?php

/**
 * @author wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
class shopYandexmoneyPluginSettingsAction extends waViewAction {

    protected $plugin_id = array('shop', 'yandexmoney');

    public function execute() {
        $app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get($this->plugin_id);
        
        $model = new shopPluginModel();
        $this->view->assign('instances', $model->listPlugins(shopPluginModel::TYPE_PAYMENT, array('all' => true, )));        
        $this->view->assign('settings', $settings);
    }

}
