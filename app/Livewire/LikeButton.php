<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;
    public bool $liked = false;
    public int $likeCount = 0;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->likeCount = $post->likedByUsers()->count();
        $this->liked = Auth::check() && Auth::user()->likedPosts->contains($post->id);
    }

    public function toggleLike()
    {
        $user = Auth::user();
        if (!$user) return;

        if ($user->likedPosts()->where('post_id', $this->post->id)->exists()) {
            $user->likedPosts()->detach($this->post->id);
            $this->liked = false;
        } else {
            $user->likedPosts()->attach($this->post->id);
            $this->liked = true;
        }

        $this->likeCount = $this->post->likedByUsers()->count();
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
