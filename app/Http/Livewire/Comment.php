<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public $comment;
    public $isEditing = false;
    public $isReplying = false;
    public $replyingTo;
    public $showOptions;
    public $editState = '';

    protected $listeners = ['refreshComponent' => '$refresh'];
    
    public function startEditing($commentId)
    {
        if ($this->comment->id == $commentId && Auth::id() === $this->comment->user_id) {
            $this->isEditing = true;
            $this->editState = $this->comment->body;
        }
    }

    public function updateComment()
    {
        if (Auth::id() === $this->comment->user_id) {
            $this->validate([
                'editState' => 'required|string|min:3',
            ]);

            $this->comment->update([
                'body' => $this->editState,
            ]);

            $this->isEditing = false;
            $this->emit('refreshComponent');
        }
    }

    public function deleteComment()
    {
        if (Auth::id() === $this->comment->user_id) {
            $this->comment->delete();
            $this->emit('refreshComponent');
        }
    }

    public function startReplying($commentId)
    {
        $this->isReplying = true;
        $this->replyingTo = $commentId;
    }
    
    
    public function render()
    {
        return view('livewire.comment');
    }
}
