<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const classes = ref([])
const tutors = ref([])
const searchTerm = ref('')

function getClasses() {
    axios
        .get('http://127.0.0.1:8000/api/classes')
        .then(response => {
            classes.value = response.data
        })
        .catch(error => console.log(error))
}
function getTutors(){
    axios
        .get('http://127.0.0.1:8000/api/tutors')
        .then(response => {
            tutors.value = response.data
        })
        .catch(error => console.log(error))
}
const searchClasses = computed(() => {
    return classes.value.filter(cls => {
        const classId = `LH00${cls.id}`;
        const searchLowerCase = searchTerm.value.toLowerCase();
        
        return (cls.subject?.name?.toLowerCase().includes(searchLowerCase)) || 
               (classId.toLowerCase().includes(searchLowerCase))||
               (cls.subject?.name_lesson?.toLowerCase().includes(searchLowerCase))
    })
})

onMounted(() => {
    getClasses(),
    getTutors()
})
</script>

<template>
    <div class="mt-5 bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp lớp học (<code>class_summary</code>)</h3>

        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClassModal">Thêm</button>
            <input v-model="searchTerm" type="text" placeholder="Tìm kiếm lớp..." class="form-control w-25" />
        </div>
        <div class="modal fade" id="editClassModal" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editClassModalLabel">Thêm thông tin lớp học</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="editClassName" class="form-label">Tên Lớp</label>
                                <input type="text" class="form-control" id="editClassName" placeholder="Nhập tên lớp" />
                            </div>
                            <div class="mb-3">
                                <label for="editSubject" class="form-label">Môn Học</label>
                                <input type="text" class="form-control" id="editSubject" placeholder="Nhập môn học" />
                            </div>
                            <div class="mb-3">
                                <label for="editTutor" class="form-label">Giảng Viên</label>
                                <select class="form-control" id="editTutor">
                                    <option value="">Chọn giảng viên</option>
                                    <option v-for="tutor in tutors" :value="tutor.id" :key="tutor.id">
                                        {{ tutor.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Giá Tiền (VNĐ)</label>
                                <input type="number" class="form-control" id="editPrice" placeholder="Nhập giá tiền" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bảng lớp học -->
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
                    <tr v-for="(cls, index) in searchClasses" style="border: 1px solid #dee2e6;">
                        <td>{{ index + 1 }}</td>
                        <td>{{ 'LH00' + cls.id }}</td>
                        <td>{{ cls.subject?.name_lesson || 'Không có tên' }}</td>
                        <td>{{ cls.subject?.name || 'Không có môn học' }}</td>
                        <td>{{ cls.qty_students || 0 }}</td>
                        <td>{{ cls.tutor?.name || 'Chưa có giảng viên' }}</td>
                        <td>{{ cls.time_start || '' }}</td>
                        <td>{{ cls.time_end || '' }}</td>
                        <td>{{ cls.type?.price || 0 }}</td>
                        <td>
                            <span :class="cls.status === 1 ? 'badge bg-success' : 'badge bg-secondary'">
                                {{ cls.status === 1 ? 'Đang hoạt động' : 'Ngưng hoạt động' }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editClassModal">Sửa</button>
                            <button class="btn btn-danger btn-sm">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
.modal-dialog-centered {
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    border-radius: 12px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}

.table thead th {
    background-color: #f8f9fa;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

.modal-header {
    color: white;
    border-radius: 12px 12px 0 0;
}

.modal-footer button {
    border-radius: 10px;
}

.table td, .table th {
    text-align: center;
    vertical-align: middle;
}
</style>
