<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('list') }}
        </h2>
    </x-slot>

            <div class="card">
    
                <div class="card-header">
                    글 목록 보기
                </div>
    
                <div class="card-body">
                    <a href="#" value="{{ $posts->title }}"></a>
                    글쓴이, 글을 쓴 날짜
                </div>
            </div>

            <button type="button" class="btn btn-primary">Primary</button>

</x-app-layout>
