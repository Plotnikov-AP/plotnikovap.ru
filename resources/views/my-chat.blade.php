<x-main-layout>
    <x-slot name="title">Мой тестовый чат</x-slot>
    <x-slot name="content">
        <div class="chat">
            <x-my-theme-chat id="{{ $chat->id }}" author="{{ $chat->author }}" theme="{{ $chat->theme }}" access="{{ $chat->access }}" data="{{ $chat->created_at }}" chatLikeYes="{{ $chat->yes }}" chatLikeNo="{{ $chat->no }}" count="{{ $chat->count }}" />
            <x-my-modal-form-new-message>                                                                                  
                <x-slot name="id_chat">{{ $chat->id }}</x-slot>                                                         
            </x-my-modal-form-new-message>
            <div class="wrap-right">            
                <button class="button_chat" onclick="button_show_modal_form_new_message()">Добавить своё сообщение</button>
            </div>
            @foreach ($messages as $message)
                <x-my-message idChat="{{ $chat->id }}" idMessage="{{ $message->id }}" author="{{ $message->author }}" data="{{ $message->created_at }}" message="{{ $message->message }}"  messageLikeYes="{{ $message->yes }}" messageLikeNo="{{ $message->no }}" />                                                                                                                                                                                                                                                                                                                                  
            @endforeach                                                                                                                                                                                                                                                                                                                                                       








        </div>
    </x-slot>
</x-main-layout>