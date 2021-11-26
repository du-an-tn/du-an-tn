@extends('layouts.admin')
@section('main')

<div class="content">
    <iframe src="{{url('/file/dialog.php')}}" width="100%" height="500px" style="over-flow-y:auto" frameborder="0"></iframe>
  </div>

@stop()