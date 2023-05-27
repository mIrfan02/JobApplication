@extends('layouts.main')

@section('title', 'Shorlisted Candidates')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Recent Shorlisted Applicants</p>
          <div class="table-responsive">
         
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
              <thead>
                <tr>
          <th>Sr.No</th>
         <th>Email</th>
        <th>Fullname</th>
        <th>Contact</th>
        {{-- <th>Address</th> --}}
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>LinkedIn</th>
        <th>Role</th>
        <th>Department</th>
        <th>Specific Skills</th>
        <th>Availability</th>
        <th>Technical Skills</th>
        <th>Work Experience</th>
        <th>Years of Experience</th>
        <th>Degree</th>
        {{-- <th>University</th> --}}
        {{-- <th>CGPA</th> --}}
        {{-- <th>Semester</th> --}}
        <th>Status</th>
        <th>Current Salary</th>
        <th>Expected Salary</th>
        <th>CV </th>
        <th>Transcript </th>
        <th>Salary Slip File Path</th>
        <th>Reason to Join</th>
        <th>Actions</th>

                   
                </tr>
              </thead>
              <tbody>
            
                @foreach($jobs as $job)
                <tr>
                  <td>{{ $job->id }}</td>

                    <td>{{ $job->email }}</td>
                    <td>{{ $job->fullname }}</td>
                    <td>{{ $job->contact }}</td>
                    {{-- <td>{{ $job->address }}</td> --}}
                    <td>{{ $job->date_of_birth }}</td>
                    <td>{{ $job->gender }}</td>
                    <td>{{ $job->linkedin }}</td>
                    <td>{{ $job->role }}</td>
                    <td>{{ $job->department }}</td>
                    <td>{{ $job->specific_skills }}</td>
                    <td>{{ $job->availibilty }}</td>
                    <td>{{ $job->technical_skills }}</td>
                    <td>{{ $job->work_experience }}</td>
                    <td>{{ $job->years_experience }}</td>
                    <td>{{ $job->degree }}</td>

                    <td>{{ $job->status }}</td>
                    <td>{{ $job->current_salary }}</td>
                    <td>{{ $job->expected_salary }}</td>
                    <td> <a href="{{ asset('storage/' . $job->cv_file_path) }}" target="_blank">Download CV</a></td> 
                    <td> <a href="{{ asset('storage/' . $job->transcript_file_path) }}" target="_blank">Download Transcript</a></td> 
                    <td> <a href="{{ asset('storage/' . $job->salary_slip_file_path) }}" target="_blank">Download Salary Slip</a></td> 
    
                    <td>{{ $job->reason_to_join }}</td>
                    <td>
                      <button class="email-button " id="myBtn" onclick="modalopen('{{ $job->email }}')" data-email="{{ $job->email }}"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
                      <button class="delete-btn">  <a href="{{ url('/delete', $job->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a></button>
                      <button class="update-btn">  <a href="{{ url('/edit', $job->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                      
                      {{-- <form action="{{ route('hired', $job->id) }}" method="POST" cl>
                        @csrf
                     <button type="submit" id="cmp" class="select-btn"> Hire For Internship</button>
                   
                    
                    </form> --
                    <form action="{{ route('employee', $job->id) }}" method="POST">
                      @csrf

                    <button type="submit" id="cmp" class="select-btn">  Select For Job</button>
                  </form> --}}
                  <form id="myForm" action="{{ route('employee', $job->id) }}" method="post">
                    @csrf
                    <label for=""> you want this person internee or employee?</label>
                    <input type="hidden" id="status" value="" name="status">
                    <select id="myDropdown"  onchange="submitForm(this)">
                        <option value="">Select an item</option>
                        <option value="internship">internship</option></option>
                        <option value="Job">Job</option>
                  
                        
                        <!-- Add more options as needed -->
                    </select>
                    {{-- <div style="margin-top: 8px;">
                    <button type="submit" id="cmp" class="select-btn"> Submit</button>
                  </div> --}}
                </form>

                      
                    </td>
                </tr>
                @endforeach
                  
            </tbody>
            </table>
            {{-- <div class="pagination">
              <!-- Display the pagination links -->
              {{ $jobs->links() }} 
            </div>
            --}}
        
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function submitForm(val){
      $('#status').val(val.value);
      setTimeout(() => {
// console.log(th/is.value)
        $('#myForm').submit()
      }, 500);
    }
    //  $(document).ready(function() {
    //         // Handle the dropdown change event
    //         $('#myDropdown').change(function() {
    //             var selectedItem = $(this).val();

    //             // Submit the form if an item is selected
    //             if (selectedItem !== '') {
    //                 $('#myForm').submit();
    //             }
    //         });
    //     });
   
  </script>
@endsection
