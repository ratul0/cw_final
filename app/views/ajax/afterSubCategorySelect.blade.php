@foreach($fields as $field)
    <div class="form-group">

        <label for="{{$field->key}}" class="control-label">{{$field->key}}</label>
        <input class="form-control" placeholder="{{$field->key}}" name="{{$field->key}}"  type="text" required>
    </div>
@endforeach
