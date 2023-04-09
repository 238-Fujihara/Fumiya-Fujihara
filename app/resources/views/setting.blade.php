<x-app-layout>
    <x-slot name="header">
        UserSettings
    </x-slot>
    <x-app-contents>
        <p>user {{ $user->email }}</p>
        <!-- ユーザ情報送信フォーム -->
        <form action="{{ route('settings.update') }}" method="post" class="px-8 pt-6 pb-8 mb-4">
            <!-- 今回は情報の更新でPUTを使いたいため、ここでmethodを指定 -->
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label for="name" class="text-sm block">UserName</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}">
            </div>
            <div class="mb-4">
                <label for="email" class="text-sm block">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}">
            </div>
            <input type="submit" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </x-app-contents>
</x-app-layout>