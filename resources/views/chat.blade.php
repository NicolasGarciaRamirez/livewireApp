@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <span>Hi {{ \Auth::user()->name }}!!</span>
                <h2>Messages</h2>

                <div class="clearfix" v-for="message in messages"> 
                    <!-- @foreach($messages as $message) -->
                        @{{ message.user.name}} : @{{ message.message }}
                    <!-- @endforeach -->
                </div>

                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Type you Message here..." v-model="newMessage" @keydown.enter="sendMessage" />
                    <button class="btn bg-primary text-white" @click="sendMessage">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection