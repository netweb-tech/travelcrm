@include('mains.includes.top-header')

<style>

    .iti-flag {

        width: 20px;

        height: 15px;

        box-shadow: 0px 0px 1px 0px #888;

        background-image: url("{{asset('assets/images/flags.png')}}") !important;

        background-repeat: no-repeat;

        background-color: #DBDBDB;

        background-position: 20px 0

    }



    div#cke_1_contents {

        height: 250px !important;

    }

</style>

<body class="hold-transition light-skin sidebar-mini theme-rosegold onlyheader">

<div class="wrapper">

@include('mains.includes.top-nav')

<div class="content-wrapper">

    <div class="container-full clearfix position-relative">	

@include('mains.includes.nav')

	<div class="content">



    <div class="content-header">

        <div class="d-flex align-items-center">

            <div class="mr-auto">

                <h3 class="page-title">Enquiry Management</h3>

                <div class="d-inline-block align-items-center">

                    <nav>

                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>

                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>

                            <li class="breadcrumb-item" aria-current="page">Enquiry Management</li>

                            <li class="breadcrumb-item active" aria-current="page">Create Enquiry

                            </li>

                        </ol>

                    </nav>

                </div>

            </div>

            <!-- <div class="right-title">

                <div class="dropdown">

                    <button class="btn btn-outline dropdown-toggle no-caret" type="button" data-toggle="dropdown"><i

                            class="mdi mdi-dots-horizontal"></i></button>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item" href="#"><i class="mdi mdi-share"></i>Activity</a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-email"></i>Messages</a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-help-circle-outline"></i>FAQ</a>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-settings"></i>Support</a>

                        <div class="dropdown-divider"></div>

                        <button type="button" class="btn btn-rounded btn-success">Submit</button>

                    </div>

                </div>

            </div> -->

        </div>

    </div>




