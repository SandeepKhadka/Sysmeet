<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mail_data = [

            // Mail

            [
                'mail_transport' => 'smtp',
                'mail_host' => 'smtp.mailtrap.io',
                'mail_port' => '2525',
                'mail_username' => '6d9d517f6c59fe',
                'mail_password' => '15c17ea74c5be4',
                'mail_encryption' => 'tls',
                'mail_from' => 'sandeepkhadka4935g@gmail.com',
            ],

        ];

        DB::table('mail_settings')->insert($mail_data);
    }
}
