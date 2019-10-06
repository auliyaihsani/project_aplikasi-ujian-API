<template>

    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading">
                <strong style="color: white;">Tambah Soal</strong>
            </div>

            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3">Pertanyaan</label>
                                <div class="col-md-8">
                                  <vue-simplemde  v-model="form.soal" ref="markdownEditor" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3">Jawaban A</label>
                                <div class="col-md-8">
                                   
                                    <input type="text"  v-model="form.jawaban_a" name="jawaban_a" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="company" class="control-label col-md-3">Jawaban B</label>
                                <div class="col-md-8">
                                 
                                    <input type="text"  v-model="form.jawaban_b" name="jawaban_b" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-md-3">Jawaban C</label>
                                <div class="col-md-8">
                                    
                                    <input type="text"  v-model="form.jawaban_c" name="jawaban_c" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="control-label col-md-3">Jawaban D</label>
                                <div class="col-md-8">
                               
                                    <input type="text" v-model="form.jawaban_d" class="form-control" name="jawaban_d">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="control-label col-md-3">Kunci Jawaban</label>
                                <div class="col-md-8">
                                  
                                    <select class="form-control" v-model="form.knc_jawaban" name="knc_jawaban">
                                        <option value="a">A</option>
                                        <option value="b">B</option>
                                        <option value="c">C</option>
                                        <option value="d">D</option>
                                    </select>
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
                                <button  @click="save()" type="submit" class="btn btn-primary">Simpan</button>
                                 <router-link to="/soal"  class="btn btn-default">Batal<span class="badge"></span></router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
// import swal from 'sweetalert'

    export default {
        data(){
            return{
                form:{
                    soal:null,
                    jawaban_a:null,
                    jawaban_b:null,
                    jawaban_c:null,
                    jawaban_d:null,
                    knc_jawaban:null
                   
                }
            }
        },
        // created(){
        //     this.save()
        // },

        methods:{
            save(){
                //  axios.post("http://localhost:8000/api/soal", this.form )
                // .then(( response ) =>{
                //  this.$router.push({name:'soal'})
                // })
                

              axios.post("http://localhost:8000/api/soal", this.form)
                    .then((response)=>{
                     swal({
                            title: "success!",
                            text: "berhasil! soal ditambahkan", 
                            icon: "success"
                          });
                    this.$router.push({name:'soal'})
                    })
                  }
        }

    }
</script>
