<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaptismIndexResource;
use App\Models\Baptism;
use App\Models\Client;
use App\Models\Priest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaptismController extends Controller
{
    public function index(){
        $baptism = Baptism::where('client_id', '=', '0da3efb4-95f6-33d1-b246-d828a8a986e6')->get();
        return $baptism;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|string',
            'baptised_date' => 'required|date',
            'priest_id' => 'required|integer',
            'sponsors' => 'required|string',
            'dated' => 'required|string',
            'series_of' => 'required|string',
            'book_number' => 'required|string',
            'page' => 'required|integer',
            'purpose' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['inputErrors' => true, 'message' => $validator->errors()]);
        }

        if($validator->validated()){
            $baptism = Baptism::create($request->all());
            if($baptism){
                return response()->json(['success'=>true, 'message'=>'Successfully created a baptism data.']);
            }
            return response()->json(['error'=>true, 'message'=>'Failed to create a baptism data.']);
        }
    }

    public function searchClientBaptism($id){
        $client = Client::query()->where('id', $id)->with('baptism')->first();
        $priest = Priest::query()->where('id', $client->baptism->priest_id)->first();
        return $priest;
    }
}
