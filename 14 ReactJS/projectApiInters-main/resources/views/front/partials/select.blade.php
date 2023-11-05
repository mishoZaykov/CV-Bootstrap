<select name="{{$name}}" id="{{$id}}" class="{{ $class ? $class : 'btn btn-success' }}">
    @foreach ($options as $option)
        <option value="">
            {{$option}}
        </option>
    @endforeach
</select>