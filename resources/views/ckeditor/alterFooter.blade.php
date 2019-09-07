@extends('layout')

@section('content')
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
<h1 class="display-4">Edit Content</h1>
<a href="/" class="btn btn-dark" style="margin-bottom: 12px; margin-left: 12px;">Main Page</a>
<table style="width: 100%; position: relative; border:1px solid black; border-collapse:collapse; margin:0;">
    <tr>
        <th style="border:1px solid black; border-collapse:collapse; text-align:center;">ID</th>
        <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Title</th>
        <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Text</th>
        <th style="border:1px solid black; border-collapse:collapse; text-align:center;">Alter</th>
        @foreach ($editFooter as $foot)
    <tr>
        <td style="border:1px solid black; border-collapse:collapse; text-align: center;" class="font-weight-bold">{{ $foot->id }}</td>
        <td style="border:1px solid black; border-collapse:collapse; text-align: center;" class="font-weight-bold">{{ $foot->title }}</td>
        <td style="border:1px solid black; border-collapse:collapse; width: 420px; overflow:scroll;" class="font-weight-bold"><p style="height: 100px;">{!! $foot->text !!}</p></td>
        <td style="border:1px solid black; border-collapse:collapse; text-align: center; width: 300px;"><a href="/ckeditor/editFooter/{{ $foot->id }}" class="btn btn-secondary font-weight-bold col my-1" style="width:70px; margin-right: 12px;">Edit</a>
        <a href="/ckeditor/alterFooter/{{ $foot->id }}" class="btn btn-danger font-weight-bold">Delete</a></td>
    </tr>
    @endforeach
    </tr>
</table>
@endsection