@extends('layouts.post_layout')

@section('pageTitle', 'Update Post')

@section('mainContent')

<section class="post-create">

    <div class="container">
        <h1>Modify Post</h1>

        <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="insert title" value="{{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Post Content</label>
                <textarea name="content" id="content" class="form-control">{{$post->content}}</textarea>
            </div>


            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="published" name="published" {{$post->published == 1 ? 'checked' : ''}}>
              <label class="form-check-label" for="published">Publish now?</label>
            </div>

            {{-- immagine --}}
            <div class="mb-3">
                <label for="image" class="form-label">Upload Post Image</label>
                <input class="form-control" type="file" id="image" name="image">
                @if ($post->image)
                    <img id="imagePreview" src="{{asset("storage/{$post->image}")}}" alt="user post image">
                @else
                    <img id="imagePreview" src="" alt="no image set">
                @endif
                
            </div>


            {{-- categorie --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Category : </label>
                <select name="category_id" id="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

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


    
    <script src="{{asset('js/app.js')}}"></script>
</section>
    
@endsection