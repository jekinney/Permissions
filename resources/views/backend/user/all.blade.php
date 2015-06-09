@extends('backend.theme.main')

@section('header')
    <section class="content-header">
        <h1>Dashboard<small>Version 2.0</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Users</span>
                    <span class="info-box-number">{{ $users->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Activated</span>
                    <span class="info-box-number">{{ $users->where('activated', 1)->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Bans</span>
                    <span class="info-box-number">{{ $users->where('banned', 1)->count() }}</span>
                </div>
            </div>
        </div> 
    </div> 
    <div class="row">
        <div class="col-xs-12 col-md-8 col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">All Users</h2>     
                </div>
                <div class="box-body">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:20%">Username</th>
                                <th style="width:35%">Email</th>
                                <th style="width:5%" class="text-center">Activated</th>
                                <th style="width:5%" class="text-center">Banned</th>
                                <th style="width:5%" class="text-center">Group</th>
                                <th style="width:10%" class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->activated == 1)
                                        <td class="btn-success text-center">Yes</td>
                                    @else 
                                        <td class="btn-danger text-center">No</td> 
                                    @endif
                                    @if($user->banned == 1)
                                        <td class="btn-danger text-center">Yes</td> 
                                    @else
                                        <td class="btn-success text-center">No</td>
                                    @endif
                                    <td class="text-center">@if($user->groups->count() > 0) {{ $user->groups->first()->name }} @else None @endif</td>
                                    <td class="button-group text-center">
                                        <a href="{{ route('admin.user.editor', $user->username) }}" class="btn btn-primary btn-xs">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
