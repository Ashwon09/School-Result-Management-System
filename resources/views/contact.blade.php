@extends('FrontEnd.master')

@section('body')
<div class="container-fluid custom-container pt-5 pb-2">
    <div class="py-5">
        <h2 class="text-center">Contact Us</h2>
    </div>
    <div class="row pb-5">
        <div class="col-lg-1"></div>
        <div class="col-lg-4 text-center ">
            <h4>Contact Info</h4>
            <div class="table-responsive-md">
                <table class="table-custom">
                    <tr class=>
                        <td class="custom-td"><i class="fas fa-phone mr-2"></i>Phone Number</td>
                        <td>01-4256789</td>
                        <td> 01-4256788</td>
                    </tr>
                    <tr>
                        <td class="custom-td"> <i class="fas fa-mobile-alt mr-2"></i></i>Mobile</td>
                        <td>+977 9818128372</td>
                    </tr>
                    <tr>
                        <td class="custom-td"> <i class="far fa-envelope mr-2"></i>Email</td>
                        <td>Info@ABCD.edu.np</td>
                    </tr>

                </table>
            </div>

        </div>
        <div class="col-lg-7 text-center">
            <h4>Map</h4>
            <div class="iframe-container">
                <iframe class="responsive-iframe"  src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d11137.754464172967!2d85.32123098268714!3d27.66802194396733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d27.6704163!2d85.3239504!5e0!3m2!1sen!2snp!4v1631079514685!5m2!1sen!2snp" style="border:0;" ></iframe>
            </div>
        </div>
    </div>


</div>
@endsection
@push('scripts')
<script>

</script>
@endpush
@push('links')

<style>
    .iframe-container {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 49.25%;
        /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
    }

    .responsive-iframe {
        width: 550;
        height: 350;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .table-custom {
        border-collapse: separate;
        border-spacing: 26px 15px;
        margin-top: 5rem;
        filter: alpha(opacity=40);
        opacity: 0.95;
        border: 5px red solid;
    }

    .custom-container {
        background: linear-gradient(to bottom right, #66ccff 0%, #ffcccc 100%);
    }

    .custom-td {
        text-align: center;
    }
</style>
@endpush