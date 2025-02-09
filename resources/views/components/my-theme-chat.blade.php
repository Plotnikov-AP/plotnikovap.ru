<div class="theme-chat">
        <div class="wrap">
                <div class="data">
                        {{ $data }}
                </div>
                <div class="data">
                        {{ $author }}
                </div>
                @if ($access==1)
                        <div class="data">
                                доступ: все
                        </div>
                @else
                        <div class="data">
                                доступ: вы и админ
                        </div>
                @endif
                <div class="data">
                        <button onclick="SaveData('/api/chat/like', '{{ csrf_token() }}', {'id_chat': '{{ $id }}', 'id_user': '{{ Auth::user()->id }}', 'yes': '1', 'no': '0'});"><div class="wrap"><span id="chat_{{ $id }}_like_yes">{{ $chatLikeYes }}</span><img src="/images/yes.png" alt="понравилось"></div></button>
                </div>
                <div class="data">
                        <button onclick="SaveData('/api/chat/like', '{{ csrf_token() }}', {'id_chat': '{{ $id }}', 'id_user': '{{ Auth::user()->id }}', 'yes': '0', 'no': '1'});"><div class="wrap"><span id="chat_{{ $id }}_like_no">{{ $chatLikeNo }}</span><img src="/images/no.png" alt="не понравилось"></div></button>
                </div>
        </div>
        <div class="wrap-theme">
                <div class="theme">
                        <a href="/chat/{{ $id }}">{{ $theme }}</a>
                </div>
                <!-- <div class="del-theme">
                        удалить тему
                </div> -->
        </div>
        <div class="wrap-left">
                <div class="data">
                        Всего соообщений: {{ $count }}
                </div>
        </div>
</div>
