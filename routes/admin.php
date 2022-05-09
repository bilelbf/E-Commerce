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

    Route::get('/dashbord','Admin\AdminController@dashbord')->middleware('auth', 'admin');
    
    Route::any('/categorie', 'Admin\CategoryController@index')->middleware('auth', 'admin');
    Route::post('/addcategorie',"Admin\CategoryController@AddCategorie" )->middleware('auth', 'admin');
    Route::get('/categorie/{id}/deletecategorie',"Admin\CategoryController@DeleteCategorie" )->middleware('auth', 'admin');
    Route::post('/categorie/editcategorie',"Admin\CategoryController@EditCategorie" )->middleware('auth', 'admin');
    
    
    Route::any('/produit','Admin\ProduitController@index')->middleware('auth', 'admin');
    Route::post('/addproduit',"Admin\ProduitController@AddProduit" )->middleware('auth', 'admin');
    Route::get('/produit/{id}/deleteproduit',"Admin\ProduitController@DeleteProduit" )->middleware('auth', 'admin');
    Route::post('/produit/editproduit',"Admin\ProduitController@EditProduit" )->middleware('auth', 'admin');
    
    });



    });







