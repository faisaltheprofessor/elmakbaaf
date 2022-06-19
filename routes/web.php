<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

//salse part
use App\Http\Controllers\salseManagerController;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StreetController;
use App\Http\Controllers\AddClientController;
use App\Http\Controllers\AllClientController;
use App\Http\Controllers\PhoneController;

use App\Http\Controllers\TakingorderController;
use App\Http\Controllers\CartitemorderController;
use App\Http\Controllers\ClientorderController;


use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReceiptController;


use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\ProductController;


//onlin ecomarce
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;



//Purchese Manager
use App\Http\Controllers\PurcheseManagerController;
use App\Http\Controllers\ScountryController;
use App\Http\Controllers\ScityController;
use App\Http\Controllers\SstreetController;
use App\Http\Controllers\SphoneController;
use App\Http\Controllers\ScatagoryController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\ContactsController;


//website
use App\Http\Controllers\WebsitepageController;

//Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\WebsitecontactusController; 
use App\Http\Controllers\WebsitegallaryController;
use App\Http\Controllers\AboutcollectionController;
use App\Http\Controllers\AboutourhistoryController;
use App\Http\Controllers\AboutachievementController;

// Charts
use App\Http\Controllers\OrderchartController;
use App\Http\Controllers\SalsechartController;
use App\Http\Controllers\ExoprtProductController;
use App\Http\Controllers\ClientChartController;


use App\Http\Controllers\ImportProductController;
use App\Http\Controllers\PurcheseChartController;
// wrote on page jobs
// use App\Mail\SendEmailMailable;
// use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;
use Carbon\Carbon;

//Route::get('/', function () {
//    return view('websitePages/home');
//});

Route::fallback( function () {
    return view('welcome');
});


Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');



