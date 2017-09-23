@extends('layouts.app')

@section('content')

    <div class="container">

{{--        {{ print_r($repos) }}--}}

        <form action="/repositories" method="POST">
            {{ csrf_field() }}
            <div class="field">
                <label for="repo_url" class="label">Repos</label>
                <div class="control has-icons-left">
                    <div class="select">
                        <select name="repo_url" id="repo_url" class="select">
                            <option selected disabled>Choose a Repo</option>
                            @foreach($repos as $repo)
                                <option value="{{ $repo->full_name }}">{{ $repo->html_url }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="icon is-small is-left">
                        <i class="fa fa-github"></i>
                    </div>
                </div>
            </div>

            <div class="field">
                <label for="name" class="label">Name</label>
                <input type="text" class="input" name="name" id="name">
            </div>

            <div class="field">
                <label for="prefix" class="label">Prefix</label>
                <input type="text" class="input" name="prefix" id="prefix">
            </div>

            <input type="submit" class="button is-primary">
        </form>


    </div>

@stop