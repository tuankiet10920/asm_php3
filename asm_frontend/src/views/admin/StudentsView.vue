<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const students = ref([])
const searchTerm = ref('')
const errorMessage = ref('')
// Lưu thông tin học viên được chọn
const selectedStudent = ref('')
function getStudents() {
    axios
        .get('http://127.0.0.1:8000/api/students')
        .then(response => {
            console.log('allStudents ', response.data);
            students.value = response.data
        })
        .catch(error => console.log(error))
}

// Tìm kiếm học viên
function findStudents() {
    let key = searchTerm.value.toUpperCase()
    
    if (key.startsWith('HS')) {
        key = key.replace('HS', '');
        key = parseInt(key); 
    }
    
    axios
        .get(`http://127.0.0.1:8000/api/students/${key}`)
        .then(response => {
            console.log(response.data);
            students.value = response.data
        })
        .catch(error => console.log(error))
}

// Thêm học viên
function addStudent() {
    const newStudent = {
        name: studentName.value,
        email: studentEmail.value,
        phone: studentPhone.value,
    }

    axios
        .post('http://127.0.0.1:8000/api/student', newStudent)
        .then(response => {
            console.log('addStudent', response.data)
            students.value.push(response.data)

            // Đóng modal
            const modal = document.getElementById('addStudentModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide() // Đóng modal

            getStudents()
        })
        .catch(error =>{ 
            console.log(error)
            errorMessage.value = 'Email đã được đăng ký'
        })
}

// Xóa học viên
function deleteStudent(id) {
    axios
        .delete(`http://127.0.0.1:8000/api/student/${id}`)
        .then(response => {
            console.log('deleteStudent', response.data);
            students.value = students.value.filter(student => student.id !== id);
        })
        .catch(error => console.log(error))
}


// Cập nhật thông tin học viên
function updateStudent() {
    axios
        .put(`http://127.0.0.1:8000/api/student/${selectedStudent.value.id}`, selectedStudent.value)
        .then(response => {
            console.log('updateStudent', response.data)
            getStudents()  // Cập nhật lại danh sách học viên
            const modal = document.getElementById('editStudentModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
        })
        .catch(error => {console.log(error)
            errorMessage.value =  'Email đã được đăng ký'
        })
}
// gán giá trị 
function editStudent(id) {
    const student = students.value.find(student => student.id === id)
    if (student) {
        selectedStudent.value = { ...student }
    }
}



onMounted(() => {
    getStudents()
})
</script>
<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp học viên</h3>
        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">Thêm</button>
            <form @submit.prevent="findStudents">
                <input v-model="searchTerm" type="text" placeholder="Tìm kiếm sinh viên..." class="form-control w-25 input-find" />
            </form>
        </div>

        <!-- Modal thêm học viên -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Thêm học viên mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addStudent">
                            <div class="mb-3">
                                <label for="studentName" class="form-label">Họ và Tên</label>
                                <input v-model="studentName" type="text" class="form-control" id="studentName" placeholder="Nhập tên học viên" required />
                            </div>
                            <div class="mb-3">
                                <label for="studentEmail" class="form-label">Email</label> 
                                <span v-if="errorMessage" style="font-size: 0.875rem;"> {{ errorMessage }}</span>
                                <input v-model="studentEmail" type="email" class="form-control" id="studentEmail" placeholder="Nhập email" :class="{'is-invalid': errorMessage}" required />
                            </div>
                            <div class="mb-3">
                                <label for="studentPhone" class="form-label">Số điện thoại</label>
                                <input v-model="studentPhone" type="tel" class="form-control" id="studentPhone" placeholder="Nhập số điện thoại" required pattern="^[0-9]{10}$" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>

        <!-- Bảng học viên -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã HS</th>
                        <th>Họ và Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in students" :key="item.id">
                        <td>{{ index + 1 }}</td>
                        <td>HS00{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td><img :src="'http://localhost:8000/images/students/'+item.image" alt="image" class="student-image" /></td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" @click="editStudent(item.id)" data-bs-toggle="modal" data-bs-target="#editStudentModal">Sửa</button>
                            <button class="btn btn-danger btn-sm" @click="deleteStudent(item.id)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal sửa học viên -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Sửa thông tin học viên</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Chỉ hiển thị form khi selectedStudent không phải là null -->
                <form v-if="selectedStudent" @submit.prevent="updateStudent">
                    <div class="mb-3">
                        <label for="editStudentName" class="form-label">Họ và Tên</label>
                        <input v-model="selectedStudent.name" type="text" class="form-control" id="editStudentName" placeholder="Nhập tên học viên" required />
                    </div>
                    <div class="mb-3">
                        <label for="editStudentEmail" class="form-label">Email</label>
                        <span v-if="errorMessage" style="font-size: 0.875rem;"> {{ errorMessage }}</span>
                        <input v-model="selectedStudent.email" type="email" class="form-control" id="editStudentEmail" placeholder="Nhập email" :class="{'is-invalid': errorMessage}" required />
                    </div>
                    <div class="mb-3">
                        <label for="editStudentPhone" class="form-label">Số điện thoại</label>
                        <input v-model="selectedStudent.phone" type="tel" class="form-control" id="editStudentPhone" placeholder="Nhập số điện thoại" required pattern="^[0-9]{10}$" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>

</template>
<style scoped>
.input-find {
    width: 250px !important;
}
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

.student-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
}
</style>
