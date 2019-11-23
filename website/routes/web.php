<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->namespace('index_page')->prefix('admin/index')->group(function () {
    Route::resource('/primary', 'PrimaryController');
    Route::resource('/slider1', 'Slider1Controller');
    Route::resource('/ourDescription', 'OurDescriptionController');
    Route::resource('/customerSay', 'CustomerSayController');
    Route::resource('/free_advice', 'FreeAdviceController');
});
Route::middleware('auth')->namespace('blog')->prefix('admin')->group(function () {
    Route::resource('/blog', 'BlogController');
    Route::resource('/blog_message', 'BlogCommentController');
    Route::get('/blogCategory', 'BlogController@showCategory');
    Route::get('/blogTag', 'BlogController@showTag');
    Route::post('/blog/addCategory', 'BlogController@addCategory')->name('addCat');
    Route::post('/blog/addTag', 'BlogController@addTag')->name('addTag');
    Route::get('/blog/showTag/{id}', 'BlogController@showTagEdit')->name('showTag');
    Route::get('/blog/showCategory/{id}', 'BlogController@showCategoryEdit')->name('showCat');
    Route::post('/blog/editCategory/{id}', 'BlogController@editCategory')->name('editCat');
    Route::post('/blog/editTag/{id}', 'BlogController@editTag')->name('editTag');
    Route::post('/blog/removeCategory/{id}', 'BlogController@removeCategory')->name('removeCat');
    Route::post('/blog/removeTag/{id}', 'BlogController@removeTag')->name('removeTag');
    Route::post('/blog/search', 'BlogController@search_blog')->name('search_blog');
});

Route::middleware('auth')->prefix('admin/info')->group(function () {
    Route::resource('/social_media', 'SocialMediaController');
    Route::resource('/setting', 'SettingController');
});

Route::middleware('auth')->namespace('service')->prefix('admin/service')->group(function () {
    Route::resource('/', 'ServiceController');
    Route::resource('/about-service', 'ServiceAboutController');
    Route::resource('/other-info', 'ServiceOtherInfoController');
    Route::resource('/steps', 'ServiceStepController');
    Route::resource('/result', 'ServiceResultController');
    Route::resource('/tariff', 'ServiceTariffController');
    Route::resource('/tariff_detail', 'TariffDetailController');
    Route::resource('/service-category', 'ServiceCategoryController');
});

Route::middleware('auth')->namespace('about_us')->prefix('admin/about_us')->group(function () {
    Route::resource('/aboutUs', 'AboutUsController');
    Route::resource('/aboutUsSkill', 'AboutUsSkillController');
    Route::resource('/ourTeam', 'OurTeamController');
    Route::resource('/partners', 'PartnerController');
    Route::post('/images/', 'AboutUsController@postImage');
});

Route::middleware('auth')->namespace('portfolio')->prefix('admin')->group(function () {
    Route::resource('/portfolio', 'PortfolioController');
    Route::resource('/portfolioCategory', 'PortfolioCategoryController');
});

Route::middleware('auth')->namespace('contact_us')->prefix('admin/contact-us')->group(function () {
    Route::resource('/info', 'ContactUsController');
    Route::resource('/message', 'MessageController');
    Route::post('/message_search', 'MessageController@message_search')->name('message_search');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('/role', 'RoleController');
    Route::resource('/permission', 'PermissionController');
    Route::resource('/admin', 'UserController');
});



/*                 front routes                        */
Route::namespace('front')->group(function () {
   Route::resource('/','IndexController');
//   Route::resource('/about-us','AboutController');
   Route::resource('/about_us','AboutController');
   Route::resource('/contact-us','ContactController');
   Route::resource('/portfolio','PortfolioController');
   Route::resource('/services','ServiceController');
   Route::resource('/blog','BlogController');
});

