@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4>Recent</h4>
                                </div>
                                <div class="srch_bar">
                                    <div class="stylish-input-group">
                                        <input type="text" class="search-bar" placeholder="Search"></div>
                                </div>
                            </div>
                            <div class="inbox_chat">
                                @foreach($users as $user)
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"><img src="{{ asset('upload/img/user-profile.png')  }}" alt="{{ $user->name }}">
                                            </div>
                                            <p>{{ $user->name }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mesgs">
                            <div class="msg_history" v-chat-scroll>
                                <messagebox
                                        v-for="message,index in conversation.message"
                                        :key=message.index
                                        :msgtype=conversation.msgtype[index]
                                        :user=conversation.user[index]
                                        :time=conversation.time[index]
                                >
                                    @{{ message }}
                                </messagebox>
                            </div>
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <input v-model="message" @keyup.enter="sendMessage" type="text" class="write_msg"
                                           placeholder="Type a message"/>
                                    <button @click="sendMessage" class="msg_send_btn" type="button"><span
                                                class="glyphicon glyphicon-send"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
