@extends('home')
 
@section('contents') 
    <div class="container-fluid mt-2">
        <div class="row">
            @if(session()->has('success'))
                <div class="col-sm-12">
                    <div class="alert alert-success">{{session('success')}}</div>
                </div>
            @endif
            <div class="col-sm-8">
                <form action="{{route('backend.conference.cont.update')}}" method="post" id="main_form">
                    @csrf
                    <input type="hidden" name="conference_id" form="main_form" value="{{$conference->id}}">
                    <textarea name="description" id="description" form="main_form" rows="20">{!!$conference->description!!}</textarea>
                </form>
            </div>
            <div class="col-sm-4 table-responsive bg-white">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>
                            <button class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#addImageModal" onclick="open_image_modal()" title="add image">
                                <i class="fa fa-plus"></i>
                            </button>
                        </th>
                    </thead>
                    <thead>
                        <th>Images</th>
                    </thead>
                    <tbody>

                        @foreach($images as $item)
                            <tr>
                                <td>
                                    <img src="{{asset('storage/'.$item->image)}}" class="img" style="width:35px;height:35px;">
                                        <a href="{{route('backend.conference.cont.image.delete',$item->id)}}" class="text-danger float-right" onclick="return confirm('Are You Sure To Delete This Image?')"><i class="fa fa-trash"></i></a>
                                    <p style="word-break: break-all;" class="m-0 p-0">{{asset('storage/'.$item->image)}} </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-sm-12 pt-3">
                <button class="btn btn-info" type="submit" form="main_form">
                    <i class="fa-fa-save"></i> Save Changes
                </button>
            </div>
        </div>
    </div>


<!-- add image modal -->
<div class="modal" tabindex="-1" role="dialog" id="addImageModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('backend.conference.cont.image.store',$conference->id)}}" method="post" enctype="multipart/form-data" id="image_form">
             <input name="description" type="hidden" id="image_desc" form="image_form">
            
            @csrf
            <input type="hidden" name="conference_id" value="{{$conference->id}}">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload Image</button>
      </div>
      </form>

    </div>
  </div>
</div>
<!-- end add image modal -->
@section('manual_scripts')
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'description' );
    
    $('#image_form').submit(function(){
       $('#image_desc').val($('#description').val());
    });

</script>

@endsection

@endsection

