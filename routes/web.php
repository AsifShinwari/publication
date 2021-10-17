<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
use \App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// payment gateway routes
Route::get('stripe', [App\Http\Controllers\StripeController::class, 'stripe'])->name('stripe');
Route::post('stripe', [App\Http\Controllers\StripeController::class, 'stripePost'])->name('stripe.post');
// payment gateway routes

Route::get('/cache/clear/all/gg',function(){
    \Artisan::call('cache:clear');
    return 'cleard';
    
});
Route::get('/cache/clear/storage/link',function(){
    \Artisan::call('storage:link');
    return 'linked';
    
});

//===================================Front End====================================================//
Route::get('/',[\App\Http\Controllers\FrontController::class,'index'])->name('/');
Route::get('/events/{event_type}',[\App\Http\Controllers\EventsController::class,'index'])->name('front.events');
Route::get('/event/single/{event_id?}',[\App\Http\Controllers\EventsController::class,'single_event'])->name('front.single.event');
Route::get('/event/post/event',[\App\Http\Controllers\EventsController::class,'post_event'])->name('front.post.event');
Route::post('/event/post/event/store',[\App\Http\Controllers\EventsController::class,'store_event'])->name('front.post.event.store');
Route::get('/about/us/index',[\App\Http\Controllers\AboutusController::class,'index'])->name('front.about.us.index');
Route::get('/about/tie/up/intituation',[\App\Http\Controllers\AboutusController::class,'tie_up_instituion'])->name('front.about.tie.up');
Route::get('/about/report',[\App\Http\Controllers\AboutusController::class,'report'])->name('front.about.report');

Route::get('/advisory/board/index',[\App\Http\Controllers\AdvisoryBoardController::class,'index'])->name('front.advisory.board.index');
Route::get('/research/development/index',[\App\Http\Controllers\ResearchAndDevController::class,'index'])->name('front.research.dev.index');

Route::get('/resources/research-funding/index',[\App\Http\Controllers\ResourcesController::class,'research_funding'])->name('front.resources.research.funding.index');
Route::get('/resources/entrepreneurship-development/index',[\App\Http\Controllers\ResourcesController::class,'entrepreneurship_development'])->name('front.resources.entrepreneurship.development.index');
Route::get('/resources/event-sponsership/index',[\App\Http\Controllers\ResourcesController::class,'event_sponsership'])->name('front.resources.event.sponsership.index');
Route::get('/resources/patent/index',[\App\Http\Controllers\ResourcesController::class,'patent'])->name('front.resources.patent.index');
Route::get('/resources/mentor/posts/index',[\App\Http\Controllers\ResourcesController::class,'mentor_posts'])->name('front.resources.mentor.posts.index');
Route::get('/resources/mentor/post/{id?}',[\App\Http\Controllers\ResourcesController::class,'mentor_single_post'])->name('front.resources.mentor.single.post');

Route::get('/join/mentor',[\App\Http\Controllers\JoinController::class,'mentor_join'])->name('front.mentor.join');
Route::post('/join/mentor/post',[\App\Http\Controllers\JoinController::class,'mentor_join_store'])->name('front.mentor.join.store');
Route::get('/join/individual',[\App\Http\Controllers\JoinController::class,'join_individual'])->name('front.individual.join');
Route::post('/join/individual',[\App\Http\Controllers\JoinController::class,'join_individual_post'])->name('front.individual.join.post');
Route::get('/join/company',[\App\Http\Controllers\JoinController::class,'join_company'])->name('front.company.join');
Route::post('/join/company',[\App\Http\Controllers\JoinController::class,'join_company_post'])->name('front.company.join.post');
Route::get('/front/login/show',[\App\Http\Controllers\JoinController::class,'show_login'])->name('front.show.login');
Route::post('/front/login/show',[\App\Http\Controllers\JoinController::class,'login_post'])->name('front.login.post');
Route::get('/front/logout',[\App\Http\Controllers\JoinController::class,'logout'])->name('front.logout');

