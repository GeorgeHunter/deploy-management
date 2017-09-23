@extends('layouts.app')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="help is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


            <div class="section" style="padding-bottom: 0;">
                <a class="button is-primary" href="{{ $repository->path() }}">
                    <span class="icon is-small">
                        <i class="fa fa-chevron-left"></i>
                    </span>
                    <span>Back to Repository</span>
                </a>

            </div>


        <form class="section columns is-multiline" action="store" method="POST">
            {{ csrf_field() }}



            <div class="field column is-half">
                <label for="name" class="label">Name <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="name" id="name" value="{{ old() ? old('name') : session('name') }}">
            </div>

            <div class="field column is-half">
                <label for="host" class="label">Host <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="host" id="host" value="{{ old() ? old('host') : session('host') }}">
            </div>

            <div class="field column is-half">
                <label for="url" class="label">URL <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="url" id="url" value="{{ old() ? old('name') : '' }}">
            </div>

            <div class="field column is-half">
                <label for="db_name" class="label">DB Name <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="db_name" id="db_name" value="{{ old() ? old('db_name') : session('db_prefix') }}">
            </div>

            <div class="field column is-half">
                <label for="db_host" class="label">DB Host <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="db_host" id="db_host" value="{{ old() ? old('db_host') : 'localhost' }}">
            </div>

            <div class="field column is-half">
                <label for="db_user" class="label">DB User <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="db_user" id="db_user" value="{{ old() ? old('db_user') : session('db_prefix') }}">
            </div>

            <div class="field column is-half">
                <label for="db_pass" class="label">DB Pass <span class="has-text-danger">*</span></label>
                <input type="text" class="input" name="db_pass" id="db_pass" value="{{ old() ? old('db_pass') : '' }}">
            </div>

            <div class="field column is-half">
                <label for="subdirectory" class="label">Subdirectory</label>
                <input type="text" class="input" name="subdirectory" id="subdirectory">
            </div>

            <div class="field column is-full">
                <label class="checkbox">
                    <input type="checkbox" checked name="create_wp">
                    Create wp-config.php file from these values
                </label>
            </div>

            <div class="field column is-half">

                <input type="submit" class="button is-primary" value="Create Target">
            </div>


        </form>

    </div>

@stop