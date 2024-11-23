@extends('backEnd.layouts.master')
@section('title',' Marquee')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">Marquee</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12 col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">Update Your Marquee Text</div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <form  action="{{ route('marquee.update') }}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text">{{ $text }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
