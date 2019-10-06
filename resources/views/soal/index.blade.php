<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Ujian Online</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-teal navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-uppercase" href="#">
                    Aplikasi Ujian Online
                </a>
                <a class="navbar-brand text-uppercase" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div id="app">
                <div class="col-md-3">
                    <div class="list-group-custom">
                        <a href="#" class="list-group-item active">Home<span class="badge"></span></a>
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-9">
                    <div class="panel-heading" style="color: white;">
                        Silahkan Isi Soal Dengan Jujur
                    </div>
                    <div class="panel panel-info">
                        <form method="POST" action="#">
                            @csrf
                            @foreach ($soal as $item)
                            <input type="hidden" name="id[]" value="{{$item->id}}">
                            <input type="hidden" name="jumlah" value="{{$item->count()}}">
                            <table class="table">
                                <tr>
                                    <td width="17">
                                        <font color="#000000">{{$loop->iteration}}</font>
                                    </td>
                                    <td width="430">
                                        <font color="#000000">{{$item->soal}}</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            a. <input name="pilihan[{{$item->id}}]" type="radio" value="a">
                                            {{$item->jawaban_a}}</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            B. <input name="pilihan[{{$item->id}}]" type="radio" value="b">
                                            {{$item->jawaban_b}}</font>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            C. <input name="pilihan[{{$item->id}}]" type="radio" value="c">
                                            {{$item->jawaban_c}}</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font color="#000000">&nbsp;</font>
                                    </td>
                                    <td>
                                        <font color="#000000">
                                            D. <input name="pilihan[{{$item->id}}]" type="radio" value="d">
                                            {{$item->jawaban_d}}</font>
                                    </td><br>
                                </tr>

                            </table>
                            @endforeach
                            <center> <input type="submit" class="btn btn-info" name="submit" value="Jawab"
                                    onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
</body>

</html>
