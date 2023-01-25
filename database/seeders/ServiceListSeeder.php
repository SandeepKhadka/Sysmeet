<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service_list_data = [

            // Admin

            [
                'title' => 'Hosting Services',
                'order_id' => 1,
                'tag' => 'cloud',
            ],
            [
                'title' => 'Website Development',
                'order_id' => 2,
                'tag' => 'world-1',
            ],
            [
                'title' => 'Mobile App Development',
                'order_id' => 3,
                'tag' => 'layout',
            ],
            [
                'title' => 'Management Services',
                'order_id' => 4,
                'tag' => 'data-management',
            ],
            [
                'title' => 'Cloud Services',
                'order_id' => 5,
                'tag' => 'gear',
            ],
            [
                'title' => 'SEO and Digital Marketing',
                'order_id' => 6,
                'tag' => 'mission',
            ],
            [
                'title' => 'IT Consulting',
                'order_id' => 7,
                'tag' => 'communities',
            ],
            [
                'title' => '24/7 Support',
                'order_id' => 8,
                'tag' => 'support',
            ],

        ];

        DB::table('service_lists')->insert($service_list_data);
    }
}
