<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PriestIndexResource;
use App\Models\Priest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriestController extends Controller
{
    public function index(){
        return PriestIndexResource::collection(Priest::paginate(2));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['inputErrors'=> true, 'message'=>$validator->errors()]);
        }

        if($validator->validated()){
            $priest =  Priest::create($request->all());
            if($priest){
                return response()->json(['success'=>true, 'message'=> 'Successfully added a new Priest data.']);
            }
            return response()->json(['error'=>true, 'message'=>'Failed to add new Priest data.']);
        }
    }

    public function edit($id){
        return new PriestIndexResource(Priest::find($id));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['inputErrors'=> true, 'message'=>$validator->errors()]);
        }

        if($validator->validated()){
            $priest = Priest::where('id', '=', $request->id)->update([
                'title'=> $request->title,
                'firstName'=> $request->firstName,
                'lastName'=> $request->lastName,
            ]);

            if($priest){
                return response()->json(['success'=>true, 'message'=>'Successfully updated Priest data.']);
            }

            return response()->json(['error'=>true, 'message'=>'Failed to update Priest data.']);
        }
    }

    public function delete($id){
        $priest = Priest::find($id)->delete();
        if($priest){
            return response()->json(['success'=>true, 'message'=>'Successfully deleted Priest data.']);
        }
        return response()->json(['error'=>true, 'message'=>'Failed to delete Priest data.']);
    }
}
