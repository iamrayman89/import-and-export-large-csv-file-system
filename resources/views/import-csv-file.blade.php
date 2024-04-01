
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row-md-8">
            <div class="card">
                <div class="card-header">{{ __('Choose cvs file to Import') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{  url('/') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Import CSV File') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control @error('email') is-invalid @enderror" name="mycsv" id="mycsv" required  autofocus>

                                @error('csvFile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Import') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
