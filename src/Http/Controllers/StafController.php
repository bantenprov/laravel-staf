<?php namespace Bantenprov\Staf\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Staf\Facades\Staf;
use Bantenprov\Staf\Models\Staf as StafModel;
use Bantenprov\Member\Models\Member; 
use App\Opd;
use App\User;
use Validator;
/**
 * The StafController class.
 *
 * @package Bantenprov\Staf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StafController extends Controller
{
    protected $stafModel;
    protected $opdModel;
    protected $useModel;   
    protected $memberModel; 

    public function __construct()
    {
        $this->stafModel = new StafModel;
        $this->opdModel = new Opd;
        $this->userModel = new User;
        $this->memberModel = new Member;
    }

    public function index()
    {
        $stafs = $this->stafModel->paginate();

        return $stafs;
        //return view('staf::staf.index',compact('stafs'));
    }

    public function create()
    {
        $opds = $this->opdModel->all();
        $users_model = $this->userModel->all();
        $members_model = $this->memberModel->all();        
        $users = [];
        
        foreach($users_model as $user_model){                         
            if($this->memberModel->where('user_id',$user_model->id)->count() == 0){
                array_push($users,$this->userModel->find($user_model->id));                 
            }
        }
        
        $response = (object) ['opds' => $opds,'users' => $users];
        return $response;

        //return view('staf::staf.create',compact('opds','users'));
    }

    public function show($id)
    {

        $staf = $this->stafModel->find($id);
        
        return $staf;
        // return "
        //     <a href=".route('stafIndex').">Back</a>
        // ";
    }

    public function edit($id)
    {
        
        $staf = $this->stafModel->find($id);
        
        return $staf;
    }

    public function update($id,$req)
    {
        $response = '';
        $error;
        $validator = Validator::make($req, [
            'opd_id' => 'required',
            'user_id' => 'required',
            'full_name' => 'required',
        ]);
                
        if ($validator->fails()) {            
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            
        }

        //dd($this->stafModel->find($id)->getOriginal('user_id'));
        if($this->memberModel->where('user_id',$req['user_id'])->count() > 0){
            return redirect()->back()->withErrors('This user already register as member !');
        }    
        
        if($this->stafModel->where('user_id',$req['user_id'])->count() > 0){
            if($this->stafModel->find($id)->getOriginal('full_name') == $req['full_name']){
                return redirect()->back()->withErrors('This user already register as staf !');
            }            
        }

        $this->stafModel->find($id)->update($req);

        return redirect()->back()->with('message','Data has been update');
    }

    public function store($req)
    {
        $response = '';
        $error;
        $validator = Validator::make($req, [
            'opd_id' => 'required',
            'user_id' => 'required',
            'full_name' => 'required',
        ]);
        
        if ($validator->fails()) {            
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
            
        }


        if($this->memberModel->where('user_id',$req['user_id'])->count() > 0){
            return redirect()->back()->withErrors('This user already register as member !');
        }    
        
        if($this->stafModel->where('user_id',$req['user_id'])->count() > 0){
            return redirect()->back()->withErrors('This user already register as staf !');
        }

        $this->stafModel->create($req);

        return redirect()->back()->with('message','Success add new data');
        //return redirect()->route('stafCreate')->with('message','Success add data');
    }

    public function destroy($id)
    {
        $this->stafModel->find($id)->delete();

        return redirect()->back();
    }

    public function countStaf()
    {
        $result = $this->stafModel->all()->count();

        return $result;
    }

    public function demo()
    {
        return Staf::welcome();
    }
}
