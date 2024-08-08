@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')

    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    {{-- <li><a href="#">Category</a></li>
                    <li>Page active</li> --}}
                </ul>
            </div>
            <h1>Tin tức</h1>
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
                    <div class="form-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="row">
                    @foreach($blog as $new)
                    <div class="col-md-6">
                        <article class="blog">
                            <figure>
                                <a href="blog-post.html"><img src="{{asset($new->img)}}" alt="">
                                    <div class="preview"><span>Xem thêm</span></div>
                                </a>
                            </figure>
                            <div class="post_info">
                                <small>{{$new->created_at}}</small>
                                <h2><a href="blog-post.html">{{$new->title}}</a></h2>
                                <p>{{$new->mota}}</p>
                              
                            </div>
                        </article>
                        <!-- /article -->
                    </div>
                    @endforeach

                </div>
                <!-- /row -->

             

            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
                    <div class="form-group">
                        <input type="text" name="search" id="search_blog" class="form-control" placeholder="Tìm kiếm tin tức!">
                        <button type="submit"><i class="ti-search"></i></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Tin mới</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach($news as $item) 
                        <li>
                            <div class="alignleft">
                                <a href="#0"><img src="{{asset($item->img)}}" alt=""></a>
                            </div>
                            <small>{{$item->created_at}}</small>
                            <h3><a href="#" title="">{{$item->title}}</a></h3>
                        </li>
                        @endforeach
                      
                    </ul>
                </div>
              
              
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

@endsection