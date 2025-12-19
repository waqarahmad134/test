<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="lGsE2mgrDJMWmHBixWpdtXfxgZNuYKSkeur08xhd">
    <title>Challan Tracking System Nankana Sahib </title>

    <!-- Favicon-->

    <!-- theme stylesheet-->

    <link rel="stylesheet" href="https://cams.dc.lhc.gov.pk/assets/css/chosen.css?v=1.2">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://cams.dc.lhc.gov.pk/assets/css/all.css?v=1.8">
    <link rel="stylesheet" href="https://cams.dc.lhc.gov.pk/assets/css/responsive.css?v=1.7">
    <!-- Tweaks for older IEs-->
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript">
    var globalPublicPath = 'https://cams.dc.lhc.gov.pk';
    var minPasswordLength = "6";
    var maxPasswordLength = "12";
    </script>
    <script src="https://cams.dc.lhc.gov.pk/assets/js/html5shiv.min.js"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/js/respond.min.js"></script>

<body>
    <header class="login-header" style="background:green">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-12 h-100">
                    <div class="logo text-center">
                        <img src="{{ asset('public/assets/images/logo2.png') }}" alt="site logo" width="200"
                            class="light-logo">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="login-page">
        <div class="container">
            <div class="form-outer d-flex align-items-center">
                <div class="form-inner w-100 login-form-wrap">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row text-center">
                            <div class="col-md">
                                <img src="{{ asset('public/assets/images/logo.png') }}" alt="site logo" width="100"
                                    class="light-logo">
                                <hr>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field-wrap mandatory">
                                <label for="UserUsername" class="control-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field-wrap mandatory">
                                <label for="UserPassword" class="control-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="button button-success btn-block" value="Login">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Button to Open the Modal -->
    <!--<button class="btn btn-lg btn-success sweet-12" onclick="_gaq.push(['_trackEvent', 'example, 'try', 'Success']);">Success</button>
