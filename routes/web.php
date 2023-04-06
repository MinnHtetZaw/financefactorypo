<?php

use App\Doctor;
use App\Events\DoctorChange;
use App\Events\TestingEvent;
use App\Http\Controllers\TenderGeneralController;
use App\Http\Controllers\Web\InventoryController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\FinancialReportController;
use App\Http\Controllers\WarehouseStockController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

Route::get('/pusher', function(){
	event(new DoctorChange('Hey how are you'));
});

// Route::get('/', 'Web\FrontendController@index')->name('frontend.home');

Route::get('/', 'Web\LoginController@index')->name('login_page');
// Route::get('/', 'Web\LoginController@index')->name('login_page');

Route::post('LoginProcess', 'Web\LoginController@LoginProcess')->name('user_login');

Route::get('/LogoutProcess', 'Web\LoginController@LogoutProcess')->name('logout');

Route::group(['middleware' => ['UserAuth']], function () {

	//Syspexshwe Begin

    // Factory PO
    Route::get('factoryitem_list', 'Web\FactoryController@factoryitem_list')->name('factoryitem_list');
    Route::post('showSubCategory', 'Web\InventoryController@showSubCategory');
    Route::post('item_search','Web\FactoryController@itemSearch')->name('item_search');
    Route::post('subcategory_search','Web\FactoryController@subcategorySearch')->name('subcategory_search');
    Route::post('factoryitem/store', 'Web\FactoryController@storeFactoryItem')->name('factoryitem_store');
    Route::get('create/itemrequest', 'Web\FactoryController@newcreate_itemrequest')->name('newcreate_itemrequest');
    Route::post('storePurchaseOrder', 'Web\FactoryController@storePurchaseOrder');
    Route::get('FactoryPoList', 'Web\FactoryController@getFactoryPOPage')->name('factorypo_page');
    Route::post('PO/Approve', 'Web\FactoryController@changePOStatus')->name('update_po_status');
    Route::get('PO-Details/{id}', 'Web\FactoryController@getPoDetails')->name('po_details');
    Route::get('Purchase/Create', 'Web\FactoryController@createPurchaseHistory')->name('create_purchase');
    Route::get('suppliercreditlist','Web\FactoryController@show_supplier_credit_lists')->name('supplier_credit_list');
    Route::post('store_supplier', 'Web\FactoryController@store_supplier')->name('store_supplier');
    Route::post('Purchase/Store', 'Web\FactoryController@storePurchaseHistory')->name('store_purchase');
    Route::get('Purchase', 'Web\FactoryController@getPurchaseHistory')->name('purchase_list');
    Route::get('Purchase/Details/{id}', 'Web\FactoryController@getPurchaseHistoryDetails')->name('purchase_details');
    Route::post('purchase_delete', 'Web\FactoryController@purchaseDelete')->name('purchase_delete');
    // Route::post('purchseupdate-ajax', 'Web\FactoryController@purchaseUpdateAjax')->name('purchaseupdate-ajax');
    Route::post('saveArriveFactory', 'Web\FactoryController@saveArriveFactory')->name('saveArriveFactory');
    Route::post('store_factorypo_expense','Web\FactoryController@storeFactoryPoExpense')->name('store_factorypo_expense');
    Route::post('factoryitem/update/{id}','Web\FactoryController@updatefactoryItem')->name('factoryitem_update');


    // Route::get('category_list', 'Web\InventoryController@category_list')->name('category_list');
    // Route::post('store_category', 'Web\InventoryController@store_category')->name('store_category');
    Route::get('sub_category_list', 'TenderGeneralController@sub_category_list')->name('sub_category_list');
    Route::post('store_subcategory', 'TenderGeneralController@store_subcategory')->name('store_subcategory');
    // Route::get('bank_list', 'Web\InventoryController@bank_list')->name('bank_list');
    // Route::get('company_information', 'Web\InventoryController@company_information')->name('company_information');

	// Route::post('update_cate','TenderGeneralController@update_category')->name('update_cate');

	Route::post('delete_cate','TenderGeneralController@delete_category')->name('delete_cate');

	Route::post('update_subcate','TenderGeneralController@update_subcategory')->name('update_subcate');
	Route::post('delete_subcate','TenderGeneralController@delete_subcategory')->name('delete_subcate');

    Route::post('store_bank', 'TenderGeneralController@store_bank')->name('store_bank');
    Route::post('store_company', 'TenderGeneralController@store_company')->name('store_company');
    Route::post('update_company', 'TenderGeneralController@update_company')->name('update_company');
    Route::post('store_tran', 'TenderGeneralController@store_tran')->name('store_tran');
    Route::post('store_expense', 'TenderGeneralController@store_expense')->name('store_expense');

    Route::post('store_incoming', 'TenderGeneralController@store_incoming')->name('store_incoming');

    Route::get('fixed_asset', 'TenderGeneralController@fixed_asset')->name('fixed_asset');
    Route::get('expense', 'TenderGeneralController@expense')->name('expense');
    Route::get('incoming', 'TenderGeneralController@incoming')->name('incoming');
    Route::get('incoming_type', 'TenderGeneralController@incoming_type')->name('incoming_type');
    Route::get('expense_type', 'TenderGeneralController@expense_type')->name('expense_type');
    Route::post('store_assets', 'TenderGeneralController@store_asset')->name('store_assets');
    Route::post('store_sell_end', 'TenderGeneralController@store_sell_end')->name('store_sell_end');
    Route::get('add_asset', 'TenderGeneralController@add_asset')->name('add_asset');

	Route::get('AccountList', 'Web\OperatorController@ShowAccountList')->name('account_list');
    // Route::get('profit_loss_acc_list', 'Web\OperatorController@profit_loss_acc_list')->name('profit_loss_acc_list');
    // Route::get('balancesheet_acc_list', 'Web\OperatorController@balancesheet_acc_list')->name('balancesheet_acc_list');
    // Route::get('trial_balance', 'Web\OperatorController@trial_balance')->name('trial_balance');
	Route::get('projectList', 'TenderGeneralController@show_account_list')->name('project_list');
	// Route::get('create-project', 'TenderGeneralController@create_project')->name('create_project');
	Route::get('customer-list', 'TenderGeneralController@show_customer_list')->name('customer_list');
	Route::post('store-customer','TenderGeneralController@storeCustomer')->name('store_customer');
	Route::post('check_project_type','TenderGeneralController@check_projectType')->name('check_project_type');
	// Route::get('show_project','TenderGeneralController@show_projectsale')->name('show_project');
	// Route::post('store_sale_project','TenderGeneralController@store_sale_project')->name('store_sale_project');
	Route::post('store_accounting','TenderGeneralController@store_accounting_account')->name('store_accounting');
	// Route::get('create-product', 'TenderGeneralController@createProduct')->name('create-product');

	// Route::get('product_list', 'TenderGeneralController@product_list')->name('product_list');
	// Route::post('add_item','TenderGeneralController@add_item_product')->name('add_item');
    Route::get('cost_center', 'TenderGeneralController@cost_center')->name('cost_center');
    Route::get('currency', 'TenderGeneralController@currency')->name('currency');
    Route::post('store_currency', 'TenderGeneralController@store_currency')->name('store_currency');

    Route::post('ajax_date_filter', 'TenderGeneralController@ajax_date_filter')->name('ajax_date_filter');
    Route::post('ajax_convert', 'TenderGeneralController@ajax_convert')->name('ajax_convert');
    Route::post('ajax_code_search', 'TenderGeneralController@ajax_code_search')->name('ajax_code_search');
    Route::post('ajax_search_code', 'TenderGeneralController@ajax_search_code')->name('ajax_search_code');
    Route::post('ajax_filter_date', 'TenderGeneralController@ajax_filter_date')->name('ajax_filter_date');
	Route::post('ajaxSendMaterialIssue', 'Web\WarehouseStockController@ajaxSendMaterialIssue')->name('ajaxSendMaterialIssue');

    Route::post('update_currency/{id}', 'TenderGeneralController@update_currency')->name('update_currency');
    Route::post('update_accounting/{id}', 'TenderGeneralController@update_accounting')->name('update_accounting');
    Route::post('store_cost_center', 'TenderGeneralController@store_cost_center')->name('store_cost_center');
	// Route::post('store_product', 'TenderGeneralController@store_product')->name('store_product');
	Route::get('add_invoice','TenderGeneralController@add_new_invoice')->name('add_invoice');
	Route::post('store_invoice','TenderGeneralController@store_invoice')->name('store_invoice');
	Route::get('show_invoice','TenderGeneralController@show_invoice_list')->name('show_invoice');

	Route::get('invoice_accounting/{id}','TenderGeneralController@show_invoice_accounting')->name('invoice_accounting');
	Route::post('store_invoice_accounting','TenderGeneralController@store_invoiceAccounting')->name('store_invoice_accounting');
	Route::get('po_accounting/{id}','TenderGeneralController@show_po_accounting')->name('po_accounting');
	Route::post('store_po_accounting','TenderGeneralController@store_poAccounting')->name('store_po_accounting');
	Route::post('store_pay_po_transaction','TenderGeneralController@store_pay_po_transaction')->name('store_pay_po_transaction');
	//Supplier
	Route::get('supplier_list','TenderGeneralController@supplier_list')->name('supplier_list');
	Route::post('ajaxSupplier','TenderGeneralController@ajaxSupplier')->name('ajaxSupplier');
	Route::post('ajaxBrand_detail','TenderGeneralController@brand_detail_all')->name('ajaxBrand_detail');
	Route::get('supplier_po_list/{id}','TenderGeneralController@show_supplier_po_list')->name('supplier_po_list');
	Route::post('ajaxSocial','TenderGeneralController@show_ajax_social')->name('ajaxSocial');
	Route::post('update_supplier_info','TenderGeneralController@update_supplier')->name('update_supplier_info');
	Route::get('delete_supplier/{id}','TenderGeneralController@delete_supplier_info')->name('delete_supplier');
	Route::post('ajax_add_brand','TenderGeneralController@ajax_add_new_brand')->name('ajax_add_brand');
	Route::post('ajax_delete_brand','TenderGeneralController@ajax_delete_new_brand')->name('ajax_delete_brand');
	Route::post('get_subcate_ajax','TenderGeneralController@ajax_get_subcate')->name('get_subcate_ajax');
	Route::post('store_add_product_ajax','TenderGeneralController@ajax_store_new_product')->name('store_add_product_ajax');
	// Route::get('RegionalWarehouse','TenderGeneralController@RegionalWarehouse')->name('RegionalWarehouse');
	// Route::get('add_regional_ware','TenderGeneralController@create_regional_ware')->name('add_regional');
	Route::post('store_regional','MasterDataController@store_regional_ware')->name('store_regional_warehouse');
	// Route::post('store_regional_ware','TenderGeneralController@store_regional_ware')->name('store_regional');
	Route::get('regional_inventory/{regional_id}','TenderGeneralController@regionalInventory')->name('regional_inventory');
	// Route::get('check_inventory_list/{regional_id}','TenderGeneralController@checkInventory')->name('check_inventory_list');

	//BOM
	Route::get('show_bom','TenderGeneralController@show_bom_list')->name('show_bom');
	Route::get('add_bom','TenderGeneralController@add_new_bom')->name('add_bom');
	Route::post('store_bom','TenderGeneralController@store_bom')->name('store_bom');
	Route::post('ajax_get_bom_supplier','TenderGeneralController@get_bom_supplier')->name('ajax_get_bom_supplier');
	Route::post('ajax_bom_product','TenderGeneralController@bom_product_list')->name('ajax_bom_product');
	Route::get('bom_supplier_list/{bom_id}','TenderGeneralController@get_bom_supplier_list')->name('bom_supplier_list');
	Route::post('ajax_get_request_supplier','TenderGeneralController@get_request_supplier')->name('ajax_get_request_supplier');
	Route::post('send_email_store_req','TenderGeneralController@store_email_req')->name('send_email_store_req');
	Route::get('show_supplier_purchase_order','TenderGeneralController@show_supplier_po_form')->name('show_supplier_purchase_order');
	Route::get('back_bom_supplier_list/{bom_id}','TenderGeneralController@reshow_bom_supplier_list')->name('back_bom_supplier_list');
	Route::post('store_bom_po_info','TenderGeneralController@store_bom_po')->name('store_bom_po_info');
	Route::post('ajax_get_all_products','TenderGeneralController@get_all_products')->name('ajax_get_all_products');

	Route::get('update_bom_supplier_req/{bom_supplier_id}','TenderGeneralController@update_bom_supplier_request')->name('update_bom_supplier_req');
	Route::post('update_bom_supplier','TenderGeneralController@update_bom_supplier_page')->name('update_bom_supplier');

	//GRN
	Route::get('show_grn_form','TenderGeneralController@show_grn_list')->name('show_grn_form');
	Route::get('add_grn/{bom_po_id}','TenderGeneralController@add_grn_bom')->name('add_grn');
	Route::post('store_grn','TenderGeneralController@store_grn_bom')->name('store_grn');
	//Material Request List
	Route::get('show_material_request_list','TenderGeneralController@show_material_request_list_page')->name('show_material_request_list');

	//Sale Order from pj manager
	Route::get('show_sale_order_list','TenderGeneralController@show_sale_order_list_page')->name('show_sale_order_list');



	//Customer
	//Mail
	Route::post('bom_supplier_product_mail','TenderGeneralController@send_bomsup_pro')->name('bom_supplier_product_mail');
	//continue route
	Route::post('upload_quotation','TenderGeneralController@upload_quotation_info')->name('upload_quotation');
    Route::post('upload_invoice','TenderGeneralController@upload_invoice_info')->name('upload_invoice');
	Route::get('bom_supplier_product/{bom_id}','TenderGeneralController@bom_supplier_product')->name('bom_supplier_product');

	Route::get('show_supplier_import_process','TenderGeneralController@show_import_process_form')->name('show_supplier_import_process');
	Route::post('update_bom_supplier_list','TenderGeneralController@update_bom_supplier')->name('update_bom_supplier_list');

	Route::get('customer_receive_list/{id}','TenderGeneralController@show_customer_receive_list')->name('customer_receive_list');

	// Route::get('change_pj_status/{id}','TenderGeneralController@change_project_status')->name('change_pj_status');
    Route::post('ajax_get_cust','TenderGeneralController@now_ajax_get_cust')->name('ajax_get_cust');



	Route::post('ajax_invoice_product','TenderGeneralController@invoice_product_list')->name('ajax_invoice_product');
	// Route::get('show_pay_invoice/{id}','TenderGeneralController@pay_invoice')->name('show_pay_invoice');
	Route::post('store_pay_transaction','TenderGeneralController@store_transaction')->name('store_pay_transaction');

	// Route::get('show_pay_po/{id}','TenderGeneralController@pay_po')->name('show_pay_po');
	//Products

	// Route::get('product_detail/{id}','TenderGeneralController@show_product_detail')->name('product_detail');
	Route::post('getCompare','TenderGeneralController@getCompare_product')->name('getCompare');
	//Common Ajax Function

	Route::post('AjaxDepartment', 'Web\ScheduleController@AjaxDepartment')->name('AjaxDepartment');

	Route::post('AjaxScheduleDate', 'Web\ScheduleController@AjaxScheduleDate')->name('AjaxScheduleDate');

	Route::post('AjaxScheduleTime', 'Web\ScheduleController@AjaxScheduleTime')->name('AjaxScheduleTime');

	//Announcement & Advertisement

	Route::post('Announcement_Store', 'Web\OperatorController@announcementStore')->name('announcement_store');

	Route::get('Announcement', 'Web\OperatorController@announcementIndex')->name('announcement.index');

	Route::post('Advertisement_Store', 'Web\OperatorController@advertiesmentStore')->name('advertisement_store');

	Route::get('Advertisement', 'Web\OperatorController@advertiesmentIndex')->name('advertisement.index');


	//Building Controller

	Route::get('BuildingInfo', 'Web\BuildingController@BuidlingList')->name('buidling_info');

	Route::post('StoreBuidling', 'Web\BuildingController@StoreBuidling')->name('buidling_store');

	Route::post('StoreFloor', 'Web\BuildingController@StoreFloor')->name('floor_store');

	Route::post('StoreRoom', 'Web\BuildingController@StoreRoom')->name('room_store');

	Route::post('AjaxCheckRoomTime', 'Web\BuildingController@AjaxCheckRoomTime');

	Route::post('AjaxRoomCheck', 'Web\BuildingController@AjaxRoomCheck');

	Route::post('AjaxBuildingCheck', 'Web\BuildingController@AjaxBuildingCheck');



	Route::post('AjaxRoomList', 'Web\BuildingController@AjaxRoomList');

	//Schedule Controller


	Route::post('StoreChangeDoctorList', 'Web\ScheduleController@storeChangeDoctorList')->name('store_change_doctor');

	Route::post('revisedLists', 'Web\ScheduleController@revisedLists')->name('revisedLists');




	Route::get('ScheduleList', 'Web\ScheduleController@ScheduleList')->name('schedule_list');


	Route::get('CreateScheduleDay', 'Web\ScheduleController@CreateScheduleDay')->name('create_schedule_day');



	Route::post('StoreScheduleDay', 'Web\ScheduleController@StoreScheduleDay')->name('store_schedule_day');


	Route::post('StoreDoctorTime', 'Web\ScheduleController@StoreDoctorTime')->name('store_doctor_time');

	//Operator Controller




	Route::get('AdminBookingList', 'Web\OperatorController@getBookingListUi')->name('admin_booking_list');

	Route::post('DoctorBookingList', 'Web\OperatorController@ajaxDoctorBookingList')->name('ajax_doc_booking_list');

	Route::get('TokenCheckInUI', 'Web\OperatorController@getTokencheckinUI')->name('token_checkin');



	Route::post('AjaxTokenCheckIn', 'Web\OperatorController@ajaxTokenCheckIn');



	Route::get('AdminProfile', 'Web\OperatorController@AdminProfile')->name('admin_profile');

	Route::get('CounterProfile/{admin_id}', 'Web\OperatorController@counterProfile')->name('counter_profile');

	Route::get('CounterProfileEdit/{admin_id}', 'Web\OperatorController@counterProfileEdit')->name('counter_profile_edit');

	Route::post('CounterProfileEdit', 'Web\OperatorController@counterProfileEditSave')->name('counter_profile_edit_save');

	Route::get('CreateCounter', 'Web\OperatorController@createCounter')->name('create_counter');

	Route::post('CreateCounter/save', 'Web\OperatorController@createCounterSave')->name('create_counter_save');



	Route::get('ChangeAdminPasswordUI', 'Web\OperatorController@AdminChangePassUI')->name('change_admin_pw_ui');

	Route::put('ChangeAdminPassword', 'Web\OperatorController@AdminChangePass')->name('change_admin_pw');

	Route::get('DepartmentList', 'Web\OperatorController@DepartmentList')->name('department_list');

	Route::get('CreateDepartment', 'Web\OperatorController@CreateDepartment')->name('create_department');

	Route::post('StoreDepartment', 'Web\OperatorController@StoreDepartment')->name('store_department');

	Route::get('EditDepartment/{department}', 'Web\OperatorController@EditDepartment')->name('edit_department');

	Route::put('UpdateDepartment/{department}', 'Web\OperatorController@UpdateDepartment')->name('update_department');

	Route::get('GetToken', 'Web\OperatorController@GetToken')->name('get_token');

	Route::post('SearchDoctors', 'Web\OperatorController@SearchDoctors');

	Route::post('StoreBookingToken', 'Web\OperatorController@StoreBookingToken')->name('store_booking_token');

	// Route::post('EditBookingRecord', 'Web\OperatorController@editBookingRecord')->name('edit_booking_record');

	Route::post('AdminConfirmBooking', 'Web\OperatorController@adminconfirmbooking')->name('admin_confirm_booking');

	Route::post('AdminCheckInBooking', 'Web\OperatorController@admincheckinbooking')->name('admin_checkin_booking');


	Route::post('checkedAllConfirm', 'Web\OperatorController@checkedallconfirm')->name('checkedAllConfirm');

	Route::post('AdminCancleBooking', 'Web\OperatorController@admincanclebooking')->name('admin_cancle_booking');

	Route::post('AdminDoneBooking', 'Web\OperatorController@admindonebooking')->name('admin_done_booking');

	Route::get('StateList', 'Web\OperatorController@getStateList')->name('state_list');

	Route::post('StoreTown', 'Web\OperatorController@storeTown')->name('store_town');

	Route::post('AjaxSearchTown', 'Web\OperatorController@ajaxSearchTown');

	Route::post('EditTown', 'Web\OperatorController@editTown')->name('edit_town');

	//DoctorController

	Route::get('DoctorList', 'Web\DoctorController@DoctorList')->name('doctor_list');

	Route::get('CreateDoctor', 'Web\DoctorController@CreateDoctor')->name('create_doctor');

	Route::post('StoreDoctor', 'Web\DoctorController@StoreDoctor')->name('store_doctor');

    Route::get('company_information', 'Web\InventoryController@company_information')->name('company_information');
	Route::post('ajaxProduct_Comparison', 'Web\InventoryController@get_product_supplier_comparison');
	Route::post('ajaxComparison_detail', 'TenderGeneralController@show_comparison_detail');
	Route::get('type_list','Web\InventoryController@type_list')->name('show_type_lists');
	Route::post('type/store', 'Web\InventoryController@storeType')->name('type_store');
    Route::post('type/delete', 'Web\InventoryController@deletetype');
	Route::post('type/update/{id}', 'Web\InventoryController@updateType')->name('type_update');
	Route::post('showBrand', 'Web\InventoryController@showBrand');


	Route::get('item_list','Web\InventoryController@item_list')->name('show_item_lists');
	Route::post('item/store', 'Web\InventoryController@storeItem')->name('item_store');
	Route::post('item/update', 'Web\InventoryController@updateItem')->name('item_update');
	Route::post('item_delete', 'Web\InventoryController@deleteItem')->name('item_delete');
	Route::post('showType', 'Web\InventoryController@showType');
	Route::post('showSubCategoryFrom', 'Web\InventoryController@showSubCategoryFrom');

	Route::post('ajaxitemdetail', 'Web\InventoryController@ajaxitemdetail');


//Service

Route::get('services','Web\ServiceController@serviceList')->name('services.lists');
Route::post('services/update/{id}','Web\ServiceController@serviceUpdate')->name('services.update');
Route::post('services/store','Web\ServiceController@serviceStore')->name('services.store');
Route::post('services/delete','Web\ServiceController@serviceDelete')->name('services.delete');

// DoctorServices ajax
Route::post('/doctor/services','Web\ServiceController@doctorServices')->name('doctor.services');
Route::post('/ajaxservices/other-services','Web\ServiceController@ajaxOtherServices');
Route::post('/ajaxpackages','Web\PackageController@ajaxpackageList');

//Package
Route::get('packages','Web\PackageController@packageList')->name('packages.lists');
Route::post('packages/update/{id}','Web\PackageController@packageUpdate')->name('packages.update');
Route::post('packages/store','Web\PackageController@packageStore')->name('packages.store');
Route::post('packages/delete','Web\PackageController@packageDelete')->name('packages.delete');


    //Counting Unit

	Route::get('Count-Unit/{item_id}', 'Web\InventoryController@getUnitList')->name('count_unit_list');
    Route::post('Count-Unit/store', 'Web\InventoryController@storeUnit')->name('count_unit_store');

    Route::post('Count-Unit/update/{id}', 'Web\InventoryController@updateUnit')->name('count_unit_update');
    Route::post('Count-Unit/code_update/{id}', 'Web\InventoryController@updateUnitCode')->name('count_unit_code_update');
    Route::post('Count-Unit/original_code_update/{id}', 'Web\InventoryController@updateOriginalCode')->name('original_code_update');
    Route::post('Count-Unit/delete', 'Web\InventoryController@deleteUnit');
    Route::post('AjaxGetItem', 'Web\InventoryController@AjaxGetItem');
    Route::post('searchItem', 'Web\InventoryController@searchItem');

    //Counting Unit Relation
    Route::get('Unit-Relation/{item_id}', 'Web\InventoryController@unitRelationList')->name('unit_relation_list');
    Route::post('Unit-Relation/store', 'Web\InventoryController@storeUnitRelation')->name('unit_relation_store');
    Route::post('Unit-Relation/update/{id}', 'Web\InventoryController@updateUnitRelation')->name('unit_relation_update');

    //Counting Unit Conversion
    Route::get('Unit-Convert/{unit_id}', 'Web\InventoryController@convertUnit')->name('convert_unit');
    Route::post('ajaxCountUnit', 'Web\AdminController@ajaxCountUnit')->name('ajaxCountUnit');
    //Route::post('Unit-Convert/store', 'Web\InventoryController@convertCountUnit')->name('convert_count_unit');

    //StockCount
    Route::get('Stock-Count/Count', 'Web\StockController@getStockCountPage')->name('stock_count');
    Route::get('Stock-Count/Reorder', 'Web\StockController@getStockReorderPage')->name('stock_reorder_page');


	//AJAX INVENTORY


    Route::post('ajaxConvertResult', 'Web\InventoryController@ajaxConvertResult');

	//End inventory

	//start Sale
	  Route::get('Sale', 'Web\SaleController@getSalePage')->name('sale_page');
	  Route::post('Sale/Voucher', 'Web\SaleController@storeVoucher');
	  Route::post('Sale/Get-Voucher', 'Web\SaleController@getVucherPage')->name('get_voucher');
	  Route::get('Sale/History', 'Web\SaleController@getSaleHistoryPage')->name('sale_history');
	  Route::get('Sale/SummaryMain','Web\SaleController@getVoucherSummaryMain')->name('voucher_summary_main');
	  Route::post('Sale/SummaryDetail','Web\SaleController@searchItemSalesByDate')->name('search_item_sales_by_date');
	  Route::post('Sale/Search-History', 'Web\SaleController@searchSaleHistory')->name('search_sale_history');
	  Route::get('Sale/Search-History', 'Web\SaleController@searchSaleHistoryget');
	  Route::get('Sale/Voucher-Details/{id}', 'Web\SaleController@getVoucherDetails')->name('getVoucherDetails');

	  Route::post('calculate_current','Web\SaleController@calculateCurrent');

	  Route::post('getCountingUnitsByItemId', 'Web\SaleController@getCountingUnitsByItemId');
	  Route::post('delivery/states', 'Web\SaleController@deliveryState');



//End Sale
//ORDER

		Route::get('Order/Voucher-Details/{id}', 'Web\OrderController@getVoucherDetails')->name('voucher_order_details');


	//DOCTOR DASHBORAD


//Clinic
	Route::get('patient/register', 'Web\ClinicController@patientregister')->name('patientregister');
	Route::post('appointment/store', 'Web\ClinicController@appointmentStore')->name('appointmentstore');
	Route::post('searchpatient', 'Web\ClinicController@searchpatient');
	Route::post('oldpatient/appointment', 'Web\ClinicController@oldpatientAppointment')->name('appointment.oldpatient');
	Route::get('appointments/{patient_id}', 'Web\ClinicController@appointments')->name('appointments');

	//today appointments
	Route::get('appointments', 'Web\ClinicController@todayAppointments')->name('today.appointments');
	Route::post('searchpatient/todayappointments', 'Web\ClinicController@searchpatientToday');
	Route::post('appointments/delete', 'Web\ClinicController@todayaptdelete')->name('todayaptdelete');

	Route::post('searchAppointments/filter', 'Web\ClinicController@searchAppointments');


	Route::get('records/{appointment_id}', 'Web\ClinicController@appointmentRecord')->name('appointmentRecord');
	Route::get('patient/history/{appointment_id}', 'Web\ClinicController@patientHistory')->name('patienthist');
	Route::post('store/record', 'Web\ClinicController@storeRecord')->name('storeRecord');
	Route::post('store/recordinfo', 'Web\ClinicController@storeRecordInfo')->name('storeRecordInfo');
	Route::post('attachments/store', 'Web\ClinicController@attachmentsStore')->name('attachments.store');

	Route::post('attachments/delete', 'Web\ClinicController@attachmentsDelete')->name('attachments.delete');
	Route::post('addservices', 'Web\ClinicController@addserviceCounter')->name('addserviceCounter');

	//clinic history
	Route::get('clinichistory', 'Web\ClinicController@history')->name('history');

	Route::post('clinic/storevoucher', 'Web\ClinicController@storeVoucher')->name('clinic.storevoucher');

	Route::get('Diagnosis', 'Web\ClinicController@getDiagnosis')->name('getDiagnosis');

	Route::post('Diagnosis/store', 'Web\ClinicController@diagnosisStore')->name('diagnosis_store');

	Route::post('Diagnosis/storeOntime', 'Web\ClinicController@diagnosisStoreOntime')->name('diagnosis_store_ontime');

	Route::post('attachmentimage', 'Web\ClinicController@attachimg')->name('attachimg');

});

