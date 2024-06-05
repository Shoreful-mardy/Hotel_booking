@extends('frontend.main_master')
@section('main')
<!-- Inner Banner -->
        <div class="inner-banner inner-bg9">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>All Blog</li>
                    </ul>
                    <h3>All Blog</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

<!-- Blog Style Area -->
        <div class="blog-style-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach($post as $item)
                        <div class="col-lg-12">
                            <div class="blog-card">
                                <div class="row align-items-center">
                                    <div class="col-lg-5 col-md-4 p-0">
                                        <div class="blog-img">
                                            <a href="{{ route('blog.details',$item->id)}}">
                                                <img src="{{ asset($item->post_image)}}" alt="Images">
                                            </a>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-7 col-md-8 p-0">
                                        <div class="blog-content">
                                            <span>{{ $item->created_at->format('M d ,Y') }}</span>
                                            <h3>
                                                <a href="{{ route('blog.details',$item->id)}}">{{ $item->post_title}}</a>
                                            </h3>
                                            <p>{{ $item->short_desc}}</p>
                                            <a href="{{ route('blog.details',$item->id)}}" class="read-btn">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">

                            	{{ $post->links('vendor.pagination.custom') }}
                                
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="side-bar-wrap">
                            <div class="search-widget">
                                <form class="search-form">
                                    <input type="search" class="form-control" placeholder="Search...">
                                    <button type="submit">
                                        <i class="bx bx-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="services-bar-widget">
                                <h3 class="title">Blog Category</h3>
                                <div class="side-bar-categories">
                                    <ul>

                                    	@foreach($blog_category as $category)

                                        <li>
                                            <a href="{{ route('cat_wise.post',$category->id)}}">{{ $category->category_name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="side-bar-widget">
                                <h3 class="title">Recent Posts</h3>
                                <div class="widget-popular-post">
                                  @foreach($r_post as $post)
                                    <article class="item">
                                        <a href="{{ route('blog.details',$post->id)}}" class="thumb">
                                            <img src="{{ asset($post->post_image) }}" style="height: 80px; width: 80px;" >
                                        </a>
                                        <div class="info">
                                            <h4 class="title-text">
                                                <a href="{{ route('blog.details',$post->id)}}">
                                                    {{ $post->post_title}}
                                                </a>
                                            </h4>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-user'></i>
                                                    29K
                                                </li>
                                                <li>
                                                    <i class='bx bx-message-square-detail'></i>
                                                    15K
                                                </li>
                                            </ul>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </div>

                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Style Area End -->


@endsection