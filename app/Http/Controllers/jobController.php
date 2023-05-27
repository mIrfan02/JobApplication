<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Captcha;
use Illuminate\Http\Request;
use App\Models\job;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationConfirmation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Auth;
use Spatie\Permission\Models\Role;

class jobController extends Controller
{
    //
    public function index(){
        return view('index');
    }


    public function store(Request $request)
    {
    

        // dd($request->transcript_file);
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
 
         $data=new Job();
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
        
        //  addditioanl field insertion if user selected any internationl categories
         
        
        $data->company = $request->input('company');
        $data->project = $request->input('projects');
        $data->worktime = $request->input('worktime');
        $data->desc = $request->input('desc');

 
         
         // $data->cv_file_path = $cvFilePath;
          // Generate a random password
    $password = Str::random(8);

    // Hash the password
    $hashedPassword = Hash::make($password);
    // Add new User
    $user = new User();
    $user->name = $request->fullname;
    $user->email = $request->email;
    $user->password = $hashedPassword;
    $user->save();
    $user->assignRole('applier');

    $data->user_id = $user->id;
    $data->save();

    $emailData = [
        'password' => $password,
        'loginRoute' => route('userLogin'),
    ];

    $email = $valid['email']; 
        
        Mail::to($email)->send(new JobApplicationConfirmation($emailData));
         return redirect()->back()->with("success",'Thank you for submitting the form !');

}
public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => Captcha::img()
        ]);
    }



    public function showLoginForm()
    {
        return view('loginUser');
    }

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');
    
        // Retrieve the stored random password and status for the email
        $user = Job::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->back()->with('erroruser', 'Invalid email or password');
        }
    
        // Check if the provided password matches the stored hashed password
        if (Hash::check($password, $user->password)) {
            // Authentication passed
            // Redirect to the user dashboard and pass the user object to the view
            $user = Auth::user();
            return view('layouts.userdashboard', ['user' => $user]);
        } else {
            // Authentication failed
            return redirect()->back()->with('erroruser', 'Invalid email or password');
        }
    }
    



}