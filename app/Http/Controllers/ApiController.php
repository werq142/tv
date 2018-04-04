<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\User;

class ApiController extends Controller
{
    public function videos()
    {
        $videos = Video::all();

        return response()->json([
            'videos' => $videos
        ]);
    }

    public function categories()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function users()
    {
        $users = User::all()->where('is_admin', '=',false);

        return response()->json([
            'users' => $users
        ]);
    }

    public function storeSession()
    {
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(! auth()->attempt(request(['email', 'password'])))
        {
            return response()->json([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        return response()->json([
            'user' => auth()->user()
        ]);
    }

    public function destroySession()
    {
        auth()->logout();

        return redirect()->home();
    }
}
