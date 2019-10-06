<template>
     <div class="col-md-9">
            <div class="panel-heading" style="color: white;">
                Hasil Ujian Siswa
               </div>
          <div class="panel panel-info">
            <table class="table">
              <tr v-for="hasils in hasil" :key="hasils.index">
                <td class="middle">
                  <div class="media">
                    <div class="media-left">
                      <a href="#">
                            <img class="media-object" src="https://www.unpak.ac.id/images/Logo_Unpak.jpg" height="100px" width="100px" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Keterangan : {{ hasils.keterangan }}</h4>
                      <address>
                        Kelas          :  {{ hasils.Kelas }}<br>
                        Nama Siswa     : {{ hasils.Nama }}<br>
                        Jenis Kelasmin : {{ hasils.jenis_kelamin }}<br>
                        Nik            : {{ hasils.nik }}
                      </address>
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading">Total Soal: 10</h4>
                      <address>
                        Jawaban Benar: {{ hasils.benar }}<br>
                        Jawaban Salah: {{ hasils.salah }}<br>
                        Jawaban Kosong: {{ hasils.kosong }}<br>
                        Nilai Anda : {{ hasils.score }}
                      </address>
                    </div>
                  </div>
                </td>
                <td width="100" class="middle">
                  <div>
                    <a href="#"  @click="Hapus(hasils.id)" class="btn btn-circle btn-danger btn-xs" title="Hapus">
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
  return{
    hasil:{}
  }
},

created(){
  this.getHasil()
},

methods:{
  getHasil(){
    axios.get("http://localhost:8000/api/nilai")
    .then((result) => {
      this.hasil = result.data.data
    }).catch((err) => {
      
    });
  },

  Hapus(id){
    swal({
      title:"apakah anda yakin untuk menghapus",
      text:"jika yakin tekan tombol ok",
      icon:"warning",
      buttons:true,
      dangerMode:true
    })
    .then((willDelete) => {
      if (willDelete) {
        axios.delete(`http://localhost:8000/api/nilai/${id}`, this.hasil)
        swal("berhasil dihapus", {
          icon:"success"
        });
        this.getHasil()
      }else{
        swal("gagal melakukan hapus!");
      }
    }).catch((err) => {
      
    });

  }
}

}
</script>

