<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Survey;

class SurveyController extends Controller
{
    //

    public function index()
    {
        // code...
        $survey = Survey::all();

        return response()->json($survey);

    }

    public function store(Request $request)
    {
        // code...
         $rules = [
            'profession'=>'required',
            'gender'=>'required',
            'salary'=>'required',
            'contact'=>'required',
            'project'=>'required'
            ];
        $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) 
        {
            return respose()->json(['status'=>422,'message'=>$validator->errors()],422);
        } 
        else
        {
            $survey = new Survey;

            $survey->profession = $request->input('profession');
            $survey->salary = $request->input('salary');
            $survey->gender = $request->input('gender');
            $survey->contact = $request->input('contact');
            $survey->project = $request->input('project');

            try 
            {
                $survey->save();

                return response()->json($survey,201);
            } 
            catch (Exception $e) 
            {
                return response()->json('Error creating record,', 400);
            }
        }

    }

    public function show($id)
    {
        // code...
        $survey = Survey::findOrFail($id);

        return response()->json($survey,200);
    }

    public function update($id, Request $request)
    {
        // code...

         $rules = [
            'profession'=>'required',
            'gender'=>'required',
            'salary'=>'required',
            'contact'=>'required',
            'project'=>'required'
            ];
        $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) 
        {
            return respose()->json(['status'=>422,'message'=>$validator->errors()],422);
        } 
        else
        {
             $survey = Survey::findOrFail($id);

            $survey->profession = $request->input('profession');
            $survey->salary = $request->input('salary');
            $survey->gender = $request->input('gender');
            $survey->contact = $request->input('contact');
            $survey->project = $request->input('project');

            try 
            {
                $survey->save();

                return response()->json($survey,201);
            } 
            catch (Exception $e) 
            {
                return response()->json('Error updating record,'.$e->getMessage(), 400);
            }
        }

    }

    public function destroy($id)
    {
        // code...
        $survey = Survey::findOrFail($id);

        try 
        {
            $survey->delete();

            return response()->json('Record Deleted Succesfully',200);
        } 
        catch (Exception $e) 
        {
            return response()->json('Record not deleted',404);
        }
    }

}
