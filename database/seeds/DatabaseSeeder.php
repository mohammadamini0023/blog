<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(FindSeeder::class);
        // $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class); 
        $this->call(CommentSeeder::class);
        $this->call(EvaluationSeeder::class);
        $this->call(BiddingSeeder::class);
        $this->call(SaleSeeder::class);
    
    }
}
