@extends('home_simple')


@section('contents')
 

      <section class="bg-gray">
      @if (session()->has('green'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session()->get('green')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
      @if (session()->has('red'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session()->get('red')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
        @if ($errors->any()) @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach 
      @endif

<div class="card">
  <div class="card-header bg-info">
    <form method="post" enctype="multipart/form-data" action="{{route('importCSV.StudentsList.index')}}">
        @csrf
    <div class="row">
        <div class="col-sm-12 form-inline">
            <input type="file" class="form-control form-control-sm" name="file" required /> &nbsp;
            <!--<div class="form-check-inline">-->
            <!--    <label class="form-check-label">-->
            <!--    Header Row: <input type="checkbox" class="form-check-input" value="">-->
            <!--    </label>-->
            <!--</div>-->
            <button class="btn btn-outline-secondary btn-sm" name="btn" value="Load" type="submit">Load</button> &nbsp;
            <button class="btn btn-outline-secondary btn-sm" name="btn" value="Import" type="submit">Import</button>
        </div>
    </div>
    </form>
  </div>
  <div class="card-body p-0">
      <div class="table-responsive" >
      <table class="table table-sm mb-0">
          <thead>
              <th style="background-color:#3db9dc4a;">No.</th>
              <th style="background-color:#3db9dc4a;">Word</th>
          </thead>
          <tbody>
              @foreach($data as $item)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item['word']}}</td>
                </tr>
              @endforeach
              @if(count($data)==0)
                <tr>
                  <td colspan="2" class="text-center">Data Not Exist</td>
                </tr>
              @endif
          </tbody>
          <tfoot>
            <tr>
              <td style="background-color:#3db9dc4a;" colspan="2" >For Format Please Download This <a href="{{asset('Format/Format.csv')}}"> (Download) </a> Format</td>
            </tr>
          </tfoot>
      </table>
  </div>
  </div>
</div>

</section>
@endsection


