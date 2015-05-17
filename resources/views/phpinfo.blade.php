@extends('app')

@section('content')
    <div class="container">
        <div class="row">
                {{ phpinfo() }}
        </div>
    </div>
@endsection
