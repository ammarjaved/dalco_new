<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\updateSiteDataImages;
use App\Http\Controllers\web\adminOrderController;
use App\Http\Controllers\web\estimationWork;
use App\Http\Controllers\web\OrderController;
use App\Http\Controllers\web\requisitionController;
use App\Http\Controllers\web\scrapController;
use App\Http\Controllers\web\siteDateCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Intervention\Image\Gd\Commands\RotateCommand;
use App\Http\Controllers\web\CsuAeroSpendController;
use App\Http\Controllers\web\CsuBudgetTNBController;
use App\Http\Controllers\web\RmuAeroSpendController;
use App\Http\Controllers\web\RmuBudgetTNBController;
use App\Http\Controllers\web\VcbAeroSpendController;
use App\Http\Controllers\web\VcbBudgetTNBController;
use App\Http\Controllers\web\RmuPaymentDetailController;
use App\Http\Controllers\web\VcbPaymentDetailController;
use App\Http\Controllers\web\CsuPaymentDetailController;
use App\Http\Controllers\web\PaymentSummaryController;
use App\Http\Controllers\web\FilterPaymentSummaryController;
use App\Http\Controllers\SiteSurveyController;
use App\Http\Controllers\MaterialSelectionController;
use App\Http\Controllers\ToolboxTalkController;
use App\Http\Controllers\SiteSurveyFilesController;
use App\Http\Controllers\ImageShutdownController;
use App\Http\Controllers\SATController;
use App\Http\Controllers\LKSController;
use App\Http\Controllers\ImageShutdownAttachmentsController;
use App\Http\Controllers\SATAttachmentsController;
use App\Http\Controllers\TopnavbarController;

