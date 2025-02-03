<x-main-layout>
    <x-slot name="title">Главная страница</x-slot>
    <x-slot name="content">
        @include('auth.register')
    </x-slot>
</x-main-layout>