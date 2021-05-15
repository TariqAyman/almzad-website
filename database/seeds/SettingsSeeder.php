<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use anlutro\LaravelSettings\Facade as Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::set('company_name', 'SmartDashboard');
        Setting::set('company_email', 'info@samrt-coder.com');
        Setting::set('company_phone', '+201003003200');
        Setting::set('company_address', 'Egypt');
        Setting::set('company_city', 'Egypt');
        Setting::set('record_per_page', 15);
        Setting::set('default_role', 2);
        Setting::set('max_login_attempts', 3);
        Setting::set('lockout_delay', 2);
        Setting::set('instagram_url', "https://instagram.com/");
        Setting::set('twitter_url', "https://twitter.com/");
        Setting::set('facebook_url', "https://facebook.com/");
        Setting::set('youtube_url', "https://youtube.com/");
        Setting::set('register_notification_email', 2);

        Setting::save();
    }
}
