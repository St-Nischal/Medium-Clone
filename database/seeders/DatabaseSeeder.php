<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create some users first
        User::factory()->create([
            "name"=> "John Doe",
            "email"=> "Johndoe@gmail.com",
            "password"=> bcrypt("1013974Sunir@"),
            "username"=>"johndoe",
            "phone_number"=> "07326428374298347",
            "timezone"=>"America/New_York",
            "locale"=>"en",
            "terms_accepted_at"=> now(),

        ]);

        $categoties = ['Technology', 'Health', 'Science', 'Travel', 'Food', 'Lifestyle', 'Education', 'Finance', 'Entertainment', 'Sports'];
        foreach ($categoties as $category) {
            Category::create([
                'name' => $category,
            ]);  
        }

        Post::factory(100)->create();
    }
}
