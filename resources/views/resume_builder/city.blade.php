@extends('freelancer.layouts.freelancer_frame')

@section('content')
    <div class="p-5">
        <form>
            <div class="form-group d-flex flex-column align-items-start">
                <label for="city"><b>City</b></label>
                <input type="text" name="city" placeholder="Enter city name" class="form-control" value="{{ old('city') }}" id="city">
            </div>
        </form>
    </div>
@endsection

