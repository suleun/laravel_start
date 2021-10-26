
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('post') }}
        </h2>
    </x-slot>

    <form action="">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">글 제목</label>
            <input
                type="text"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder="글의 제목을 입력 하세요">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">글의 내용</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <!-- 파일 선택 -->
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile">
        </div>

    </form>
    
</x-app-layout>

