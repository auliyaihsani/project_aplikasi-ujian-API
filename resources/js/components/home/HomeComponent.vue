<template>
    <div class="col-md-9">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Home
            </div>
         <div class="panel-body">
                <h3>SELAMAT DATANG: ADMIN</h3>
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ form.lulus }}</div>
                                        <div>Siswa Lulus</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> {{ form.tidak_lulus }} </div>
                                        <div>Siswa Tidak Lulus</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-word fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ form.user }}</div>
                                        <div>Total Siswa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                form: {}
            }
        },
        created(){
            this.getHome();

        },
        methods:{
              getHome(){
              axios.get("http://localhost:8000/api/dashboard")
             .then(res=> this.form = res.data)    
            }
        }
       
    }

</script>
 