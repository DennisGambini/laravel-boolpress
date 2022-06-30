<h1>Congrats! Your post received a new comment!</h1>

<div>
    <h2>Post</h2>

    <div class="post">
        <div>{{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>

    <h2>Comment Preview</h2>

    <div class="comment">
        <div>{{$comment->title}}</div>
        <div>{{$comment->content}}</div>
    </div>
</div>

<p>Click <a href="http://127.0.0.1:8000/posts/{{$post->slug}}">HERE</a> to see the post</p>