Route::get('/front/profile/individaul',[\App\Http\Controllers\ProfileController::class,'profile_individual'])->name('front.profile.individual');
Route::post('/front/profile/individaul',[\App\Http\Controllers\ProfileController::class,'profile_individual_update'])->name('front.profile.update');

Route::get('/front/profile/company',[\App\Http\Controllers\ProfileController::class,'profile_company'])->name('front.profile.company');
Route::post('/front/profile/company',[\App\Http\Controllers\ProfileController::class,'profile_company_update'])->name('front.profile.company.update');

Route::get('/front/profile/mentor',[\App\Http\Controllers\ProfileController::class,'profile_mentor'])->name('front.profile.mentor');
Route::post('/front/profile/mentor',[\App\Http\Controllers\ProfileController::class,'profile_mentor_update'])->name('front.profile.mentor.update');

Route::get('/front/contact/us',[\App\Http\Controllers\ContactUsController::class,'index'])->name('front.contact.us.index');

Route::get('/front/publication-index',[\App\Http\Controllers\PublicationController::class,'publication_index'])->name('front.publication.index');  
Route::get('/front/publication-single/{id}',[\App\Http\Controllers\PublicationController::class,'publication_single'])->name('front.publication.single');  
Route::get('/front/publication-single-chapter/{id}',[\App\Http\Controllers\PublicationController::class,'publication_single_chapter'])->name('front.publication.single.chapter');  
Route::get('/front/publication-download/{id}/{type}',[\App\Http\Controllers\PublicationController::class,'download'])->name('front.publication.download');  
Route::get('/front/publication/filter',[\App\Http\Controllers\PublicationController::class,'publication_filter'])->name('front.publication.filter');  

Route::get('/front/journal-index',[\App\Http\Controllers\JournalController::class,'index'])->name('front.journals.index');  
Route::get('/front/journal-details/{id}/{type}',[\App\Http\Controllers\JournalController::class,'journal_details'])->name('front.journals.details');  
Route::get('/front/journal-details/archives/issues/{id}',[\App\Http\Controllers\JournalController::class,'journal_archives_issues'])->name('front.journals.archives.issues');  
Route::get('/front/journal-details/archives/issue/single/{id}',[\App\Http\Controllers\JournalController::class,'journal_archives_issues_single'])->name('front.journals.archives.single.issue');  

Route::post('/front/contact/us',[\App\Http\Controllers\ContactUsController::class,'store'])->name('front.contact.us.store');

//manuscript
Route::get('/front/manuscript/add/{journal_id}',[\App\Http\Controllers\ManuscriptController::class,'index'])->name('front.manuscript.add');
Route::post('/front/manuscript/store/{journal_id}',[\App\Http\Controllers\ManuscriptController::class,'store'])->name('front.manuscript.store');

//conferences
Route::get('front/conferences/single/{id}',[\App\Http\Livewire\Conferences\IndexController::class,'conference'])->name('front.conference.single');

//===================================Front End====================================================//

//backend routes
Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});


