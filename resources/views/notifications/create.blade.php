@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="my-4">Send Notifications</h1>
    <form method="POST" action="{{ route('notifications.store') }}">
        @csrf
        <div class="form-group">
            <label for="recipients">Select Recipients:</label>
            <select id="recipients" name="recipients[]" class="form-control" multiple>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('recipients')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5"></textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send Notifications</button>
    </form>
</div>

<!-- Include jQuery and Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

{{-- here we can use select2 dropdown also --}}
{{-- we can also add client side validations here  --}}
{{--also we can make more beautify this page if we can use any   --}}
<script>
    // $(document).ready(function() {
    //     $('#recipients').select2();
    // });
</script>

@endsection
