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
                'slug' => 'hosting_services',
            ],
            [
                'title' => 'Website Development',
                'order_id' => 2,
                'tag' => 'world-1',
                'slug' => 'website_development',
            ],
            [
                'title' => 'Mobile App Development',
                'order_id' => 3,
                'tag' => 'layout',
                'slug' => 'mobile_app_development',
            ],
            [
                'title' => 'Management Services',
                'order_id' => 4,
                'tag' => 'data-management',
                'slug' => 'management_services',
            ],
            [
                'title' => 'Cloud Services',
                'order_id' => 5,
                'tag' => 'gear',
                'slug' => 'cloud_services',
            ],
            [
                'title' => 'SEO and Digital Marketing',
                'order_id' => 6,
                'tag' => 'mission',
                'slug' => 'sEO_and_digital_marketing',
            ],
            [
                'title' => 'IT Consulting',
                'order_id' => 7,
                'tag' => 'communities',
                'slug' => 'it_consulting',
            ],
            [
                'title' => '24/7 Support',
                'order_id' => 8,
                'tag' => 'support',
                'slug' => '24/7_Support',
            ],

        ];

        DB::table('service_lists')->insert($service_list_data);
    }
}
