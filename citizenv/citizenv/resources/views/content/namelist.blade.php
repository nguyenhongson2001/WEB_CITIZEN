@for ($i = 0; $i < sizeof($list); $i++)
    <option value="{{$list[$i]->id}}">{{$list[$i]->name}}</option>
@endfor
