<template>
    <!-- /.col-md-3 -->
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong style="color: white;">Pengaturan Ujian</strong>
                    </div>
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="name" class="control-label col-md-3">Nama Ujian</label>
                                        <div class="col-md-8">
                                            <input type="text" v-model="pengaturan.nama_ujian" class="form-control" name="nama_ujian">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label col-md-3">Waktu Pengerjaan</label>
                                        <div class="col-md-8">
                                            <input type="text" v-model="pengaturan.waktu"  name="waktu_pengerjaan" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="company"  class="control-label col-md-3">Nilai Minimum</label>
                                        <div class="col-md-8">
                                            <input type="text"  v-model="pengaturan.nilai_min" name="nilai_minimum" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="control-label col-md-3">Peraturan Ujian</label>
                                        <div class="col-md-8">
                                         <vue-simplemde  v-model="pengaturan.peraturan_ujian" ref="markdownEditor" />
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" @click="save"  class="btn btn-primary">Simpan</button>
                                        <router-link to="/pengaturan"  class="btn btn-default">Batal<span class="badge"></span></router-link>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>
<script>
import swal from 'sweetalert';

 export default {
     data(){
         return {
             pengaturan: {}
         }
     },
     created(){
        //  axios.get("http://localhost:8000/api/peraturan")
        //  .then(res=> this.pengaturan = res.data.data)      

        // try {
        //     let response = await axios.get('http://localhost:8000/api/peraturan')
        //     this.pengaturan = response.data
        // } catch (error) {
        //     console.log("error", error)
        // }
        this.getpengaturan();

     },
     methods:{
         save(){
             axios.put("http://localhost:8000/api/peraturan", this.pengaturan )
             .then(( response ) =>{
                 swal({
                        title: "success!",
                        text: "peraturan di rubah",
                        icon: "success",
                    })
                    this.getpengaturan()
             })
         },
        getpengaturan(){
              axios.get("http://localhost:8000/api/peraturan")
              .then(res=> this.pengaturan = res.data.data)    
        }
     }

 }
</script>

<style>
  /* @import '~simplemde/dist/simplemde.min.css'; */
</style>