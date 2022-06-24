@extends('layouts.categories')

@section('pageTitle', 'All Tags')

@section('mainContent')

<section class="all-tags">

    <div class="container">

        <h1>All Tags</h1>

        <div>
            <button class="mb-5">
                <a href="{{route('admin.tags.create')}}">Create New tag</a>
            </button>
        </div>
    
        <div class="row">
            @foreach ($tags as $item)

            <div class="col-3">

                <div class="tag-card">
                    
                    <div class="tag-name">
                        <span class="tag-span">Name : </span>
                        <a href="{{route('admin.tags.show', $item->id)}}">{{$item->name}}</a>
                    </div>

                    <div class="tag-id">
                        <span class="tag-span">ID : </span>{{$item->id}}
                    </div>

                    <div class="tag-btns">

                        <form action="{{route('admin.tags.destroy', $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Delete</button>
                        </form>

                        <button>
                            <a href="{{route('admin.tags.edit', $item->id)}}">Edit</a>
                        </button>

                    </div>

                </div>

            </div>
                
            @endforeach
        </div>

    </div>

</section>
    
@endsection