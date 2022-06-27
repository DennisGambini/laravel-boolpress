@extends('layouts.post_layout')

@section('pageTitle', $post->title)

@section('mainContent')

<section class="show-post">

    <div class="container">
        <h2>{{$post->title}}</h2>

        <div class="show-content">
            {{$post->content}}
        </div>

        <div class="show-image">
            <img src="{{asset('storage/'.$post->image)}}" alt="">
        </div>

        <div class="show-categories">
            Categories : 
            {{
            $post->category_id != null ? App\Category::find($post->category_id)->name : 'none'
            }}
        </div>

        <div class="show-tags">
            Tags : 
            <ul>
                @foreach($post->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
            </ul>
        </div>

        <div class="show-published">
            {{$post->published}}
        </div>

        <div class="show-slug">
            {{$post->slug}}
        </div>

        <div class="show-created">
            Cretaed : {{$post->created_at}}
        </div>

        <div class="show-updated">
            Updated: {{$post->updated_at}}
        </div>
    </div>

</section>
    
@endsection