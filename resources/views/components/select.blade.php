@props(['value' => null, 'options' => []])

<select {{$attributes->class(['form-control'])}}>
    @foreach($options as $category_id => $category_name)
        <option value="{{$category_id}}" {{$category_id == $value ? 'selected' : null}}> {{$category_name}} </option>
    @endforeach
</select>