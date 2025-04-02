<?php
   
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ExtrapageController;
use App\Http\Controllers\Backend\NewsCategoryController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\PortfolioCategoryController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\PricingController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController; 
use App\Http\Controllers\Backend\FAQController;
use App\Http\Controllers\Backend\FeatureSarviceController;
use App\Http\Controllers\Backend\SocialmediaController;
use App\Http\Controllers\Backend\TeamMemberController;
use App\Http\Controllers\Backend\{TestimonialController,DefaultHomeController};
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailSettingController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ExpertDetailController;
use App\Http\Controllers\ExpertSearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\{MenuController,UserContactController};
use App\Http\Controllers\Backend\MenupermissionController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SocialMediaSettingController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;



Route::middleware('guest')->group(function () {   
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('/admin', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('user-login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});




Route::get('/blog-category', [BlogCategoryController::class, 'index'])->name('blog.category');
Route::get('/add-blog-category', [BlogCategoryController::class, 'addBlogCategory'])->name('add.blog.category');
Route::post('/manage-blog-category', [BlogCategoryController::class, 'manageBlogCategory']);
Route::get('/fetch-blog-category', [BlogCategoryController::class, 'fetchBlogCategory']);
Route::get('/edit-blog-category/{id}', [BlogCategoryController::class, 'editBlogCategory']);
Route::post('/delete-blog-category', [BlogCategoryController::class, 'deleteBlogCategory']);

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/add-blog', [BlogController::class, 'addBlog'])->name('add.blog');
Route::post('/manage-blog', [BlogController::class, 'manageBlog']);
Route::get('/fetch-blog', [BlogController::class, 'fetchBlog']);
Route::get('/edit-blog/{id}', [BlogController::class, 'editBlog']);
Route::post('/delete-blog', [BlogController::class, 'deleteBlog']);


Route::get('forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password');
Route::post('forgot-password-link', [UserController::class, 'forgotPasswordLink'])->name('forgot-password-link');

Route::get('/post-data', [DashboardController::class, 'postdata']);
Route::get('/download-db', [DashboardController::class, 'downloadDatabase'])->name('download.db');


// Users
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/fetch-users', [UserController::class, 'fetchUsers']);
Route::get('/add-user', [UserController::class, 'addUser'])->name('add.user');
Route::get('/edit-users/{id}', [UserController::class, 'edituser']);
Route::post('/manage-user', [UserController::class, 'manageUser']);
Route::post('/delete-user', [UserController::class, 'deleteUser']);
Route::post('/get-user-data', [UserController::class, 'getUserData']);
Route::get('/user-profile', [UserController::class, 'userProfile'])->name('user.profile');
Route::post('/update-profile-password', [UserController::class, 'UpdateProfilePassword'])->name('update-profile-password');
Route::get('/get-business-card', [UserController::class, 'getBusinessCard']);
Route::post('/update-user-profile', [UserController::class, 'updateUserProfile'])->name('update-profile-profile');
Route::post('/load-roles', [UserController::class, 'loadRoles']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// change password
Route::get('/change-password', [UserController::class, 'changePassword'])->name('change.password');

Route::get('/menus', [MenuController::class, 'index'])->name('menus');
Route::post('/manage-menu', [MenuController::class, 'manageMenu']);
Route::get('/fetch-menu', [MenuController::class, 'fetchMenu']);
Route::post('/get-menu-data', [MenuController::class, 'getMenuData']);
Route::post('/delete-menu', [MenuController::class, 'deleteMenu']);
Route::get('/add-sub-menu/{id}', [MenuController::class, 'addSubMenu']);

Route::get('/menupermission/{id}', [MenupermissionController::class, 'index'])->name('menupermission');
Route::get('/add-menupermission', [MenupermissionController::class, 'addMenupermission'])->name('add.menupermission');
Route::post('/manage-menupermission', [MenupermissionController::class, 'manageMenupermission']);
Route::get('/fetch-menupermission', [MenupermissionController::class, 'fetchMenupermission']);
Route::get('/edit-menupermission/{id}', [MenupermissionController::class, 'editMenupermission']);
Route::post('/delete-menupermission', [MenupermissionController::class, 'deleteMenupermission']);


Route::get('/qualitative-research', [HomeController::class, 'qualitativeResearch'])->name('qualitative.research');
Route::get('/quantitative-research', [HomeController::class, 'quantitativeResearch'])->name('quantitative.research');
Route::get('/market-intelligence', [HomeController::class, 'marketIntelligence'])->name('market.intelligence');
Route::get('/testimonials', [HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.us');
Route::post('/manage-contact', [HomeController::class, 'manageContact']);
Route::get('/join-consumer', [HomeController::class, 'joinConsumer'])->name('join.consumer');
Route::get('/join-expert', [HomeController::class, 'joinExpert'])->name('join.expert');
Route::get('/search-expert', [HomeController::class, 'searchExpert'])->name('search.expert');
Route::post('/fetch-experts', [HomeController::class, 'fetchExperts'])->name('fetch.experts');
Route::post('/search-experts', [HomeController::class, 'searchExperts'])->name('search.experts');
Route::get('/our-vault', [HomeController::class, 'ourVault'])->name('our.vault');
Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
Route::get('/search-expert-profile/{id}', [HomeController::class, 'searchExpertProfile'])->name('search.expert.profile');

Route::get('/category', [NewsCategoryController::class, 'index'])->name('category');
Route::get('/add-category', [NewsCategoryController::class, 'addCategory'])->name('add.category');
Route::post('/manage-category', [NewsCategoryController::class, 'manageCategory']);
Route::get('/fetch-category', [NewsCategoryController::class, 'fetchCategory']);
Route::get('/edit-category/{id}', [NewsCategoryController::class, 'editCategory']);
Route::post('/delete-category', [NewsCategoryController::class, 'deleteCategory']);


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/add-news', [NewsController::class, 'addNews'])->name('add.news');
Route::post('/manage-news', [NewsController::class, 'manageNews']);
Route::get('/fetch-news', [NewsController::class, 'fetchNews']);
Route::get('/edit-news/{id}', [NewsController::class, 'editNews']);
Route::post('/delete-news', [NewsController::class, 'deleteNews']);

Route::get('/team-member', [TeamMemberController::class, 'index'])->name('team.member');
Route::get('/add-team-member', [TeamMemberController::class, 'addTeamMember'])->name('add.team.member');
Route::post('/manage-team-member', [TeamMemberController::class, 'manageTeamMember']);
Route::get('/fetch-team-member', [TeamMemberController::class, 'fetchTeamMember']);
Route::get('/edit-team-member/{id}', [TeamMemberController::class, 'editTeamMember']);
Route::post('/delete-team-member', [TeamMemberController::class, 'deleteTeamMember']);

Route::get('/slider', [SliderController::class, 'index'])->name('slider');
Route::get('/add-slider', [SliderController::class, 'addSlider'])->name('add.slider');
Route::post('/manage-slider', [SliderController::class, 'manageSlider']);
Route::get('/fetch-slider', [SliderController::class, 'fetchSlider']);
Route::get('/edit-slider/{id}', [SliderController::class, 'editSlider']);
Route::post('/delete-slider', [SliderController::class, 'deleteSlider']);

// FAQ Add 
Route::controller(FAQController::class)->group(function(){
    Route::get('/faq','index')->name('faq');
    Route::get('/add-faq','addFAQ')->name('add.faq');
    Route::post('/manage-faq','manageFAQ'); 
    Route::get('/fetch-faq', 'fetchFAQ');  
    Route::get('/edit-faq/{id}', 'editFAQ');
    Route::post('/delete-faq', 'deleteFAQ');
});

// FeatureSarviceController  route
Route::controller(FeatureSarviceController::class)->group(function(){
    Route::get('/feature','index')->name('feature');
    Route::get('/add-feature','addFeature')->name('add.feature');
    Route::post('/manage-feature','manageFeature'); 
    Route::get('/fetch-feature', 'fetchFeature');  
    Route::get('/edit-feature/{id}', 'editFeature');
    Route::post('/delete-feature', 'deleteFeature');
});


Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
Route::get('/add-testimonial', [TestimonialController::class, 'addTestimonial'])->name('add.testimonial');
Route::post('/manage-testimonial', [TestimonialController::class, 'manageTestimonial']);
Route::get('/fetch-testimonial', [TestimonialController::class, 'fetchTestimonial']);
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'editTestimonial']);
Route::post('/delete-testimonial', [TestimonialController::class, 'deleteTestimonial']);


Route::get('/user-contacts', [UserContactController::class, 'index'])->name('user.contacts.show');
Route::get('/fetch-user-contact', [UserContactController::class, 'fetchContacts']);


Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
Route::get('/add-pricing', [PricingController::class, 'addPricing'])->name('add.pricing');
Route::post('/manage-pricing', [PricingController::class, 'managePricing']);
Route::get('/fetch-pricing', [PricingController::class, 'fetchPricing']);
Route::get('/edit-pricing/{id}', [PricingController::class, 'editPricing']);
Route::post('/delete-pricing', [PricingController::class, 'deletePricing']);

Route::get('/photogallery', [PhotoGalleryController::class, 'index'])->name('photogallery');
Route::get('/add-photogallery', [PhotoGalleryController::class, 'addPhotogallery'])->name('add.photogallery');
Route::post('/manage-photogallery', [PhotoGalleryController::class, 'managePhotogallery']);
Route::get('/fetch-photogallery', [PhotoGalleryController::class, 'fetchPhotogallery']);
Route::get('/edit-photogallery/{id}', [PhotoGalleryController::class, 'editPhotogallery']);
Route::post('/delete-photogallery', [PhotoGalleryController::class, 'deletePhotogallery']);

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/add-portfolio', [PortfolioController::class, 'addPortfolio'])->name('add.portfolio');
Route::post('/manage-portfolio', [PortfolioController::class, 'managePortfolio']);
Route::get('/fetch-portfolio', [PortfolioController::class, 'fetchPortfolio']);
Route::get('/edit-portfolio/{id}', [PortfolioController::class, 'editPortfolio']);
Route::post('/delete-portfolio', [PortfolioController::class, 'deletePortfolio']);
Route::post('/delete-portfolio-other-photo', [PortfolioController::class, 'deletePortfolioOtherPhoto']);

Route::get('/portfolio-category', [PortfolioCategoryController::class, 'index'])->name('portfolio.category');
Route::get('/add-portfolio-category', [PortfolioCategoryController::class, 'addPortfolioCategory'])->name('add.portfolio.category');
Route::post('/manage-portfolio-category', [PortfolioCategoryController::class, 'managePortfolioCategory']);
Route::get('/fetch-portfolio-category', [PortfolioCategoryController::class, 'fetchPortfolioCategory']);
Route::get('/edit-portfolio-category/{id}', [PortfolioCategoryController::class, 'editPortfolioCategory']);
Route::post('/delete-portfolio-category', [PortfolioCategoryController::class, 'deletePortfolioCategory']);

Route::get('/defalut_home', [DefaultHomeController::class, 'index'])->name('defalut_home');
Route::get('/add-default-home-page', [DefaultHomeController::class, 'addHome'])->name('add.default_home');
Route::post('/manage-default-home', [DefaultHomeController::class, 'manageHome']);
Route::get('/fetch-default-home', [DefaultHomeController::class, 'fetchDefaultHome']);
Route::get('/edit-default-home/{id}', [DefaultHomeController::class, 'editHome']);
Route::post('/delete-default-home', [DefaultHomeController::class, 'deleteHome']);
Route::post('/change-default-home', [DefaultHomeController::class, 'ChangeHomePage'])->name('change_default_home');

Route::get('/setting', [SettingController::class, 'index'])->name('setting');
Route::post('/update-logo', [SettingController::class, 'updateLogo'])->name('settings.update.logo');
Route::post('/update-favicon', [SettingController::class, 'updateFavicon'])->name('settings.update.favicon');
Route::post('/update-topbar', [SettingController::class, 'updateTopBar'])->name('settings.update.topbar');
Route::post('/update-footer', [SettingController::class, 'updateFooter'])->name('settings.update.footer');
Route::post('/update-newsletter', [SettingController::class, 'updateNewsletter'])->name('settings.update.newsletter');
Route::post('/update-storeTechex', [SettingController::class, 'updateStoreTechex']);
Route::post('/update-cta', [SettingController::class, 'updateCTA'])->name('settings.update.cta');
Route::post('/update-cta-background', [SettingController::class, 'updateCTABackground'])->name('settings.update.cta.background');
Route::post('/update-email', [SettingController::class, 'updateEmailSettings']);
Route::post('/save-sidebar-settings', [SettingController::class, 'saveSidebarSettings']);
Route::post('/save-color-settings', [SettingController::class, 'saveColorSettings']);
Route::post('/about-banner-update', [SettingController::class, 'updateAboutBanner']);
Route::post('/testimonial-banner-update', [SettingController::class, 'updateTestimonialBanner']);
Route::post('/news-banner-update', [SettingController::class, 'updateNewsBanner']);
Route::post('/event-banner-update', [SettingController::class, 'updateEventBanner']);
Route::post('/contact-banner-update', [SettingController::class, 'updateContactBanner']);
Route::post('/search-banner-update', [SettingController::class, 'updateSearchBanner']);
Route::post('/privacy-banner-update', [SettingController::class, 'updatePrivacyBanner']);
Route::post('/faq-banner-update', [SettingController::class, 'updateFaqBanner']);
Route::post('/service-banner-update', [SettingController::class, 'updateServiceBanner']);
Route::post('/portfolio-banner-update', [SettingController::class, 'updatePortfolioBanner']);
Route::post('/team-banner-update', [SettingController::class, 'updateTeamBanner']);
Route::post('/pricing-banner-update', [SettingController::class, 'updatePricingBanner']);
Route::post('/photo-gallery-banner-update', [SettingController::class, 'updatePhotoGalleryBanner']);
Route::post('/term-banner-update', [SettingController::class, 'updatetermBanner']);
Route::post('/storyOfTechex-banner-update', [SettingController::class, 'updatestoryOfTechexBanner']);
Route::post('/verify-subscriber-banner-update', [SettingController::class, 'updateVerifySubscriberBanner']);

Route::get('/page-section', [PageController::class, 'index'])->name('page.section');
Route::post('/update-contact', [PageController::class, 'contactUpdate'])->name('update.contact');
Route::post('/update-about', [PageController::class, 'updateAbout'])->name('update.about');
Route::post('/update-home-meta', [PageController::class, 'updateHomeMeta'])->name('update.home.meta');
Route::post('/update-home-bannerInformation', [PageController::class, 'updateHomeBannerInformation'])->name('update.home.bannerInformation');
Route::post('/update-home-storyAspire', [PageController::class, 'updateHomeStoryAspireInformation'])->name('update.home.storyAspire');
Route::post('/update-home-welcome', [PageController::class, 'updatHomeWelcome'])->name('update.home.welcome');
Route::post('/update-home-video-bg', [PageController::class, 'updatHomeVideoBg'])->name('update.home.video.bg');
Route::post('/update-home-why-choose', [PageController::class, 'updateWhyChoose'])->name('update.why.choose');
Route::post('/update-home-feature', [PageController::class, 'updateHomeFeature'])->name('updateHomeFeature');
Route::post('/update-home-service', [PageController::class, 'updateHomeService'])->name('updateHomeService');
Route::post('/update-counter-info', [PageController::class, 'updateCounterInfo'])->name('updateCounterInfo');
Route::post('/update-home-counter-photo', [PageController::class, 'updatHomeCounterPhoto'])->name('update.home.counter.photo');
Route::post('/update-home-contact-about', [PageController::class, 'updatHomeContactAbout'])->name('update.home.contact.about'); 
Route::post('/update-work-portfolio', [PageController::class, 'updateWorkPortfolio'])->name('update.work.portfolio'); 
Route::post('/update-booking-section', [PageController::class, 'updateBookingSection'])->name('update.booking.section');
Route::post('/update-booking-photo', [PageController::class, 'updateBookingPhoto'])->name('update.booking.photo');
Route::post('/update-team-section', [PageController::class, 'updateTeamSection'])->name('update.team.section'); 
Route::post('/update-our-partner-section', [PageController::class, 'updateOurPartnerSection'])->name('update.our.partner.section');
Route::post('/update-pricing-table', [PageController::class, 'updatePricingTable'])->name('update.pricing.table');
Route::post('/update-testimonial-section', [PageController::class, 'updateTestimonialSection'])->name('update.testimonial.section');
Route::post('/update-testimonial-photo', [PageController::class, 'updateTestimonialPhoto'])->name('update.testimonial.photo');
Route::post('/update-blog-section', [PageController::class, 'updateBlogSection'])->name('update.blog.section');
Route::post('/about-update-faq-photo', [PageController::class, 'updateAboutFaqSection'])->name('about.update.faq.section');
Route::post('/about-update-testimonial-photo', [PageController::class, 'updateAboutTestimonialSection'])->name('about.update.testimonial.section');

Route::get('/service', [ServiceController::class, 'index'])->name('service');
Route::get('/add-service', [ServiceController::class, 'addService'])->name('add.service');
Route::post('/manage-service', [ServiceController::class, 'manageService']);
Route::get('/fetch-service', [ServiceController::class, 'fetchService']);
Route::get('/edit-service/{id}', [ServiceController::class, 'editService']);
Route::post('/delete-service', [ServiceController::class, 'deleteService']);



Route::get('/service-category', [ServiceCategoryController::class, 'index'])->name('service.category');
Route::get('/add-service-category', [ServiceCategoryController::class, 'addServiceCategory'])->name('add.service.category');
Route::post('/manage-service-category', [ServiceCategoryController::class, 'manageServiceCategory']);
Route::get('/fetch-service-category', [ServiceCategoryController::class, 'fetchServiceCategory']);
Route::get('/edit-service-category/{id}', [ServiceCategoryController::class, 'editServiceCategory']);
Route::post('/delete-service-category', [ServiceCategoryController::class, 'deleteServiceCategory']);

Route::get('/socialmedia', [SocialmediaController::class, 'index'])->name('socialmedia');
Route::get('/add-socialmedia', [SocialmediaController::class, 'addSocialmedia']);
Route::post('/update-socialmedia', [SocialmediaController::class, 'updateSocialmedia'])->name('update.socialmedia');
// Route::get('/fetch-socialmedia', [SocialmediaController::class, 'fetchSocialmedia']);
// Route::get('/edit-socialmedia/{id}', [SocialmediaController::class, 'editSocialmedia']);
// Route::post('/delete-socialmedia', [SocialmediaController::class, 'deleteSocialmedia']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [HomeController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/blogs/{category?}', [HomeController::class, 'blogPgae'])->name('blogs');
Route::get('/blog/{id?}', [HomeController::class, 'getBlog'])->name('getBlog');    
Route::get('/service/{id}', [HomeController::class, 'getService'])->name('getService');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/{category?}/{slug?}', [HomeController::class, 'serviceDetails'])->name('service-details');

Route::get('/bizsetu/{id}', [HomeController::class, 'extraPage'])->name('extraPage');






Route::get('/extrapage', [ExtrapageController::class, 'index'])->name('extrapage');
Route::get('/add-extrapage', [ExtrapageController::class, 'addExtrapage'])->name('add.extrapage');
Route::post('/manage-extrapage', [ExtrapageController::class, 'manageExtrapage']);
Route::get('/fetch-extrapage', [ExtrapageController::class, 'fetchExtrapage']);
Route::get('/edit-extrapage/{id}', [ExtrapageController::class, 'editExtrapage']);
Route::post('/delete-extrapage', [ExtrapageController::class, 'deleteExtrapage']);

require __DIR__.'/auth.php'; 


