<option value="0">Select Sub Category</option>
@foreach($subCategories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
@endforeach
