<template>
<table class="table">
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Umur</th>
            <th>ID Pusat Vaksin</th>
            <th>Waktu dibuat</th>
            <th>Waktu diupdate</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="peserta in pesertas">
            <th>{{ peserta.nik }}</th>
            <td>{{ peserta.first_name }}</td>
            <td>{{ peserta.last_name }}</td>
            <td>{{ peserta.dob }}</td>
            <td>{{ peserta.address }}</td>
            <td>{{ peserta.contact }}</td>
            <td>{{ peserta.age }}</td>
            <td>{{ peserta.vac_center_id }}</td>
            <td>{{ peserta.created_at }}</td>
            <td>{{ peserta.updated_at }}</td>
            <td>
                <a href="" class="btn btn-warning">Update</a>
                <a href="javascript:;" v-on:click="hapusPeserta(peserta.id, peserta.username)" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
</template>

<script>
    export default {
        data: function() {
            return {
                persertas: {},
            }
        },
        mounted() {
            this.loadPeserta();
        },
        methods: {
            loadPeserta: function() {
                axios.get('/api/v1/peserta')
                .then(response => {
                    console.log(response.data.data);
                    this.persertas = response.data.data;
                })
                .catch(function(e) {
                    console.log(e);
                })
            },
            hapusPeserta(id, username) {
                if(confirm("Yakin ingin menghapus data dengan username " + username)) {
                    axios.delete('/api/v1/peserta/hapus/' + id)
                    .then(response => {
                        
                    })
                    .catch(function(e) {
                        console.log(e);
                    });
                    this.loadPeserta();
                }
            }
        }
    }
</script>