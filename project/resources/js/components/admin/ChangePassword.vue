<template>
<form @submit.prevent = "submit()">
    <div class="alert alert-success" v-show="success">Password berhasil diubah!</div>
    <div class="alert alert-danger" v-show="fail">{{ failMessage }}</div>
    <div class="mb-2">
        <label for="password_old">Password Lama :</label>
        <input type="password" name="password_old" id="password_old" class="form-control" required v-model="fields.password_old">
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
    <button type="submit" class="btn btn-success w-100">Ganti Password</button>
</form>
</template>

<script>
    const id = window.location.href.split('/').pop();
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
                axios.put('/api/v1/admins/ubah-password/' + id, this.fields)
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