<button class="btn btn-lg btn-warning sweet-13" onclick="_gaq.push(['_trackEvent', 'example, 'try', 'Warning']);">Warning</button>-->



































































































































    <!-- JavaScript files-->


    <script src="https://cams.dc.lhc.gov.pk/assets/vendor/popper.js/umd/popper.min.js" type="text/javascript"
        language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"
        language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/vendor/jquery.cookie/jquery.cookie.js" type="text/javascript"
        language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/vendor/chart.js/Chart.min.js" type="text/javascript"
        language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/vendor/jquery-validation/jquery.validate.min.js"
        type="text/javascript" language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/js/bootstrap-toggle.min.js" type="text/javascript"
        language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/js/chosen.jquery.js" type="text/javascript" language="javascript">
    </script>
    <script
        src="https://cams.dc.lhc.gov.pk/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"
        type="text/javascript" language="javascript"></script>
    <script src="https://cams.dc.lhc.gov.pk/assets/js/sweetalert2.min.js" type="text/javascript" language="javascript">
    </script>


    <!-- Main File-->
    <script src="https://cams.dc.lhc.gov.pk/assets/js/front.js?v=1.1"></script>
    <!--Theme Update Files-->


    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/datatables/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/extend_datatables/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/extend_datatables/buttons.bootstrap.min.js">
    </script>

    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/buttons.html5.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/extend_datatables/buttons.print.min.js">
    </script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/extend_datatables/buttons.colVis.min.js">
    </script>

    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/printThis.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/moment.min.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/copy/js/custom.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/js/main.js"></script>


    <script>
    $(document).ready(function() {

        $('.feedbackSelect').chosen({
            disable_search_threshold: 10
        });


        $('[data-toggle="tooltip"]').tooltip();


        /*document.querySelector('.sweet-12').onclick = function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "success",
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 5000
            });
        };
        document.querySelector('.sweet-13').onclick = function(){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 5000
            });
        };*/

    });
    </script>

    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/js/jquery.noty.packaged.js"></script>
    <script type="text/javascript" src="https://cams.dc.lhc.gov.pk/js/passwordStrengthCheck.js"></script>



    <script>
    checkLocationDetails = function() {
        //            if ($('#UserType').val() == 11) {
        //                $('#ProvinceId').attr('required', 'required');
        //                $('#DistrictId').removeAttr('required');
        //                $('#TehsilId').removeAttr('required');
        //            } else {
        //                $('#ProvinceId').attr('required', 'required');
        //                $('#DistrictId').attr('required', 'required');
        //                $('#TehsilId').attr('required', 'required');
        //            }
    };
    </script>

    <script>
    $(document).ready(function() {
        $("#UserAddForm").submit(function(e) {
            var userType = $('#UserType').val();
            var provinceId = $('#ProvinceId').val();
            var districtId = $('#DistrictId').val();
            var tehsilId = $('#TehsilId').val();

            //                if (userType != 11) {
            //                    if (provinceId == 0 || districtId == 0 || tehsilId == 0) {
            //                        errorNotificationCustom('Please Fill The Form Properly! All the details must be filled !');
            //                        return false;
            //                    }
            //                } else {
            if (provinceId == 0) {
                errorNotificationCustom('Please Select the province!');
                return false;
            }
            //                }
        });

        $('.getJudges').on('change', function() {
            $('.chosen-container.chosen-container-active').addClass('select-loader');
            var locationFrom = $(this).attr('data-value');
            var location_id = $(this).val();

            var object = {
                url: "https://cams.dc.lhc.gov.pk/getTehsils?location_id=" + location_id +
                    '&location_name=' + locationFrom,
                type: "GET",
                data: []
            };

            var data = centralAjax(object);

            if (data.status == 1) {
                setTimeout(function() {
                    $('.chosen-container').removeClass('select-loader');
                }, 2000);

                var results = data.data;
                $('#filter7').empty();
                $("#filter7").append('<option value=0> Select Judge/Court Name </option>');
                $("#filter7").append('<option value=0> Select Judge/Court Name </option>');

                $('#judgesDashboard').empty();
                $("#judgesDashboard").append('<option value=0> Select Judge/Court Name </option>');

                $.each(results, function(key, value) {
                    $("#filter7").append('<option value=' + value.id + '>' + value.full_name +
                        '</option>');
                    $("#judgesDashboard").append('<option value=' + value.id + '>' + value
                        .full_name + '</option>');
                });

                $("#filter7").trigger("chosen:updated");
                $("#judgesDashboard").trigger("chosen:updated");
            } else {
                errorNotificationCustom('Something went wrong, Please try Again!')
            }

            //                if(userType !=  11){
            //                    if (provinceId == 0 || districtId == 0 || tehsilId == 0) {
            //                        errorNotificationCustom('Please Fill The Form Properly! All the details must be filled !');
            //                        return false;
            //                    }
            //                }else{
            //                    if (provinceId == 0) {
            //                        errorNotificationCustom('Please Select the province!');
            //                        return false;
            //                    }
            //                }
        });
    });
    </script>
    <style type="text/css">
    .select-loader {
        position: relative;
        display: inline-block
    }

    .select-loader:after {
        content: '';
        position: absolute;
        top: 8px;
        right: 2px;
        bottom: auto;
        left: auto;
        display: block;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 3px solid #41a541;
        border-color: #41a541 transparent #41a541 transparent;
        -webkit-animation: lds-dual-ring 1.2s linear infinite;
        animation: lds-dual-ring 1.2s linear infinite;
        z-index: 99999 !important
    }

    @-webkit-keyframes lds-dual-ring {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }

    @keyframes lds-dual-ring {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg)
        }

        to {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg)
        }
    }
    </style>

    <script>
    successNotificationCustom = function(message) {
        var successNotification = noty({
            text: message,
            type: 'success',
            layout: 'topRight',
            timeout: 3000,

            animation: {
                open: 'animated bounceInRight',
                close: 'animated bounceOutRight',
            }
        });

    };

    warningNotificationCustom = function(message) {
        var warningNotification = noty({
            text: message,
            type: 'warning',
            layout: 'topRight',
            timeout: 3000,

            animation: {
                open: 'animated bounceInRight',
                close: 'animated bounceOutRight',
            }
        });
    };

    errorNotificationCustom = function(message) {
        var errorNotification = noty({
            text: message,
            type: 'error',
            layout: 'topRight',
            timeout: 3000,

            animation: {
                open: 'animated bounceInRight',
                close: 'animated bounceOutRight',
            }
        });
    };

    setDistrictList = function() {

        $('#DistrictId').empty();
        $("#DistrictId").append('<option value=0> Select District </option>');
        $('#TehsilId').empty();
        $("#TehsilId").append('<option value=0> Select Tehsil </option>');

        if ($('#ProvinceId').val() != 0) {
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=10>Attock</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=11>Bahawalnagar</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=12>Bahawalpur</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=13>Bhakkar</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=14>Chakwal</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=15>Chiniot</option>');
            }
            if ('9' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=46>default</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=16>Dera Ghazi Khan</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=17>Faisalabad</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=1>Gujranwala</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=19>Gujrat</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=20>Hafizabad</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=21>Jhang</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=22>Jhelum</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=23>Kasur</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=24>Khanewal</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=25>Khushab</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=2>Lahore</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=27>Layyah</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=28>Lodhran</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=29>Mandi Bahauddin</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=30>Mianwali</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=6>Multan</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=32>Muzaffargarh</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=34>Nankana Sahib</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=33>Narowal</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=35>Okara</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=36>Pakpattan</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=37>Rahim Yar Khan</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=38>Rajanpur</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=39>Rawalpindi</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=40>Sahiwal</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=41>Sargodha</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=42>Sheikhupura</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=43>Sialkot</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=44>Toba Tek Singh</option>');
            }
            if ('1' == $('#ProvinceId').val()) {
                $("#DistrictId").append('<option value=45>Vehari</option>');
            }

        }

        $('#filter9').empty();
        $("#filter9").append('<option value=0> Select District </option>');
        $('#filter10').empty();
        $("#filter10").append('<option value=0> Select Tehsil </option>');

        if ($('#filter8').val() != 0) {

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=10>Attock</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=11>Bahawalnagar</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=12>Bahawalpur</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=13>Bhakkar</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=14>Chakwal</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=15>Chiniot</option>');
            }

            if ('9' == $('#filter8').val()) {
                $("#filter9").append('<option value=46>default</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=16>Dera Ghazi Khan</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=17>Faisalabad</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=1>Gujranwala</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=19>Gujrat</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=20>Hafizabad</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=21>Jhang</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=22>Jhelum</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=23>Kasur</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=24>Khanewal</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=25>Khushab</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=2>Lahore</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=27>Layyah</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=28>Lodhran</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=29>Mandi Bahauddin</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=30>Mianwali</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=6>Multan</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=32>Muzaffargarh</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=34>Nankana Sahib</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=33>Narowal</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=35>Okara</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=36>Pakpattan</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=37>Rahim Yar Khan</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=38>Rajanpur</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=39>Rawalpindi</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=40>Sahiwal</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=41>Sargodha</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=42>Sheikhupura</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=43>Sialkot</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=44>Toba Tek Singh</option>');
            }

            if ('1' == $('#filter8').val()) {
                $("#filter9").append('<option value=45>Vehari</option>');
            }
        }
        $("#DistrictId").trigger("chosen:updated");
        $("#filter9").trigger("chosen:updated");
    };

    setTehsilList = function() {

        $('#TehsilId').empty();
        $("#TehsilId").append('<option value=0> Select Tehsil </option>');
        if ($('#DistrictId').val() != 0) {

            if ('21' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=55>18-Hazari</option>');
            }

            if ('12' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=165>Ahmadpur East</option>');
            }

            if ('21' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=56>Ahmadpur Sial</option>');
            }

            if ('32' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=37>Alipur</option>');
            }

            if ('36' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=137>Arifwala</option>');
            }

            if ('10' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=112>Attock</option>');
            }

            if ('11' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=20>Bahawalnagar</option>');
            }

            if ('12' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=21>Bahawalpur City</option>');
            }

            if ('13' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=141>Bhakkar</option>');
            }

            if ('41' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=153>Bhalwal</option>');
            }

            if ('15' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=173>Bhowana</option>');
            }

            if ('45' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=108>Burewala</option>');
            }

            if ('14' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=118>Chakwal</option>');
            }

            if ('27' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=34>Chaubara</option>');
            }

            if ('40' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=139>Chichawatni</option>');
            }

            if ('15' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=172>Chiniot</option>');
            }

            if ('46' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=46>Chiniot old</option>');
            }

            if ('11' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=162>Chishtian</option>');
            }

            if ('14' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=119>Choa Saidan Shah</option>');
            }

            if ('23' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=79>Chunian</option>');
            }

            if ('13' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=142>Darya Khan</option>');
            }

            if ('43' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=171>Daska</option>');
            }

            if ('46' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=41>De-Excluded Area Rajanpur</option>');
            }

            if ('46' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=174>default</option>');
            }

            if ('35' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=134>Depalpur</option>');
            }

            if ('16' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=31>Dera Ghazi Khan</option>');
            }

            if ('28' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=101>Dunyapur</option>');
            }

            if ('17' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=50>Faisalabad City</option>');
            }

            if ('10' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=113>Fateh Jang</option>');
            }

            if ('42' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=90>Firozewala</option>');
            }

            if ('11' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=160>Fort Abbas</option>');
            }

            if ('44' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=59>Gojra</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=128>Gujjar Khan</option>');
            }

            if ('1' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=63>Gujranwala City</option>');
            }

            if ('19' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=68>Gujrat</option>');
            }

            if ('20' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=71>Hafizabad</option>');
            }

            if ('11' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=161>Haroonabad</option>');
            }

            if ('12' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=23>Hasilpur</option>');
            }

            if ('10' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=114>Hassan Abdal</option>');
            }

            if ('30' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=150>Isa Khel</option>');
            }

            if ('6' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=104>Jalalpur Pirwala</option>');
            }

            if ('38' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=42>Jampur</option>');
            }

            if ('10' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=116>Jand</option>');
            }

            if ('17' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=52>Jaranwala</option>');
            }

            if ('32' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=38>Jatoi</option>');
            }

            if ('24' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=176>Jehanian</option>');
            }

            if ('21' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=57>Jhang</option>');
            }

            if ('22' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=124>Jhelum</option>');
            }

            if ('24' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=97>Kabirwala</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=129>Kahuta</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=130>Kallar Syedan</option>');
            }

            if ('13' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=143>Kalur Kot</option>');
            }

            if ('44' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=60>Kamalia</option>');
            }

            if ('1' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=175>Kamoke</option>');
            }

            if ('28' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=102>Karor Pacca</option>');
            }

            if ('23' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=80>Kasur</option>');
            }

            if ('27' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=35>Kehror Lal Esan</option>');
            }

            if ('12' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=24>Khairpur Tamewali</option>');
            }

            if ('24' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=98>Khanewal</option>');
            }

            if ('37' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=26>Khanpur</option>');
            }

            if ('19' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=69>Kharian</option>');
            }

            if ('25' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=145>Khushab</option>');
            }

            if ('32' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=39>Kot Addu</option>');
            }

            if ('41' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=155>Kot Momin</option>');
            }

            if ('23' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=81>Kot Radha Kishan</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=131>Kotli Sattian</option>');
            }

            if ('2' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=96>Lahore Cantt</option>');
            }

            if ('2' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=4>Lahore City</option>');
            }

            if ('15' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=47>Lalian</option>');
            }

            if ('27' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=36>Layyah</option>');
            }

            if ('37' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=27>Liaquatpur</option>');
            }

            if ('28' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=103>Lodhran</option>');
            }

            if ('45' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=109>Mailsi</option>');
            }

            if ('29' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=73>Malakwal</option>');
            }

            if ('29' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=74>Mandi Bahauddin</option>');
            }

            if ('13' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=144>Mankera</option>');
            }

            if ('24' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=99>Mian Channu</option>');
            }

            if ('30' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=151>Mianwali</option>');
            }

            if ('11' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=163>Minchinabad</option>');
            }

            if ('2' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=84>Model Town</option>');
            }

            if ('6' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=105>Multan City</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=132>Murree</option>');
            }

            if ('32' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=40>Muzaffargarh</option>');
            }

            if ('34' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=10>Nankana City</option>');
            }

            if ('33' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=76>Narowal</option>');
            }

            if ('1' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=66>Nowshera Virkan</option>');
            }

            if ('25' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=147>Nurpur Thal</option>');
            }

            if ('35' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=135>Okara</option>');
            }

            if ('36' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=138>Pakpattan</option>');
            }

            if ('43' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=169>Pasrur</option>');
            }

            if ('23' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=82>Pattoki</option>');
            }

            if ('29' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=75>Phalia</option>');
            }

            if ('22' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=125>Pind Dadan Khan</option>');
            }

            if ('20' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=72>Pindi Bhattian</option>');
            }

            if ('10' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=117>Pindi Gheb</option>');
            }

            if ('30' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=152>Piplan</option>');
            }

            if ('44' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=61>Pirmahal</option>');
            }

            if ('25' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=148>Quaidabad</option>');
            }

            if ('37' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=28>Rahim Yar Khan</option>');
            }

            if ('38' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=43>Rajanpur</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=127>Rawalpindi</option>');
            }

            if ('35' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=136>Renala Khurd</option>');
            }

            if ('38' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=44>Rojhan</option>');
            }

            if ('37' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=29>Sadiqabad</option>');
            }

            if ('40' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=140>Sahiwal</option>');
            }

            if ('41' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=156>Sahiwal Sargodha</option>');
            }

            if ('43' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=170>Sambrial</option>');
            }

            if ('17' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=53>Sammundri</option>');
            }

            if ('34' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=12>Sangla Hill</option>');
            }

            if ('19' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=70>Sarai Alamgir</option>');
            }

            if ('41' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=157>Sargodha</option>');
            }

            if ('34' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=11>Shah kot</option>');
            }

            if ('41' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=158>Shahpur</option>');
            }

            if ('33' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=77>Shakargarh</option>');
            }

            if ('42' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=94>Sheikhupura</option>');
            }

            if ('21' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=58>Shorkot</option>');
            }

            if ('6' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=107>Shujabad</option>');
            }

            if ('43' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=168>Sialkot</option>');
            }

            if ('41' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=159>Sillanwali</option>');
            }

            if ('22' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=126>Sohawa</option>');
            }

            if ('14' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=122>Talagang</option>');
            }

            if ('17' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=54>Tandlian Wala</option>');
            }

            if ('16' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=33>Taunsa Sharif</option>');
            }

            if ('39' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=133>Taxila</option>');
            }

            if ('44' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=62>Toba Tek Singh</option>');
            }

            if ('45' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=110>Vehari</option>');
            }

            if ('1' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=67>Wazirabad</option>');
            }

            if ('12' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=25>Yazman</option>');
            }

            if ('33' == $('#DistrictId').val()) {
                $("#TehsilId").append('<option value=78>Zafarwal</option>');
            }
        }

        $('#filter10').empty();
        $("#filter10").append('<option value=0> Select Tehsil </option>');
        if ($('#filter9').val() != 0) {

            if ('21' == $('#filter9').val()) {
                $("#filter10").append('<option value=55>18-Hazari</option>');
            }

            if ('12' == $('#filter9').val()) {
                $("#filter10").append('<option value=165>Ahmadpur East</option>');
            }

            if ('21' == $('#filter9').val()) {
                $("#filter10").append('<option value=56>Ahmadpur Sial</option>');
            }

            if ('32' == $('#filter9').val()) {
                $("#filter10").append('<option value=37>Alipur</option>');
            }

            if ('36' == $('#filter9').val()) {
                $("#filter10").append('<option value=137>Arifwala</option>');
            }

            if ('10' == $('#filter9').val()) {
                $("#filter10").append('<option value=112>Attock</option>');
            }

            if ('11' == $('#filter9').val()) {
                $("#filter10").append('<option value=20>Bahawalnagar</option>');
            }

            if ('12' == $('#filter9').val()) {
                $("#filter10").append('<option value=21>Bahawalpur City</option>');
            }

            if ('13' == $('#filter9').val()) {
                $("#filter10").append('<option value=141>Bhakkar</option>');
            }

            if ('41' == $('#filter9').val()) {
                $("#filter10").append('<option value=153>Bhalwal</option>');
            }

            if ('15' == $('#filter9').val()) {
                $("#filter10").append('<option value=173>Bhowana</option>');
            }

            if ('45' == $('#filter9').val()) {
                $("#filter10").append('<option value=108>Burewala</option>');
            }

            if ('14' == $('#filter9').val()) {
                $("#filter10").append('<option value=118>Chakwal</option>');
            }

            if ('27' == $('#filter9').val()) {
                $("#filter10").append('<option value=34>Chaubara</option>');
            }

            if ('40' == $('#filter9').val()) {
                $("#filter10").append('<option value=139>Chichawatni</option>');
            }

            if ('15' == $('#filter9').val()) {
                $("#filter10").append('<option value=172>Chiniot</option>');
            }

            if ('46' == $('#filter9').val()) {
                $("#filter10").append('<option value=46>Chiniot old</option>');
            }

            if ('11' == $('#filter9').val()) {
                $("#filter10").append('<option value=162>Chishtian</option>');
            }

            if ('14' == $('#filter9').val()) {
                $("#filter10").append('<option value=119>Choa Saidan Shah</option>');
            }

            if ('23' == $('#filter9').val()) {
                $("#filter10").append('<option value=79>Chunian</option>');
            }

            if ('13' == $('#filter9').val()) {
                $("#filter10").append('<option value=142>Darya Khan</option>');
            }

            if ('43' == $('#filter9').val()) {
                $("#filter10").append('<option value=171>Daska</option>');
            }

            if ('46' == $('#filter9').val()) {
                $("#filter10").append('<option value=41>De-Excluded Area Rajanpur</option>');
            }

            if ('46' == $('#filter9').val()) {
                $("#filter10").append('<option value=174>default</option>');
            }

            if ('35' == $('#filter9').val()) {
                $("#filter10").append('<option value=134>Depalpur</option>');
            }

            if ('16' == $('#filter9').val()) {
                $("#filter10").append('<option value=31>Dera Ghazi Khan</option>');
            }

            if ('28' == $('#filter9').val()) {
                $("#filter10").append('<option value=101>Dunyapur</option>');
            }

            if ('17' == $('#filter9').val()) {
                $("#filter10").append('<option value=50>Faisalabad City</option>');
            }

            if ('10' == $('#filter9').val()) {
                $("#filter10").append('<option value=113>Fateh Jang</option>');
            }

            if ('42' == $('#filter9').val()) {
                $("#filter10").append('<option value=90>Firozewala</option>');
            }

            if ('11' == $('#filter9').val()) {
                $("#filter10").append('<option value=160>Fort Abbas</option>');
            }

            if ('44' == $('#filter9').val()) {
                $("#filter10").append('<option value=59>Gojra</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=128>Gujjar Khan</option>');
            }

            if ('1' == $('#filter9').val()) {
                $("#filter10").append('<option value=63>Gujranwala City</option>');
            }

            if ('19' == $('#filter9').val()) {
                $("#filter10").append('<option value=68>Gujrat</option>');
            }

            if ('20' == $('#filter9').val()) {
                $("#filter10").append('<option value=71>Hafizabad</option>');
            }

            if ('11' == $('#filter9').val()) {
                $("#filter10").append('<option value=161>Haroonabad</option>');
            }

            if ('12' == $('#filter9').val()) {
                $("#filter10").append('<option value=23>Hasilpur</option>');
            }

            if ('10' == $('#filter9').val()) {
                $("#filter10").append('<option value=114>Hassan Abdal</option>');
            }

            if ('30' == $('#filter9').val()) {
                $("#filter10").append('<option value=150>Isa Khel</option>');
            }

            if ('6' == $('#filter9').val()) {
                $("#filter10").append('<option value=104>Jalalpur Pirwala</option>');
            }

            if ('38' == $('#filter9').val()) {
                $("#filter10").append('<option value=42>Jampur</option>');
            }

            if ('10' == $('#filter9').val()) {
                $("#filter10").append('<option value=116>Jand</option>');
            }

            if ('17' == $('#filter9').val()) {
                $("#filter10").append('<option value=52>Jaranwala</option>');
            }

            if ('32' == $('#filter9').val()) {
                $("#filter10").append('<option value=38>Jatoi</option>');
            }

            if ('24' == $('#filter9').val()) {
                $("#filter10").append('<option value=176>Jehanian</option>');
            }

            if ('21' == $('#filter9').val()) {
                $("#filter10").append('<option value=57>Jhang</option>');
            }

            if ('22' == $('#filter9').val()) {
                $("#filter10").append('<option value=124>Jhelum</option>');
            }

            if ('24' == $('#filter9').val()) {
                $("#filter10").append('<option value=97>Kabirwala</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=129>Kahuta</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=130>Kallar Syedan</option>');
            }

            if ('13' == $('#filter9').val()) {
                $("#filter10").append('<option value=143>Kalur Kot</option>');
            }

            if ('44' == $('#filter9').val()) {
                $("#filter10").append('<option value=60>Kamalia</option>');
            }

            if ('1' == $('#filter9').val()) {
                $("#filter10").append('<option value=175>Kamoke</option>');
            }

            if ('28' == $('#filter9').val()) {
                $("#filter10").append('<option value=102>Karor Pacca</option>');
            }

            if ('23' == $('#filter9').val()) {
                $("#filter10").append('<option value=80>Kasur</option>');
            }

            if ('27' == $('#filter9').val()) {
                $("#filter10").append('<option value=35>Kehror Lal Esan</option>');
            }

            if ('12' == $('#filter9').val()) {
                $("#filter10").append('<option value=24>Khairpur Tamewali</option>');
            }

            if ('24' == $('#filter9').val()) {
                $("#filter10").append('<option value=98>Khanewal</option>');
            }

            if ('37' == $('#filter9').val()) {
                $("#filter10").append('<option value=26>Khanpur</option>');
            }

            if ('19' == $('#filter9').val()) {
                $("#filter10").append('<option value=69>Kharian</option>');
            }

            if ('25' == $('#filter9').val()) {
                $("#filter10").append('<option value=145>Khushab</option>');
            }

            if ('32' == $('#filter9').val()) {
                $("#filter10").append('<option value=39>Kot Addu</option>');
            }

            if ('41' == $('#filter9').val()) {
                $("#filter10").append('<option value=155>Kot Momin</option>');
            }

            if ('23' == $('#filter9').val()) {
                $("#filter10").append('<option value=81>Kot Radha Kishan</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=131>Kotli Sattian</option>');
            }

            if ('2' == $('#filter9').val()) {
                $("#filter10").append('<option value=96>Lahore Cantt</option>');
            }

            if ('2' == $('#filter9').val()) {
                $("#filter10").append('<option value=4>Lahore City</option>');
            }

            if ('15' == $('#filter9').val()) {
                $("#filter10").append('<option value=47>Lalian</option>');
            }

            if ('27' == $('#filter9').val()) {
                $("#filter10").append('<option value=36>Layyah</option>');
            }

            if ('37' == $('#filter9').val()) {
                $("#filter10").append('<option value=27>Liaquatpur</option>');
            }

            if ('28' == $('#filter9').val()) {
                $("#filter10").append('<option value=103>Lodhran</option>');
            }

            if ('45' == $('#filter9').val()) {
                $("#filter10").append('<option value=109>Mailsi</option>');
            }

            if ('29' == $('#filter9').val()) {
                $("#filter10").append('<option value=73>Malakwal</option>');
            }

            if ('29' == $('#filter9').val()) {
                $("#filter10").append('<option value=74>Mandi Bahauddin</option>');
            }

            if ('13' == $('#filter9').val()) {
                $("#filter10").append('<option value=144>Mankera</option>');
            }

            if ('24' == $('#filter9').val()) {
                $("#filter10").append('<option value=99>Mian Channu</option>');
            }

            if ('30' == $('#filter9').val()) {
                $("#filter10").append('<option value=151>Mianwali</option>');
            }

            if ('11' == $('#filter9').val()) {
                $("#filter10").append('<option value=163>Minchinabad</option>');
            }

            if ('2' == $('#filter9').val()) {
                $("#filter10").append('<option value=84>Model Town</option>');
            }

            if ('6' == $('#filter9').val()) {
                $("#filter10").append('<option value=105>Multan City</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=132>Murree</option>');
            }

            if ('32' == $('#filter9').val()) {
                $("#filter10").append('<option value=40>Muzaffargarh</option>');
            }

            if ('34' == $('#filter9').val()) {
                $("#filter10").append('<option value=10>Nankana City</option>');
            }

            if ('33' == $('#filter9').val()) {
                $("#filter10").append('<option value=76>Narowal</option>');
            }

            if ('1' == $('#filter9').val()) {
                $("#filter10").append('<option value=66>Nowshera Virkan</option>');
            }

            if ('25' == $('#filter9').val()) {
                $("#filter10").append('<option value=147>Nurpur Thal</option>');
            }

            if ('35' == $('#filter9').val()) {
                $("#filter10").append('<option value=135>Okara</option>');
            }

            if ('36' == $('#filter9').val()) {
                $("#filter10").append('<option value=138>Pakpattan</option>');
            }

            if ('43' == $('#filter9').val()) {
                $("#filter10").append('<option value=169>Pasrur</option>');
            }

            if ('23' == $('#filter9').val()) {
                $("#filter10").append('<option value=82>Pattoki</option>');
            }

            if ('29' == $('#filter9').val()) {
                $("#filter10").append('<option value=75>Phalia</option>');
            }

            if ('22' == $('#filter9').val()) {
                $("#filter10").append('<option value=125>Pind Dadan Khan</option>');
            }

            if ('20' == $('#filter9').val()) {
                $("#filter10").append('<option value=72>Pindi Bhattian</option>');
            }

            if ('10' == $('#filter9').val()) {
                $("#filter10").append('<option value=117>Pindi Gheb</option>');
            }

            if ('30' == $('#filter9').val()) {
                $("#filter10").append('<option value=152>Piplan</option>');
            }

            if ('44' == $('#filter9').val()) {
                $("#filter10").append('<option value=61>Pirmahal</option>');
            }

            if ('25' == $('#filter9').val()) {
                $("#filter10").append('<option value=148>Quaidabad</option>');
            }

            if ('37' == $('#filter9').val()) {
                $("#filter10").append('<option value=28>Rahim Yar Khan</option>');
            }

            if ('38' == $('#filter9').val()) {
                $("#filter10").append('<option value=43>Rajanpur</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=127>Rawalpindi</option>');
            }

            if ('35' == $('#filter9').val()) {
                $("#filter10").append('<option value=136>Renala Khurd</option>');
            }

            if ('38' == $('#filter9').val()) {
                $("#filter10").append('<option value=44>Rojhan</option>');
            }

            if ('37' == $('#filter9').val()) {
                $("#filter10").append('<option value=29>Sadiqabad</option>');
            }

            if ('40' == $('#filter9').val()) {
                $("#filter10").append('<option value=140>Sahiwal</option>');
            }

            if ('41' == $('#filter9').val()) {
                $("#filter10").append('<option value=156>Sahiwal Sargodha</option>');
            }

            if ('43' == $('#filter9').val()) {
                $("#filter10").append('<option value=170>Sambrial</option>');
            }

            if ('17' == $('#filter9').val()) {
                $("#filter10").append('<option value=53>Sammundri</option>');
            }

            if ('34' == $('#filter9').val()) {
                $("#filter10").append('<option value=12>Sangla Hill</option>');
            }

            if ('19' == $('#filter9').val()) {
                $("#filter10").append('<option value=70>Sarai Alamgir</option>');
            }

            if ('41' == $('#filter9').val()) {
                $("#filter10").append('<option value=157>Sargodha</option>');
            }

            if ('34' == $('#filter9').val()) {
                $("#filter10").append('<option value=11>Shah kot</option>');
            }

            if ('41' == $('#filter9').val()) {
                $("#filter10").append('<option value=158>Shahpur</option>');
            }

            if ('33' == $('#filter9').val()) {
                $("#filter10").append('<option value=77>Shakargarh</option>');
            }

            if ('42' == $('#filter9').val()) {
                $("#filter10").append('<option value=94>Sheikhupura</option>');
            }

            if ('21' == $('#filter9').val()) {
                $("#filter10").append('<option value=58>Shorkot</option>');
            }

            if ('6' == $('#filter9').val()) {
                $("#filter10").append('<option value=107>Shujabad</option>');
            }

            if ('43' == $('#filter9').val()) {
                $("#filter10").append('<option value=168>Sialkot</option>');
            }

            if ('41' == $('#filter9').val()) {
                $("#filter10").append('<option value=159>Sillanwali</option>');
            }

            if ('22' == $('#filter9').val()) {
                $("#filter10").append('<option value=126>Sohawa</option>');
            }

            if ('14' == $('#filter9').val()) {
                $("#filter10").append('<option value=122>Talagang</option>');
            }

            if ('17' == $('#filter9').val()) {
                $("#filter10").append('<option value=54>Tandlian Wala</option>');
            }

            if ('16' == $('#filter9').val()) {
                $("#filter10").append('<option value=33>Taunsa Sharif</option>');
            }

            if ('39' == $('#filter9').val()) {
                $("#filter10").append('<option value=133>Taxila</option>');
            }

            if ('44' == $('#filter9').val()) {
                $("#filter10").append('<option value=62>Toba Tek Singh</option>');
            }

            if ('45' == $('#filter9').val()) {
                $("#filter10").append('<option value=110>Vehari</option>');
            }

            if ('1' == $('#filter9').val()) {
                $("#filter10").append('<option value=67>Wazirabad</option>');
            }

            if ('12' == $('#filter9').val()) {
                $("#filter10").append('<option value=25>Yazman</option>');
            }

            if ('33' == $('#filter9').val()) {
                $("#filter10").append('<option value=78>Zafarwal</option>');
            }
        }
        $("#TehsilId").trigger("chosen:updated");
        $("#filter10").trigger("chosen:updated");
    };


    function centralAjax(object) {
        var response = null;
        $.ajax({
            url: object.url,
            type: object.type,
            data: object.data,
            processData: false,
            contentType: false,
            async: false,

            beforeSend: function() {
                console.log('Do something before it is done!');

                $('.chosen-container.chosen-container-active').addClass('select-loader');
                /*setTimeout(function() {
                    $('.chosen-container.chosen-container-active').addClass('select-loader');
                }, 3000);*/
            },
            success: function(data) {
                response = data;
                //$('.chosen-container').removeClass('select-loader');
                setTimeout(function() {
                    $('.chosen-container').removeClass('select-loader');
                }, 3000);
            },
            error: function() {
                errorNotificationCustom('Something went wrong, Please try Again!')
                setTimeout(function() {
                    $('.chosen-container').removeClass('select-loader');
                }, 2000);
            }
        });
        return response;
    }
    </script>
    <script type="text/javascript">
    if ($(window).outerWidth() > 1025) {
        $('.side-navbar').hover(
            function() {
                $(this).css({
                    '-webkit-transform': 'translate3d(196px,0px,0px)'
                });
            },
            function() {
                $(this).css({
                    '-webkit-transform': 'translate3d(0px,0px,0px)'
                });
            }
        );
    }
    $('.side-navbar').hover(function() {
        //e.preventDefault();
        if ($(window).outerWidth() > 1025) {
            $('nav.side-navbar').toggleClass('shrink');
            $('.page').toggleClass('active');

            // if (!$(".side-navbar").hasClass("shrink") ) {
            //     $('#parentLi').attr( 'aria-expanded', 'false');
            //     // $('.dropdown-hover .showOnHover').show();
            // }
            // else {
            //     // $('.dropdown-hover .showOnHover').hide();
            //     // $('#parentLi').attr( 'aria-expanded', 'false');
            // }


            // else if($('#parentLi').attr( 'aria-expanded', 'false')) {
            //         $('.dropdown-hover .showOnHover').hide();
            //     }
        }
    });


    (function($) {
        'use strict'
        $(function() {
            $(document).ready(function() {
                /*$('.page').on('mouseover',function () {
                    $('#PasswordSettingDropdown').removeClass('show');

                    var menuItem = $('.side-navbar .main-menu ul li.dropdown-hover a#parentLi');
                    if (menuItem.attr( 'aria-expanded') === 'true') {
                        menuItem.attr( 'aria-expanded', 'false');
                    }
                });*/

                $("#toggle-btn").on('mousedown touchstart', function(e) {
                    e.preventDefault();
                    if ($(window).outerWidth() < 1025) {
                        $('nav.side-navbar').toggleClass('show-sm');
                        $('.page').toggleClass('active-sm');
                    }
                });

            });
        });
    }(jQuery));
    </script>






</body>

</html>