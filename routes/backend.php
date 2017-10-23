<?php


Route::match(['get', 'post'], 'login', 'AuthController@login')->name('backend.login');

Route::match(['get', 'post'], 'register', 'AuthController@register')->name('backend.register');

Route::get('logout', 'AuthController@logout')->name('backend.logout');

Route::group(['middleware' => 'auth.backend'], function () {

    Route::post('upload', 'CommonController@upload')->name('backend.upload');

    Route::get('clear_cache', 'CommonController@clearCache')->name('backend.clear_cache');

    Route::match(['get', 'post'], 'setting', 'CommonController@setting')->name('backend.setting');

    Route::get('/', 'IndexController@index')->name('backend.index');

    Route::resource('page', 'PageController');
    Route::post('page/ajax_edit', 'PageController@ajaxEdit')->name('page.ajax_edit');
    Route::post('page/bulk', 'PageController@actionBulk')->name('page.bulk');

    Route::resource('post_catalog', 'PostCatalogController');
    Route::post('post_catalog/ajax_edit', 'PostCatalogController@ajaxEdit')->name('post_catalog.ajax_edit');
    Route::post('post_catalog/bulk', 'PostCatalogController@actionBulk')->name('post_catalog.bulk');

    Route::resource('post', 'PostController');
    Route::post('post/ajax_edit', 'PostController@ajaxEdit')->name('post.ajax_edit');
    Route::post('post/bulk', 'PostController@actionBulk')->name('post.bulk');

    Route::resource('recruit', 'RecruitController');
    Route::post('recruit/ajax_edit', 'RecruitController@ajaxEdit')->name('recruit.ajax_edit');
    Route::post('recruit/bulk', 'RecruitController@actionBulk')->name('recruit.bulk');

    Route::resource('ad_position', 'AdPositionController');
    Route::post('ad_position/ajax_edit', 'AdPositionController@ajaxEdit')->name('ad_position.ajax_edit');
    Route::post('ad_position/bulk', 'AdPositionController@actionBulk')->name('ad_position.bulk');

    Route::resource('ad', 'AdController');
    Route::post('ad/ajax_edit', 'AdController@ajaxEdit')->name('ad.ajax_edit');
    Route::post('ad/bulk', 'AdController@actionBulk')->name('ad.bulk');

    Route::resource('product_catalog', 'ProductCatalogController');
    Route::post('product_catalog/ajax_edit', 'ProductCatalogController@ajaxEdit')->name('product_catalog.ajax_edit');
    Route::post('product_catalog/bulk', 'ProductCatalogController@actionBulk')->name('product_catalog.bulk');

    Route::resource('product', 'ProductController');
    Route::post('product/ajax_edit', 'ProductController@ajaxEdit')->name('product.ajax_edit');
    Route::post('product/bulk', 'ProductController@actionBulk')->name('product.bulk');

    Route::resource('feedback', 'FeedbackController');
    Route::post('feedback/ajax_edit', 'FeedbackController@ajaxEdit')->name('feedback.ajax_edit');
    Route::post('feedback/bulk', 'FeedbackController@actionBulk')->name('feedback.bulk');

});