<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //عرض جميع الكاتجرو
    public function index()
    {
        // بقرأ القيمة اللي خزنتها في السيشن 
        //بعطيها اسم key - success وبترجعلي قيمتها
        //الفلاش مسج بتظهر مرة وحدة وبتنحذف الارفل هيك بعمل 
        //ممكن اخزن قيمة دائمة في السيشن 
        //زي هيك
       // session()->put('success', 'category created'); //هيك المسج مش رح تختفي ورح تضل ظاهرة طول السشن
        $flash_message = session('success');

        //return collection(array of object) of category of modle
        //$categories = Category::all();
        //يرجعلي فقط 5 كاتجرو
        //بعرض اللنت ارقام
        $categories = Category::paginate(10);
        //بختلف في شكل اللنك next -previse
        //$categories = Category::simplePaginate(5);
        return view('admin.categories.index', [
            'entries' => $categories,
            'flash_message' => $flash_message,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //
    //1-عرض الفورم لادخال البياناتcreate
    //2-لمى يعمل سبمت يحفظ البيانات store

    public function create()
    //اسم الحقل في الفورم اسميه نفس اسم الحقل في الفورم
    {
        $parents = Category::all();
        return view(
            'admin.categories.create',
            [
                'category' => new Category(),
                'parents' =>$parents,
            ]);
        //
        //عرض الفورم لادخال البيانات
        //لمى يعمل سبمت يحفظ البيانات
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // |exists:categories,id| => categories = table ,id| att in table
        $this->validate($request, [
            'name'=>'required|STRING|min:3|max:255',
            'parent_id'=>'nullable|int|exists:categories,id|',
            'description' => 'nullable|string',
            'status' =>'in:active,inactive',
        ]);
        //
        $category = Category::create([
            //طرق اخرى
            //1-$request->status;
            //2-$request->post('status')
            //3-$request->get('status')
            //4-$request->input('status')
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'parent_id' => $request->input('parent_id'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            //slg
        ]);
        //نوع من انواع الresponce 
        //
        return redirect('/admin/categories')->with('success', 'category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //عرض كاتجرو واحد فقط عشان هيك بتستقبل الاي دي للكاتجرو اللي بدي اعرضو
    public function show($id)
    {
        //$category = Category::where('id','=',$id)->first();
        //$category = Category::find($id);
        //ائا استخدمت اول سطر 
        // if (!$category) {
        //     abort(404);
        // }
        //اذا استخدمت الfind
        $category = Category::findOrfail($id);


        return view(
            'admin.categories.show',
            [
                'category' => $category,
            ]
        );
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrfail($id);
        $parents = Category::where('id','<>',$id)->get();
        return view(
            'admin.categories.edit',
            [
                'category' => $category,
                'parents' =>$parents,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   // |exists:categories,id| => categories = table ,id| att in table
   $request->validate([
    'name'=>'required|STRING|min:3|max:255',
    'parent_id'=>'nullable|int|exists:categories,id|',
    'description' => 'nullable|string',
    'status' =>'in:active,inactive',
]);
        $category = Category::findOrfail($id);
        $category->update([
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name')),
            'parent_id' => $request->input('parent_id'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
        return redirect('/admin/categories')->with('success', 'category updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::destroy($id);
        //With -> تخزين قيمة في السشن للفلاش مسج 
        //key -> 'success'   , valu ->category deleted
        //
        return redirect('/admin/categories')->with('success','category deleted');;

    }
}
