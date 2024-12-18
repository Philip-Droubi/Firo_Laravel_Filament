<?php

namespace App\Traits;

trait ImagesHelper
{
    protected function getProfileImage($user): string
    {
        return strpos($user->img_url, 'http') === 0 ?
            $user->img_url
            : (is_null($user->img_url) ? config('custom.user_default_image') : "storage/assets/" . $user->img_url);
    }

    protected function getBGImage($profile): string
    {
        return strpos($profile->bg_img_url, 'http') === 0 ?
            $profile->bg_img_url
            : ($profile->bg_img_url ? "storage/assets/" . $profile->bg_img_url : "");
    }
}