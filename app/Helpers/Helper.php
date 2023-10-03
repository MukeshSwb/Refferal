<?php
namespace App\Helpers;
use App\Models\Setting;

class Helper{
    public static function fetchReferralAmount(){
        $setting = Setting::where('key','referralCode')->first();
        if(!empty($setting)){
            return $setting->value;
        }
        return 0;
    }

    public static function GenerateReferenceNumber($user){
        $random = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $uniqueKey = (strlen($user['id']) > 1) ? $user['id'].substr($user['first_name'],0,5).$random : '0'.$user['id'].substr($user['first_name'],0,5).$random;
        return $uniqueKey;
       
    }
}
?>