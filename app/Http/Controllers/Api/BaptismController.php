<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaptismIndexResource;
use App\Models\Baptism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaptismController extends Controller
{
    public function index(){
        return BaptismIndexResource::collection(Baptism::all());
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|string',
            'baptised_date' => 'required|date',
            'priest' => 'required|string',
            'sponsors' => 'required|string',
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
}
