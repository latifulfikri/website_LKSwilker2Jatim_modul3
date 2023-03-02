<template>
<form @submit.prevent = "submit()">
    <div class="alert alert-success" v-show="success">Akun berhsil didaftarkan!</div>
    <div class="alert alert-danger" v-show="fail">{{ failMessage }}</div>
    <div class="mb-2">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" required v-model="fields.nik">
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" class="form-control" required v-model="fields.password">
        </div>
        <div class="col-md-6 mb-2">
            <label for="password_confirm">Konfirmasi Password :</label>
            <input type="password" name="password_confirm" id="password_confirm" class="form-control" required v-model="fields.password_confirm">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-2">
            <label for="first_name">Nama Depan :</label>
            <input type="text" name="first_name" id="first_name" class="form-control" autocomplete="false" required v-model="fields.first_name">
        </div>
        <div class="col-md-6 mb-2">
            <label for="last_name">Nama Belakang :</label>
            <input type="text" name="last_name" id="last_name" class="form-control" autocomplete="false" required v-model="fields.last_name">
        </div>
    </div>
    <div class="mb-2">
        <label for="dob">Tanggal Lahir : </label>
        <input type="date" name="dob" id="dob" class="form-control" required v-model="fields.dob">
    </div>
    <div class="mb-2">
        <label for="address">Alamat : </label>
        <input type="text" name="address" id="address" class="form-control" v-model="fields.address" required>
    </div>
    <div class="mb-2">
        <label for="contact">Kontak :</label>
        <input type="text" name="contact" id="contact" class="form-control" v-model="fields.contact" required>
    </div>
    <div class="mb-2">
        <label for="age">Umur :</label>
        <input type="number" name="age" id="age" class="form-control" v-model="fields.age">
    </div>
    <button type="submit" class="btn btn-success w-100">Registrasi</button>
</form>
</template>

<script>
    export default {
        data: function() {
            return {
                fields: {},
                success: false,
                fail: false,
                failMessage: "",
            }
        },
        mounted() {

        },
        methods: {
            submit: function() {
                axios.post('/api/v1/peserta/tambah', this.fields)
                .then((response) => {
                    this.success = true;
                })
                .catch(function(e) {
                    this.failMessage = e.response.data.message;
                    this.fail = true;
                })
            }
        }
    }
</script>