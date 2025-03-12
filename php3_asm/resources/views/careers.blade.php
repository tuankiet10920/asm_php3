@extends('layout')

@section('content')
<section class="section-header bg-tertiary pb-10">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-7">
                <h1 class="display-1 font-weight-extreme"
                    style="color: #62bfd1; font-family: 'Baloo Thambi', cursive; font-size:4rem">
                    <div>Nhận lớp dạy ngay cùng BookBook</div>
                </h1>
                <p class="lead mb-4 mb-lg-5 pr-lg-5">Chỉ với 4 bước
                    đơn giản, Book Book sẽ giúp bạn trở thành gia sư
                    4.0 nhanh chóng, tăng thêm thu nhập. Cam kết
                    không thu bất kì lệ phí nào khi đăng khí trở
                    thành gia sư của Book Book.</p>
                <a class="btn btn-primary" href="#apply">Đăng ký <i
                        class="fas fa-angle-right ml-2"></i> </a>
            </div>
            <div
                class="col-12 col-md-5 d-none d-lg-block text-center">
                <img src="/assets/img/carousel/teacher.png" alt>
            </div>
        </div>
    </div>
    <figure
        class="position-absolute bottom-0 left-0 w-100 d-none d-md-block mb-n2">
        <svg class="fill-soft" version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" viewBox="0 0 1920 43.4"
            style="enable-background:new 0 0 1920 43.4;"
            xml:space="preserve">
            <path
                d="M0,23.3c0,0,405.1-43.5,697.6,0c316.5,1.5,108.9-2.6,480.4-14.1c0,0,139-12.2,458.7,14.3 c0,0,67.8,19.2,283.3-22.7v35.1H0V23.3z"></path>
        </svg>
    </figure>
