@props(['name'=>''])
@error($name)
<div class="small text-danger pt-1 ps-1">
    {{$message}}
</div>
@enderror
