@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}" />
    <input  
            class="border border-gray-200 p-2 w-full rounded" 
            id="{{ $name }}" 
            name="{{ $name }}"
            required value="{{ old($name) }}"
            {{$attributes}}
            >
    <x-form.error name="{{ $name }}" />
</x-form.field>
