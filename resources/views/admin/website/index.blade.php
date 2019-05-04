@extends('layouts.app')

@section('content')
    <div class="container col-8">

        @if (session('status'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success col-8" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <h1 class="text-center">Your Websites</h1>
            <div class="text-center">
                <a href="{{ route('website.create') }}" class="btn btn-primary">Create New Website</a>
            </div>

        <div class="row justify-content-center">
            @foreach($websites as $website)
                <div class="col-12 col-md-6 py-3">
                    <div class="card m-1 h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex flex-row mb-3">
                                <div class="mr-2">
                                    <div class="avatar" style="@if($website->avatar)background-image: url('{{ url('storage/' . $website->avatar) }}');@endif">
                                        @if(!$website->avatar)
                                            {{ substr($website->name, 0, 1) }}
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <h5 class="card-title">{{ $website->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted small">
                                        <a href="{{ route('website.subdomain', $website->slug) }}" target="_blank" class="d-block text-success">{{ route('website.subdomain', $website->slug) }}</a>
                                        @if($website->domain)
                                            <a href="{{ route('website.domain', $website->domain) }}" target="_blank" class="d-block text-success">{{ route('website.domain', $website->domain) }}</a>
                                        @endif
                                    </h6>
                                </div>
                            </div>

                            <p class="card-text flex-grow-1">
                                <span class="d-inline-block mb-1">{{ $website->about }}</span>
                                <span class="d-block text-muted small">{{ $website->email }}</span>
                                <span class="d-block text-muted small">{{ $website->facebook }}</span>
                                <span class="d-block text-muted small">{{ $website->twitter }}</span>
                            </p>

                            <div>
                                <a href="{{ route('website.edit', $website) }}" class="card-link">Edit</a>
                                <a href="#" class="card-link float-right text-danger" onclick="if(confirm('Delete this record?')){document.getElementById('delete-entity-{{ $website->id }}').submit();return false;}">Delete</a>
                                <form id="delete-entity-{{ $website->id }}" action="{{ route('website.destroy', $website) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