use App\Http\Controllers\Materialshow;
use App\Http\Controllers\PreCablingAttachmentsController;
use App\Http\Controllers\PreCablingController;
use App\Http\Controllers\PreCablingImagesController;
use App\Http\Controllers\PreCablingShutDownController;
use App\Models\PreCablingImages;
use App\Models\SAT;
use App\Models\SATAttachments;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {

  

   Route::get('site_survey/create', [SiteSurveyController::class,'create'])->name('site_survey.create');
   Route::get('site_survey/{id}/edit', [SiteSurveyController::class, 'edit'])->name('site_survey.edit');
   Route::resource('site_survey', SiteSurveyController::class,['except' => ['create','edit']]);

    Route::resource('toolbox_talks', ToolboxTalkController::class);




//     Route::get('/site_survey/{id}/edit', [SiteSurveyController::class, 'edit'])->name('site_survey.edit');
// Route::get('/site_survey/{id}', [SiteSurveyController::class, 'show'])->name('site_survey.show');

   


    // Route::get('/material-selection', [MaterialSelectionController::class, 'index'])->name('material-selection.index');
    Route::post('/material-selection/{id}', [MaterialSelectionController::class, 'saveSelections'])->name('material-selection.save');
    // Route::get('/material-show', [MaterialSelectionController::class, 'showData'])->name('material-selection.show');

    Route::get('/material-selection/show/{id}', [MaterialSelectionController::class, 'showData'])->name('material-selection.show');
    Route::get('/search_material', [MaterialSelectionController::class, 'searchMaterial'])->name('search.material');
    
    Route::get('/material-selection/index/{id}', [MaterialSelectionController::class, 'index'])->name('material-selection.index');

    Route::get('/data_material', [MaterialSelectionController::class, 'materialData'])->name('data.material');



    Route::delete('/material-selection/delete/{id}', [MaterialSelectionController::class, 'destroy'])->name('material-selection.delete');
    Route::delete('/material-selection/delete-all/{siteSurveyId}', [MaterialSelectionController::class, 'deleteAll'])->name('material-selection.delete-all');


    // Route::get('/material-selection/index', [MaterialSelectionController::class, 'index'])->name('material-selection.index');

    Route::get('/material-selection', [MaterialSelectionController::class, 'format'])->name('material-selection.format');

    Route::get('site-file-upload/{id}', [SiteSurveyFilesController::class, 'index'])->name('siteFileUploadView.index');

    //DelcoSummary
    Route::get('/delco-summary', [SiteSurveyController::class, 'delcoSummary'])->name('delco-summary');
    Route::delete('/delco-summary/{id}', [SiteSurveyController::class, 'deleteDelcoSummary'])->name('delco-summary.delete');




    // Route to handle the form submission
    Route::post('/siteFileUpload/storeViewFiles/{id}', [SiteSurveyFilesController::class, 'storeViewFiles'])->name('siteFileUpload.storeViewFiles');

    Route::delete('/siteFileUpload/{id}', [SiteSurveyFilesController::class, 'destroy'])->name('siteFileUpload.destroy');

    Route::resource('pre-cabling',PreCablingController::class,['except' => ['create','delete']]);
    Route::get('/pre-cabling-piw/{id}/create',[PreCablingController::class,'create'])->name('pre-cabling-piw.create');
    Route::get('/pre-cabling-piw/{id}/delete',[PreCablingController::class,'destroy'])->name('pre-cabling-piw.delete');

    Route::get('/precabling-toolboxtalk/{id}',[PreCablingController::class,'createToolboxTalk'])->name('PreCabling.toolboxtalk');
    Route::get('/precabling-toolboxtalkedit/{id}',[PreCablingController::class,'editToolboxTalk'])->name('PreCabling.toolboxtalkedit');
    Route::post('/precabling-toolboxtalk-store', [PreCablingController::class, 'storeToolboxtalk'])->name('PreCabling.toolboxtalk.store');
    Route::post('/precabling-toolboxtalk-update/{id}', [PreCablingController::class, 'updateToolboxtalk'])->name('PreCabling.toolboxtalk.update');
    Route::delete('/pre-cabling/toolboxtalk/{id}', [PreCablingController::class, 'destroyToolboxTalk'])->name('PreCabling.toolboxtalk.destroy');

    



    Route::resource('pre-cabling-shut-down',PreCablingShutDownController::class,['except' => ['create','delete']]); 

    Route::get('/pre-cabling-shut-down/{id}/create',[PreCablingShutDownController::class,'create'])->name('pre-cabling-shut-down.create');
    Route::get('/pre-cabling-shut-down/{id}/delete',[PreCablingShutDownController::class,'destroy'])->name('pre-cabling-shut-down.delete');

    Route::resource('pre-cabling-attachments',PreCablingAttachmentsController::class,['except'=>['index']]);  
    Route::get('/pre-cabling-attachment/{id}/index',[PreCablingAttachmentsController::class,'index'])->name('pre-cabling-attachment.index');

    Route::resource('pre-cabling-images',PreCablingImagesController::class,['except'=>['index']]);  
    Route::get('/pre-cabling-image/{id}/index',[PreCablingImagesController::class,'index'])->name('pre-cabling-image.index');


   // Route to display a list of image shutdowns

   Route::get('/image_shutdown/{id}',[ImageShutdownController::class,'createToolboxTalk'])->name('image_shutdown.toolboxtalk');
   Route::get('/image_shutdown-toolboxtalkedit/{id}',[ImageShutdownController::class,'editToolboxTalk'])->name('image_shutdown.toolboxtalkedit');
    Route::post('/image_shutdown-toolboxtalk-store', [ImageShutdownController::class, 'storeToolboxtalk'])->name('image_shutdown.toolboxtalk.store');
    Route::post('/image_shutdown-toolboxtalk-update/{id}', [ImageShutdownController::class, 'updateToolboxtalk'])->name('image_shutdown.toolboxtalk.update');
    Route::delete('/toolbox-talk/{id}', [ImageShutdownController::class, 'destroyToolboxTalk'])->name('toolbox-talk.destroy');




   Route::get('/image-shutdown', [ImageShutdownController::class, 'index'])->name('image-shutdown.index');
   Route::get('/image-shutdown/create/{survey}', [ImageShutdownController::class, 'create'])->name('image-shutdown.create');
   Route::post('/image-shutdown', [ImageShutdownController::class, 'store'])->name('image-shutdown.store');
   
   Route::get('/site-surveys', [SiteSurveyController::class, 'index'])->name('site-surveys.index');
   Route::get('/image-shutdown/create/{id}', [ImageShutdownController::class, 'create'])->name('image-shutdown.create');

   // Define the route to display the form for editing an image shutdown
Route::get('image-shutdown/{id}/edit', [ImageShutdownController::class, 'edit'])->name('image-shutdown.edit');

// Define the route to handle the form submission for updating an image shutdown
Route::put('image-shutdown/{id}', [ImageShutdownController::class, 'update'])->name('image-shutdown.update');

// Define the route to handle deletion of an image shutdown
Route::delete('image-shutdown/{id}', [ImageShutdownController::class, 'destroy'])->name('image-shutdown.destroy');

Route::resource('image-shutdown-attachments',ImageShutdownAttachmentsController::class,['except'=>['index']]);  
Route::get('/image-shutdown-attachment/{id}/index',[ImageShutdownAttachmentsController::class,'index'])->name('image-shutdown-attachment.index');





Route::get('/SAT/{id}',[SATController::class,'createToolboxTalk'])->name('SAT.toolboxtalk');
Route::get('/SAT-toolboxtalkedit/{id}',[SATController::class,'editToolboxTalk'])->name('SAT.toolboxtalkedit');
 Route::post('/SAT-toolboxtalk-store', [SATController::class, 'storeToolboxtalk'])->name('SAT.toolboxtalk.store');
 Route::post('/SAT-toolboxtalk-update/{id}', [SATController::class, 'updateToolboxtalk'])->name('SAT.toolboxtalk.update');
 Route::delete('/toolbox-talks/{id}', [SATController::class, 'destroyToolboxTalk'])->name('toolbox-talks.destroy');
 Route::delete('/sat/{id}', [SATController::class, 'destroy'])->name('sat.destroy');
 Route::resource('sat-attachments', SATAttachmentsController::class);

Route::resource('sat', SATController::class);


 Route::get('/sat-attachment/{id}/index', [SATAttachmentsController::class, 'index'])->name('sat-attachment.index');
 

   
Route::get('/sat', [SATController::class, 'index'])->name('sat.index');

// Show the form for creating a new SAT
Route::get('/sat/create/{id}', [SATController::class, 'create'])->name('sat.create');
Route::get('/sat/{id}/edit', [SATController::class, 'edit'])->name('sat.edit');

Route::put('/sat/{id}', [SATController::class, 'update'])->name('sat.update');





// Store a new SAT record
Route::post('sat-store', [SATController::class, 'store'])->name('sat.store');


Route::get('/LKS/{id}', [LKSController::class, 'index'])->name('LKS.index');
Route::get('/ss_tbk/{id}', [LKSController::class, 'siteSurveyToolboxTalk'])->name('ss_tbk');

Route::get('/ss_info/{id}', [LKSController::class, 'siteSurvey'])->name('ss_info');
Route::get('/ss_pics/{id}', [LKSController::class, 'siteSurveyPics'])->name('ss_pics');

Route::get('/ss_attachments/{id}', [LKSController::class, 'siteSurveyAttachments'])->name('ss_attachments');

Route::get('/LKS/create/{id}', [LKSController::class, 'create'])->name('LKS.create');

Route::get('/pc_tbk/{id}', [LKSController::class, 'PrecableToolboxTalk'])->name('pc_tbk');
Route::get('/sd_tbk/{id}', [LKSController::class, 'ShutdownToolboxTalk'])->name('sd_tbk');
Route::get('/sat_tbk/{id}', [LKSController::class, 'SATToolboxTalk'])->name('sat_tbk');

Route::get('/precable_attachments/{id}', [LKSController::class, 'PreCabling_Attachments'])->name('precable_attachments');
Route::get('/shutdown_attachments/{id}', [LKSController::class, 'Shutdown_Attachments'])->name('shutdown_attachments');
Route::get('/SAT_attachments/{id}', [LKSController::class, 'SAT_Attachments'])->name('SAT_attachments');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('site-data-collection', siteDateCollection::class);
    Route::view('site-data/create-mobile','siteDataCollections.create-mobile');
    Route::resource('update-site-data-images', updateSiteDataImages::class);
    Route::get('topnavbar/{id}', [TopnavbarController::class, 'index']);

    // Route::resource('estimation-work', estimationWork::class);
    // Route::post('update-site-data-images/{id}/edit/{status}', [updateSiteDataImages::class, 'edit']);

    // Route::resource('requisition',requisitionController::class);
    // Route::get('/get-type/{item}',[requisitionController::class,'getType']);

    

    






});

require __DIR__ . '/auth.php';

Route::get('/dashboard', function () {

    return Auth::user()->type  ? Redirect::route('site_survey.index'):Redirect::route('admin-order.index') ;

})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
