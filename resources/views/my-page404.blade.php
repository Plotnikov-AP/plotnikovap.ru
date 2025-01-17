<x-main-layout>
    <x-slot name="title">404</x-slot>
    <x-slot name="content">
        <div class="error">
            <p>{{ __('all.error404') }}</p>
            <a href="{{ url()->previous() }}">{{ __('all.back') }}</a>
        </div>
    </x-slot>
</x-main-layout>