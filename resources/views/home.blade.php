@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">Users</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="issues-tab" data-bs-toggle="tab" data-bs-target="#issues" type="button" role="tab" aria-controls="issues" aria-selected="false">Issues</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $user)
                                            <tr>
                                                <th scope="row">{{$loop->index + 1 }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                               
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="issues" role="tabpanel" aria-labelledby="issues-tab">
                        <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Issue Name</th>
                                            <th scope="col">Location Name</th>
                                            <th scope="col">Flat Name</th>
                                            <th scope="col">Comment</th>
                                            <th scope="col">Is Verified</th>
                                            <th scope="col">Created By</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($issues as $issue)
                                            <tr>
                                                <th scope="row">{{$loop->index + 1 }}</th>
                                                <td>{{ $issue->location_name }}</td>
                                                <td>{{ $issue->flat_name }}</td>
                                                <td>{{ $issue->comment }}</td>
                                                <td>{{ $issue->is_verified }}</td>
                                                <td>{{ $issue->name }}</td>
                                               
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection