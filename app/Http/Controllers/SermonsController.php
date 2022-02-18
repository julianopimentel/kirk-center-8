<?php

namespace App\Http\Controllers;

use App\Models\Category_Sermons;
use App\Models\Comment;
use App\Models\People;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Models\Sermons;
use App\Models\Statistics;
use Illuminate\Support\Str;
use App\Models\Status;
use Illuminate\Support\Facades\URL;
use App\Traits\UploadTrait;
use CategorySermons;
use DateTime;
use Illuminate\Support\Facades\Auth;

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
        //user data
        $you = auth()->user();
        $notes = Sermons::with('status')
        ->orderby('title','ASC')
        ->paginate(50);

        if($you->menuroles == 'admin')
        {
            $category = Category_Sermons::orderby('id','DESC')->get();
            return view('sermons.List', ['notes' => $notes, 'category' => $category]);
        }
        else
        //categoria
        $category = Category_Sermons::where('roles', 'like', '%' . auth()->user()->people->role . '%')->orderby('id','DESC')->get();

        //consulta da sermons
        return view('sermons.List', ['notes' => $notes, 'category' => $category]);
    }

    public function indexCategory($id)
    {
        //consulta permissao da categoria
        $category = Category_Sermons::where('roles', 'like', '%' . auth()->user()->people->role . '%')->where('id', $id)->first();
        //gabiarra para carregar somente os que tem a permissao
        if ($category == !null) {
            $notes = Sermons::with('user')->with('status')->where('type', $id)->paginate(20);
            return view('sermons.ListCategory', ['notes' => $notes]);
        }
        session()->flash("danger",  __('action.error'));
        return redirect()->route('sermons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //categoria
        $category = Category_Sermons::all();
        //carregar status
        $statuses = Status::all()->where("type", 'status');
        //hora
        return view('sermons.Create',  ['statuses' => $statuses, 'category' => $category]);
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
            'title'             => 'required',
            'content'           => 'required',
            'status_id'         => 'required',
            'applies_to_date'   => 'required|date_format:Y-m-d',
            'url' => 'required|url',

        ]);
        //user data
        $user = auth()->user();
        $note = new Sermons();
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->status_id = $request->input('status_id');
        $note->url_video   = $request->input('url');
        $note->type = $request->input('type');
        $note->applies_to_date = $request->input('applies_to_date');
        $note->users_id = $user->id;

        //tratamento da imagem se tiver
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp

            $name = session()->get('key') . '_' . time();
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
            $this->adicionar_log('19', 'C', $note);
            $request->session()->flash('success', __('general.sermon') . __('action.creat'));
            return redirect()->route('sermons.index');
        } else
            //salva sem o tratamento da imagem
            $note->save();
        //adicionar log
        $this->adicionar_log('19', 'C', $note);
        $request->session()->flash('success', __('general.sermon') . __('action.creat'));
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
        //consulta
        $note = Sermons::with('user')->with('status')->find($id);
        //analise de visita
        Statistics::create([
            'people_id' => auth()->user()->people->id,
            'type' => 'view',
            'sermons_id' => $id,
        ]);
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
        //consulta
        $note = Sermons::find($id);
        //validar o id se existe
        if ($note == null) {
            session()->flash("danger",  __('action.error'));
            return redirect()->route('sermons.index');
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
        $user = auth()->user();
        $validatedData = $request->validate([
            'title'             => 'required',
            'content'           => 'required',
            'status_id'         => 'required',
            'applies_to_date'   => 'required|date_format:Y-m-d',
            'type'         => 'required',
            'url' => 'required|url',
        ]);

        $note = Sermons::find($id);
        $note->title     = $request->input('title');
        $note->content   = $request->input('content');
        $note->status_id = $request->input('status_id');
        $note->url_video   = $request->input('url');
        $note->type = $request->input('type');
        $note->applies_to_date = $request->input('applies_to_date');
        $note->users_id = $user->id;
        //tratamento na imagem
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = session()->get('key') . '_' . time();
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
            $request->session()->flash('success', __('general.sermon') . __('action.edit'));
            return redirect()->route('sermons.index');
        } else
            //se nao tiver imagem, salva novamente
            $note->save();
        //adicionar log
        $this->adicionar_log('19', 'U', $note);
        $request->session()->flash('success', __('general.sermon') . __('action.edit'));
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
        session()->flash('warning', __('general.sermon') . __('action.delete'));
        $this->adicionar_log('19', 'D', $note);
        return redirect()->route('sermons.index');
    }

    //parte da categoria
    public function showCategory()
    {
        //pegar tenant
        $this->get_tenant();
        //roles
        $roles = Roles::all();
        //consulta da sermons
        $categorys = Category_Sermons::all();
        return view('sermons.ShowCategory', ['categorys' => $categorys,  'roles' => $roles]);
    }

    public function storeCategory(Request $request)
    {
        //pegar tenant
        $this->get_tenant();
        $validatedData = $request->validate([
            'name'             => 'required',
            'body'           => 'required',
            'roles'         => 'required',
        ]);
        $note = new Category_Sermons();
        $note->name     = $request->input('name');
        $note->body   = $request->input('body');
        $note->roles   = implode(',', $request->input('roles'));
        $note->save();
        //adicionar log
        $this->adicionar_log('20', 'C', $note);
        $request->session()->flash('success', __('general.category') . __('action.creat'));
        return redirect()->back();
    }
    public function destroyCategory($id)
    {
        //pegar tenant
        $this->get_tenant();
        //validar se possui vinculo com video
        $validar = Sermons::where('type', $id);
        if ($validar->count() == 0) {

            $categoria = Category_Sermons::find($id);
            if ($categoria) {
                $categoria->delete();
            }
            //adicionar
            session()->flash('warning', __('general.category') . __('action.delete'));
            $this->adicionar_log('20', 'D', $categoria);
            return redirect()->back();
        }
        session()->flash("info", "Categoria possui vinculo com Estudo, favor remover");
        return redirect()->back();
    }

    public function getArticles($id, Request $request)
    {
        $results = Comment::orderBy('id', 'desc')->with('user:id,name,profile_image')
            ->where('sermons_id', $id)
            ->paginate(3);
        $artilces = '';

        if ($request->ajax()) {
            foreach ($results as $result) {
                $dateTime1 = new DateTime($result->updated_at);
                $dateTime2 = new DateTime();
                $interval = $dateTime1->diff($dateTime2);

                if ($interval->format('%y') > 0) {
                    if ($dateTime2 >= $interval->format('%y')) {
                        $valorhora = $interval->format('%y anos') . PHP_EOL;
                    }
                }
                if ($interval->format('%m') > 0) {
                    if ($dateTime2 >= $interval->format('%m')) {
                        $valorhora = $interval->format('%m meses') . PHP_EOL;
                    }
                } else {
                    if ($interval->format('%d') > 0) {
                        if ($dateTime2 >= $interval->format('%d')) {
                            $valorhora = $interval->format('%d dias') . PHP_EOL;
                        }
                    } else {
                        if ($dateTime2 >= $interval->format('%h')) {
                            if ($interval->format('%h') > 0) {
                                $valorhora = $interval->format('%h horas') . ' ' . $interval->format('%i minutos') . PHP_EOL;
                            } 
                            else{
                                $valorhora = $interval->format('%i minutos') . ' ' . $interval->format('%s segundos') . PHP_EOL;
                        
                            }   
                        }
                    }
                }

                $artilces .= '
                <!-- post title start -->
                <div class="post-title d-flex align-items-center">
                    <!-- profile picture end -->
                    <div class="profile-thumb">
                        <a href="#">
                            <figure class="profile-thumb-middle">
                                    <div class="c-avatar"><img alt="image" class="mr-3 rounded-circle" width="30" height="30" src="' . $result->user->image . '"
                                            alt="profile picture"></div>
                            </figure>
                        </a>
                    </div>
                    <!-- profile picture end -->
                    <div class="posted-author">
                        <h7 class="author">' . $result->user->name . '</h7>
                        <span class="post-time">' . $result->comment . '</span>
                    </div>
                </div>
                <!-- post title start -->
                <div class="post-content">
                    <p class="post-desc">
                        Publicado em ' . $valorhora . '
                    </p>
                
            </div>';
            }
            return $artilces;
        }
    }
    //comentario na timezone
    public function storecomentario($id, Request $request)
    {
        //pegar tenant
        $this->get_tenant();

        $sermon = Sermons::find($id);

        if (!$sermon) {
            session()->flash("info", "Estudo não encontrado");
            return view('sermons.index');
        }

        Comment::create([
            'comment' => $request->input('comment'),
            'sermons_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back();
    }
}
