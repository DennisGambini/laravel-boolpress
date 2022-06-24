@extends('layouts.tags')

@section('pageTitle', 'Create New Tag')

@section('mainContent')

<section class="create-tags">

    <div class="container">
        <h2>Create a New Tag</h2>

        <form action="{{route('admin.tags.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Tag Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="insert tag name" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>

</section>
    
@endsection