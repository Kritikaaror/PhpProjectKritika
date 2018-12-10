<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Product;
use Illuminate\Support\Facades\Input;

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/product/{id}', [
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

Route::post ( '/search', function () {
	$q = Input::get ( 'q' );
	if($q != ""){
		$product = Product::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'description', 'LIKE', '%' . $q . '%' )->get ();
		if (count ( $product ) > 0)
			return view ( 'searchpage' )->withDetails ( $product )->withQuery ( $q );
		else
			return view ( 'searchpage' )->withMessage ( 'No Details found. Try to search again !' );
	}
	return view ( 'alpha_store_Final/searchpage' )->withMessage ( 'No Details found. Try to search again !' );
} );


Route::get('/searchpage' , [
   
    'uses' => 'FrontEndController@searchFunction',
    'as' => 'searchpage'
    
]);

Route::post('/wishlist/add', [
    'uses' => 'FrontEndController@add_to_wishlist',
    'as' => 'wishlist.add'
]);


Route::get('/wishlist', [
    'uses' => 'FrontEndController@wishlist',
    'as' => 'wishlist'
]);

Route::get('/wishlist/delete/{id}', [
    'uses' => 'FrontEndController@wishlist_delete',
    'as' => 'wishlist.delete'
]);


