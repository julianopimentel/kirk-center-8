<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests_Prayer;
use Illuminate\Support\Str;
use App\Models\Status;
use Illuminate\Support\Facades\URL;
use App\Traits\UploadTrait;

class Requests_PrayerController extends Controller
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pegar tenant
        $this->get_tenant();
        //consulta da message
        $prayers = Requests_Prayer::with('user')->with('status')->paginate(20);
        return view('prayer.notesList', ['prayers' => $prayers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //carregar status
        $statuses = Status::all()->where("type", 'status');
        return view('prayer.create', ['statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'status_id'         => 'required',
            'note_type'         => 'required'
        ]);
        //user data
        $user = auth()->user();
        $prayer = new Requests_Prayer();
        $prayer->title     = $request->input('title');
        $prayer->content   = $request->input('content');
        $prayer->status_id = $request->input('status_id');
        $prayer->note_type = $request->input('note_type');
        $prayer->public    = $request->has('public') ? 1 : 0;
        $prayer->user_id = $user->id;

        //tratamento da imagem se tiver
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp

            $name = Str::slug($request->input('name')) . '_' . time();
            // Define folder path
            $folder = '';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'messages', $name);
            // Set user profile image path in database to filePath
            $prayer->image = URL::to('/') . '/storage/messages/' . $filePath;
            $prayer->save();
            //adicionar log
            $this->adicionar_log('15', 'U', $prayer);
            $request->session()->flash('message', 'Successfully edited note');
            return redirect()->route('prayer.index');
        } else
            //salva sem o tratamento da imagem
            $prayer->save();
        //adicionar log
        $this->adicionar_log('15', 'U', $prayer);
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('prayer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta
        $prayer = Requests_Prayer::with('user')->with('status')->find($id);
        return view('prayer.noteShow', ['prayer' => $prayer]);
    }

    public function showUser($id)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta
        $prayer = Requests_Prayer::with('user')->with('status')->find($id);
        return view('prayer.noteShowUser', ['prayer' => $prayer]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pegar tenant
        $this->get_tenant();
        $prayer = Requests_Prayer::find($id);
        //validar o id se existe
        if ($prayer == null) {
            session()->flash("danger", "Erro interno");
            return redirect()->route('group.index');
        }
        //carregar status
        $statuses = Status::all()->where("type", 'status');
        return view('prayer.edit', ['statuses' => $statuses, 'prayer' => $prayer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //die();
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'status_id'         => 'required',
            'note_type'         => 'required'
        ]);

        $prayer = Requests_Prayer::find($id);
        $prayer->title     = $request->input('title');
        $prayer->content   = $request->input('content');
        $prayer->status_id = $request->input('status_id');
        $prayer->note_type = $request->input('note_type');
        $prayer->public    = $request->has('public') ? 1 : 0;
        $prayer->save();
        //adicionar log
        $this->adicionar_log('15', 'U', $prayer);
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('prayer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //pegar tenant
        $this->get_tenant();
        $prayer = Requests_Prayer::find($id);
        if ($prayer) {
            $prayer->delete();
        }
        //adicionar
        $this->adicionar_log('15', 'D', $prayer);
        return redirect()->route('prayer.index');
    }
}
