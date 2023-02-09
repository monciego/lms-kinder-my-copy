<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Subject;
use App\Models\Activities;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use App\Models\ParentInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
   public function index()
   {
     if(Auth::user()->hasRole('student'))
     {
          $user = User::where('id', Auth::id())->doesntHave('parent_information')->get();    
          $user_count = count($user); 
          if ($user_count > 0) 
          {
               return redirect('parent-information');               
          }
          else 
          { 
               $student = User::where('id', Auth::id())->first();
               $student_grade = $student->grade; 
               $subjects = Subject::where('grade_level_id', $student_grade)->with('user')->get();
               return view('studentdash', compact('subjects'));
          }
     }
     elseif(Auth::user()->hasRole('teacher'))
     {
          $subjects = Subject::where('user_id', Auth::id())
                              ->with('user')
                              ->with('grade_level')
                              ->get();
          return view('teacherdash', ['subjects'=>$subjects]);
     }
     elseif(Auth::user()->hasRole('admin'))
     {
          $grade_levels = GradeLevel::all();
          return view('dashboard', compact('grade_levels'));          
     }
   }
   
   public function showSubject($id)
   {
          $subjects = Subject::where('grade_level_id', $id)->with('user')->get();
          $teachers = User::whereRoleIs('teacher')->get();
          return view('subject', ['subjects'=>$subjects, 'teachers'=>$teachers]);
   }
   
   public function editSubject($id) 
   { 
          $subject = Subject::find($id);
          
          if ($subject) 
          {
               return response()->json([ 
               'status'=>200, 
               'subject'=>$subject,
               ]);
          }
          else 
          { 
               return response()->json([ 
               'status'=>404, 
               'message'=>'Subject Not Found',
               ]);
          }
   }
   
   public function updateSubject(Request $request, $id) 
   { 
          $validator = Validator::make($request->all(), [
               'subject_name' => 'required|string|max:255',
               'start' => 'date_format:H:i',
               'end' => 'date_format:H:i|after:start',
          ]);

          if ($validator->fails()) {
          
          return response()->json([
               'status'=>400, 
               'errors'=>$validator->messages(),
          ]);
          
          }
          else {     
          
          $subject = Subject::find($id); 
          
          if ($subject) {
               $user_id = $request->input('user_id');
               
               $subject->subject_name = $request->input('subject_name');
               $subject->start = $request->input('start');
               $subject->end = $request->input('end');
               $subject->user()->associate($user_id);
               $subject->save();
               
               if ($request->ajax()) {
                    return response()->json([ 
                         'status'=>200, 
                         'message'=>'Subject Updated Successfully',
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
   
   public function deleteSubject($id)
   {
          $subject = Subject::find($id);
          $subject->delete();
          
          return response()->json([ 
               'status'=>200, 
               'subject'=>$subject,
               'message'=>'Subject has been deleted.',
          ]);
   }
   
   public function showSubjectContent($id) 
   { 
          return view('subject-content', compact('id'));
   }
   
   public function showAct($id)
   { 
          if (Auth::user()->hasRole('teacher'))
          {
               $user_id = Auth::id();
               $activities = Activities::where('user_id', $user_id)
                                        ->where('subject_id', $id)
                                        ->get();
          }
          else 
          { 
               $activities = Activities::where('subject_id', $id)->get();
          }
          
          return view('act', ['activities'=>$activities, 'id'=>$id]);
   }
   
   public function showStudents($id) 
   {
          $grade = Subject::where('id', $id)->with('grade_level')->first(); 
          $grade_id = $grade->grade_level->id;
          
          $students = User::where('grade', $grade_id)->whereRoleIs('student')->get();
          
          $quizzes = Quiz::where('subject_id', $id)->get();
          $total_quiz = count($quizzes);
          
          $answered_quizzes = Quiz::where('subject_id', $id)
                                   ->with('user')
                                   ->get();
                    
          return view('students', ['students'=>$students]);
   }
   
}
