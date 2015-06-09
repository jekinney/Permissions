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
        <div class="col-xs-12 col-md-8 col-lg-6">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ $user->username }}</h2>     
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.user.update') }}" method="post">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" value="{{ $user->username }}" class="form-control" disabled="true">
                            </div>
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" disabled="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-6">
                                <label for="group">User's Group:</label>
                                <select name="group" id="group" class="form-control">
                                    @if($user->groups->count() == 0)
                                        <option>No Group Assigned</option>
                                    @else
                                        <option value="{{ $user->groups()->first()->id }}">Current: {{ $user->groups()->first()->name }}</option>
                                    @endif
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="text-center"><b>User Options</b></p>
                        <div class="row">
                            <div class="col-xs-6 col-sm-3 text-center">
                                <div class="checkbox">
                                    <label for="banned">
                                        <input type="checkbox" name="banned" id="banned" value="1" @if($user->banned == 1) checked @endif>
                                        Ban User?
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3 text-center">
                                <div class="checkbox">
                                    <label for="activated">
                                        <input type="checkbox" name="activated" id="activated" value="1" @if($user->activated == 1) checked @endif>
                                        Activate User?
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
