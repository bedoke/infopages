@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Create Content') }}</div>
                <div class="card-body">
                    <form method="POST" action="/contents">
                        @csrf
                        <div class="form-group">
                            <label for="contentTitleInput">{{ __('Title') }}</label>
                            <input
                                type="text"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}"
                                id="contentTitleInput"
                                name="title"
                                required
                                placeholder="{{ __('Title') }}"
                                value="{{ old('title') }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="contentDescriptionInput">{{ __('Description') }}</label>
                            <input
                                type="text"
                                class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                                name="description"
                                required
                                id="contentDescriptionInput"
                                value="{{ old('description') }}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="contentTypeInput">{{ __('Type') }}</label>
                            <select
                                class="form-control {{ $errors->has('type') ? 'is-invalid' : ''}}"
                                name="type"
                                required
                                id="contentType"
                            >
                                @foreach ($contentTypes as $contentType)
                                    <option value="{{ $contentType->id }}">{{ $contentType->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Create Content') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
