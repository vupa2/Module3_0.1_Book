@extends('backend.layout')

@section('title', 'Danh sách tác giả')

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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tìm kiếm</h5>
                </div>
                <div class="card-block">
                    <form action="{{ route('author.search') }}" method="GET">
                        <div class="form-group row">
                            <label class="col-sm-4 col-lg-2 col-form-label">Tên tác giả</label>
                            <div class="col-sm-4 col-lg-5">
                                <div class="input-group input-group-inverse">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text" for="name"><i class="ti-id-badge"></i></label>
                                    </span>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $request->name ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-lg-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-4 col-lg-5">
                                <div class="input-group input-group-inverse">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text" for="year_of_birth_start"><i class="ti-calendar"></i></i></label>
                                    </span>
                                    <input type="date" class="form-control" name="year_of_birth_start" id="year_of_birth_start" value="{{ $request->year_of_birth_start ?? '' }}">
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-5">
                                <div class="input-group input-group-inverse">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text" for="year_of_birth_end"><i class="ti-calendar"></i></i></label>
                                    </span>
                                    <input type="date" class="form-control" name="year_of_birth_end" id="year_of_birth_end" value="{{ $request->year_of_birth_end ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                <i class="fa fa-search"></i>
                                Tìm kiếm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- testimonial and top selling start -->
        <div class="col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Danh sách tác giả ({{ $authors->count() }}) tác giả.</h5>
                </div>

                <div class="card-block p-b-0">
                    <div class="table-responsive">
                        <table class="table table-hover m-b-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ảnh</th>
                                    <th>Tên tác giả</th>
                                    <th>Ngày sinh</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $key => $author)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>
                                            <img width="50" height="50" src="{{ asset('storage/images/author/' . $author->image) }}" alt="{{ $author->name }}" />
                                        </td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->year_of_birth }}</td>
                                        <td>
                                            <a href="{{ route('author.edit', $author->id) }}" class="btn btn-success btn-round waves-effect waves-light">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Sửa
                                            </a>
                                            {{-- <a href="{{ route('author.delete', $author->id) }}" class="btn btn-danger btn-round waves-effect waves-light alert-confirm" onclick="_gaq.push(['_trackEvent', 'example', 'try', 'alert-confirm']);">
                                                <i class="fa fa-trash"></i>
                                                Xóa
                                            </a> --}}
                                            <a href="#" class="btn btn-danger text-white btn-round waves-effect waves-light alert-confirm">
                                                <i class="fa fa-trash"></i>
                                                Xóa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial and top selling end -->
        <!-- lettest acivity and statustic card start -->
        <!-- lettest acivity and statustic card end -->
    </div>
@endsection

@push('script')
    <script>
        const deleteURL = '{{ route('author.delete', $author->id) }}';
        //Alert confirm
        $(document).ready(function() {
            document.querySelectorAll('.alert-confirm').forEach(button => {
                button.onclick = function() {
                    swal({
                            title: "Bạn có chắc chắn?",
                            text: "Bạn sẽ không thể khôi phục dữ liệu sau khi xóa",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Tôi chắc chắn",
                            cancelButtonText: "Hủy",
                            closeOnConfirm: false
                        },
                        function() {
                            swal("Xóa!", "Dữ liệu của bạn đã được xóa.", "success");
                            $(location).attr('href', deleteURL);
                        });
                };
            })

            $('#openBtn').on('click', function() {
                $('#myModal').modal({
                    show: true
                })
            });

            $(document).on('show.bs.modal', '.modal', function(event) {
                var zIndex = 1040 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                setTimeout(function() {
                    $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                }, 0);
            });
        });

    </script>
@endpush
