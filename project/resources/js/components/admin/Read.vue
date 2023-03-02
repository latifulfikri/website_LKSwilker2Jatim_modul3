<template>
<div class="table-responsive">
    <div class="alert alert-success" v-show="success">Akun berhasil dihapus!</div>
    <div class="alert alert-danger" v-show="fail">{{ failMessage }}</div>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Waktu dibuat</th>
                <th>Waktu diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="admin in admins">
                <th>{{ admin.username }}</th>
                <td>{{ admin.first_name }}</td>
                <td>{{ admin.last_name }}</td>
                <td>{{ admin.created_at }}</td>
                <td>{{ admin.updated_at }}</td>
                <td>
                    <a :href="'/dashboard/admin/ubah-password/' + admin.id" class="btn btn-primary mb-2">Ganti Password</a>
                    <a href="" class="btn btn-warning mb-2">Update</a>
                    <a href="javascript:;" v-on:click="hapusAdmins(admin.id, admin.username)" class="btn mb-2 btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
    export default {
        data: function() {
            return {
                admins: {},
                success: false,
                fail: false,
                failMessage: "",
            }
        },
        mounted() {
            this.loadAdmins();
        },
        methods: {
            loadAdmins: function() {
                axios.get('/api/v1/admins')
                .then(response => {
                    this.admins = response.data.data;
                })
                .catch(function(e) {
                    console.log(e.response.data.data);
                })
            },
            hapusAdmins(id, username) {
                if(confirm("Yakin ingin menghapus data dengan username " + username)) {
                    axios.delete('/api/v1/admins/hapus/' + id)
                    .then(response => {
                        this.admins = response.data.data;
                        this.loadAdmins();
                        this.success = true;
                    })
                    .catch(function(e) {
                        this.failMessage = error.response.data.message
                        this.fail = true;
                        this.success = false;
                    });
                }
            }
        }
    }
</script>