<template>
<div class="table-responsive">
    <div class="alert alert-success" v-show="success">Akun berhasil dihapus!</div>
    <div class="alert alert-danger" v-show="fail">{{ failMessage }}</div>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Waktu dibuat</th>
                <th>Waktu diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="vc in vacCenter">
                <th>{{ vc.name}}</th>
                <td>{{ vc.address }}</td>
                <td>{{ vc.contact }}</td>
                <td>{{ vc.created_at }}</td>
                <td>{{ vc.updated_at }}</td>
                <td>
                    <a :href="'/dashboard/vac-center/update/' + vc.id" class="btn btn-warning mb-2">Update</a>
                    <a href="javascript:;" v-on:click="hapusVC(vc.id, vc.name)" class="btn mb-2 btn-danger">Delete</a>
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
                vacCenter: {},
                success: false,
                fail: false,
                failMessage: "",
            }
        },
        mounted() {
            this.loadVC();
        },
        methods: {
            loadVC: function() {
                axios.get('/api/v1/vac-center')
                .then(response => {
                    this.vacCenter = response.data.data;
                })
                .catch(function(e) {
                    console.log(e.response.data.data);
                })
            },
            hapusVC(id, name) {
                if(confirm("Yakin ingin menghapus data dengan nama " + name)) {
                    axios.delete('/api/v1/vac-center/hapus/' + id)
                    .then(response => {
                        this.admins = response.data.data;
                        this.loadVC();
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