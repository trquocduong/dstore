@extends('admin.layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')

<main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('admin') }}">Thống kê</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Quản lý đơn hàng</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Quản lý đơn hàng</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link bg-danger text-white active" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Tất cả sản phẩm</a>
            </li>
            <li class="nav-item p-2" role="presentation">
                <a class="nav-link bg-warning text-white" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Bình luận bị chặn</a>
            </li>
        </ul>
        <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Danh sách Bình luận</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Tên sản phẩm</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Danh mục</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cmt1 as $needs)
                                <tr>
                                  <td class="text-center">
                                      <div>{{ $needs->user->username }}</div>
                                  </td>
                                  <td class="text-center">
                                      <div class="rating mb-2">
                                          {{ $needs->rating }} sao
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <p>{{ $needs->comment }}</p>
                                  </td>
                                  <td class="text-center">
                                      <form action="{{ route('block', $needs->id) }}" method="POST" style="display: inline;">
                                          @csrf
                                          <button type="submit" class="btn btn-link text-success px-3 mb-0">
                                              <i class="fa-solid fa-check p-2"></i>Chặn
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Bình luận bị chặn</h6>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Tên khách hàng</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đánh giá</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Nội dung</th>
                                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cmt2 as $needs)
                                <tr>
                                    <td class="text-center">
                                        <div>{{ $needs->user->username }}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="rating mb-2">
                                            {{ $needs->rating }} sao
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $needs->comment }}</p>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('delete', $needs->id) }}" method="POST" style="display: inline;">

                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link text-success px-3 mb-0">
                                                <i class="fa-solid fa-check p-2"></i>Xoá
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
