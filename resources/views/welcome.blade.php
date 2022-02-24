<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- SLICK --}}
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


        <script src="https://kit.fontawesome.com/9f14ee229e.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light">
            <a class="navbar-brand" href="{{url('/')}}">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/product/catashow/6')}}">Đồ trà<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/product/catashow/7')}}">Đồ phong thủy<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/product/catashow/8')}}">Đồ thư pháp<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/product/catashow/9')}}">Đồ cầm kỳ thi họa<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/product/catashow/10')}}">Đồ bồ đề<span class="sr-only">(current)</span></a>
                    </li>


                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li> --}}
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <a class="btn btn-outline-success" href="{{route('order.edtCart')}}" role="button">Cart</a>
            </div>
        </nav>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div> --}}
        <div class="container">
            <div class="content">
                <div class="tree mx-auto w-50">
                    <img src="{{url('images/tree.png')}}" alt="tree" width="85%">
                    <div class="tree-item tree-item-1">
                        <a href="{{route('product.catashow',6)}}">
                        Đồ trà
                        <span class="fa-stack" style="vertical-align: top;">
                            <i class="fas fa-circle fa-stack-1x"></i>
                            <i class="fas fa-chevron-circle-left fa-stack-1x"></i>
                        </span>
                        </a>
                    </div>

                    <div class="tree-item tree-item-2">
                        <a href="{{route('product.catashow',7)}}">
                        Đồ phong thủy
                        <span class="fa-stack" style="vertical-align: top;">
                        <i class="fas fa-circle fa-stack-1x"></i>
                        <i class="fas fa-chevron-circle-left fa-stack-1x"></i>
                        </span>
                        </a>
                    </div>

                    <div class="tree-item tree-item-3">
                        <a href="{{route('product.catashow',8)}}">
                        Đồ thư pháp
                        <span class="fa-stack" style="vertical-align: top;">
                        <i class="fas fa-circle fa-stack-1x"></i>
                        <i class="fas fa-chevron-circle-left fa-stack-1x"></i>
                        </span>
                        </a>
                    </div>

                    <div class="tree-item tree-item-4">
                        <a href="{{route('product.catashow',9)}}">
                        <span class="fa-stack" style="vertical-align: top;">
                        <i class="fas fa-circle fa-stack-1x"></i>
                        <i class="fas fa-chevron-circle-right fa-stack-1x"></i>
                        </span>
                        Đồ cầm kỳ thi họa
                        </a>
                    </div>

                    <div class="tree-item tree-item-5">
                        <a href="{{route('product.catashow',10)}}">
                        <span class="fa-stack" style="vertical-align: top;">
                        <i class="fas fa-circle fa-stack-1x"></i>
                        <i class="fas fa-chevron-circle-right fa-stack-1x"></i>
                        </span>
                        Đồ bồ đề
                        </a>
                    </div>
                </div>
            </div>

            <div class="multiple-post section">
                @foreach ($posts as $post)
                    <div class="post-item d-flex flex-row-reverse border">
                        <div class="img-bestsell">
                            <img src="{{url('images/'.$post->img_name)}}" class="img-item" alt="">
                        </div>
                        <div class="post-sl-content">
                            <div class="name-item">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div class="open-para">
                                {{substr($post->content,0,30)}}
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>

            <div class="best-seller section">
                <h3>Bán Chạy Nhất</h3>
                <div class="multiple-items">
                    @foreach ($bestseller as $product)
                    <div class="bs-item">
                        <div class="img-bestsell">
                            <img src="{{url('images/'.$product->ProductImage()->first()->name)}}" class="img-item mx-auto" alt="">
                        </div>
                        <div class="content">
                            <div class="name-item">
                                {{$product->name}}
                            </div>
                            <div class="price-item">
                                {{$product->price}}
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="suggest-today section">
                <h3>Gợi ý hôm nay</h3>

                <div class="today-items list-item d-flex flex-wrap justify-content-center">
                    @foreach ($suggestproduct as $product)
                    <div class="td-item rounded">
                        <div class="">
                            <img src="{{url('images/'.$product->ProductImage()->first()->name)}}" class="img-item" alt="">
                        </div>
                        <div class="content">
                            <div class="name-item">
                                {{$product->name}}
                            </div>
                            <div class="price-item">
                                {{$product->price}}
                            </div>

                        </div>
                    </div>

                    @endforeach
                </div>
            </div>

            <div class="statistical section">
                <div class="stt-item d-flex">
                    <div class="stt-pic">
                        <img src="{{url('images/stt/stt-item1.webp')}}" alt="" class="stt-img">
                    </div>

                    <div class="stt-wrap d-flex justify-content-between">
                        <div class="stt-body">
                                <div class="stt-title"><h2>Nhà cung cấp uy tín</h2></div>
                                <div class="stt-content">Take your website through the heaviest of visitor storms, thanks to our powerful next-generation cloud platform.</div>
                        </div>

                        <div class="stt-value">
                            <p class="stt-value-text">50K</p>
                            <p class="text-muted stt-comment">Recommended visitors every month for starter plan</p>
                        </div>
                    </div>
                </div>

                <div class="stt-item d-flex">
                    <div class="stt-pic">
                        <img src="{{url('images/stt/stt-item2.webp')}}" alt="" class="stt-img">
                    </div>

                    <div class="stt-wrap d-flex justify-content-between">
                        <div class="stt-body">
                                <div class="stt-title"><h2>Sản phẩm mẫu mã đa dạng</h2></div>
                                <div class="stt-content">Deliver your website at optimal speed, without any interference from us.</div>
                        </div>

                        <div class="stt-value">
                            <p class="stt-value-text">3x</p>
                            <p class="text-muted stt-comment">Faster than standard WordPress on traditional shared hosting</p>
                        </div>
                    </div>
                </div>

                <div class="stt-item d-flex">
                    <div class="stt-pic">
                        <img src="{{url('images/stt/stt-item3.webp')}}" alt="" class="stt-img">
                    </div>

                    <div class="stt-wrap d-flex justify-content-between">
                        <div class="stt-body">
                                <div class="stt-title"><h2>Mức độ hài lòng của khách hàng</h2></div>
                                <div class="stt-content">A fully-containerized cloud platform means you can forget server failures and noisy neighbors.</div>
                        </div>

                        <div class="stt-value">
                            <p class="stt-value-text">99.9%</p>
                            <p class="text-muted stt-comment">Uptime Guarantee</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="why-shop section">
                <h3>Tại sao chọn chúng tôi?</h3>
                <div class="description">
                    Simple — it’s all about you.
                </div>
                <div class="why-shop-content d-flex">
                    <div class="why-shop-item">
                        <div>
                            <img class="ws-img" src="{{url('images/ws-item.webp')}}" alt="">
                        </div>
                        <div class="ws-item-title"><h2>Privacy and Security</h2></div>
                        <div class="ws-item-content">
                            Your website security and privacy comes first at Namecheap, and we will always support individuals and consumers’ rights online. It’s our mission to keep the Internet open, free, and safe for everyone.
                        </div>
                    </div>
                    <div class="why-shop-item">
                        <div>
                            <img class="ws-img" src="{{url('images/ws-item2.webp')}}" alt="">
                        </div>
                        <div class="ws-item-title"><h2>Your Business Online</h2></div>
                        <div class="ws-item-content">
                            Boost your business with industry-premium products and services, at prices that won’t break your budget. If it doesn’t provide you with a better Internet experience, we simply don’t offer it.                        </div>
                    </div>
                    <div class="why-shop-item">
                        <div>
                            <img class="ws-img" src="{{url('images/ws-item3.webp')}}" alt="">
                        </div>
                        <div class="ws-item-title"><h2>Customer Service</h2></div>
                        <div class="ws-item-content">
                            You’re covered by a Support Team that’s renowned for being one of the most knowledgeable, friendly, and professional in the business. Real people are ready to assist you with any issue, any time, 24/7.                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="zalo-popup">
            <img src="{{url('images/zalo.png')}}" width="50px" alt="" srcset="">
        </div>
        <!-- Footer -->
        <footer class="footer section">
            <!-- Section: Links  -->
            <section class="footer-body">
                <div class="container">
                    <!-- Grid row -->
                    <div class="row footer-content">
                        <div class="col-md-9 ft-left mt-5">
                            <h1>THÔNG TIN LIÊN HỆ</h1>
                            <div class="ft-left-body">
                                <p>TRẦM HƯƠNG HOÀNG GIA</p>
                                <p>ĐỊA CHỈ: 26 HAI BÀ TRƯNG, HÀ NỘI</p>
                                <p>EMAIL: abcdef@gmail.com</p>
                                <p>HOTLINE: 0869799765</p>
                            </div>
                        </div>
                        <div class="col-md-3 ft-right mt-5">
                        <h1>SOCIAL MEDIA</h1>
                        <div class="ft-right-body">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-instagram"></i>
                            <i class="fab fa-twitter"></i>
                        </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(68, 63, 63, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script src="js/setting.js"></script>


    </body>
</html>
