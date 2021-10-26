
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('show') }}
        </h2>
    </x-slot>
    <form action="">

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">글 제목</label>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">글의 내용</label>
        </div>

        <!-- 파일이 있을경우 보여주기 -->
        <div class="mb-3">
            <label for="formFile" class="form-label">이미지 파일</label>
        </div>

    </form>
</x-app-layout>
