@foreach($locations as $location)
    <option value="{{$location}}" {{old($location, $selectedLocation)!=$location ?:'selected'}}>{{$location}}</option>
@endforeach