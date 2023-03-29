@props(['post'])
<form action="/posts/{{$post->slug}}/comments" method="post" class="border border-gray-200 rounded-xl p-6 bg-blue-100">
    @csrf
    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
            class="rounded-xl">
        <h2 class="ml-4">Want to participate</h2>
    </header>
    <div class="mt-6">
        <textarea name="body" class="w-full text-sm focus:outline-none focus:ring bg-gray-100"
            placeholder="Quicly say what's on your mind" rows="4">
        </textarea>
        <button type="submit"
            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 mt-2">Submit</button>
    </div>
</form>
