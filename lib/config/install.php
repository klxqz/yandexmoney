<?php

/**
 * @author wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
$plugin_id = array('shop', 'yandexmoney');
$app_settings_model = new waAppSettingsModel();
$app_settings_model->set($plugin_id, 'status', '1');
$app_settings_model->set($plugin_id, 'default_out', '1');
$app_settings_model->set($plugin_id, 'account', '');
$app_settings_model->set($plugin_id, 'button_text', '01');
$app_settings_model->set($plugin_id, 'button_size', 'l');
$app_settings_model->set($plugin_id, 'button_color', 'orange');
$app_settings_model->set($plugin_id, 'margin', '0.5');
$app_settings_model->set($plugin_id, 'description', '<p>Для перехода к оплате Вашего заказа нажмите кнопку "Оплатить"</p>');
$app_settings_model->set($plugin_id, 'yamoney_payment_id', '0');
$app_settings_model->set($plugin_id, 'card_payment_id', '0');
$app_settings_model->set($plugin_id, 'support_currency', 'shop');
$app_settings_model->set($plugin_id, 'currency_koef', '1');
$app_settings_model->set($plugin_id, 'yamoney_payment_type', '1');
$app_settings_model->set($plugin_id, 'card_payment_type', '');
$app_settings_model->set($plugin_id, 'yamoney_payment_title', 'Оплата из Яндекс Кошелька:');
$app_settings_model->set($plugin_id, 'card_payment_title', 'Оплата банковской картой Visa и MasterCard:');


