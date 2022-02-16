<?php

namespace App\Http\Controllers;

use App\Models\People;
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
        $user->phone       = $request->input('phone');
        $user->doc       = $request->input('doc');
        //tratamento na imagem
        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp

            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'profiles', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = URL::to('/') . '/storage/profiles/' . $filePath;
        }
        //adicionar log
        $this->adicionar_log_global('8', 'U', '{"name":"' . $user->name . '","email":"' . $user->email . '","phone":"' . $user->phone . '","doc":"' . $user->doc . '"}');
        $user->save();
        $request->session()->flash("success", 'events.change_success');
        return redirect()->back();
    }
    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'             => 'required|min:1|max:255',
        ]);
        //pegar tenant
        $this->get_tenant();
        $people = People::find($id);
        $people->name          = strtoupper($request->input('name'));
        $people->email         = $request->input('email');
        $people->phone        = $request->input('phone');
        $people->birth_at      = $request->input('birth_at');
        $people->address       = $request->input('address');
        $people->city          = $request->input('city-dd');
        $people->state          = $request->input('state-dd');
        $people->cep           = $request->input('cep');
        $people->country       = $request->input('country-dd');

        //$people->is_visitor       = $request->has('is_visitor') ? 1 : 0;
        //$people->is_transferred       = $request->has('is_transferred') ? 1 : 0;
        //$people->is_responsible       = $request->has('is_responsible') ? 1 : 0;
        //$people->is_conversion       = $request->has('is_conversion') ? 1 : 0;
        //$people->is_baptism       = $request->has('is_baptism') ? 1 : 0;
        //$people->sex       = $request->input('sex');
        //$people->note       = $request->input('note');
        $people->is_newvisitor = 'false';
        //se tiver os valores do google maps 
        if (($request->input('lat-span') and $request->input('lon-span')) == !null) {
            $people->lat = $request->input('lat-span');
            $people->lng = $request->input('lon-span');
        }
        $people->save();

        //adicionar log
        $this->adicionar_log('1', 'U', $people);
        $request->session()->flash("success", "Salvo com sucesso");
        return redirect()->back();
    }
}
