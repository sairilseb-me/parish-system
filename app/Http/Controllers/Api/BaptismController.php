<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BaptismIndexResource;
use App\Models\Baptism;
use App\Models\Client;
use App\Models\Priest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BaptismController extends Controller
{
    public function index(){
       $baptism = Baptism::join('clients', 'clients.id', 'baptism.client_id')
       ->select('baptism.client_id', 'baptism.baptised_date','clients.firstName', 'clients.lastName', 'clients.barangay', 'clients.municipality', 'clients.province')
       ->get();
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

    public function searchSpecificBaptism($id){
       $baptism = Baptism::where('client_id', $id)->with('client', 'priest')->first();
       return $baptism;
    }
}
