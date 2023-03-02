<template>
<form @submit.prevent = "submit()">
    <div class="alert alert-success" v-show="success">Akun berhasil didaftarkan!</div>
    <div class="alert alert-danger" v-show="fail">{{ failMessage }}</div>
    <div class="mb-2">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" required v-model="fields.username" maxlength="20">
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
                console.log(this.fields);
                axios.post('/api/v1/admins/tambah', this.fields)
                .then((response) => {
                    this.success = true;
                    this.fail = false;
                })
                .catch((error) => {
                    this.failMessage = error.response.data.message
                    this.fail = true;
                    this.success = false;
                })
            }
        }
    }
</script>