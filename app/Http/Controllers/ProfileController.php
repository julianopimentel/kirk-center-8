<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    use UploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profileEditForm');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name'       => 'required|min:1|max:256',
        //    'email'      => 'required|email|max:256',
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $user = User::findOrFail(auth()->user()->id);
        $user->name       = $request->input('name');
       // $user->email      = $request->input('email');
        $user->mobile       = $request->input('mobile');
        $user->doc       = $request->input('doc');
        //tratamento na imagem
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp

            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'profiles', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = URL::to('/').'/storage/profiles/'.$filePath;
        }
        //adicionar log
        $this->adicionar_log_global('8', 'U', '{"name":"' . $user->name . '","email":"' . $user->email . '","mobile":"' . $user->mobile . '","doc":"' . $user->doc . '"}');
        $user->save();
        $request->session()->flash("success", 'events.change_success');
        return redirect()->back();
    }
}
