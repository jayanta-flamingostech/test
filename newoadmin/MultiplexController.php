<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Multiplex;
use Illuminate\Support\Facades\Storage;

class MultiplexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }    

    function creatorList()
    {
		$creatorUserAllData = User::leftJoin('creator_details', 'creator_details.creator_id', '=', 'users.id')
							->select('users.*', 'creator_details.image', 'creator_details.dob', 'creator_details.phone')
                            ->where('users.user_role','=','5')
							->get();
        return view('multiplex/creatorList',['creatorUserAllData'=>$creatorUserAllData]);
    }

    function viewCreatorDetails($id){
        $creator_user_data = User::leftJoin('creator_details', 'creator_details.creator_id', '=', 'users.id')
                                ->leftJoin('country_list', 'country_list.id', '=', 'creator_details.country_id')
                                ->select('users.name','users.email', 'creator_details.*', 'country_list.Name as country_name')
                                ->where('users.id', '=', $id)
                                ->first();
       
        return view('multiplex/creatorDetails',['creator_user_data'=>$creator_user_data]);
    }

    function multiplexList()
    {
		$multiplexAllData = Multiplex::leftJoin('users', 'users.id', '=', 'multiplex.creator_id')
                            ->leftJoin('ottgenere', 'ottgenere.genere_id', '=', 'multiplex.genere')
                            ->leftJoin('otttype', 'otttype.type_id', '=', 'multiplex.type')
							->select('multiplex.*', 'users.name as creator_name', 'ottgenere.genere_name', 'otttype.type_name')
							->get();
        return view('multiplex/multiplexList',['multiplexAllData'=>$multiplexAllData]);
    }

    function viewMultiplexDetails($id)
    {          
		$multiplexData = Multiplex::leftJoin('users', 'users.id', '=', 'multiplex.creator_id')
                            ->leftJoin('ottgenere', 'ottgenere.genere_id', '=', 'multiplex.genere')
                            ->leftJoin('otttype', 'otttype.type_id', '=', 'multiplex.type')
                            ->leftJoin('certification', 'certification.certification_id', '=', 'multiplex.certificate')
							->select('multiplex.*', 'users.name as creator_name', 'ottgenere.genere_name', 'otttype.type_name', 'certification.certification')
                            ->where('multiplex.id', '=', $id)
							->first();
        // echo '<pre>';
        // print_r($multiplexData);die;
        return view('multiplex/multiplexDetails',['multiplexData'=>$multiplexData]);
    }
}