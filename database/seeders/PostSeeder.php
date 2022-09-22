<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        for ($i = 0; $i < 20; $i++){

            $c = Category::inRandomOrder()->first();
            $title =  Str::random(20);

            Post::create(
                [
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'content' => 'Urna expetenda tempus auctor detraxit option lacinia. Fastidii dolorem tritani dolores intellegebat inimicus. Propriae populo alienum repudiandae elitr. Fringilla consectetur vel decore qui tota noster ferri feu.',
                    'category_id' => $c->id,
                    'description' => 'Mudhole? Slimy? My home this is!',
                    'posted' => 'yes',
                    'image' => 'x'
                ]

            );
        }
    }
}
