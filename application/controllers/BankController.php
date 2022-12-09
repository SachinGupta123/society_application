<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\FlatResource;
use App\Http\Resources\SocietyResource;
use App\Http\Resources\BankResource;
use App\Models\User;
use App\Models\Society;
use App\Models\FlatOwner;
use App\Models\FlatResident;
use App\Models\FlatTenant;
use App\Models\Flat;
use App\Models\Bank;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::get();
        if(count($banks) > 0)
        {
            return BankResource::collection($banks)->additional([
                'response' => [
                    'status' => 'success'
                ]
            ]);
        }
        else
        {
            return response()->json(['response' => ['status' => 'failure', 'detail' => 'No Banks Found']]);
        }
    }

    public function show($id)
    {
        $validator = Validator::make(['bank_id' => $id], [
            'bank_id' => 'numeric|exists:banks,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => ['status' => 'validation error', 'detail' => $validator->errors()]], Response::HTTP_BAD_REQUEST);
        }
        $bank = Bank::find($id);
        return  new BankResource($bank);
    }

    public function show_society($id)
    {
        $validator = Validator::make(['society_id' => $id], [
            'society_id' => 'numeric|exists:societies,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['response' => ['status' => 'validation error', 'detail' => $validator->errors()]], Response::HTTP_BAD_REQUEST);
        }
        $banks = Bank::where('society_id',$id)->get();

        if(count($banks) > 0)
        {
            return BankResource::collection($banks)->additional([
                'response' => [
                    'status' => 'success'
                ]
            ]);
        }
        else
        {
            return response()->json(['response' => ['status' => 'failure', 'detail' => 'No Banks Found']]);
        }
    }
}
