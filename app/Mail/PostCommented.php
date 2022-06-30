<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;
use App\Comment;

class PostCommented extends Mailable
{
    use Queueable, SerializesModels;

    public $post = null;
    public $comment = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($passed_post_id, $passed_comment_id)
    {
        $passed_post = Post::findOrFail($passed_post_id);
        $passed_comment = Comment::findOrFail($passed_comment_id);
        $this->post = $passed_post;
        $this->comment = $passed_comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.post_commented', compact($this->post));
    }
}
