<?php

get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
get('dashboard',['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
get('admin/users',['as' => 'user.list', 'middleware' => 'role:admin', 'uses' => 'HomeController@users']);
get('admin/edit/{id}',['as' => 'user.edit', 'middleware' => 'role:admin', 'uses' => 'HomeController@getEdit']);
post('admin/edit',['as' => 'user.post_edit', 'middleware' => 'role:admin', 'uses' => 'HomeController@postEdit']);
get('admin/user/cashier',['as' => 'cashierdesk', 'middleware' => 'role:admin|cashier', 'uses' => 'HomeController@getCashierDesk']);
get('admin/profile/{id}',['as' => 'user.get_profile', 'uses' => 'HomeController@getProfileEdit']);
post('admin/profile/edit',['as' => 'user.post_profile', 'uses' => 'HomeController@postProfileEdit']);

get('admin/user/customerforcashier',['as' => 'customerforcashier', 'middleware' => 'role:admin|cashier', 'uses' => 'HomeController@getCustomerForCashierDesk']);
get('admin/user/order',['as' => 'customer.order', 'uses' => 'OrderController@getCustomerNewOrder']);

get('demo',['as' => 'demo', 'uses' => 'HomeController@demo']);

// Admin Users Routes
get('admin/user/new', ['as' => 'auth.signup', 'middleware' => 'role:admin', 'uses' => 'HomeController@getNewUser']);
post('admin/user/new', ['as' => 'auth.register', 'middleware' => 'role:admin', 'uses' => 'HomeController@postNewUser']);

// Customers Routes
get('admin/customer/new',['as' => 'customer.new', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@getNewCustomer']);
get('admin/customers',['as' => 'customer.list', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@getCustomerList']);
get('admin/customer/edit/{id}',['as' => 'customer.edit', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@getCustomerEdit']);
get('admin/customer/detail/{id}',['as' => 'customer.detail', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@getCustomerDetail']);
get('admin/customer/order/{id}',['as' => 'customer.orderlist', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@getCustomerOrder']);
get('admin/customer/delete/{id}',['as' => 'customer.delete', 'middleware' => 'role:admin', 'uses' => 'CustomerController@getCustomerDelete']);
post('admin/customer',['as' => 'customer.post_new', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@postNewCustomer']);
post('admin/customer/edit',['as' => 'customer.post_edit', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@postCustomerEdit']);
post('admin/customer/detail/{id}/photo',['as' => 'customer.photo', 'middleware' => 'role:admin|cashier', 'uses' => 'CustomerController@postCustomerDetailPhoto']);

// Orders Routes
get('admin/order/new',['as' => 'order.new', 'middleware' => 'role:admin|cashier', 'uses' => 'OrderController@getNewOrder']);
get('admin/orders',['as' => 'order.list', 'middleware' => 'role:admin|cashier', 'uses' => 'OrderController@getOrderList']);
get('admin/order/print/{id}',['as' => 'order.print', 'middleware' => 'role:admin|cashier', 'uses' => 'OrderController@getOrderPrint']);
get('admin/order/cancel/{id}',['as' => 'order.cancel', 'middleware' => 'role:admin', 'uses' => 'OrderController@getOrderCancel']);
post('admin/order',['as' => 'order.post_new', 'middleware' => 'role:admin|cashier', 'uses' => 'OrderController@postNewOrder']);

// Rollovers Routes
get('admin/rollover/new',['as' => 'rollover.new', 'middleware' => 'role:admin', 'uses' => 'RolloverController@getNewRollover']);
get('admin/rollovers',['as' => 'rollover.list', 'middleware' => 'role:admin', 'uses' => 'RolloverController@getRolloverList']);
get('admin/rollover/cancel/{id}',['as' => 'rollover.cancel', 'middleware' => 'role:admin', 'uses' => 'RolloverController@getRolloverCancel']);
post('admin/rollover',['as' => 'rollover.post_new', 'middleware' => 'role:admin', 'uses' => 'RolloverController@postNewRollover']);


// Authentication routes...
get('auth/login', ['as' => 'auth.signin', 'uses' => 'Auth\AuthController@getLogin']);
post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
