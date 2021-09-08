<select
@if((!in_array('update', $allowed) and Request::is('easy-admin/*/*/edit')) or (!in_array('create', $allowed) and !Request::is('easy-admin/*/*/edit')))
    disabled
@endif
@if(in_array($field, $required_fields))
    required
@endif
class="form-control" name="{{ $field }}">
    @foreach (explode(',', $select_fields[$field]) as $option)
        <option
        @if (trim($data->$field) == trim(count(explode('|', $option)) == 2 ? explode('|', $option)[0] : $option))
            selected
        @endif
        value="{{ count(explode('|', $option)) == 2 ? explode('|', $option)[0] : $option }}">
            {{ count(explode('|', $option)) == 2 ? explode('|', $option)[1] : $option }}
        </option>
    @endforeach
</select>
