@extends('layouts.tags')

@section('pageTitle', 'Edit - '.$tag->name)

@section('mainContent')

<section class="edit-tags">

    <div class="container">
        <h2>Edit Tag</h2>

        <form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tag Title</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="insert tag name" value="{{$tag->name}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>

</section>
    
@endsection