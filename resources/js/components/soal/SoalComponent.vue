<template>
    <div class="col-md-9">
        <div class="panel-heading" style="color: white;">
            Kelola Soal
        <router-link to="/soal/add" class="btn btn-primary btn-sm pull-right">+ Tambah Soal</router-link>
        </div>
        <div class="panel panel-info">
            <table class="table table-hover">
                <thead class="table-head">
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(soal, index) in soal" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>
                          {{ soal.soal }}
                        </td>
                        <!-- <td>status</td> -->
                        <td>
                            <a href="#" @click="hapus(soal.id)" ><i class="fas fa-trash" aria-hidden="true"></i></a>
                           <router-link :to="{name: 'soal_edit', params:{id:soal.id}}"><i class="fas fa-pencil-alt " aria-hidden="true">
                               </i></router-link>
                        </td>
                        <td>
                        <!-- <select class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak">Tidak Aktif</option>
                        </select> -->
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
 </div>
</template>
<script>

import swal from 'sweetalert';
    export default {
        data(){
            return{
                soal:{}
            }
        },
        created(){
            this.getSoal()
     
        },
        methods:{
               getSoal(){
              axios.get("http://localhost:8000/api/soal")
             .then(res=> this.soal = res.data.data)    
            },

            hapus(id){
                swal({
                        title: "apakah anda yakin untuk menghapus",
                        text: "jika yakin tekan tombol ok",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                })
                .then((willDelete)=>{
                    if (willDelete) {
                        axios.delete(`http://localhost:8000/api/soal/ ${id}`, this.soal)
                        swal("berhasil! menghapus data",{
                            icon:"success",
                        });
                        this.getSoal()
                    }else{
                        swal("gagal melakukan hapus!");
                    }
                })
            }
        }

    }

</script>