@if($rights['edit_delete']==1)
    <div class="row">

        <div class="col-12">

            <div class="box">

                <div class="box-header with-border">

                    <h4 class="box-title">Create Enquiry</h4>

                </div>

                <div class="box-body">

                    <form id="enquiry_form" method="post" accept-charset="utf-8">

                        {{csrf_field()}}

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="organization_name">ORGANIZATION NAME</label>

                                <input id="organization_name" type="text" class="form-control" placeholder="ORGANIZATION NAME" name="organization_name" value="{{$get_enquiries->organization_name}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_name">CUSTOMER NAME <span class="asterisk">*</span></label>

                                <input id="customer_name" type="text" class="form-control" placeholder="CUSTOMER NAME " name="customer_name" value="{{$get_enquiries->customer_name}}">

                            </div>

                        </div>







                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_contact">CUSTOMER CONTACT NO <span class="asterisk">*</span></label>

                                <div class="intl-tel-input">

                                    <!-- <div class="flag-container"> -->

                                        <!-- <div tabindex="0" class="selected-flag" title="Brazil (Brasil): +55">

                                            <div class="iti-flag br"></div>

                                            <div class="arrow" id="flag-div"></div>

                                        </div>



                                        <ul class="country-list hide" id="list-c">

                                            <li class="country" data-dial-code="93" data-country-code="af">

                                                <div class="flag">

                                                    <div class="iti-flag af"></div>

                                                </div>

                                                <span class="country-name">Afghanistan (‫افغانستان‬‎)</span><span

                                                    class="dial-code">+93</span>

                                            </li>

                                            <li class="country" data-dial-code="355" data-country-code="al">

                                                <div class="flag">

                                                    <div class="iti-flag al"></div>

                                                </div><span class="country-name">Albania (Shqipëri)</span><span

                                                    class="dial-code">+355</span>

                                            </li>

                                            <li class="country" data-dial-code="213" data-country-code="dz">

                                                <div class="flag">

                                                    <div class="iti-flag dz"></div>

                                                </div><span class="country-name">Algeria (‫الجزائر‬‎)</span><span

                                                    class="dial-code">+213</span>

                                            </li>

                                            <li class="country" data-dial-code="1684" data-country-code="as">

                                                <div class="flag">

                                                    <div class="iti-flag as"></div>

                                                </div><span class="country-name">American Samoa</span><span

                                                    class="dial-code">+1684</span>

                                            </li>

                                            <li class="country" data-dial-code="376" data-country-code="ad">

                                                <div class="flag">

                                                    <div class="iti-flag ad"></div>

                                                </div><span class="country-name">Andorra</span><span

                                                    class="dial-code">+376</span>

                                            </li>

                                            <li class="country" data-dial-code="244" data-country-code="ao">

                                                <div class="flag">

                                                    <div class="iti-flag ao"></div>

                                                </div><span class="country-name">Angola</span><span

                                                    class="dial-code">+244</span>

                                            </li>

                                            <li class="country" data-dial-code="1264" data-country-code="ai">

                                                <div class="flag">

                                                    <div class="iti-flag ai"></div>

                                                </div><span class="country-name">Anguilla</span><span

                                                    class="dial-code">+1264</span>

                                            </li>

                                            <li class="country" data-dial-code="1268" data-country-code="ag">

                                                <div class="flag">

                                                    <div class="iti-flag ag"></div>

                                                </div><span class="country-name">Antigua and Barbuda</span><span

                                                    class="dial-code">+1268</span>

                                            </li>

                                            <li class="country" data-dial-code="54" data-country-code="ar">

                                                <div class="flag">

                                                    <div class="iti-flag ar"></div>

                                                </div><span class="country-name">Argentina</span><span

                                                    class="dial-code">+54</span>

                                            </li>

                                            <li class="country" data-dial-code="374" data-country-code="am">

                                                <div class="flag">

                                                    <div class="iti-flag am"></div>

                                                </div><span class="country-name">Armenia (Հայաստան)</span><span

                                                    class="dial-code">+374</span>

                                            </li>

                                            <li class="country" data-dial-code="297" data-country-code="aw">

                                                <div class="flag">

                                                    <div class="iti-flag aw"></div>

                                                </div><span class="country-name">Aruba</span><span

                                                    class="dial-code">+297</span>

                                            </li>

                                            <li class="country" data-dial-code="61" data-country-code="au">

                                                <div class="flag">

                                                    <div class="iti-flag au"></div>

                                                </div><span class="country-name">Australia</span><span

                                                    class="dial-code">+61</span>

                                            </li>

                                            <li class="country" data-dial-code="43" data-country-code="at">

                                                <div class="flag">

                                                    <div class="iti-flag at"></div>

                                                </div><span class="country-name">Austria (Österreich)</span><span

                                                    class="dial-code">+43</span>

                                            </li>

                                            <li class="country" data-dial-code="994" data-country-code="az">

                                                <div class="flag">

                                                    <div class="iti-flag az"></div>

                                                </div><span class="country-name">Azerbaijan (Azərbaycan)</span><span

                                                    class="dial-code">+994</span>

                                            </li>

                                            <li class="country" data-dial-code="1242" data-country-code="bs">

                                                <div class="flag">

                                                    <div class="iti-flag bs"></div>

                                                </div><span class="country-name">Bahamas</span><span

                                                    class="dial-code">+1242</span>

                                            </li>

                                            <li class="country" data-dial-code="973" data-country-code="bh">

                                                <div class="flag">

                                                    <div class="iti-flag bh"></div>

                                                </div><span class="country-name">Bahrain (‫البحرين‬‎)</span><span

                                                    class="dial-code">+973</span>

                                            </li>

                                            <li class="country" data-dial-code="880" data-country-code="bd">

                                                <div class="flag">

                                                    <div class="iti-flag bd"></div>

                                                </div><span class="country-name">Bangladesh (বাংলাদেশ)</span><span

                                                    class="dial-code">+880</span>

                                            </li>

                                            <li class="country" data-dial-code="1246" data-country-code="bb">

                                                <div class="flag">

                                                    <div class="iti-flag bb"></div>

                                                </div><span class="country-name">Barbados</span><span

                                                    class="dial-code">+1246</span>

                                            </li>

                                            <li class="country" data-dial-code="375" data-country-code="by">

                                                <div class="flag">

                                                    <div class="iti-flag by"></div>

                                                </div><span class="country-name">Belarus (Беларусь)</span><span

                                                    class="dial-code">+375</span>

                                            </li>

                                            <li class="country" data-dial-code="32" data-country-code="be">

                                                <div class="flag">

                                                    <div class="iti-flag be"></div>

                                                </div><span class="country-name">Belgium (België)</span><span

                                                    class="dial-code">+32</span>

                                            </li>

                                            <li class="country" data-dial-code="501" data-country-code="bz">

                                                <div class="flag">

                                                    <div class="iti-flag bz"></div>

                                                </div><span class="country-name">Belize</span><span

                                                    class="dial-code">+501</span>

                                            </li>

                                            <li class="country" data-dial-code="229" data-country-code="bj">

                                                <div class="flag">

                                                    <div class="iti-flag bj"></div>

                                                </div><span class="country-name">Benin (Bénin)</span><span

                                                    class="dial-code">+229</span>

                                            </li>

                                            <li class="country" data-dial-code="1441" data-country-code="bm">

                                                <div class="flag">

                                                    <div class="iti-flag bm"></div>

                                                </div><span class="country-name">Bermuda</span><span

                                                    class="dial-code">+1441</span>

                                            </li>

                                            <li class="country" data-dial-code="975" data-country-code="bt">

                                                <div class="flag">

                                                    <div class="iti-flag bt"></div>

                                                </div><span class="country-name">Bhutan (འབྲུག)</span><span

                                                    class="dial-code">+975</span>

                                            </li>

                                            <li class="country" data-dial-code="591" data-country-code="bo">

                                                <div class="flag">

                                                    <div class="iti-flag bo"></div>

                                                </div><span class="country-name">Bolivia</span><span

                                                    class="dial-code">+591</span>

                                            </li>

                                            <li class="country" data-dial-code="387" data-country-code="ba">

                                                <div class="flag">

                                                    <div class="iti-flag ba"></div>

                                                </div><span class="country-name">Bosnia and Herzegovina (Босна и

                                                    Херцеговина)</span><span class="dial-code">+387</span>

                                            </li>

                                            <li class="country" data-dial-code="267" data-country-code="bw">

                                                <div class="flag">

                                                    <div class="iti-flag bw"></div>

                                                </div><span class="country-name">Botswana</span><span

                                                    class="dial-code">+267</span>

                                            </li>

                                            <li class="country highlight active" data-dial-code="55"

                                                data-country-code="br">

                                                <div class="flag">

                                                    <div class="iti-flag br"></div>

                                                </div><span class="country-name">Brazil (Brasil)</span><span

                                                    class="dial-code">+55</span>

                                            </li>

                                            <li class="country" data-dial-code="246" data-country-code="io">

                                                <div class="flag">

                                                    <div class="iti-flag io"></div>

                                                </div><span class="country-name">British Indian Ocean

                                                    Territory</span><span class="dial-code">+246</span>

                                            </li>

                                            <li class="country" data-dial-code="1284" data-country-code="vg">

                                                <div class="flag">

                                                    <div class="iti-flag vg"></div>

                                                </div><span class="country-name">British Virgin Islands</span><span

                                                    class="dial-code">+1284</span>

                                            </li>

                                            <li class="country" data-dial-code="673" data-country-code="bn">

                                                <div class="flag">

                                                    <div class="iti-flag bn"></div>

                                                </div><span class="country-name">Brunei</span><span

                                                    class="dial-code">+673</span>

                                            </li>

                                            <li class="country" data-dial-code="359" data-country-code="bg">

                                                <div class="flag">

                                                    <div class="iti-flag bg"></div>

                                                </div><span class="country-name">Bulgaria (България)</span><span

                                                    class="dial-code">+359</span>

                                            </li>

                                            <li class="country" data-dial-code="226" data-country-code="bf">

                                                <div class="flag">

                                                    <div class="iti-flag bf"></div>

                                                </div><span class="country-name">Burkina Faso</span><span

                                                    class="dial-code">+226</span>

                                            </li>

                                            <li class="country" data-dial-code="257" data-country-code="bi">

                                                <div class="flag">

                                                    <div class="iti-flag bi"></div>

                                                </div><span class="country-name">Burundi (Uburundi)</span><span

                                                    class="dial-code">+257</span>

                                            </li>

                                            <li class="country" data-dial-code="855" data-country-code="kh">

                                                <div class="flag">

                                                    <div class="iti-flag kh"></div>

                                                </div><span class="country-name">Cambodia (កម្ពុជា)</span><span

                                                    class="dial-code">+855</span>

                                            </li>

                                            <li class="country" data-dial-code="237" data-country-code="cm">

                                                <div class="flag">

                                                    <div class="iti-flag cm"></div>

                                                </div><span class="country-name">Cameroon (Cameroun)</span><span

                                                    class="dial-code">+237</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="ca">

                                                <div class="flag">

                                                    <div class="iti-flag ca"></div>

                                                </div><span class="country-name">Canada</span><span

                                                    class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="238" data-country-code="cv">

                                                <div class="flag">

                                                    <div class="iti-flag cv"></div>

                                                </div><span class="country-name">Cape Verde (Kabu Verdi)</span><span

                                                    class="dial-code">+238</span>

                                            </li>

                                            <li class="country" data-dial-code="599" data-country-code="bq">

                                                <div class="flag">

                                                    <div class="iti-flag bq"></div>

                                                </div><span class="country-name">Caribbean Netherlands</span><span

                                                    class="dial-code">+599</span>

                                            </li>

                                            <li class="country" data-dial-code="1345" data-country-code="ky">

                                                <div class="flag">

                                                    <div class="iti-flag ky"></div>

                                                </div><span class="country-name">Cayman Islands</span><span

                                                    class="dial-code">+1345</span>

                                            </li>

                                            <li class="country" data-dial-code="236" data-country-code="cf">

                                                <div class="flag">

                                                    <div class="iti-flag cf"></div>

                                                </div><span class="country-name">Central African Republic (République

                                                    centrafricaine)</span><span class="dial-code">+236</span>

                                            </li>

                                            <li class="country" data-dial-code="235" data-country-code="td">

                                                <div class="flag">

                                                    <div class="iti-flag td"></div>

                                                </div><span class="country-name">Chad (Tchad)</span><span

                                                    class="dial-code">+235</span>

                                            </li>

                                            <li class="country" data-dial-code="56" data-country-code="cl">

                                                <div class="flag">

                                                    <div class="iti-flag cl"></div>

                                                </div><span class="country-name">Chile</span><span

                                                    class="dial-code">+56</span>

                                            </li>

                                            <li class="country" data-dial-code="86" data-country-code="cn">

                                                <div class="flag">

                                                    <div class="iti-flag cn"></div>

                                                </div><span class="country-name">China (中国)</span><span

                                                    class="dial-code">+86</span>

                                            </li>

                                            <li class="country" data-dial-code="61" data-country-code="cx">

                                                <div class="flag">

                                                    <div class="iti-flag cx"></div>

                                                </div><span class="country-name">Christmas Island</span><span

                                                    class="dial-code">+61</span>

                                            </li>

                                            <li class="country" data-dial-code="61" data-country-code="cc">

                                                <div class="flag">

                                                    <div class="iti-flag cc"></div>

                                                </div><span class="country-name">Cocos (Keeling) Islands</span><span

                                                    class="dial-code">+61</span>

                                            </li>

                                            <li class="country" data-dial-code="57" data-country-code="co">

                                                <div class="flag">

                                                    <div class="iti-flag co"></div>

                                                </div><span class="country-name">Colombia</span><span

                                                    class="dial-code">+57</span>

                                            </li>

                                            <li class="country" data-dial-code="269" data-country-code="km">

                                                <div class="flag">

                                                    <div class="iti-flag km"></div>

                                                </div><span class="country-name">Comoros (‫جزر القمر‬‎)</span><span

                                                    class="dial-code">+269</span>

                                            </li>

                                            <li class="country" data-dial-code="243" data-country-code="cd">

                                                <div class="flag">

                                                    <div class="iti-flag cd"></div>

                                                </div><span class="country-name">Congo (DRC) (Jamhuri ya Kidemokrasia ya

                                                    Kongo)</span><span class="dial-code">+243</span>

                                            </li>

                                            <li class="country" data-dial-code="242" data-country-code="cg">

                                                <div class="flag">

                                                    <div class="iti-flag cg"></div>

                                                </div><span class="country-name">Congo (Republic)

                                                    (Congo-Brazzaville)</span><span class="dial-code">+242</span>

                                            </li>

                                            <li class="country" data-dial-code="682" data-country-code="ck">

                                                <div class="flag">

                                                    <div class="iti-flag ck"></div>

                                                </div><span class="country-name">Cook Islands</span><span

                                                    class="dial-code">+682</span>

                                            </li>

                                            <li class="country" data-dial-code="506" data-country-code="cr">

                                                <div class="flag">

                                                    <div class="iti-flag cr"></div>

                                                </div><span class="country-name">Costa Rica</span><span

                                                    class="dial-code">+506</span>

                                            </li>

                                            <li class="country" data-dial-code="225" data-country-code="ci">

                                                <div class="flag">

                                                    <div class="iti-flag ci"></div>

                                                </div><span class="country-name">Côte d’Ivoire</span><span

                                                    class="dial-code">+225</span>

                                            </li>

                                            <li class="country" data-dial-code="385" data-country-code="hr">

                                                <div class="flag">

                                                    <div class="iti-flag hr"></div>

                                                </div><span class="country-name">Croatia (Hrvatska)</span><span

                                                    class="dial-code">+385</span>

                                            </li>

                                            <li class="country" data-dial-code="53" data-country-code="cu">

                                                <div class="flag">

                                                    <div class="iti-flag cu"></div>

                                                </div><span class="country-name">Cuba</span><span

                                                    class="dial-code">+53</span>

                                            </li>

                                            <li class="country" data-dial-code="599" data-country-code="cw">

                                                <div class="flag">

                                                    <div class="iti-flag cw"></div>

                                                </div><span class="country-name">Curaçao</span><span

                                                    class="dial-code">+599</span>

                                            </li>

                                            <li class="country" data-dial-code="357" data-country-code="cy">

                                                <div class="flag">

                                                    <div class="iti-flag cy"></div>

                                                </div><span class="country-name">Cyprus (Κύπρος)</span><span

                                                    class="dial-code">+357</span>

                                            </li>

                                            <li class="country" data-dial-code="420" data-country-code="cz">

                                                <div class="flag">

                                                    <div class="iti-flag cz"></div>

                                                </div><span class="country-name">Czech Republic (Česká

                                                    republika)</span><span class="dial-code">+420</span>

                                            </li>

                                            <li class="country" data-dial-code="45" data-country-code="dk">

                                                <div class="flag">

                                                    <div class="iti-flag dk"></div>

                                                </div><span class="country-name">Denmark (Danmark)</span><span

                                                    class="dial-code">+45</span>

                                            </li>

                                            <li class="country" data-dial-code="253" data-country-code="dj">

                                                <div class="flag">

                                                    <div class="iti-flag dj"></div>

                                                </div><span class="country-name">Djibouti</span><span

                                                    class="dial-code">+253</span>

                                            </li>

                                            <li class="country" data-dial-code="1767" data-country-code="dm">

                                                <div class="flag">

                                                    <div class="iti-flag dm"></div>

                                                </div><span class="country-name">Dominica</span><span

                                                    class="dial-code">+1767</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="do">

                                                <div class="flag">

                                                    <div class="iti-flag do"></div>

                                                </div><span class="country-name">Dominican Republic (República

                                                    Dominicana)</span><span class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="593" data-country-code="ec">

                                                <div class="flag">

                                                    <div class="iti-flag ec"></div>

                                                </div><span class="country-name">Ecuador</span><span

                                                    class="dial-code">+593</span>

                                            </li>

                                            <li class="country" data-dial-code="20" data-country-code="eg">

                                                <div class="flag">

                                                    <div class="iti-flag eg"></div>

                                                </div><span class="country-name">Egypt (‫مصر‬‎)</span><span

                                                    class="dial-code">+20</span>

                                            </li>

                                            <li class="country" data-dial-code="503" data-country-code="sv">

                                                <div class="flag">

                                                    <div class="iti-flag sv"></div>

                                                </div><span class="country-name">El Salvador</span><span

                                                    class="dial-code">+503</span>

                                            </li>

                                            <li class="country" data-dial-code="240" data-country-code="gq">

                                                <div class="flag">

                                                    <div class="iti-flag gq"></div>

                                                </div><span class="country-name">Equatorial Guinea (Guinea

                                                    Ecuatorial)</span><span class="dial-code">+240</span>

                                            </li>

                                            <li class="country" data-dial-code="291" data-country-code="er">

                                                <div class="flag">

                                                    <div class="iti-flag er"></div>

                                                </div><span class="country-name">Eritrea</span><span

                                                    class="dial-code">+291</span>

                                            </li>

                                            <li class="country" data-dial-code="372" data-country-code="ee">

                                                <div class="flag">

                                                    <div class="iti-flag ee"></div>

                                                </div><span class="country-name">Estonia (Eesti)</span><span

                                                    class="dial-code">+372</span>

                                            </li>

                                            <li class="country" data-dial-code="251" data-country-code="et">

                                                <div class="flag">

                                                    <div class="iti-flag et"></div>

                                                </div><span class="country-name">Ethiopia</span><span

                                                    class="dial-code">+251</span>

                                            </li>

                                            <li class="country" data-dial-code="500" data-country-code="fk">

                                                <div class="flag">

                                                    <div class="iti-flag fk"></div>

                                                </div><span class="country-name">Falkland Islands (Islas

                                                    Malvinas)</span><span class="dial-code">+500</span>

                                            </li>

                                            <li class="country" data-dial-code="298" data-country-code="fo">

                                                <div class="flag">

                                                    <div class="iti-flag fo"></div>

                                                </div><span class="country-name">Faroe Islands (Føroyar)</span><span

                                                    class="dial-code">+298</span>

                                            </li>

                                            <li class="country" data-dial-code="679" data-country-code="fj">

                                                <div class="flag">

                                                    <div class="iti-flag fj"></div>

                                                </div><span class="country-name">Fiji</span><span

                                                    class="dial-code">+679</span>

                                            </li>

                                            <li class="country" data-dial-code="358" data-country-code="fi">

                                                <div class="flag">

                                                    <div class="iti-flag fi"></div>

                                                </div><span class="country-name">Finland (Suomi)</span><span

                                                    class="dial-code">+358</span>

                                            </li>

                                            <li class="country" data-dial-code="33" data-country-code="fr">

                                                <div class="flag">

                                                    <div class="iti-flag fr"></div>

                                                </div><span class="country-name">France</span><span

                                                    class="dial-code">+33</span>

                                            </li>

                                            <li class="country" data-dial-code="594" data-country-code="gf">

                                                <div class="flag">

                                                    <div class="iti-flag gf"></div>

                                                </div><span class="country-name">French Guiana (Guyane

                                                    française)</span><span class="dial-code">+594</span>

                                            </li>

                                            <li class="country" data-dial-code="689" data-country-code="pf">

                                                <div class="flag">

                                                    <div class="iti-flag pf"></div>

                                                </div><span class="country-name">French Polynesia (Polynésie

                                                    française)</span><span class="dial-code">+689</span>

                                            </li>

                                            <li class="country" data-dial-code="241" data-country-code="ga">

                                                <div class="flag">

                                                    <div class="iti-flag ga"></div>

                                                </div><span class="country-name">Gabon</span><span

                                                    class="dial-code">+241</span>

                                            </li>

                                            <li class="country" data-dial-code="220" data-country-code="gm">

                                                <div class="flag">

                                                    <div class="iti-flag gm"></div>

                                                </div><span class="country-name">Gambia</span><span

                                                    class="dial-code">+220</span>

                                            </li>

                                            <li class="country" data-dial-code="995" data-country-code="ge">

                                                <div class="flag">

                                                    <div class="iti-flag ge"></div>

                                                </div><span class="country-name">Georgia (საქართველო)</span><span

                                                    class="dial-code">+995</span>

                                            </li>

                                            <li class="country" data-dial-code="49" data-country-code="de">

                                                <div class="flag">

                                                    <div class="iti-flag de"></div>

                                                </div><span class="country-name">Germany (Deutschland)</span><span

                                                    class="dial-code">+49</span>

                                            </li>

                                            <li class="country" data-dial-code="233" data-country-code="gh">

                                                <div class="flag">

                                                    <div class="iti-flag gh"></div>

                                                </div><span class="country-name">Ghana (Gaana)</span><span

                                                    class="dial-code">+233</span>

                                            </li>

                                            <li class="country" data-dial-code="350" data-country-code="gi">

                                                <div class="flag">

                                                    <div class="iti-flag gi"></div>

                                                </div><span class="country-name">Gibraltar</span><span

                                                    class="dial-code">+350</span>

                                            </li>

                                            <li class="country" data-dial-code="30" data-country-code="gr">

                                                <div class="flag">

                                                    <div class="iti-flag gr"></div>

                                                </div><span class="country-name">Greece (Ελλάδα)</span><span

                                                    class="dial-code">+30</span>

                                            </li>

                                            <li class="country" data-dial-code="299" data-country-code="gl">

                                                <div class="flag">

                                                    <div class="iti-flag gl"></div>

                                                </div><span class="country-name">Greenland (Kalaallit

                                                    Nunaat)</span><span class="dial-code">+299</span>

                                            </li>

                                            <li class="country" data-dial-code="1473" data-country-code="gd">

                                                <div class="flag">

                                                    <div class="iti-flag gd"></div>

                                                </div><span class="country-name">Grenada</span><span

                                                    class="dial-code">+1473</span>

                                            </li>

                                            <li class="country" data-dial-code="590" data-country-code="gp">

                                                <div class="flag">

                                                    <div class="iti-flag gp"></div>

                                                </div><span class="country-name">Guadeloupe</span><span

                                                    class="dial-code">+590</span>

                                            </li>

                                            <li class="country" data-dial-code="1671" data-country-code="gu">

                                                <div class="flag">

                                                    <div class="iti-flag gu"></div>

                                                </div><span class="country-name">Guam</span><span

                                                    class="dial-code">+1671</span>

                                            </li>

                                            <li class="country" data-dial-code="502" data-country-code="gt">

                                                <div class="flag">

                                                    <div class="iti-flag gt"></div>

                                                </div><span class="country-name">Guatemala</span><span

                                                    class="dial-code">+502</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="gg">

                                                <div class="flag">

                                                    <div class="iti-flag gg"></div>

                                                </div><span class="country-name">Guernsey</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="224" data-country-code="gn">

                                                <div class="flag">

                                                    <div class="iti-flag gn"></div>

                                                </div><span class="country-name">Guinea (Guinée)</span><span

                                                    class="dial-code">+224</span>

                                            </li>

                                            <li class="country" data-dial-code="245" data-country-code="gw">

                                                <div class="flag">

                                                    <div class="iti-flag gw"></div>

                                                </div><span class="country-name">Guinea-Bissau (Guiné

                                                    Bissau)</span><span class="dial-code">+245</span>

                                            </li>

                                            <li class="country" data-dial-code="592" data-country-code="gy">

                                                <div class="flag">

                                                    <div class="iti-flag gy"></div>

                                                </div><span class="country-name">Guyana</span><span

                                                    class="dial-code">+592</span>

                                            </li>

                                            <li class="country" data-dial-code="509" data-country-code="ht">

                                                <div class="flag">

                                                    <div class="iti-flag ht"></div>

                                                </div><span class="country-name">Haiti</span><span

                                                    class="dial-code">+509</span>

                                            </li>

                                            <li class="country" data-dial-code="504" data-country-code="hn">

                                                <div class="flag">

                                                    <div class="iti-flag hn"></div>

                                                </div><span class="country-name">Honduras</span><span

                                                    class="dial-code">+504</span>

                                            </li>

                                            <li class="country" data-dial-code="852" data-country-code="hk">

                                                <div class="flag">

                                                    <div class="iti-flag hk"></div>

                                                </div><span class="country-name">Hong Kong (香港)</span><span

                                                    class="dial-code">+852</span>

                                            </li>

                                            <li class="country" data-dial-code="36" data-country-code="hu">

                                                <div class="flag">

                                                    <div class="iti-flag hu"></div>

                                                </div><span class="country-name">Hungary (Magyarország)</span><span

                                                    class="dial-code">+36</span>

                                            </li>

                                            <li class="country" data-dial-code="354" data-country-code="is">

                                                <div class="flag">

                                                    <div class="iti-flag is"></div>

                                                </div><span class="country-name">Iceland (Ísland)</span><span

                                                    class="dial-code">+354</span>

                                            </li>

                                            <li class="country" data-dial-code="91" data-country-code="in">

                                                <div class="flag">

                                                    <div class="iti-flag in"></div>

                                                </div><span class="country-name">India (भारत)</span><span

                                                    class="dial-code">+91</span>

                                            </li>

                                            <li class="country" data-dial-code="62" data-country-code="id">

                                                <div class="flag">

                                                    <div class="iti-flag id"></div>

                                                </div><span class="country-name">Indonesia</span><span

                                                    class="dial-code">+62</span>

                                            </li>

                                            <li class="country" data-dial-code="98" data-country-code="ir">

                                                <div class="flag">

                                                    <div class="iti-flag ir"></div>

                                                </div><span class="country-name">Iran (‫ایران‬‎)</span><span

                                                    class="dial-code">+98</span>

                                            </li>

                                            <li class="country" data-dial-code="964" data-country-code="iq">

                                                <div class="flag">

                                                    <div class="iti-flag iq"></div>

                                                </div><span class="country-name">Iraq (‫العراق‬‎)</span><span

                                                    class="dial-code">+964</span>

                                            </li>

                                            <li class="country" data-dial-code="353" data-country-code="ie">

                                                <div class="flag">

                                                    <div class="iti-flag ie"></div>

                                                </div><span class="country-name">Ireland</span><span

                                                    class="dial-code">+353</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="im">

                                                <div class="flag">

                                                    <div class="iti-flag im"></div>

                                                </div><span class="country-name">Isle of Man</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="972" data-country-code="il">

                                                <div class="flag">

                                                    <div class="iti-flag il"></div>

                                                </div><span class="country-name">Israel (‫ישראל‬‎)</span><span

                                                    class="dial-code">+972</span>

                                            </li>

                                            <li class="country" data-dial-code="39" data-country-code="it">

                                                <div class="flag">

                                                    <div class="iti-flag it"></div>

                                                </div><span class="country-name">Italy (Italia)</span><span

                                                    class="dial-code">+39</span>

                                            </li>

                                            <li class="country" data-dial-code="1876" data-country-code="jm">

                                                <div class="flag">

                                                    <div class="iti-flag jm"></div>

                                                </div><span class="country-name">Jamaica</span><span

                                                    class="dial-code">+1876</span>

                                            </li>

                                            <li class="country" data-dial-code="81" data-country-code="jp">

                                                <div class="flag">

                                                    <div class="iti-flag jp"></div>

                                                </div><span class="country-name">Japan (日本)</span><span

                                                    class="dial-code">+81</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="je">

                                                <div class="flag">

                                                    <div class="iti-flag je"></div>

                                                </div><span class="country-name">Jersey</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="962" data-country-code="jo">

                                                <div class="flag">

                                                    <div class="iti-flag jo"></div>

                                                </div><span class="country-name">Jordan (‫الأردن‬‎)</span><span

                                                    class="dial-code">+962</span>

                                            </li>

                                            <li class="country" data-dial-code="7" data-country-code="kz">

                                                <div class="flag">

                                                    <div class="iti-flag kz"></div>

                                                </div><span class="country-name">Kazakhstan (Казахстан)</span><span

                                                    class="dial-code">+7</span>

                                            </li>

                                            <li class="country" data-dial-code="254" data-country-code="ke">

                                                <div class="flag">

                                                    <div class="iti-flag ke"></div>

                                                </div><span class="country-name">Kenya</span><span

                                                    class="dial-code">+254</span>

                                            </li>

                                            <li class="country" data-dial-code="686" data-country-code="ki">

                                                <div class="flag">

                                                    <div class="iti-flag ki"></div>

                                                </div><span class="country-name">Kiribati</span><span

                                                    class="dial-code">+686</span>

                                            </li>

                                            <li class="country" data-dial-code="965" data-country-code="kw">

                                                <div class="flag">

                                                    <div class="iti-flag kw"></div>

                                                </div><span class="country-name">Kuwait (‫الكويت‬‎)</span><span

                                                    class="dial-code">+965</span>

                                            </li>

                                            <li class="country" data-dial-code="996" data-country-code="kg">

                                                <div class="flag">

                                                    <div class="iti-flag kg"></div>

                                                </div><span class="country-name">Kyrgyzstan (Кыргызстан)</span><span

                                                    class="dial-code">+996</span>

                                            </li>

                                            <li class="country" data-dial-code="856" data-country-code="la">

                                                <div class="flag">

                                                    <div class="iti-flag la"></div>

                                                </div><span class="country-name">Laos (ລາວ)</span><span

                                                    class="dial-code">+856</span>

                                            </li>

                                            <li class="country" data-dial-code="371" data-country-code="lv">

                                                <div class="flag">

                                                    <div class="iti-flag lv"></div>

                                                </div><span class="country-name">Latvia (Latvija)</span><span

                                                    class="dial-code">+371</span>

                                            </li>

                                            <li class="country" data-dial-code="961" data-country-code="lb">

                                                <div class="flag">

                                                    <div class="iti-flag lb"></div>

                                                </div><span class="country-name">Lebanon (‫لبنان‬‎)</span><span

                                                    class="dial-code">+961</span>

                                            </li>

                                            <li class="country" data-dial-code="266" data-country-code="ls">

                                                <div class="flag">

                                                    <div class="iti-flag ls"></div>

                                                </div><span class="country-name">Lesotho</span><span

                                                    class="dial-code">+266</span>

                                            </li>

                                            <li class="country" data-dial-code="231" data-country-code="lr">

                                                <div class="flag">

                                                    <div class="iti-flag lr"></div>

                                                </div><span class="country-name">Liberia</span><span

                                                    class="dial-code">+231</span>

                                            </li>

                                            <li class="country" data-dial-code="218" data-country-code="ly">

                                                <div class="flag">

                                                    <div class="iti-flag ly"></div>

                                                </div><span class="country-name">Libya (‫ليبيا‬‎)</span><span

                                                    class="dial-code">+218</span>

                                            </li>

                                            <li class="country" data-dial-code="423" data-country-code="li">

                                                <div class="flag">

                                                    <div class="iti-flag li"></div>

                                                </div><span class="country-name">Liechtenstein</span><span

                                                    class="dial-code">+423</span>

                                            </li>

                                            <li class="country" data-dial-code="370" data-country-code="lt">

                                                <div class="flag">

                                                    <div class="iti-flag lt"></div>

                                                </div><span class="country-name">Lithuania (Lietuva)</span><span

                                                    class="dial-code">+370</span>

                                            </li>

                                            <li class="country" data-dial-code="352" data-country-code="lu">

                                                <div class="flag">

                                                    <div class="iti-flag lu"></div>

                                                </div><span class="country-name">Luxembourg</span><span

                                                    class="dial-code">+352</span>

                                            </li>

                                            <li class="country" data-dial-code="853" data-country-code="mo">

                                                <div class="flag">

                                                    <div class="iti-flag mo"></div>

                                                </div><span class="country-name">Macau (澳門)</span><span

                                                    class="dial-code">+853</span>

                                            </li>

                                            <li class="country" data-dial-code="389" data-country-code="mk">

                                                <div class="flag">

                                                    <div class="iti-flag mk"></div>

                                                </div><span class="country-name">Macedonia (FYROM)

                                                    (Македонија)</span><span class="dial-code">+389</span>

                                            </li>

                                            <li class="country" data-dial-code="261" data-country-code="mg">

                                                <div class="flag">

                                                    <div class="iti-flag mg"></div>

                                                </div><span class="country-name">Madagascar (Madagasikara)</span><span

                                                    class="dial-code">+261</span>

                                            </li>

                                            <li class="country" data-dial-code="265" data-country-code="mw">

                                                <div class="flag">

                                                    <div class="iti-flag mw"></div>

                                                </div><span class="country-name">Malawi</span><span

                                                    class="dial-code">+265</span>

                                            </li>

                                            <li class="country" data-dial-code="60" data-country-code="my">

                                                <div class="flag">

                                                    <div class="iti-flag my"></div>

                                                </div><span class="country-name">Malaysia</span><span

                                                    class="dial-code">+60</span>

                                            </li>

                                            <li class="country" data-dial-code="960" data-country-code="mv">

                                                <div class="flag">

                                                    <div class="iti-flag mv"></div>

                                                </div><span class="country-name">Maldives</span><span

                                                    class="dial-code">+960</span>

                                            </li>

                                            <li class="country" data-dial-code="223" data-country-code="ml">

                                                <div class="flag">

                                                    <div class="iti-flag ml"></div>

                                                </div><span class="country-name">Mali</span><span

                                                    class="dial-code">+223</span>

                                            </li>

                                            <li class="country" data-dial-code="356" data-country-code="mt">

                                                <div class="flag">

                                                    <div class="iti-flag mt"></div>

                                                </div><span class="country-name">Malta</span><span

                                                    class="dial-code">+356</span>

                                            </li>

                                            <li class="country" data-dial-code="692" data-country-code="mh">

                                                <div class="flag">

                                                    <div class="iti-flag mh"></div>

                                                </div><span class="country-name">Marshall Islands</span><span

                                                    class="dial-code">+692</span>

                                            </li>

                                            <li class="country" data-dial-code="596" data-country-code="mq">

                                                <div class="flag">

                                                    <div class="iti-flag mq"></div>

                                                </div><span class="country-name">Martinique</span><span

                                                    class="dial-code">+596</span>

                                            </li>

                                            <li class="country" data-dial-code="222" data-country-code="mr">

                                                <div class="flag">

                                                    <div class="iti-flag mr"></div>

                                                </div><span class="country-name">Mauritania (‫موريتانيا‬‎)</span><span

                                                    class="dial-code">+222</span>

                                            </li>

                                            <li class="country" data-dial-code="230" data-country-code="mu">

                                                <div class="flag">

                                                    <div class="iti-flag mu"></div>

                                                </div><span class="country-name">Mauritius (Moris)</span><span

                                                    class="dial-code">+230</span>

                                            </li>

                                            <li class="country" data-dial-code="262" data-country-code="yt">

                                                <div class="flag">

                                                    <div class="iti-flag yt"></div>

                                                </div><span class="country-name">Mayotte</span><span

                                                    class="dial-code">+262</span>

                                            </li>

                                            <li class="country" data-dial-code="52" data-country-code="mx">

                                                <div class="flag">

                                                    <div class="iti-flag mx"></div>

                                                </div><span class="country-name">Mexico (México)</span><span

                                                    class="dial-code">+52</span>

                                            </li>

                                            <li class="country" data-dial-code="691" data-country-code="fm">

                                                <div class="flag">

                                                    <div class="iti-flag fm"></div>

                                                </div><span class="country-name">Micronesia</span><span

                                                    class="dial-code">+691</span>

                                            </li>

                                            <li class="country" data-dial-code="373" data-country-code="md">

                                                <div class="flag">

                                                    <div class="iti-flag md"></div>

                                                </div><span class="country-name">Moldova (Republica Moldova)</span><span

                                                    class="dial-code">+373</span>

                                            </li>

                                            <li class="country" data-dial-code="377" data-country-code="mc">

                                                <div class="flag">

                                                    <div class="iti-flag mc"></div>

                                                </div><span class="country-name">Monaco</span><span

                                                    class="dial-code">+377</span>

                                            </li>

                                            <li class="country" data-dial-code="976" data-country-code="mn">

                                                <div class="flag">

                                                    <div class="iti-flag mn"></div>

                                                </div><span class="country-name">Mongolia (Монгол)</span><span

                                                    class="dial-code">+976</span>

                                            </li>

                                            <li class="country" data-dial-code="382" data-country-code="me">

                                                <div class="flag">

                                                    <div class="iti-flag me"></div>

                                                </div><span class="country-name">Montenegro (Crna Gora)</span><span

                                                    class="dial-code">+382</span>

                                            </li>

                                            <li class="country" data-dial-code="1664" data-country-code="ms">

                                                <div class="flag">

                                                    <div class="iti-flag ms"></div>

                                                </div><span class="country-name">Montserrat</span><span

                                                    class="dial-code">+1664</span>

                                            </li>

                                            <li class="country" data-dial-code="212" data-country-code="ma">

                                                <div class="flag">

                                                    <div class="iti-flag ma"></div>

                                                </div><span class="country-name">Morocco (‫المغرب‬‎)</span><span

                                                    class="dial-code">+212</span>

                                            </li>

                                            <li class="country" data-dial-code="258" data-country-code="mz">

                                                <div class="flag">

                                                    <div class="iti-flag mz"></div>

                                                </div><span class="country-name">Mozambique (Moçambique)</span><span

                                                    class="dial-code">+258</span>

                                            </li>

                                            <li class="country" data-dial-code="95" data-country-code="mm">

                                                <div class="flag">

                                                    <div class="iti-flag mm"></div>

                                                </div><span class="country-name">Myanmar (Burma) (မြန်မာ)</span><span

                                                    class="dial-code">+95</span>

                                            </li>

                                            <li class="country" data-dial-code="264" data-country-code="na">

                                                <div class="flag">

                                                    <div class="iti-flag na"></div>

                                                </div><span class="country-name">Namibia (Namibië)</span><span

                                                    class="dial-code">+264</span>

                                            </li>

                                            <li class="country" data-dial-code="674" data-country-code="nr">

                                                <div class="flag">

                                                    <div class="iti-flag nr"></div>

                                                </div><span class="country-name">Nauru</span><span

                                                    class="dial-code">+674</span>

                                            </li>

                                            <li class="country" data-dial-code="977" data-country-code="np">

                                                <div class="flag">

                                                    <div class="iti-flag np"></div>

                                                </div><span class="country-name">Nepal (नेपाल)</span><span

                                                    class="dial-code">+977</span>

                                            </li>

                                            <li class="country" data-dial-code="31" data-country-code="nl">

                                                <div class="flag">

                                                    <div class="iti-flag nl"></div>

                                                </div><span class="country-name">Netherlands (Nederland)</span><span

                                                    class="dial-code">+31</span>

                                            </li>

                                            <li class="country" data-dial-code="687" data-country-code="nc">

                                                <div class="flag">

                                                    <div class="iti-flag nc"></div>

                                                </div><span class="country-name">New Caledonia

                                                    (Nouvelle-Calédonie)</span><span class="dial-code">+687</span>

                                            </li>

                                            <li class="country" data-dial-code="64" data-country-code="nz">

                                                <div class="flag">

                                                    <div class="iti-flag nz"></div>

                                                </div><span class="country-name">New Zealand</span><span

                                                    class="dial-code">+64</span>

                                            </li>

                                            <li class="country" data-dial-code="505" data-country-code="ni">

                                                <div class="flag">

                                                    <div class="iti-flag ni"></div>

                                                </div><span class="country-name">Nicaragua</span><span

                                                    class="dial-code">+505</span>

                                            </li>

                                            <li class="country" data-dial-code="227" data-country-code="ne">

                                                <div class="flag">

                                                    <div class="iti-flag ne"></div>

                                                </div><span class="country-name">Niger (Nijar)</span><span

                                                    class="dial-code">+227</span>

                                            </li>

                                            <li class="country" data-dial-code="234" data-country-code="ng">

                                                <div class="flag">

                                                    <div class="iti-flag ng"></div>

                                                </div><span class="country-name">Nigeria</span><span

                                                    class="dial-code">+234</span>

                                            </li>

                                            <li class="country" data-dial-code="683" data-country-code="nu">

                                                <div class="flag">

                                                    <div class="iti-flag nu"></div>

                                                </div><span class="country-name">Niue</span><span

                                                    class="dial-code">+683</span>

                                            </li>

                                            <li class="country" data-dial-code="672" data-country-code="nf">

                                                <div class="flag">

                                                    <div class="iti-flag nf"></div>

                                                </div><span class="country-name">Norfolk Island</span><span

                                                    class="dial-code">+672</span>

                                            </li>

                                            <li class="country" data-dial-code="850" data-country-code="kp">

                                                <div class="flag">

                                                    <div class="iti-flag kp"></div>

                                                </div><span class="country-name">North Korea (조선 민주주의 인민

                                                    공화국)</span><span class="dial-code">+850</span>

                                            </li>

                                            <li class="country" data-dial-code="1670" data-country-code="mp">

                                                <div class="flag">

                                                    <div class="iti-flag mp"></div>

                                                </div><span class="country-name">Northern Mariana Islands</span><span

                                                    class="dial-code">+1670</span>

                                            </li>

                                            <li class="country" data-dial-code="47" data-country-code="no">

                                                <div class="flag">

                                                    <div class="iti-flag no"></div>

                                                </div><span class="country-name">Norway (Norge)</span><span

                                                    class="dial-code">+47</span>

                                            </li>

                                            <li class="country" data-dial-code="968" data-country-code="om">

                                                <div class="flag">

                                                    <div class="iti-flag om"></div>

                                                </div><span class="country-name">Oman (‫عُمان‬‎)</span><span

                                                    class="dial-code">+968</span>

                                            </li>

                                            <li class="country" data-dial-code="92" data-country-code="pk">

                                                <div class="flag">

                                                    <div class="iti-flag pk"></div>

                                                </div><span class="country-name">Pakistan (‫پاکستان‬‎)</span><span

                                                    class="dial-code">+92</span>

                                            </li>

                                            <li class="country" data-dial-code="680" data-country-code="pw">

                                                <div class="flag">

                                                    <div class="iti-flag pw"></div>

                                                </div><span class="country-name">Palau</span><span

                                                    class="dial-code">+680</span>

                                            </li>

                                            <li class="country" data-dial-code="970" data-country-code="ps">

                                                <div class="flag">

                                                    <div class="iti-flag ps"></div>

                                                </div><span class="country-name">Palestine (‫فلسطين‬‎)</span><span

                                                    class="dial-code">+970</span>

                                            </li>

                                            <li class="country" data-dial-code="507" data-country-code="pa">

                                                <div class="flag">

                                                    <div class="iti-flag pa"></div>

                                                </div><span class="country-name">Panama (Panamá)</span><span

                                                    class="dial-code">+507</span>

                                            </li>

                                            <li class="country" data-dial-code="675" data-country-code="pg">

                                                <div class="flag">

                                                    <div class="iti-flag pg"></div>

                                                </div><span class="country-name">Papua New Guinea</span><span

                                                    class="dial-code">+675</span>

                                            </li>

                                            <li class="country" data-dial-code="595" data-country-code="py">

                                                <div class="flag">

                                                    <div class="iti-flag py"></div>

                                                </div><span class="country-name">Paraguay</span><span

                                                    class="dial-code">+595</span>

                                            </li>

                                            <li class="country" data-dial-code="51" data-country-code="pe">

                                                <div class="flag">

                                                    <div class="iti-flag pe"></div>

                                                </div><span class="country-name">Peru (Perú)</span><span

                                                    class="dial-code">+51</span>

                                            </li>

                                            <li class="country" data-dial-code="63" data-country-code="ph">

                                                <div class="flag">

                                                    <div class="iti-flag ph"></div>

                                                </div><span class="country-name">Philippines</span><span

                                                    class="dial-code">+63</span>

                                            </li>

                                            <li class="country" data-dial-code="48" data-country-code="pl">

                                                <div class="flag">

                                                    <div class="iti-flag pl"></div>

                                                </div><span class="country-name">Poland (Polska)</span><span

                                                    class="dial-code">+48</span>

                                            </li>

                                            <li class="country" data-dial-code="351" data-country-code="pt">

                                                <div class="flag">

                                                    <div class="iti-flag pt"></div>

                                                </div><span class="country-name">Portugal</span><span

                                                    class="dial-code">+351</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="pr">

                                                <div class="flag">

                                                    <div class="iti-flag pr"></div>

                                                </div><span class="country-name">Puerto Rico</span><span

                                                    class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="974" data-country-code="qa">

                                                <div class="flag">

                                                    <div class="iti-flag qa"></div>

                                                </div><span class="country-name">Qatar (‫قطر‬‎)</span><span

                                                    class="dial-code">+974</span>

                                            </li>

                                            <li class="country" data-dial-code="262" data-country-code="re">

                                                <div class="flag">

                                                    <div class="iti-flag re"></div>

                                                </div><span class="country-name">Réunion (La Réunion)</span><span

                                                    class="dial-code">+262</span>

                                            </li>

                                            <li class="country" data-dial-code="40" data-country-code="ro">

                                                <div class="flag">

                                                    <div class="iti-flag ro"></div>

                                                </div><span class="country-name">Romania (România)</span><span

                                                    class="dial-code">+40</span>

                                            </li>

                                            <li class="country" data-dial-code="7" data-country-code="ru">

                                                <div class="flag">

                                                    <div class="iti-flag ru"></div>

                                                </div><span class="country-name">Russia (Россия)</span><span

                                                    class="dial-code">+7</span>

                                            </li>

                                            <li class="country" data-dial-code="250" data-country-code="rw">

                                                <div class="flag">

                                                    <div class="iti-flag rw"></div>

                                                </div><span class="country-name">Rwanda</span><span

                                                    class="dial-code">+250</span>

                                            </li>

                                            <li class="country" data-dial-code="590" data-country-code="bl">

                                                <div class="flag">

                                                    <div class="iti-flag bl"></div>

                                                </div><span class="country-name">Saint Barthélemy

                                                    (Saint-Barthélemy)</span><span class="dial-code">+590</span>

                                            </li>

                                            <li class="country" data-dial-code="290" data-country-code="sh">

                                                <div class="flag">

                                                    <div class="iti-flag sh"></div>

                                                </div><span class="country-name">Saint Helena</span><span

                                                    class="dial-code">+290</span>

                                            </li>

                                            <li class="country" data-dial-code="1869" data-country-code="kn">

                                                <div class="flag">

                                                    <div class="iti-flag kn"></div>

                                                </div><span class="country-name">Saint Kitts and Nevis</span><span

                                                    class="dial-code">+1869</span>

                                            </li>

                                            <li class="country" data-dial-code="1758" data-country-code="lc">

                                                <div class="flag">

                                                    <div class="iti-flag lc"></div>

                                                </div><span class="country-name">Saint Lucia</span><span

                                                    class="dial-code">+1758</span>

                                            </li>

                                            <li class="country" data-dial-code="590" data-country-code="mf">

                                                <div class="flag">

                                                    <div class="iti-flag mf"></div>

                                                </div><span class="country-name">Saint Martin (Saint-Martin (partie

                                                    française))</span><span class="dial-code">+590</span>

                                            </li>

                                            <li class="country" data-dial-code="508" data-country-code="pm">

                                                <div class="flag">

                                                    <div class="iti-flag pm"></div>

                                                </div><span class="country-name">Saint Pierre and Miquelon

                                                    (Saint-Pierre-et-Miquelon)</span><span class="dial-code">+508</span>

                                            </li>

                                            <li class="country" data-dial-code="1784" data-country-code="vc">

                                                <div class="flag">

                                                    <div class="iti-flag vc"></div>

                                                </div><span class="country-name">Saint Vincent and the

                                                    Grenadines</span><span class="dial-code">+1784</span>

                                            </li>

                                            <li class="country" data-dial-code="685" data-country-code="ws">

                                                <div class="flag">

                                                    <div class="iti-flag ws"></div>

                                                </div><span class="country-name">Samoa</span><span

                                                    class="dial-code">+685</span>

                                            </li>

                                            <li class="country" data-dial-code="378" data-country-code="sm">

                                                <div class="flag">

                                                    <div class="iti-flag sm"></div>

                                                </div><span class="country-name">San Marino</span><span

                                                    class="dial-code">+378</span>

                                            </li>

                                            <li class="country" data-dial-code="239" data-country-code="st">

                                                <div class="flag">

                                                    <div class="iti-flag st"></div>

                                                </div><span class="country-name">São Tomé and Príncipe (São Tomé e

                                                    Príncipe)</span><span class="dial-code">+239</span>

                                            </li>

                                            <li class="country" data-dial-code="966" data-country-code="sa">

                                                <div class="flag">

                                                    <div class="iti-flag sa"></div>

                                                </div><span class="country-name">Saudi Arabia (‫المملكة العربية

                                                    السعودية‬‎)</span><span class="dial-code">+966</span>

                                            </li>

                                            <li class="country" data-dial-code="221" data-country-code="sn">

                                                <div class="flag">

                                                    <div class="iti-flag sn"></div>

                                                </div><span class="country-name">Senegal (Sénégal)</span><span

                                                    class="dial-code">+221</span>

                                            </li>

                                            <li class="country" data-dial-code="381" data-country-code="rs">

                                                <div class="flag">

                                                    <div class="iti-flag rs"></div>

                                                </div><span class="country-name">Serbia (Србија)</span><span

                                                    class="dial-code">+381</span>

                                            </li>

                                            <li class="country" data-dial-code="248" data-country-code="sc">

                                                <div class="flag">

                                                    <div class="iti-flag sc"></div>

                                                </div><span class="country-name">Seychelles</span><span

                                                    class="dial-code">+248</span>

                                            </li>

                                            <li class="country" data-dial-code="232" data-country-code="sl">

                                                <div class="flag">

                                                    <div class="iti-flag sl"></div>

                                                </div><span class="country-name">Sierra Leone</span><span

                                                    class="dial-code">+232</span>

                                            </li>

                                            <li class="country" data-dial-code="65" data-country-code="sg">

                                                <div class="flag">

                                                    <div class="iti-flag sg"></div>

                                                </div><span class="country-name">Singapore</span><span

                                                    class="dial-code">+65</span>

                                            </li>

                                            <li class="country" data-dial-code="1721" data-country-code="sx">

                                                <div class="flag">

                                                    <div class="iti-flag sx"></div>

                                                </div><span class="country-name">Sint Maarten</span><span

                                                    class="dial-code">+1721</span>

                                            </li>

                                            <li class="country" data-dial-code="421" data-country-code="sk">

                                                <div class="flag">

                                                    <div class="iti-flag sk"></div>

                                                </div><span class="country-name">Slovakia (Slovensko)</span><span

                                                    class="dial-code">+421</span>

                                            </li>

                                            <li class="country" data-dial-code="386" data-country-code="si">

                                                <div class="flag">

                                                    <div class="iti-flag si"></div>

                                                </div><span class="country-name">Slovenia (Slovenija)</span><span

                                                    class="dial-code">+386</span>

                                            </li>

                                            <li class="country" data-dial-code="677" data-country-code="sb">

                                                <div class="flag">

                                                    <div class="iti-flag sb"></div>

                                                </div><span class="country-name">Solomon Islands</span><span

                                                    class="dial-code">+677</span>

                                            </li>

                                            <li class="country" data-dial-code="252" data-country-code="so">

                                                <div class="flag">

                                                    <div class="iti-flag so"></div>

                                                </div><span class="country-name">Somalia (Soomaaliya)</span><span

                                                    class="dial-code">+252</span>

                                            </li>

                                            <li class="country" data-dial-code="27" data-country-code="za">

                                                <div class="flag">

                                                    <div class="iti-flag za"></div>

                                                </div><span class="country-name">South Africa</span><span

                                                    class="dial-code">+27</span>

                                            </li>

                                            <li class="country" data-dial-code="82" data-country-code="kr">

                                                <div class="flag">

                                                    <div class="iti-flag kr"></div>

                                                </div><span class="country-name">South Korea (대한민국)</span><span

                                                    class="dial-code">+82</span>

                                            </li>

                                            <li class="country" data-dial-code="211" data-country-code="ss">

                                                <div class="flag">

                                                    <div class="iti-flag ss"></div>

                                                </div><span class="country-name">South Sudan (‫جنوب

                                                    السودان‬‎)</span><span class="dial-code">+211</span>

                                            </li>

                                            <li class="country" data-dial-code="34" data-country-code="es">

                                                <div class="flag">

                                                    <div class="iti-flag es"></div>

                                                </div><span class="country-name">Spain (España)</span><span

                                                    class="dial-code">+34</span>

                                            </li>

                                            <li class="country" data-dial-code="94" data-country-code="lk">

                                                <div class="flag">

                                                    <div class="iti-flag lk"></div>

                                                </div><span class="country-name">Sri Lanka (ශ්‍රී ලංකාව)</span><span

                                                    class="dial-code">+94</span>

                                            </li>

                                            <li class="country" data-dial-code="249" data-country-code="sd">

                                                <div class="flag">

                                                    <div class="iti-flag sd"></div>

                                                </div><span class="country-name">Sudan (‫السودان‬‎)</span><span

                                                    class="dial-code">+249</span>

                                            </li>

                                            <li class="country" data-dial-code="597" data-country-code="sr">

                                                <div class="flag">

                                                    <div class="iti-flag sr"></div>

                                                </div><span class="country-name">Suriname</span><span

                                                    class="dial-code">+597</span>

                                            </li>

                                            <li class="country" data-dial-code="47" data-country-code="sj">

                                                <div class="flag">

                                                    <div class="iti-flag sj"></div>

                                                </div><span class="country-name">Svalbard and Jan Mayen</span><span

                                                    class="dial-code">+47</span>

                                            </li>

                                            <li class="country" data-dial-code="268" data-country-code="sz">

                                                <div class="flag">

                                                    <div class="iti-flag sz"></div>

                                                </div><span class="country-name">Swaziland</span><span

                                                    class="dial-code">+268</span>

                                            </li>

                                            <li class="country" data-dial-code="46" data-country-code="se">

                                                <div class="flag">

                                                    <div class="iti-flag se"></div>

                                                </div><span class="country-name">Sweden (Sverige)</span><span

                                                    class="dial-code">+46</span>

                                            </li>

                                            <li class="country" data-dial-code="41" data-country-code="ch">

                                                <div class="flag">

                                                    <div class="iti-flag ch"></div>

                                                </div><span class="country-name">Switzerland (Schweiz)</span><span

                                                    class="dial-code">+41</span>

                                            </li>

                                            <li class="country" data-dial-code="963" data-country-code="sy">

                                                <div class="flag">

                                                    <div class="iti-flag sy"></div>

                                                </div><span class="country-name">Syria (‫سوريا‬‎)</span><span

                                                    class="dial-code">+963</span>

                                            </li>

                                            <li class="country" data-dial-code="886" data-country-code="tw">

                                                <div class="flag">

                                                    <div class="iti-flag tw"></div>

                                                </div><span class="country-name">Taiwan (台灣)</span><span

                                                    class="dial-code">+886</span>

                                            </li>

                                            <li class="country" data-dial-code="992" data-country-code="tj">

                                                <div class="flag">

                                                    <div class="iti-flag tj"></div>

                                                </div><span class="country-name">Tajikistan</span><span

                                                    class="dial-code">+992</span>

                                            </li>

                                            <li class="country" data-dial-code="255" data-country-code="tz">

                                                <div class="flag">

                                                    <div class="iti-flag tz"></div>

                                                </div><span class="country-name">Tanzania</span><span

                                                    class="dial-code">+255</span>

                                            </li>

                                            <li class="country" data-dial-code="66" data-country-code="th">

                                                <div class="flag">

                                                    <div class="iti-flag th"></div>

                                                </div><span class="country-name">Thailand (ไทย)</span><span

                                                    class="dial-code">+66</span>

                                            </li>

                                            <li class="country" data-dial-code="670" data-country-code="tl">

                                                <div class="flag">

                                                    <div class="iti-flag tl"></div>

                                                </div><span class="country-name">Timor-Leste</span><span

                                                    class="dial-code">+670</span>

                                            </li>

                                            <li class="country" data-dial-code="228" data-country-code="tg">

                                                <div class="flag">

                                                    <div class="iti-flag tg"></div>

                                                </div><span class="country-name">Togo</span><span

                                                    class="dial-code">+228</span>

                                            </li>

                                            <li class="country" data-dial-code="690" data-country-code="tk">

                                                <div class="flag">

                                                    <div class="iti-flag tk"></div>

                                                </div><span class="country-name">Tokelau</span><span

                                                    class="dial-code">+690</span>

                                            </li>

                                            <li class="country" data-dial-code="676" data-country-code="to">

                                                <div class="flag">

                                                    <div class="iti-flag to"></div>

                                                </div><span class="country-name">Tonga</span><span

                                                    class="dial-code">+676</span>

                                            </li>

                                            <li class="country" data-dial-code="1868" data-country-code="tt">

                                                <div class="flag">

                                                    <div class="iti-flag tt"></div>

                                                </div><span class="country-name">Trinidad and Tobago</span><span

                                                    class="dial-code">+1868</span>

                                            </li>

                                            <li class="country" data-dial-code="216" data-country-code="tn">

                                                <div class="flag">

                                                    <div class="iti-flag tn"></div>

                                                </div><span class="country-name">Tunisia (‫تونس‬‎)</span><span

                                                    class="dial-code">+216</span>

                                            </li>

                                            <li class="country" data-dial-code="90" data-country-code="tr">

                                                <div class="flag">

                                                    <div class="iti-flag tr"></div>

                                                </div><span class="country-name">Turkey (Türkiye)</span><span

                                                    class="dial-code">+90</span>

                                            </li>

                                            <li class="country" data-dial-code="993" data-country-code="tm">

                                                <div class="flag">

                                                    <div class="iti-flag tm"></div>

                                                </div><span class="country-name">Turkmenistan</span><span

                                                    class="dial-code">+993</span>

                                            </li>

                                            <li class="country" data-dial-code="1649" data-country-code="tc">

                                                <div class="flag">

                                                    <div class="iti-flag tc"></div>

                                                </div><span class="country-name">Turks and Caicos Islands</span><span

                                                    class="dial-code">+1649</span>

                                            </li>

                                            <li class="country" data-dial-code="688" data-country-code="tv">

                                                <div class="flag">

                                                    <div class="iti-flag tv"></div>

                                                </div><span class="country-name">Tuvalu</span><span

                                                    class="dial-code">+688</span>

                                            </li>

                                            <li class="country" data-dial-code="1340" data-country-code="vi">

                                                <div class="flag">

                                                    <div class="iti-flag vi"></div>

                                                </div><span class="country-name">U.S. Virgin Islands</span><span

                                                    class="dial-code">+1340</span>

                                            </li>

                                            <li class="country" data-dial-code="256" data-country-code="ug">

                                                <div class="flag">

                                                    <div class="iti-flag ug"></div>

                                                </div><span class="country-name">Uganda</span><span

                                                    class="dial-code">+256</span>

                                            </li>

                                            <li class="country" data-dial-code="380" data-country-code="ua">

                                                <div class="flag">

                                                    <div class="iti-flag ua"></div>

                                                </div><span class="country-name">Ukraine (Україна)</span><span

                                                    class="dial-code">+380</span>

                                            </li>

                                            <li class="country" data-dial-code="971" data-country-code="ae">

                                                <div class="flag">

                                                    <div class="iti-flag ae"></div>

                                                </div><span class="country-name">United Arab Emirates (‫الإمارات العربية

                                                    المتحدة‬‎)</span><span class="dial-code">+971</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="gb">

                                                <div class="flag">

                                                    <div class="iti-flag gb"></div>

                                                </div><span class="country-name">United Kingdom</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="us">

                                                <div class="flag">

                                                    <div class="iti-flag us"></div>

                                                </div><span class="country-name">United States</span><span

                                                    class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="598" data-country-code="uy">

                                                <div class="flag">

                                                    <div class="iti-flag uy"></div>

                                                </div><span class="country-name">Uruguay</span><span

                                                    class="dial-code">+598</span>

                                            </li>

                                            <li class="country" data-dial-code="998" data-country-code="uz">

                                                <div class="flag">

                                                    <div class="iti-flag uz"></div>

                                                </div><span class="country-name">Uzbekistan (Oʻzbekiston)</span><span

                                                    class="dial-code">+998</span>

                                            </li>

                                            <li class="country" data-dial-code="678" data-country-code="vu">

                                                <div class="flag">

                                                    <div class="iti-flag vu"></div>

                                                </div><span class="country-name">Vanuatu</span><span

                                                    class="dial-code">+678</span>

                                            </li>

                                            <li class="country" data-dial-code="39" data-country-code="va">

                                                <div class="flag">

                                                    <div class="iti-flag va"></div>

                                                </div><span class="country-name">Vatican City (Città del

                                                    Vaticano)</span><span class="dial-code">+39</span>

                                            </li>

                                            <li class="country" data-dial-code="58" data-country-code="ve">

                                                <div class="flag">

                                                    <div class="iti-flag ve"></div>

                                                </div><span class="country-name">Venezuela</span><span

                                                    class="dial-code">+58</span>

                                            </li>

                                            <li class="country" data-dial-code="84" data-country-code="vn">

                                                <div class="flag">

                                                    <div class="iti-flag vn"></div>

                                                </div><span class="country-name">Vietnam (Việt Nam)</span><span

                                                    class="dial-code">+84</span>

                                            </li>

                                            <li class="country" data-dial-code="681" data-country-code="wf">

                                                <div class="flag">

                                                    <div class="iti-flag wf"></div>

                                                </div><span class="country-name">Wallis and Futuna</span><span

                                                    class="dial-code">+681</span>

                                            </li>

                                            <li class="country" data-dial-code="212" data-country-code="eh">

                                                <div class="flag">

                                                    <div class="iti-flag eh"></div>

                                                </div><span class="country-name">Western Sahara (‫الصحراء

                                                    الغربية‬‎)</span><span class="dial-code">+212</span>

                                            </li>

                                            <li class="country" data-dial-code="967" data-country-code="ye">

                                                <div class="flag">

                                                    <div class="iti-flag ye"></div>

                                                </div><span class="country-name">Yemen (‫اليمن‬‎)</span><span

                                                    class="dial-code">+967</span>

                                            </li>

                                            <li class="country" data-dial-code="260" data-country-code="zm">

                                                <div class="flag">

                                                    <div class="iti-flag zm"></div>

                                                </div><span class="country-name">Zambia</span><span

                                                    class="dial-code">+260</span>

                                            </li>

                                            <li class="country" data-dial-code="263" data-country-code="zw">

                                                <div class="flag">

                                                    <div class="iti-flag zw"></div>

                                                </div><span class="country-name">Zimbabwe</span><span

                                                    class="dial-code">+263</span>

                                            </li>

                                            <li class="country" data-dial-code="358" data-country-code="ax">

                                                <div class="flag">

                                                    <div class="iti-flag ax"></div>

                                                </div><span class="country-name">Åland Islands</span><span

                                                    class="dial-code">+358</span>

                                            </li>

                                        </ul> -->

                                    <!-- </div> -->

                                    <input id="customer_contact" type="text"

                                        class="form-control input-lg"

                                        id="customer_contact"  name="customer_contact" autocomplete="off"

                                        placeholder="Mobile Number" maxlength="15" onkeypress='validateNumber(event)' value="{{$get_enquiries->customer_contact}}">

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_alt_contact">ALTERNATE CONTACT ID</label>

                                <div class="intl-tel-input">

                                    <!-- <div class="flag-container"> -->

                                       <!--  <div tabindex="0" class="selected-flag" title="Brazil (Brasil): +55">

                                            <div class="iti-flag br"></div>

                                            <div class="arrow"></div>

                                        </div> -->

                                       <!--  <ul class="country-list hide">

                                            <li class="country" data-dial-code="93" data-country-code="af">

                                                <div class="flag">

                                                    <div class="iti-flag af"></div>

                                                </div><span class="country-name">Afghanistan (‫افغانستان‬‎)</span><span

                                                    class="dial-code">+93</span>

                                            </li>

                                            <li class="country" data-dial-code="355" data-country-code="al">

                                                <div class="flag">

                                                    <div class="iti-flag al"></div>

                                                </div><span class="country-name">Albania (Shqipëri)</span><span

                                                    class="dial-code">+355</span>

                                            </li>

                                            <li class="country" data-dial-code="213" data-country-code="dz">

                                                <div class="flag">

                                                    <div class="iti-flag dz"></div>

                                                </div><span class="country-name">Algeria (‫الجزائر‬‎)</span><span

                                                    class="dial-code">+213</span>

                                            </li>

                                            <li class="country" data-dial-code="1684" data-country-code="as">

                                                <div class="flag">

                                                    <div class="iti-flag as"></div>

                                                </div><span class="country-name">American Samoa</span><span

                                                    class="dial-code">+1684</span>

                                            </li>

                                            <li class="country" data-dial-code="376" data-country-code="ad">

                                                <div class="flag">

                                                    <div class="iti-flag ad"></div>

                                                </div><span class="country-name">Andorra</span><span

                                                    class="dial-code">+376</span>

                                            </li>

                                            <li class="country" data-dial-code="244" data-country-code="ao">

                                                <div class="flag">

                                                    <div class="iti-flag ao"></div>

                                                </div><span class="country-name">Angola</span><span

                                                    class="dial-code">+244</span>

                                            </li>

                                            <li class="country" data-dial-code="1264" data-country-code="ai">

                                                <div class="flag">

                                                    <div class="iti-flag ai"></div>

                                                </div><span class="country-name">Anguilla</span><span

                                                    class="dial-code">+1264</span>

                                            </li>

                                            <li class="country" data-dial-code="1268" data-country-code="ag">

                                                <div class="flag">

                                                    <div class="iti-flag ag"></div>

                                                </div><span class="country-name">Antigua and Barbuda</span><span

                                                    class="dial-code">+1268</span>

                                            </li>

                                            <li class="country" data-dial-code="54" data-country-code="ar">

                                                <div class="flag">

                                                    <div class="iti-flag ar"></div>

                                                </div><span class="country-name">Argentina</span><span

                                                    class="dial-code">+54</span>

                                            </li>

                                            <li class="country" data-dial-code="374" data-country-code="am">

                                                <div class="flag">

                                                    <div class="iti-flag am"></div>

                                                </div><span class="country-name">Armenia (Հայաստան)</span><span

                                                    class="dial-code">+374</span>

                                            </li>

                                            <li class="country" data-dial-code="297" data-country-code="aw">

                                                <div class="flag">

                                                    <div class="iti-flag aw"></div>

                                                </div><span class="country-name">Aruba</span><span

                                                    class="dial-code">+297</span>

                                            </li>

                                            <li class="country" data-dial-code="61" data-country-code="au">

                                                <div class="flag">

                                                    <div class="iti-flag au"></div>

                                                </div><span class="country-name">Australia</span><span

                                                    class="dial-code">+61</span>

                                            </li>

                                            <li class="country" data-dial-code="43" data-country-code="at">

                                                <div class="flag">

                                                    <div class="iti-flag at"></div>

                                                </div><span class="country-name">Austria (Österreich)</span><span

                                                    class="dial-code">+43</span>

                                            </li>

                                            <li class="country" data-dial-code="994" data-country-code="az">

                                                <div class="flag">

                                                    <div class="iti-flag az"></div>

                                                </div><span class="country-name">Azerbaijan (Azərbaycan)</span><span

                                                    class="dial-code">+994</span>

                                            </li>

                                            <li class="country" data-dial-code="1242" data-country-code="bs">

                                                <div class="flag">

                                                    <div class="iti-flag bs"></div>

                                                </div><span class="country-name">Bahamas</span><span

                                                    class="dial-code">+1242</span>

                                            </li>

                                            <li class="country" data-dial-code="973" data-country-code="bh">

                                                <div class="flag">

                                                    <div class="iti-flag bh"></div>

                                                </div><span class="country-name">Bahrain (‫البحرين‬‎)</span><span

                                                    class="dial-code">+973</span>

                                            </li>

                                            <li class="country" data-dial-code="880" data-country-code="bd">

                                                <div class="flag">

                                                    <div class="iti-flag bd"></div>

                                                </div><span class="country-name">Bangladesh (বাংলাদেশ)</span><span

                                                    class="dial-code">+880</span>

                                            </li>

                                            <li class="country" data-dial-code="1246" data-country-code="bb">

                                                <div class="flag">

                                                    <div class="iti-flag bb"></div>

                                                </div><span class="country-name">Barbados</span><span

                                                    class="dial-code">+1246</span>

                                            </li>

                                            <li class="country" data-dial-code="375" data-country-code="by">

                                                <div class="flag">

                                                    <div class="iti-flag by"></div>

                                                </div><span class="country-name">Belarus (Беларусь)</span><span

                                                    class="dial-code">+375</span>

                                            </li>

                                            <li class="country" data-dial-code="32" data-country-code="be">

                                                <div class="flag">

                                                    <div class="iti-flag be"></div>

                                                </div><span class="country-name">Belgium (België)</span><span

                                                    class="dial-code">+32</span>

                                            </li>

                                            <li class="country" data-dial-code="501" data-country-code="bz">

                                                <div class="flag">

                                                    <div class="iti-flag bz"></div>

                                                </div><span class="country-name">Belize</span><span

                                                    class="dial-code">+501</span>

                                            </li>

                                            <li class="country" data-dial-code="229" data-country-code="bj">

                                                <div class="flag">

                                                    <div class="iti-flag bj"></div>

                                                </div><span class="country-name">Benin (Bénin)</span><span

                                                    class="dial-code">+229</span>

                                            </li>

                                            <li class="country" data-dial-code="1441" data-country-code="bm">

                                                <div class="flag">

                                                    <div class="iti-flag bm"></div>

                                                </div><span class="country-name">Bermuda</span><span

                                                    class="dial-code">+1441</span>

                                            </li>

                                            <li class="country" data-dial-code="975" data-country-code="bt">

                                                <div class="flag">

                                                    <div class="iti-flag bt"></div>

                                                </div><span class="country-name">Bhutan (འབྲུག)</span><span

                                                    class="dial-code">+975</span>

                                            </li>

                                            <li class="country" data-dial-code="591" data-country-code="bo">

                                                <div class="flag">

                                                    <div class="iti-flag bo"></div>

                                                </div><span class="country-name">Bolivia</span><span

                                                    class="dial-code">+591</span>

                                            </li>

                                            <li class="country" data-dial-code="387" data-country-code="ba">

                                                <div class="flag">

                                                    <div class="iti-flag ba"></div>

                                                </div><span class="country-name">Bosnia and Herzegovina (Босна и

                                                    Херцеговина)</span><span class="dial-code">+387</span>

                                            </li>

                                            <li class="country" data-dial-code="267" data-country-code="bw">

                                                <div class="flag">

                                                    <div class="iti-flag bw"></div>

                                                </div><span class="country-name">Botswana</span><span

                                                    class="dial-code">+267</span>

                                            </li>

                                            <li class="country highlight active" data-dial-code="55"

                                                data-country-code="br">

                                                <div class="flag">

                                                    <div class="iti-flag br"></div>

                                                </div><span class="country-name">Brazil (Brasil)</span><span

                                                    class="dial-code">+55</span>

                                            </li>

                                            <li class="country" data-dial-code="246" data-country-code="io">

                                                <div class="flag">

                                                    <div class="iti-flag io"></div>

                                                </div><span class="country-name">British Indian Ocean

                                                    Territory</span><span class="dial-code">+246</span>

                                            </li>

                                            <li class="country" data-dial-code="1284" data-country-code="vg">

                                                <div class="flag">

                                                    <div class="iti-flag vg"></div>

                                                </div><span class="country-name">British Virgin Islands</span><span

                                                    class="dial-code">+1284</span>

                                            </li>

                                            <li class="country" data-dial-code="673" data-country-code="bn">

                                                <div class="flag">

                                                    <div class="iti-flag bn"></div>

                                                </div><span class="country-name">Brunei</span><span

                                                    class="dial-code">+673</span>

                                            </li>

                                            <li class="country" data-dial-code="359" data-country-code="bg">

                                                <div class="flag">

                                                    <div class="iti-flag bg"></div>

                                                </div><span class="country-name">Bulgaria (България)</span><span

                                                    class="dial-code">+359</span>

                                            </li>

                                            <li class="country" data-dial-code="226" data-country-code="bf">

                                                <div class="flag">

                                                    <div class="iti-flag bf"></div>

                                                </div><span class="country-name">Burkina Faso</span><span

                                                    class="dial-code">+226</span>

                                            </li>

                                            <li class="country" data-dial-code="257" data-country-code="bi">

                                                <div class="flag">

                                                    <div class="iti-flag bi"></div>

                                                </div><span class="country-name">Burundi (Uburundi)</span><span

                                                    class="dial-code">+257</span>

                                            </li>

                                            <li class="country" data-dial-code="855" data-country-code="kh">

                                                <div class="flag">

                                                    <div class="iti-flag kh"></div>

                                                </div><span class="country-name">Cambodia (កម្ពុជា)</span><span

                                                    class="dial-code">+855</span>

                                            </li>

                                            <li class="country" data-dial-code="237" data-country-code="cm">

                                                <div class="flag">

                                                    <div class="iti-flag cm"></div>

                                                </div><span class="country-name">Cameroon (Cameroun)</span><span

                                                    class="dial-code">+237</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="ca">

                                                <div class="flag">

                                                    <div class="iti-flag ca"></div>

                                                </div><span class="country-name">Canada</span><span

                                                    class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="238" data-country-code="cv">

                                                <div class="flag">

                                                    <div class="iti-flag cv"></div>

                                                </div><span class="country-name">Cape Verde (Kabu Verdi)</span><span

                                                    class="dial-code">+238</span>

                                            </li>

                                            <li class="country" data-dial-code="599" data-country-code="bq">

                                                <div class="flag">

                                                    <div class="iti-flag bq"></div>

                                                </div><span class="country-name">Caribbean Netherlands</span><span

                                                    class="dial-code">+599</span>

                                            </li>

                                            <li class="country" data-dial-code="1345" data-country-code="ky">

                                                <div class="flag">

                                                    <div class="iti-flag ky"></div>

                                                </div><span class="country-name">Cayman Islands</span><span

                                                    class="dial-code">+1345</span>

                                            </li>

                                            <li class="country" data-dial-code="236" data-country-code="cf">

                                                <div class="flag">

                                                    <div class="iti-flag cf"></div>

                                                </div><span class="country-name">Central African Republic (République

                                                    centrafricaine)</span><span class="dial-code">+236</span>

                                            </li>

                                            <li class="country" data-dial-code="235" data-country-code="td">

                                                <div class="flag">

                                                    <div class="iti-flag td"></div>

                                                </div><span class="country-name">Chad (Tchad)</span><span

                                                    class="dial-code">+235</span>

                                            </li>

                                            <li class="country" data-dial-code="56" data-country-code="cl">

                                                <div class="flag">

                                                    <div class="iti-flag cl"></div>

                                                </div><span class="country-name">Chile</span><span

                                                    class="dial-code">+56</span>

                                            </li>

                                            <li class="country" data-dial-code="86" data-country-code="cn">

                                                <div class="flag">

                                                    <div class="iti-flag cn"></div>

                                                </div><span class="country-name">China (中国)</span><span

                                                    class="dial-code">+86</span>

                                            </li>

                                            <li class="country" data-dial-code="61" data-country-code="cx">

                                                <div class="flag">

                                                    <div class="iti-flag cx"></div>

                                                </div><span class="country-name">Christmas Island</span><span

                                                    class="dial-code">+61</span>

                                            </li>

                                            <li class="country" data-dial-code="61" data-country-code="cc">

                                                <div class="flag">

                                                    <div class="iti-flag cc"></div>

                                                </div><span class="country-name">Cocos (Keeling) Islands</span><span

                                                    class="dial-code">+61</span>

                                            </li>

                                            <li class="country" data-dial-code="57" data-country-code="co">

                                                <div class="flag">

                                                    <div class="iti-flag co"></div>

                                                </div><span class="country-name">Colombia</span><span

                                                    class="dial-code">+57</span>

                                            </li>

                                            <li class="country" data-dial-code="269" data-country-code="km">

                                                <div class="flag">

                                                    <div class="iti-flag km"></div>

                                                </div><span class="country-name">Comoros (‫جزر القمر‬‎)</span><span

                                                    class="dial-code">+269</span>

                                            </li>

                                            <li class="country" data-dial-code="243" data-country-code="cd">

                                                <div class="flag">

                                                    <div class="iti-flag cd"></div>

                                                </div><span class="country-name">Congo (DRC) (Jamhuri ya Kidemokrasia ya

                                                    Kongo)</span><span class="dial-code">+243</span>

                                            </li>

                                            <li class="country" data-dial-code="242" data-country-code="cg">

                                                <div class="flag">

                                                    <div class="iti-flag cg"></div>

                                                </div><span class="country-name">Congo (Republic)

                                                    (Congo-Brazzaville)</span><span class="dial-code">+242</span>

                                            </li>

                                            <li class="country" data-dial-code="682" data-country-code="ck">

                                                <div class="flag">

                                                    <div class="iti-flag ck"></div>

                                                </div><span class="country-name">Cook Islands</span><span

                                                    class="dial-code">+682</span>

                                            </li>

                                            <li class="country" data-dial-code="506" data-country-code="cr">

                                                <div class="flag">

                                                    <div class="iti-flag cr"></div>

                                                </div><span class="country-name">Costa Rica</span><span

                                                    class="dial-code">+506</span>

                                            </li>

                                            <li class="country" data-dial-code="225" data-country-code="ci">

                                                <div class="flag">

                                                    <div class="iti-flag ci"></div>

                                                </div><span class="country-name">Côte d’Ivoire</span><span

                                                    class="dial-code">+225</span>

                                            </li>

                                            <li class="country" data-dial-code="385" data-country-code="hr">

                                                <div class="flag">

                                                    <div class="iti-flag hr"></div>

                                                </div><span class="country-name">Croatia (Hrvatska)</span><span

                                                    class="dial-code">+385</span>

                                            </li>

                                            <li class="country" data-dial-code="53" data-country-code="cu">

                                                <div class="flag">

                                                    <div class="iti-flag cu"></div>

                                                </div><span class="country-name">Cuba</span><span

                                                    class="dial-code">+53</span>

                                            </li>

                                            <li class="country" data-dial-code="599" data-country-code="cw">

                                                <div class="flag">

                                                    <div class="iti-flag cw"></div>

                                                </div><span class="country-name">Curaçao</span><span

                                                    class="dial-code">+599</span>

                                            </li>

                                            <li class="country" data-dial-code="357" data-country-code="cy">

                                                <div class="flag">

                                                    <div class="iti-flag cy"></div>

                                                </div><span class="country-name">Cyprus (Κύπρος)</span><span

                                                    class="dial-code">+357</span>

                                            </li>

                                            <li class="country" data-dial-code="420" data-country-code="cz">

                                                <div class="flag">

                                                    <div class="iti-flag cz"></div>

                                                </div><span class="country-name">Czech Republic (Česká

                                                    republika)</span><span class="dial-code">+420</span>

                                            </li>

                                            <li class="country" data-dial-code="45" data-country-code="dk">

                                                <div class="flag">

                                                    <div class="iti-flag dk"></div>

                                                </div><span class="country-name">Denmark (Danmark)</span><span

                                                    class="dial-code">+45</span>

                                            </li>

                                            <li class="country" data-dial-code="253" data-country-code="dj">

                                                <div class="flag">

                                                    <div class="iti-flag dj"></div>

                                                </div><span class="country-name">Djibouti</span><span

                                                    class="dial-code">+253</span>

                                            </li>

                                            <li class="country" data-dial-code="1767" data-country-code="dm">

                                                <div class="flag">

                                                    <div class="iti-flag dm"></div>

                                                </div><span class="country-name">Dominica</span><span

                                                    class="dial-code">+1767</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="do">

                                                <div class="flag">

                                                    <div class="iti-flag do"></div>

                                                </div><span class="country-name">Dominican Republic (República

                                                    Dominicana)</span><span class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="593" data-country-code="ec">

                                                <div class="flag">

                                                    <div class="iti-flag ec"></div>

                                                </div><span class="country-name">Ecuador</span><span

                                                    class="dial-code">+593</span>

                                            </li>

                                            <li class="country" data-dial-code="20" data-country-code="eg">

                                                <div class="flag">

                                                    <div class="iti-flag eg"></div>

                                                </div><span class="country-name">Egypt (‫مصر‬‎)</span><span

                                                    class="dial-code">+20</span>

                                            </li>

                                            <li class="country" data-dial-code="503" data-country-code="sv">

                                                <div class="flag">

                                                    <div class="iti-flag sv"></div>

                                                </div><span class="country-name">El Salvador</span><span

                                                    class="dial-code">+503</span>

                                            </li>

                                            <li class="country" data-dial-code="240" data-country-code="gq">

                                                <div class="flag">

                                                    <div class="iti-flag gq"></div>

                                                </div><span class="country-name">Equatorial Guinea (Guinea

                                                    Ecuatorial)</span><span class="dial-code">+240</span>

                                            </li>

                                            <li class="country" data-dial-code="291" data-country-code="er">

                                                <div class="flag">

                                                    <div class="iti-flag er"></div>

                                                </div><span class="country-name">Eritrea</span><span

                                                    class="dial-code">+291</span>

                                            </li>

                                            <li class="country" data-dial-code="372" data-country-code="ee">

                                                <div class="flag">

                                                    <div class="iti-flag ee"></div>

                                                </div><span class="country-name">Estonia (Eesti)</span><span

                                                    class="dial-code">+372</span>

                                            </li>

                                            <li class="country" data-dial-code="251" data-country-code="et">

                                                <div class="flag">

                                                    <div class="iti-flag et"></div>

                                                </div><span class="country-name">Ethiopia</span><span

                                                    class="dial-code">+251</span>

                                            </li>

                                            <li class="country" data-dial-code="500" data-country-code="fk">

                                                <div class="flag">

                                                    <div class="iti-flag fk"></div>

                                                </div><span class="country-name">Falkland Islands (Islas

                                                    Malvinas)</span><span class="dial-code">+500</span>

                                            </li>

                                            <li class="country" data-dial-code="298" data-country-code="fo">

                                                <div class="flag">

                                                    <div class="iti-flag fo"></div>

                                                </div><span class="country-name">Faroe Islands (Føroyar)</span><span

                                                    class="dial-code">+298</span>

                                            </li>

                                            <li class="country" data-dial-code="679" data-country-code="fj">

                                                <div class="flag">

                                                    <div class="iti-flag fj"></div>

                                                </div><span class="country-name">Fiji</span><span

                                                    class="dial-code">+679</span>

                                            </li>

                                            <li class="country" data-dial-code="358" data-country-code="fi">

                                                <div class="flag">

                                                    <div class="iti-flag fi"></div>

                                                </div><span class="country-name">Finland (Suomi)</span><span

                                                    class="dial-code">+358</span>

                                            </li>

                                            <li class="country" data-dial-code="33" data-country-code="fr">

                                                <div class="flag">

                                                    <div class="iti-flag fr"></div>

                                                </div><span class="country-name">France</span><span

                                                    class="dial-code">+33</span>

                                            </li>

                                            <li class="country" data-dial-code="594" data-country-code="gf">

                                                <div class="flag">

                                                    <div class="iti-flag gf"></div>

                                                </div><span class="country-name">French Guiana (Guyane

                                                    française)</span><span class="dial-code">+594</span>

                                            </li>

                                            <li class="country" data-dial-code="689" data-country-code="pf">

                                                <div class="flag">

                                                    <div class="iti-flag pf"></div>

                                                </div><span class="country-name">French Polynesia (Polynésie

                                                    française)</span><span class="dial-code">+689</span>

                                            </li>

                                            <li class="country" data-dial-code="241" data-country-code="ga">

                                                <div class="flag">

                                                    <div class="iti-flag ga"></div>

                                                </div><span class="country-name">Gabon</span><span

                                                    class="dial-code">+241</span>

                                            </li>

                                            <li class="country" data-dial-code="220" data-country-code="gm">

                                                <div class="flag">

                                                    <div class="iti-flag gm"></div>

                                                </div><span class="country-name">Gambia</span><span

                                                    class="dial-code">+220</span>

                                            </li>

                                            <li class="country" data-dial-code="995" data-country-code="ge">

                                                <div class="flag">

                                                    <div class="iti-flag ge"></div>

                                                </div><span class="country-name">Georgia (საქართველო)</span><span

                                                    class="dial-code">+995</span>

                                            </li>

                                            <li class="country" data-dial-code="49" data-country-code="de">

                                                <div class="flag">

                                                    <div class="iti-flag de"></div>

                                                </div><span class="country-name">Germany (Deutschland)</span><span

                                                    class="dial-code">+49</span>

                                            </li>

                                            <li class="country" data-dial-code="233" data-country-code="gh">

                                                <div class="flag">

                                                    <div class="iti-flag gh"></div>

                                                </div><span class="country-name">Ghana (Gaana)</span><span

                                                    class="dial-code">+233</span>

                                            </li>

                                            <li class="country" data-dial-code="350" data-country-code="gi">

                                                <div class="flag">

                                                    <div class="iti-flag gi"></div>

                                                </div><span class="country-name">Gibraltar</span><span

                                                    class="dial-code">+350</span>

                                            </li>

                                            <li class="country" data-dial-code="30" data-country-code="gr">

                                                <div class="flag">

                                                    <div class="iti-flag gr"></div>

                                                </div><span class="country-name">Greece (Ελλάδα)</span><span

                                                    class="dial-code">+30</span>

                                            </li>

                                            <li class="country" data-dial-code="299" data-country-code="gl">

                                                <div class="flag">

                                                    <div class="iti-flag gl"></div>

                                                </div><span class="country-name">Greenland (Kalaallit

                                                    Nunaat)</span><span class="dial-code">+299</span>

                                            </li>

                                            <li class="country" data-dial-code="1473" data-country-code="gd">

                                                <div class="flag">

                                                    <div class="iti-flag gd"></div>

                                                </div><span class="country-name">Grenada</span><span

                                                    class="dial-code">+1473</span>

                                            </li>

                                            <li class="country" data-dial-code="590" data-country-code="gp">

                                                <div class="flag">

                                                    <div class="iti-flag gp"></div>

                                                </div><span class="country-name">Guadeloupe</span><span

                                                    class="dial-code">+590</span>

                                            </li>

                                            <li class="country" data-dial-code="1671" data-country-code="gu">

                                                <div class="flag">

                                                    <div class="iti-flag gu"></div>

                                                </div><span class="country-name">Guam</span><span

                                                    class="dial-code">+1671</span>

                                            </li>

                                            <li class="country" data-dial-code="502" data-country-code="gt">

                                                <div class="flag">

                                                    <div class="iti-flag gt"></div>

                                                </div><span class="country-name">Guatemala</span><span

                                                    class="dial-code">+502</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="gg">

                                                <div class="flag">

                                                    <div class="iti-flag gg"></div>

                                                </div><span class="country-name">Guernsey</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="224" data-country-code="gn">

                                                <div class="flag">

                                                    <div class="iti-flag gn"></div>

                                                </div><span class="country-name">Guinea (Guinée)</span><span

                                                    class="dial-code">+224</span>

                                            </li>

                                            <li class="country" data-dial-code="245" data-country-code="gw">

                                                <div class="flag">

                                                    <div class="iti-flag gw"></div>

                                                </div><span class="country-name">Guinea-Bissau (Guiné

                                                    Bissau)</span><span class="dial-code">+245</span>

                                            </li>

                                            <li class="country" data-dial-code="592" data-country-code="gy">

                                                <div class="flag">

                                                    <div class="iti-flag gy"></div>

                                                </div><span class="country-name">Guyana</span><span

                                                    class="dial-code">+592</span>

                                            </li>

                                            <li class="country" data-dial-code="509" data-country-code="ht">

                                                <div class="flag">

                                                    <div class="iti-flag ht"></div>

                                                </div><span class="country-name">Haiti</span><span

                                                    class="dial-code">+509</span>

                                            </li>

                                            <li class="country" data-dial-code="504" data-country-code="hn">

                                                <div class="flag">

                                                    <div class="iti-flag hn"></div>

                                                </div><span class="country-name">Honduras</span><span

                                                    class="dial-code">+504</span>

                                            </li>

                                            <li class="country" data-dial-code="852" data-country-code="hk">

                                                <div class="flag">

                                                    <div class="iti-flag hk"></div>

                                                </div><span class="country-name">Hong Kong (香港)</span><span

                                                    class="dial-code">+852</span>

                                            </li>

                                            <li class="country" data-dial-code="36" data-country-code="hu">

                                                <div class="flag">

                                                    <div class="iti-flag hu"></div>

                                                </div><span class="country-name">Hungary (Magyarország)</span><span

                                                    class="dial-code">+36</span>

                                            </li>

                                            <li class="country" data-dial-code="354" data-country-code="is">

                                                <div class="flag">

                                                    <div class="iti-flag is"></div>

                                                </div><span class="country-name">Iceland (Ísland)</span><span

                                                    class="dial-code">+354</span>

                                            </li>

                                            <li class="country" data-dial-code="91" data-country-code="in">

                                                <div class="flag">

                                                    <div class="iti-flag in"></div>

                                                </div><span class="country-name">India (भारत)</span><span

                                                    class="dial-code">+91</span>

                                            </li>

                                            <li class="country" data-dial-code="62" data-country-code="id">

                                                <div class="flag">

                                                    <div class="iti-flag id"></div>

                                                </div><span class="country-name">Indonesia</span><span

                                                    class="dial-code">+62</span>

                                            </li>

                                            <li class="country" data-dial-code="98" data-country-code="ir">

                                                <div class="flag">

                                                    <div class="iti-flag ir"></div>

                                                </div><span class="country-name">Iran (‫ایران‬‎)</span><span

                                                    class="dial-code">+98</span>

                                            </li>

                                            <li class="country" data-dial-code="964" data-country-code="iq">

                                                <div class="flag">

                                                    <div class="iti-flag iq"></div>

                                                </div><span class="country-name">Iraq (‫العراق‬‎)</span><span

                                                    class="dial-code">+964</span>

                                            </li>

                                            <li class="country" data-dial-code="353" data-country-code="ie">

                                                <div class="flag">

                                                    <div class="iti-flag ie"></div>

                                                </div><span class="country-name">Ireland</span><span

                                                    class="dial-code">+353</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="im">

                                                <div class="flag">

                                                    <div class="iti-flag im"></div>

                                                </div><span class="country-name">Isle of Man</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="972" data-country-code="il">

                                                <div class="flag">

                                                    <div class="iti-flag il"></div>

                                                </div><span class="country-name">Israel (‫ישראל‬‎)</span><span

                                                    class="dial-code">+972</span>

                                            </li>

                                            <li class="country" data-dial-code="39" data-country-code="it">

                                                <div class="flag">

                                                    <div class="iti-flag it"></div>

                                                </div><span class="country-name">Italy (Italia)</span><span

                                                    class="dial-code">+39</span>

                                            </li>

                                            <li class="country" data-dial-code="1876" data-country-code="jm">

                                                <div class="flag">

                                                    <div class="iti-flag jm"></div>

                                                </div><span class="country-name">Jamaica</span><span

                                                    class="dial-code">+1876</span>

                                            </li>

                                            <li class="country" data-dial-code="81" data-country-code="jp">

                                                <div class="flag">

                                                    <div class="iti-flag jp"></div>

                                                </div><span class="country-name">Japan (日本)</span><span

                                                    class="dial-code">+81</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="je">

                                                <div class="flag">

                                                    <div class="iti-flag je"></div>

                                                </div><span class="country-name">Jersey</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="962" data-country-code="jo">

                                                <div class="flag">

                                                    <div class="iti-flag jo"></div>

                                                </div><span class="country-name">Jordan (‫الأردن‬‎)</span><span

                                                    class="dial-code">+962</span>

                                            </li>

                                            <li class="country" data-dial-code="7" data-country-code="kz">

                                                <div class="flag">

                                                    <div class="iti-flag kz"></div>

                                                </div><span class="country-name">Kazakhstan (Казахстан)</span><span

                                                    class="dial-code">+7</span>

                                            </li>

                                            <li class="country" data-dial-code="254" data-country-code="ke">

                                                <div class="flag">

                                                    <div class="iti-flag ke"></div>

                                                </div><span class="country-name">Kenya</span><span

                                                    class="dial-code">+254</span>

                                            </li>

                                            <li class="country" data-dial-code="686" data-country-code="ki">

                                                <div class="flag">

                                                    <div class="iti-flag ki"></div>

                                                </div><span class="country-name">Kiribati</span><span

                                                    class="dial-code">+686</span>

                                            </li>

                                            <li class="country" data-dial-code="965" data-country-code="kw">

                                                <div class="flag">

                                                    <div class="iti-flag kw"></div>

                                                </div><span class="country-name">Kuwait (‫الكويت‬‎)</span><span

                                                    class="dial-code">+965</span>

                                            </li>

                                            <li class="country" data-dial-code="996" data-country-code="kg">

                                                <div class="flag">

                                                    <div class="iti-flag kg"></div>

                                                </div><span class="country-name">Kyrgyzstan (Кыргызстан)</span><span

                                                    class="dial-code">+996</span>

                                            </li>

                                            <li class="country" data-dial-code="856" data-country-code="la">

                                                <div class="flag">

                                                    <div class="iti-flag la"></div>

                                                </div><span class="country-name">Laos (ລາວ)</span><span

                                                    class="dial-code">+856</span>

                                            </li>

                                            <li class="country" data-dial-code="371" data-country-code="lv">

                                                <div class="flag">

                                                    <div class="iti-flag lv"></div>

                                                </div><span class="country-name">Latvia (Latvija)</span><span

                                                    class="dial-code">+371</span>

                                            </li>

                                            <li class="country" data-dial-code="961" data-country-code="lb">

                                                <div class="flag">

                                                    <div class="iti-flag lb"></div>

                                                </div><span class="country-name">Lebanon (‫لبنان‬‎)</span><span

                                                    class="dial-code">+961</span>

                                            </li>

                                            <li class="country" data-dial-code="266" data-country-code="ls">

                                                <div class="flag">

                                                    <div class="iti-flag ls"></div>

                                                </div><span class="country-name">Lesotho</span><span

                                                    class="dial-code">+266</span>

                                            </li>

                                            <li class="country" data-dial-code="231" data-country-code="lr">

                                                <div class="flag">

                                                    <div class="iti-flag lr"></div>

                                                </div><span class="country-name">Liberia</span><span

                                                    class="dial-code">+231</span>

                                            </li>

                                            <li class="country" data-dial-code="218" data-country-code="ly">

                                                <div class="flag">

                                                    <div class="iti-flag ly"></div>

                                                </div><span class="country-name">Libya (‫ليبيا‬‎)</span><span

                                                    class="dial-code">+218</span>

                                            </li>

                                            <li class="country" data-dial-code="423" data-country-code="li">

                                                <div class="flag">

                                                    <div class="iti-flag li"></div>

                                                </div><span class="country-name">Liechtenstein</span><span

                                                    class="dial-code">+423</span>

                                            </li>

                                            <li class="country" data-dial-code="370" data-country-code="lt">

                                                <div class="flag">

                                                    <div class="iti-flag lt"></div>

                                                </div><span class="country-name">Lithuania (Lietuva)</span><span

                                                    class="dial-code">+370</span>

                                            </li>

                                            <li class="country" data-dial-code="352" data-country-code="lu">

                                                <div class="flag">

                                                    <div class="iti-flag lu"></div>

                                                </div><span class="country-name">Luxembourg</span><span

                                                    class="dial-code">+352</span>

                                            </li>

                                            <li class="country" data-dial-code="853" data-country-code="mo">

                                                <div class="flag">

                                                    <div class="iti-flag mo"></div>

                                                </div><span class="country-name">Macau (澳門)</span><span

                                                    class="dial-code">+853</span>

                                            </li>

                                            <li class="country" data-dial-code="389" data-country-code="mk">

                                                <div class="flag">

                                                    <div class="iti-flag mk"></div>

                                                </div><span class="country-name">Macedonia (FYROM)

                                                    (Македонија)</span><span class="dial-code">+389</span>

                                            </li>

                                            <li class="country" data-dial-code="261" data-country-code="mg">

                                                <div class="flag">

                                                    <div class="iti-flag mg"></div>

                                                </div><span class="country-name">Madagascar (Madagasikara)</span><span

                                                    class="dial-code">+261</span>

                                            </li>

                                            <li class="country" data-dial-code="265" data-country-code="mw">

                                                <div class="flag">

                                                    <div class="iti-flag mw"></div>

                                                </div><span class="country-name">Malawi</span><span

                                                    class="dial-code">+265</span>

                                            </li>

                                            <li class="country" data-dial-code="60" data-country-code="my">

                                                <div class="flag">

                                                    <div class="iti-flag my"></div>

                                                </div><span class="country-name">Malaysia</span><span

                                                    class="dial-code">+60</span>

                                            </li>

                                            <li class="country" data-dial-code="960" data-country-code="mv">

                                                <div class="flag">

                                                    <div class="iti-flag mv"></div>

                                                </div><span class="country-name">Maldives</span><span

                                                    class="dial-code">+960</span>

                                            </li>

                                            <li class="country" data-dial-code="223" data-country-code="ml">

                                                <div class="flag">

                                                    <div class="iti-flag ml"></div>

                                                </div><span class="country-name">Mali</span><span

                                                    class="dial-code">+223</span>

                                            </li>

                                            <li class="country" data-dial-code="356" data-country-code="mt">

                                                <div class="flag">

                                                    <div class="iti-flag mt"></div>

                                                </div><span class="country-name">Malta</span><span

                                                    class="dial-code">+356</span>

                                            </li>

                                            <li class="country" data-dial-code="692" data-country-code="mh">

                                                <div class="flag">

                                                    <div class="iti-flag mh"></div>

                                                </div><span class="country-name">Marshall Islands</span><span

                                                    class="dial-code">+692</span>

                                            </li>

                                            <li class="country" data-dial-code="596" data-country-code="mq">

                                                <div class="flag">

                                                    <div class="iti-flag mq"></div>

                                                </div><span class="country-name">Martinique</span><span

                                                    class="dial-code">+596</span>

                                            </li>

                                            <li class="country" data-dial-code="222" data-country-code="mr">

                                                <div class="flag">

                                                    <div class="iti-flag mr"></div>

                                                </div><span class="country-name">Mauritania (‫موريتانيا‬‎)</span><span

                                                    class="dial-code">+222</span>

                                            </li>

                                            <li class="country" data-dial-code="230" data-country-code="mu">

                                                <div class="flag">

                                                    <div class="iti-flag mu"></div>

                                                </div><span class="country-name">Mauritius (Moris)</span><span

                                                    class="dial-code">+230</span>

                                            </li>

                                            <li class="country" data-dial-code="262" data-country-code="yt">

                                                <div class="flag">

                                                    <div class="iti-flag yt"></div>

                                                </div><span class="country-name">Mayotte</span><span

                                                    class="dial-code">+262</span>

                                            </li>

                                            <li class="country" data-dial-code="52" data-country-code="mx">

                                                <div class="flag">

                                                    <div class="iti-flag mx"></div>

                                                </div><span class="country-name">Mexico (México)</span><span

                                                    class="dial-code">+52</span>

                                            </li>

                                            <li class="country" data-dial-code="691" data-country-code="fm">

                                                <div class="flag">

                                                    <div class="iti-flag fm"></div>

                                                </div><span class="country-name">Micronesia</span><span

                                                    class="dial-code">+691</span>

                                            </li>

                                            <li class="country" data-dial-code="373" data-country-code="md">

                                                <div class="flag">

                                                    <div class="iti-flag md"></div>

                                                </div><span class="country-name">Moldova (Republica Moldova)</span><span

                                                    class="dial-code">+373</span>

                                            </li>

                                            <li class="country" data-dial-code="377" data-country-code="mc">

                                                <div class="flag">

                                                    <div class="iti-flag mc"></div>

                                                </div><span class="country-name">Monaco</span><span

                                                    class="dial-code">+377</span>

                                            </li>

                                            <li class="country" data-dial-code="976" data-country-code="mn">

                                                <div class="flag">

                                                    <div class="iti-flag mn"></div>

                                                </div><span class="country-name">Mongolia (Монгол)</span><span

                                                    class="dial-code">+976</span>

                                            </li>

                                            <li class="country" data-dial-code="382" data-country-code="me">

                                                <div class="flag">

                                                    <div class="iti-flag me"></div>

                                                </div><span class="country-name">Montenegro (Crna Gora)</span><span

                                                    class="dial-code">+382</span>

                                            </li>

                                            <li class="country" data-dial-code="1664" data-country-code="ms">

                                                <div class="flag">

                                                    <div class="iti-flag ms"></div>

                                                </div><span class="country-name">Montserrat</span><span

                                                    class="dial-code">+1664</span>

                                            </li>

                                            <li class="country" data-dial-code="212" data-country-code="ma">

                                                <div class="flag">

                                                    <div class="iti-flag ma"></div>

                                                </div><span class="country-name">Morocco (‫المغرب‬‎)</span><span

                                                    class="dial-code">+212</span>

                                            </li>

                                            <li class="country" data-dial-code="258" data-country-code="mz">

                                                <div class="flag">

                                                    <div class="iti-flag mz"></div>

                                                </div><span class="country-name">Mozambique (Moçambique)</span><span

                                                    class="dial-code">+258</span>

                                            </li>

                                            <li class="country" data-dial-code="95" data-country-code="mm">

                                                <div class="flag">

                                                    <div class="iti-flag mm"></div>

                                                </div><span class="country-name">Myanmar (Burma) (မြန်မာ)</span><span

                                                    class="dial-code">+95</span>

                                            </li>

                                            <li class="country" data-dial-code="264" data-country-code="na">

                                                <div class="flag">

                                                    <div class="iti-flag na"></div>

                                                </div><span class="country-name">Namibia (Namibië)</span><span

                                                    class="dial-code">+264</span>

                                            </li>

                                            <li class="country" data-dial-code="674" data-country-code="nr">

                                                <div class="flag">

                                                    <div class="iti-flag nr"></div>

                                                </div><span class="country-name">Nauru</span><span

                                                    class="dial-code">+674</span>

                                            </li>

                                            <li class="country" data-dial-code="977" data-country-code="np">

                                                <div class="flag">

                                                    <div class="iti-flag np"></div>

                                                </div><span class="country-name">Nepal (नेपाल)</span><span

                                                    class="dial-code">+977</span>

                                            </li>

                                            <li class="country" data-dial-code="31" data-country-code="nl">

                                                <div class="flag">

                                                    <div class="iti-flag nl"></div>

                                                </div><span class="country-name">Netherlands (Nederland)</span><span

                                                    class="dial-code">+31</span>

                                            </li>

                                            <li class="country" data-dial-code="687" data-country-code="nc">

                                                <div class="flag">

                                                    <div class="iti-flag nc"></div>

                                                </div><span class="country-name">New Caledonia

                                                    (Nouvelle-Calédonie)</span><span class="dial-code">+687</span>

                                            </li>

                                            <li class="country" data-dial-code="64" data-country-code="nz">

                                                <div class="flag">

                                                    <div class="iti-flag nz"></div>

                                                </div><span class="country-name">New Zealand</span><span

                                                    class="dial-code">+64</span>

                                            </li>

                                            <li class="country" data-dial-code="505" data-country-code="ni">

                                                <div class="flag">

                                                    <div class="iti-flag ni"></div>

                                                </div><span class="country-name">Nicaragua</span><span

                                                    class="dial-code">+505</span>

                                            </li>

                                            <li class="country" data-dial-code="227" data-country-code="ne">

                                                <div class="flag">

                                                    <div class="iti-flag ne"></div>

                                                </div><span class="country-name">Niger (Nijar)</span><span

                                                    class="dial-code">+227</span>

                                            </li>

                                            <li class="country" data-dial-code="234" data-country-code="ng">

                                                <div class="flag">

                                                    <div class="iti-flag ng"></div>

                                                </div><span class="country-name">Nigeria</span><span

                                                    class="dial-code">+234</span>

                                            </li>

                                            <li class="country" data-dial-code="683" data-country-code="nu">

                                                <div class="flag">

                                                    <div class="iti-flag nu"></div>

                                                </div><span class="country-name">Niue</span><span

                                                    class="dial-code">+683</span>

                                            </li>

                                            <li class="country" data-dial-code="672" data-country-code="nf">

                                                <div class="flag">

                                                    <div class="iti-flag nf"></div>

                                                </div><span class="country-name">Norfolk Island</span><span

                                                    class="dial-code">+672</span>

                                            </li>

                                            <li class="country" data-dial-code="850" data-country-code="kp">

                                                <div class="flag">

                                                    <div class="iti-flag kp"></div>

                                                </div><span class="country-name">North Korea (조선 민주주의 인민

                                                    공화국)</span><span class="dial-code">+850</span>

                                            </li>

                                            <li class="country" data-dial-code="1670" data-country-code="mp">

                                                <div class="flag">

                                                    <div class="iti-flag mp"></div>

                                                </div><span class="country-name">Northern Mariana Islands</span><span

                                                    class="dial-code">+1670</span>

                                            </li>

                                            <li class="country" data-dial-code="47" data-country-code="no">

                                                <div class="flag">

                                                    <div class="iti-flag no"></div>

                                                </div><span class="country-name">Norway (Norge)</span><span

                                                    class="dial-code">+47</span>

                                            </li>

                                            <li class="country" data-dial-code="968" data-country-code="om">

                                                <div class="flag">

                                                    <div class="iti-flag om"></div>

                                                </div><span class="country-name">Oman (‫عُمان‬‎)</span><span

                                                    class="dial-code">+968</span>

                                            </li>

                                            <li class="country" data-dial-code="92" data-country-code="pk">

                                                <div class="flag">

                                                    <div class="iti-flag pk"></div>

                                                </div><span class="country-name">Pakistan (‫پاکستان‬‎)</span><span

                                                    class="dial-code">+92</span>

                                            </li>

                                            <li class="country" data-dial-code="680" data-country-code="pw">

                                                <div class="flag">

                                                    <div class="iti-flag pw"></div>

                                                </div><span class="country-name">Palau</span><span

                                                    class="dial-code">+680</span>

                                            </li>

                                            <li class="country" data-dial-code="970" data-country-code="ps">

                                                <div class="flag">

                                                    <div class="iti-flag ps"></div>

                                                </div><span class="country-name">Palestine (‫فلسطين‬‎)</span><span

                                                    class="dial-code">+970</span>

                                            </li>

                                            <li class="country" data-dial-code="507" data-country-code="pa">

                                                <div class="flag">

                                                    <div class="iti-flag pa"></div>

                                                </div><span class="country-name">Panama (Panamá)</span><span

                                                    class="dial-code">+507</span>

                                            </li>

                                            <li class="country" data-dial-code="675" data-country-code="pg">

                                                <div class="flag">

                                                    <div class="iti-flag pg"></div>

                                                </div><span class="country-name">Papua New Guinea</span><span

                                                    class="dial-code">+675</span>

                                            </li>

                                            <li class="country" data-dial-code="595" data-country-code="py">

                                                <div class="flag">

                                                    <div class="iti-flag py"></div>

                                                </div><span class="country-name">Paraguay</span><span

                                                    class="dial-code">+595</span>

                                            </li>

                                            <li class="country" data-dial-code="51" data-country-code="pe">

                                                <div class="flag">

                                                    <div class="iti-flag pe"></div>

                                                </div><span class="country-name">Peru (Perú)</span><span

                                                    class="dial-code">+51</span>

                                            </li>

                                            <li class="country" data-dial-code="63" data-country-code="ph">

                                                <div class="flag">

                                                    <div class="iti-flag ph"></div>

                                                </div><span class="country-name">Philippines</span><span

                                                    class="dial-code">+63</span>

                                            </li>

                                            <li class="country" data-dial-code="48" data-country-code="pl">

                                                <div class="flag">

                                                    <div class="iti-flag pl"></div>

                                                </div><span class="country-name">Poland (Polska)</span><span

                                                    class="dial-code">+48</span>

                                            </li>

                                            <li class="country" data-dial-code="351" data-country-code="pt">

                                                <div class="flag">

                                                    <div class="iti-flag pt"></div>

                                                </div><span class="country-name">Portugal</span><span

                                                    class="dial-code">+351</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="pr">

                                                <div class="flag">

                                                    <div class="iti-flag pr"></div>

                                                </div><span class="country-name">Puerto Rico</span><span

                                                    class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="974" data-country-code="qa">

                                                <div class="flag">

                                                    <div class="iti-flag qa"></div>

                                                </div><span class="country-name">Qatar (‫قطر‬‎)</span><span

                                                    class="dial-code">+974</span>

                                            </li>

                                            <li class="country" data-dial-code="262" data-country-code="re">

                                                <div class="flag">

                                                    <div class="iti-flag re"></div>

                                                </div><span class="country-name">Réunion (La Réunion)</span><span

                                                    class="dial-code">+262</span>

                                            </li>

                                            <li class="country" data-dial-code="40" data-country-code="ro">

                                                <div class="flag">

                                                    <div class="iti-flag ro"></div>

                                                </div><span class="country-name">Romania (România)</span><span

                                                    class="dial-code">+40</span>

                                            </li>

                                            <li class="country" data-dial-code="7" data-country-code="ru">

                                                <div class="flag">

                                                    <div class="iti-flag ru"></div>

                                                </div><span class="country-name">Russia (Россия)</span><span

                                                    class="dial-code">+7</span>

                                            </li>

                                            <li class="country" data-dial-code="250" data-country-code="rw">

                                                <div class="flag">

                                                    <div class="iti-flag rw"></div>

                                                </div><span class="country-name">Rwanda</span><span

                                                    class="dial-code">+250</span>

                                            </li>

                                            <li class="country" data-dial-code="590" data-country-code="bl">

                                                <div class="flag">

                                                    <div class="iti-flag bl"></div>

                                                </div><span class="country-name">Saint Barthélemy

                                                    (Saint-Barthélemy)</span><span class="dial-code">+590</span>

                                            </li>

                                            <li class="country" data-dial-code="290" data-country-code="sh">

                                                <div class="flag">

                                                    <div class="iti-flag sh"></div>

                                                </div><span class="country-name">Saint Helena</span><span

                                                    class="dial-code">+290</span>

                                            </li>

                                            <li class="country" data-dial-code="1869" data-country-code="kn">

                                                <div class="flag">

                                                    <div class="iti-flag kn"></div>

                                                </div><span class="country-name">Saint Kitts and Nevis</span><span

                                                    class="dial-code">+1869</span>

                                            </li>

                                            <li class="country" data-dial-code="1758" data-country-code="lc">

                                                <div class="flag">

                                                    <div class="iti-flag lc"></div>

                                                </div><span class="country-name">Saint Lucia</span><span

                                                    class="dial-code">+1758</span>

                                            </li>

                                            <li class="country" data-dial-code="590" data-country-code="mf">

                                                <div class="flag">

                                                    <div class="iti-flag mf"></div>

                                                </div><span class="country-name">Saint Martin (Saint-Martin (partie

                                                    française))</span><span class="dial-code">+590</span>

                                            </li>

                                            <li class="country" data-dial-code="508" data-country-code="pm">

                                                <div class="flag">

                                                    <div class="iti-flag pm"></div>

                                                </div><span class="country-name">Saint Pierre and Miquelon

                                                    (Saint-Pierre-et-Miquelon)</span><span class="dial-code">+508</span>

                                            </li>

                                            <li class="country" data-dial-code="1784" data-country-code="vc">

                                                <div class="flag">

                                                    <div class="iti-flag vc"></div>

                                                </div><span class="country-name">Saint Vincent and the

                                                    Grenadines</span><span class="dial-code">+1784</span>

                                            </li>

                                            <li class="country" data-dial-code="685" data-country-code="ws">

                                                <div class="flag">

                                                    <div class="iti-flag ws"></div>

                                                </div><span class="country-name">Samoa</span><span

                                                    class="dial-code">+685</span>

                                            </li>

                                            <li class="country" data-dial-code="378" data-country-code="sm">

                                                <div class="flag">

                                                    <div class="iti-flag sm"></div>

                                                </div><span class="country-name">San Marino</span><span

                                                    class="dial-code">+378</span>

                                            </li>

                                            <li class="country" data-dial-code="239" data-country-code="st">

                                                <div class="flag">

                                                    <div class="iti-flag st"></div>

                                                </div><span class="country-name">São Tomé and Príncipe (São Tomé e

                                                    Príncipe)</span><span class="dial-code">+239</span>

                                            </li>

                                            <li class="country" data-dial-code="966" data-country-code="sa">

                                                <div class="flag">

                                                    <div class="iti-flag sa"></div>

                                                </div><span class="country-name">Saudi Arabia (‫المملكة العربية

                                                    السعودية‬‎)</span><span class="dial-code">+966</span>

                                            </li>

                                            <li class="country" data-dial-code="221" data-country-code="sn">

                                                <div class="flag">

                                                    <div class="iti-flag sn"></div>

                                                </div><span class="country-name">Senegal (Sénégal)</span><span

                                                    class="dial-code">+221</span>

                                            </li>

                                            <li class="country" data-dial-code="381" data-country-code="rs">

                                                <div class="flag">

                                                    <div class="iti-flag rs"></div>

                                                </div><span class="country-name">Serbia (Србија)</span><span

                                                    class="dial-code">+381</span>

                                            </li>

                                            <li class="country" data-dial-code="248" data-country-code="sc">

                                                <div class="flag">

                                                    <div class="iti-flag sc"></div>

                                                </div><span class="country-name">Seychelles</span><span

                                                    class="dial-code">+248</span>

                                            </li>

                                            <li class="country" data-dial-code="232" data-country-code="sl">

                                                <div class="flag">

                                                    <div class="iti-flag sl"></div>

                                                </div><span class="country-name">Sierra Leone</span><span

                                                    class="dial-code">+232</span>

                                            </li>

                                            <li class="country" data-dial-code="65" data-country-code="sg">

                                                <div class="flag">

                                                    <div class="iti-flag sg"></div>

                                                </div><span class="country-name">Singapore</span><span

                                                    class="dial-code">+65</span>

                                            </li>

                                            <li class="country" data-dial-code="1721" data-country-code="sx">

                                                <div class="flag">

                                                    <div class="iti-flag sx"></div>

                                                </div><span class="country-name">Sint Maarten</span><span

                                                    class="dial-code">+1721</span>

                                            </li>

                                            <li class="country" data-dial-code="421" data-country-code="sk">

                                                <div class="flag">

                                                    <div class="iti-flag sk"></div>

                                                </div><span class="country-name">Slovakia (Slovensko)</span><span

                                                    class="dial-code">+421</span>

                                            </li>

                                            <li class="country" data-dial-code="386" data-country-code="si">

                                                <div class="flag">

                                                    <div class="iti-flag si"></div>

                                                </div><span class="country-name">Slovenia (Slovenija)</span><span

                                                    class="dial-code">+386</span>

                                            </li>

                                            <li class="country" data-dial-code="677" data-country-code="sb">

                                                <div class="flag">

                                                    <div class="iti-flag sb"></div>

                                                </div><span class="country-name">Solomon Islands</span><span

                                                    class="dial-code">+677</span>

                                            </li>

                                            <li class="country" data-dial-code="252" data-country-code="so">

                                                <div class="flag">

                                                    <div class="iti-flag so"></div>

                                                </div><span class="country-name">Somalia (Soomaaliya)</span><span

                                                    class="dial-code">+252</span>

                                            </li>

                                            <li class="country" data-dial-code="27" data-country-code="za">

                                                <div class="flag">

                                                    <div class="iti-flag za"></div>

                                                </div><span class="country-name">South Africa</span><span

                                                    class="dial-code">+27</span>

                                            </li>

                                            <li class="country" data-dial-code="82" data-country-code="kr">

                                                <div class="flag">

                                                    <div class="iti-flag kr"></div>

                                                </div><span class="country-name">South Korea (대한민국)</span><span

                                                    class="dial-code">+82</span>

                                            </li>

                                            <li class="country" data-dial-code="211" data-country-code="ss">

                                                <div class="flag">

                                                    <div class="iti-flag ss"></div>

                                                </div><span class="country-name">South Sudan (‫جنوب

                                                    السودان‬‎)</span><span class="dial-code">+211</span>

                                            </li>

                                            <li class="country" data-dial-code="34" data-country-code="es">

                                                <div class="flag">

                                                    <div class="iti-flag es"></div>

                                                </div><span class="country-name">Spain (España)</span><span

                                                    class="dial-code">+34</span>

                                            </li>

                                            <li class="country" data-dial-code="94" data-country-code="lk">

                                                <div class="flag">

                                                    <div class="iti-flag lk"></div>

                                                </div><span class="country-name">Sri Lanka (ශ්‍රී ලංකාව)</span><span

                                                    class="dial-code">+94</span>

                                            </li>

                                            <li class="country" data-dial-code="249" data-country-code="sd">

                                                <div class="flag">

                                                    <div class="iti-flag sd"></div>

                                                </div><span class="country-name">Sudan (‫السودان‬‎)</span><span

                                                    class="dial-code">+249</span>

                                            </li>

                                            <li class="country" data-dial-code="597" data-country-code="sr">

                                                <div class="flag">

                                                    <div class="iti-flag sr"></div>

                                                </div><span class="country-name">Suriname</span><span

                                                    class="dial-code">+597</span>

                                            </li>

                                            <li class="country" data-dial-code="47" data-country-code="sj">

                                                <div class="flag">

                                                    <div class="iti-flag sj"></div>

                                                </div><span class="country-name">Svalbard and Jan Mayen</span><span

                                                    class="dial-code">+47</span>

                                            </li>

                                            <li class="country" data-dial-code="268" data-country-code="sz">

                                                <div class="flag">

                                                    <div class="iti-flag sz"></div>

                                                </div><span class="country-name">Swaziland</span><span

                                                    class="dial-code">+268</span>

                                            </li>

                                            <li class="country" data-dial-code="46" data-country-code="se">

                                                <div class="flag">

                                                    <div class="iti-flag se"></div>

                                                </div><span class="country-name">Sweden (Sverige)</span><span

                                                    class="dial-code">+46</span>

                                            </li>

                                            <li class="country" data-dial-code="41" data-country-code="ch">

                                                <div class="flag">

                                                    <div class="iti-flag ch"></div>

                                                </div><span class="country-name">Switzerland (Schweiz)</span><span

                                                    class="dial-code">+41</span>

                                            </li>

                                            <li class="country" data-dial-code="963" data-country-code="sy">

                                                <div class="flag">

                                                    <div class="iti-flag sy"></div>

                                                </div><span class="country-name">Syria (‫سوريا‬‎)</span><span

                                                    class="dial-code">+963</span>

                                            </li>

                                            <li class="country" data-dial-code="886" data-country-code="tw">

                                                <div class="flag">

                                                    <div class="iti-flag tw"></div>

                                                </div><span class="country-name">Taiwan (台灣)</span><span

                                                    class="dial-code">+886</span>

                                            </li>

                                            <li class="country" data-dial-code="992" data-country-code="tj">

                                                <div class="flag">

                                                    <div class="iti-flag tj"></div>

                                                </div><span class="country-name">Tajikistan</span><span

                                                    class="dial-code">+992</span>

                                            </li>

                                            <li class="country" data-dial-code="255" data-country-code="tz">

                                                <div class="flag">

                                                    <div class="iti-flag tz"></div>

                                                </div><span class="country-name">Tanzania</span><span

                                                    class="dial-code">+255</span>

                                            </li>

                                            <li class="country" data-dial-code="66" data-country-code="th">

                                                <div class="flag">

                                                    <div class="iti-flag th"></div>

                                                </div><span class="country-name">Thailand (ไทย)</span><span

                                                    class="dial-code">+66</span>

                                            </li>

                                            <li class="country" data-dial-code="670" data-country-code="tl">

                                                <div class="flag">

                                                    <div class="iti-flag tl"></div>

                                                </div><span class="country-name">Timor-Leste</span><span

                                                    class="dial-code">+670</span>

                                            </li>

                                            <li class="country" data-dial-code="228" data-country-code="tg">

                                                <div class="flag">

                                                    <div class="iti-flag tg"></div>

                                                </div><span class="country-name">Togo</span><span

                                                    class="dial-code">+228</span>

                                            </li>

                                            <li class="country" data-dial-code="690" data-country-code="tk">

                                                <div class="flag">

                                                    <div class="iti-flag tk"></div>

                                                </div><span class="country-name">Tokelau</span><span

                                                    class="dial-code">+690</span>

                                            </li>

                                            <li class="country" data-dial-code="676" data-country-code="to">

                                                <div class="flag">

                                                    <div class="iti-flag to"></div>

                                                </div><span class="country-name">Tonga</span><span

                                                    class="dial-code">+676</span>

                                            </li>

                                            <li class="country" data-dial-code="1868" data-country-code="tt">

                                                <div class="flag">

                                                    <div class="iti-flag tt"></div>

                                                </div><span class="country-name">Trinidad and Tobago</span><span

                                                    class="dial-code">+1868</span>

                                            </li>

                                            <li class="country" data-dial-code="216" data-country-code="tn">

                                                <div class="flag">

                                                    <div class="iti-flag tn"></div>

                                                </div><span class="country-name">Tunisia (‫تونس‬‎)</span><span

                                                    class="dial-code">+216</span>

                                            </li>

                                            <li class="country" data-dial-code="90" data-country-code="tr">

                                                <div class="flag">

                                                    <div class="iti-flag tr"></div>

                                                </div><span class="country-name">Turkey (Türkiye)</span><span

                                                    class="dial-code">+90</span>

                                            </li>

                                            <li class="country" data-dial-code="993" data-country-code="tm">

                                                <div class="flag">

                                                    <div class="iti-flag tm"></div>

                                                </div><span class="country-name">Turkmenistan</span><span

                                                    class="dial-code">+993</span>

                                            </li>

                                            <li class="country" data-dial-code="1649" data-country-code="tc">

                                                <div class="flag">

                                                    <div class="iti-flag tc"></div>

                                                </div><span class="country-name">Turks and Caicos Islands</span><span

                                                    class="dial-code">+1649</span>

                                            </li>

                                            <li class="country" data-dial-code="688" data-country-code="tv">

                                                <div class="flag">

                                                    <div class="iti-flag tv"></div>

                                                </div><span class="country-name">Tuvalu</span><span

                                                    class="dial-code">+688</span>

                                            </li>

                                            <li class="country" data-dial-code="1340" data-country-code="vi">

                                                <div class="flag">

                                                    <div class="iti-flag vi"></div>

                                                </div><span class="country-name">U.S. Virgin Islands</span><span

                                                    class="dial-code">+1340</span>

                                            </li>

                                            <li class="country" data-dial-code="256" data-country-code="ug">

                                                <div class="flag">

                                                    <div class="iti-flag ug"></div>

                                                </div><span class="country-name">Uganda</span><span

                                                    class="dial-code">+256</span>

                                            </li>

                                            <li class="country" data-dial-code="380" data-country-code="ua">

                                                <div class="flag">

                                                    <div class="iti-flag ua"></div>

                                                </div><span class="country-name">Ukraine (Україна)</span><span

                                                    class="dial-code">+380</span>

                                            </li>

                                            <li class="country" data-dial-code="971" data-country-code="ae">

                                                <div class="flag">

                                                    <div class="iti-flag ae"></div>

                                                </div><span class="country-name">United Arab Emirates (‫الإمارات العربية

                                                    المتحدة‬‎)</span><span class="dial-code">+971</span>

                                            </li>

                                            <li class="country" data-dial-code="44" data-country-code="gb">

                                                <div class="flag">

                                                    <div class="iti-flag gb"></div>

                                                </div><span class="country-name">United Kingdom</span><span

                                                    class="dial-code">+44</span>

                                            </li>

                                            <li class="country" data-dial-code="1" data-country-code="us">

                                                <div class="flag">

                                                    <div class="iti-flag us"></div>

                                                </div><span class="country-name">United States</span><span

                                                    class="dial-code">+1</span>

                                            </li>

                                            <li class="country" data-dial-code="598" data-country-code="uy">

                                                <div class="flag">

                                                    <div class="iti-flag uy"></div>

                                                </div><span class="country-name">Uruguay</span><span

                                                    class="dial-code">+598</span>

                                            </li>

                                            <li class="country" data-dial-code="998" data-country-code="uz">

                                                <div class="flag">

                                                    <div class="iti-flag uz"></div>

                                                </div><span class="country-name">Uzbekistan (Oʻzbekiston)</span><span

                                                    class="dial-code">+998</span>

                                            </li>

                                            <li class="country" data-dial-code="678" data-country-code="vu">

                                                <div class="flag">

                                                    <div class="iti-flag vu"></div>

                                                </div><span class="country-name">Vanuatu</span><span

                                                    class="dial-code">+678</span>

                                            </li>

                                            <li class="country" data-dial-code="39" data-country-code="va">

                                                <div class="flag">

                                                    <div class="iti-flag va"></div>

                                                </div><span class="country-name">Vatican City (Città del

                                                    Vaticano)</span><span class="dial-code">+39</span>

                                            </li>

                                            <li class="country" data-dial-code="58" data-country-code="ve">

                                                <div class="flag">

                                                    <div class="iti-flag ve"></div>

                                                </div><span class="country-name">Venezuela</span><span

                                                    class="dial-code">+58</span>

                                            </li>

                                            <li class="country" data-dial-code="84" data-country-code="vn">

                                                <div class="flag">

                                                    <div class="iti-flag vn"></div>

                                                </div><span class="country-name">Vietnam (Việt Nam)</span><span

                                                    class="dial-code">+84</span>

                                            </li>

                                            <li class="country" data-dial-code="681" data-country-code="wf">

                                                <div class="flag">

                                                    <div class="iti-flag wf"></div>

                                                </div><span class="country-name">Wallis and Futuna</span><span

                                                    class="dial-code">+681</span>

                                            </li>

                                            <li class="country" data-dial-code="212" data-country-code="eh">

                                                <div class="flag">

                                                    <div class="iti-flag eh"></div>

                                                </div><span class="country-name">Western Sahara (‫الصحراء

                                                    الغربية‬‎)</span><span class="dial-code">+212</span>

                                            </li>

                                            <li class="country" data-dial-code="967" data-country-code="ye">

                                                <div class="flag">

                                                    <div class="iti-flag ye"></div>

                                                </div><span class="country-name">Yemen (‫اليمن‬‎)</span><span

                                                    class="dial-code">+967</span>

                                            </li>

                                            <li class="country" data-dial-code="260" data-country-code="zm">

                                                <div class="flag">

                                                    <div class="iti-flag zm"></div>

                                                </div><span class="country-name">Zambia</span><span

                                                    class="dial-code">+260</span>

                                            </li>

                                            <li class="country" data-dial-code="263" data-country-code="zw">

                                                <div class="flag">

                                                    <div class="iti-flag zw"></div>

                                                </div><span class="country-name">Zimbabwe</span><span

                                                    class="dial-code">+263</span>

                                            </li>

                                            <li class="country" data-dial-code="358" data-country-code="ax">

                                                <div class="flag">

                                                    <div class="iti-flag ax"></div>

                                                </div><span class="country-name">Åland Islands</span><span

                                                    class="dial-code">+358</span>

                                            </li>

                                        </ul> -->

                                   <!--  </div> -->

                                    <input id="customer_alt_contact" type="text" 

                                

                                        class="form-control input-lg"

                                        id="alternate_contact_number" name="alternate_contact_number" autocomplete="off"

                                        placeholder="Alt Mobile Number" maxlength="15" value="{{$get_enquiries->customer_alt_contact}}" onkeypress='validateNumber(event)'>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="row mb-10">



                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_email">EMAIL ID <span class="asterisk">*</span></label>

                                <input id="customer_email" type="text" class="form-control" placeholder="EMAIL ID " name="customer_email" value="{{$get_enquiries->customer_email}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_alt_email" >ALTERNATE EMAIL ID</label>

                                <input id="customer_alt_email" type="text" class="form-control" placeholder="ALTERNATE EMAIL ID" name="customer_alt_email" value="{{$get_enquiries->customer_alt_email}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="passport_no" >PASSPORT NUMBER</label>

                                <input  id="passport_no" type="text" class="form-control" placeholder="PASSPORT NUMBER"  name="passport_no" value="{{$get_enquiries->passport_no}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">





                                <label for="passport_validity">PASSPORT VALIDITY</label>



                                <div class="input-group date">

                                    <input  id="passport_validity" type="text" placeholder="PASSPORT VALIDITY"

                                        class="form-control pull-right datepicker" name="passport_validity" value="{{$get_enquiries->passport_validity}}" >

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                </div>

                                <!-- /.input group -->



                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">



                                <div class="form-group">

                                    <label class="enquiry_type">ENQUIRY TYPE <span class="asterisk">*</span></label>

                                    <select id="enquiry_type" class="form-control" style="width: 100%;" name="enquiry_type">

                                    	<option value="0" selected="selected" @if($get_enquiries->enquiry_type=="0") selected @endif>Select type</option>

                                    	<option value="DOM" @if($get_enquiries->enquiry_type=="DOM") selected @endif>DOM</option>

                                    	<option value="OBT" @if($get_enquiries->enquiry_type=="OBT") selected @endif>OBT</option>

                                    	<option value="B2B" @if($get_enquiries->enquiry_type=="B2B") selected @endif>B2B</option>

                                    	<option value="Mice" @if($get_enquiries->enquiry_type=="Mice") selected @endif>Mice</option>

                                    	<option value="Corporate" @if($get_enquiries->enquiry_type=="Corporate") selected @endif>Corporate</option>

                                    	<option value="Visa" @if($get_enquiries->enquiry_type=="Visa") selected @endif>Visa</option>

                                    	<option value="Insurance" @if($get_enquiries->enquiry_type=="Insurance") selected @endif>Insurance</option>

                                    	<option value="Forex" @if($get_enquiries->enquiry_type=="Forex") selected @endif>Forex</option>

                                    	<option value="Other" @if($get_enquiries->enquiry_type=="Other") selected @endif>Other</option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="row mb-10">





                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="address">ADDRESS</label>

                                <textarea id="address" rows="1" cols="5" class="form-control" placeholder="ADDRESS" name="address">{{$get_enquiries->address}}</textarea>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="area">AREA </label>

                                <input id="area" type="text" class="form-control" placeholder="AREA" name="area" value="{{$get_enquiries->area}}">

                            </div>

                        </div>







                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_country">COUNTRY </label>

                                <select id="customer_country" class="form-control select2" style="width: 100%;" name="customer_country">

                                    <option selected="selected">COUNTRY</option>

                                    @foreach($countries as $country)

                                         @if($country->country_id==$get_enquiries->customer_country)

										<option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>

                                        @else

                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>

                                        @endif

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_city">CITY</label>

                                <input id="customer_city" type="text" class="form-control" placeholder="CITY" name="customer_city" value="{{$get_enquiries->customer_city}}">

                            </div>

                        </div>

                    </div>



                    <div class="row mb-10">





                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_state">STATE</label>

                                <input id="customer_state" type="text" class="form-control" placeholder="STATE" name="customer_state" value="{{$get_enquiries->customer_state}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_zipcode">ZIP CODE</label>

                                <input id="customer_zipcode" type="text" class="form-control" placeholder="ZIP CODE" name="customer_zipcode" value="{{$get_enquiries->customer_zipcode}}">

                            </div>

                        </div>







                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="booking_range">BOOKING RANGE <span class="asterisk">*</span></label>

                                <div class="input-group">



                                    <input id="booking_range" type="text" class="form-control pull-right"

                                        placeholder="SELECT DATE" name="booking_range" value="{{$get_enquiries->booking_range}}">

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <p id="no_of_days_p">Number Of Days: {{$get_enquiries->no_of_days}}</p>

                                <input id="no_of_days" type="hidden" name="no_of_days" value="{{$get_enquiries->no_of_days}}">

                            </div>

                        </div>

                    </div>



                    <div class="row mb-10">



                        <div class="col-sm-6 col-md-1">

                            <div class="form-group">

                                <label for="no_of_adults">ADULTS <span class="asterisk">*</span></label>

                                <input id="no_of_adults" type="text" class="form-control" value="{{$get_enquiries->no_of_adults}}" name="no_of_adults" onkeypress='validateNumber(event)' maxlength="3">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-1">

                            <div class="form-group">

                                <label for="no_of_kids">KIDS <span class="asterisk">*</span></label>

                                <input id="no_of_kids" type="text" class="form-control" name="no_of_kids" onkeypress='validateNumber(event)' value="{{$get_enquiries->no_of_kids}}" maxlength="3">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="hotel_type">HOTEL TYPE</label>

                                <select id="hotel_type" class="form-control" style="width: 100%;"  name="hotel_type">

                                    <option value="0" selected="selected">Hotel type</option>

                                    <option value="1 Star" @if($get_enquiries->hotel_type=="1 Star") selected @endif>1 Star</option>

                                    <option value="2 Star" @if($get_enquiries->hotel_type=="2 Star") selected @endif>2 Star</option>

                                    <option value="3 Star" @if($get_enquiries->hotel_type=="3 Star") selected @endif>3 Star</option>

                                    <option value="4 Star" @if($get_enquiries->hotel_type=="4 Star") selected @endif>4 Star</option>

                                    <option value="5 Star" @if($get_enquiries->hotel_type=="5 Star") selected @endif>5 Star</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="budget_type">BUDGET TYPE</label>

                                <input id="budget_type" type="text" class="form-control" value="{{$get_enquiries->budget_type}}" placeholder="BUDGET" name="budget_type">

                            </div>

                        </div>



                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="enquiry_source">ENQUIRY SOURCE</label>

                                <select id="enquiry_source" class="form-control" style="width: 100%;" value="{{$get_enquiries->budget_type}}" name="enquiry_source">

                                    <option selected="selected" value="0">SELECT SOURCE</option>

                                    <option value="Facebook" @if($get_enquiries->enquiry_source=="Facebook") selected @endif>Facebook</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="enquiry_prospect">PROSPECT <span class="asterisk">*</span></label>

                                <select id="enquiry_prospect" class="form-control" style="width: 100%;" name="enquiry_prospect">

                                    <option selected="selected" value="0" @if($get_enquiries->enquiry_prospect=="0") selected @endif>PROSPECT</option>

                                    <option value="Hot" @if($get_enquiries->enquiry_prospect=="Hot") selected @endif>Hot</option>

                                    <option value="Warm" @if($get_enquiries->enquiry_prospect=="Warm") selected @endif>Warm</option>

                                    <option value="Cloud" @if($get_enquiries->enquiry_prospect=="Cloud") selected @endif>Cloud</option>

                                </select>

                            </div>

                        </div>



                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="enquiry_status">STATUS <span class="asterisk">*</span></label>

                                <select id="enquiry_status" class="form-control" style="width: 100%;" name="enquiry_status">

                                    <option selected="selected" value="0"  @if($get_enquiries->enquiry_status=="0") selected @endif>STATUS</option>

                                     <option value="Open" @if($get_enquiries->enquiry_status=="Open") selected @endif>Open</option>

                                    <option value="Win" @if($get_enquiries->enquiry_status=="Win") selected @endif>Win</option>

                                    <option value="Fail" @if($get_enquiries->enquiry_status=="Fail") selected @endif>Fail</option>

                                </select>

                            </div>

                        </div>



                    </div>

                    <div class="row mb-10">





                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="assigned_to">ASSIGNED TO</label>

                                <select id="assigned_to" class="form-control select2" style="width: 100%;" name="assigned_to">

                                    <option selected="selected" value="0" @if($get_enquiries->assigned_to=="0") selected @endif >SELECT ASSIGNED USER</option>

                                    @foreach($users as $user)

                                    @if($get_enquiries->assigned_to==$user->users_id)

                                    <option value="{{$user->users_id}}" selected="selected">{{$user->users_fname}} {{$user->users_lname}}</option>

                                    @else

                                    <option value="{{$user->users_id}}">{{$user->users_fname}} {{$user->users_lname}}</option>

                                    @endif

                                    

                                    @endforeach



                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="nxt_followup_date">NEXT FOLLOWUP <span class="asterisk">*</span></label>

                                <div class="input-group date">

                                    <input id="nxt_followup_date" type="text" class="form-control pull-right datepicker" placeholder="DATE" name="nxt_followup_date" value="{{$get_enquiries->nxt_followup_date}}">

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                </div>

                            </div>

                        </div>







                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="customer_dob">CUSTOMER DOB</label>

                                <div class="input-group date">

                                    <input id="customer_dob" type="text" class="form-control pull-right datepicker" placeholder="DATE" name="customer_dob" value="{{$get_enquiries->customer_dob}}">

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group">

                                <label for="wedding_date">WEDDING ANNIVERSARY DATE</label>

                                <div class="input-group date">

                                    <input id="wedding_date" type="text" class="form-control pull-right datepicker" placeholder="DATE" name="wedding_date" value="{{$get_enquiries->wedding_date}}">

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="row mb-10">





                        <div class="col-sm-7">

                            <div class="row">

                                <div class="col-md-6">

                                    <label>CURRENCY EXCHANGE RATE <span class="asterisk">*</span></label>

                                </div>

                                <div class="col-md-6">



                                    <input name="currency_exchange_rate_status" type="radio" id="radio_30" class="with-gap radio-col-primary" value="Yes" @if($get_enquiries->currency_exchange_rate_status=="Yes") checked @endif

                                        />

                                    <label for="radio_30">Yes</label>

                                    <input name="currency_exchange_rate_status" type="radio" id="radio_31"

                                        class="with-gap radio-col-primary"  value="No" @if($get_enquiries->currency_exchange_rate_status=="No") checked @endif  />

                                    <label for="radio_31">No</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label>VISA <span class="asterisk">*</span></label>

                                </div>

                                <div class="col-md-6">

                                    <input name="have_visa" type="radio" id="radio_32"

                                        class="with-gap radio-col-primary" value="Yes"  @if($get_enquiries->have_visa=="Yes") checked @endif />

                                    <label for="radio_32">Yes</label>

                                    <input name="have_visa" type="radio" id="radio_33"

                                        class="with-gap radio-col-primary" value="No"  @if($get_enquiries->have_visa=="No") checked @endif />

                                    <label for="radio_33">No</label>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <label>INSURANCE <span class="asterisk">*</span></label>

                                </div>

                                <div class="col-md-6">

                                    <input name="have_insurance_status" type="radio" id="radio_34"

                                        class="with-gap radio-col-primary" value="Yes" @if($get_enquiries->have_insurance_status=="Yes") checked @endif />

                                    <label for="radio_34">Yes</label>

                                    <input name="have_insurance_status" type="radio" id="radio_35"

                                        class="with-gap radio-col-primary" value="No" @if($get_enquiries->have_insurance_status=="No") checked @endif />

                                    <label for="radio_35">No</label>

                                </div>

                            </div>









                        </div>











                        <div class="col-sm-6">

                        	<div id="currency_div" class="row" @if($get_enquiries->currency_exchange_rate_status=="Yes") @else style="display:none;" @endif >

                        		<div class="col-md-6 col-md-3">

                        			<div class="form-group">

                        				<label for="currency" >Currency</label>

                        				<select  id="currency" class="form-control" style="width: 100%;" name="currency">

                        					<option selected="selected" value="0">CURRENCY</option>

                        					  @foreach($currency as $curr)

                                                 @if($curr->code==$get_enquiries->select_currency)

                                        <option value="{{$curr->code}}" selected>{{$curr->code}} ({{$curr->name}})</option>

                                        @else

                                        <option value="{{$curr->code}}">{{$curr->code}} ({{$curr->name}})</option>

                                        @endif

                                        @endforeach



                        				</select>

                        			</div>

                        		</div>

                        		<div class="col-md-6">



                        			<div class="form-group">

                        				<label for="currency_exchange_rate" >CURRENCY EXCHANGE RATE</label>

                        					<input id="currency_exchange_rate"  type="text" class="form-control pull-right" placeholder="CURRENCY EXCHANGE RATE" name="currency_exchange_rate" value="{{$get_enquiries->select_currency_rate}}">

                        			</div>

                        		</div>

                        	</div>

                            <div id="insurance_div" class="row" @if($get_enquiries->have_insurance_status=="Yes") @else style="display:none;" @endif>

                                <div class="col-md-6 col-md-3">

                                     <div class="form-group">

                                        <label for="insurance_days" >INSURANCE DAYS</label>

                                            <input id="insurance_days" type="text" class="form-control pull-right" placeholder="INSURANCE DAYS" name="insurance_days" value="{{$get_enquiries->insurance_days}}">

                                    </div>

                                    

                                </div>

                                <div class="col-md-6 col-md-3">



                                  <div class="form-group">

                                        <label for="insurance_type">INSURANCE TYPE</label>

                                        <select id="insurance_type" class="form-control" style="width: 100%;" name="insurance_type">

                                            <option selected="selected" value="0" @if($get_enquiries->enquiry_prospect=="0") selected @endif>INSURANCE TYPE</option>

                                            <option value="Land" @if($get_enquiries->enquiry_prospect=="Land") selected @endif>Land</option>

                                            <option value="Air" @if($get_enquiries->enquiry_prospect=="Air") selected @endif>Air</option>

                                        </select>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>







                    <div class="row mb-10">

                        <div class="col-sm-6">

                            <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">



                            </div>

                            <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">

                                <i class="fa fa-plus-circle"></i> DEPARTURE CITY</h4>



                        </div>

                        <div class="col-sm-6">

                            <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">



                            </div>

                            <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">

                                <i class="fa fa-plus-circle"></i> ENQUIRY LOCATIONS</h4>



                        </div>

                    </div>

                    @php

                    $locations=$get_enquiries->enquiry_locations;

                    $locations_country_cities=unserialize($locations);







                    @endphp

                    <div class="row mb-10">

                        <div class="col-sm-6 col-md-3">

                            <div class="form-group" id="departure_country_div">

                                <label for="departure_country">DEPARTURE COUNTRY <span class="asterisk">*</span></label>

                                <select id="departure_country" class="form-control select2" name="departure_country" style="width: 100%;">

                                    <option selected="selected" value="0">SELECT COUNTRY</option>

                                    @foreach($countries as $country)

										 @if($country->country_id==$get_enquiries->departure_country)

                                        <option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>

                                        @else

                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>

                                        @endif

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3" >

                            <div class="form-group" id="departure_city_div">

                                <label for="departure_city" >DEPARTURE CITY <span class="asterisk">*</span></label>

                                <input  id="departure_city" type="text" class="form-control" name="departure_city" placeholder="CITY" value="{{$get_enquiries->departure_city}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-3 enquiry_country" id="enquiry_country1">

                            <div class="form-group">

                                <label> COUNTRY <span class="asterisk">*</span></label>

                                <select id="enquiry_location_country" class="form-control select2 enquiry_location_country" name="enquiry_location_country[]" style="width: 100%;">

                                    <option selected="selected" value="0">COUNTRY</option>

                                    @foreach($countries as $country)

                                   @if($country->country_id==$locations_country_cities[0]['country'])

                                        <option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>

                                        @else

                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>

                                        @endif

                                    @endforeach

                                </select>

                            </div>



                        </div>

                        <div class="col-sm-4 col-md-2 enquiry_city" id="enquiry_city1">

                           <div class="form-group">

                            <label> CITY </label>

                            <input type="text" class="form-control enquiry_location_city" name="enquiry_location_cities[]" placeholder="CITY" value="{{$locations_country_cities[0]['city']}}">

                        </div>

                     </div>

                      <div class="col-sm-2 col-md-1 add_minus_more" id="add_minus_more1">

                             <img class="plus-icon add_more_locations" src="{{ asset('assets/images/add_icon.png') }}">

                        </div>



                    </div>

    

                    @if(count($locations_country_cities)>1)



                    @php

                $count=0;

                    @endphp

        

                    @foreach($locations_country_cities as $countries_cities)

                     @php

                        $count++;

                    @endphp

                    @if($count==1)  

                     @continue

                    @endif



                     <div class="row mb-10">

                        <div class="col-sm-6 col-md-3">

                        </div>

                        <div class="col-sm-6 col-md-3" >

                        </div>

                        <div class="col-sm-6 col-md-3 enquiry_country" id="enquiry_country{{$count}}">

                            <div class="form-group">

                                <label> COUNTRY </label>

                                <select id="enquiry_location_country{{$count}}" class="form-control select2 enquiry_location_country" name="enquiry_location_country[]" style="width: 100%;">

                                    <option selected="selected" value="0">COUNTRY</option>

                                    @foreach($countries as $country)

                                   @if($country->country_id==$countries_cities['country'])

                                        <option value="{{$country->country_id}}" selected>{{$country->country_name}}</option>

                                        @else

                                        <option value="{{$country->country_id}}">{{$country->country_name}}</option>

                                        @endif

                                    @endforeach

                                </select>

                            </div>



                        </div>

                        <div class="col-sm-4 col-md-2 enquiry_city" id="enquiry_city{{$count}}">

                           <div class="form-group">

                            <label> CITY </label>

                            <input type="text" id="enquiry_location_city{{$count}}" class="form-control enquiry_location_city" name="enquiry_location_cities[]" placeholder="CITY" value="{{$countries_cities['city']}}">

                        </div>

                     </div>

                      <div class="col-sm-2 col-md-1 add_minus_more" id="add_minus_more{{$count}}">

                             <img class="minus-icon remove_more_locations" src="{{ asset('assets/images/minus_icon.png') }}">

                        </div>



                    </div>

                    

                    @endforeach

                    @endif



                    <div class="row mb-10">

                        <div class="col-sm-12">

                            <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">



                            </div>

                            <h4 class="box-title" style="border-color: #c1c1c1;margin-top: 25px;">

                                <i class="fa fa-plus-circle"></i> ENQUIRY PASSENGERS DETAILS</h4>



                        </div>



                    </div>

                    <div class="row mb-10">





                        <div class="col-sm-6 col-md-4">

                            <div class="form-group">

                                <label for="passenger_name" >NAME <span class="asterisk">*</span></label>

                                <input id="passenger_name" type="text" class="form-control" placeholder="ORGANIZATION NAME" name="passenger_name" value="{{$get_enquiries->passenger_name}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="passenger_dob">BIRTHDATE</label>

                                <div class="input-group date">

                                    <input id="passenger_dob" type="text" class="form-control pull-right datepicker"

                                        placeholder="BIRTHDATE" name="passenger_dob" value="{{$get_enquiries->passenger_dob}}">

                                    <div class="input-group-addon">

                                        <i class="fa fa-calendar"></i>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="passenger_pan_number"> PAN NUMBER <span style="color: #cf3c63" title="AAAPL1234C">&#63;</span></label>

                                <input  id="passenger_pan_number" type="text" class="form-control" placeholder="PAN NUMBER" name="passenger_pan_number" value="{{$get_enquiries->passenger_pan_number}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="passenger_passport_no"> PASSPORT NUMBER </label>

                                <input id="passenger_passport_no" type="text" class="form-control" placeholder=" PASSPORT NUMBER " name="passenger_passport_no" value="{{$get_enquiries->passenger_passport_no}}">

                            </div>

                        </div>

                        <div class="col-sm-6 col-md-2">

                            <div class="form-group">

                                <label for="gstin_no"> GSTIN NUMBER



                                </label>

                                <input id="gstin_no" type="text" class="form-control" placeholder="GSTIN NUMBER" name="gstin_no" maxlength="15" value="{{$get_enquiries->gstin_no}}">

                            </div>

                        </div>

                       <!--  <div class="col-sm-6 col-md-12">

                            <img class="plus-icon" style="display: block;" src="{{ asset('assets/images/add_icon.png') }}">

                        </div> -->







                    </div>



                    <div class="row mb-10">

                        <div class="col-md-12">

                            <div class="box-header with-border" style="padding: 10px;border-color: #c3c3c3;">

                                <input type="hidden" name="enquiry_id" value="{{$enquiry_id}}">

                                <button type="button" id="update_enquiry" class="btn btn-rounded btn-primary mr-10">Update</button>

                                <button type="button" id="discard_enquiry" class="btn btn-rounded btn-primary" >Discard</button>

                            </div>

                        </div>

                    </div>

                </form>

                </div>

            </div>

        </div>
    </div>
    @else
