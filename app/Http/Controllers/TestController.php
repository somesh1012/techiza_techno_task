<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\test;
use Exception;

class TestController extends Controller
{

    public function index()
    {
        $values = test::all();
        return view('home', compact('values'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        try {
            $file = $request->file('file');
            if ($file != '') {
                $file_name = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $file_name);
            }

            $data = $request->all();
            $data['file'] = $file_name;
            test::create($data);

            return redirect('/')->with('status', 'data has been inserted successfully');
            
        } catch (Exception $e) {
            $data = [
                'message' => $e->getmessage(),
                'success' => false,
            ];
            return response()->json($data);
        }
    }

    public function UpdateStatus(Request $request)
    {
        try {
            if($request->status){
                foreach($request->status as $key => $status){
                    // dd($status);
                    test::whereId($key)->update(['status'=> $status[0]]);
                }
            }
            return redirect('/');

            return response()->json(['response' => 'data saved successfully']);
        
        } catch (Exception $e) {
            $data = [
                'message' => $e->getmessage(),
                'success' => false,
            ];
            return response()->json($data);
        }
    }
}
