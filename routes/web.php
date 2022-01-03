<?php

use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalidadeController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/contact', function () {
    return view('contato');
});

Auth::routes();

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/error', function () {
        return view('errors.404');
    });
    Route::get('/updates', function () {
        return view('updates');
    });
    Route::resource('message', 'NotesController');
    Route::resource('prayer', 'Requests_PrayerController');

    //para pegar a localizacao via ajax
    Route::post('api/fetch-states', [LocalidadeController::class, 'fetchState']);
    Route::post('api/fetch-cities', [LocalidadeController::class, 'fetchCity']);

    // account e tenant
    Route::post('/tenant/{id}', 'TenantController@tenant')->name('tenant');
    Route::resources([
        'account' => InstitutionsController::class,
    ]);
    //profile
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('profile/change', 'ProfileController@change')->name('changeLang');
    Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');

    // settings
    Route::get('settings', 'ConfigSystemController@index')->name('settings');
    Route::get('settings/system', 'ConfigSystemController@indexSystem')->name('indexSystem');
    Route::post('settings/updatesystem', 'ConfigSystemController@updateSystem')->name('settings.updateSystem');
    Route::get('settings/meta', 'ConfigSystemController@indexMeta')->name('indexMeta');
    Route::post('settings/updatemeta', 'ConfigSystemController@updateMeta')->name('settings.updateMeta');
    Route::get('settings/email', 'ConfigSystemController@indexEmail')->name('indexEmail');
    Route::post('settings/updateemail', 'ConfigSystemController@updateEmail')->name('settings.updateEmail');
    Route::get('settings/social', 'ConfigSystemController@indexSocial')->name('indexSocial');
    Route::post('settings/updatesocial', 'ConfigSystemController@updateSocial')->name('settings.updateSocial');
    Route::resource('settings/roles',        'RolesController');
    Route::resource('settings/mail',        'MailController');

    //dash
    Route::resource('dashboard',        'DashController');
    Route::resource('home',        'HomeController');
    Route::get('dados/meus-dizimos', 'HomeController@indexDizimos')->name('indexDizimos');
    Route::get('dados/meus-grupos', 'HomeController@indexGrupos')->name('indexGrupos');
    Route::get('dados/meus-dados', 'HomeController@indexDados')->name('indexDados');
    Route::get('dados/oracoes', 'HomeController@indexOracao')->name('indexOracao');
    Route::get('eventos', 'HomeController@indexEventos')->name('indexEventos');
    Route::post('eventos/confirm/{id}', 'FullCalenderController@storeConfirm')->name('calendar.storeConfirm');
    Route::get('recado/{id}', 'NotesController@showUser')->name('Notes.show');

    //importar e exportar pessoas
    Route::resource('settings/backup', 'BackupController');
    Route::get('export',        'BackupController@export')->name('export');
    Route::post('import',        'BackupController@import')->name('import');

    //calendar
    Route::get('calender', [FullCalenderController::class, 'index'])->name('calender.index');
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    Route::get('calender/create', 'FullCalenderController@create')->name('calender.create');
    Route::post('calender', 'FullCalenderController@store')->name('calender.store');
    Route::get('calender/{id}', 'FullCalenderController@edit')->name('calender.edit');
    Route::put('calender/{id}', 'FullCalenderController@update')->name('calender.update');

    //sistema financeiro
    Route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');
    Route::get('historic', 'BalanceController@historic')->name('admin.historic');

    Route::post('withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    Route::get('depositar', 'BalanceController@depositar')->name('balance.depositar');
    Route::post('deposit', 'BalanceController@depositStore')->name('deposit.store');

    Route::get('/select2-autocomplete-people', 'BalanceController@dataAjax');
    Route::get('financial', 'BalanceController@index')->name('deposit.balance');
    Route::get('financial/{id}', 'BalanceController@show')->name('financial.show');

    //post e timeline em testes
    Route::get('/timeline', [TimelineController::class, 'getArticles'])->name('timeline.index');
    Route::get('timeline/{post}', [TimelineController::class, 'show'])->name('timeline.show');
    Route::post('timeline/{post}/reaction', [ReactionsController::class, 'toggle'])->middleware('auth');
    Route::post('timeline', 'TimelineController@store')->name('post.store');
    Route::post('timeline/{post}', 'CommentController@store')->name('timeline.store');
    Route::post('comment/{post}', 'CommentController@update')->name('comment.update');
    Route::delete('comment/{id}', 'CommentController@destroy')->name('comment.destroy');
    Route::get('comment/{id}/edit', 'CommentController@edit')->name('comment.edit');

});

