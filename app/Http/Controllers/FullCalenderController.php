<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

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
    }
    
   public function index(Request $request)
   {
       $this->get_tenant();
       if($request->ajax()) {
            //consulta em json
            $data = Event::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);
 
            return response()->json($data);
       }
       //consulta de eventos
       $eventos = Event::all();
 
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
       switch ($request->type) {
          case 'add':
             $event = Event::create([
                 'title' => $request->title,
                 'start' => $request->start,
                 'end' => $request->end,
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
}
