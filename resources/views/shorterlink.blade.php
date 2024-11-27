@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <!-- Form Section -->
        <div class="mb-4">
            <h2 class="text-center">Enter Your Link</h2>
            <x-error></x-error>
            <x-success></x-success>
            <form action="{{ route('link.store') }}" method="POST" class="d-flex gap-2" novalidate>
                @csrf
                <input type="url" class="form-control" name="link" placeholder="https://example.com" required>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <!-- Table Section -->
        <h3 class="mb-3 text-center">Link Details</h3>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Link</th>
                    <th>Shorten Link</th>
                    <th>Visit Count</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                <!-- Example Data -->
                @forelse ($shortlinks as $shortlink)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $shortlink->link }}</td>
                        <td><a href="{{ route('link.show', $shortlink->code) }}">{{ url('') . '/' . $shortlink->code }}</a>
                        </td>
                        <td>{{ $shortlink->visit_count }}</td>
                    </tr>
                @empty
                    <div class="text-center alert alert-info">
                        There is no links yet !
                    </div>
                @endforelse
            </tbody>
        </table>
        <div class="d-felx justify-content-center">
            {{ $shortlinks->links() }}
        </div>
    </div>
@endsection
