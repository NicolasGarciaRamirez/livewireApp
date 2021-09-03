<di class="container text-center">
    <div class="d-flex justify-content-center flex-column">
        <div class="card">
            <div class="card-body">
                <div class="card-title">{{\Auth::user()->name}}</div>
                <div class="d-flex flex-column justify-content-center">
                
                    @foreach($messages as $message)
                        <div class="bg-primary rounded-pill text-white p-2">
                            {{ $message['body'] }}<br>
                            <small>{{ $message['user_emisor']['name'] }}</small>
                        </div>
                    @endforeach
               
                </div>
            </div>
            <div class="card-footer">
                <input placeholder="write message" wire:model="message_autenticate" />
                <img src="/images/flecha-correcta.png" width="15rem" wire:click="sendMessage( '{{$message_autenticate}}','{{\Auth::user()->id}}' )">
            </div>
        </div>
    </div>
</div>
