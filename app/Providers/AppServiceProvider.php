<?php

namespace App\Providers;

use App\Models\MailSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $mailsetting = MailSetting::where(['status' => 'active'])->orderBy('id', 'DESC')->first();
        if ($mailsetting) {
            $data = [
                'driver' => $mailsetting->mail_transport,
                'host' => $mailsetting->mail_host,
                'port' => $mailsetting->mail_port,
                'encryption' => $mailsetting->mail_encryption,
                'username' => $mailsetting->mail_username,
                'password' => $mailsetting->mail_password,
                'from' => [
                    'address' => $mailsetting->mail_from,
                    'name' => "Sysmeet"
                ]
            ];
            Config::set('mail', $data);
        }
    }
}
