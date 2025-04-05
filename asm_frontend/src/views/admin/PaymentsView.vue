<template>
    <div class="mt-5 bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp hóa đơn (<code>invoice_summary</code>)</h3>
        <button class="btn btn-primary mb-3">Thêm</button>
        <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse; border: 1px solid #dee2e6;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Họ Và Tên</th>
                        <th>Vai Trò</th>
                        <th>Loại Giao Dịch</th>
                        <th>Tổng Số Tiền (VNĐ)</th>
                        <th>Phương Thức</th>
                        <th>Trạng Thái</th>
                        <th>Thời Gian</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>1</td>
                        <td>HD001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Học viên</td>
                        <td>Thanh toán học phí</td>
                        <td>10,000,000</td>
                        <td>Chuyển khoản</td>
                        <td>Thành công</td>
                        <td>01/03/2025</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>2</td>
                        <td>HD002</td>
                        <td>Trần Thị B</td>
                        <td>Học viên</td>
                        <td>Mua giáo trình</td>
                        <td>500,000</td>
                        <td>Tiền mặt</td>
                        <td>Thành công</td>
                        <td>15/03/2025</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>3</td>
                        <td>HD003</td>
                        <td>Lê Văn C</td>
                        <td>Nhân viên</td>
                        <td>Hoàn trả</td>
                        <td>2,000,000</td>
                        <td>Chuyển khoản</td>
                        <td>Đang xử lý</td>
                        <td>01/04/2025</td>
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