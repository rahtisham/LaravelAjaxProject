<?php

namespace App\Http\Controllers;
use App\Students;
use Illuminate\Http\Request;
use Redirect , Response;

class StudentsController extends Controller
{

// Student From    
    public function index()
    {
        return view('index');
    }
// End Query

// Student Submit query    

    public function Add_student(Request $request)
    {

        $this->validate($request, [
            'name'    =>  'required',
            'phone'     =>  'required',
            'address'     =>  'required'
        ]);
        $student = new Students([
            'name'    =>  $request->get('name'),
            'phone'     =>  $request->get('phone'),
            'address'     =>  $request->get('address')
        ]);
        $student->save();
        return redirect()->route('Student-view')->with('success', 'Data Added');
    
    }

// End Query

// View Student

    public function Student_view()
    {
        $student = Students::all()->toArray();
        return view('fetch' , compact('student'));
    }

// End Query

// Updata student data without Ajax

    public function Update_Student_Without_Ajax($id)
    {

         $student = students::find($id);
         return view('Update' ,compact('student' , 'id'));
    }

    public function student_update_emplementation(Request $request , $id)
    {


   $this->validate($request, [

    'name' => 'required',
    'phone' => 'required',
    'address' => 'required'

    ]);
    $student = students::find($id);

    $student->name = $request->get('name');
    $student->phone = $request->get('phone');
    $student->address = $request->get('address');

    $student->save();

    return redirect()->route('Student-view')->with('success' ,'Sounds Good| Data Updated');

    }

// End Query

// destroy Student function

public function student_destroy($id)
{
    // dd($id);
    $student = students::find($id)->delete();
   return redirect()->route('Student-view')->with('success' , 'Student Data deleted');
    
}

// End Query


// update query using ajax 

   public function GetLintId($id)
   {
       $student = students::find($id);
       return response()->json($student);
   }

   public function Student_Update_With_Ajax(Request $request ,$id)
    {
        $student = students::find($request->id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->save();
        return response()->json($student);
    }

// End Query

}
