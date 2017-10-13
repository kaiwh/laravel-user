

/**
 * 登录界面
 */
Route::get('login', 'UserLoginController@showLoginForm')->name('login');
Route::post('login', 'UserLoginController@login')->name('login');
/**
 * 注销
 */
Route::get('logout', 'UserLoginController@logout')->name('logout');
/**
 * 注册
 */
Route::get('register', 'UserRegisterController@showRegistrationForm')->name('register');
Route::post('register', 'UserRegisterController@register')->name('register');
Route::get('register/mobile', 'UserRegisterController@showMobileForm')->name('register.mobile');
Route::post('register/mobile', 'UserRegisterController@registerMobile');

/**
 * 忘记密码
 */
Route::get('forgot', 'UserForgotPasswordController@showLinkRequestForm')->name('forgot');
Route::post('forgot', 'UserForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'UserResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'UserResetPasswordController@reset');

/**
 * 修改资料
 */
Route::get('user/edit', 'UserEditController@index')->name('desktop.user.edit');
Route::post('user/edit', 'UserEditController@update');
/**
 * 修改密码
 */
Route::get('user/password', 'UserPasswordController@index')->name('desktop.user.password');
Route::post('user/password', 'UserPasswordController@update');
/**
 * 地址
 */
Route::get('user/address', 'UserAddressController@index')->name('desktop.user.address');
Route::get('user/address/create', 'UserAddressController@create')->name('desktop.user.address.create');
Route::post('user/address/create', 'UserAddressController@store')->name('desktop.user.address.create');
Route::get('user/address/{id}/edit', 'UserAddressController@edit')->name('desktop.user.address.edit');
Route::post('user/address/{id}/edit', 'UserAddressController@update')->name('desktop.user.address.edit');
Route::get('user/address/{id}/destroy', 'UserAddressController@destroy')->name('desktop.user.address.destroy');
Route::get('user/address/{id}/setDefault', 'UserAddressController@setDefault')->name('desktop.user.address.setDefault');
