<?php

namespace App\Providers;


use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Compose posts.index view with all posts
        View::composer('posts.index', function ($view) {
            $view->with('posts', Post::all());
        });

        // Compose posts.show view with a single post and its comments
        View::composer('posts.show', function ($view) {
            $post = Post::findOrFail($view->id);
            $view->with('post', $post)->with('comments', $post->comments);
        });

        // Compose posts.edit view with a single post for editing
        View::composer('posts.edit', function ($view) {
            $view->with('post', Post::findOrFail($view->id));
        });

        // Compose comments.manage view with all comments
        View::composer('comments.manage', function ($view) {
            $view->with('comments', Comment::all());
        });

        // Compose media.index view with all media files
        View::composer('media.index', function ($view) {
            $view->with('mediaFiles', Media::all());
        });
    }
}