<h4 class="text-danger">No rights to access this page</h4>
    @endif

</div>

</div>

</div>



@include('mains.includes.footer')

@include('mains.includes.bottom-footer')

<script>

    $(document).ready(function()

    {

    //Initialize Select2 Elements

    $('.select2').select2();



    var date = new Date();

    date.setDate(date.getDate());

      //Passport validity Date picker

      $('#passport_validity').datepicker({

          autoclose: true,

          todayHighlight: true,

          format: 'yyyy-mm-dd',

          startDate: date,

      });



      //  //Followup Datetime picker

        $("#nxt_followup_date").datetimepicker({

             autoclose: true,

        format: "yyyy-mm-dd - hh:ii:ss",

        startDate: new Date(),

        });



        //DOB picker

      $('#customer_dob').datepicker({

          autoclose: true,

          todayHighlight: true,

          format: 'yyyy-mm-dd',

          endDate: date,

      });

        //Wedding Date picker

      $('#wedding_date').datepicker({

          autoclose: true,

          todayHighlight: true,

          format: 'yyyy-mm-dd',

      });

       //Passenger Dob Date picker

      $('#passenger_dob').datepicker({

          autoclose: true,

          todayHighlight: true,

          format: 'yyyy-mm-dd',

          endDate: date,

      });



       $('#booking_range').daterangepicker({

         locale: {

            format: 'YYYY-MM-DD',

              cancelLabel: 'Clear'

        }

    }).on('apply.daterangepicker', function(ev, picker) {

                var start = moment(picker.startDate.format('YYYY-MM-DD'));

                var end   = moment(picker.endDate.format('YYYY-MM-DD'));

                var diff = end.diff(start, 'days'); // returns correct number

               $("#no_of_days").val(diff);

               $("#no_of_days_p").text("Number Of Days: "+diff);

            });





    });

    $(document).on("click","#discard_enquiry",function()

    {

        window.history.back();

    });

