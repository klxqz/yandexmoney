<?php

/**
 * @author wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
class shopYandexmoneyPlugin extends shopPlugin {

    public function frontendCheckout($params) {
        if ($this->getSettings('default_out') && $params['step'] == 'success') {
            return self::display();
        }
    }

    public static function display($order_id = null) {
        $app_settings_model = new waAppSettingsModel();
        $settings = $app_settings_model->get(array('shop', 'yandexmoney'));
        if ($settings['status']) {
            if(empty($order_id)) {
                $order_id = wa()->getStorage()->get('shop/order_id');
            }
            $order_model = new shopOrderModel();
            $order = $order_model->getById($order_id);
            if (empty($order)) {
                return false;
            }
            $order['_id'] = $order['id'];
            $order['id'] = shopHelper::encodeOrderId($order_id);
            $order_params_model = new shopOrderParamsModel();
            $params = $order_params_model->get($order_id);

            if ($settings['yamoney_payment_id'] != 0 && $params['payment_id'] != $settings['yamoney_payment_id']) {
                $settings['yamoney_payment_type'] = false;
            }
            if ($settings['card_payment_id'] != 0 && $params['payment_id'] != $settings['card_payment_id']) {
                $settings['card_payment_type'] = false;
            }

            if ($order['currency'] != 'RUB') {
                if ($settings['support_currency'] == '0') {
                    return false;
                } elseif ($settings['support_currency'] == 'shop') {
                    $order['total'] = shop_currency($order['total'], $order['currency'], 'RUB', false);
                } elseif ($settings['support_currency'] == 'koef' && $settings['currency_koef']) {
                    $order['total'] = $order['total'] * $settings['currency_koef'];
                }
            }


            if ($settings['margin']) {
                $settings['default_sum'] = $order['total'] * (1 + $settings['margin'] / 100);
            } else {
                $settings['default_sum'] = $order['total'];
            }

            $settings['targets'] = urlencode('Оплата заказа ' . $order['id']);
            $settings['label'] = $order['_id'];


            $view = wa()->getView();
            $view->assign('settings', $settings);
            $view->assign('order', $order);
            $template_path = wa()->getAppPath('plugins/yandexmoney/templates/Yandexmoney.html', 'shop');
            $html = $view->fetch($template_path);
            return $html;
        }
    }

}
