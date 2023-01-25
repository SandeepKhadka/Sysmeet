<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social_info_data = [

            // Admin

            [
                'title' => 'Facebook',
                'order_id' => 1,
            ],
            [
                'title' => 'Twitter',
                'order_id' => 2,
            ],
            [
                'title' => 'Instagram',
                'order_id' => 3,
            ],
            [
                'title' => 'LinkedIn',
                'order_id' => 4,
            ],
            [
                'title' => 'Pinterest',
                'order_id' => 5,
            ],



        ];

        DB::table('social_infos')->insert($social_info_data);
    }
}
