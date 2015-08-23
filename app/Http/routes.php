<?php

get('/', ['as' => 'home', 'uses' => 'HomeController@home']);
get('dashboard',['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
get('admin/users',['as' => 'user.list', 'uses' => 'HomeController@users']);
get('admin/edit/{id}',['as' => 'user.edit', 'uses' => 'HomeController@getEdit']);
post('admin/edit',['as' => 'user.post_edit', 'uses' => 'HomeController@postEdit']);

get('demo',['as' => 'demo', 'uses' => 'HomeController@demo']);

// Customers Routes
get('admin/customer/new',['as' => 'customer.new', 'uses' => 'CustomerController@getNewCustomer']);
get('admin/customers',['as' => 'customer.list', 'uses' => 'CustomerController@getCustomerList']);
get('admin/customer/edit/{id}',['as' => 'customer.edit', 'uses' => 'CustomerController@getCustomerEdit']);
post('admin/customer',['as' => 'customer.post_new', 'uses' => 'CustomerController@postNewCustomer']);
post('admin/customer/edit',['as' => 'customer.post_edit', 'uses' => 'CustomerController@postCustomerEdit']);

// Orders Routes
get('admin/order/new',['as' => 'order.new', 'uses' => 'OrderController@getNewOrder']);
get('admin/orders',['as' => 'order.list', 'uses' => 'OrderController@getOrderList']);
get('admin/order/print/{id}',['as' => 'order.print', 'uses' => 'OrderController@getOrderPrint']);
post('admin/order',['as' => 'order.post_new', 'uses' => 'OrderController@postNewOrder']);


// Authentication routes...
get('auth/login', ['as' => 'auth.signin', 'uses' => 'Auth\AuthController@getLogin']);
post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
get('auth/register', ['as' => 'auth.signup', 'uses' => 'Auth\AuthController@getRegister']);
post('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);