Route::get('admin/panel/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('admin/panel/settings/users', \App\Http\Livewire\Users::class)->name('users');
    Route::get('admin/panel/settings/user/photo/{user_id}', \App\Http\Livewire\UserPhoto::class)->name('user.photo');
    Route::get('admin/panel/dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');
    Route::get('admin/panel/user/profile',\App\Http\Livewire\UserProfile\Index::class)->name('user.profile');

    //========================================================================================================//
    Route::get('admin/panel/home/page',\App\Http\Livewire\HomePage\Index::class)->name('backend.home');
    Route::get('admin/panel/general/info',\App\Http\Livewire\GeneralInfo\Index::class)->name('backend.general.info');

    Route::get('admin/panel/events',\App\Http\Livewire\Events\Index::class)->name('backend.events');
    Route::get('admin/panel/events/add',\App\Http\Livewire\Events\Add::class)->name('backend.events.add');
    Route::get('admin/panel/events/edit/{event_id}',\App\Http\Livewire\Events\Edit::class)->name('backend.events.edit');

    Route::get('admin/panel/about/us/update',\App\Http\Livewire\Aboutus\Index::class)->name('backend.aboutUs.index');
    Route::get('admin/panel/about/tie/up/index',\App\Http\Livewire\TieUpInstitution\Index::class)->name('backend.aboutUs.tie.up');
    Route::get('admin/panel/about/tie/up/add',\App\Http\Livewire\TieUpInstitution\Add::class)->name('backend.aboutUs.tie.up.add');
    Route::get('admin/panel/about/tie/up/edit/{item_id}',\App\Http\Livewire\TieUpInstitution\Edit::class)->name('backend.aboutUs.tie.up.edit');

    Route::get('admin/panel/advisory/board',\App\Http\Livewire\AdvisoryBoard\Index::class)->name('backend.advisory.board.index');
    Route::get('admin/panel/advisory/add',\App\Http\Livewire\AdvisoryBoard\Add::class)->name('backend.advisory.board.add');
    Route::get('admin/panel/advisory/edit/{id}',\App\Http\Livewire\AdvisoryBoard\Edit::class)->name('backend.advisory.board.edit');
    
    Route::get('admin/panel/projects/index',\App\Http\Livewire\Projects\Index::class)->name('backend.projects.index');
    Route::get('admin/panel/projects/add',\App\Http\Livewire\Projects\Add::class)->name('backend.projects.add');
    Route::get('admin/panel/projects/edit/{id}',\App\Http\Livewire\Projects\Edit::class)->name('backend.projects.edit');

    Route::get('admin/panel/resources/research_funding/index',\App\Http\Livewire\Resources\ResearchFunding\Index::class)->name('backend.resourses.research.funding.index');

    Route::get('admin/panel/mentors/index',\App\Http\Livewire\Resources\OurMentors\Index::class)->name('backend.mentors.index');
    Route::get('admin/panel/mentors/add',\App\Http\Livewire\Resources\OurMentors\Add::class)->name('backend.mentors.add');
    Route::get('admin/panel/mentors/edit/{id}',\App\Http\Livewire\Resources\OurMentors\Edit::class)->name('backend.mentors.edit');
    
    Route::get('admin/panel/resources/event-sponsership/index',\App\Http\Livewire\Resources\EventSponsership\Index::class)->name('backend.event.sponsership.index');
    Route::get('admin/panel/resources/patent/index',\App\Http\Livewire\Resources\Patent\Index::class)->name('backend.patent.index');

    Route::get('admin/panel/mentor-posts/index',\App\Http\Livewire\Resources\MentorPosts\Index::class)->name('backend.mentor.posts.index');
    Route::get('admin/panel/mentor-posts/add',\App\Http\Livewire\Resources\MentorPosts\Add::class)->name('backend.mentor.posts.add');
    Route::get('admin/panel/mentor-posts/edit/{id}',\App\Http\Livewire\Resources\MentorPosts\Edit::class)->name('backend.mentor.posts.edit');


    Route::get('admin/panel/our-mentors/reset-password/{user_id}',\App\Http\Livewire\Resources\OurMentors\ResetPassword::class)->name('our_mentors.reset.password');

    Route::get('admin/panel/contact-us/index',\App\Http\Livewire\ContactUs\Index::class)->name('backend.contact.us.index');
    
    Route::get('admin/panel/publications/index',\App\Http\Livewire\Publications\Index::class)->name('backend.publication.index');
    Route::get('admin/panel/publications/add',\App\Http\Livewire\Publications\Add::class)->name('backend.publication.add');
    Route::get('admin/panel/publications/edit/{id}',\App\Http\Livewire\Publications\Edit::class)->name('backend.publication.edit');

    Route::get('admin/panel/publications/chapters/index/{id}',\App\Http\Livewire\Publications\Chapters\Index::class)->name('backend.publication.chapters.index');
    Route::get('admin/panel/publications/chapters/add/{id}',\App\Http\Livewire\Publications\Chapters\Add::class)->name('backend.publication.chapters.add');
    Route::get('admin/panel/publications/chapters/edit/{id}',\App\Http\Livewire\Publications\Chapters\Edit::class)->name('backend.publication.chapters.edit');
    
    Route::get('admin/panel/journals/index',\App\Http\Livewire\Publications\Journals\Index::class)->name('backend.publication.journal.index');
    Route::get('admin/panel/journals/add',\App\Http\Livewire\Publications\Journals\Add::class)->name('backend.publication.journal.add');
    Route::get('admin/panel/journals/edit/{id}',\App\Http\Livewire\Publications\Journals\Edit::class)->name('backend.publication.journal.edit');
    
    
    Route::get('admin/panel/journals/archive/index/{id}',\App\Http\Livewire\Publications\Journals\Archive\Index::class)->name('backend.journal.archive.index');
    Route::get('admin/panel/journals/archive/add/{id}',\App\Http\Livewire\Publications\Journals\Archive\Add::class)->name('backend.journal.archive.add');
    Route::get('admin/panel/journals/archive/edit/{id}',\App\Http\Livewire\Publications\Journals\Archive\Edit::class)->name('backend.journal.archive.edit');
    
    Route::get('admin/panel/journals/archive/issues/index/{id}',\App\Http\Livewire\Publications\Journals\Archive\Issues\Index::class)->name('backend.journal.archive.issues.index');
    Route::get('admin/panel/journals/archive/issues/add/{id}',\App\Http\Livewire\Publications\Journals\Archive\Issues\Add::class)->name('backend.journal.archive.issues.add');
    Route::get('admin/panel/journals/archive/issues/edit/{id}',\App\Http\Livewire\Publications\Journals\Archive\Issues\Edit::class)->name('backend.journal.archive.issues.edit');
    
    //payments
    Route::get('admin/panel/payments/index',\App\Http\Livewire\Payments\Index::class)->name('backend.payments.index');
    
    //Our Partners
    Route::get('admin/panel/ourpartners/index',\App\Http\Livewire\OurPartners\Index::class)->name('backend.partners.index');
    Route::get('admin/panel/ourpartners/add',\App\Http\Livewire\OurPartners\Add::class)->name('backend.partners.add');
    Route::get('admin/panel/ourpartners/edit/{id}',\App\Http\Livewire\OurPartners\Edit::class)->name('backend.partners.edit');
    
    Route::get('admin/panel/manuscript/{id}',\App\Http\Livewire\Manuscripts\Index::class)->name('backend.manuscript.index');
    Route::get('admin/panel/manuscript/single/{id}',\App\Http\Livewire\Manuscripts\Show::class)->name('backend.manuscript.single');
    
    //conferences
    Route::get('admin/panel/conferences',[\App\Http\Livewire\Conferences\IndexController::class,'index'])->name('backend.conference.index');
    Route::get('admin/panel/conferences/add',[\App\Http\Livewire\Conferences\IndexController::class,'add'])->name('backend.conference.add');
    Route::post('admin/panel/conferences/store',[\App\Http\Livewire\Conferences\IndexController::class,'store'])->name('backend.conference.store');
    Route::get('admin/panel/conferences/edit/{id}',[\App\Http\Livewire\Conferences\IndexController::class,'edit'])->name('backend.conference.edit');
    Route::post('admin/panel/conferences/update',[\App\Http\Livewire\Conferences\IndexController::class,'update'])->name('backend.conference.update');
    Route::get('admin/panel/conferences/delete/{id}',[\App\Http\Livewire\Conferences\IndexController::class,'delete'])->name('backend.conference.delete');
    
    //conferences contents
    Route::get('admin/panel/conferences/contents/{id}',[\App\Http\Livewire\Conferences\IndexController::class,'con_index'])->name('backend.conference.cont.index');
    Route::post('admin/panel/conferences/contents/update',[\App\Http\Livewire\Conferences\IndexController::class,'con_update'])->name('backend.conference.cont.update');
    Route::post('admin/panel/conferences/contents/image/store',[\App\Http\Livewire\Conferences\IndexController::class,'con_image_store'])->name('backend.conference.cont.image.store');
    Route::get('admin/panel/conferences/contents/image/delete/{id}',[\App\Http\Livewire\Conferences\IndexController::class,'con_image_delete'])->name('backend.conference.cont.image.delete');

// backend routes
});