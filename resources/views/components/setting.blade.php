@props(['heading'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg mb-8 pb-2 border-b font-bold">{{$heading}}</h1>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admins/dashboard" class="{{request()->is('admins/dashboard') ? 'text-blue-500':'' }}">Dashboard</a>
                </li>
                <li>
                    <a href="/admins/posts/create" class="{{request()->is('admins/posts/create') ? 'text-blue-500':'' }}">New post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel class="max-w-sm mx-auto">
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>
