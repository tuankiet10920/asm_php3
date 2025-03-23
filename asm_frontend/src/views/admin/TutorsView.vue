<template>
<div class="mt-5 bg-white rounded-2 p-4">
    <h3 class="mb-4">Bảng tổng hợp gia sư (<code>tutor_summary</code>)</h3>
    <button class="btn btn-primary mb-3">Thêm</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Gia Sư</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Tổng Lớp Dạy</th>
                    <th>Tổng Học Viên</th>
                    <th>Thu Nhập</th>
                    <th>Ngày Thanh Toán Cuối</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Trạng Thái</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nguyễn Văn A</td>
                    <td>0912345678</td>
                    <td>nguyenvana@gmail.com</td>
                    <td>5</td>
                    <td>20</td>
                    <td>60,000,000 VNĐ</td>
                    <td>2025-03-20</td>
                    <td>Chuyển khoản</td>
                    <td>Đang hoạt động</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Sửa</button>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Trần Thị B</td>
                    <td>0987654321</td>
                    <td>tranthib@gmail.com</td>
                    <td>6</td>
                    <td>15</td>
                    <td>37,500,000 VNĐ</td>
                    <td>2025-03-18</td>
                    <td>Tiền mặt</td>
                    <td>Đang hoạt động</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Sửa</button>
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Lê Văn C</td>
                    <td>0901234567</td>
                    <td>levanc@gmail.com</td>
                    <td>7</td>
                    <td>10</td>
                    <td>20,000,000 VNĐ</td>
                    <td>2025-03-15</td>
                    <td>Chuyển khoản</td>
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