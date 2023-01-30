<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessagesController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HowItWorksController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MainBannerController;
use App\Http\Controllers\MemberDetailsController;
use App\Http\Controllers\MemberSkillController;
use App\Http\Controllers\OurHelpController;
use App\Http\Controllers\OurPartnerController;
use App\Http\Controllers\OuterBannerController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceListController;
use App\Http\Controllers\ServicesToChooseUsController;
use App\Http\Controllers\SocialInfoController;
use App\Http\Controllers\TeamMottoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('front.home');
Route::get('/company/about_us', [App\Http\Controllers\Frontend\IndexController::class, 'about_us'])->name('front.about_us');
Route::get('/company/our_team', [App\Http\Controllers\Frontend\IndexController::class, 'our_team'])->name('front.our_team');
Route::get('/company/team_details/{slug}', [App\Http\Controllers\Frontend\IndexController::class, 'team_details'])->name('front.team_details');
Route::get('/service', [App\Http\Controllers\Frontend\IndexController::class, 'service'])->name('front.service');
Route::get('/service/{slug}/{id}', [App\Http\Controllers\Frontend\IndexController::class, 'service_lists'])->name('front.service_lists');
Route::get('/it_solutions/{slug}/{id}', [App\Http\Controllers\Frontend\IndexController::class, 'it_solutions'])->name('front.it_solutions');
Route::get('/contact', [App\Http\Controllers\Frontend\IndexController::class, 'contact'])->name('front.contact');
Route::post('/contact/send_message', [App\Http\Controllers\Frontend\IndexController::class, 'send_message'])->name('front.send_message');



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard
Route::group(['prefix' => 'admin/sysmeet', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

    //Banner Section
    Route::resource('banner', BannerController::class);
    Route::post('banner_status', [App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

    //Main Banner Section
    Route::resource('main_banner', MainBannerController::class);
    Route::post('mainbanner_status', [App\Http\Controllers\MainBannerController::class, 'bannerStatus'])->name('mainbanner.status');

    //Outer Banner Section
    Route::resource('statistics_banner', OuterBannerController::class, ['names' => 'outer_banner']);
    Route::post('outerbanner_status', [App\Http\Controllers\OuterBannerController::class, 'bannerStatus'])->name('outerbanner.status');

    // How it works Section
    Route::resource('how_it_works', HowItWorksController::class);
    Route::post('how_it_works_status', [App\Http\Controllers\HowItWorksController::class, 'howItWorksStatus'])->name('how_it_works.status');

    //Our Partner Section
    Route::resource('our_partner', OurPartnerController::class);
    Route::post('our_partner_status', [App\Http\Controllers\OurPartnerController::class, 'ourPartnerStatus'])->name('our_partner.status');

    //Our Service Section
    Route::resource('service', ServiceController::class);
    Route::post('service_status', [App\Http\Controllers\ServiceController::class, 'serviceStatus'])->name('service.status');

    //Our Service List Section
    Route::resource('service_list', ServiceListController::class);
    Route::post('service_list_status', [App\Http\Controllers\ServiceListController::class, 'serviceListStatus'])->name('service_list.status');

    //Our Help Section
    Route::resource('service_our_help', OurHelpController::class);
    Route::post('our_help_status', [App\Http\Controllers\OurHelpController::class, 'ourHelpStatus'])->name('our_help.status');

    //About us Section
    Route::resource('about/about_us', AboutUsController::class, ['names' => 'about_us']);
    Route::post('about_us_status', [App\Http\Controllers\AboutUsController::class, 'aboutUsStatus'])->name('about_us.status');

    //Why choose us Section
    Route::resource('about/why_choose_us', WhyChooseUsController::class, ['names' => 'why_choose_us']);
    Route::post('why_choose_us_status', [App\Http\Controllers\WhyChooseUsController::class, 'whyChooseUsStatus'])->name('why_choose_us.status');

    //Services to choose us Section
    Route::resource('about/services_choose_us', ServicesToChooseUsController::class, ['names' => 'services_choose']);
    Route::post('services_choose_us_status', [App\Http\Controllers\ServicesToChooseUsController::class, 'servicesChooseUsStatus'])->name('services_choose_us.status');

    //Member Details Section
    Route::resource('our_team/member_details', MemberDetailsController::class, ['names' => 'member_details']);
    Route::post('member_details_status', [App\Http\Controllers\MemberDetailsController::class, 'memberDetailsStatus'])->name('member_details.status');

    //Team Motto Section
    Route::resource('our_team/team_motto', TeamMottoController::class, ['names' => 'team_motto']);
    Route::post('team_motto_status', [App\Http\Controllers\TeamMottoController::class, 'teamMottoStatus'])->name('team_motto.status');

    //Contact us Section
    Route::resource('contact_us', ContactController::class);
    Route::post('contact_us_status', [App\Http\Controllers\ContactController::class, 'contactUsStatus'])->name('contact_us.status');

    //Contact Messages Section
    Route::resource('contact/messages', ContactMessagesController::class, ['names' => 'messages']);
    Route::post('messages_status', [App\Http\Controllers\ContactMessagesController::class, 'messagesStatus'])->name('messages.status');

    //Social Info Section
    Route::resource('social_info', SocialInfoController::class, ['names' => 'social_info']);
    Route::post('social_info_status', [App\Http\Controllers\SocialInfoController::class, 'socialInfoStatus'])->name('social_info.status');

    //Footer Section
    Route::resource('footer', FooterController::class, ['names' => 'footer']);
    Route::post('footer_status', [App\Http\Controllers\FooterController::class, 'footerStatus'])->name('footer.status');

    //User Section
    Route::resource('user', UserController::class);
    Route::post('user_status', [App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');

    //Logo Section
    Route::resource('logo', LogoController::class);
    Route::post('logo_status', [App\Http\Controllers\LogoController::class, 'logoStatus'])->name('logo.status');

    //Admin profile
    Route::resource('adminProfile', AdminProfileController::class);

    //Logo Section
    Route::resource('our_team/quote', QuotesController::class, ['names' => 'quote']);
    Route::post('quote_status', [App\Http\Controllers\QuotesController::class, 'quoteStatus'])->name('quote.status');
});
