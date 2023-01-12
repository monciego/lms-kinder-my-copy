<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        
        // $quizzes = Quiz::where('user_id', $user_id)->get();
        
        return view('t-quiz');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quiz_name' => 'required|string|max:255',
            'instruction' => 'required|string',
            'deadline' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
        }
        else { 
            $user_id = Auth::id();
            $quiz = Quiz::create([
                'quiz_name' => $request->quiz_name,
                'instruction' => $request->instruction,
                'deadline' => $request->deadline,
            ]);
            $quiz->user()->associate($user_id);
            $quiz->save();
            
            return response()->json([ 
                'status'=>200, 
                'message'=>'Account Created Successfully',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showQuizzes() { 
        $user_id = Auth::id();
        $quizzes = Quiz::where('user_id', $user_id)
        ->with('user')
        ->get();
        
        
        return response()->json([ 
            'quizzes'=>$quizzes,
        ]);
    }
     
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        
        if ($quiz) {
            return response()->json([ 
                'status'=>200, 
                'quiz'=>$quiz,
            ]);
        }
        else { 
            return response()->json([ 
                'status'=>404, 
                'message'=>'Quiz Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'quiz_name' => 'required|string|max:255',
            'instruction' => 'required|string',
            'deadline' => 'required',
        ]);

        if ($validator->fails()) {
        
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
            
        }
        else {     
        
            $quiz = Quiz::find($id); 
            
            if ($quiz) {
                
                $quiz->quiz_name = $request->input('quiz_name');
                $quiz->instruction = $request->input('instruction');
                $quiz->deadline = $request->input('deadline');
                $quiz->save();
                
                return response()->json([ 
                    'status'=>200, 
                    'message'=>'Quiz Updated Successfully',
                    'quiz'=>$quiz,
                ]);
                
            }
            else { 
            
                return response()->json([ 
                    'status'=>404, 
                    'message'=>'Account Not Found',
                ]);
                
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return response()->json([ 
            'status'=>200, 
            'quiz'=>$quiz,
            'message'=>'Quiz has been deleted.',
        ]);
    }
}
