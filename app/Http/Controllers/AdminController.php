<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class AdminController extends Controller
{
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }

    public function referal(Request $request){
        if ($request->isMethod('post')) {
            $setting = Setting::where('key','referralCode')->first();
            if(empty($setting)){
                Setting::create([
                    'key' => 'referralCode',
                     'value' => $request->referralCode
                ]);
            }else{
                Setting::where('key','referralCode')->update(['value' => $request->referralCode]);
            }
            return redirect()->back()->with('success', 'Record created successfully!');
        }
        return view('admin.referral_form');
    }
}
