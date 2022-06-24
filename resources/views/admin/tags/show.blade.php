@extends('layouts.tags')

@section('pageTitle', 'Tag - '.$tag->name)

@section('mainContent')

<section class="show-tag">

    <div class="container">

        <h2>{{$tag->name}}</h2>
    
        <div>
            <span class="red">NAME : </span>
            <span>{{$tag->name}}</span>
        </div>
        <div>
            <span class="red">ID : </span>
            <span>{{$tag->id}}</span>
        </div>
        <div>
            <span class="red">SLUG : </span>
            <span>{{$tag->slug}}</span>
        </div>
        <div>
            <span class="red">CREATED : </span>
            <span>{{$tag->created_at}}</span>
        </div>
        <div>
            <span class="red">UPDATED : </span>
            <span>{{$tag->updated_at}}</span>
        </div>
        <div class="tag-btns">
            <button>
                <a href="{{route('admin.tags.edit', $tag->id)}}">Modify</a>
            </button>
            <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>

    </div>


</section>
    
@endsection