Route::group(['middleware' => ['UserAuth']], function () {


	Route::get('editDoctor/{id}', 'Web\DoctorController@editDoctor')->name('edit_doctor');

	Route::post('edit/StoreDoctor', 'Web\DoctorController@editStoreDoctor')->name('edit_store_doctor');

	//doctor admin
	Route::post('EditBookingRecord', 'Web\OperatorController@editBookingRecord')->name('edit_booking_record');
	Route::get('CheckDoctorProfile/{doctor}', 'Web\DoctorController@CheckDoctorProfile')->name('check_doctor_profile');
	Route::get('CheckScheduleTime/{day}/{doctor}', 'Web\ScheduleController@CheckScheduleTime')->name('check_schedule_time');

	Route::get('ChangeScheduleList', 'Web\ScheduleController@ChangeScheduleList')->name('change_sch_list');


	Route::post('StoreChangeScheduleList', 'Web\ScheduleController@storeChangeScheduleList')->name('store_change_schedule');

	//

	Route::post('DoctorDoneBooking', 'Web\DoctorDashboardController@doctordonebooking')->name('doctor_done_booking');

	Route::get('DoctorScheduleList', 'Web\DoctorDashboardController@DoctorScheduleList')->name('doctor.schedulelist');

	Route::get('doctor/dashboard', 'Web\DoctorDashboardController@doctorDashboard')->name('doctor.dashboard');

	Route::get('doctor/profile', 'Web\DoctorDashboardController@doctorProfile')->name('doc.profile');

	Route::get('doctor/manualbookinglists', 'Web\DoctorDashboardController@manualbookingLists')->name('doctor.manualbookings');

	Route::get('doctor/onlinebookinglists', 'Web\DoctorDashboardController@onlinebookingLists')->name('doctor.onlinebookings');

	Route::get('doctor/patientHistory', 'Web\DoctorDashboardController@patientHistory')->name('doctor.patientHistory');
	Route::post('ajax/patientHistory', 'Web\DoctorDashboardController@ajaxPatientHistory')->name('ajaxPatientHistory');


	Route::post('doctor/ajax/manual/bookinglists', 'Web\DoctorDashboardController@ajaxDoctorManualBookingList')->name('ajax_doc_manual_bookings');

	Route::post('doctor/ajax/online/bookinglists', 'Web\DoctorDashboardController@ajaxDoctorOnlineBookingList')->name('ajax_doc_online_bookings');

	Route::post('doctor/startzoom', 'Web\DoctorDashboardController@startzoom')->name('startzoom');

	Route::get('payment/payment4', 'Web\PaymentTestController@payment4')->name('payment4');

	Route::get('storepayment/web/{booking_id}/{invoice_no}', 'Web\DoctorDashboardController@storepaymentweb')->name('storepayment.web');


});


