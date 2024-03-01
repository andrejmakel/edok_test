<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::post('permissions/parse-csv-import', 'PermissionsController@parseCsvImport')->name('permissions.parseCsvImport');
    Route::post('permissions/process-csv-import', 'PermissionsController@processCsvImport')->name('permissions.processCsvImport');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::post('roles/parse-csv-import', 'RolesController@parseCsvImport')->name('roles.parseCsvImport');
    Route::post('roles/process-csv-import', 'RolesController@processCsvImport')->name('roles.processCsvImport');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Stat
    Route::delete('stats/destroy', 'StatController@massDestroy')->name('stats.massDestroy');
    Route::post('stats/parse-csv-import', 'StatController@parseCsvImport')->name('stats.parseCsvImport');
    Route::post('stats/process-csv-import', 'StatController@processCsvImport')->name('stats.processCsvImport');
    Route::resource('stats', 'StatController');

    // Sender
    Route::delete('senders/destroy', 'SenderController@massDestroy')->name('senders.massDestroy');
    Route::post('senders/parse-csv-import', 'SenderController@parseCsvImport')->name('senders.parseCsvImport');
    Route::post('senders/process-csv-import', 'SenderController@processCsvImport')->name('senders.processCsvImport');
    Route::resource('senders', 'SenderController');

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::post('statuses/parse-csv-import', 'StatusController@parseCsvImport')->name('statuses.parseCsvImport');
    Route::post('statuses/process-csv-import', 'StatusController@processCsvImport')->name('statuses.processCsvImport');
    Route::resource('statuses', 'StatusController');

    // Postform
    Route::delete('postforms/destroy', 'PostformController@massDestroy')->name('postforms.massDestroy');
    Route::post('postforms/parse-csv-import', 'PostformController@parseCsvImport')->name('postforms.parseCsvImport');
    Route::post('postforms/process-csv-import', 'PostformController@processCsvImport')->name('postforms.processCsvImport');
    Route::resource('postforms', 'PostformController');

    // Query
    Route::delete('queries/destroy', 'QueryController@massDestroy')->name('queries.massDestroy');
    Route::post('queries/parse-csv-import', 'QueryController@parseCsvImport')->name('queries.parseCsvImport');
    Route::post('queries/process-csv-import', 'QueryController@processCsvImport')->name('queries.processCsvImport');
    Route::resource('queries', 'QueryController');

    // Input
    Route::delete('inputs/destroy', 'InputController@massDestroy')->name('inputs.massDestroy');
    Route::post('inputs/parse-csv-import', 'InputController@parseCsvImport')->name('inputs.parseCsvImport');
    Route::post('inputs/process-csv-import', 'InputController@processCsvImport')->name('inputs.processCsvImport');
    Route::resource('inputs', 'InputController');

    // Processed
    Route::delete('processeds/destroy', 'ProcessedController@massDestroy')->name('processeds.massDestroy');
    Route::post('processeds/parse-csv-import', 'ProcessedController@parseCsvImport')->name('processeds.parseCsvImport');
    Route::post('processeds/process-csv-import', 'ProcessedController@processCsvImport')->name('processeds.processCsvImport');
    Route::resource('processeds', 'ProcessedController');

    // Spracovanie
    Route::delete('spracovanies/destroy', 'SpracovanieController@massDestroy')->name('spracovanies.massDestroy');
    Route::post('spracovanies/parse-csv-import', 'SpracovanieController@parseCsvImport')->name('spracovanies.parseCsvImport');
    Route::post('spracovanies/process-csv-import', 'SpracovanieController@processCsvImport')->name('spracovanies.processCsvImport');
    Route::resource('spracovanies', 'SpracovanieController');

    // Ucto
    Route::delete('uctos/destroy', 'UctoController@massDestroy')->name('uctos.massDestroy');
    Route::post('uctos/media', 'UctoController@storeMedia')->name('uctos.storeMedia');
    Route::post('uctos/ckmedia', 'UctoController@storeCKEditorImages')->name('uctos.storeCKEditorImages');
    Route::post('uctos/parse-csv-import', 'UctoController@parseCsvImport')->name('uctos.parseCsvImport');
    Route::post('uctos/process-csv-import', 'UctoController@processCsvImport')->name('uctos.processCsvImport');
    Route::resource('uctos', 'UctoController');

    // E Schranka
    Route::delete('e-schrankas/destroy', 'ESchrankaController@massDestroy')->name('e-schrankas.massDestroy');
    Route::resource('e-schrankas', 'ESchrankaController');

    // Nasa
    Route::delete('nasas/destroy', 'NasaController@massDestroy')->name('nasas.massDestroy');
    Route::post('nasas/parse-csv-import', 'NasaController@parseCsvImport')->name('nasas.parseCsvImport');
    Route::post('nasas/process-csv-import', 'NasaController@processCsvImport')->name('nasas.processCsvImport');
    Route::resource('nasas', 'NasaController');

    // Firma
    Route::delete('firmas/destroy', 'FirmaController@massDestroy')->name('firmas.massDestroy');
    Route::post('firmas/media', 'FirmaController@storeMedia')->name('firmas.storeMedia');
    Route::post('firmas/ckmedia', 'FirmaController@storeCKEditorImages')->name('firmas.storeCKEditorImages');
    Route::post('firmas/parse-csv-import', 'FirmaController@parseCsvImport')->name('firmas.parseCsvImport');
    Route::post('firmas/process-csv-import', 'FirmaController@processCsvImport')->name('firmas.processCsvImport');
    Route::resource('firmas', 'FirmaController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Notices
    Route::delete('notices/destroy', 'NoticesController@massDestroy')->name('notices.massDestroy');
    Route::post('notices/parse-csv-import', 'NoticesController@parseCsvImport')->name('notices.parseCsvImport');
    Route::post('notices/process-csv-import', 'NoticesController@processCsvImport')->name('notices.processCsvImport');
    Route::resource('notices', 'NoticesController');

    // Call Typ
    Route::delete('call-typs/destroy', 'CallTypController@massDestroy')->name('call-typs.massDestroy');
    Route::post('call-typs/parse-csv-import', 'CallTypController@parseCsvImport')->name('call-typs.parseCsvImport');
    Route::post('call-typs/process-csv-import', 'CallTypController@processCsvImport')->name('call-typs.processCsvImport');
    Route::resource('call-typs', 'CallTypController');

    // Calls
    Route::delete('calls/destroy', 'CallsController@massDestroy')->name('calls.massDestroy');
    Route::post('calls/media', 'CallsController@storeMedia')->name('calls.storeMedia');
    Route::post('calls/ckmedia', 'CallsController@storeCKEditorImages')->name('calls.storeCKEditorImages');
    Route::resource('calls', 'CallsController');

    // Invoice Typ
    Route::delete('invoice-typs/destroy', 'InvoiceTypController@massDestroy')->name('invoice-typs.massDestroy');
    Route::post('invoice-typs/parse-csv-import', 'InvoiceTypController@parseCsvImport')->name('invoice-typs.parseCsvImport');
    Route::post('invoice-typs/process-csv-import', 'InvoiceTypController@processCsvImport')->name('invoice-typs.processCsvImport');
    Route::resource('invoice-typs', 'InvoiceTypController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::post('invoices/media', 'InvoicesController@storeMedia')->name('invoices.storeMedia');
    Route::post('invoices/ckmedia', 'InvoicesController@storeCKEditorImages')->name('invoices.storeCKEditorImages');
    Route::post('invoices/parse-csv-import', 'InvoicesController@parseCsvImport')->name('invoices.parseCsvImport');
    Route::post('invoices/process-csv-import', 'InvoicesController@processCsvImport')->name('invoices.processCsvImport');
    Route::resource('invoices', 'InvoicesController');

    // Insurance
    Route::delete('insurances/destroy', 'InsuranceController@massDestroy')->name('insurances.massDestroy');
    Route::post('insurances/parse-csv-import', 'InsuranceController@parseCsvImport')->name('insurances.parseCsvImport');
    Route::post('insurances/process-csv-import', 'InsuranceController@processCsvImport')->name('insurances.processCsvImport');
    Route::resource('insurances', 'InsuranceController');

    // Cars
    Route::delete('cars/destroy', 'CarsController@massDestroy')->name('cars.massDestroy');
    Route::post('cars/media', 'CarsController@storeMedia')->name('cars.storeMedia');
    Route::post('cars/ckmedia', 'CarsController@storeCKEditorImages')->name('cars.storeCKEditorImages');
    Route::resource('cars', 'CarsController');

    // Recipient
    Route::delete('recipients/destroy', 'RecipientController@massDestroy')->name('recipients.massDestroy');
    Route::post('recipients/parse-csv-import', 'RecipientController@parseCsvImport')->name('recipients.parseCsvImport');
    Route::post('recipients/process-csv-import', 'RecipientController@processCsvImport')->name('recipients.processCsvImport');
    Route::resource('recipients', 'RecipientController');

    // Outgoing Post
    Route::delete('outgoing-posts/destroy', 'OutgoingPostController@massDestroy')->name('outgoing-posts.massDestroy');
    Route::post('outgoing-posts/media', 'OutgoingPostController@storeMedia')->name('outgoing-posts.storeMedia');
    Route::post('outgoing-posts/ckmedia', 'OutgoingPostController@storeCKEditorImages')->name('outgoing-posts.storeCKEditorImages');
    Route::resource('outgoing-posts', 'OutgoingPostController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Upload
    Route::delete('uploads/destroy', 'UploadController@massDestroy')->name('uploads.massDestroy');
    Route::post('uploads/media', 'UploadController@storeMedia')->name('uploads.storeMedia');
    Route::post('uploads/ckmedia', 'UploadController@storeCKEditorImages')->name('uploads.storeCKEditorImages');
    Route::resource('uploads', 'UploadController');

    // Bank
    Route::delete('banks/destroy', 'BankController@massDestroy')->name('banks.massDestroy');
    Route::post('banks/parse-csv-import', 'BankController@parseCsvImport')->name('banks.parseCsvImport');
    Route::post('banks/process-csv-import', 'BankController@processCsvImport')->name('banks.processCsvImport');
    Route::resource('banks', 'BankController');

    // Teams
    Route::delete('teams/destroy', 'TeamsController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamsController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamsController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::post('teams/parse-csv-import', 'TeamsController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamsController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamsController');

    // Typ
    Route::delete('typs/destroy', 'TypController@massDestroy')->name('typs.massDestroy');
    Route::post('typs/parse-csv-import', 'TypController@parseCsvImport')->name('typs.parseCsvImport');
    Route::post('typs/process-csv-import', 'TypController@processCsvImport')->name('typs.processCsvImport');
    Route::resource('typs', 'TypController');

    // Znacka
    Route::delete('znackas/destroy', 'ZnackaController@massDestroy')->name('znackas.massDestroy');
    Route::post('znackas/parse-csv-import', 'ZnackaController@parseCsvImport')->name('znackas.parseCsvImport');
    Route::post('znackas/process-csv-import', 'ZnackaController@processCsvImport')->name('znackas.processCsvImport');
    Route::resource('znackas', 'ZnackaController');

    // E Post
    Route::delete('e-posts/destroy', 'EPostController@massDestroy')->name('e-posts.massDestroy');
    Route::post('e-posts/media', 'EPostController@storeMedia')->name('e-posts.storeMedia');
    Route::post('e-posts/ckmedia', 'EPostController@storeCKEditorImages')->name('e-posts.storeCKEditorImages');
    Route::resource('e-posts', 'EPostController');

    // Dok Typ
    Route::delete('dok-typs/destroy', 'DokTypController@massDestroy')->name('dok-typs.massDestroy');
    Route::post('dok-typs/parse-csv-import', 'DokTypController@parseCsvImport')->name('dok-typs.parseCsvImport');
    Route::post('dok-typs/process-csv-import', 'DokTypController@processCsvImport')->name('dok-typs.processCsvImport');
    Route::resource('dok-typs', 'DokTypController');

    // Dok Kat
    Route::delete('dok-kats/destroy', 'DokKatController@massDestroy')->name('dok-kats.massDestroy');
    Route::post('dok-kats/parse-csv-import', 'DokKatController@parseCsvImport')->name('dok-kats.parseCsvImport');
    Route::post('dok-kats/process-csv-import', 'DokKatController@processCsvImport')->name('dok-kats.processCsvImport');
    Route::resource('dok-kats', 'DokKatController');

    // Lang
    Route::delete('langs/destroy', 'LangController@massDestroy')->name('langs.massDestroy');
    Route::resource('langs', 'LangController');

    // Sidlo
    Route::delete('sidlos/destroy', 'SidloController@massDestroy')->name('sidlos.massDestroy');
    Route::post('sidlos/parse-csv-import', 'SidloController@parseCsvImport')->name('sidlos.parseCsvImport');
    Route::post('sidlos/process-csv-import', 'SidloController@processCsvImport')->name('sidlos.processCsvImport');
    Route::resource('sidlos', 'SidloController');

    // Acc Company
    Route::delete('acc-companies/destroy', 'AccCompanyController@massDestroy')->name('acc-companies.massDestroy');
    Route::post('acc-companies/parse-csv-import', 'AccCompanyController@parseCsvImport')->name('acc-companies.parseCsvImport');
    Route::post('acc-companies/process-csv-import', 'AccCompanyController@processCsvImport')->name('acc-companies.processCsvImport');
    Route::resource('acc-companies', 'AccCompanyController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Stat
    Route::delete('stats/destroy', 'StatController@massDestroy')->name('stats.massDestroy');
    Route::resource('stats', 'StatController');

    // Sender
    Route::delete('senders/destroy', 'SenderController@massDestroy')->name('senders.massDestroy');
    Route::resource('senders', 'SenderController');

    // Status
    Route::delete('statuses/destroy', 'StatusController@massDestroy')->name('statuses.massDestroy');
    Route::resource('statuses', 'StatusController');

    // Postform
    Route::delete('postforms/destroy', 'PostformController@massDestroy')->name('postforms.massDestroy');
    Route::resource('postforms', 'PostformController');

    // Query
    Route::delete('queries/destroy', 'QueryController@massDestroy')->name('queries.massDestroy');
    Route::resource('queries', 'QueryController');

    // Input
    Route::delete('inputs/destroy', 'InputController@massDestroy')->name('inputs.massDestroy');
    Route::resource('inputs', 'InputController');

    // Processed
    Route::delete('processeds/destroy', 'ProcessedController@massDestroy')->name('processeds.massDestroy');
    Route::resource('processeds', 'ProcessedController');

    // Spracovanie
    Route::delete('spracovanies/destroy', 'SpracovanieController@massDestroy')->name('spracovanies.massDestroy');
    Route::resource('spracovanies', 'SpracovanieController');

    // Ucto
    Route::delete('uctos/destroy', 'UctoController@massDestroy')->name('uctos.massDestroy');
    Route::post('uctos/media', 'UctoController@storeMedia')->name('uctos.storeMedia');
    Route::post('uctos/ckmedia', 'UctoController@storeCKEditorImages')->name('uctos.storeCKEditorImages');
    Route::resource('uctos', 'UctoController');

    // E Schranka
    Route::delete('e-schrankas/destroy', 'ESchrankaController@massDestroy')->name('e-schrankas.massDestroy');
    Route::resource('e-schrankas', 'ESchrankaController');

    // Nasa
    Route::delete('nasas/destroy', 'NasaController@massDestroy')->name('nasas.massDestroy');
    Route::resource('nasas', 'NasaController');

    // Firma
    Route::delete('firmas/destroy', 'FirmaController@massDestroy')->name('firmas.massDestroy');
    Route::post('firmas/media', 'FirmaController@storeMedia')->name('firmas.storeMedia');
    Route::post('firmas/ckmedia', 'FirmaController@storeCKEditorImages')->name('firmas.storeCKEditorImages');
    Route::resource('firmas', 'FirmaController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');

    // Notices
    Route::delete('notices/destroy', 'NoticesController@massDestroy')->name('notices.massDestroy');
    Route::resource('notices', 'NoticesController');

    // Call Typ
    Route::delete('call-typs/destroy', 'CallTypController@massDestroy')->name('call-typs.massDestroy');
    Route::resource('call-typs', 'CallTypController');

    // Calls
    Route::delete('calls/destroy', 'CallsController@massDestroy')->name('calls.massDestroy');
    Route::post('calls/media', 'CallsController@storeMedia')->name('calls.storeMedia');
    Route::post('calls/ckmedia', 'CallsController@storeCKEditorImages')->name('calls.storeCKEditorImages');
    Route::resource('calls', 'CallsController');

    // Invoice Typ
    Route::delete('invoice-typs/destroy', 'InvoiceTypController@massDestroy')->name('invoice-typs.massDestroy');
    Route::resource('invoice-typs', 'InvoiceTypController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::post('invoices/media', 'InvoicesController@storeMedia')->name('invoices.storeMedia');
    Route::post('invoices/ckmedia', 'InvoicesController@storeCKEditorImages')->name('invoices.storeCKEditorImages');
    Route::resource('invoices', 'InvoicesController');

    // Insurance
    Route::delete('insurances/destroy', 'InsuranceController@massDestroy')->name('insurances.massDestroy');
    Route::resource('insurances', 'InsuranceController');

    // Cars
    Route::delete('cars/destroy', 'CarsController@massDestroy')->name('cars.massDestroy');
    Route::post('cars/media', 'CarsController@storeMedia')->name('cars.storeMedia');
    Route::post('cars/ckmedia', 'CarsController@storeCKEditorImages')->name('cars.storeCKEditorImages');
    Route::resource('cars', 'CarsController');

    // Recipient
    Route::delete('recipients/destroy', 'RecipientController@massDestroy')->name('recipients.massDestroy');
    Route::resource('recipients', 'RecipientController');

    // Outgoing Post
    Route::delete('outgoing-posts/destroy', 'OutgoingPostController@massDestroy')->name('outgoing-posts.massDestroy');
    Route::post('outgoing-posts/media', 'OutgoingPostController@storeMedia')->name('outgoing-posts.storeMedia');
    Route::post('outgoing-posts/ckmedia', 'OutgoingPostController@storeCKEditorImages')->name('outgoing-posts.storeCKEditorImages');
    Route::resource('outgoing-posts', 'OutgoingPostController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Upload
    Route::delete('uploads/destroy', 'UploadController@massDestroy')->name('uploads.massDestroy');
    Route::post('uploads/media', 'UploadController@storeMedia')->name('uploads.storeMedia');
    Route::post('uploads/ckmedia', 'UploadController@storeCKEditorImages')->name('uploads.storeCKEditorImages');
    Route::resource('uploads', 'UploadController');

    // Bank
    Route::delete('banks/destroy', 'BankController@massDestroy')->name('banks.massDestroy');
    Route::resource('banks', 'BankController');

    // Teams
    Route::delete('teams/destroy', 'TeamsController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamsController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamsController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::resource('teams', 'TeamsController');

    // Typ
    Route::delete('typs/destroy', 'TypController@massDestroy')->name('typs.massDestroy');
    Route::resource('typs', 'TypController');

    // Znacka
    Route::delete('znackas/destroy', 'ZnackaController@massDestroy')->name('znackas.massDestroy');
    Route::resource('znackas', 'ZnackaController');

    // E Post
    Route::delete('e-posts/destroy', 'EPostController@massDestroy')->name('e-posts.massDestroy');
    Route::post('e-posts/media', 'EPostController@storeMedia')->name('e-posts.storeMedia');
    Route::post('e-posts/ckmedia', 'EPostController@storeCKEditorImages')->name('e-posts.storeCKEditorImages');
    Route::resource('e-posts', 'EPostController');

    // Dok Typ
    Route::delete('dok-typs/destroy', 'DokTypController@massDestroy')->name('dok-typs.massDestroy');
    Route::resource('dok-typs', 'DokTypController');

    // Dok Kat
    Route::delete('dok-kats/destroy', 'DokKatController@massDestroy')->name('dok-kats.massDestroy');
    Route::resource('dok-kats', 'DokKatController');

    // Lang
    Route::delete('langs/destroy', 'LangController@massDestroy')->name('langs.massDestroy');
    Route::resource('langs', 'LangController');

    // Sidlo
    Route::delete('sidlos/destroy', 'SidloController@massDestroy')->name('sidlos.massDestroy');
    Route::resource('sidlos', 'SidloController');

    // Acc Company
    Route::delete('acc-companies/destroy', 'AccCompanyController@massDestroy')->name('acc-companies.massDestroy');
    Route::resource('acc-companies', 'AccCompanyController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
