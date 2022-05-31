<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('categories')->insert(
            [
                '1'=>[ 'name'=>'Category 1',
                'description'=>'Category 1 Description',
                'slug'=>Str::slug('Category 1'),
                'parent_id'=>null
            ],
                '2'=>[ 'name'=>'Category 2',
                'description'=>'Category 2 Description',
                'slug'=>Str::slug('Category 2'),
                'parent_id'=>null
            ],
                '3'=>[ 'name'=>'Category 3',
                'description'=>'Category 3 Description',
                'slug'=>Str::slug('Category 3'),
                'parent_id'=>1
            ],
                '4'=>[ 'name'=>'Category 4',
                'description'=>'Category 4 Description',
                'slug'=>Str::slug('Category 4'),
                'parent_id'=>2
            ],
                '5'=>[ 'name'=>'Category 5',
                'description'=>'Category 5 Description',
                'slug'=>Str::slug('Category 5'),
                'parent_id'=>4
            ],
            ]);

                // for ($i=1; $i <=10 ; $i++) {
                // DB::table('categories')->insert([
                //  'name'=>'Category'. $i,
                //  'description'=>'Category '. $i.' Description',
                //  'slug'=>Str::slug('Category '. $i),
                //  'parent_id'=>$i
                // ]);
                // }


}
}