//admin Pages 
Route::group(['middleware' => ['can:Admin']], function () {  

    Route::get('/admin',[AdminController::class, 'index'])->name('admin_index');
    Route::get('/RegisterUser',[AdminController::class, 'RegisterUser']);       
    
    //slideshow
    Route::get('/slideshow',[SlideshowController::class, 'index'])->name('slideshow');
    Route::post('/slideshow',[SlideshowController::class, 'store']);
    Route::get('/slideshow/delete/{id}',[SlideshowController::class, 'destroy']);
    Route::get('/slideshowtrash',[SlideshowController::class, 'SlideshowTrash'])->name('SlideshowTrash');
    Route::get('/slideshow/reastore/{id}',[SlideshowController::class, 'SlideshowReastore']);
    Route::get('/slideshow/forcedelete/{id}',[SlideshowController::class, 'SlideshowForceDelete']);
    
    Route::post('/websitecontactus',[WebsitecontactusController::class, 'store']);
    Route::get('/websitecontactus',[WebsitecontactusController::class, 'index'])->name('websitecontactus');
    Route::get('/websitecontactus/delete/{id}',[WebsitecontactusController::class, 'destroy']);


    Route::get('/websitegallary',[WebsitegallaryController::class, 'index'])->name('WebsiteGallary');
    Route::post('/websitegallary',[WebsitegallaryController::class, 'store']);
    Route::get('/websitegallary/delete/{id}',[WebsitegallaryController::class, 'destroy']);
    Route::get('/websitegallarytrash',[WebsitegallaryController::class, 'WebsitegallaryTrash'])->name('WebsitegallaryTrash');
    Route::get('/websitegallary/reastore/{id}',[WebsitegallaryController::class, 'WebsitegallaryReastore']);
    Route::get('/websitegallary/forcedelete/{id}',[WebsitegallaryController::class, 'WebsitegallaryForceDelete']);

    Route::get('/websiteAboteCollication',[AboutcollectionController::class, 'index'])->name('websiteAboteCollication');
    Route::post('/websiteAboteCollication',[AboutcollectionController::class, 'store']);
    Route::get('/websiteAboteCollication/edit/{id}',[AboutcollectionController::class, 'edit']);
    Route::put('/websiteAboteCollication/edit/{id}',[AboutcollectionController::class, 'update']);
    Route::get('/websiteAboteCollication/delete/{id}',[AboutcollectionController::class, 'destroy']);
    Route::get('/websitecollectiontrash',[AboutcollectionController::class, 'WebsitecollectionTrash'])->name('WebsitecollectionTrash');
    Route::get('/websitecollection/reastore/{id}',[AboutcollectionController::class, 'WebsitecollectionReastore']);
    Route::get('/websitecollection/forcedelete/{id}',[AboutcollectionController::class, 'WebsitecollectionForceDelete']);

    
    Route::get('/websiteAboteAchivement',[AboutachievementController::class, 'index'])->name('websiteAboteAchivement');
    Route::post('/websiteAboteAchivement',[AboutachievementController::class, 'store']);
    Route::get('/websiteAboteAchivement/edit/{id}',[AboutachievementController::class, 'edit']);
    Route::put('/websiteAboteAchivement/edit/{id}',[AboutachievementController::class, 'update']);
    Route::get('/websiteAboteAchivement/delete/{id}',[AboutachievementController::class, 'destroy']);
    Route::get('/websiteAboteAchivementtrash',[AboutachievementController::class, 'WebsiteAboteAchivementTrash'])->name('WebsiteAboteAchivementTrash');
    Route::get('/websiteAboteAchivement/reastore/{id}',[AboutachievementController::class, 'WebsiteAboteAchivementReastore']);
    Route::get('/websiteAboteAchivement/forcedelete/{id}',[AboutachievementController::class, 'WebsiteAboteAchivementForceDelete']);


    Route::get('/websiteAboteHistory',[AboutourhistoryController::class, 'index'])->name('websiteAboteHistory');
    Route::post('/websiteAboteHistory',[AboutourhistoryController::class, 'store']);
    Route::get('/websiteAboteHistory/edit/{id}',[AboutourhistoryController::class, 'edit']);
    Route::put('/websiteAboteHistory/edit/{id}',[AboutourhistoryController::class, 'update']);
    Route::get('/websiteAboteHistory/delete/{id}',[AboutourhistoryController::class, 'destroy']);
    Route::get('/websiteAboteHistorytrash',[AboutourhistoryController::class, 'WebsiteAboteHistoryTrash'])->name('WebsiteAbouteHistoryTrash');
    Route::get('/websiteAboteHistory/reastore/{id}',[AboutourhistoryController::class, 'WebsiteAboteHistoryReastore']);
    Route::get('/websiteAboteHistory/forcedelete/{id}',[AboutourhistoryController::class, 'WebsiteAboteHistoryForceDelete']);


    Route::get('/userorder',[CheckoutController::class, 'userorder']);
});


