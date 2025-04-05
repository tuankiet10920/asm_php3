<script setup>
import { reactive, ref, onMounted } from 'vue';
import axios from 'axios'

const students = ref([])
function getStudents() {
    axios
        .get('http://127.0.0.1:8000/api/students')
        .then(response => {
            students.value = response.data
            console.log(response)
        })
        .catch(error => console.log(error))
}
onMounted(() => {
    getStudents()
})
</script>
<template>
    <div class="mt-5 bg-white rounded-2 p-4">
        <h3 class="mb-4">Bảng tổng hợp học sinh</h3>
        <button class="btn btn-primary mb-3">Thêm</button>
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
                    
                    <tr v-for="(item, index) in students">
                        <td>{{ index + 1 }}</td>
                        <td>HS00{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.image }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
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