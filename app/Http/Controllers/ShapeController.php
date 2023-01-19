<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Response;
use App\Models\Shape;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class ShapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
                
        return view('shape');
    }
    
    public function showShape() { 
        $role; 
        if(Auth::user()->hasRole('teacher'))  { 
            $role = 'teacher';
            $user_id = Auth::id(); 
        
            $shapes = Shape::where('user_id', $user_id)->get();
        }
        else { 
            $role = 'student';
            $shapes = Shape::all();
        }
        
      
        
        return response()->json([ 
            'shapes'=>$shapes,
            'role'=>$role,
        ]);
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
            'instruction' => 'required|string',
            'deadline' => 'required|string',
        ]);

        if ($validator->fails()) {
        
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
            
        }
        else { 
            
            $user_id = Auth::id();
            
            $shape = new Shape;
            $shape->instruction = $request->input('instruction'); 
            $shape->deadline = $request->input('deadline'); 
            
            if($request->file('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/shape/', $filename);
                $shape->image = $filename; 
            }
            
            $shape->user()->associate($user_id);
            $shape->save();
            
            return response()->json([ 
                'file'=>$request->file('image'),
                'status'=>200, 
                'message'=>'Shape Created Successfully',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $role; 
        if(Auth::user()->hasRole('teacher')) { 
            $role = "teacher"; 
        }
        else { 
            $role = "student"; 
        }
    
        $shapes = Shape::find($id);
        
        if ($request->ajax()) {
            return response()->json([
                'shapes'=>$shapes,
                'role'=>$role,
                'message'=>'ypi sadsaw',
            ]);
        }
    
        return view('show-shape', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function edit(Shape $shape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shape $shape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shape  $shape
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shape = Shape::find($id);
        $shape->delete();
        return response()->json([ 
            'status'=>200, 
            'shape'=>$shape,
            'message'=>'Quiz has been deleted.',
        ]);
    }
}
