<?php

namespace Database\Seeders;

# TODO: remove unused imports
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { # TODO: remove blank line below

        Post::factory(20)->create();
    }
}
