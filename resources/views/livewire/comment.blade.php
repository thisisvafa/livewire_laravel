
    <div class="shadow rounded p-2">
        {{--            <div class="input-group mb-3">--}}
        {{--                <input type="text" class="form-control" placeholder="insert something" wire:model="newComment">--}}
        {{--                <input type="text" class="form-control" placeholder="insert something" wire:model.debounce.500ms="newComment">--}}
        {{--                <input type="text" class="form-control" placeholder="insert something" wire:model.lazy="newComment">--}}
        {{--                <div class="input-group-append">--}}
        {{--                    <button class="btn btn-outline-secondary" wire:click="addComment">Add</button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload File</label>
            <input class="form-control" type="file" id="image" wire:change="$emit('fileChoose')">
            @if($image)
                <img class="rounded mx-auto d-block my-3" src="{{$image}}" width="200">
            @endif
        </div>
        <form class="input-group mb-3" wire:submit.prevent="addComment">
            <input type="text" class="form-control" placeholder="insert something" wire:model="newComment">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Add</button>
            </div>
        </form>

        <div class="my-2">
            @error('newComment')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        @foreach($comment as $comments)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="float-start">
                        {{$comments->creator->name}}
                        {{$comments->created_at->diffForHumans()}}
                    </div>
                    <div class="float-end">
                        <a style="cursor: pointer" wire:click="remove({{$comments->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($comments->image)
                        {{--                            <img src="{{'storage/'.$comments->image}}" class="rounded mx-auto d-block shadow" width="200">--}}
                        <img src="{{$comments->imagePath}}" class="rounded mx-auto d-block shadow" width="200">
                    @endif
                    {{$comments->body}}

                </div>
            </div>
        @endforeach

        {{$comment->links('pagination-links')}}
    </div>


<script>
    window.Livewire.on('fileChoose', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload',reader.result);
        }
        reader.readAsDataURL(file);
        // console.log(file.files[0])
    })
</script>
