@extends('layouts.post_layout')

@section('pageTitle', 'Create New Post')

@section('mainContent')

<section class="post-create">

    <div class="container">
        <h1>Create a new post</h1>

        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="insert title">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Post Content</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>


            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="published" name="published">
              <label class="form-check-label" for="published">Publish now?</label>
            </div>

            {{-- immagine --}}
            <div class="form-group mb-3">
                <label for="image" class="form-label">Upload Post Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            {{-- categories --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Category : </label>
                <select name="category_id" id="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- tags --}}
            <div class="form-group mb-3">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}} id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
                        <label class="form-check-label"  for="{{$tag->slug}}">{{$tag->name}}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>

    </div>


    

</section>
    
@endsection