<template>
    <div class="mt-5 bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp lớp học (<code>class_summary</code>)</h3>
        <button class="btn btn-primary mb-3">Thêm</button>
        <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse; border: 1px solid #dee2e6;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Lớp</th>
                        <th>Tên Lớp</th>
                        <th>Môn Học</th>
                        <th>Số Học Sinh</th>
                        <th>Giảng Viên</th>
                        <th>Thời Gian Bắt Đầu</th>
                        <th>Thời Gian Kết Thúc</th>
                        <th>Doanh Thu (VNĐ)</th>
                        <th>Trạng Thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>1</td>
                        <td>LP001</td>
                        <td>Lớp A</td>
                        <td>Toán</td>
                        <td>30</td>
                        <td>Nguyễn Văn A</td>
                        <td>01/03/2025</td>
                        <td>30/06/2025</td>
                        <td>300,000,000</td>
                        <td>Đang học</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>2</td>
                        <td>LP002</td>
                        <td>Lớp B</td>
                        <td>Văn</td>
                        <td>25</td>
                        <td>Trần Thị B</td>
                        <td>15/03/2025</td>
                        <td>15/07/2025</td>
                        <td>250,000,000</td>
                        <td>Đã kết thúc</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>3</td>
                        <td>LP003</td>
                        <td>Lớp C</td>
                        <td>Anh Văn</td>
                        <td>20</td>
                        <td>Lê Văn C</td>
                        <td>01/04/2025</td>
                        <td>01/08/2025</td>
                        <td>200,000,000</td>
                        <td>Đang học</td>
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
