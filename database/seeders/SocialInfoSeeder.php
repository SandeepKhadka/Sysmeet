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
            ],
            [
                'title' => 'Twitter',
            ],
            [
                'title' => 'Instagram',
            ],
            [
                'title' => 'LinkedIn',
            ],
            [
                'title' => 'Pinterest',
            ],



        ];

        DB::table('social_infos')->insert($social_info_data);
    }
}
