<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class TutorBillController extends Controller
{
    function index(){
        $tutorBills = App\Models\TutorBill::all();
        return response()->json($tutorBills);
    }
    function geById($id){
        $tutorBill = App\Models\TutorBill::find($id);
        return response()->json($tutorBill);
    }
}
