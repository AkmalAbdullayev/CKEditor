@extends('layout')

@section('slider')

<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/js/moveUpToDown.js')}}" type="text/javascript"></script>
    {{ csrf_field() }}
    @method('DELETE')
    <h1 class="display-3 text-center">Images</h1>
    <a href="/" class="btn btn-dark" style="margin-bottom: 12px;">Main Page</a>
    <a href="{{ route('imageCreate')}} " class="btn btn-info" style="margin-bottom: 12px;">Create</a>
    <table style="width: 100%; position: relative; border:1px solid black; border-collapse:collapse; margin:0;"
        id="table">
        <tr>
            <th style="border:1px solid black; border-collapse:collapse; text-align:center;">ID</th>
            <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Image</th>
            <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Title</th>
            <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Change Position</th>
            <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Alter</th>
        </tr>
        @foreach ($images as $key => $image)
        {{-- {{ dd($value) }} --}}
        <tr>
            <td style="border:1px solid black; border-collapse:collapse;" class="font-weight-bold">{{ $image->id }}</td>
            <td style="border:1px solid black; border-collapse:collapse;"><img
                    src="{{ asset('images/' . $image->image) }}" style="width: 150px;" class="rounded mx-auto d-block">
            </td>
            <td style="border:1px solid black; border-collapse:collapse; text-align: center;" class="font-weight-bold">
                {!! $image->title !!}</td>
            <td style="border:1px solid black; border-collapse:collapse; text-align: center;" class="font-weight-bold">
                @if($key != 0)
                    <a href="{{ route('move', ['id' => $image->id, 'move' => 1]) }}" style="text-decoration: none;">
                        <button type="button" class="btn btn-success" name="up">
                            Up
                        </button>
                    </a>
                @endif
                @if($key != count($images) - 1)
                    <a href="{{ route('move', ['id' => $image->id, 'move' => 0]) }}" style="text-decoration: none;">
                        <button type="button" class="btn btn-primary" style="margin-left: 12px;" name="down">
                            Down
                        </button>
                    </a>
                @endif
            </td>
            <td style="border:1px solid black; border-collapse:collapse; text-align: center;"><a
                    href="/ckeditor/edit/{{ $image->id }}" class="btn btn-secondary font-weight-bold col my-1"
                    style="width:70px; margin-right: 12px;" target="_blank">Edit</a><a
                    href="/ckeditor/image/{{ $image->id }}" class="btn btn-danger font-weight-bold">Delete</a></td>
        </tr>
        @endforeach
    </table>
    @endsection
</body>