<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
   {     

     Route::prefix('admin')->group(function () {

    Route::get('/dashbord','Admin\AdminController@dashbord');
    
    Route::any('/categorie', 'Admin\CategoryController@index');
    Route::post('/addcategorie',"Admin\CategoryController@AddCategorie" );
    Route::get('/categorie/{id}/deletecategorie',"Admin\CategoryController@DeleteCategorie" );
    Route::post('/categorie/editcategorie',"Admin\CategoryController@EditCategorie" );
    
    
    Route::any('/produit','Admin\ProduitController@index');
    Route::post('/addproduit',"Admin\ProduitController@AddProduit" );
    Route::get('/produit/{id}/deleteproduit',"Admin\ProduitController@DeleteProduit" );
    Route::post('/produit/editproduit',"Admin\ProduitController@EditProduit" );
    
    });



    });







