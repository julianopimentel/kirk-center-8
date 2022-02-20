<?php

namespace App\Http\Controllers;

use App\Mail\SendMailConfirmarEvento;
use App\Mail\SendMailRemoveEvento;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventConfirm;
use Illuminate\Support\Facades\Mail;

class FullCalenderController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
        $this->middleware('system');
    }

    public function index(Request $request)
    {
        $this->get_tenant();
        if ($request->ajax()) {
            //consulta em json
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }
        //consulta de eventos
        $eventos = Event::orderBy('start', 'desc')->limit(10)->get();
        return view('calender.fullcalender', compact('eventos'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        $this->get_tenant();
        $user = auth()->user();
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'user_id' => $user->id,
                ]);
                //adicionar log
                $this->adicionar_log('4', 'C', $event);
                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                //adicionar log
                $this->adicionar_log('4', 'U', $event);
                return response()->json($event);
                break;

            case 'delete':
                $student = Event::where('id', $request->id)->get()->toJson();
                $event = Event::find($request->id)->delete();
                //adicionar log
                $this->adicionar_log('4', 'D', $student);
                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //carregar status
        return view('calender.create');
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
        ]);
        //user data
        $user = auth()->user();
        $event = new Event();
        $event->title     = $request->input('title');
        $event->body     = $request->input('body');
        $event->start   = $request->input('start');
        $event->end = $request->input('end');
        $event->status       = $request->has('status') ? 1 : 0;
        $event->user_id = $user->id;

        $event->save();
        //adicionar log
        $this->adicionar_log('4', 'U', $event);
        $request->session()->flash('message', 'Successfully edited event');
        return redirect()->route('calender.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //pegar tenant
        $this->get_tenant();
        $event = Event::find($id);
        $pessoas = EventConfirm::with('pessoaconfirmacao:id,name')->where('event_id', $id)->get();
        //validar o id se existe
        if ($event == null) {
            session()->flash("danger", "Erro interno");
            return redirect()->route('calender.index');
        }
        //carregar status
        return view('calender.edit', ['event' => $event, 'pessoas' => $pessoas]);
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
        ]);

        $event = Event::find($id);
        $event->title     = $request->input('title');
        $event->body     = $request->input('body');
        $event->start   = $request->input('start');
        $event->end = $request->input('end');
        $event->status       = $request->has('status') ? 1 : 0;

        $event->save();
        //adicionar log
        $this->adicionar_log('4', 'U', $event);
        $request->session()->flash('message', 'Successfully edited event');
        return redirect()->route('calender.index');
    }
    public function storeConfirm(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //user data
        $user = auth()->user();
        //validar se ja possui evento cadastrado
        $validar = EventConfirm::where('event_id', $id)->where('people_id', $user->people->id)->count();
        if ($validar == 0) {
            $event = new EventConfirm();
            $event->event_id = $id;
            $event->people_id = $user->people->id;
            $event->save();
            //adicionar log
            $this->adicionar_log('18', 'C', $event);
            //disparar email
            $conta_name = session()->get('conta_name');
            Mail::to($user->email)->queue(new SendMailConfirmarEvento($conta_name));
            $request->session()->flash('message', 'Presença confirmada');
            return redirect()->route('indexEventos');
        } else
            $request->session()->flash('info', 'Presença já confirmada');
        return redirect()->route('indexEventos');
    }
    public function storeRemove(Request $request, $id)
    {
        //pegar tenant
        $this->get_tenant();
        //user data
        $user = auth()->user();
        //disparar email
        $conta_name = session()->get('conta_name');
        Mail::to($user->email)->queue(new SendMailRemoveEvento($conta_name));
        //validar se ja possui evento cadastrado
        $event = EventConfirm::find($id);
        $event->delete();
        //adicionar log
        $this->adicionar_log('18', 'D', $event);

        $request->session()->flash('danger', 'Presença retirada');
        return redirect()->route('indexEventos');
    }
}
