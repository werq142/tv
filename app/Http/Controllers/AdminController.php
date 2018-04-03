<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\User;
use App\Models\Setting;

class AdminController extends Controller
{
    public function dashboard()
    {
        $amount_users = User::all()->count() - 1;
        $amount_categories = Category::all()->count();
        $amount_videos = Video::all()->count();

        $amount = [
            'users' => $amount_users,
            'categories' => $amount_categories,
            'videos' => $amount_videos
        ];

        $settings = Setting::first();

        return view('index.dashboard', compact('amount', 'settings'));
    }

    public function controlRegistration()
    {
        $settings = Setting::first();

        if (!($settings)) {
            $ip = ' ';

            $settings = Setting::create([
                'ip' => $ip
            ]);

            return back();
        }

        if ($settings->registration)
            $settings->registration = 0;
        else
            $settings->registration = 1;

        $settings->save();

        return back();
    }

    public function addIp(Request $request)
    {
        $this->validate(request(),['ip' => 'required|min:5']);

        $settings = Setting::first();
        $ip = $request['ip'];
        if (!($settings)) {

            $settings = Setting::create([
                'ip' => $ip
            ]);
        }
        else {

            $settings->ip = $settings->ip . ', ' . $ip;
        }

        $settings->save();

        return back();
    }
}
