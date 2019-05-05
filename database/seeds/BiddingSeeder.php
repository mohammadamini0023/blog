<?php

use Illuminate\Database\Seeder;

class BiddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bidding::class, 500)->create();

    }
}
