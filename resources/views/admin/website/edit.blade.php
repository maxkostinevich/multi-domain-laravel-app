@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger col-8" role="alert">
                    <div class="font-weight-bold">Oops! Please, fix the following errors:</div>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (session('status'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success col-8" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <h1 class="text-center">{{ $website->id ? 'Edit' : 'Create' }} Website</h1>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form method="post" action="{{ $website->id ? route('website.update', $website) : route('website.store') }}" enctype="multipart/form-data">
                @if($website->id)
                    <input type="hidden" name="_method" value="patch">
                @endif
                    {{ csrf_field() }}

                    <div class="alert alert-warning">
                        <div class="form-group">
                            <label for="domain">Custom Domain</label>
                            <input type="text" class="form-control" name="domain" id="domain" value="{{ old('domain', $website->domain) }}" placeholder="example.com">
                            <div>To add a custom domain, just create a new <b>A</b> record pointing to <b>{{ request()->server('SERVER_ADDR') }}</b> in your domain name DNS settings.
                                <br>
                                <b>Please note: HTTPS connection may not work correctly, as this application created for demo purpose only.</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $website->name) }}" placeholder="Name">
                    </div>
                    <div class="d-flex flex-row mb-3">
                        <div class="mr-4">
                            <div class="avatar" style="@if($website->avatar)background-image: url('{{ url('storage/' . $website->avatar) }}');@endif">
                                @if(!$website->avatar)
                                    ?
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="avatar">Upload your photo</label>
                            <input type="file" name="avatar" class="form-control-file" id="avatar">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control" name="about" id="about" placeholder="A few words about yourself">{{ old('about', $website->about) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $website->email) }}" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{ old('facebook', $website->facebook) }}" placeholder="Facebook URL">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{ old('twitter', $website->twitter) }}" placeholder="@YourTwitterHandle">
                    </div>

                    <button type="submit" class="btn btn-primary float-right">{{ $website->id ? 'Update' : 'Create' }}</button>
                </form>
            </div>


        </div>
    </div>
@endsection
