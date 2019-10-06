<template>
        <div class="col-md-9">
            <div class="panel-heading" style="color: white;">
                    Data Siswa
            <router-link to="/siswa/add" class="btn btn-primary btn-sm pull-right">+ Tambah Siswa</router-link>
            </div>
          <div class="panel panel-info">
            <table class="table">
              <tr v-for="siswas in siswa" :key="siswas.android_id.id">
                <td class="middle" >
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                        <img class="media-object" src="https://www.unpak.ac.id/images/Logo_Unpak.jpg" height="100px" width="100px" alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <address>
                     <b>Username</b>            : {{ siswas.email }}<br>
                     <b>Nama Siswa</b>          : {{ siswas.name }}<br>
                     <b>Jenis Kelasmin</b>      : {{ siswas.jenis_kelamin }}<br>
                     <b> Status </b>            : {{ siswas.status }}<br>
                     <b> Kelas </b>             : {{ siswas.kelas }}<br>
                     <b> Nik </b>               : {{ siswas.nik }}
                      </address>
                    </div>
                  </div>
                </td>
                <td width="100" class="middle">
                  <div>
                   
                     <router-link class="btn btn-circle btn-default btn-xs"
                    :to="{ name:'siswa_edit', params:{id:siswas.android_id}}">
                    <i class="fas fa-pencil-alt" aria-hidden="true"></i></router-link>
                    <a href="#"  @click="Hapus(siswas.android_id)" class="btn btn-circle btn-danger btn-xs" title="Hapus">
                    <i class="fas fa-trash"></i>
                    </a>
                   
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
</template>
<script>
import swal from 'sweetalert';
export default {
  data(){
    return {
      siswa: {}
    }
  },
  created(){
    this.getSiswa()

  },
  methods:{
    getSiswa(){
      axios.get("http://localhost:8000/api/user")
      .then(res => this.siswa = res.data.data);
    },
    Hapus(android_id){
       swal({
                        title: "apakah anda yakin untuk menghapus",
                        text: "jika yakin tekan tombol ok",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                })
                .then((willDelete)=>{
                    if (willDelete) {
                        axios.delete(`http://localhost:8000/api/user/${android_id}`)
                        swal("berhasil! menghapus data",{
                            icon:"success",
                        });
                        this.getSiswa()
                    }else{
                        swal("gagal melakukan hapus!");
                    }
                })
          }
      }

    }
</script>
