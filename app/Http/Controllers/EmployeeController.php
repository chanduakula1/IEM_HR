<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function employeeform()
    {
        if(Auth::user()->role == "Employee")
        {
            $employee_data = \DB::table('employees')->where('email', Auth::user()->email)->first();
            // dd($employee_data);
            return view ('Employee.employeeform', compact('employee_data'));
        }else
        {
            // dd('Admin');
        return view('Employee.employeecreateform');
        }
        // dd(Auth::user());
    }
    public function employeeformsubmit(Request $Request)
    {
        if($Request->submit)
        {
            // dd($Request->all());
            $user = new User;
            $user->name = $Request->get('fname');
            $user->email = $Request->get('newemail');
            $user->password = Hash::make($Request->get('newpassword'));
            $user->role = "Employee";
            $user->save();

            $Employee = new Employee;
                // $password = Hash::make($Request->get('fname'));
                // dd(Hash::check("chandu", $password));
            $Employee->employee_name = $Request->get('fname');
            // $Employee->employee_name = $Request->get('lname');
            $Employee->title = $Request->get('title');
            $Employee->gender = $Request->get('gender');
            $Employee->father_name = $Request->get('fathername');
            $Employee->mother_name = $Request->get('mothername');
            $Employee->dob = $Request->get('email');
            $Employee->email = $Request->get('newemail');
            $Employee->mother_tongue = $Request->get('mothertongue');
            $Employee->state = $Request->get('state');
            $Employee->age = $Request->get('age');
            $Employee->marital_status = $Request->get('marriage_status');
            $Employee->name_of_spouse = $Request->get('namespouse');
            $Employee->marriage_date = $Request->get('marriagedate');
            $Employee->present_address = $Request->get('presentaddress');
            $Employee->permanent_address = $Request->get('permanentaddress');
            $Employee->number1 = $Request->get('Contactnumber');
            $Employee->number2 = $Request->get('alternatenumber');
            $Employee->emergency_contact = $Request->get('emergencynumber');
            $Employee->email_personal = $Request->get('personal_email');
            $Employee->email_official = $Request->get('officeemial');
            $Employee->education = $Request->get('education');
            $Employee->slug = \Str::slug($Request->fname . Str::random());
             // $t = ;
             // dd($t);
            // dd($Employee->slug);
            //  $Employee->employee_name = $Request->get('age');
            // $Employee->employee_name = $Request->get('marriage_status');
            // $Employee->employee_name = $Request->get('namespouse');
            $Employee->save();
            return redirect()->route('list'); 
        }
    }
    public function employeelist()
    {
        $data = \DB::table('employees')->get();
        return view('Employee.employeeslist', compact('data'));
    }
    public function employeelistedit($value)
    {
        // dd($value);

        $Employee_name = \DB::table('employees')->where('slug' ,$value)->first();
        // $employee = $Employee_name->employee_name;
        // $employee_slug = $employee_name . 
        dd($Employee_name);
    }
    public function employeelistdelete ($value)
    {
         $Employee_name = \DB::table('employees')->where('slug' ,$value)->delete();
         // $Employee_name->();
         // dd($Employee_name->delete());
    }
    public function employeeupdate(Request $Request, $value)
    {
        // $Employee = Employee::where('slug', $value)\
        $Employeedata = \DB::table('employees')->where('slug', $value)->first();
        //dd($Employeedata);
        $Employee = \DB::table('employees')->where('slug', $value)
        ->update([
           'employee_name'=> $Request->get('fname') ?? $Employeedata->Employeedata,
           'email'=> $Request->get('email') ?? $Employeedata->email,
           'marital_status'=> $Request->get('marriage_status') ?? $Employeedata->marital_status,
           'number2' => $Request->get('number2') ?? $Employeedata->number2,
        ]);
        return view('Employee.employee_sucess'); 
        // dd($Request->all());
       // $Employee = Employee::find($value);
       //  $Employee = \DB::table('employees')->where('slug', $value)->first();
       //  $Employee->employee_name = $Request->get('fname');
       //      // $Employee->employee_name = $Request->get('lname');
       //      // $Employee->title = $Request->get('title');
       //      // $Employee->gender = $Request->get('gender');
       //      // $Employee->father_name = $Request->get('fathername');
       //      // $Employee->mother_name = $Request->get('mothername');
       //      $Employee->dob = $Request->get('email');
       //      // $Employee->email = $Request->get('newemail');
       //      // $Employee->mother_tongue = $Request->get('mothertongue');
       //      // $Employee->state = $Request->get('state');
       //      // $Employee->age = $Request->get('age');
       //      $Employee->marital_status = $Request->get('marriage_status');
       //      // $Employee->name_of_spouse = $Request->get('namespouse');
       //      // $Employee->marriage_date = $Request->get('marriagedate');
       //      // $Employee->present_address = $Request->get('presentaddress');
       //      // $Employee->permanent_address = $Request->get('permanentaddress');
       //      // $Employee->number1 = $Request->get('Contactnumber');
       //      $Employee->number2 = $Request->get('number2');
       //      // $Employee->emergency_contact = $Request->get('emergencynumber');
       //      // $Employee->email_personal = $Request->get('personal_email');
       //      // $Employee->email_official = $Request->get('officeemial');
       //      // $Employee->education = $Request->get('education');
       //      // $Employee->slug = \Str::slug($Request->fname . Str::random());
       //       // $t = ;
       //       // dd($t);
       //      // dd($Employee->slug);
       //      //  $Employee->employee_name = $Request->get('age');
       //      // $Employee->employee_name = $Request->get('marriage_status');
       //      // $Employee->employee_name = $Request->get('namespouse');
       //      // dd($Employee);
       //      $Employee->save();
       //      dd('view');
    }
}
