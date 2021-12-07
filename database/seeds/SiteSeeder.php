<?php

use App\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::create([
            'title1' => 'Amira Elsayed Innovation',
            'sub1' => 'choose how can be your future home',
            'about_us' => 'about me',
            'sub2' => "Amira Elsayed, Egyptian Interior and Furniture Designer, I gained Bachelor's Degree in Interior Design In 2020  ",
            'image' => '1638797870_264165542_277440861014397_1882457108722520349_n.jpg',
        ]);
    }
}
