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
            'sub2' => "Amira Elsayed, Egyptian Interior and Furniture Designer, I gained Bachelor's Degree in Interior Design In 2020, I Obsessed with Interior Design, I am very Lucky to Work In the Same Field that I love, I Worked In this Field Since 2018 until Today. I Started by establishing my Page in 2018.I Started my Career from Home As Freelancer Designer, Designing Apartments, Shops, Hotels and Not Only this, I excelled in Designing Unique Pieces of furniture with Innovative Ideas.
            In the background, I worked hard to learn design and be distinguished in it. I trained in many places for design, finishes, and furniture factories. I read many books about interior design and furniture, and Now I am studying for a master’s degree in the Department of Interior Design and Furniture in 2021.
            Amira Elsayed Interior Designer's Page aims to provide you with a distinctive, unique, comfortable and sustainable space design that keeps pace with the development of technology and the change of times.",
            'image' => '1638797870_264165542_277440861014397_1882457108722520349_n.jpg',
        ]);
    }
}
