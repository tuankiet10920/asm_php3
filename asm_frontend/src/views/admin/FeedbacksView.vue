<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp đánh giá và phản hồi (<code>feedback_summary</code>)</h3>
        <button class="btn btn-primary mb-3">Thêm</button>
        <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse; border: 1px solid #dee2e6;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã phản hồi</th>
                        <th>Người gửi</th>
                        <th>Vai trò</th>
                        <th>Người nhận</th>
                        <th>Vai trò nhận</th>
                        <th>Loại phản hồi</th>
                        <th>Nội dung</th>
                        <th>Xếp hạng</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>1</td>
                        <td>PH001</td>
                        <td>Nguyễn Văn A</td>
                        <td>Học viên</td>
                        <td>Trần Thị B</td>
                        <td>Giảng viên</td>
                        <td>Khen ngợi</td>
                        <td>Giảng dạy nhiệt tình và dễ hiểu</td>
                        <td>5</td>
                        <td>Đã xử lý</td>
                        <td>01/03/2025</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>2</td>
                        <td>PH002</td>
                        <td>Trần Thị B</td>
                        <td>Học viên</td>
                        <td>Lê Văn C</td>
                        <td>Nhân viên</td>
                        <td>Đề xuất</td>
                        <td>Môi trường học tập thoải mái</td>
                        <td>4</td>
                        <td>Đang xử lý</td>
                        <td>15/03/2025</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                    <tr style="border: 1px solid #dee2e6;">
                        <td>3</td>
                        <td>PH003</td>
                        <td>Lê Văn C</td>
                        <td>Nhân viên</td>
                        <td>Nguyễn Văn A</td>
                        <td>Quản lý</td>
                        <td>Phàn nàn</td>
                        <td>Cần cải thiện thiết bị dạy học</td>
                        <td>3</td>
                        <td>Chưa xử lý</td>
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