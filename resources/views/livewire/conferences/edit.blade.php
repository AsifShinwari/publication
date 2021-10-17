@extends('home')
 
@section('contents') 
    <div class="container-fluid mt-2">
    <form action="{{route('backend.conference.update')}}" method="post">
        <input type="hidden" name="id" value="{{$id}}">
        @csrf
        <div class="col-sm-6 row">
            <div class="col-sm-12">
                <label for="year">Year</label>
                <input name="year" value="{{$data->year}}" type="date" class="form-control">
            </div>
            <div class="col-sm-12">
                <label for="title">Title</label>
                <textarea name="title" rows="10" class="form-control">{{$data->title}}</textarea>
            </div>
            <div class="col-sm-12 pt-3">
                <button class="btn btn-info" type="submit"> <i class="fa fa-save"></i> Save</button>
            </div>
        </div>
        </form>
    </div>

@section('manual_scripts')

@endsection

@endsection

