@extends('layouts.app')

@section('content')
    <div class="container section">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="title">{{ $team->name }}</h2>
                <p>Here is an overview of all your repositories and deployments</p>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                <ul>
                    @forelse($team->repositories as $repository)

                        <li><a href="{{ $repository->path() }}">{{ $repository->name }}</a></li>


                    @empty

                        You haven't added any repositories yet

                    @endforelse
                </ul>

            </div>
        </div>
    </div>
@endsection
