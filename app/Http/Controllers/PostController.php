<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index()
    {
        // Fetch all posts and comments
        $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        $comments = Http::get('https://jsonplaceholder.typicode.com/comments')->json();

        
        $commentCount = [];

        // Count the comments for each post
        foreach ($comments as $comment) {
            $postId = $comment['postId'];
            if (isset($commentCount[$postId])) {
                $commentCount[$postId]++;
            } else {
                $commentCount[$postId] = 1;
            }
        }

        // Add the comment count to each post
        foreach ($posts as &$post) {
            $postId = $post['id'];
            $post['comments_count'] = $commentCount[$postId] ?? 0;
        }

        
        return view('posts.index', ['posts' => $posts]);
    }
    public function show($id)
    {
        $post = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}")->json();
        $comments = Http::get("https://jsonplaceholder.typicode.com/comments?postId={$id}")->json();
        
        if (request()->expectsJson()) {
            return response()->json(['post' => $post, 'comments' => $comments]);
        }

        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }
}
