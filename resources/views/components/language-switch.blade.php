<form action="{{ route('language.switch') }}" method="POST">
    @csrf
    <select name="language" onchange="this.form.submit()">
        <option value="ru" {{ app()->getLocale() === 'ru' ? 'selected' : '' }}>Русский</option>
        <option value="en" {{ app()->getLocale() === 'en' ? 'selected' : '' }}>English</option>
    </select>
</form>