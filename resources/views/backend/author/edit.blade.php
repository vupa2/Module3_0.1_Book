@extends('backend.layout')

@section('title', 'Chỉnh sửa tác giả')

@section('page-header')
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5>Tác giả</h5>
                    <span>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, corporis.</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index-2.html"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Tác giả</a> </li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('page-body')
    <div class="row">
        <!-- testimonial and top selling start -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Chỉnh sửa tác giả</h5>
                </div>

                @if (session()->has('success'))
                    <div class="row">
                        <div class="alert alert-success background-success col-4 offset-4">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <span>{{ session()->get('success') }}</span>
                        </div>
                    </div>
                @endif

                @if (!empty($author->image))
                    <div class="row">
                        <img class="img-thumbnail mx-auto" width="300" height="300" src="{{ asset('storage/images/author/' . $author->image) }}" alt="">
                    </div>
                @endif

                <div class="card-block">
                    <form action="{{ route('author.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="col-sm-4 col-form-label" for="name">Tên tác giả</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Vũ Trọng Phụng" value="{{ $author->name }}">
                                </div>
                            </div>
                            <div class="form-group row col-sm-6" hidden>
                                <label class="col-sm-4 col-form-label" for="category_id">Thể loại</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="category_id" name="category_id" value="{{ $author->category_id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="col-sm-4 col-form-label" for="image">Ảnh</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="image" name="image" value="{{ $author->image }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="col-sm-4 col-form-label" for="country">Quốc tịch</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Việt Nam" value="{{ $author->country }}">
                                </div>
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="col-sm-4 col-form-label" for="age">Tuổi</label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="age" name="age" placeholder="50" value="{{ $author->age }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="col-sm-4 col-form-label" for="year_of_birth">Ngày sinh</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="year_of_birth" name="year_of_birth" value="{{ $author->year_of_birth }}">
                                </div>
                            </div>
                            <div class=" form-group row col-sm-6">
                                <label class="col-sm-4 col-form-label" for="year_of_dead">Ngày mất</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="year_of_dead" name="year_of_dead" value="{{ $author->year_of_birth }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-12">
                                <label class="col-sm-2 col-form-label" for="summary">Tóm tắt</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="summary" name="summary" value="{{ $author->summary }}">
                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="form-group row col-sm-12">
                                <label class="col-sm-2 col-form-label" for="description">Mô tả</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" cols="5" class="form-control" id="description" name="description" placeholder="Mô Tả">{{ $author->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            <a href="{{ route('author.index') }}" type="submit" class="btn btn-inverse waves-effect waves-light text-white">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- testimonial and top selling end -->
        <!-- lettest acivity and statustic card start -->
        <!-- lettest acivity and statustic card end -->
    </div>
@endsection
