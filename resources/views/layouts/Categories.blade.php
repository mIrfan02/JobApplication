@extends('layouts.main')

@section('title', 'Categories  ')


@section('content')
<div class="container">
    
  <form action="{{ route('categories') }}" method="post">
    @csrf
    <div class="form-check">
        <label class="form-check-label" for="check1">
            <input type="checkbox" class="form-check-input" id="check1" name="categories[]" value="Web Development"
                @if(in_array('Web Development', $activeCategories)) checked @endif> Web Development
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="check2">
            <input type="checkbox" class="form-check-input" id="check2" name="categories[]" value="App Development"
                @if(in_array('App Development', $activeCategories)) checked @endif> App Development
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="check3">
            <input type="checkbox" class="form-check-input" id="check3" name="categories[]" value="Quality Assurance"
                @if(in_array('Quality Assurance', $activeCategories)) checked @endif> Quality Assurance
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="check4">
            <input type="checkbox" class="form-check-input" id="check4" name="categories[]" value="Marketing"
                @if(in_array('Marketing', $activeCategories)) checked @endif> Marketing
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="check5">
            <input type="checkbox" class="form-check-input" id="check5" name="categories[]" value="HR / Management"
                @if(in_array('HR / Management', $activeCategories)) checked @endif> HR / Management
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="check6">
            <input type="checkbox" class="form-check-input" id="check6" name="categories[]" value="Project Management"
                @if(in_array('Project Management', $activeCategories)) checked @endif> Project Management
        </label>
    </div>

    <div class="form-check">
    
    <label class="form-check-label" for="check9">
        <input type="checkbox" class="form-check-input" id="check9" name="categories[]" value="Commerce / Finance"
            @if(in_array('Commerce / Finance', $activeCategories)) checked @endif> Commerce / Finance
    </label>
</div>


    <div class="form-check">
        <label class="form-check-label" for="check7">
            <input type="checkbox" class="form-check-input" id="check7" name="categories[]" value="Other"
                @if(in_array('Other', $activeCategories)) checked @endif> Other
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label" for="check8">
            <input type="checkbox" name="status" value="disabled" class="form-check-input" id="check8">
            Disabled Selected Categories
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </div>


@endsection

