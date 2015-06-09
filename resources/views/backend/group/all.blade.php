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
        <div class="col-sm-12 col-md-8">
            @foreach($groups as $group)
                <div class="col-xs-12 col-sm-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h2 class="box-title">{{ $group->name }} | Users assigned: {{ $group->users->count() }}</h2>     
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.group.update', $group->id) }}" method="post">
                                <input type="hidden" name="_method" value="put">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="slug">Slug:</label>
                                    <input type="text" name="slug" id="slug" value="{{ $group->slug }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" value="{{ $group->name }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" name="description" id="description" value="{{ $group->description }}" class="form-control">
                                </div>
                                <div class="row">
                                    @foreach($permissions as $perm)
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="checkbox"> 
                                                <label for="{{ $group->id }}{{ $perm->slug }}">
                                                    <input type="checkbox" name="permissions[]" id="{{ $group->id }}{{ $perm->slug }}" value="{{ $perm->id }}"
                                                    @if($group->permissions->contains($perm->id)) checked @endif> 
                                                    {{ $perm->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    <button type="submit" class="btn btn-danger btn-sm" form="group{{ $group->id }}">Delete</button>
                                </div>
                            </form>
                            <form action="{{ route('admin.group.delete', $group->id) }}" method="post" id="group{{ $group->id }}">
                                <input type="hidden" name="_method" value="delete">
                                {!! csrf_field() !!}
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Permission Details</h2>     
                </div>
                <div class="box-body">
                    <dl class="dl-horizontal">
                        @foreach($permissions as $perms)
                            <dt>{{ $perms->name }}</dt>
                            <dd>{{ $perms->description }}</dd>
                        @endforeach
                    </dl>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Create a New Group</h2>     
                </div>
                <div class="box-body">
                    <form action="{{ route('admin.group.store') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="slug">Slug:</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                        </div>
                        <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control">
                        </div>
                        <div class="row">
                            @foreach($permissions as $perm)
                                <div class="col-xs-12 col-sm-6 col-md-3">
                                    <div class="checkbox"> 
                                        <label for="{{ $perm->id }}{{ $perm->slug }}">
                                            <input type="checkbox" name="permissions[]" id="{{ $perm->id }}{{ $perm->slug }}" value="{{ $perm->id }}"> 
                                            {{ $perm->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary btn-sm">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
