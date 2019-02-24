@extends('admin.master')
@section('content')
    {!! json_encode($products) !!}
    @endsection