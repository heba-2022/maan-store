<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use  App\Http\Controllers\Admin\CategoriesController;
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

//محاضرة 1 تعريفي

//*************************************************** */
//محاضرة 2
//-------------------------------------------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/wlcome',[HomeController::class, 'index'])->name('wel');

//ألطريقة ماقبل لارفل 8 في كتابة اسم الكنترولر
//Route::get('/wlcome','HomeController@index'); //مابشتغل لانو النيم سبيس مش موجودة
// حل1
//Route::get('/wlcome','App\Http\Controllers\HomeController@index');
// حل2
//نخلي الارفل لحالو يعرف النيم سبيس بروح على ملف اسمو app-providers-
//افعل     // protected $namespace = 'App\\Http\\Controllers'; في ملف RouteServiceProvider
//providers -> لتجهيز الابلكيشن تبعنا في بداية كل ريكويست
//RouteServiceProvider ->يستخدم في عملية تسجيل الراوت مهم جدااااا بدونو مارح يشتغل الراوت 
//هو المسؤول عن تحميل ملفات الراوت تبعنا
//-------------------------------------------------------------



//-------------------------------------------------------------
//ترتيب الراوت ممكن يفرق معنا

//index and show  is function in product controller
Route::get('/prodects',[ProductController::class, 'index']);
//{name}' {category}/قيمة متغيرة
//? معناها انو اختياري ممكن يكون موجود في ال url  وممكن لا
//
Route::get('/prodects/{category}/{name?}',[ProductController::class, 'show'])->name('products.show');

//Route::get('/prodects/{category?}/{name}',[ProductController::class, 'show']);
//ألحالة اللي فوق غلط منطقيا لانو الباراميتر الاختياري لازم يكون في الاخر


//-------------------------------------------------------------

Route::post('/prodects-create',function(){
    return 'create prodect';
});

//any انو اي ميثود مقبولة بوست او جيت او غيرها
Route::any('/prodects-create2',function(){
    return 'create prodect';
});

//احدد بالزبط ايش انواع الريكويست المسموحmatch
Route::match(['post','put'],'/prodects-create3',function(){
    return 'create prodect';
});

// hello اسم الراوت 
//اذا تم طلبه رح يرجع ملف فيو ويلكم 
Route::view('/hello','welcome');

//ممكن ابعت قيم للفيو بهذه الطريقة 
//وبنستخدمها ك php في الفيو
// Route::view('/hello','welcome',['title'=> 'Welcome']);

//redirect ممكن ابعتو باي طريقة من طريقة الريكوست جيت بوست اي شي / اي راوت بطريقة 
//تحويل المستخدم من راوت اللى راوت اخر 
//overrite
//Route::redirect('/prodects','/wlcome');
//مش شرط يكون الراوت موجود  
//مثلا اي حدا بطلب /home يروح للراوت الريسي
Route::redirect('/home','/');


//-------------------------------------------------------------
//*************************************************** */
//محاضرة 3
Route::get('/admin/categories',[CategoriesController::class, 'index']);
Route::get('/admin/categories/create',[CategoriesController::class, 'create']);
Route::get('/admin/categories/{id}',[CategoriesController::class, 'show']);
Route::post('/admin/categories/store',[CategoriesController::class, 'store']);
Route::delete('/admin/categories/{id}',[CategoriesController::class, 'destroy']);


//-------------------------------------------------------------
//*************************************************** */
//محاضرة 4
Route::get('/admin/categories/{id}/edit',[CategoriesController::class, 'edit']);
//حسب الستاند اي عملية بتعمل ابدات فبنستخدم ميثود put
Route::put('/admin/categories/{id}',[CategoriesController::class, 'update']);
