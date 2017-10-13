

/**
 * user
 */
Route::get('user', 'UserController@index')->name('admin.user.index');
Route::get('user/create', 'UserController@create')->name('admin.user.create');
Route::post('user/create', 'UserController@store')->name('admin.user.create');
Route::get('user/{id}/edit', 'UserController@edit')->name('admin.user.edit');
Route::post('user/{id}/edit', 'UserController@update')->name('admin.user.edit');
Route::get('user/{id}/destroy', 'UserController@destroy')->name('admin.user.destroy');
/**
 * Address
 */
Route::get('user/address', 'UserAddressController@index')->name('admin.user.address');
// Route::get('user/address/create', 'UserAddressController@create')->name('admin.user.address.create');
Route::post('user/address/store', 'UserAddressController@store')->name('admin.user.address.store');
// Route::get('user/address/{id}/edit', 'UserAddressController@edit')->name('admin.user.address.edit');
Route::post('user/address/{id}/update', 'UserAddressController@update')->name('admin.user.address.update');
Route::get('user/address/{id}/destroy', 'UserAddressController@destroy')->name('admin.user.address.destroy');

