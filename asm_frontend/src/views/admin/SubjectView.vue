
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const subject = ref([])  // Danh sách môn
const searchTerm = ref('')  // Từ khóa tìm kiếm
const errorMessage = ref('')  // Thông báo lỗi
const selectedSubject = ref('')

// Lấy danh sách môn
function getSubject() {
    axios
        .get('http://127.0.0.1:8000/api/subjects')
        .then(response => {
            subject.value = response.data
        })
        .catch(error => console.log(error))
}

// Tìm kiếm môn
function findSubject() {
    let key = searchTerm.value.toUpperCase()

    if (key.startsWith('TC')) {
        key = key.replace('TC', '')
        key = parseInt(key)
    }

    axios
        .get(`http://127.0.0.1:8000/api/subject/${key}`)
        .then(response => {
            subject.value = response.data
        })
        .catch(error => console.log(error))
}

// Thêm môn
function addSubject() {
    const newSubject = {
        name: subjectName.value,
        email: subjectEmail.value,
        phone: subjectPhone.value,
    }

    axios
        .post('http://127.0.0.1:8000/api/subject', newSubject)
        .then(response => {
            subject.value.push(response.data)

            const modal = document.getElementById('addSubjectModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
            errorMessage.value = ''

            getTypeclass()
        })
        .catch(error =>{ 
            errorMessage.value = 'môn đã được đăng ký'
        })
}

// Xóa môn
function deleteSubject(id) {
    axios
        .delete(`http://127.0.0.1:8000/api/subject/${id}`)
        .then(response => {
            subjects.value = subjects.value.filter(subject => subject.id !== id);
        })
        .catch(error => console.log(error))
}

// Cập nhật thông tin môn
function updateSubject() {
    axios
        .put(`http://127.0.0.1:8000/api/subject/${selectedSubject.value.id}`, selectedSubject.value)
        .then(response => {
            getSubject()  // Cập nhật lại danh sách môn
            const modal = document.getElementById('editSubjectModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
            errorMessage.value = ''
        })
        .catch(error => {
            errorMessage.value =  'môn đã được đăng ký'
        })
}

// Chỉnh sửa thông tin môn
function editSubject(id) {
    const found = subject.value.find(item => item.id === id)
    if (found) {
        selectedSubject.value = { ...found }
    }
}
onMounted(() => {
    getSubject();
})
</script>


<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp môn</h3>
        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Thêm</button>
            <form @submit.prevent="findSubject">
                <input v-model="searchTerm" type="text" placeholder="Tìm kiếm môn..." class="form-control w-25 input-find" />
            </form>
        </div>

        <!-- Modal thêm môn -->
        <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSubjectModalLabel">Thêm môn mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addSubject">
                            <div class="mb-3">
                                <label for="subjectName" class="form-label">Tên môn</label>
                                <input v-model="subjectName" type="text" class="form-control" id="subjectName" placeholder="Nhập tên môn" required />
                            </div>
                            <div class="mb-3">
                                <label for="subjectlesson" class="form-label">Giá</label>
                                <input v-model="subjectlesson" type="text" class="form-control" id="subjectlesson" placeholder="Nhập bài học" required />
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

        <!-- Bảng môn -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên môn</th>
                        <th>Hình ảnh</th>
                        <th>Tên bài học</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in subject" :key="item.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ item.name }}</td>
                        <td><img :src="'http://localhost:8000/images/subject/'+item.image" alt="image" class="tutor-image" /></td>
                        <td>{{ item.name_lesson }}</td>
                        <td>{{ item.status || 'Chưa hoạt động' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" @click="editSubject(item.id)" data-bs-toggle="modal" data-bs-target="#editSubjectModal">Sửa</button>
                            <button class="btn btn-danger btn-sm" @click="deleteSubject(item.id)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal sửa môn -->
    <div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubjectModalLabel">Sửa thông tin môn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form v-if="selectedSubject" @submit.prevent="updateSubject">
                        <div class="mb-3">
                            <label for="subjectName" class="form-label">Tên môn</label>
                            <input v-model="selectedSubject.name" type="text" class="form-control" id="editSubjectName" placeholder="Nhập tên môn" required />                        </div>
                        <div class="mb-3">
                            <label for="subjectlesson" class="form-label">Tên bài học</label>
                            <input v-model="selectedSubject.lesson" type="text" class="form-control" id="editSubjectlesson" placeholder="Nhập bài học" required />                        </div>
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
