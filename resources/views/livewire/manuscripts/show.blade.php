<div>
    <div class="container">

        <h4>Author</h4>
        <p>{{$data->author}}</p>

        <h4>Email</h4>
        <p>{{$data->email}}</p>

        <h4>Keywords</h4>
        <p>{{$data->keywords}}</p>

        <h4>Title</h4>
        <p>{{$data->title}}</p>

        <h4>Abstract</h4>
        <p>{{$data->abstract}}</p>

        <h4>Attachment</h4>
        <p>
            <a href="{{asset($data->file)}}">Preview File</a>
        </p>


    </div>
</div>