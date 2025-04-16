<script setup>
import { onMounted, ref } from 'vue'
import axios from 'axios'

const classes = ref([])
const tutors = ref([])
const subjects = ref([])
const typeclass = ref([])

const id_subject = ref('')
const id_tutor = ref('')
const id_type = ref('')

const searchTerm = ref('')
const statusOptions = ['Chưa hoạt động', 'Đang hoạt động', 'Ngừng hoạt động']

// Edit class data
const editClass = ref({
    id_subject: '',
    id_tutor: '',
    id_type: '',
    status: ''
})
const selectedClassId = ref(null)

// Fetch classes, tutors, types, and subjects
function getClasses() {
    axios.get('http://127.0.0.1:8000/api/classes')
        .then(response => {
            classes.value = response.data
        })
        .catch(error => console.log(error))
}

function getTutors() {
    axios.get('http://127.0.0.1:8000/api/tutors')
        .then(response => {
            tutors.value = response.data
        })
        .catch(error => console.log(error))
}

function getTypes() {
    axios.get('http://127.0.0.1:8000/api/types-class')
        .then(response => {
            typeclass.value = response.data
        })
        .catch(error => console.log(error))
}

function getSubjects() {
    axios.get('http://127.0.0.1:8000/api/subjects')
        .then(response => {
            subjects.value = response.data
        })
        .catch(error => console.log(error))
}

// Search classes by name or ID
const searchClasses = async () => {
    axios.get(`http://localhost:8000/api/classes/search/${searchTerm.value}`)
        .then(response => {
            classes.value = response.data
        })
        .catch(error => console.log(error))
}