//pessoas
Route::get('people', 'PeoplesController@index')->name('people.index');
Route::get('people/create', 'PeoplesController@create')->name('people.create');
Route::post('people', 'PeoplesController@store')->name('people.store');
Route::get('people/{id}', 'PeoplesController@show')->name('people.show');
Route::get('people/{id}/edit', 'PeoplesController@edit')->name('people.edit');
Route::put('people/{id}', 'PeoplesController@update')->name('people.update');
Route::any('people-search', 'PeoplesController@searchHistoric')->name('people.search');
Route::delete('people/{id}/{user_id}', 'PeoplesController@destroy')->name('people.destroy');

//pessoas_precadastro
Route::get('peopleList', 'Peoples_PrecadastroController@index')->name('peopleList.index');
Route::any('peoplesList/{id}', 'Peoples_PrecadastroController@update')->name('peopleList.update');
Route::get('peopleList/{id}/edit', 'Peoples_PrecadastroController@edit')->name('peopleList.edit');
Route::any('peopleList-search', 'Peoples_PrecadastroController@searchHistoric')->name('peopleList.search');
Route::delete('peopleList/{id}', 'Peoples_PrecadastroController@reprovar')->name('peopleList.reprovar');

//grupos
Route::get('group', 'GroupsController@index')->name('group.index');
Route::get('group/create', 'GroupsController@create')->name('group.create');
Route::post('group', 'GroupsController@store')->name('group.store');
Route::post('grouppessoa', 'GroupsController@storepeoplegroup')->name('group.storepeoplegroup');
Route::get('group/{id}/edit', 'GroupsController@edit')->name('group.edit');
Route::get('group/{id}', 'GroupsController@show')->name('group.show');
Route::put('group/{id}', 'GroupsController@update')->name('group.update');
Route::any('group-search', 'GroupsController@searchHistoric')->name('group.search');
Route::delete('group/{id}', 'GroupsController@destroy')->name('group.destroy');
Route::delete('group/{id}/delete', 'GroupsController@destroygroup')->name('group.destroygroup');

//pre-cadastro - wizard
Route::get('wizardList', 'WizardController@index')->name('wizard.index');
Route::any('wizardList-search', 'WizardController@searchAccount')->name('wizard.search');
Route::post('wizard', 'WizardController@store')->name('wizard.store');
Route::get('wizard', 'WizardController@create')->name('wizard.create');
Route::post('/tenantWizard/{id}', 'WizardController@tenantWizard')->name('tenantWizard');

//reports
Route::get('report', 'ReportController@index')->name('report.index');
Route::any('report/financial/search', 'ReportController@searchFinancial')->name('financialrep.search');
Route::get('report/financial', 'ReportController@Financial')->name('financial.Financial');
Route::any('report/people/search', 'ReportController@searchPeople')->name('peoplerep.search');
Route::get('report/people', 'ReportController@People')->name('people.Financial');
Route::any('report/group/search', 'ReportController@searchGroup')->name('grouprep.search');
Route::get('report/group', 'ReportController@Group')->name('group.Financial');
Route::get('report/peoplelocation', 'ReportController@Location')->name('location.index');

Route::get('/license', 'InstitutionsController@license_index')->name('license_index');

Route::prefix('media')->group(function () {
    Route::get('/',                 'MediaController@index')->name('media.folder.index');
    Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
    Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
    Route::get('/folder',           'MediaController@folder')->name('media.folder');
    Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
    Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

    Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
    Route::get('/file',             'MediaController@file');
    Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
    Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
    Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
    Route::post('/file/cropp',      'MediaController@cropp');
    Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('bread',  'BreadController');   //create BREAD (resource)
    Route::resource('users',        'UsersController')->except(['create', 'store']);
    Route::resource('mail',        'MailController');
    Route::get('prepareSend/{id}',        'MailController@prepareSend')->name('prepareSend');
    Route::post('mailSend/{id}',        'MailController@send')->name('mailSend');
    Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
    Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
    Route::prefix('menu/element')->group(function () {
        Route::get('/',             'MenuElementController@index')->name('menu.index');
        Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
        Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
        Route::get('/create',       'MenuElementController@create')->name('menu.create');
        Route::post('/store',       'MenuElementController@store')->name('menu.store');
        Route::get('/get-parents',  'MenuElementController@getParents');
        Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
        Route::post('/update',      'MenuElementController@update')->name('menu.update');
        Route::get('/show',         'MenuElementController@show')->name('menu.show');
        Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
    });
    Route::prefix('menu/menu')->group(function () {
        Route::get('/',         'MenuController@index')->name('menu.menu.index');
        Route::get('/create',   'MenuController@create')->name('menu.menu.create');
        Route::post('/store',   'MenuController@store')->name('menu.menu.store');
        Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
        Route::post('/update',  'MenuController@update')->name('menu.menu.update');
        Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
    });
    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);
    //logs
    Route::get('logs', 'LogsController@index')->name('logs.index');
    Route::get('logs/{id}', 'LogsController@show')->name('logs.show');
    Route::get('log', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    //cache teste
    Route::get('/clear-cache-all', function() {
        Artisan::call('cache:clear');
        dd("Cache Clear All");
    });
});
