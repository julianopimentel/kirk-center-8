<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use Illuminate\Support\Str;
use App\Models\Status;
use Illuminate\Support\Facades\URL;
use App\Traits\UploadTrait;

class NotesController extends Controller
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
        //consulta da message
        $notes = Notes::with('user')->with('status')->paginate(20);
        return view('message.notesList', ['notes' => $notes]);
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
        return view('message.create', ['statuses' => $statuses]);
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
            'note_type'         => 'required'
        ]);
        //user data
        $user = auth()->user();
        $note = new Notes();
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->status_id = $request->input('status_id');
        $note->note_type = $request->input('note_type');
        $note->applies_to_date = $request->input('applies_to_date');
        $note->users_id = $user->id;

        //tratamento da imagem se tiver
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp

            $name = session()->get('key'). '_' . time();
            // Define folder path
            $folder = '';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'messages', $name);
            // Set user profile image path in database to filePath
            $note->image = URL::to('/') . '/storage/messages/' . $filePath;
            $note->save();
            //adicionar log
            $this->adicionar_log('3', 'U', $note);
            $request->session()->flash('message', 'Successfully edited note');
            return redirect()->route('message.index');
        } else
            //salva sem o tratamento da imagem
            $note->save();
        //adicionar log
        $this->adicionar_log('3', 'U', $note);
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('message.index');
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
        $note = Notes::with('user')->with('status')->find($id);
        return view('message.noteShow', ['note' => $note]);
    }

    public function showUser($id)
    {
        //pegar tenant
        $this->get_tenant();
        //consulta
        $note = Notes::with('user')->with('status')->find($id);
        return view('message.noteShowUser', ['note' => $note]);
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
        $note = Notes::find($id);
        //validar o id se existe
        if ($note == null) {
            session()->flash("danger", "Erro interno");
            return redirect()->route('group.index');
        }
        //carregar status
        $statuses = Status::all()->where("type", 'status');
        return view('message.edit', ['statuses' => $statuses, 'note' => $note]);
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
            'applies_to_date'   => 'required|date_format:Y-m-d',
            'note_type'         => 'required'
        ]);

        $note = Notes::find($id);
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->status_id = $request->input('status_id');
        $note->note_type = $request->input('note_type');
        $note->applies_to_date = $request->input('applies_to_date');
        //tratamento na imagem
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = session()->get('key'). '_' . time();
            // Define folder path
            $folder = '';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'messages', $name);
            // Set user profile image path in database to filePath
            $note->image = URL::to('/') . '/storage/messages/' . $filePath;
            $note->save();
            //adicionar log
            $this->adicionar_log('3', 'U', $note);
            $request->session()->flash('message', 'Successfully edited note');
            return redirect()->route('message.index');
        } else
            //se nao tiver imagem, salva novamente
            $note->save();
        //adicionar log
        $this->adicionar_log('3', 'U', $note);
        $request->session()->flash('message', 'Successfully edited note');
        return redirect()->route('message.index');
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
        $note = Notes::find($id);
        if ($note) {
            $note->delete();
        }
        //adicionar
        $this->adicionar_log('3', 'D', $note);
        return redirect()->route('message.index');
    }
}
