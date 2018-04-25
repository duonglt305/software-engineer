@extends('admin.layouts.app')

@section('title','Thêm mới sản phẩm')

@section('plugin_css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('wrapper')
    <div class="row grid-margin" id="app">
        <div class="col-sm-12">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Nhà cung cấp</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span>Thêm</span></li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                {{ csrf_field() }}
                            </div>
                            <div class="form-group">
                                <label for="title">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" minlength="5" name="title"
                                       id="title"
                                       value="" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               value="" required>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <textarea type="text" rows="5" class="form-control" name="address" id="address" value=""
                                          required></textarea>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin_js')
    <script src="{{ asset('assets/vendor/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/inputmask/dist/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/inputmask/dist/inputmask/bindings/inputmask.binding.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
@endsection
@section('custom_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dropify').dropify();
        });
        let app = new Vue({
            el: '#app',
            data: {
                default_pass: false,
                password: ''
            },
        });
    </script>
@endsection