<!-- resources/views/tickets/update.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Ticket</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('tickets.update', ['ticket' => $ticket['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="project_id">Project ID:</label>
                <input type="number" id="project_id" name="project_id" class="form-control"
                    value="{{ old('project_id', $ticket['project_id']) }}" required>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', $ticket['name']) }}">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $ticket['description']) }}</textarea>
            </div>

            <div class="form-group">
                <label for="estimated_hours">Estimated Hours (YYYY-MM-DD):</label>
                <input type="text" id="estimated_hours" name="estimated_hours" class="form-control"
                    value="{{ old('estimated_hours', $ticket['estimated_hours']) }}">
            </div>

            <div class="form-group">
                <label for="illustration">Illustration:</label>
                <input type="file" id="illustration" name="illustration" class="form-control-file"
                    value="{{ $ticket['illustration'] }}">
            </div>

            <div class="form-group">
                <label for="steps_to_reproduce">Steps to Reproduce:</label>
                <textarea id="steps_to_reproduce" name="steps_to_reproduce" class="form-control">{{ old('steps_to_reproduce', $ticket['steps_to_reproduce']) }}</textarea>
            </div>

            <div class="form-group">
                <label for="expected_result">Expected Result:</label>
                <textarea id="expected_result" name="expected_result" class="form-control">{{ old('expected_result', $ticket['expected_result']) }}</textarea>
            </div>

            <div class="form-group">
                <label for="actual_result">Actual Result:</label>
                <textarea id="actual_result" name="actual_result" class="form-control">{{ old('actual_result', $ticket['actual_result']) }}"></textarea>
            </div>

            <div class="form-group">
                <label for="priority">Priority:</label>
                <select id="priority" name="priority" class="form-control">
                    <option value="HIGH" {{ old('priority', $ticket['priority']) == 'HIGH' ? 'selected' : '' }}>HIGH
                    </option>
                    <option value="MEDIUM" {{ old('priority', $ticket['priority']) == 'MEDIUM' ? 'selected' : '' }}>MEDIUM
                    </option>
                    <option value="LOW" {{ old('priority', $ticket['priority']) == 'LOW' ? 'selected' : '' }}>LOW
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="bug_type_id">Bug Type ID:</label>
                <input type="number" id="bug_type_id" name="bug_type_id" class="form-control"
                    value="{{ old('bug_type_id', $ticket['bug_type_id']) }}">
            </div>

            <div class="form-group">
                <label for="test_type_id">Test Type ID:</label>
                <input type="number" id="test_type_id" name="test_type_id" class="form-control"
                    value="{{ old('test_type_id', $ticket['test_type_id']) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Ticket</button>
        </form>
    </div>
@endsection
