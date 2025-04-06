<script setup>
import { ref, onMounted, computed } from 'vue'
import axios from 'axios'

const students = ref([])
const searchTerm = ref('')
const errorMessage = ref('')

function getStudents() {
    axios
        .get('http://127.0.0.1:8000/api/students')
        .then(response => {
            console.log('allStudents ', response.data);
            
            students.value = response.data
        })
        .catch(error => console.log(error))
}

function findStudents(){
    let key = searchTerm.value.toUpperCase()
    
    if(key.search(/HS0/) != -1){
        key = key.replace(/HS/, '')
        key = parseInt(key)
    }
    // console.log(key);
    
    axios
        .get(`http://127.0.0.1:8000/api/students/${key}`)
        .then(response => {
            console.log(response.data);
            
            students.value = response.data
        })
        .catch(error => console.log(error))
}
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
        .catch(error =>{ console.log(error),
        errorMessage.value = 'Email đã được đăng ký'
        })
}
function deleteStudent(id) {
    axios
        .delete(`http://127.0.0.1:8000/api/student/${id}`)
        .then(response => {
            console.log('deleteStudent', response.data);
            students.value = students.value.filter(student => student.id !== id);
        })
        .catch(error => 
            console.log(error))

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
                <input v-model="searchTerm" type="text" placeholder="Tìm kiếm lớp..." class="form-control w-25 input-find" />
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
                            <label for="studentEmail" class="form-label">Email</label> <span v-if="errorMessage"  style="font-size: 0.875rem;"> {{ errorMessage }}</span>
                            <input v-model="studentEmail" type="email" class="form-control" id="studentEmail" placeholder="Nhập email" :class="{'is-invalid': errorMessage}" required
    />
</div>


                            <div class="mb-3">
                                <label for="studentPhone" class="form-label">Số điện thoại</label>
                                <input v-model="studentPhone" type="text" class="form-control" id="studentPhone" placeholder="Nhập số điện thoại" required />
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
                        <td>
                            <img :src="item.image" alt="Ảnh học viên" class="rounded w-auto mx-auto d-block" style="max-width: 80px;" />
                        </td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Sửa</button>
                            <button class="btn btn-danger btn-sm" @click="deleteStudent(item.id)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<style scoped>
.input-find{
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
</style>
