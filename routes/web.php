<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')
    ->group(function() {

        Route::get(
            '/home', 
            [HomeController::class, 'index']
        )
        ->name('home');
    }
);

Auth::routes();


include_once 'controlFinance/home.php';
include_once 'controlFinance/category.php';
include_once 'controlFinance/debt.php';
include_once 'controlFinance/installment.php';
include_once 'controlFinance/paymenttype.php';
include_once 'controlFinance/settings.php';
include_once 'controlFinance/shopper.php';
include_once 'controlFinance/charts.php';
include_once 'controlFinance/payment.php';








/* 
Route::middleware('auth')
    ->group(function() {

        Route::get('/home', [HomeController::class, 'index'])->name('home'); */
        
        /* ###########   Rotas de comras ############*/ 
            
       /*  Route::get('/divida', [DebtController::class, 'newDebt'])->name('debt_get');

        Route::post('/divida', [DebtController::class, 'postDebt'])->name('debt_post');
        
        Route::get('/dividas', [DebtController::class, 'getAllDebts'])->name('debtAll_get');
        
        Route::post('/dividas/mes', [DebtController::class, 'getAllDebts'])->name('debtAllMonth_post');
                
        Route::post('/divida/parcelada', [DebtController::class, 'postInstallmentDebt'])->name('installmentAllMonth_post');

        Route::get('/divida/{id}/detalhes', [DebtController::class, 'getDetailDebt'])->name('detailDebt_get');
        
        Route::post('divida/editar', [DebtController::class, 'postUpdateDebt'])->name('updateDebt_post'); 
        
        Route::post('divida/delete', [DebtController::class, 'postDeleteDebt'])->name('deleteDebt_post'); 
     */
        
        /* ###########   Rotas de parcelas ############*/

       /*  Route::get('/parcelas', [InstallmentController::class, 'getAllInstallments'])->name('installmentAll_get');
        
        Route::get('/parcelas/filtros', [InstallmentController::class, 'getAllInstallments'])->name('installmentAllFilters_post');
        
        Route::get('/parcela/{id}/detalhes', [InstallmentController::class, 'getDetailInstallment'])->name('detailInstallment_get');
        
        Route::post('parcela/editar', [InstallmentController::class, 'postUpdateInstallment'])->name('updateInstallment_post'); 
        
        Route::post('parcela/delete', [InstallmentController::class, 'postDeleteInstallment'])->name('deleteInstallment_post'); 
     */
        /* ###########   Rotas de configurações ############*/

       // Route::get('/config', [SettingsController::class, 'getAllSettings'])->name('settingAll_get');
    
        /* ###########   Rotas de categorias ############*/

       /*  Route::get('/categoria', [CategoryController::class, 'newCategory'])->name('category_get');

        Route::post('/categoria', [CategoryController::class, 'postCategory'])->name('category_post');

        Route::get('/categoria/{id}/detalhes', [CategoryController::class, 'getDetailCategory'])->name('detailCategory_get');

        Route::post('categoria/editar', [CategoryController::class, 'postUpdateCategory'])->name('updateCategory_post');  */

        /* ###########   Rotas de formas pagamentos ############*/

       /*  Route::get('/pagamento', [PaymentTypeController::class, 'newPaymentType'])->name('paymentType_get');

        Route::post('/pagamento', [PaymentTypeController::class, 'postPaymentType'])->name('paymentType_post');

        Route::get('/pagamento/{id}/detalhes', [PaymentTypeController::class, 'getDetailPaymentType'])->name('detailPaymentType_get');

        Route::post('pagamento/editar', [PaymentTypeController::class, 'postUpdatePaymentType'])->name('updatePaymentType_post'); 
  */
/*     }
); */

    


    

