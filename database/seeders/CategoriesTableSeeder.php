<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    //seeder -> لتعبئة الجدول 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB is Facade بعمل اوبجكت من الداتا بيس جاهز بالكونكشن وكل اشي 


        //طرق تعبئة الجدول
        //طريقة 1 
        DB::table('categories')->insert([
            'name' => 'cat 1',
            'slug' =>'cat 2',
            'parent_id' =>null,
        ]);

        //طريقة 2 بستخدام المودل
        //هنا مش محتاج احدداسم التابل
        Category::create([
            'name' => 'cat 5',
            'slug' =>'cat 6',
            'parent_id' =>1,
        ]);
    }

//
}
