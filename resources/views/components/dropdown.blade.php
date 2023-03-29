@props(['trigger'])
<div x-data ="{show: false}" @click.away="show = false">
    <!-- category section begin -->
    <div @click ="show= !show" class="relative">
        {{$trigger}}
    </div>
    <!-- category section ends -->
    <div x-show="show" class="py-2 absolute bg-grey-100 mt-2 rounded-xl w-full z-50" style="display: none">
        {{$slot}}
    </div>

</div>