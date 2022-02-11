<?php

namespace App\Http\Controllers;

use App\Models\Category_Sermons;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\Sermons;
use Illuminate\Support\Str;
use App\Models\Status;
use Illuminate\Support\Facades\URL;
use App\Traits\UploadTrait;

class SermonsController extends Controller
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
        //pegar tenant
        $this->get_tenant();
        //categoria
        $category = Category_Sermons::all();
        //consulta da sermons
        $notes = Sermons::with('user')->with('status')->paginate(20);
        return view('sermons.List', ['notes' => $notes, 'category' => $category]);
    }
    public function indexCategory($id)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta da sermons
        $notes = Sermons::with('user')->with('status')->where('type', $id)->paginate(20);
        return view('sermons.ListCategory', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //roles
        $roles = Roles::all();
        //categoria
        $category = Category_Sermons::all();
        //carregar status
        $statuses = Status::all()->where("type", 'status');
        return view('sermons.Create', ['statuses' => $statuses, 'roles' => $roles, 'category' => $category]);
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
            'applies_to_date'   => 'required|date_format:Y-m-d',
        ]);
        //user data
        $user = auth()->user();
        $note = new Sermons();
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->status_id = $request->input('status_id');
        $note->url_video   = $request->input('url');
        $note->roles   = implode(',', $request->input('roles'));
        $note->type = $request->input('type');
        $note->applies_to_date = $request->input('applies_to_date');
        $note->users_id = $user->id;

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
            $this->uploadOne($image, $folder, 'sermons', $name);
            // Set user profile image path in database to filePath
            $note->image = URL::to('/') . '/storage/sermons/' . $filePath;
            $note->save();
            //adicionar log
            $this->adicionar_log('19', 'U', $note);
            $request->session()->flash('success', __('layout.sermon'). __('action.creat'));
            return redirect()->route('sermons.index');
        } else
            //salva sem o tratamento da imagem
            $note->save();
        //adicionar log
        $this->adicionar_log('19', 'U', $note);
        $request->session()->flash('success', __('layout.sermon'). __('action.creat'));
        return redirect()->route('sermons.index');
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
        $note = Sermons::with('user')->with('status')->find($id);
        return view('sermons.Show', ['note' => $note]);
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
        $note = Sermons::find($id);
        //validar o id se existe
        if ($note == null) {
            session()->flash("danger",  __('action.error'));
            return redirect()->route('group.index');
        }
        //roles
        $roles = Roles::all();
        //categoria
        $category = Category_Sermons::all();
        //carregar status
        $statuses = Status::all()->where("type", 'status');
        return view('sermons.Edit', ['statuses' => $statuses, 'note' => $note, 'roles' => $roles, 'category' => $category]);
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
        //user data
        $user = auth()->user();
        $validatedData = $request->validate([
            'title'             => 'required|min:1|max:64',
            'content'           => 'required',
            'status_id'         => 'required',
            'applies_to_date'   => 'required|date_format:Y-m-d',
            'type'         => 'required'
        ]);

        $note = Sermons::find($id);
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->status_id = $request->input('status_id');
        $note->url_video   = $request->input('url');
        $note->roles   = implode(',', $request->input('roles'));
        $note->type = $request->input('type');
        $note->applies_to_date = $request->input('applies_to_date');
        $note->users_id = $user->id;
        //tratamento na imagem
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
            $this->uploadOne($image, $folder, 'sermons', $name);
            // Set user profile image path in database to filePath
            $note->image = URL::to('/') . '/storage/sermons/' . $filePath;
            $note->save();
            //adicionar log
            $this->adicionar_log('19', 'U', $note);
            $request->session()->flash('success', __('layout.sermon'). __('action.edit'));
            return redirect()->route('sermons.index');
        } else
            //se nao tiver imagem, salva novamente
            $note->save();
        //adicionar log
        $this->adicionar_log('19', 'U', $note);
        $request->session()->flash('success', __('layout.sermon'). __('action.edit'));
        return redirect()->route('sermons.index');
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
        $note = Sermons::find($id);
        if ($note) {
            $note->delete();
        }
        //adicionar
        $request->session()->flash('warning', __('layout.sermon'). __('action.delete'));
        $this->adicionar_log('19', 'D', $note);
        return redirect()->route('sermons.index');
    }
}
