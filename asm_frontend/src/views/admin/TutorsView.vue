
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const tutors = ref([])  // Danh sách giảng viên
const searchTerm = ref('') 
const errorMessage = ref('')  // Thông báo lỗi
const selectedTutor = ref({})

const statusOptions = ['Chờ xét duyệt', 'Đã xét duyệt', 'Đang hoạt động', 'Ngừng hoạt động']

// Lấy danh sách giảng viên
function getTutors() {
    axios
        .get('http://127.0.0.1:8000/api/tutors')
        .then(response => {
            tutors.value = response.data
        })
        .catch(error => console.log(error))
}

// Tìm kiếm giảng viên
function findTutors() {
    let key = searchTerm.value.toUpperCase()

    if (key.startsWith('GV')) {
        key = key.replace('GV', '')
        key = parseInt(key)
    }

    axios
        .get(`http://127.0.0.1:8000/api/tutors/${key}`)
        .then(response => {
            tutors.value = response.data
        })
        .catch(error => console.log(error))
}

// Thêm giảng viên
function addTutor() {
    const newTutor = {
        name: tutorName.value,
        email: tutorEmail.value,
        phone: tutorPhone.value,
    }

    axios
        .post('http://127.0.0.1:8000/api/tutor', newTutor)
        .then(response => {
            tutors.value.push(response.data)

            const modal = document.getElementById('addTutorModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
            errorMessage.value = ''

            getTutors()
        })
        .catch(error =>{ 
            errorMessage.value = 'Email đã được đăng ký'
        })
}

// Xóa giảng viên
function deleteTutor(id) {
    axios
        .delete(`http://127.0.0.1:8000/api/tutor/${id}`)
        .then(response => {
            tutors.value = tutors.value.filter(tutor => tutor.id !== id);
        })
        .catch(error => console.log(error))
}

// Cập nhật thông tin giảng viên
function updateTutor() {
    axios
        .put(`http://127.0.0.1:8000/api/tutor/${selectedTutor.value.id}`, selectedTutor.value)
        .then(response => {
            getTutors()  
            const modal = document.getElementById('editTutorModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
            errorMessage.value = ''
        })
        .catch(error => {
            errorMessage.value =  'Email đã được đăng ký'
        })
}

// Chỉnh sửa thông tin giảng viên
function editTutor(id) {
    const tutor = tutors.value.find(tutor => tutor.id === id)
    if (tutor) {
        selectedTutor.value = { ...tutor }
    }
}

onMounted(() => {
    getTutors()
    
})
</script>


<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp giảng viên</h3>
        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTutorModal">Thêm</button>
            <form @submit.prevent="findTutors">
                <input v-model="searchTerm" type="text" placeholder="Tìm kiếm giảng viên..." class="form-control w-25 input-find" />
            </form>
        </div>

        <!-- Modal thêm giảng viên -->
        <div class="modal fade" id="addTutorModal" tabindex="-1" aria-labelledby="addTutorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTutorModalLabel">Thêm giảng viên mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addTutor">
                            <div class="mb-3">
                                <label for="tutorName" class="form-label">Họ và Tên</label>
                                <input v-model="tutorName" type="text" class="form-control" id="tutorName" placeholder="Nhập tên giảng viên" required />
                            </div>
                            <div class="mb-3">
                                <label for="tutorEmail" class="form-label">Email</label>
                                <span v-if="errorMessage" style="font-size: 0.875rem;"> {{ errorMessage }}</span>
                                <input v-model="tutorEmail" type="email" class="form-control" id="tutorEmail" placeholder="Nhập email" :class="{'is-invalid': errorMessage}" required />
                            </div>
                            <div class="mb-3">
                                <label for="tutorPhone" class="form-label">Số điện thoại</label>
                                <input v-model="tutorPhone" type="tel" class="form-control" id="tutorPhone" placeholder="Nhập số điện thoại" required pattern="^[0-9]{10}$" />
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

        <!-- Bảng giảng viên -->
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
                    <tr v-for="(item, index) in tutors" :key="item.id">
                        <td>{{ index + 1 }}</td>
                        <td>GV00{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td><img :src="'http://localhost:8000/images/tutors/'+item.image" alt="image" class="tutor-image" /></td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.classes?.length || 0 }}</td>
                        <td>{{ item.total_income || 0 }}</td>
                        <td>{{ item.status || 'Chưa hoạt động' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" @click="editTutor(item.id)" data-bs-toggle="modal" data-bs-target="#editTutorModal">Sửa</button>
                            <button class="btn btn-danger btn-sm" @click="deleteTutor(item.id)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal sửa giảng viên -->
    <div class="modal fade" id="editTutorModal" tabindex="-1" aria-labelledby="editTutorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTutorModalLabel">Sửa thông tin giảng viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form v-if="selectedTutor" @submit.prevent="updateTutor">
                        <div class="mb-3">
                            <label for="editTutorName" class="form-label">Họ và Tên</label>
                            <input v-model="selectedTutor.name" type="text" class="form-control" id="editTutorName" placeholder="Nhập tên giảng viên" required />
                        </div>
                        <div class="mb-3">
                            <label for="editTutorEmail" class="form-label">Email</label>
                            <span v-if="errorMessage" style="font-size: 0.875rem;"> {{ errorMessage }}</span>
                            <input v-model="selectedTutor.email" type="email" class="form-control" id="editTutorEmail" placeholder="Nhập email" :class="{'is-invalid': errorMessage}" required />
                        </div>
                        <div class="mb-3">
                            <label for="editTutorPhone" class="form-label">Số điện thoại</label>
                            <input v-model="selectedTutor.phone" type="tel" class="form-control" id="editTutorPhone" placeholder="Nhập số điện thoại" required pattern="^[0-9]{10}$" />
                        </div>
                        <div class="mb-3">
                            <label for="editTutorstatus" class="form-label">Trạng thái</label>
                            <select v-model="selectedTutor.status" class="form-control" id="editTutorstatus" required>
                            <option 
                                v-for="status in statusOptions" 
                                :value="status"
                                :disabled="status === 'Chờ xét duyệt' && selectedTutor.status !== 'Chờ xét duyệt'"
                            >
                                {{ status }}
                            </option>
                        </select>

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

.tutor-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
}
</style>
