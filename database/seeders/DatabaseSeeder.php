<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//لازم المودل يكون عامل 
//has Facroty عشان اقدر استعملو 
        //لتنفيذ الفاكتوري
     // Category::factory(18)->create();


        //هنا بستدعي السيدر عشان انفذو
        // \App\Models\User::factory(10)->create();
       $this->call(CategoriesTableSeeder::class);
    }
}
