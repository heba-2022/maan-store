<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products = [
        1 => 'product 1',
        2 => 'product 1',
        3 => 'product 3'
    ];

    //تمرير قيم من كونترولير لملف فيو
    public function index()
    {
        //نبعت للفيو تو باراميتر
        return  view('products', [
            'title' => 'list of products',
            'products' => $this->products,
        ]);
        //انتبه عند التعريف فيه  دولار ساين لكن عند الذس مافيه
        // return ('List of Products');
        //لقراءة قيمة من ملفات الconfig
        //بدل من env
        //اذا بدي اقرأ قيمة من ملفات الconfigration بستعمل  ميثود كونفج
        //app اسم الملف
        //name المتغير اللي بدي اقرأه
        //config('app.name');
    }



    //مهم الترتيب نفس الراوت
    public function show($category, $name = 0)
    {
        //return ('product name'. $category .'/' . $name);
        //($this->products[$name])?? '');
        //معناها لو كان القيمة غير موجودة رح يطبع النص الفاضي
        return ('product name' . $category . '/' . ($this->products[$name]?? '' ) );
    }

}
