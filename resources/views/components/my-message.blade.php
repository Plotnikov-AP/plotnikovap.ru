<div class="message">
        <div class="wrap-right">
                <div class="data">
                        {{ $data }}
                </div>
                <div class="data">
                        {{ $author }}
                </div>
                <div class="data">
                        <button onclick="SaveDataForMessages('/api/message/like', '{{ csrf_token() }}', {'id_chat': '{{ $idChat }}', 'id_message': '{{ $idMessage }}', 'id_user': '{{ Auth::user()->id }}', 'yes': '1', 'no': '0'});"><div class="wrap-center"><span id="message_{{ $idMessage }}_like_yes">{{ $messageLikeYes }}</span><img src="/images/yes.png" alt="понравилось"></div></button>
                </div>
                <div class="data">
                        <button onclick="SaveDataForMessages('/api/message/like', '{{ csrf_token() }}', {'id_chat': '{{ $idChat }}', 'id_message': '{{ $idMessage }}', 'id_user': '{{ Auth::user()->id }}', 'yes': '0', 'no': '1'});"><div class="wrap-center"><span id="message_{{ $idMessage }}_like_no">{{ $messageLikeNo }}</span><img src="/images/no.png" alt="не понравилось"></div></button>
                </div>
        </div>
        <div class="wrap-left">
                <div class="message_content">
                        <p>{{ $message }}</p>
                </div>
                <!-- <div class="del-theme">
                        удалить тему
                </div> -->
        </div>
</div>
