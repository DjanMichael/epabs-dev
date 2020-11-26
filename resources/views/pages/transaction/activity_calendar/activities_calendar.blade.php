@extends('layouts.app')
@section('title','Activity List')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('r_system_module') }}" class="text-muted">System Modules</a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted">Activity List</a>
    </li>
@endsection

@section('content')
    @section('panel-title', 'Calendar')
    @section('panel-icon', 'fas fa-calendar')
    @include('pages.transaction.activity_calendar.panel')
@endsection

@push('scripts')

    <script>

        $(document).ready(function() {
            /*
        |--------------------------------------------------------------------------
        | INITIALIZATION
        |--------------------------------------------------------------------------
        */

        });

    </script>
@endpush
