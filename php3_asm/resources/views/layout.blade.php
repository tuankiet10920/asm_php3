<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <!-- Primary Meta Tags -->
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="title" content=”Book Book - Gia sư nhanh">
    <meta name="author" content="Nguyễn Tấn Dũng">
    <meta name="description"
        content="Gia sư dạy kèm hiệu quả cho một buổi học tại Thành phố Hồ Chí Minh">
    <meta name="keywords" content=”gia sư nhanh, ứng dụng kết nối gia sư">
    <link rel="canonical" href="https://book-book.github.io/index.html">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url"
        content="https://book-book.github.io/index.html">
    <meta property="og:title" content="Book Book - Gia sư nhanh">
    <meta property="og:description"
        content="Gia sư dạy kèm hiệu quả cho một buổi học tại Thành phố Hồ Chí Minh">
    <meta property="og:image"
        content="https://github.com/book-book/book-book.github.io/blob/master/assets/img/brand/page.png">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120"
        href="assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="assets/img/favicon/logo.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="assets/img/favicon/logo.png">
    <link rel="manifest" href="assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="assets/img/favicon/safari-pinned-tab.svg"
        color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <link type="text/css" href="<?= asset('css/bookbook.css') ?>" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Baloo+Thambi&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header-global">
        <nav id="navbar-main"
            class="navbar navbar-main navbar-expand-lg navbar-theme-primary navbar-light navbar-theme-primary headroom py-lg-2 px-lg-6">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="assets/img/brand/logo.png"
                        style="height: 3rem" alt="Mobile Logo">
                </a>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="index.html"><img
                                        src="assets/img/brand/logo-dark.png"
                                        style="height: 3rem"
                                        alt="Mobile Logo"></a>
                            </div>
                            <div class="col-6 collapse-close">
                                <a href="#navbar_global" role="button"
                                    class="fas fa-times"
                                    data-toggle="collapse"
                                    data-target="#navbar_global"
                                    aria-controls="navbar_global"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                    </div>
                    <ul
                        class="navbar-nav navbar-nav-hover justify-content-center ml-auto">
                        <li class="nav-item"><a href="/careers"
                                class="nav-link">Tuyển Dụng</a></li>
                        <li class="nav-item"><a href="/about"
                                class="nav-link">Về chúng tôi</a></li>
                        <li class="nav-item"><a href="/contact"
                                class="nav-link">Liên hệ</a></li>
                    </ul><a href="#download_app" target="_blank"
                        class="btn btn-buy btn-secondary animate-up-2 d-none d-lg-inline ml-3">Trải
                        nghiệm ngay</a>
                </div>
                <div class="d-flex d-lg-none align-items-center">
                    <button class="navbar-toggler" type="button"
                        data-toggle="collapse" data-target="#navbar_global"
                        aria-controls="navbar_global" aria-expanded="false"
                        aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                </div>
            </div>
        </nav>
    </header>
    <main class="bg-soft">
        <!-- <div class="preloader bg-soft flex-column justify-content-center align-items-center"><img src="assets/img/spinner.svg" alt="Spinner loader"></div> -->
        <!-- Hero -->
        @yield('content')
        <!-- End of section -->

        <footer
            class="footer section pb-3 bg-primary text-white overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <a class="footer-brand mr-lg-5"
                            href="index.html"><a
                                class="navbar-brand"
                                href="index.html"
                                style="font-family: 'Baloo Thambi', cursive; font-size:2rem; color: #fff"><span>Book</span>
                                <span>Book</span></a></a>
                        <p class="my-4">Book Book là một ứng
                            dụng cho phép các bạn học sinh tìm
                            kiếm và kết nối gia sư cho một buổi
                            ôn tập nhất định nhanh nhất.</p>
                    </div>
                    <div class="col-12 col-xl-4 mb-5 mb-xl-0">
                        <h5 class="mb-3">Đăng ký</h5>
                        <p class="font-sm">Các tin tức, bài viết
                            và thông tin khuyến mãi của Book
                            book, được gửi thẳng vào hộp thư đến
                            của bạn.</p>
                        <form action="#" class="row">
                            <div class="col-8">
                                <input type="email"
                                    class="form-control mb-0"
                                    placeholder="Email Address"
                                    name="email" required>
                            </div>
                            <div class="col-4 pl-0 pr-2">
                                <button type="submit"
                                    class="btn btn-secondary animate-up-2">Subscribe</button>
                            </div>
                        </form><small class="mt-3 form-text">Tụi
                            mình sẽ không chia sẻ thông tin của
                            bạn với bất cứ ai, xem <a
                                class="font-weight-bold"
                                href="legal.html">Chính sách của
                                mình ở đây nhé</a></small>
                    </div>
                </div>
                <hr class="my-lg-5">
                <div class="row">
                    <div class="col pb-4 mb-md-0">
                        <div
                            class="d-flex text-center justify-content-center align-items-center">
                            <p class="font-weight-normal mb-0">©
                                <a
                                    href="https://book-book.github.io/"
                                    target="_blank">Book
                                    Book</a> <span
                                    class="current-year"></span>.
                                All rights reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="assets/js/bookbook.js"></script>
</body>

</html>