</section>
<section class="section-sm py-0 bg-soft text-white">
    <div class="container mt-n7">
        <div class="row">
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="card bg-primary p-4">
                    <div
                        class="icon icon-lg justify-content-start mb-3">
                        <span
                            class="icon icon-secondary icon-lg mb-3">
                            <div class="image-md">
                                <img
                                    src="assets/img/illustrations/guarantee.png"
                                    alt>
                            </div>
                        </span>
                    </div>
                    <h3 class="mb-4">Đảm bảo</h3>
                    <p class="text-muted text-justify">Book Book đảm
                        bảo giúp bạn tìm được lớp dạy phù hợp với
                        năng lực và thu nhập mong muốn</p>
                </div>
            </div>
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="card bg-primary p-4">
                    <div
                        class="icon icon-lg justify-content-start mb-3">
                        <span
                            class="icon icon-secondary icon-lg mb-3">
                            <div class="image-md">
                                <img
                                    src="assets/img/illustrations/flexible.png"
                                    alt>
                            </div>
                        </span>
                    </div>
                    <h3 class="mb-4">Linh hoạt</h3>
                    <p class="text-muted text-justify">Thời gian
                        nhận lớp linh động, dễ dàng sắp xếp thời
                        gian phù hợp với lịch học và công việc</p>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card bg-primary p-4">
                    <div
                        class="icon icon-lg justify-content-start mb-3">
                        <span
                            class="icon icon-secondary icon-lg mb-3">
                            <div class="image-md">
                                <img
                                    src="assets/img/illustrations/money.png"
                                    alt>
                            </div>
                        </span>
                    </div>
                    <h3 class="mb-4">Tăng thu nhập</h3>
                    <p class="text-muted text-justify">Book Book
                        giúp bạn có thêm nguồn thu nhập cao và ổn
                        định để trang trải cuộc sống</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg bg-soft">
    <div class="container">
        <div class="row justify-content-center mb-4 mb-lg-6">
            <div class="col col-md-8 text-center">
                <h2 class="display-1 font-weight-extreme px-lg-5"
                    style="color: #62bfd1; font-family: 'Baloo Thambi', cursive; font-size:3rem">
                    <div>Lớp trống đang chờ gia sư
                </h2>
                <p class="lead">Bên cạnh những lớp trống hiển
                    thị, gia sư có thể đăng ký tìm lớp theo mong
                    muốn.</p>
            </div>
        </div>
        <div class="row mb-6">
            <div class="col-12 mb-4">
                <div
                    class="card bg-primary border-0 text-white">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row">
                            <div
                                class="col-12 col-md-6 mb-4 mb-lg-0">
                                <h3 class="mb-3">Toán lớp 10,
                                    11, 12</h3>
                                <p class="text-muted mb-4"></p>
                                <div class="d-flex">
                                    <a href="#"
                                        class="stretched-link">
                                        <i
                                            class="fas fa-map-marker-alt"></i>
                                        <span
                                            class="h6 text-sm ml-2">Hồ
                                            Chí Minh</span>
                                    </a>
                                    <span class="ml-4">
                                        <i
                                            class="fas fa-user-tie"></i>
                                        <span
                                            class="h6 text-sm ml-2">Sinh
                                            viên</span>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                                <a href="#apply"
                                    class="btn btn-secondary mr-3 animate-up-2 m-0">Ứng
                                    tuyển</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div
                    class="card bg-primary border-0 text-white">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row">
                            <div
                                class="col-12 col-md-6 mb-4 mb-lg-0">
                                <h3 class="mb-3">Lý lớp 10, 11,
                                    12</h3>
                                <p class="text-muted mb-4"></p>
                                <div class="d-flex">
                                    <a href="#"
                                        class="stretched-link">
                                        <i
                                            class="fas fa-map-marker-alt"></i>
                                        <span
                                            class="h6 text-sm ml-2">Hồ
                                            Chí Minh</span>
                                    </a>
                                    <span class="ml-4">
                                        <i
                                            class="fas fa-user-tie"></i>
                                        <span
                                            class="h6 text-sm ml-2">Sinh
                                            viên</span>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                                <a href="#apply"
                                    class="btn btn-secondary mr-3 animate-up-2 m-0">Ứng
                                    tuyển</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div
                    class="card bg-primary border-0 text-white">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row">
                            <div
                                class="col-12 col-md-6 mb-4 mb-lg-0">
                                <h3 class="mb-3">Hóa lớp 10, 11,
                                    12</h3>
                                <p class="text-muted mb-4"></p>
                                <div class="d-flex">
                                    <a href="#"
                                        class="stretched-link">
                                        <i
                                            class="fas fa-map-marker-alt"></i>
                                        <span
                                            class="h6 text-sm ml-2">Hồ
                                            Chí Minh</span>
                                    </a>
                                    <span class="ml-4">
                                        <i
                                            class="fas fa-user-tie"></i>
                                        <span
                                            class="h6 text-sm ml-2">Sinh
                                            viên</span>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                                <a href="#apply"
                                    class="btn btn-secondary mr-3 animate-up-2 m-0">Ứng
                                    tuyển</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div
                    class="card bg-primary border-0 text-white">
                    <div class="card-body p-4 p-lg-5">
                        <div class="row">
                            <div
                                class="col-12 col-md-6 mb-4 mb-lg-0">
                                <h3 class="mb-3">Anh văn lớp 10,
                                    11, 12</h3>
                                <p class="text-muted mb-4"></p>
                                <div class="d-flex">
                                    <a href="#"
                                        class="stretched-link">
                                        <i
                                            class="fas fa-map-marker-alt"></i>
                                        <span
                                            class="h6 text-sm ml-2">Hồ
                                            Chí Minh</span>
                                    </a>
                                    <span class="ml-4">
                                        <i
                                            class="fas fa-user-tie"></i>
                                        <span
                                            class="h6 text-sm ml-2">Sinh
                                            viên</span>
                                    </span>
                                </div>
                            </div>
                            <div
                                class="col-12 col-md-6 d-flex align-items-center justify-content-md-end">
                                <a href="#apply"
                                    class="btn btn-secondary mr-3 animate-up-2 m-0">Ứng
                                    tuyển</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section section-md bg-light text-dark" id="apply">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="text-center px-0 px-lg-5">
                    <h2 class="mb-4">Bạn có muốn trở thành gia
                        sư của Book Book ngay không nào?</h2>
                    <p class="lead text-muted mb-5 mb-lg-6">Vui
                        lòng điền đầy đủ thông tin dưới đây
                        nhé!</p>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="firstName">Tên <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-user-alt"></i></span></div>
                                    <input class="form-control"
                                        id="firstName"
                                        placeholder="Hải"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="lastName">Họ và tên đệm
                                    <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-user-alt"></i></span></div>
                                    <input class="form-control"
                                        id="lastName"
                                        placeholder="Nguyễn Quang"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="email">Email <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-envelope"></i></span></div>
                                    <input class="form-control"
                                        id="email"
                                        placeholder="bookbook.ltd@gmail.com"
                                        type="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="phone">Số điện
                                    thoại<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-phone-square-alt"></i></span></div>
                                    <input class="form-control"
                                        id="phone"
                                        placeholder="090****123"
                                        type="number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="address">Địa chỉ<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-phone-square-alt"></i></span></div>
                                    <input class="form-control"
                                        id="address"
                                        placeholder="90 le vinh hoa"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="sex">Giới tính<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-male"></i></span></div>
                                    <input class="form-control"
                                        id="sex"
                                        placeholder="nam"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="score">Điểm thi đại
                                    học<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-copy"></i></span></div>
                                    <input class="form-control"
                                        id="score"
                                        placeholder="Khối - điểm - năm thi"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="university">Trường đại
                                    học bạn đã/đang học<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-university"></i></span></div>
                                    <input class="form-control"
                                        id="university"
                                        placeholder="Đại học Bách Khoa, tp.Hồ Chí Minh"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="experience">Kinh nghiệm
                                    dạy gia sư<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-chalkboard-teacher"></i></span></div>
                                    <input class="form-control"
                                        id="experience"
                                        placeholder="không/có - 3 năm "
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="desired-subjects">Bạn
                                    mong muốn dạy môn gì? lớp
                                    mấy?<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-chalkboard-teacher"></i></span></div>
                                    <input class="form-control"
                                        id="desired-subjects"
                                        placeholder="Môn toán - lớp 12, môn hoá - lớp 11"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="tuitor-fee">Mức lương
                                    mà bạn mong muốn cho một
                                    buổi học<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div
                                        class="input-group-prepend"><span
                                            class="input-group-text"><i
                                                class="fas fa-dollar-sign"></i></span></div>
                                    <input class="form-control"
                                        id="tuitor-fee"
                                        placeholder="100.000 vnd"
                                        type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-12 mt-lg-4">
                            <div class="form-group">
                                <label
                                    class="form-label text-muted"
                                    for="achievements">Thành
                                    tích nổi bật của bạn<span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <textarea id="achievements"
                                        class="form-control"
                                        placeholder="Giải nhất học sinh giỏi cấp thành phố - 2019"
                                        rows="8"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-12 mt-lg-4">
                            <!-- <div class="form-group">
                                <label class="form-label text-muted" for="message">Hình ảnh CMND, thẻ sinh viên, bảng điểm, bằng cấp liên quan (càng chi tiết còn được duyệt nhanh)<span class="text-danger">*</span></label>
                                <textarea id="message" class="form-control" placeholder="Làm thế nào mình có thể kết nối được với học viên?" rows="8" required></textarea>
                            </div> -->
                            <div class="text-lg-center mb-2">
                                <button type="submit"
                                    class="btn btn-primary animate-up-2 mt-4"><span
                                        class="mr-2"><i
                                            class="fas fa-paper-plane"></i></span>Gửi
                                    thông tin</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection