<div class="blog-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color">BLOGS</span>
                    <h2>Our Latest Blogs to the Intranational Journal at a Glance</h2>
                </div>
                <div class="row pt-45">
@php
    $post = App\Models\BlogPost::latest()->limit(3)->get();
@endphp
@foreach($post as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <a href="{{ route('blog.details',$item->id)}}">
                                <img src="{{ asset($item->post_image) }}" alt="Images">
                            </a>
                            <div class="content">
                                <ul>
                                    <li>{{ $item->created_at->format('M d ,Y') }}</li>
                                    <!-- <li><i class='bx bx-user'></i>29K</li>
                                    <li><i class='bx bx-message-alt-dots'></i>15K</li> -->
                                    <li><i class='bx bx-user'></i>{{ $item->user->name}}</li>
                                </ul>
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
@endforeach
                   

                </div>
            </div>
        </div>