<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default User Profile Image
    |--------------------------------------------------------------------------
    | This value is the default user profile image of your application.
    |
    */

    "user_default_image"    => "assets/defaults/default_user.jpg",
    "bot_default_image"     => "assets/defaults/bot.jpeg",

    /*
    |--------------------------------------------------------------------------
    | Private File Storage Path
    |--------------------------------------------------------------------------
    | This value is used to define the folder where files should be stored as private files.
    | Notice that changing the path will not effect files already stored
    | in the system.
    |
    */

    "private_path" => "private/",

    /*
    |--------------------------------------------------------------------------
    | Loging Attempts Rate Limiter
    |--------------------------------------------------------------------------
    | max_attempts => Set the maximum number of login attempts
    | decay_minutes => Set the number of minutes until the login attempts reset
    |
    */

    "max_attempts"          => 5,
    "decay_minutes"         => 60 * 5,  // five minutes
    "admin_max_attempts"    => 5,
    "admin_decay_minutes"   => 60 * 15, // 15 minutes

    /*
    |--------------------------------------------------------------------------
    | Accepted Languages
    |--------------------------------------------------------------------------
    | This value is used to define accepted user languages.
    |
    */

    "accepted_languages" => ['en', 'ar'],
    "accepted_languages_options" => ['en' => 'EN', 'ar' => 'AR'],

    /*
    |--------------------------------------------------------------------------
    | Max ContactUs Links
    |--------------------------------------------------------------------------
    | This value is used to define max contact us links.
    |
    */

    "max_contact_us_links" => 15,
];
