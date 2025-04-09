
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const typeclass = ref([])  // Danh sách lớp
const searchTerm = ref('')  // Từ khóa tìm kiếm
const errorMessage = ref('')  // Thông báo lỗi
const selectedTypeclass = ref('')

// Lấy danh sách lớp
function getTypeclass() {
    axios
        .get('http://127.0.0.1:8000/api/types-class')
        .then(response => {
            typeclass.value = response.data
        })
        .catch(error => console.log(error))
}

// Tìm kiếm lớp
function findTypeclass() {
    let key = searchTerm.value.toUpperCase()

    if (key.startsWith('GV')) {
        key = key.replace('GV', '')
        key = parseInt(key)
    }

    axios
        .get(`http://127.0.0.1:8000/api/type-class/${key}`)
        .then(response => {
            typeclass.value = response.data
        })
        .catch(error => console.log(error))
}

// Thêm lớp
function addTypeclass() {
    const newTypeclass = {
        name: typeclassName.value,
        email: typeclassEmail.value,
        phone: typeclassPhone.value,
    }

    axios
        .post('http://127.0.0.1:8000/api/type-class', newTypeclass)
        .then(response => {
            typeclass.value.push(response.data)

            const modal = document.getElementById('addTypeclassModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
            errorMessage.value = ''

            getTypeclass()
        })
        .catch(error =>{ 
            errorMessage.value = 'Lớp đã được đăng ký'
        })
}

// Xóa lớp
function deleteTypeclass(id) {
    axios
        .delete(`http://127.0.0.1:8000/api/type-class/${id}`)
        .then(response => {
            typeclasses.value = typeclasses.value.filter(typeclass => typeclass.id !== id);
        })
        .catch(error => console.log(error))
}

// Cập nhật thông tin lớp
function updateTypeclass() {
    axios
        .put(`http://127.0.0.1:8000/api/type-class/${selectedTypeclass.value.id}`, selectedTypeclass.value)
        .then(response => {
            getTypeclasses()  // Cập nhật lại danh sách lớp
            const modal = document.getElementById('editTypeclassModal')
            const modalInstance = bootstrap.Modal.getInstance(modal)
            modalInstance.hide()  // Đóng modal
            errorMessage.value = ''
        })
        .catch(error => {
            errorMessage.value =  'Lớp đã được đăng ký'
        })
}

// Chỉnh sửa thông tin lớp
function editTypeclass(id) {
    const typeclass = typeclass.value.find(typeclass => typeclass.id === id)
    if (typeclass) {
        selectedTypeclass.value = { ...typeclass }
    }
}

onMounted(() => {
    getTypeclass();
})
</script>


<template>
    <div class="bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp lớp</h3>
        <div class="mb-3 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTypeclassModal">Thêm</button>
            <form @submit.prevent="findTypeclass">
                <input v-model="searchTerm" type="text" placeholder="Tìm kiếm lớp..." class="form-control w-25 input-find" />
            </form>
        </div>

        <!-- Modal thêm lớp -->
        <div class="modal fade" id="addTypeclassModal" tabindex="-1" aria-labelledby="addTypeclassModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTypeclassModalLabel">Thêm lớp mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addTypeclass">
                            <div class="mb-3">
                                <label for="typeclassName" class="form-label">Tên Lớp</label>
                                <input v-model="typeclassName" type="text" class="form-control" id="typeclassName" placeholder="Nhập tên lớp" required />
                            </div>
                            <div class="mb-3">
                                <label for="typeclassPhone" class="form-label">Giá</label>
                                <input v-model="typeclassPhone" type="tel" class="form-control" id="typeclassPhone" placeholder="Nhập giá" required pattern="^[0-9]{10}$" />
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

        <!-- Bảng lớp -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Lớp</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in typeclass" :key="item.id">
                        <td>{{ index + 1 }}</td>
                        <td>TC00{{ item.id }}</td>
                        <td>{{ item.price }}</td>
                        <td>{{ item.status || 'Chưa hoạt động' }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" @click="editTypeclass(item.id)" data-bs-toggle="modal" data-bs-target="#editTypeclassModal">Sửa</button>
                            <button class="btn btn-danger btn-sm" @click="deleteType(item.id)">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal sửa lớp -->
    <div class="modal fade" id="editTypeclassModal" tabindex="-1" aria-labelledby="editTypeclassModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTypeclassModalLabel">Sửa thông tin lớp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form v-if="selectedTypeclass" @submit.prevent="updateTypeclass">
                        <div class="mb-3">
                            <label for="editTypeclassName" class="form-label">Tên Lớp</label>
                            <input v-model="selectedTypeclass.name" type="text" class="form-control" id="editTypeclassName" placeholder="Nhập tên lớp" required />
                        </div>
                        <div class="mb-3">
                            <label for="editTypeclassPrice" class="form-label">Giá</label>
                            <input v-model="selectedTypeclass.price" type="tel" class="form-control" id="editTypeclassPrice" placeholder="Nhập giá" required pattern="^[0-9]{10}$" />
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
