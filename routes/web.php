<?php
Route :: prefix('admin') -> group(function() {
	Route :: get('/login', 'AAdminController@getLogin') -> name('adminLogin');
	Route :: post('/login', 'AAdminController@login') -> name('adminLoginUpdate');
});


Route :: group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
	Route :: get('/', 'AController@getDefaultPage') -> name('adminDefaultPage');

	Route :: get('/logout', 'AAdminController@logout') -> name('logout');


	Route :: prefix('admins') -> group(function() {
		Route :: get('', 'AAdminController@getStartPoint') -> name('adminStartPoint');
		Route :: get('/add', 'AAdminController@add') -> name('adminAdd');
		Route :: get('/{id}', 'AAdminController@edit') -> name('adminEdit');
		Route :: post('/{id}', 'AAdminController@update') -> name('adminUpdate');
		Route :: get('/{id}/delete', 'AAdminController@delete') -> name('adminDelete');
	});
	
	
	Route :: prefix('modules') -> group(function() {
		Route :: get('', 'AModuleController@getStartPoint') -> name('moduleStartPoint');
		Route :: get('/add', 'AModuleController@add') -> name('moduleAdd');
		Route :: get('/{id}', 'AModuleController@edit') -> name('moduleEdit');
		Route :: post('/{id}', 'AModuleController@update') -> name('moduleUpdate');
		Route :: get('/{id}/delete', 'AModuleController@delete') -> name('moduleDelete');
		
		Route :: get('/{moduleId}/add', 'AModuleStepController@add') -> name('moduleStepAdd');
		Route :: get('/{moduleId}/{id}', 'AModuleStepController@edit') -> name('moduleStepEdit');
		Route :: post('/{moduleId}/{id}', 'AModuleStepController@update') -> name('moduleStepUpdate');
		Route :: get('/{moduleId}/{id}/delete', 'AModuleStepController@delete') -> name('moduleStepDelete');
		
		
		Route :: get('/{moduleId}/{stepId}/add', 'AModuleBlockController@add') -> name('moduleBlockAdd');
		Route :: get('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@edit') -> name('moduleBlockEdit');
		Route :: post('/{moduleId}/{stepId}/{id}', 'AModuleBlockController@update') -> name('moduleBlockUpdate');
		Route :: get('/{moduleId}/{stepId}/{id}/delete', 'AModuleBlockController@delete') -> name('moduleBlockDelete');
	});


	Route :: prefix('bsc') -> group(function() {
		Route :: get('', 'ABscController@getStartPoint') -> name('bscStartPoint');
		Route :: get('/add', 'ABscController@add') -> name('bscAdd');
		Route :: get('/{id}', 'ABscController@edit') -> name('bscEdit');
		Route :: post('/{id}', 'ABscController@update') -> name('bscUpdate');
		Route :: get('/{id}/delete', 'ABscController@delete') -> name('bscDelete');
	});


	Route :: prefix('bsw') -> group(function() {
		Route :: get('', 'ABswController@getStartPoint') -> name('bswStartPoint');
		Route :: get('/add', 'ABswController@add') -> name('bswAdd');
		Route :: get('/{id}', 'ABswController@edit') -> name('bswEdit');
		Route :: post('/{id}', 'ABswController@update') -> name('bswUpdate');
		Route :: get('/{id}/delete', 'ABswController@delete') -> name('bswDelete');
	});
	
	
	Route :: prefix('languages') -> group(function() {
		Route :: get('', 'ALanguageController@getStartPoint') -> name('languageStartPoint');
		Route :: post('', 'ALanguageController@updateStartPoint') -> name('languageStartPointPost');
		Route :: get('/add', 'ALanguageController@add') -> name('languageAdd');
		Route :: get('/{id}', 'ALanguageController@edit') -> name('languageEdit');
		Route :: post('/{id}', 'ALanguageController@update') -> name('languageUpdate');
		Route :: get('/{id}/delete', 'ALanguageController@delete') -> name('languageDelete');
	});
 

	Route :: get('/{moduleAlias}', 'ACoreController@getStep0') -> name('coreGetStep0');
	Route :: get('/{moduleAlias}/add', 'ACoreController@addStep0') -> name('coreAddStep0');
	Route :: get('/{moduleAlias}/{id}', 'ACoreController@editStep0') -> name('coreEditStep0');
	Route :: post('/{moduleAlias}/{id}', 'ACoreController@updateStep0') -> name('coreUpdateStep0');
	Route :: get('/{moduleAlias}/{id}/delete', 'ACoreController@deleteStep0') -> name('coreDeleteStep0');

	Route :: get('/{moduleAlias}/{parent}/add', 'ACoreController@addStep1') -> name('coreAddStep1');
	Route :: get('/{moduleAlias}/{parent}/{id}', 'ACoreController@editStep1') -> name('coreEditStep1');
	Route :: post('/{moduleAlias}/{parent}/{id}', 'ACoreController@updateStep1') -> name('coreUpdateStep1');
	Route :: get('/{moduleAlias}/{parent}/{id}/delete', 'ACoreController@deleteStep1') -> name('coreDeleteStep1');

	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/add', 'ACoreController@addStep2') -> name('coreAddStep2');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}', 'ACoreController@editStep2') -> name('coreEditStep2');
	Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}', 'ACoreController@updateStep2') -> name('coreUpdateStep2');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{id}/delete', 'ACoreController@deleteStep2') -> name('coreDeleteStep2');

	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/add', 'ACoreController@addStep3') -> name('coreAddStep3');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}', 'ACoreController@editStep3') -> name('coreEditStep3');
	Route :: post('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}', 'ACoreController@updateStep3') -> name('coreUpdateStep3');
	Route :: get('/{moduleAlias}/{parentFirst}/{parentSecond}/{parentThird}/{id}/delete', 'ACoreController@deleteStep3') -> name('coreDeleteStep3');


	// Ajax
		Route :: post('/set-rangs', 'ARangController@set');
	// 
});
 
Route::get('/image-upload', 'ImageUploadController@img_upload')->name("img.upload");
Route::post('/imgstore', 'ImageUploadController@imagestore')->name("img.store");

// Auth :: routes();


Route :: get('/', 'PageController@getDefaultPageWithDefaultLanguage') -> name('main');

// Route :: get('/logout', function() {
// 	Auth :: logout();

// 	return redirect() -> route('main');
// }) -> name('logout');



Route :: get('/{lang}', 'PageController@getDefaultPage') -> where('lang', '[a-z]+');
Route :: get('/{lang}/{pageAlias}', 'PageController@getPage') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё-]+']);
Route :: get('/{lang}/{pageAlias}/{step0Alias}', 'PageController@getStep0') -> where(['lang' => '[a-z]+', 'pageAlias' => '[a-zა-ჰа-яё-]+', 'step0Alias' => '[a-zა-ჰа-яё-]+']);