//Salse Manager Pages 
Route::group(['middleware' => ['can:Salse_Manager']], function () {  
    // Route::get('/suplierchart',[PurcheseManagerController::class, 'SuplierChart']);
    
    Route::get('/salse',[salseManagerController::class, 'index'])->name('salse_index');
    //Graph of Client
    Route::get('/testmonth',[ClientChartController::class, 'getMontlyClientComeData']);
    Route::get('/clientpermonth',[salseManagerController::class, 'ClientPerMonth']);
    //Order chart
    Route::get('/testordermonth',[OrderchartController::class, 'getMontlyOrderComeData']);
    Route::get('/orderpermonth',[salseManagerController::class, 'OrderPerMonth']);
    //Graph of salse
    Route::get('/testsalsemonth',[SalsechartController::class, 'getMontlySalseComeData']);
    Route::get('/salsepermonth',[salseManagerController::class, 'SalsePerMonth']);
   //Export Product
    Route::get('/testexportproductemonth',[ExoprtProductController::class, 'getMontlyExportProductComeData']);
    Route::get('/exportproductpermonth',[salseManagerController::class, 'ExportProductPerMonth']);

    //salse
    //country
    Route::get('/country',[CountryController::class, 'index'])->name('country_index');
    Route::post('/country',[CountryController::class, 'store']);
    Route::get('/country/edit/{id}',[CountryController::class, 'edit']);
    Route::put('/country/edit/{id}',[CountryController::class, 'update']);
    Route::get('/country/delete/{id}',[CountryController::class, 'destroy']);
    Route::get('/countrytrash',[CountryController::class, 'CountryTrash'])->name('CountryTrash');
    Route::get('/country/reastore/{id}',[CountryController::class, 'CountryReastore']);
    Route::get('/country/forcedelete/{id}',[CountryController::class, 'CountryForceDelete']);
    //city
    Route::get('/city',[CityController::class, 'index'])->name('city_index');
    Route::post('/city',[CityController::class, 'store']);
    Route::get('/city/edit/{id}',[CityController::class, 'edit']);
    Route::put('/city/edit/{id}',[CityController::class, 'update']);
    Route::get('/city/delete/{id}',[CityController::class, 'destroy']);
    Route::get('/citytrash',[CityController::class, 'CityTrash'])->name('CityTrash');
    Route::get('/city/reastore/{id}',[CityController::class, 'CityReastore']);
    Route::get('/city/forcedelete/{id}',[CityController::class, 'CityForceDelete']);
    //Street
    Route::get('/street',[StreetController::class, 'index'])->name('street_index');
    Route::post('/street',[StreetController::class, 'store']);
    Route::get('/street/edit/{id}',[StreetController::class, 'edit']);
    Route::put('/street/edit/{id}',[StreetController::class, 'update']);
    Route::get('/street/delete/{id}',[StreetController::class, 'destroy']);
    Route::get('/streettrash',[StreetController::class, 'StreetTrash'])->name('StreetTrash');
    Route::get('/street/reastore/{id}',[StreetController::class, 'StreetReastore']);
    Route::get('/street/forcedelete/{id}',[StreetController::class, 'StreetForceDelete']);
    //AddClient
    Route::get('/addClient',[AddClientController::class, 'index'])->middleware(['can:Salse_Manager'])->name('AddClient_index');
    Route::post('/addClient',[AddClientController::class, 'store']);
    Route::get('/addClient/edit/{id}',[AddClientController::class, 'edit']);
    Route::put('/addClient/edit/{id}',[AddClientController::class, 'update']);
    Route::get('/addClient/delete/{id}',[AddClientController::class, 'destroy']);
    Route::get('/allClient',[AddClientController::class, 'ShowAllClient'])->name('AllClient_show');
    Route::get('/clienttrash',[AddClientController::class, 'ClientTrash'])->name('ClientTrash');
    Route::get('/client/reastore/{id}',[AddClientController::class, 'ClientReastore']);
    Route::get('/client/forcedelete/{id}',[AddClientController::class, 'ClientForceDelete']);
    //phone Number
    Route::get('/phone',[PhoneController::class, 'index'])->name('Phone_index');
    Route::post('/phone',[PhoneController::class, 'store']);
    Route::get('/phone/edit/{id}',[PhoneController::class, 'edit']);
    Route::put('/phone/edit/{id}',[PhoneController::class, 'update']);
    Route::get('/phone/delete/{id}',[PhoneController::class, 'destroy']);
    Route::get('/phonetrash',[PhoneController::class, 'PhoneTrash'])->name('PhoneTrash');
    Route::get('/phone/reastore/{id}',[PhoneController::class, 'PhoneReastore']);
    Route::get('/phone/forcedelete/{id}',[PhoneController::class, 'PhoneForceDelete']);
    
    // ######### invoice Part
    Route::get('/makeinvoice',[InvoiceController::class, 'makeinvoice'])->name('makeinvoice');
    Route::post('/invoicecart',[InvoiceController::class, 'invoicecart']);
    Route::post('/makeinvoice',[InvoiceController::class, 'store']);
    Route::get('invoicecart/delete/{id}',[InvoiceController::class, 'destroy']);
    Route::get('/AllInvoice',[InvoiceController::class, 'AllInvoice']);
    Route::get('/invoice_products/{id}',[InvoiceController::class, 'invoice_product_detail']);
    Route::post('/update-invoice-item-quantity',[InvoiceController::class, 'UpdateInvoiceItemQuantity']);
    Route::get('print-pdf-invoice/{id}',[InvoiceController::class, 'PrintPdfInvoice']);
    
    //Order Management System
//  first item store here
    Route::get('/OrderedItem',[TakingorderController::class, 'OrderedItem'])->name('Order_items');
    Route::post('/OrderedItem',[TakingorderController::class, 'StoreOrderedItem'])->name('Store_Order_items');
    
    Route::get('/OrderedItem/edit/{id}',[TakingorderController::class, 'edit']);
    Route::put('/OrderedItem/edit/{id}',[TakingorderController::class, 'update']);
    
    Route::get('/OrderedItem/delete/{id}',[TakingorderController::class, 'destroy']);
    Route::get('/AllOrderedItemCart',[TakingorderController::class, 'AllOrderItemCartindex'])->name('Order_items_cart');
    Route::get('/OrderedItemtrash',[TakingorderController::class, 'OrderItemCartTrash'])->name('OrderedItemTrash');
    Route::get('/OrderedItem/reastore/{id}',[TakingorderController::class, 'OrderedItemReastore']);
    Route::get('/OrderedItem/forcedelete/{id}',[TakingorderController::class, 'OrderedItemForceDelete']);

 //check out Part  
    Route::post('/OrderedItemCart',[CartitemorderController::class, 'store'])->name('Store_Order_items_cart');   
    Route::post('/OrderItemCart',[ClientorderController::class, 'orderitemcart']);
    Route::get('/OrderItemCart/delete/{id}',[ClientorderController::class, 'OrderItemCartdestroy']);   
    // Route::post('/update-ordercart-item-quantity',[ClientorderController::class, 'UpdateOrdercartItemQuantity']);
    Route::get('/ClientOrder',[ClientorderController::class, 'ClientOrder'])->name('ClientOrder');
    //Route::post('/ClientOrder',[CartitemorderController::class, 'store'])->name('ClientOrder');
    Route::post('/ClientOrder',[ClientorderController::class, 'store'])->name('ClientOrder');
    Route::post('/update-clientorder-item-quantity',[ClientorderController::class, 'UpdateClientorderItemQuantity']);
    Route::get('/ClientAllOrder',[ClientorderController::class, 'ClientAllOrder']);
    Route::get('/ClientOrders_products/{id}',[ClientorderController::class, 'client_ordered_product_detail']);
 
});




//Purchese Manager Pages 
Route::group(['middleware' => ['can:Purchese_Manager']], function () {  
    
    Route::get('/purches',[PurcheseManagerController::class, 'index'])->name('purchese_index');
    
    //purchese charts
    Route::get('/testpurchesemonth',[PurcheseChartController::class, 'getMontlyPurchesesData']);
    Route::get('/purchesepermonth',[PurcheseManagerController::class, 'PurchesePerMonth']);
    //Imported Product
    Route::get('/testeimportedproductemonth',[ImportProductController::class, 'getMoimportedProductComeData']);
    Route::get('/importproductpermonth',[PurcheseManagerController::class, 'ImportProductPerMonth']);

   
    //Suplier Country
    Route::get('/scountry',[ScountryController::class, 'index'])->name('Scountry_index');
    Route::post('/scountry',[ScountryController::class, 'store']);
    Route::get('/scountry/edit/{id}',[ScountryController::class, 'edit']);
    Route::put('/scountry/edit/{id}',[ScountryController::class, 'update']);
    Route::get('/scountry/delete/{id}',[ScountryController::class, 'destroy']);
    Route::get('/scountrytrash',[ScountryController::class, 'ScountryTrash'])->name('ScountryTrash');
    Route::get('/scountry/reastore/{id}',[ScountryController::class, 'ScountryReastore']);
    Route::get('/scountry/forcedelete/{id}',[ScountryController::class, 'ScountryForceDelete']);
    //Suplier City
    Route::get('/scity',[ScityController::class, 'index'])->name('Scity_index');
    Route::post('/scity',[ScityController::class, 'store']);
    Route::get('/scity/edit/{id}',[ScityController::class, 'edit']);
    Route::put('/scity/edit/{id}',[ScityController::class, 'update']);
    Route::get('/scity/delete/{id}',[ScityController::class, 'destroy']);
    Route::get('/scitytrash',[ScityController::class, 'ScityTrash'])->name('ScityTrash');
    Route::get('/scity/reastore/{id}',[ScityController::class, 'ScityReastore']);
    Route::get('/scity/forcedelete/{id}',[ScityController::class, 'ScityForceDelete']);
    //Suplier Street 
    Route::get('/sstreet',[SstreetController::class, 'index'])->name('Sstreet_index');
    Route::post('/sstreet',[SstreetController::class, 'store']);
    Route::get('/sstreet/edit/{id}',[SstreetController::class, 'edit']);
    Route::put('/sstreet/edit/{id}',[SstreetController::class, 'update']);
    Route::get('/sstreet/delete/{id}',[SstreetController::class, 'destroy']);
    Route::get('/sstreettrash',[SstreetController::class, 'SstreetTrash'])->name('SstreetTrash');
    Route::get('/sstreet/reastore/{id}',[SstreetController::class, 'SstreetReastore']);
    Route::get('/sstreet/forcedelete/{id}',[SstreetController::class, 'SstreetForceDelete']);

    // Suplier catagory
    Route::get('/scatagory',[ScatagoryController::class, 'index'])->name('scatagory_index');
    Route::post('/scatagory',[ScatagoryController::class, 'store']);
    Route::get('/scatagory/edit/{id}',[ScatagoryController::class, 'edit']);
    Route::put('/scatagory/edit/{id}',[ScatagoryController::class, 'update']);
    Route::get('/scatagory/delete/{id}',[ScatagoryController::class, 'destroy']);
    Route::get('/scatagorytrash',[ScatagoryController::class, 'ScatagoryTrash'])->name('ScatagoryTrash');
    Route::get('/scatagory/reastore/{id}',[ScatagoryController::class, 'ScatagoryReastore']);
    Route::get('/scatagory/forcedelete/{id}',[ScatagoryController::class, 'ScatagoryForceDelete']);
    //Suplier 
    Route::get('/suplier',[SuplierController::class, 'index'])->middleware(['can:Purchese_Manager,App\Models\Suplier'])->name('Suplier_index');
    Route::post('/suplier',[SuplierController::class, 'store']);
    Route::get('/suplier/edit/{id}',[SuplierController::class, 'edit']);
    Route::put('/suplier/edit/{id}',[SuplierController::class, 'update']);
    Route::get('/suplier/delete/{id}',[SuplierController::class, 'destroy']);
    Route::get('/Allsuplier',[SuplierController::class, 'ShowSuplier'])->name('Suplier_show');
    Route::get('/supliertrash',[SuplierController::class, 'SuplierTrash'])->name('SuplierTrash');
    Route::get('/suplier/reastore/{id}',[SuplierController::class, 'SuplierReastore']);
    Route::get('/suplier/forcedelete/{id}',[SuplierController::class, 'SuplierForceDelete']);
    //Suplier Contact Number
    Route::get('/contact',[ContactsController::class, 'index'])->name('Contacts_index');
    Route::post('/contact',[ContactsController::class, 'store']);
    Route::get('/contact/edit/{id}',[ContactsController::class, 'edit']);
    Route::put('/contact/edit/{id}',[ContactsController::class, 'update']);
    Route::get('/contact/delete/{id}',[ContactsController::class, 'destroy']);
    Route::get('/contacttrash',[ContactsController::class, 'ContactTrash'])->name('ContactTrash');
    Route::get('/contact/reastore/{id}',[ContactsController::class, 'ContactReastore']);
    Route::get('/contact/forcedelete/{id}',[ContactsController::class, 'ContactForceDelete']);
    //catagory product
    Route::get('/catagory',[CatagoryController::class, 'index'])->name('Catagory_index');
    Route::post('/catagory',[CatagoryController::class, 'store']);
    Route::get('/catagory/edit/{id}',[CatagoryController::class, 'edit']);
    Route::put('/catagory/edit/{id}',[CatagoryController::class, 'update']);
    Route::get('/catagory/delete/{id}',[CatagoryController::class, 'destroy']);
    Route::get('/catagorytrash',[CatagoryController::class, 'CatagoryTrash'])->name('CatagoryTrash');
    Route::get('/catagory/reastore/{id}',[CatagoryController::class, 'CatagoryReastore']);
    Route::get('/catagory/forcedelete/{id}',[CatagoryController::class, 'CatagoryForceDelete']);
    // #######Receipt
    Route::get('/makereceipt',[ReceiptController::class, 'makereceipt'])->name('makereceipt');
    Route::post('/receiptcart',[ReceiptController::class, 'receiptcart']);
    Route::get('/receiptcart/delete/{id}',[ReceiptController::class, 'destroy']);
    Route::post('/makereceipt',[ReceiptController::class, 'store']);
    Route::get('/AllReceipt',[ReceiptController::class, 'AllReceipt']);
    Route::get('/Receipt_products/{id}',[ReceiptController::class, 'receipt_product_detail']);
    Route::post('/update-receipt-item-quantity',[ReceiptController::class, 'UpdateReceiptItemQuantity']);
    Route::get('print-pdf-receipt/{id}',[ReceiptController::class, 'PrintPdfReceipt']);
});


// Route::group(['middleware' => ['can:Normal_User']], function () {  
    Route::get('/userdashboard',[CheckoutController::class, 'UserDashboard']);
    Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout.index')->middleware(['auth']);
    Route::post('/checkout',[CheckoutController::class, 'store']);
   
    //user orderd product detail
    Route::get('/orders_products/{id}',[CheckoutController::class, 'user_ordered_product_detail']);
    Route::get('/myaccount',[CheckoutController::class, 'myaccount'])->middleware(['auth']);                                   
    Route::get('/user_orders_products/{id}',[CheckoutController::class, 'useraccount_ordered_product_detail']);

// });


//website Pages everyone can see
Route::get('/main',[WebsitepageController::class, 'main'])->name('main');
Route::get('/home',[WebsitepageController::class, 'home'])->name('home')->middleware('guest');
Route::get('/',[WebsitepageController::class, 'home'])->name('home');

Route::get('/about',[WebsitepageController::class, 'about'])->name('about');
Route::get('/carpetvalue',[WebsitepageController::class, 'carpetvalue'])->name('carpetvalue');
Route::get('/collection',[WebsitepageController::class, 'collection'])->name('collection');
Route::get('/achievement',[WebsitepageController::class, 'achievement'])->name('achievement');

Route::get('/contactus',[WebsitepageController::class, 'contactus'])->name('contact');
Route::get('/gallary',[WebsitepageController::class, 'gallary'])->name('gallary');
//****************shop******************
Route::get('/shop',[CartController::class, 'index'])->name('shop_index');
Route::post('/shop',[CartController::class, 'store']);
// Route::get('/list',[CartController::class, 'cartList'])->name('cart_List');
//cart Quantity Upate _ +
Route::post('/update-cart-item-quantity',[CartController::class, 'UpdateCartItemQuantity']);
//delete frome list
Route::get('cart/delete/{id}',[CartController::class, 'destroy'])->name('cart.delete');
//cart coun in navigation
Route::get('/load-cart-data',[CartController::class, 'cartcount']);


//Route::get('/index',[DashboardController::class, 'index'])->name('welcome');

//product
Route::get('/product',[ProductController::class, 'index'])->name('Product_index');
Route::post('/product',[ProductController::class, 'store']);
Route::get('/product/edit/{id}',[ProductController::class, 'edit']);
Route::put('/product/edit/{id}',[ProductController::class, 'update']);
Route::get('/product/delete/{id}',[ProductController::class, 'destroy']);
Route::get('/allProduct',[ProductController::class, 'ShowProduct'])->name('AllProduct_show');
Route::post('/UpdateProductStatuse',[ProductController::class, 'UpdateProductStatuse']);
Route::get('/Producttrash',[ProductController::class, 'ProductTrash'])->name('ProductTrash');
Route::get('/Product/reastore/{id}',[ProductController::class, 'ProductReastore']);
Route::get('/Product/forcedelete/{id}',[ProductController::class, 'ProductForceDelete']);





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
