@extends('layouts.front')

@section('content')

<h1>Leads</h1>

            <div>
            <a href="/leads/{{ $lead->id }}">
                <h2>{{ $lead->name }}</h2>
            </a>
            <h2>{{ $lead->phone }}</h2>
            <h2>{{ $lead->email }}</h2>
            <h2>{{ $lead->requirement }}</h2>
            <small>{{ $lead->created_at }}</small>
            </div>

@endsection