@extends('admin.layouts.app')

@section('title','Thêm mới vai trò')

@section('plugin_css')
@endsection

@section('wrapper')
    <div class="row grid-margin" id="app">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Vai trò</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span>{{ $role->display_name }}</span></li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roles.update',$role->id) }}" method="POST">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Tên hiển thị</label>
                                    <input type="text" class="form-control" name="display_name" id="display_name" value="{{ $role->display_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="display_name">Tên</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả</label>
                                    <input type="text" class="form-control" name="description" id="description" value="{{ $role->description }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <div class="row">
                                        @foreach($permissions as $chunks)
                                            <div class="col-sm-{{ floor(12/count($permissions))  }}">
                                                @foreach($chunks as $permission)
                                                    <div class="form-check form-check-flat">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" value="{{ $permission->id }}" @if($role->permissions->contains($permission)) checked @endif class="form-check-input" name="permissions[]">
                                                            {{ $permission->display_name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin_js')

@endsection
@section('custom_js')
@endsection