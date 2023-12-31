/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_Osc
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */
define([
    'jquery',
    'underscore',
    'jquery-ui-modules/widget'
], function ($, _) {
    'use strict';

    return function (widget) {
        $.widget('mage.catalogAddToCart', widget, {
            ajaxSubmit: function (form) {
                this._super();
                 location.reload();
            }
        });

        return $.mage.catalogAddToCart;
    }
});