// Add a new class
function addClass() {
    if (!id_subject.value || !id_tutor.value || !id_type.value) {
        alert("Vui lòng chọn đầy đủ thông tin.");
        return;
    }

    const newClass = {
        id_subject: id_subject.value,
        id_tutor: id_tutor.value,
        id_type: id_type.value,
    }

    axios.post('http://127.0.0.1:8000/api/class', newClass)
        .then(response => {
            classes.value.push(response.data)

            // Close modal
            const modal = document.getElementById('addClassModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()
            getClasses()
        })
        .catch(error => {
            console.log(error)
        })
}

// Edit class data in modal
function editClassData(cls) {
    selectedClassId.value = cls.id
    editClass.value = {
        id_subject: cls.id_subject,
        id_tutor: cls.id_tutor,
        id_type: cls.id_type,
        status: cls.status || ''
    }
}

// Update class
function updateClass() {
    const updatedData = {
        id_subject: editClass.value.id_subject,
        id_tutor: editClass.value.id_tutor,
        id_type: editClass.value.id_type,
        status: editClass.value.status
    }

    axios.put(`http://127.0.0.1:8000/api/class/${selectedClassId.value}`, updatedData)
        .then(() => {
            // Close modal
            const modal = document.getElementById('editClassModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()

            // Refresh class list
            getClasses()
        })
        .catch(error => console.log(error))
}

// Delete class
function deleteClass(id) {
        axios.delete(`http://127.0.0.1:8000/api/class/${id}`)
            .then(() => {
                getClasses()
            })
            .catch(error => console.log(error))
    }

onMounted(() => {
    getClasses()
    getTutors()
    getSubjects()
    getTypes()
})
</script>

<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp lớp học (<code>class_summary</code>)</h3>

        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClassModal">Thêm</button>
            <form @submit.prevent="searchClasses">
                <input v-model="searchTerm" type="text" placeholder="Tìm kiếm lớp học..." class="form-control w-25 input-find" />
            </form>
        </div>

        <!-- Modal to Add Class -->
        <div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addClassModalLabel">Thêm lớp học mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addClass">
                            <!-- Subject Selection -->
                            <div class="mb-3">
                                <label class="form-label">Chọn môn học</label>
                                <select v-model="id_subject" class="form-select" required>
                                    <option disabled value="">-- Chọn môn học --</option>
                                    <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                                        {{ subject.name }}
                                    </option>
                                </select>
                            </div>

                            <!-- Tutor Selection -->
                            <div class="mb-3">
                                <label class="form-label">Chọn giảng viên</label>
                                <select v-model="id_tutor" class="form-select" required>
                                    <option disabled value="">-- Chọn giảng viên --</option>
                                    <option v-for="tutor in tutors" :key="tutor.id" :value="tutor.id">
                                        {{ tutor.name }}
                                    </option>
                                </select>
                            </div>

                            <!-- Type of Class Selection -->
                            <div class="mb-3">
                                <label class="form-label">Chọn loại lớp học</label>
                                <select v-model="id_type" class="form-select" required>
                                    <option disabled value="">-- Chọn loại lớp học --</option>
                                    <option v-for="type in typeclass" :key="type.id" :value="type.id">
                                        {{ type.name }}
                                    </option>
                                </select>
                            </div>

                            <!-- Action Buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Class List Table -->
        <div class="table-responsive">
            <table class="table table-bordered" style="border-collapse: collapse; border: 1px solid #dee2e6;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã Lớp</th>
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
                    <tr v-for="(cls, index) in classes" :key="cls.id" style="border: 1px solid #dee2e6;">
                        <td>{{ index + 1 }}</td>
                        <td>{{ 'LH00' + cls.id }}</td>
                        <td>{{ cls.subject?.name || 'Chưa có môn học' }}</td>
                        <td>{{ cls.students?.length || 0 }}</td>
                        <td>{{ cls.tutor?.name || 'Chưa có giảng viên' }}</td>
                        <td>{{ new Date(cls.time_start).toLocaleDateString('vi-VN') }}</td>
                        <td>{{ cls.time_end ? new Date(cls.time_end).toLocaleDateString('vi-VN') : '' }}</td>
                        <td>{{ cls.type?.price?.toLocaleString('vi-VN') || 0 }}</td>
                        <td>{{ cls.status }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editClassModal" @click="editClassData(cls)">
                                Sửa
                            </button>
                            <button class="btn btn-danger btn-sm" @click="deleteClass(cls.id)">
                                Xóa
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Edit Class Modal -->
<div class="modal fade" id="editClassModal" tabindex="-1" aria-labelledby="editClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="editClassModalLabel">Chỉnh sửa lớp học</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="updateClass">
                    <!-- Subject Selection -->
                    <div class="mb-3">
                        <label class="form-label">Chọn môn học</label>
                        <select v-model="editClass.id_subject" class="form-select" required>
                            <option disabled value="">-- Chọn môn học --</option>
                            <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                                {{ subject.name }}
                            </option>
                        </select>
                    </div>

                    <!-- Tutor Selection -->
                    <div class="mb-3">
                        <label class="form-label">Chọn giảng viên</label>
                        <select v-model="editClass.id_tutor" class="form-select" required>
                            <option disabled value="">-- Chọn giảng viên --</option>
                            <option v-for="tutor in tutors" :key="tutor.id" :value="tutor.id">
                                {{ tutor.name }}
                            </option>
                        </select>
                    </div>

                    <!-- Type of Class Selection -->
                    <div class="mb-3">
                        <label class="form-label">Chọn loại lớp học</label>
                        <select v-model="editClass.id_type" class="form-select" required>
                            <option disabled value="">-- Chọn loại lớp học --</option>
                            <option v-for="type in typeclass" :key="type.id" :value="type.id">
                                {{ type.name }}
                            </option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select v-model="editClass.status" class="form-select" required>
    <option 
        v-for="status in statusOptions" 
        :key="status" 
        :value="status"
        :disabled="(status === 'Chưa hoạt động' && editClass.status !== 'Chưa hoạt động') || 
                 (status === 'Đang hoạt động' && editClass.status !== 'Đang hoạt động' && editClass.status !== 'Chưa hoạt động')"
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
