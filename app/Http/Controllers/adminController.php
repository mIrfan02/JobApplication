<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\job;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\Job as QueueJob;
use Carbon\Carbon;
use Captcha;

use App\Models\Category;
use App\Models\Message;
use App\Models\User;
use Illuminate\Queue\Jobs\Job as JobsJob;

class adminController extends Controller
{

   
   

    public function display(Request $request)
    {
        $query = $request->input('query');
    
        if (!empty($query)) {
            $jobs = Job::where('department', 'LIKE', "%$query%")
                ->orWhere('role', 'LIKE', "%$query%")
                ->orWhere('years_experience', 'LIKE', "%$query%")
                ->get(); 
        } else {
          $jobs=Job::where('app_status','pending')->where('hiring','rejected')->where('emp_status','no')->get();
            // $jobs = Job::where('app_status', 'pending')->get(); 
            // $recordCount = Job::where('app_status', 'pending')->count();
        }
    
        return view('layouts.dashboard', compact('jobs'));
    }
    


    public function allData(){
        $jobs=job::all();
        return view('layouts.dashboard',compact('jobs'));
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function showLoginForm()
    {
        return view('login');
    }





public function logout()
{
    Auth::logout();
    Session::flush();

    return redirect()->route('login');
}


public function delete($id)
{
    // Retrieve the job or any other data based on the given ID
    $job = Job::findOrFail($id);

    // Perform any necessary validation or authorization checks

    // Delete the job
    $job->delete();

    // Redirect the user or return a response as needed
    return redirect()->back()->with('deletion', 'Record deleted successfully.');
}

public function edit($id)
    {
        $user = Job::find($id);

        if (!$user) {
            abort(404);
        }

        return view('update', compact('user'));
    }

    public function updateForm(Request $request, $id)
{
    $data = Job::find($id);

    if (!$data) {
        abort(404);
    }

    // Validate the form input
    $valid=$request->validate([
        'email'=> 'required|email|unique:jobs,email',
         'fullname' => 'required',
         'contact' => 'required',
         
        'date-of-birth' => 'required|date_format:Y-m-d',
         'gender' => 'required',
         'Linkedin' => 'nullable',
         'role' => 'required',
         'department' => 'required',
         'expertise'=>'nullable',
         'willing'=>'required',
         'technical_skills' => 'required',
         'years_experience' => 'required',
         
         'work_experience' => 'required',
         'degree'=>'required',
         'status' => 'required',
         'current_salary' => 'required',
         'expected_salary' => 'nullable',
         'cv_file' => 'required|mimes:pdf,doc,docx|max:2048',
         'transcript_file' => 'required|mimes:pdf,doc,docx|max:2048',
         'salary_slip' => 'nullable|mimes:pdf,doc,docx|max:2048',
         'why_join' => 'required',
         'captcha' => 'required|captcha',
     ]);



  
  $cvFile = $request->file('cv_file')->store('public');

  // Remove the 'public/' prefix from the file path to save in the database
  $cvFilePath = str_replace('public/', '', $cvFile);


  //transcript
  $transcript = $request->file('transcript_file')->store('public');

  // Remove the 'public/' prefix from the file path to save in the database
  $transcriptpath = str_replace('public/', '', $transcript);

  //salary slip
  $salarySlip = $request->file('salary_slip')->store('public');

  // Remove the 'public/' prefix from the file path to save in the database
  $salarySlippath = str_replace('public/', '', $salarySlip);

     
      $data->email=$valid['email'];
      $data->fullname=$valid['fullname'];
      $data->contact=$valid['contact'];
     
     $data->date_of_birth=Carbon::createFromFormat('Y-m-d', $valid['date-of-birth']);
      $data->gender=$valid['gender'];
      $data->linkedin=$valid['Linkedin'];
      $data->role=$valid['role'];
      $data->department=$valid['department'];
      $data->specific_skills=$valid['expertise'];
      $data->availibilty=$valid['willing'];
      $data->technical_skills=$valid['technical_skills'];
      $data->work_experience=$valid['work_experience'];
      $data->years_experience=$valid['years_experience'];
      $data->degree=$valid['degree'];
     
      $data->status=$valid['status'];
      $data->current_salary=$valid['current_salary'];
      $data->expected_salary=$valid['expected_salary'];
     
      $data->cv_file_path=$cvFilePath;
      $data->transcript_file_path=$transcriptpath;

      $data->salary_slip_file_path=$salarySlippath;
      $data->reason_to_join=$valid['why_join'];

      


      
      // $data->cv_file_path = $cvFilePath;

      $data->update();

      return redirect()->back()->with("success",'Thank you for submitting the form !');
}


public function approved($id)
    {
        $job = job::findOrFail($id);
        $job->app_status = 'shortlisted';
        $job->save();

        return redirect()->back();
    }

    public function shortlistedJobs()
    {
        $jobs = Job::where('app_status', 'shortlisted')
                ->where('hiring', 'rejected')
                ->where('emp_status','no')
                ->get();

        return view('layouts.shortlisted', compact('jobs'));
    }
    public function  shortlisted(){
        return view('layouts.shortlisted');   
     }

    //  public function  hiring(){
    //     return view('hiring');   
    //  }

     public function hired($id)
     {
        $job = job::findOrFail($id);
        $job->hiring = 'hired';
        $job->save();

        return redirect()->back();
     }

     public function hireList()
     {
         $jobs = Job::where('emp_status','internship')
        //  -> where('emp_status','internship')
         ->get();
 
         return view('layouts.hiring', compact('jobs'));
     }


     public function Categories(Request $request)
{
    $selectedCategories = $request->input('categories');
    $status = $request->has('status') ? 'disabled' : 'active';

    foreach ($selectedCategories as $category) {
        Category::updateOrCreate(
            ['name' => $category],
            ['status'=>$status]
        );
    }

    return redirect()->back()->with('success', 'Data inserted successfully.');
}


// public function fetchCategories()
// {
//     $categories = Category::select('name')
//         ->where('status', 'active')
//         ->groupBy('name')
//         ->orderByDesc('created_at')
//         ->pluck('name');

//     return view('index', ['categories' => $categories]);
// }

public function fetchCategories()
{
    $categories = Category::select('name', DB::raw('MAX(created_at) as max_created_at'))
        ->where('status', 'active')
        ->groupBy('name')
        ->orderByDesc('max_created_at')
        ->pluck('name');

    return view('index', ['categories' => $categories]);
}

public function showCategories()
{
    $activeCategories = Category::where('status', 'active')->pluck('name')->toArray();
    $categories = Category::pluck('name')->toArray();

    return view('layouts.Categories', ['activeCategories' => $activeCategories, 'categories' => $categories]);
}

public function WebDevelopers()
{
    $jobs = Job::where('role', 'Web Development')
        ->where('emp_status','job')
        ->get();

    return view('layouts.web', ['jobs' => $jobs]);
}



public function AppDevelopers()
{
    $jobs = Job::where('role', 'App Development')
         -> where('emp_status','job')

        ->get();

    return view('layouts.appDevelopment', ['jobs' => $jobs]);
}

public function HR()
{
    $jobs = Job::where('role', 'HR / Management')
        ->where('emp_status','job')
        ->get();

    return view('layouts.appDevelopment', ['jobs' => $jobs]);
}

public function QualityAssurance()
{
    $jobs = Job::where('role', 'Quality Assurance')
    ->where('emp_status','job')
        ->get();

    return view('layouts.quality-assur', ['jobs' => $jobs]);
}


public function marketing()
{
    $jobs = Job::where('role', 'Marketing')
         ->where('emp_status','job')
        ->get();

    return view('layouts.marketing', ['jobs' => $jobs]);
}


public function commerce()
{
    $jobs = Job::where('role', 'Commerce / Finance')
    ->where('emp_status','job')
        ->get();

    return view('layouts.commerce', ['jobs' => $jobs]);
}

public function project()
{
    $jobs = Job::where('role', 'Project Management')
    ->where('emp_status','job')
        ->get();

    return view('layouts.project', ['jobs' => $jobs]);
}

public function other()
{
    $jobs = Job::where('role', 'Other')
    ->where('emp_status','job')
        ->get();

    return view('layouts.other', ['jobs' => $jobs]);
}


public function Employee(Request $request,$id)
{
    // dd($request->all());
   $job = job::findOrFail($id);

   $job->emp_status = $request->input('status');

   $job->save();

   return redirect()->back();
}



public function hireForJOb($id)
{
    // dd($request->all());
   $job = job::findOrFail($id);

   $job->emp_status = 'job';

   $job->save();

   return redirect()->back();
}

// Send message to specific user based on User_id using realtionship
public function Message(Request $req){
    $message = new Message();
    $message->user_id = $req->input('user_id');
    $message->message = $req->input('message'); 
    $message->save();
    return redirect()->back();


}
// Delete message After # days

public function deleteExpiredMessages()
{
    $expirationDate = Carbon::now()->subDays(3);

    $expiredMessages = Message::where('created_at', '<=', $expirationDate)->get();

    foreach ($expiredMessages as $message) {
        $diffInDays = Carbon::parse($message->created_at)->diffInDays(Carbon::now());

        if ($diffInDays >= 3) {
            $message->delete();
        }
    }

    return redirect()->back()->with('success', 'Expired messages deleted successfully.');
}


// Message to All USer


public function MessageToAll(Request $request)
    {
        $message = $request->input('message');

        $users = User::all();

        foreach ($users as $user) {
            $newMessage = new Message();
            $newMessage->user_id = $user->id;
            $newMessage->message = $message;
            $newMessage->save();
        }

        // Additional logic or redirection after sending the message

        return redirect()->back()->with('messageSuccess', 'Message sent to all users.');
    }

}




