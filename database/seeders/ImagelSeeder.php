<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImagelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory->define(Image::class, function (Faker $faker) {
            return [
                'image'=>'https://source.unsplash.com/random',

            ];
        });
    }
}
