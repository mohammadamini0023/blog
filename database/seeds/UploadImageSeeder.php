<?php

use Illuminate\Database\Seeder;

class UploadImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Upload_image::class, 30)->create();
    }
}
