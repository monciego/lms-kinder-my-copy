<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $users = User::all()->except(Auth::id());
        }
        else { 
            $teacher = User::where('id',Auth::id())->first();
            $grade = $teacher->grade; 
            $users = User::whereRoleIs('student')->where('grade', $grade)->get();
        }
        return view('account', compact('users'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
        }
        else {   
            
            if($request->role_id == 'admin') { 
                $grade_level = null;
            }
            else { 
                $grade_level = $request->grade;
            }
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'grade' => $grade_level,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole($request->role_id); 
            
            $user_id = $user->id;
            
            if ($user->hasRole('student')) {
                $grade = Grade::create([
                    'user_id' => $user_id,
                    'grade' => 'n/a'
                ]);
            }
            
            return response()->json([ 
                'status'=>200, 
                'status'=>$user_id, 
                'grade_level'=>$grade_level, 
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
        $user = User::where('id', $id)->with('parent_information')->get();
        return view('parents-information-view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        if ($user->hasRole('admin ')) {
            $show_grade_level = false;
        } 
        else { 
            $show_grade_level = true;
        }
        
        if ($user) {
            return response()->json([ 
                'status'=>200, 
                'show_grade_level'=>$show_grade_level,
                'user'=>$user,
            ]);
        }
        else { 
            return response()->json([ 
                'status'=>404, 
                'message'=>'Account Not Found',
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()) {
        
            return response()->json([
                'status'=>400, 
                'errors'=>$validator->messages(),
            ]);
            
        }
        else {     
        
            $user = User::find($id); 
            
            if ($user) {
            
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->grade = $request->input('grade');
                $user->password = Hash::make($request->input('password'));
                $user->save();
                
                if ($request->ajax()) {
                    return response()->json([ 
                        'status'=>200, 
                        'message'=>'Account Updated Successfully',
                        'user'=>$user,
                    ]);
                }
                
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
        $user = User::find($id);
        $user->delete();
        return response()->json([ 
            'status'=>200, 
            'user'=>$user,
            'message'=>'Account has been deleted.',
        ]);
    }
}