$(document).on("change",'input[name="currency_exchange_rate_status"]',function()

{

    if($(this).val()=="Yes")

        $("#currency_div").show();

    else

        $("#currency_div").hide();

});

$(document).on("change",'input[name="have_insurance_status"]',function()

{

    if($(this).val()=="Yes")

        $("#insurance_div").show();

    else

        $("#insurance_div").hide();

});

$(document).on("change",'input[name="response_email_status"]',function()

{

    if($(this).is(":checked"))

    {

        $("#email_div").show();

        $("#subject_div").show();

    }

    else

    {

 $("#email_div").hide();

        $("#subject_div").hide();

    }

})

$(document).on("click",".add_more_locations",function()

{

    var source = "{!! asset('assets/images/minus_icon.png') !!}";

    var lastid=$(".enquiry_country:last").attr('id').split('enquiry_country')[1];

    lastid++;

    var insertdata=$(this).parent().parent().clone();

    insertdata.find("#departure_city_div").remove();

    insertdata.find("#departure_country_div").remove();

    insertdata.find(".add_more_locations").attr("src",source);

    insertdata.find(".enquiry_country").attr("id","enquiry_country"+lastid);

    insertdata.find(".enquiry_city").attr("id","enquiry_city"+lastid);

    insertdata.find(".add_minus_more").attr("id","add_minus_more"+lastid);

    insertdata.find(".add_more_locations").removeClass('plus-icon add_more_locations').addClass('minus-icon remove_more_locations');

    insertdata.find(".enquiry_location_country").attr("id","enquiry_location_country"+lastid);



      insertdata.find(".enquiry_location_city").attr("id","enquiry_location_city"+lastid);

          insertdata.find("#enquiry_location_country"+lastid).val('0');

    insertdata.find("#enquiry_location_country"+lastid).select2();

    insertdata.find(".select2-container").eq(1).remove();





    insertdata.find("#enquiry_location_city"+lastid).val('');





      $(".add_minus_more:last").parent().after(insertdata);





}); 

