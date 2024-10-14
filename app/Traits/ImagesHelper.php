<?php

namespace App\Traits;

trait ImagesHelper
{
    protected function getProfileImage($user): string
    {
        return is_null($user->img_url) ? config('custom.user_default_image') : "storage/assets/" . $user->img_url;
    }

    protected function getBGImage($profile): string
    {
        return $profile->bg_img_url ? "storage/assets/" . $profile->bg_img_url : "";
    }
}
