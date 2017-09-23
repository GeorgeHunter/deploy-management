@extends('layouts.app')

@section('content')

    <div class="container content">

        <h1 class="title">{{ $repository->name }}</h1>

        <h3>
            Available Deployment Targets
        </h3>

        @forelse($repository->targets as $target)

            <div class="level">
                <div class="level-left">
                    {{ $target->name }}
                </div>
                <div class="level-right">
                    <a href="#" class="button is-warning is-small">Deploy</a>
                </div>
            </div>

        @empty
                <p>You haven't added any targets for your repository yet</p>
        @endforelse

        <hr>

        <a href="/repositories/{{ $repository->id }}/targets/create" class="button is-primary">
            Add {{ $repository->targets->count() > 0 ? 'Another' : 'Target' }}
        </a>
        @if (!$boss_exists)
            <a href="/repositories/{{ $repository->id }}/targets/create?target=boss" class="button is-warning">Add Boss</a>
        @else
            <a disabled class="button is-warning">Add Boss</a>
        @endif
    </div>

@stop