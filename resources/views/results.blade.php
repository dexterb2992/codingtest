@extends('layouts.nofooter')

@section("content")
	<img src="{{ $image }}" class="img-responsive">
@endsection

@section('styles')
	<style>
		body {
			margin: 0;
			padding: 0;
		}
	</style>
@endsection