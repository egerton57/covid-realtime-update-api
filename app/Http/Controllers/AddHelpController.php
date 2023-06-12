<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\guides;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class AddHelpController extends Controller
{
        //View logged in user's data 
        public function index(Request $request, $id) {
            $user = User::find($id);

            $myData = DB::table('guides')->where('user_id', $user->id)->get();
            return response()->json($myData);
    }

        // view all user data
        public function viewAll(Request $request){
            $viewData = guides::all();
             return response()->json($viewData);
        }

        public function addHelp(Request $request, $id) {

            // Auth::User();
            //Take current user data    
            $user = User::find($id);

            $addGuids = new guides([
                'user_name' => $user->name,
                'user_id' => $user->id,
                'user_email' => $user->email,
                'topic' => $request->input('topic'),
                'description' => $request->input('description'),
                'link' => $request->input('weblinks')
            ]);

            $addGuids->save();
            return response()->json('Record added!');

    }


        // public function destroy($id)
        //     {
        //         $guide = guides::find($id);
        //         $guide->delete();
        //         return response()->json(' deleted!');
        //     }
}
