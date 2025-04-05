<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const tutors = ref([])
const searchTerm = ref('')

function getTutors() {
    axios
        .get('http://127.0.0.1:8000/api/tutors')
        .then(response => {
            tutors.value = response.data
        })
        .catch(error => console.log(error))
}

const searchTutors = computed(() => {
    return tutors.value.filter(tutor => {
        const tutorID = `GV00${tutor.id}`;
        const searchLowerCase = searchTerm.value.toLowerCase();
        return tutor.name.toLowerCase().includes(searchLowerCase) || 
               tutorID.toLowerCase().includes(searchLowerCase)
    })
})

const totalClasses = computed(() => {
    return searchTutors.value.reduce((total, tutor) => total + (tutor.classes?.length || 0), 0)
})

const totalIncome = computed(() => {
    return searchTutors.value.reduce((total, tutor) => {
        return total + tutor.classes?.reduce((classTotal, classItem) => {
            return classTotal + (classItem.type?.price || 0)
        }, 0) || 0
    }, 0)
})

onMounted(() => {
    getTutors()
})
</script>

<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp giảng viên (<code>tutor_summary</code>)</h3>
        <div class="mb-3 d-flex justify-content-between">
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Thêm học viên mới</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" id="studentName" placeholder="Nhập tên học viên" />
                    </div>
                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="studentEmail" placeholder="Nhập email" />
                    </div>
                    <div class="mb-3">
                        <label for="studentPhone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="studentPhone" placeholder="Nhập số điện thoại" />
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

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">Thêm</button>
            <input v-model="searchTerm" type="text" placeholder="Tìm kiếm..." class="form-control w-25" />
        </div>
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
                    <tr v-for="(item, index) in searchTutors" :key="item.id">
                        <td>{{ index + 1 }}</td>
                        <td>GV00{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td><img :src="item.image" alt="image" class="tutor-image" /></td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.classes?.length || 0 }}</td>
                        <td>{{ item.total_income || 0 }}</td>
                        <td>{{ item.status || 'Chưa hoạt động' }}</td>
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

.tutor-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}
</style>
