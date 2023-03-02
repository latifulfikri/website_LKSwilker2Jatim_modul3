<template>
<form @submit.prevent = "submit()">
    <div class="alert alert-success" v-show="success">Vaksin center berhasil didaftarkan!</div>
    <div class="alert alert-danger" v-show="fail">{{ failMessage }}</div>
    <div class="mb-2">
        <label for="name">Nama :</label>
        <input type="text" name="name" id="name" class="form-control" required v-model="fields.name">
    </div>
    <div class="mb-2">
        <label for="address">Alamat :</label>
        <input type="text" name="address" id="address" class="form-control" required v-model="fields.address">
    </div>
    <div class="mb-2">
        <label for="contact">Kontak :</label>
        <input type="text" name="contact" id="contact" class="form-control" required v-model="fields.contact">
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
                axios.post('/api/v1/vac-center/tambah', this.fields)
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