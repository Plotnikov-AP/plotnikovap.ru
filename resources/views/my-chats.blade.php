<x-main-layout>
    <x-slot name="title">Мой тестовый чат</x-slot>
    <x-slot name="content">
        <div class="chats">
            <div class="wrap-space-between">
                <div class="h2">
                    Тестовый самописный чат, прошу сильно не пинать)
                </div>
                <div>
                    <x-my-modal-form-new-chat />
                    <button class="button_chat" onclick="button_show_modal_form_new_chat()">Создать чат</button>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- @if ($errors->any())                      
            <script>                                  
                window.onload = function() {          
                    button_show_modal_form_new_chat();
                }                                     
            </script>
            @endif -->
            @foreach ($chats as $chat)
                <x-my-theme-chat id="{{ $chat->id }}" author="{{ $chat->author }}" theme="{{ $chat->theme }}" access="{{ $chat->access }}" data="{{ $chat->created_at }}" chatLikeYes="{{ $chat->yes }}" chatLikeNo="{{ $chat->no }}" count="{{ $chat->count }}" />
            @endforeach
        </div>
    </x-slot>
</x-main-layout>