<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="css/main.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">


    <title>Application Form</title>
  
     
</head>
<body >
  
  @if(Session::has('success'))
  <div id="alertMessage" class="alert alert-success center">
   <p class="success-font">{{ Session::get('success') }} </p>
   
    </div>
@endif
 
    <div class="site">
        <div class="inner">
           <div class="left">
            <img class="circle" src="{{ asset('images/circle.png') }}" alt="">
            <div class="rec1"> </div>
            <div class="rec2"></div>
            
           </div>

           <div class="right">
            <img class="Ellipse" src="{{ asset('images/Ellipse 7.png') }}" alt="">
            <div class="round"> </div>
           </div>

           <div class="logo">
            <img src="{{ asset('images/alrighttech 1.png') }}" alt="">
           </div>


           <!-- <div class="dotted-box">


        
          </div> -->

          <div class="form-site">
            <div class="dot">

            </div>
            <div class="innner" data-aos="fade-up">
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data" class="container">
               @csrf
               {{-- @method('PUT') --}}
                <div class="content-wrapper">
                <h1>Come and Join Us!</h1>
    
                <img src="{{ asset('images/form-pic.jpeg') }}" alt=""class="center-image">
            </div>
           
            <div class="para">
              <p  >Kindly complete this form if you are an experienced <br> developer, a recent graduate, or an undergraduate who <br> satisfies the job criteria or is confident in your ability to <br> successfully pass the interview process</p>
              </div>
            <div class="input-group">
                <label for="email">Email <span class="asterick">*</span></label>
                 <input type="email" id="email" name="email" placeholder="Your Email" value="{{ $user->email }}">
                 
        </div>
        @error('email')
                  <span class="asterick error">{{$message}}  </span>   
                 @enderror
        <div class="input-group">
            <label for="name">Full Name <span class="asterick">*</span></label>
             <input type="text" id="name" name="fullname" placeholder="Your Name"value="{{ $user->fullname }}">
         </div>
         @error('fullname')
         <span class="asterick error">{{$message}}  </span>   
        @enderror
         <div class="rectangle"></div>

         <div class="rect7"></div>
         <div class="input-group">
            <label for="contact">Contact Number <span class="asterick">*</span></label>
             <input type="text" id="Contact" name="contact" placeholder="Your answer" value="{{ $user->contact }}">
         </div>
         @error('contact')
         <span class="asterick error">{{$message}}  </span>   
        @enderror
         <div class="sidebyside">
            <div class="input-group dob" >
                <label for="dob">Date of Birth <span class="asterick">*</span></label>
                 <input type="date" id="dob" name="date-of-birth" placeholder="mm/dd/yyyy" value="{{ $user->date_of_birth }}">
                 @error('date-of-birth')
                 <span class="asterick error dob-error" >{{$message}}  </span>   
                @enderror
                </div>
             
            
             <div class=" gender-check" >
                <label for="gender">Gender  <span class="asterick">*</span></label>
                 <input type="radio" id="gender" name="gender" value="male"  {{ $user->gender === 'male' ? 'checked' : '' }}> Male
                 <input type="radio" id="gender" name="gender" value="female" {{ $user->gender === 'female' ? 'checked' : '' }}> Female
                 @error('gender')
             <span class="asterick error gender-error">{{$message}}  </span>   
            @enderror
             </div>
            
             
         </div>
        

           

         
         <div class="input-group">
            <label for="Linkedin">Linkedin Profile Link </label>
             <input type="text" id="Linkedin" name="Linkedin" placeholder="Your answer" value="{{ $user->linkedin }}">
         </div>
    
         <div class="input-group mb-3">
            <label for="role-interest">In which role you are interested? <span class="asterick">*</span></label>
            <select id="role-interest" name="role" class="dropdown" value="{{ $user->role }}">
              <option value="">categories</option>
              <option value="web-development"  {{ $user->role === 'web-development' ? 'selected' : '' }}>Web Development</option>
              <option value="app-development"  {{ $user->role === 'app-development' ? 'selected' : '' }}>App Development</option>
              <option value="quality-assurance"  {{ $user->role === 'quality-assurance' ? 'selected' : '' }}>Quality Assurance</option>
              <option value="marketing"  {{ $user->role === 'marketing' ? 'selected' : '' }}>Marketing</option>
              <option value="hr-management"  {{ $user->role === 'hr-management' ? 'selected' : '' }}>HR / Management</option>
              <option value="commerce-finance"  {{ $user->role === 'commerce-finance' ? 'selected' : '' }}>Commerce / Finance</option>
              <option value="project-management"  {{ $user->role === 'project-management' ? 'selected' : '' }}>Project Management</option>
              <option value="other" {{ $user->role === 'other' ? 'selected' : '' }} >Other</option>
            </select>
            </div>
            @error('role')
            <span class="asterick error">{{$message}}  </span>   
           @enderror
          
            <div class="input-group mb-3">
                <label for="department-interest">In which Department you are applying? <span class="asterick">*</span></label>
                <select id="department-interest" name="department" value="{{ $user->department }}" >
                  <option value="">categories</option>
                  <option value="php-laravel" {{ $user->department === 'php-laravel' ? 'selected' : '' }}>PHP Laravel</option>
                  <option value="mern-stack" {{ $user->department === 'mern-stack' ? 'selected' : '' }}>MERN Stack</option>
                  <option value="wordpress" {{ $user->department === 'wordpress' ? 'selected' : '' }}>WordPress</option>
                  <option value="wordpress-backend" {{ $user->department === 'wordpress-backend' ? 'selected' : '' }}>WordPress Backend / WP Plugin Customizations</option>
                  <option value="web3-metaverse" {{ $user->department === 'web3-metaverse' ? 'selected' : '' }}>Web 3 / Metaverse</option>
                  <option value="artificial-intelligence" {{ $user->department === 'artificial-intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                  <option value="flutter" {{ $user->department === 'flutter' ? 'selected' : '' }}>Flutter</option>
                  <option value="react-native" {{ $user->department === 'react-native' ? 'selected' : '' }}>React Native</option>
                  <option value="uiux" {{ $user->department === 'uiux' ? 'selected' : '' }}>UIUX (Figma)</option>
                  <option value="designing" {{ $user->department === 'designing' ? 'selected' : '' }}>Designing (Figma/Illustrator/ Photoshop/XD)</option>
                  <option value="quality-assurance" {{ $user->department === 'quality-assurance' ? 'selected' : '' }}>Quality Assurance</option>
                  <option value="marketing-finance" {{ $user->department === 'marketing-finance' ? 'selected' : '' }}>Marketing/Finance</option>
                  <option value="human-resource" {{ $user->department === 'phuman-resource' ? 'selected' : '' }}>Human Resource</option>
                  <option value="python-django-flask" {{ $user->department === 'python-django-flask' ? 'selected' : '' }}>Python / Django / Flask</option>
                  <option value="opencv" {{ $user->department === 'opencv' ? 'selected' : '' }}>OpenCV</option>
                  <option value="nlp" {{ $user->department === 'nlp' ? 'selected' : '' }}>NLP</option>
                  <option value="chatbots-dialogflow-nlp" {{ $user->department === 'chatbots-dialogflow-nlp' ? 'selected' : '' }}>Chatbots / DialogFlow / NLP</option>
                  <option value="scrapping" {{ $user->department === 'scrapping' ? 'selected' : '' }}>Scrapping ( Algo/ Scrapy/BeautifulSoup)</option>
                  <option value="Block Chain" {{ $user->department === 'Block Chain' ? 'selected' : '' }}>Block Chain</option>
                  <option value="other" {{ $user->department === 'other' ? 'selected' : '' }}>Other</option>
                </select>
        
                </div>
                @error('department')
            <span class="asterick error">{{$message}}  </span>   
           @enderror
                <div class="ellipse9"></div>
    
                <div class="input-group mb-3">
    
                    <label for="expertise">Do you have expertise in any of the specific skills listed below?</label>
            <select id="expertise" name="expertise" value="{{ $user->specific_skills }}">
                <option value="">categories</option>
    
              <option value="UX Designer" {{ $user->specific_skills === 'UX Designer' ? 'selected' : '' }}>UX Designer</option>
              <option value="DevOps Engineers" {{ $user->specific_skills === 'DevOps Engineers' ? 'selected' : '' }}>DevOps Engineers</option>
              <option value="Solution Architect" {{ $user->specific_skills === 'Solution Architect' ? 'selected' : '' }}>Solution Architect</option>
              <option value="Data engineers" {{ $user->specific_skills === 'Data engineers' ? 'selected' : '' }}>Data engineers</option>
              <option value="QA automation engineers"  {{ $user->specific_skills === 'QA automation engineers' ? 'selected' : '' }} >QA automation engineers</option>
              <option value="Java engineers" {{ $user->specific_skills === 'Java engineers' ? 'selected' : '' }}>Java engineers</option>
    <option value="C++ engineers" {{ $user->specific_skills === 'C++ engineers' ? 'selected' : '' }}>C++ engineers</option>
    <option value="iOS Engineer" {{ $user->specific_skills === 'iOS Engineer' ? 'selected' : '' }}>iOS Engineer</option>
    <option value="Golang engineers" {{ $user->specific_skills === 'Golang engineers' ? 'selected' : '' }}>Golang engineers</option>
    <option value="Salesforce Engineers" {{ $user->specific_skills === 'Salesforce Engineers' ? 'selected' : '' }}>Salesforce Engineers</option>
    <option value="SAP Developer" {{ $user->specific_skills === 'SAP Developer' ? 'selected' : '' }}>SAP Developer</option>
    <option value="Tableau engineers" {{ $user->specific_skills === 'Tableau engineers' ? 'selected' : '' }}>Tableau engineers</option>
    <option value="SAP Functional Engineer" {{ $user->specific_skills === 'SAP Functional Engineer' ? 'selected' : '' }}>SAP Functional Engineer</option>
    <option value="Front End engineers (JavaScript, React Native)" {{ $user->specific_skills === 'Front End engineers (JavaScript, React Native)' ? 'selected' : '' }}>Front End engineers (JavaScript, React Native)</option>
    <option value="Full stack engineers (JavaScript, Node.js & React)" {{ $user->specific_skills === 'Full stack engineers (JavaScript, Node.js & React)' ? 'selected' : '' }}>Full stack engineers (JavaScript, Node.js & React)</option>
    <option value="Kotlin engineers" {{ $user->specific_skills === 'Kotlin engineers' ? 'selected' : '' }}>Kotlin engineers</option>
    <option value="Django engineers" {{ $user->specific_skills === 'Django engineers' ? 'selected' : '' }}>Django engineers</option>
    <option value="Blockchain Solidity engineers" {{ $user->specific_skills === 'Blockchain Solidity engineers' ? 'selected' : '' }}>Blockchain Solidity engineers</option>
    <option value="Blockchain Rust engineers" {{ $user->specific_skills === 'Blockchain Rust engineers' ? 'selected' : '' }}>Blockchain Rust engineers</option>
    <option value="Product Manager" {{ $user->specific_skills === 'Product Manager' ? 'selected' : '' }}>Product Manager</option>
    <option value="Virtual Assistant" {{ $user->specific_skills === 'Virtual Assistant' ? 'selected' : '' }}>Virtual Assistant</option>
    <option value="Project Manager" {{ $user->specific_skills === 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
    <option value="Business Development" {{ $user->specific_skills === 'Business Development' ? 'selected' : '' }}>Business Development</option>
    <option value="Customer Service" {{ $user->specific_skills === 'Customer Service' ? 'selected' : '' }}>Customer Service</option>
    <option value="Other" {{ $user->specific_skills === 'Other' ? 'selected' : '' }}>Other:</option>
    
            </select>
            
                    </div>
    
                    <div class="input-group mb-3">
    
                        <label for="willing">This is an in-house opportunity, are you willing to come to our office  <span class="asterick">*</span></label>      
                        <select id="willing" name="willing" value="{{ $user->availibilty }}">
                            <option value="" selected>Choose</option>
                            <option value="yes" {{ $user->availibilty === 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ $user->availibilty === 'No' ? 'selected' : '' }}>No</option>
                            <option value="Depend on timing" {{ $user->availibilty === 'Depend on timing' ? 'selected' : '' }}>Depend on timing</option>
                            <option value="Remote Referrable" {{ $user->availibilty === 'Remote Referrable' ? 'selected' : '' }}>Remote Referrable</option>
                            <option value="Only remotely available" {{ $user->availibilty === 'Only remotely available' ? 'selected' : '' }}>Only remotely available</option>
                        
                        </select>
                        
                        </div>
                        @error('willing')
                        <span class="asterick error">{{$message}}  </span>   
                       @enderror
                        
                        <div class="input-group mb-3">
    
                            <label for="technical_skills"> Technical Skills: <span class="asterick">*</span></label>
                           <input type="text" placeholder="Your answer" name="technical_skills" value="{{ $user->technical_skills }}">
                          </div>
                          @error('technical_skills')
                             <span class="asterick error">{{$message}}  </span>   
                         @enderror
    
    
                          <div class="input-group mb-3">
      
                            <label for="work_experience">Please describe your work experience: <span class="asterick">*</span></label>
                            <input id="work_experience" placeholder="Your answer"  name="work_experience" value="{{ $user->work_experience }}">
                          </div>
                          @error('work_experience')
                          <span class="asterick error">{{$message}}  </span>   
                      @enderror
    
                          <div class="input-group mb-3">
    
                            <label for="years_of_experience">Work Experience (In Years) <span class="asterick">*</span></label>
                              <select id="years_of_experience" name="years_experience" value="{{ $user->years_experience }}">
                             <option value="" selected>Choose</option>
    
                             <option value="" selected>Choose</option>
                             <option value="0" {{ $user->years_experience === '0' ? 'selected' : '' }}>Zero / Nil</option>
                             <option value="1" {{ $user->years_experience === '1' ? 'selected' : '' }}>&lt;1</option>
                             <option value="2" {{ $user->years_experience === '2' ? 'selected' : '' }}>2</option>
                             <option value="3" {{ $user->years_experience === '3' ? 'selected' : '' }}>3</option>
                             <option value="4" {{ $user->years_experience === '4' ? 'selected' : '' }}>4</option>
                             <option value="4+" {{ $user->years_experience === '4+' ? 'selected' : '' }}>4+</option>
                              </select>
                            </div>   
                            @error('years_experience')
                            <span class="asterick error">{{$message}}  </span>   
                        @enderror
    
                            <div class="input-group mb-3">
                                <label for="degree_program">Degree Program and Year: <span class="asterick">*</span></label>
                                <input type="text" id="degree_program" placeholder="Your answer"   name="degree" value="{{ $user->degree}}">
                              </div>    
                              @error('degree')
                              <span class="asterick error">{{$message}}  </span>   
                          @enderror 
            
                              <div class="input-group mb-3">
     
                                <label for="employment_status">Are you already working somewhere? <span class="asterick">*</span></label>
                                
                                <select id="employment_status" name="status" value="{{ $user->status }}">
    
                             <option value="" selected>Choose</option>
                             <option value="yes" {{ $user->status === 'yes' ? 'selected' : '' }}>Yes</option>
                             <option value="no" {{ $user->status === 'no' ? 'selected' : '' }}>No</option>
                                </select>
                              
                              </div>
                              @error('status')
                              <span class="asterick error">{{$message}}  </span>   
                          @enderror 
            
    
                              <div class="input-group mb-3">
                                <label for="current_salary">How much current Salary/Stipend (PKR) are you drawing? <span class="asterick">*</span></label>
                                <input type="text" id="current_salary" name="current_salary"  placeholder="Your answer" value="{{ $user->current_salary }}">
                              </div>
                              @error('current_salary')
                              <span class="asterick error">{{$message}}  </span>   
                          @enderror
    
                              <div class="input-group mb-3">
                                <label for="expected_salary">What are your expectations regarding the job salary or compensation for a paid or unpaid internship based on your skills and caliber? </label>
                                <input type="text" id="expected_salary" name="expected_salary"  placeholder="Your answer" value="{{ $user->expected_salary }}">
                              </div>
                             
                              <div class="corner"></div>
                              <div class="upload-files">
                              <label for="cv">Upload Your Updated CV <span class="asterick">*</span></label>
    
                              <div class="file-upload">
                                <input type="file" id="file-input" name="cv_file" />
                                <div id="drag-drop-area">
                                    <i class="fa fa-arrow-circle-o-up" id="arrow" aria-hidden="true" onclick="document.getElementById('file-input').click()" ></i>
                                  <button id="browse-button-cv" class="browse-button" >Browse Files</button>
    
                                  <span class="drag-drop-text">Drag and drop files here</span>
                                  <p id="file-name" class="file-size">{{ $user->cv_file_path }}</p>
                                </div>
                              </div>
                            </div>
                            @error('cv_file')
                            <span class="asterick error">{{$message}}  </span>   
                        @enderror
    
    
                             <div class="upload-files">
                                <label for="file-input">Upload your Transcript/Semester result if you are graduate/undergraduate: <span class="asterick">*</span></label>

                               
                                  
                                  

                                <div class="file-upload">
                                  <input type="file" id="transcript"  name="transcript_file" />
                                  <div id="drag-drop-areaa">
                                      <i class="fa fa-arrow-circle-o-up" id="arrow" aria-hidden="true" onclick="document.getElementById('transcript').click()" ></i>
                                    <button id="browse-button-transcript" class="browse-button" >Browse Files</button>
      
                                    <span class="drag-drop-text">Drag and drop files here</span>
                                    <p id="file-nameee" class="file-size">{{ $user->transcript_file_path }}</p>
                                  </div>
                                </div>
                              </div>
                              @error('transcript_file')
                              <span class="asterick error">{{$message}}  </span>   
                          @enderror
    
                              <div class="upload-files">
                                <label for="file-input">Please provide a copy of your most recent salary slip:</label>
      
                                <div class="file-upload">
                                    <input type="file" id="salary-slip" name="salary_slip"  />
                                    <div id="drag-drop-area-salary">
                                      <i class="fa fa-arrow-circle-o-up" id="arrow" aria-hidden="true" onclick="document.getElementById('salary-slip').click()"></i>
                                      <button id="browse-button-salary" class="browse-button" >Browse Files</button>
                                      <span class="drag-drop-text">Drag and drop files here</span>
                                      <p id="file-name-salary" class="file-size">{{ $user->salary_slip_file_path }}</p>
                                    </div>
                                  </div>
                                  
                              </div>
                              <div class="input-group mb-3">
                                <label for="why_join">Why do you want to join Alright Tech? <span class="asterick">*</span> </label>
                                <input type="text"id="why_join" name="why_join" placeholder="Your answer" value="{{ $user->reason_to_join }}">
                              </div>
                              @error('why_join')
                              <span class="asterick error">{{$message}}  </span>   
                          @enderror
                            
                          <div class="input-group mb-3">
                            <span class="captcha-image">{!! Captcha::img() !!}</span> 
                            <button type="button" id="captcha_btn" class="btn btn-success refresh-button"><i class="fa fa-refresh my-icon" aria-hidden="true"></i></button>
                            <input id="captcha" type="text" class="form-control"  name="captcha">
                        </div>
                        @error('captcha')
                        <span class="asterick error">{{$message}}  </span>   
                    @enderror

                              <div class="form-btn">
                                <input type="submit" value="Update" class="submit" id="btn">
                                {{-- <input type="reset" value="Clear" class="submit" id="btn"> --}}
                                <button type="button" class="submit" id="btn"><a href="{{route('admin_dashboard')}}">Back</a></button>
                              </div>
    
    
                              <div class="captcha">
                                <img src="{{ asset('images/capcha.png') }}" alt="" id="capcha">
                                <p>reCAPTCHA
                                    <a href="https://policies.google.com/privacy?hl=en" target="_blank">Privacy Terms</a>
                                </p>
                                
                              </div>
    
                              <div class="privacy-policy">
                                <p>This content is neither created nor endorsed by Google. <a href="https://docs.google.com/forms/u/0/d/e/1FAIpQLSeYMIb49iITKjmpEMmLkS0plL0vB5cQWa04SYa2PHlajGv6dQ/reportabuse?source=https://docs.google.com/forms/d/e/1FAIpQLSeYMIb49iITKjmpEMmLkS0plL0vB5cQWa04SYa2PHlajGv6dQ/viewform?usp%3Dsend_form" target="_blank"> 
                                    Report Abuse </a>-
                                     <a href="https://policies.google.com/terms" target="_blank"> Terms of Service </a>- 
                                     <a href="https://policies.google.com/privacy" target="_blank"> Privacy Policy </a></p>
                              </div>

                              <div class="rect-below"></div>
                              <div class="rect-below2"></div>
                            </form>
        </div>
    </div>
    


           
        </div>
    </div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('.refresh-button').click(function() {
          $.ajax({
              type: 'get',
              url: '{{ route('refreshCaptcha') }}',
              success:function(data) {
                  $('.captcha-image').html(data.captcha);
              }
          });
      });
  });
</script>

<script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>



<script src="{{ asset('js/transcript.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
      AOS.init({
   duration: 1000
});

   </script>
  </body>
</html>