$(document).on("click",".remove_more_locations",function()

{

    $(this).parent().parent().remove();



});   



$(document).on("click","#update_enquiry",function()

{

    var customer_name=$("#customer_name").val();

    var customer_contact=$("#customer_contact").val();

    var customer_email=$("#customer_email").val();

    var customer_alt_email=$("#customer_alt_email").val();

    var enquiry_type=$("#enquiry_type").val();

    var booking_range=$("#booking_range").val();

    var no_of_adults=$("#no_of_adults").val();

    var no_of_kids=$("#no_of_kids").val();

    var enquiry_prospect=$("#enquiry_prospect").val();

    var enquiry_status=$("#enquiry_status").val();

    var nxt_followup_date=$("#nxt_followup_date").val();

    var currency_exchange_rate_status=$("input[name='currency_exchange_rate_status']:checked").val();

    var have_insurance_status=$("input[name='have_insurance_status']:checked").val();

    var departure_country=$("#departure_country").val();

    var departure_city=$("#departure_city").val();

    var passenger_name=$("#passenger_name").val();

    var passenger_dob=$("#passenger_dob").val();

    var passenger_pan_number=$("#passenger_pan_number").val();

    var passenger_passport_no=$("#passenger_passport_no").val();

    var gstin_no=$("#gstin_no").val();

    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    var regex_gst = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/;



    if(customer_name.trim()=="")

    {

        $("#customer_name").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#customer_name").css("border","1px solid #9e9e9e"); 

    }



     if(customer_contact.trim()=="")

    {

        $("#customer_contact").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#customer_contact").css("border","1px solid #9e9e9e"); 

    }

    

    if(customer_email.trim()=="")

    {

        $("#customer_email").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#customer_email").css("border","1px solid #9e9e9e"); 

    }



    if(!regex.test(customer_email.trim()) && customer_email.trim()!="")

    {

        $("#customer_email").css("border","1px solid #cf3c63");

    }



    if(!regex.test(customer_alt_email.trim()) && customer_alt_email.trim()!="")

    {

        $("#customer_alt_email").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#customer_alt_email").css("border","1px solid #9e9e9e"); 

    }



    if(enquiry_type.trim()=="0")

    {

        $("#enquiry_type").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#enquiry_type").css("border","1px solid #9e9e9e"); 

    }

    if(booking_range.trim()=="")

    {

        $("#booking_range").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#booking_range").css("border","1px solid #9e9e9e"); 

    }

    if(no_of_adults.trim()=="")

    {

        $("#no_of_adults").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#no_of_adults").css("border","1px solid #9e9e9e"); 

    }

    if(no_of_kids.trim()=="")

    {

        $("#no_of_kids").css("border","1px solid #cf3c63");

    }

    else

    {

     $("#no_of_kids").css("border","1px solid #9e9e9e"); 

    }

     if(enquiry_prospect.trim()=="0")

    {

        $("#enquiry_prospect").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#enquiry_prospect").css("border","1px solid #9e9e9e"); 

    }

    if(enquiry_status.trim()=="0")

    {

        $("#enquiry_status").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#enquiry_status").css("border","1px solid #9e9e9e"); 

    }

     if(nxt_followup_date.trim()=="")

    {

        $("#nxt_followup_date").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#nxt_followup_date").css("border","1px solid #9e9e9e"); 

    }

    if(currency_exchange_rate_status=="Yes")

    {

        if($("#currency").val()=="0")

        {

            $("#currency").css("border","1px solid #cf3c63");

        }

        else

        {

         $("#currency").css("border","1px solid #9e9e9e"); 

        }



        if($("#currency_exchange_rate").val()=="")

        {

            $("#currency_exchange_rate").css("border","1px solid #cf3c63");

        }

        else

        {

         $("#currency_exchange_rate").css("border","1px solid #9e9e9e"); 

        }

    }

    if(have_insurance_status=="Yes")

    {

        if($("#insurance_days").val()=="")

        {

            $("#insurance_days").css("border","1px solid #cf3c63");

        }

        else

        {

         $("#insurance_days").css("border","1px solid #9e9e9e"); 

        }



        if($("#insurance_type").val()=="0")

        {

            $("#insurance_type").css("border","1px solid #cf3c63");

        }

        else

        {

         $("#insurance_type").css("border","1px solid #9e9e9e"); 

        }

    }

      if(departure_country=="0")

    {

        $("#departure_country").siblings('label').css("border","1px solid #cf3c63");

    }

    else

    {

       $("#departure_country").siblings('label').css("border","none"); 

    }

    if(departure_city.trim()=="")

    {

        $("#departure_city").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#departure_city").css("border","1px solid #9e9e9e"); 

    }

    $location_country=0;

     $(".enquiry_location_country").each(function() {

     if($(this).val().trim()=="0")

     {

        $(this).siblings('label').css("border","1px solid #cf3c63");

        $location_country++;

    }

    else

    {

         $(this).siblings('label').css("border","none");

    }

    });

    $location_city=0;

    $("input[name='enquiry_location_cities[]']").each(function() {

     if($(this).val().trim()=="")

     {

        $location_city++;

        $(this).css("border","1px solid #cf3c63");

    }

    else

    {

     $(this).css("border","1px solid #9e9e9e"); 

     }

    });

     if(passenger_name.trim()=="")

    {

        $("#passenger_name").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#passenger_name").css("border","1px solid #9e9e9e"); 

    }

    if(!regex_gst.test(gstin_no.trim()) && gstin_no.trim()!="")

    {

        $("#gstin_no").css("border","1px solid #cf3c63");

    }

    else

    {

       $("#gstin_no").css("border","1px solid #9e9e9e"); 

    }















    if(customer_name.trim()=="")

    {

        $("#customer_name").focus();

    }

    else if(customer_contact.trim()=="")

    {

        $("#customer_contact").focus();

    }

    else if(customer_email.trim()=="")

    {

        $("#customer_email").focus();

    }

    else if(!regex.test(customer_email.trim()))

    {

        $("#customer_email").focus();

    }

     else if(!regex.test(customer_alt_email.trim()) && customer_alt_email!="")

    {

        $("#customer_alt_email").focus();

    }

    else if(enquiry_type.trim()=="0")

    {

        $("#enquiry_type").focus();

    }

    else if(booking_range.trim()=="")

    {

        $("#booking_range").focus();

    }

    else if(no_of_adults.trim()=="")

    {

        $("#no_of_adults").focus();

    }

    else if(no_of_kids.trim()=="")

    {

        $("#no_of_kids").focus();

    }

     else if(enquiry_prospect.trim()=="0")

    {

        $("#enquiry_prospect").focus();

    }

     else if(enquiry_status.trim()=="0")

    {

        $("#enquiry_status").focus();

    }

     else if(nxt_followup_date.trim()=="")

    {

        $("#nxt_followup_date").focus();

    }

     else if(currency_exchange_rate_status=="Yes" && $("#currency").val()=="0")

     {

        $("#currency").focus();

    }

    else if(currency_exchange_rate_status=="Yes" && $("#currency_exchange_rate").val()=="")

    {

     $("#currency_exchange_rate").focus();

     }

     else if(have_insurance_status=="Yes" && $("#insurance_days").val()=="")

     {

        $("#insurance_days").focus();

     }

     else if(have_insurance_status=="Yes" && $("#insurance_type").val()=="0")

     {

        $("#insurance_type").focus();

     }

     else if(departure_country=="0")

     {

        $("#departure_country").focus();

    }

    else if(departure_city=="")

    {

         $("#departure_city").focus();

    }

    else if($location_country>0)

    {

          $(".enquiry_location_country").each(function() {

         if($(this).val().trim()=="0")

         {

            $(this).focus();

        }

        });

   }

   else if($location_city>0)

   {

        $("input[name='enquiry_location_cities[]']").each(function() {

          if($(this).val().trim()=="")

          {

             $(this).focus();

         }

         });

    }

      else if(passenger_name=="")

    {

         $("#passenger_name").focus();

    }

     else if(!regex_gst.test(gstin_no.trim()) && gstin_no!="")

    {

        $("#gstin_no").focus();

    }

    else

    {

       var formdata=new FormData($("#enquiry_form")[0]);



    $.ajax({

        url:"{{route('update-enquiry')}}",

        data: formdata,

        type:"POST",

        processData: false,

        contentType: false,

        success:function(response)

        {

            if(response=="exist")

            {

          swal("Already Exist!", "Customer with this email already exists");

            }

            else if(response=="success")

            {

                swal({title:"Updated",text:"Enquiry Updated Successfully !",type: "success"},

                 function(){ 

                     location.reload();

                 });

            }

        }

    });  

    }

   



});

</script>

</body>



</html>



