<?php

get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
get('dashboard',['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
get('admin/users',['as' => 'user.list', 'uses' => 'HomeController@users']);
get('admin/edit/{id}',['as' => 'user.edit', 'uses' => 'HomeController@getEdit']);
post('admin/edit',['as' => 'user.post_edit', 'uses' => 'HomeController@postEdit']);
get('admin/user/cashier',['as' => 'cashierdesk', 'uses' => 'HomeController@getCashierDesk']);
get('admin/profile/{id}',['as' => 'user.get_profile', 'uses' => 'HomeController@getProfileEdit']);
post('admin/profile/edit',['as' => 'user.post_profile', 'uses' => 'HomeController@postProfileEdit']);

get('admin/user/customerforcashier',['as' => 'customerforcashier', 'uses' => 'HomeController@getCustomerForCashierDesk']);
get('admin/user/order',['as' => 'customer.order', 'uses' => 'OrderController@getCustomerNewOrder']);

get('demo',['as' => 'demo', 'uses' => 'HomeController@demo']);

// Admin Users Routes
get('admin/user/new', ['as' => 'auth.signup', 'uses' => 'HomeController@getNewUser']);
post('admin/user/new', ['as' => 'auth.register', 'uses' => 'HomeController@postNewUser']);

// Customers Routes
get('admin/customer/new',['as' => 'customer.new', 'uses' => 'CustomerController@getNewCustomer']);
get('admin/customers',['as' => 'customer.list', 'uses' => 'CustomerController@getCustomerList']);
get('admin/customer/edit/{id}',['as' => 'customer.edit', 'uses' => 'CustomerController@getCustomerEdit']);
get('admin/customer/detail/{id}',['as' => 'customer.detail', 'uses' => 'CustomerController@getCustomerDetail']);
get('admin/customer/delete/{id}',['as' => 'customer.delete', 'uses' => 'CustomerController@getCustomerDelete']);
post('admin/customer',['as' => 'customer.post_new', 'uses' => 'CustomerController@postNewCustomer']);
post('admin/customer/edit',['as' => 'customer.post_edit', 'uses' => 'CustomerController@postCustomerEdit']);
post('admin/customer/detail/{id}/photo',['as' => 'customer.photo', 'uses' => 'CustomerController@postCustomerDetailPhoto']);

// Orders Routes
get('admin/order/new',['as' => 'order.new', 'uses' => 'OrderController@getNewOrder']);
get('admin/orders',['as' => 'order.list', 'uses' => 'OrderController@getOrderList']);
get('admin/order/print/{id}',['as' => 'order.print', 'uses' => 'OrderController@getOrderPrint']);
post('admin/order',['as' => 'order.post_new', 'uses' => 'OrderController@postNewOrder']);


// Authentication routes...
get('auth/login', ['as' => 'auth.signin', 'uses' => 'Auth\AuthController@getLogin']);
post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
