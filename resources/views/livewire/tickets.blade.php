
<div class="shadow rounded p-2">
    <h2 class="mb-3">Support Tickets</h2>
    @foreach($tickets as $ticket)
        <div class="card mb-1" wire:click="$emit('ticketSelected', {{$ticket->id}})">
            <div class="card-body {{$active == $ticket->id ? 'bg-light' : ''}}">
                {{$ticket->question}}
            </div>
        </div>
    @endforeach
</div>
