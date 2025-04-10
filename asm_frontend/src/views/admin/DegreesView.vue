<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const degrees = ref([])
const tutors = ref([])
const searchTerm = ref('')
const errorMessage = ref('')

const selectedDegree = ref(null)
const degreeName = ref('')
const selectedTutorId = ref('')
const selectedImage = ref(null)
const previewImage = ref(null)

function getDegrees() {
  axios.get('http://127.0.0.1:8000/api/degrees')
    .then(response => degrees.value = response.data)
    .catch(err => console.error(err))
}

function getTutors() {
  axios.get('http://127.0.0.1:8000/api/tutors')
    .then(response => tutors.value = response.data)
    .catch(err => console.error(err))
}

function findDegrees() {
  const key = searchTerm.value.trim()
  if (!key) return getDegrees()

  axios.get(`http://127.0.0.1:8000/api/degree/${key}`)
    .then(response => {
      degrees.value = [response.data]
      errorMessage.value = ''
    })
    .catch(() => errorMessage.value = 'Không tìm thấy bằng cấp')
}

function handleImageUpload(event) {
  selectedImage.value = event.target.files[0]
  previewImage.value = URL.createObjectURL(selectedImage.value)  // Hiển thị ảnh trước khi tải lên
}

function addDegree() {
  if (!degreeName.value || !selectedTutorId.value || !selectedImage.value) {
    errorMessage.value = 'Vui lòng điền đầy đủ thông tin và chọn ảnh'
    return
  }
  const formDegree = new FormData()
  formDegree.append('name', degreeName.value)
  formDegree.append('id_tutor', selectedTutorId.value)
  formDegree.append('image', selectedImage.value)

  axios.post('http://127.0.0.1:8000/api/degree', formDegree, {
    headers: { 'Content-Type': 'multipart/form-data' }
  })
    .then(() => {
      getDegrees()
      degreeName.value = ''
      selectedTutorId.value = ''
      selectedImage.value = null
      previewImage.value = null
      errorMessage.value = ''
      bootstrap.Modal.getInstance(document.getElementById('addDegreeModal')).hide()
    })
    .catch(() => errorMessage.value = 'Tên bằng cấp đã tồn tại hoặc lỗi tải ảnh')
}

function editDegree(id) {
  const degree = degrees.value.find(d => d.id === id)
  if (degree) {
    selectedDegree.value = { ...degree }
    selectedImage.value = null 
    previewImage.value = null
  }
}

function updateDegree() {
  const formDegree = new FormData()
  formDegree.append('name', selectedDegree.value.name)
  formDegree.append('id_tutor', selectedDegree.value.id_tutor)
  if (selectedImage.value) formDegree.append('image', selectedImage.value)

  axios.put(`http://127.0.0.1:8000/api/degree/${selectedDegree.value.id}`, formDegree, {
    headers: { 'Content-Type': 'multipart/form-data' }
  })
    .then(() => {
      selectedImage.value = null
      previewImage.value = null
      errorMessage.value = ''
      bootstrap.Modal.getInstance(document.getElementById('editDegreeModal')).hide()
    })
    .catch(() => errorMessage.value = 'Lỗi cập nhật bằng cấp')
}

function deleteDegree(id) {
  axios.delete(`http://127.0.0.1:8000/api/degree/${id}`)
    .then(() => {
      degrees.value = degrees.value.filter(d => d.id !== id)
    })
    .catch(err => console.error(err))
}

function getImagePath(filePath) {
  return `http://127.0.0.1:8000/${filePath}?t=${new Date().getTime()}`;
}

onMounted(() => {
  getDegrees()
  getTutors()
})
</script>

<template>
  <div class="bg-white rounded-2 p-4">
    <h3 class="mb-4">Quản lý bằng cấp</h3>

    <div class="d-flex justify-content-between mb-3">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDegreeModal">Thêm</button>
      <form @submit.prevent="findDegrees">
        <input v-model="searchTerm" type="text" placeholder="Tìm kiếm..." class="form-control w-100 input-find" />
      </form>
    </div>

    <span class="text-danger mb-2" v-if="errorMessage">{{ errorMessage }}</span>

    <div class="table-responsive">
      <table class="table table-bordered text-center">
        <thead class="table-light">
          <tr>
            <th>STT</th>
            <th>Mã</th>
            <th>Tên bằng cấp</th>
            <th>Ảnh</th>
            <th>Giảng viên</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(degree, index) in degrees" :key="degree.id">
            <td>{{ index + 1 }}</td>
            <td>BC00{{ degree.id }}</td>
            <td>{{ degree.name }}</td>
            <td><img :src="getImagePath(degree.image)" :alt="degree.name" height="40" /></td>
            <td>{{ degree.tutor.name}}</td>
            <td>
              <button class="btn btn-warning btn-sm" @click="editDegree(degree.id)" data-bs-toggle="modal" data-bs-target="#editDegreeModal">Sửa</button>
              <button class="btn btn-danger btn-sm" @click="deleteDegree(degree.id)">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Thêm -->
  <div class="modal fade" id="addDegreeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form @submit.prevent="addDegree">
          <div class="modal-header">
            <h5 class="modal-title">Thêm bằng cấp</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="degree-name" class="form-label">Tên bằng cấp</label>
              <input id="degree-name" v-model="degreeName" class="form-control" required />
            </div>
            <div class="mb-3">
              <label for="tutor-id" class="form-label">Giảng viên</label>
              <select id="tutor-id" v-model="selectedTutorId" class="form-select" required>
                <option v-for="tutor in tutors" :key="tutor.id" :value="tutor.id">{{ tutor.name }}</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Ảnh</label>
              <input id="image" type="file" @change="handleImageUpload" class="form-control" required />
              <div v-if="previewImage" class="mt-2">
                <img :src="previewImage" height="100" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Thêm</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Sửa -->
  <!-- Modal Sửa -->
<div class="modal fade" id="editDegreeModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form v-if="selectedDegree" @submit.prevent="updateDegree">
        <div class="modal-header bg-warning">
          <h5 class="modal-title">Sửa bằng cấp</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Tên bằng cấp</label>
            <input v-model="selectedDegree.name" class="form-control" required />
          </div>
          <div class="mb-3">
            <label class="form-label">Giảng viên</label>
            <select v-model="selectedDegree.id_tutor" class="form-control" required>
              <option v-for="t in tutors" :value="t.id">{{ t.name }}</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Ảnh mới</label>
            <input type="file" class="form-control" @change="handleImageUpload" />
            <img v-if="previewImage" :src="previewImage" alt="Preview" height="60" class="mt-2" />
            <img v-else-if="selectedDegree?.image" :src="getImagePath(selectedDegree.image)" alt="Ảnh cũ" height="60" class="mt-2" />
          </div>
          <span class="text-danger" v-if="errorMessage">{{ errorMessage }}</span>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button class="btn btn-warning" type="submit">Cập nhật</button>
        </div>
      </form>
      <div v-else>
        <p>Đang tải dữ liệu...</p>
      </div>
    </div>
  </div>
</div>

</template>
