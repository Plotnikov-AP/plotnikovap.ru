<div id="modal_form_new_message">
    <div class="modal_close">&times;</div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="new_message" action="add_message" method="post">
        @csrf
        <label>Введите текст нового сообщения</label><br />
        <input type="hidden" name="id_chat" value="{{ $id_chat }}" />
        <input type="hidden" name="author" value="{{ Auth::user()->name }}" />
        <textarea name="message"></textarea><br />
        <input class="button_chat" type="submit" value="Создать новое сообщение" />
    </form>
    <script>
        $('.modal_close').click(function() {
            $('#modal_form_new_message').hide(); 
        })
    </script>
</div>