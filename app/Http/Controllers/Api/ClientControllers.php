<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientIndexResource;
use App\Models\Client;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

class ClientControllers extends Controller
{
    public function index(){
        return ClientIndexResource::collection(Client::paginate(10));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthDate' => 'required|date',
            'gender' => 'required|string',
            'contact' => 'required|string',
            'barangay' => 'required|string',
            'municipality' => 'required|string',
            'province' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['error' => true, 'message'=> $validator->errors()]);
        }

        if($validator->validated()){
            $uuid = Str::uuid();
            $client = Client::create([
                'id' => $uuid,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'birthDate' => $request->birthDate,
                'gender' => $request->gender,
                'contact' => $request->contact,
                'barangay' => $request->barangay,
                'municipality' => $request->municipality,
                'province' => $request->province
            ]);
            if($client){
                return response()->json(['success'=> true, 'message'=> 'Successfully created a client.']);
            }
            return response()->json(['error'=> true, 'message'=> 'Failed to create a client.']);
        }
    }

    public function searchClient(Request $request){
       return ClientIndexResource::collection(Client::where('lastName', 'LIKE', "%{$request->input('search')}%")->paginate(10));
    }

    public function show($id){
        return new ClientIndexResource(Client::find($id));
    }

    public function edit($id){
        $client = Client::find($id);
        return $client;
    }

    public function updateClient(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthDate' => 'required|date',
            'gender' => 'required|string',
            'contact' => 'required|string',
            'barangay' => 'required|string',
            'municipality' => 'required|string',
            'province' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json(['inputError'=>true, 'message'=> $validator->errors()]);
        }

        if($validator->validated()){
            $client = Client::where('id', '=', $id)->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'birthDate' => $request->birthDate,
                'gender' => $request->gender,
                'contact' => $request->contact,
                'barangay' => $request->barangay,
                'municipality' => $request->municipality,
                'province' => $request->province
            ]);

            if($client){
                return response()->json(['success'=>true, 'message'=>'Successfully updated a client.']);
            }else{
                return response()->json(['error'=>true, 'message'=>'Failed to update a client.']);
            }
        }
    }

    public function deleteClient($id){
        $client = Client::find($id);
        $client->delete();
        if($client){
            return response()->json(['success'=> true, 'message'=>'Successfully deleted a client.']);
        }else{
            return response()->json(['error'=> true, 'message'=>'Failed to delete a client.']);
        }
    }
}
