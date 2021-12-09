<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

//    public $comment = [
//        [
//            'body' => 'This is some text within a card body.',
//            'created_at' => '3 min age',
//            'creator' => 'admin'
//        ]
//    ];

//    public $comment;

    public $newComment;
    public $image;
    public $ticketId = 1;

    protected $listeners = [
        'fileUpload'        => 'handleFileUpload',
        'ticketSelected'
    ];

    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }

//    public function mount()
//    {
//        $this->newComment = 'I\'m Mr.Ruby';
//        $initialComments = \App\Models\Comment::latest()->paginate(2);
//        $this->comment = $initialComments;
//    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'newComment' => 'required|max:255',
        ]);
    }

    public function addComment()
    {
//        if ($this->newComment == '') {
//            return;
//        }
        $this->validate([
           'newComment' => 'required',
        ]);
        $image = $this->storeImage();
        $createComment = \App\Models\Comment::create([
            'body'              => $this->newComment,
            'user_id'           => 1,
            'image'             => $image,
            'support_ticket_id' => $this->ticketId,
        ]);
//        $this->comment->prepend($createComment);
//        array_unshift($this->comment, [
//            'body'          => $this->newComment,
//            'created_at'    => Carbon::now()->diffForHumans(),
//            'creator'       => 'admin'
//        ]);
        $this->newComment = '';
        $this->image = '';
        session()->flash('message', 'Comment added successfully');
//        $this->comment[] =[
//            'body' => 'This is some text within a card body number 1.',
//            'created_at' => '1 min age',
//            'creator' => 'admin number 1'
//        ];
    }

    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }

        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }

    public function remove($commentId)
    {
        $commentRemove = \App\Models\Comment::find($commentId);
        Storage::disk('public')->delete($commentRemove->image);
        $commentRemove->delete();
//        $this->comment = $this->comment->where('id', '!=', $commentId);
//        $this->comment = $this->comment->except($commentId);
        session()->flash('message', 'Comment delete successfully');
//        dd($commentRemove);
    }

    public function render()
    {
        return view('livewire.comment', [
            'comment' => \App\Models\Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(2),
        ]);
    }
}
