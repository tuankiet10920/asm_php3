<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const degrees = ref([])
const searchKey = ref('')
const imagePath = 'http://localhost:8000/images/degrees/'

const newDegree = ref({ name: '', id_tutor: '' })
const newDegreeImage = ref(null)

const selectedDegree = ref({})
const editDegreeImage = ref(null)

// Lấy danh sách
const getDegrees = async () => {
  const res = await axios.get('http://localhost:8000/api/degrees')
  degrees.value = res.data
}

const tutors = ref([])

const getTutors = async () => {
  const res = await axios.get('http://localhost:8000/api/tutors')
  tutors.value = res.data
}

// Tìm kiếm
const searchDegrees = async () => {
  if (!searchKey.value.trim()) return getDegrees()
  const res = await axios.get(`http://localhost:8000/api/degrees/search/${searchKey.value}`)
  degrees.value = res.data
}

// Thêm
const handleImageUpload = (e) => {
  newDegreeImage.value = e.target.files[0]
}

const addDegree = async () => {
  const form = new FormData()
  form.append('name', newDegree.value.name)
  form.append('id_tutor', Number(newDegree.value.id_tutor)) 
  form.append('image', newDegreeImage.value)

  await axios.post('http://localhost:8000/api/degree', form)
  getDegrees()

  newDegree.value = { name: '', id_tutor: '' }
  newDegreeImage.value = null
  bootstrap.Modal.getInstance(document.getElementById('addModal')).hide()
}

// Sửa
const editDegree = (degree) => {
  selectedDegree.value = { ...degree }
  editDegreeImage.value = null

  new bootstrap.Modal(document.getElementById('editModal')).show()
}
const handleEditImage = (e) => {
  editDegreeImage.value = e.target.files[0]
}
const updateDegree = async () => {
  const form = new FormData()
  form.append('name', selectedDegree.value.name)
  form.append('id_tutor', Number(selectedDegree.value.id_tutor))
  if (editDegreeImage.value) {
    form.append('image', editDegreeImage.value)
  }
  await axios.post(
    `http://localhost:8000/api/degree/${selectedDegree.value.id}?_method=PUT`,
    form
  )
  getDegrees()
  bootstrap.Modal.getInstance(document.getElementById('editModal')).hide()
}



// Xoá
const deleteDegree = async (id) => {
  await axios.delete(`http://localhost:8000/api/degree/${id}`)
  getDegrees()
}

onMounted(() => {
  getDegrees()
  getTutors()

})
</script>
<template>
  <div class="bg-white rounded-2 p-4">
    <h3 class="mb-4">Bảng tổng hợp bằng cấp</h3>
    <div class="mb-3 d-flex justify-content-between">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Thêm</button>
      <form @submit.prevent="searchDegrees">
        <input v-model="searchKey" type="text" placeholder="Tìm kiếm bằng cấp..." class="form-control w-25 input-find" />
      </form>
    </div>

    <!-- Modal thêm -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Thêm bằng cấp mới</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="addDegree">
              <div class="mb-3">
                <label class="form-label">Tên bằng cấp</label>
                <input v-model="newDegree.name" type="text" class="form-control" required />
              </div>
              <div class="mb-3">
  <label class="form-label">Chọn giảng viên</label>
  <select v-model="newDegree.id_tutor" class="form-select" required>
    <option disabled value="">-- Chọn giảng viên --</option>
    <option v-for="tutor in tutors" :key="tutor.id" :value="tutor.id">
      {{ tutor.name }}
    </option>
  </select>
</div>

              <div class="mb-3">
                <label class="form-label">Hình ảnh</label>
                <input @change="handleImageUpload" type="file" class="form-control" required />
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

    <!-- Modal sửa -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Sửa bằng cấp</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form v-if="selectedDegree" @submit.prevent="updateDegree">
              <div class="mb-3">
                <label class="form-label">Tên bằng cấp</label>
                <input v-model="selectedDegree.name" type="text" class="form-control" required />
              </div>
              <div class="mb-3">
  <label class="form-label">Chọn giảng viên</label>
  <select v-model="selectedDegree.id_tutor" class="form-select" required>
    <option disabled value="">-- Chọn giảng viên --</option>
    <option v-for="tutor in tutors" :key="tutor.id" :value="tutor.id">
      {{ tutor.name }}
    </option>
  </select>
</div>

              <div class="mb-3">
                <label class="form-label">Cập nhật ảnh (nếu có)</label>
                <input @change="handleEditImage" type="file" class="form-control" />
                <div v-if="selectedDegree.image" class="mt-2">
                  <img :src="imagePath + selectedDegree.image" class="student-image" alt="Hình hiện tại" />
                </div>
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

    <!-- Bảng -->
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Mã BC</th>
            <th>Tên bằng cấp</th>
            <th>Hình ảnh</th>
            <th>Giảng viên</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in degrees" :key="item.id">
            <td>{{ index + 1 }}</td>
            <td>BC00{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td><img :src="imagePath + item.image" class="student-image" alt="ảnh bằng cấp" /></td>
            <td>{{ item.tutor.name }}</td>
            <td>
              <button class="btn btn-warning btn-sm" @click="editDegree(item)">Sửa</button>
              <button class="btn btn-danger btn-sm" @click="deleteDegree(item.id)">Xoá</button>
            </td>
          </tr>
        </tbody>
      </table>
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
