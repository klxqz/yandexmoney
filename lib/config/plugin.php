<?php

/**
 * @author wa-plugins.ru <support@wa-plugins.ru>
 * @link http://wa-plugins.ru/
 */
return array(
    'name' => 'Яндекс.Деньги',
    'description' => 'Экспрес оплата Яндекс.Деньги',
    'vendor' => '985310',
    'version' => '1.0.0',
    'img' => 'img/yandexmoney.png',
    'frontend' => true,
    'shop_settings' => true,
    'handlers' => array(
        'frontend_checkout' => 'frontendCheckout',
    ),
);
//EOF
