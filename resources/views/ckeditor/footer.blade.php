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
<style>
    input[type=submit] {
        margin-top: 5px;
    }
</style>
<h1 class="display-2">Content</h1>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<form action="{{ route('footerStore') }}" method="POST">
    {{ csrf_field() }}
    <label for="title">Enter Content Title
        <input type="text" name="title">
    </label>
    <textarea name="footerTitle"></textarea>
    <input type="submit" value="Submit" class="btn btn-dark">
    <script>
        CKEDITOR.replace('footerTitle');
    </script>
</form>
@endsection