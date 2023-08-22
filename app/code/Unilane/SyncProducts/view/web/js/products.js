/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define(['jquery'], function ($) {
    'use strict';
    /**
     * Initialize click and input events to handle validation
     *    
     */
    console.log("ejecucion");
    $('#sync-products').on('click', function () {
        $.ajax({
        url: URL_BASE+'/syncproduct/products/importproducts',
        showLoader: true,                
        }).done(function (data) {
            console.log("hola",data);
        });
    });        

});
