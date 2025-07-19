@extends('layouts.admin.app')
@section('content')
<div class="container py-4">
    <h3>Company Shortlisted Trainers</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Name</th>
                <th>Email</th>
                <th>Shortlisted Trainers</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->contact_name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        @if($company->trainers->count())
                            <ul>
                                @foreach($company->trainers as $trainer)
                                    <li>
                                        {{ $trainer->name }} ({{ $trainer->email }})
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span class="text-muted">No trainers shortlisted</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 