<template>
    <div class="mt-5 bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp giáo viên (<code>teacher_summary</code>)</h3>
        <button class="btn btn-primary mb-3">Thêm</button>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã GV</th>
                        <th>Họ và Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Số Lớp Dạy</th>
                        <th>Tổng Thu Nhập</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>GV001</td>
                        <td>Nguyễn Văn A</td>
                        <td><img src="../../../public/assets/img/user/avatar.jpg" alt="" class="rounded w-auto mx-auto d-block" style="max-width: 80px;"></td>
                        <td>nguyenvana@gmail.com</td>
                        <td>0912345678</td>
                        <td>5</td>
                        <td>60,000,000 VNĐ</td>
                        <td>Đang hoạt động</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>GV002</td>
                        <td>Trần Thị B</td>
                        <td><img src="../../../public/assets/img/user/avatar.jpg" alt="" class="rounded w-auto mx-auto d-block" style="max-width: 80px;"></td>
                        <td>tranthib@gmail.com</td>
                        <td>0987654321</td>
                        <td>6</td>
                        <td>37,500,000 VNĐ</td>
                        <td>Đang hoạt động</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>GV003</td>
                        <td>Lê Văn C</td>
                        <td><img src="../../../public/assets/img/user/avatar.jpg" alt="" class="rounded w-auto mx-auto d-block" style="max-width: 80px;"></td>
                        <td>levanc@gmail.com</td>
                        <td>0901234567</td>
                        <td>7</td>
                        <td>20,000,000 VNĐ</td>
                        <td>Ngừng hoạt động</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    </template>