Route::get('payment/test', 'Web\PaymentTestController@payment1')->name('pay');
Route::get('payment/payment2', 'Web\PaymentTestController@payment2')->name('pay');
Route::get('payment/payment3', 'Web\PaymentTestController@payment3');
Route::get('success', function(){
	dd("success");
});
Route::post('payment/payment3/data', 'Web\PaymentTestController@payment3data')->name('payment3');

Route::post('res1', 'Web\PaymentTestController@getres1');

Route::post('payment/payment4/data', 'Web\PaymentTestController@payment4data')->name('payment4data');

Route::get('profile',function(){
return view('example_profile');
});



    //Inventory

    //Category
    Route::get('category_list', 'Web\InventoryController@category_list')->name('category_list');
    Route::post('store_category', 'Web\InventoryController@store_category')->name('store_category');
	Route::post('update_cate','Web\InventoryController@update_category')->name('update_cate');
    Route::post('category/delete', 'Web\InventoryController@deleteCategory');

    //Sub_Category
    // Route::get('sub_category_list', 'Web\InventoryController@sub_category_list')->name('sub_category_list');
    // Route::post('store_subcategory', 'Web\InventoryController@store_subcategory')->name('store_subcategory');
	Route::post('showSubCategory', 'Web\InventoryController@showSubCategory');

    //Brand
    Route::get('bank_list', 'TenderGeneralController@bank_list')->name('bank_list');
    Route::get('brand_list','Web\InventoryController@brand_list')->name('show_brand_lists');
	Route::post('brand/update/{id}', 'Web\InventoryController@updateBrand')->name('brand_update');
	Route::post('brand/store', 'Web\InventoryController@storeBrand')->name('brand_store');
    Route::post('brand/delete', 'Web\InventoryController@deletebrand');

    //Main WareHouse Product
    Route::get('product_list', 'Web\InventoryController@product_list')->name('product_list');
    Route::get('create-product', 'Web\InventoryController@createProduct')->name('create-product');
    Route::post('store_product', 'Web\InventoryController@store_product')->name('store_product');
    Route::get('product_detail/{id}','Web\InventoryController@show_product_detail')->name('product_detail');
    Route::post('add_item','Web\InventoryController@add_item_product')->name('add_item');

    //Regional Warehouse CRUD Start
    Route::get('RegionalWarehouse','Web\WarehouseStockController@RegionalWarehouse')->name('RegionalWarehouse');
	Route::get('add_regional_ware','Web\WarehouseStockController@create_regional_ware')->name('add_regional');
    Route::post('store_regional_ware','Web\WarehouseStockController@store_regional_ware')->name('store_regional');
	Route::get('check_inventory_list/{regional_id}','Web\WarehouseStockController@checkInventory')->name('check_inventory_list');
    //Regional Warehouse CRUD End

    //Product Start
    Route::get('show_project','Web\ProjectController@show_projectsale')->name('show_project');
    Route::get('create-project', 'Web\ProjectController@create_project')->name('create_project');
	Route::post('store_sale_project','Web\ProjectController@store_sale_project')->name('store_sale_project');
	Route::get('change_pj_status/{id}','Web\ProjectController@change_project_status')->name('change_pj_status');
	Route::get('show_pay_invoice/{id}','Web\ProjectController@pay_invoice')->name('show_pay_invoice');
	Route::get('show_pay_po/{id}','Web\ProjectController@pay_po')->name('show_pay_po');
    //Product End

    //Financial Report Start

    Route::get('profit_loss_acc_list', 'Web\FinancialReportController@profit_loss_acc_list')->name('profit_loss_acc_list');
    Route::get('balancesheet_acc_list', 'Web\FinancialReportController@balancesheet_acc_list')->name('balancesheet_acc_list');
    Route::get('trial_balance', 'Web\FinancialReportController@trial_balance')->name('trial_balance');
    //Financial Report End







