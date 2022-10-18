

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="business-home" class="business-home-main-block">
        <div class="business-img">
                    <img src="https://eclass.mediacity.co.in/demo/public/images/breadcum/1643952051bredcrumbs.jpg" class="img-fluid" alt="">
                </div>
        <div class="overlay-bg"></div>
        <div class="container-xl">
            <div class="business-dtl">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bredcrumb-dtl">
                            <h1 class="wishlist-home-heading">User Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="profile-item" class="profile-item-block">
        <div class="container-xl">
            <form action="https://eclass.mediacity.co.in/demo/public/edit/13" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="c5ThEdfRIK72tRqk1CTu4NKL0BhdOC2kYR7ypO7o">
                <input type="hidden" name="_method" value="PUT">

                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="dashboard-author-block text-center">
                            <div class="author-image">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="imageUpload" name="user_img" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload"><i class="fa fa-pencil"></i></label>
                                    </div>
                                    <div class="avatar-preview">
                                                                                <div class="avatar-preview-img" id="imagePreview" style="background-image: url(https://eclass.mediacity.co.in/demo/public/images/user_img/1637571503young-smiling-student-woman-white-background.jpg);">
                                            </div>
                                                                        </div>
                                </div>
                            </div>
                            <div class="author-name">User&nbsp;Mediacity</div>
                        </div>
                        <div class="dashboard-items">
                            <ul>
                                <li>
                                    <i class="fa fa-bookmark"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/gotomycourse" title="My Courses">My Courses</a>
                                </li>
                                <li>
                                    <i class="fa fa-heart"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/all/wishlist" title="My wishlist">My Wishlist</a>
                                </li>
                                <li>
                                    <i class="fa fa-history"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/all/purchase" title="Purchase History">Purchase History</a>
                                </li>
                                <li>
                                    <i class="fa fa-user"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/profile/show/13" title="User Profile">User Profile</a>
                                </li>
                                                            <li>
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor">Become An Instructor</a>
                                </li>
                                                            <li>
                                    <i class="fa fa-bank"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/bankdetail" title="My Bank Details">My Bank Details</a>
                                </li>

                                <li>
                                    <i class="fa fa-check"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/2fa" title="2 Factor Auth">2 Factor Auth</a>
                                </li>
                                <li>
                                    <i class="fa fa-check"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/verifaction" title="Verifaction">Verifaction</a>
                                </li>
                                
                                <li>
                                    <i class="fas fa-user"></i>
                                    <a href="https://eclass.mediacity.co.in/demo/public/front/alumini" title="Alumini">Alumini</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8">

                        <div class="profile-info-block">
                            <div class="profile-heading">Personal Info</div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input type="text" id="name" name="fname" class="form-control" placeholder="Enter First Name" value="User" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="info@example.com" required="" value="user@mediacity.co.in">
                                    </div>
                                
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="Username">Last Name</label>
                                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name" value="Mediacity" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" id="mobile" value="1234567890" class="form-control" placeholder="Enter Mobile No">
                                    </div>
                                
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio">address</label>
                                <textarea id="address" name="address" class="form-control" placeholder="Enter your Address" value=""></textarea>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city_id">Country:</label>
                                        <select id="country_id" class="form-control js-example-basic-single select2-hidden-accessible" name="country_id" data-select2-id="country_id" tabindex="-1" aria-hidden="true">
                                            <option value="none" selected="" disabled="" hidden="" data-select2-id="2"> 
                                            Select an Option
                                            </option>
                                        
                                                                                <option value="37">Cameroon
                                            </option>
                                                                                <option value="231">United States
                                            </option>
                                                                                <option value="101">India
                                            </option>
                                                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 298px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_id-container"><span class="select2-selection__rendered" id="select2-country_id-container" role="textbox" aria-readonly="true" title=" 
                                            Select an Option
                                            "> 
                                            Select an Option
                                            </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city_id">State:</label>
                                        <select id="upload_id" class="form-control js-example-basic-single select2-hidden-accessible" name="state_id" data-select2-id="upload_id" tabindex="-1" aria-hidden="true">
                                        <option value="none" selected="" disabled="" hidden="" data-select2-id="4"> 
                                            Select an Option
                                        </option>
                                                                                <option value="1">Alabama</option>
                                                                                <option value="2">Alaska</option>
                                                                                <option value="3">Arizona</option>
                                                                                <option value="4">Arkansas</option>
                                                                                <option value="5">Byram</option>
                                                                                <option value="6">California</option>
                                                                                <option value="7">Cokato</option>
                                                                                <option value="8">Colorado</option>
                                                                                <option value="9">Connecticut</option>
                                                                                <option value="10">Delaware</option>
                                                                                <option value="11">District of Columbia</option>
                                                                                <option value="12">Florida</option>
                                                                                <option value="13">Georgia</option>
                                                                                <option value="14">Hawaii</option>
                                                                                <option value="15">Idaho</option>
                                                                                <option value="16">Illinois</option>
                                                                                <option value="17">Indiana</option>
                                                                                <option value="18">Iowa</option>
                                                                                <option value="19">Kansas</option>
                                                                                <option value="20">Kentucky</option>
                                                                                <option value="21">Louisiana</option>
                                                                                <option value="22">Lowa</option>
                                                                                <option value="23">Maine</option>
                                                                                <option value="24">Maryland</option>
                                                                                <option value="25">Massachusetts</option>
                                                                                <option value="26">Medfield</option>
                                                                                <option value="27">Michigan</option>
                                                                                <option value="28">Minnesota</option>
                                                                                <option value="29">Mississippi</option>
                                                                                <option value="30">Missouri</option>
                                                                                <option value="31">Montana</option>
                                                                                <option value="32">Nebraska</option>
                                                                                <option value="33">Nevada</option>
                                                                                <option value="34">New Hampshire</option>
                                                                                <option value="35">New Jersey</option>
                                                                                <option value="36">New Jersy</option>
                                                                                <option value="37">New Mexico</option>
                                                                                <option value="38">New York</option>
                                                                                <option value="39">North Carolina</option>
                                                                                <option value="40">North Dakota</option>
                                                                                <option value="41">Ohio</option>
                                                                                <option value="42">Oklahoma</option>
                                                                                <option value="43">Ontario</option>
                                                                                <option value="44">Oregon</option>
                                                                                <option value="45">Pennsylvania</option>
                                                                                <option value="46">Ramey</option>
                                                                                <option value="47">Rhode Island</option>
                                                                                <option value="48">South Carolina</option>
                                                                                <option value="49">South Dakota</option>
                                                                                <option value="50">Sublimity</option>
                                                                                <option value="51">Tennessee</option>
                                                                                <option value="52">Texas</option>
                                                                                <option value="53">Trimble</option>
                                                                                <option value="54">Utah</option>
                                                                                <option value="55">Vermont</option>
                                                                                <option value="56">Virginia</option>
                                                                                <option value="57">Washington</option>
                                                                                <option value="58">West Virginia</option>
                                                                                <option value="59">Wisconsin</option>
                                                                                <option value="60">Wyoming</option>
                                                                                <option value="61">Andaman and Nicobar Islands</option>
                                                                                <option value="62">Andhra Pradesh</option>
                                                                                <option value="63">Arunachal Pradesh</option>
                                                                                <option value="64">Assam</option>
                                                                                <option value="65">Bihar</option>
                                                                                <option value="66">Chandigarh</option>
                                                                                <option value="67">Chhattisgarh</option>
                                                                                <option value="68">Dadra and Nagar Haveli</option>
                                                                                <option value="69">Daman and Diu</option>
                                                                                <option value="70">Delhi</option>
                                                                                <option value="71">Goa</option>
                                                                                <option value="72">Gujarat</option>
                                                                                <option value="73">Haryana</option>
                                                                                <option value="74">Himachal Pradesh</option>
                                                                                <option value="75">Jammu and Kashmir</option>
                                                                                <option value="76">Jharkhand</option>
                                                                                <option value="77">Karnataka</option>
                                                                                <option value="78">Kenmore</option>
                                                                                <option value="79">Kerala</option>
                                                                                <option value="80">Lakshadweep</option>
                                                                                <option value="81">Madhya Pradesh</option>
                                                                                <option value="82">Maharashtra</option>
                                                                                <option value="83">Manipur</option>
                                                                                <option value="84">Meghalaya</option>
                                                                                <option value="85">Mizoram</option>
                                                                                <option value="86">Nagaland</option>
                                                                                <option value="87">Narora</option>
                                                                                <option value="88">Natwar</option>
                                                                                <option value="89">Odisha</option>
                                                                                <option value="90">Paschim Medinipur</option>
                                                                                <option value="91">Pondicherry</option>
                                                                                <option value="92">Punjab</option>
                                                                                <option value="93">Rajasthan</option>
                                                                                <option value="94">Sikkim</option>
                                                                                <option value="95">Tamil Nadu</option>
                                                                                <option value="96">Telangana</option>
                                                                                <option value="97">Tripura</option>
                                                                                <option value="98">Uttar Pradesh</option>
                                                                                <option value="99">Uttarakhand</option>
                                                                                <option value="100">Vaishali</option>
                                                                                <option value="101">West Bengal</option>
                                        
                                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 298px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-upload_id-container"><span class="select2-selection__rendered" id="select2-upload_id-container" role="textbox" aria-readonly="true" title=" 
                                            Select an Option
                                        "> 
                                            Select an Option
                                        </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city_id">City:</label>
                                        <select id="grand" class="form-control js-example-basic-single select2-hidden-accessible" name="city_id" data-select2-id="grand" tabindex="-1" aria-hidden="true">
                                        <option value="none" selected="" disabled="" hidden="" data-select2-id="6"> 
                                            SelectanOption
                                        </option>
                                                                                <option value="1">Alabaster
                                            </option>
                                                                                <option value="2">Albertville
                                            </option>
                                                                                <option value="3">Alexander City
                                            </option>
                                                                                <option value="4">Anniston
                                            </option>
                                                                                <option value="5">Arab
                                            </option>
                                                                                <option value="6">Ashville
                                            </option>
                                                                                <option value="7">Athens
                                            </option>
                                                                                <option value="8">Atmore
                                            </option>
                                                                                <option value="9">Auburn
                                            </option>
                                                                                <option value="10">Bessemer
                                            </option>
                                                                                <option value="11">Birmingham
                                            </option>
                                                                                <option value="12">Capshaw
                                            </option>
                                                                                <option value="13">Center Point
                                            </option>
                                                                                <option value="14">Childersburg
                                            </option>
                                                                                <option value="15">Cullman
                                            </option>
                                                                                <option value="16">Daleville
                                            </option>
                                                                                <option value="17">Daphne
                                            </option>
                                                                                <option value="18">Decatur
                                            </option>
                                                                                <option value="19">Dothan
                                            </option>
                                                                                <option value="20">Enterprise
                                            </option>
                                                                                <option value="21">Eufaula
                                            </option>
                                                                                <option value="22">Fairfield
                                            </option>
                                                                                <option value="23">Fairhope
                                            </option>
                                                                                <option value="24">Florence
                                            </option>
                                                                                <option value="25">Fort Payne
                                            </option>
                                                                                <option value="26">Gadsden
                                            </option>
                                                                                <option value="27">Grand Bay
                                            </option>
                                                                                <option value="28">Grove Hill
                                            </option>
                                                                                <option value="29">Guntersville
                                            </option>
                                                                                <option value="30">Hampton Cove
                                            </option>
                                                                                <option value="31">Hanceville
                                            </option>
                                                                                <option value="32">Hartselle
                                            </option>
                                                                                <option value="33">Headland
                                            </option>
                                                                                <option value="34">Helena
                                            </option>
                                                                                <option value="35">Hodges
                                            </option>
                                                                                <option value="36">Homewood
                                            </option>
                                                                                <option value="37">Hoover
                                            </option>
                                                                                <option value="38">Hueytown
                                            </option>
                                                                                <option value="39">Huntsville
                                            </option>
                                                                                <option value="40">Jacksonville
                                            </option>
                                                                                <option value="41">Jasper
                                            </option>
                                                                                <option value="42">Leeds
                                            </option>
                                                                                <option value="43">Luverne
                                            </option>
                                                                                <option value="44">Madison
                                            </option>
                                                                                <option value="45">Mobile
                                            </option>
                                                                                <option value="46">Montgomery
                                            </option>
                                                                                <option value="47">Mountain Brook
                                            </option>
                                                                                <option value="48">Muscle Shoals
                                            </option>
                                                                                <option value="49">Northport
                                            </option>
                                                                                <option value="50">Notasulga
                                            </option>
                                                                                <option value="51">Opelika
                                            </option>
                                                                                <option value="52">Oxford
                                            </option>
                                                                                <option value="53">Ozark
                                            </option>
                                                                                <option value="54">Pelham
                                            </option>
                                                                                <option value="55">Pell City
                                            </option>
                                                                                <option value="56">Pennsylvania
                                            </option>
                                                                                <option value="57">Phenix City
                                            </option>
                                                                                <option value="58">Prattville
                                            </option>
                                                                                <option value="59">Prichard
                                            </option>
                                                                                <option value="60">Ramer
                                            </option>
                                                                                <option value="61">Roanoke
                                            </option>
                                                                                <option value="62">Saraland
                                            </option>
                                                                                <option value="63">Scottsboro
                                            </option>
                                                                                <option value="64">Selma
                                            </option>
                                                                                <option value="65">Sheffield
                                            </option>
                                                                                <option value="66">Smiths
                                            </option>
                                                                                <option value="67">Sumiton
                                            </option>
                                                                                <option value="68">Sylacauga
                                            </option>
                                                                                <option value="69">Talladega
                                            </option>
                                                                                <option value="70">Thomasville
                                            </option>
                                                                                <option value="71">Trafford
                                            </option>
                                                                                <option value="72">Troy
                                            </option>
                                                                                <option value="73">Trussville
                                            </option>
                                                                                <option value="74">Tuscaloosa
                                            </option>
                                                                                <option value="75">Tuskegee
                                            </option>
                                                                                <option value="76">Vestavia Hills
                                            </option>
                                                                                <option value="77">Anchorage
                                            </option>
                                                                                <option value="78">Barrow
                                            </option>
                                                                                <option value="79">Bethel
                                            </option>
                                                                                <option value="80">College
                                            </option>
                                                                                <option value="81">Fairbanks
                                            </option>
                                                                                <option value="82">Homer
                                            </option>
                                                                                <option value="83">Juneau
                                            </option>
                                                                                <option value="84">Kenai
                                            </option>
                                                                                <option value="85">Ketchikan
                                            </option>
                                                                                <option value="86">Kodiak
                                            </option>
                                                                                <option value="87">Nome
                                            </option>
                                                                                <option value="88">Palmer
                                            </option>
                                                                                <option value="89">Sitka
                                            </option>
                                                                                <option value="90">Soldotna
                                            </option>
                                                                                <option value="91">Sterling
                                            </option>
                                                                                <option value="92">Unalaska
                                            </option>
                                                                                <option value="93">Valdez
                                            </option>
                                                                                <option value="94">Wasilla
                                            </option>
                                                                                <option value="95">Apache Junction
                                            </option>
                                                                                <option value="96">Avondale
                                            </option>
                                                                                <option value="97">Bisbee
                                            </option>
                                                                                <option value="98">Bouse
                                            </option>
                                                                                <option value="99">Bullhead City
                                            </option>
                                                                                <option value="100">Carefree
                                            </option>
                                                                                <option value="101">Casa Grande
                                            </option>
                                                                                <option value="102">Casas Adobes
                                            </option>
                                                                                <option value="103">Chandler
                                            </option>
                                                                                <option value="104">Clarkdale
                                            </option>
                                                                                <option value="105">Cottonwood
                                            </option>
                                                                                <option value="106">Douglas
                                            </option>
                                                                                <option value="107">Drexel Heights
                                            </option>
                                                                                <option value="108">El Mirage
                                            </option>
                                                                                <option value="109">Flagstaff
                                            </option>
                                                                                <option value="110">Florence
                                            </option>
                                                                                <option value="111">Flowing Wells
                                            </option>
                                                                                <option value="112">Fort Mohave
                                            </option>
                                                                                <option value="113">Fortuna Foothills
                                            </option>
                                                                                <option value="114">Fountain Hills
                                            </option>
                                                                                <option value="115">Gilbert
                                            </option>
                                                                                <option value="116">Glendale
                                            </option>
                                                                                <option value="117">Globe
                                            </option>
                                                                                <option value="118">Goodyear
                                            </option>
                                                                                <option value="119">Green Valley
                                            </option>
                                                                                <option value="120">Kingman
                                            </option>
                                                                                <option value="121">Lake Havasu City
                                            </option>
                                                                                <option value="122">Laveen
                                            </option>
                                                                                <option value="123">Litchfield Park
                                            </option>
                                                                                <option value="124">Marana
                                            </option>
                                                                                <option value="125">Mesa
                                            </option>
                                                                                <option value="126">New Kingman-Butler
                                            </option>
                                                                                <option value="127">Nogales
                                            </option>
                                                                                <option value="128">Oracle
                                            </option>
                                                                                <option value="129">Oro Valley
                                            </option>
                                                                                <option value="130">Paradise Valley
                                            </option>
                                                                                <option value="131">Parker
                                            </option>
                                                                                <option value="132">Payson
                                            </option>
                                                                                <option value="133">Peoria
                                            </option>
                                                                                <option value="134">Phoenix
                                            </option>
                                                                                <option value="135">Pine
                                            </option>
                                                                                <option value="136">Pinetop
                                            </option>
                                                                                <option value="137">Prescott
                                            </option>
                                                                                <option value="138">Prescott Valley
                                            </option>
                                                                                <option value="139">Quartzsite
                                            </option>
                                                                                <option value="140">Queen Creek
                                            </option>
                                                                                <option value="141">Rio Rico
                                            </option>
                                                                                <option value="142">Safford
                                            </option>
                                                                                <option value="143">San Luis
                                            </option>
                                                                                <option value="144">Scottsdale
                                            </option>
                                                                                <option value="145">Sedona
                                            </option>
                                                                                <option value="146">Sierra Vista
                                            </option>
                                                                                <option value="147">Sierra Vista Southeast
                                            </option>
                                                                                <option value="148">Sun City
                                            </option>
                                                                                <option value="149">Sun City West
                                            </option>
                                                                                <option value="150">Surprise
                                            </option>
                                                                                <option value="151">Tempe
                                            </option>
                                                                                <option value="152">Tombstone
                                            </option>
                                                                                <option value="153">Tucson
                                            </option>
                                                                                <option value="154">Winslow
                                            </option>
                                                                                <option value="155">Yuma
                                            </option>
                                                                                <option value="156">Abu Road
                                            </option>
                                                                                <option value="157">Ajmer
                                            </option>
                                                                                <option value="158">Aklera
                                            </option>
                                                                                <option value="159">Alwar
                                            </option>
                                                                                <option value="160">Amet
                                            </option>
                                                                                <option value="161">Antah
                                            </option>
                                                                                <option value="162">Anupgarh
                                            </option>
                                                                                <option value="163">Asind
                                            </option>
                                                                                <option value="164">Bagar
                                            </option>
                                                                                <option value="165">Bagru
                                            </option>
                                                                                <option value="166">Bahror
                                            </option>
                                                                                <option value="167">Bakani
                                            </option>
                                                                                <option value="168">Bali
                                            </option>
                                                                                <option value="169">Balotra
                                            </option>
                                                                                <option value="170">Bandikui
                                            </option>
                                                                                <option value="171">Banswara
                                            </option>
                                                                                <option value="172">Baran
                                            </option>
                                                                                <option value="173">Bari
                                            </option>
                                                                                <option value="174">Bari Sadri
                                            </option>
                                                                                <option value="175">Barmer
                                            </option>
                                                                                <option value="176">Basi
                                            </option>
                                                                                <option value="177">Basni Belima
                                            </option>
                                                                                <option value="178">Baswa
                                            </option>
                                                                                <option value="179">Bayana
                                            </option>
                                                                                <option value="180">Beawar
                                            </option>
                                                                                <option value="181">Begun
                                            </option>
                                                                                <option value="182">Bhadasar
                                            </option>
                                                                                <option value="183">Bhadra
                                            </option>
                                                                                <option value="184">Bhalariya
                                            </option>
                                                                                <option value="185">Bharatpur
                                            </option>
                                                                                <option value="186">Bhasawar
                                            </option>
                                                                                <option value="187">Bhawani Mandi
                                            </option>
                                                                                <option value="188">Bhawri
                                            </option>
                                                                                <option value="189">Bhilwara
                                            </option>
                                                                                <option value="190">Bhindar
                                            </option>
                                                                                <option value="191">Bhinmal
                                            </option>
                                                                                <option value="192">Bhiwadi
                                            </option>
                                                                                <option value="193">Bijoliya Kalan
                                            </option>
                                                                                <option value="194">Bikaner
                                            </option>
                                                                                <option value="195">Bilara
                                            </option>
                                                                                <option value="196">Bissau
                                            </option>
                                                                                <option value="197">Borkhera
                                            </option>
                                                                                <option value="198">Budhpura
                                            </option>
                                                                                <option value="199">Bundi
                                            </option>
                                                                                <option value="200">Chatsu
                                            </option>
                                                                                <option value="201">Chechat
                                            </option>
                                                                                <option value="202">Chhabra
                                            </option>
                                                                                <option value="203">Chhapar
                                            </option>
                                                                                <option value="204">Chhipa Barod
                                            </option>
                                                                                <option value="205">Chhoti Sadri
                                            </option>
                                                                                <option value="206">Chirawa
                                            </option>
                                                                                <option value="207">Chittaurgarh
                                            </option>
                                                                                <option value="208">Chittorgarh
                                            </option>
                                                                                <option value="209">Chomun
                                            </option>
                                                                                <option value="210">Churu
                                            </option>
                                                                                <option value="211">Daosa
                                            </option>
                                                                                <option value="212">Dariba
                                            </option>
                                                                                <option value="213">Dausa
                                            </option>
                                                                                <option value="214">Deoli
                                            </option>
                                                                                <option value="215">Deshnok
                                            </option>
                                                                                <option value="216">Devgarh
                                            </option>
                                                                                <option value="217">Devli
                                            </option>
                                                                                <option value="218">Dhariawad
                                            </option>
                                                                                <option value="219">Dhaulpur
                                            </option>
                                                                                <option value="220">Dholpur
                                            </option>
                                                                                <option value="221">Didwana
                                            </option>
                                                                                <option value="222">Dig
                                            </option>
                                                                                <option value="223">Dungargarh
                                            </option>
                                                                                <option value="224">Dungarpur
                                            </option>
                                                                                <option value="225">Falna
                                            </option>
                                                                                <option value="226">Fatehnagar
                                            </option>
                                                                                <option value="227">Fatehpur
                                            </option>
                                                                                <option value="228">Gajsinghpur
                                            </option>
                                                                                <option value="229">Galiakot
                                            </option>
                                                                                <option value="230">Ganganagar
                                            </option>
                                                                                <option value="231">Gangapur
                                            </option>
                                                                                <option value="232">Goredi Chancha
                                            </option>
                                                                                <option value="233">Gothra
                                            </option>
                                                                                <option value="234">Govindgarh
                                            </option>
                                                                                <option value="235">Gulabpura
                                            </option>
                                                                                <option value="236">Hanumangarh
                                            </option>
                                                                                <option value="237">Hindaun
                                            </option>
                                                                                <option value="238">Indragarh
                                            </option>
                                                                                <option value="239">Jahazpur
                                            </option>
                                                                                <option value="240">Jaipur
                                            </option>
                                                                                <option value="241">Jaisalmer
                                            </option>
                                                                                <option value="242">Jaiselmer
                                            </option>
                                                                                <option value="243">Jaitaran
                                            </option>
                                                                                <option value="244">Jalore
                                            </option>
                                                                                <option value="245">Jhalawar
                                            </option>
                                                                                <option value="246">Jhalrapatan
                                            </option>
                                                                                <option value="247">Jhunjhunun
                                            </option>
                                                                                <option value="248">Jobner
                                            </option>
                                                                                <option value="249">Jodhpur
                                            </option>
                                                                                <option value="250">Kaithun
                                            </option>
                                                                                <option value="251">Kaman
                                            </option>
                                                                                <option value="252">Kankroli
                                            </option>
                                                                                <option value="253">Kanor
                                            </option>
                                                                                <option value="254">Kapasan
                                            </option>
                                                                                <option value="255">Kaprain
                                            </option>
                                                                                <option value="256">Karanpura
                                            </option>
                                                                                <option value="257">Karauli
                                            </option>
                                                                                <option value="258">Kekri
                                            </option>
                                                                                <option value="259">Keshorai Patan
                                            </option>
                                                                                <option value="260">Kesrisinghpur
                                            </option>
                                                                                <option value="261">Khairthal
                                            </option>
                                                                                <option value="262">Khandela
                                            </option>
                                                                                <option value="263">Khanpur
                                            </option>
                                                                                <option value="264">Kherli
                                            </option>
                                                                                <option value="265">Kherliganj
                                            </option>
                                                                                <option value="266">Kherwara Chhaoni
                                            </option>
                                                                                <option value="267">Khetri
                                            </option>
                                                                                <option value="268">Kiranipura
                                            </option>
                                                                                <option value="269">Kishangarh
                                            </option>
                                                                                <option value="270">Kishangarh Ranwal
                                            </option>
                                                                                <option value="271">Kolvi Rajendrapura
                                            </option>
                                                                                <option value="272">Kot Putli
                                            </option>
                                                                                <option value="273">Kota
                                            </option>
                                                                                <option value="274">Kuchaman
                                            </option>
                                                                                <option value="275">Kuchera
                                            </option>
                                                                                <option value="276">Kumbhalgarh
                                            </option>
                                                                                <option value="277">Kumbhkot
                                            </option>
                                                                                <option value="278">Kumher
                                            </option>
                                                                                <option value="279">Kushalgarh
                                            </option>
                                                                                <option value="280">Lachhmangarh
                                            </option>
                                                                                <option value="281">Ladnun
                                            </option>
                                                                                <option value="282">Lakheri
                                            </option>
                                                                                <option value="283">Lalsot
                                            </option>
                                                                                <option value="284">Losal
                                            </option>
                                                                                <option value="285">Madanganj
                                            </option>
                                                                                <option value="286">Mahu Kalan
                                            </option>
                                                                                <option value="287">Mahwa
                                            </option>
                                                                                <option value="288">Makrana
                                            </option>
                                                                                <option value="289">Malpura
                                            </option>
                                                                                <option value="290">Mandal
                                            </option>
                                                                                <option value="291">Mandalgarh
                                            </option>
                                                                                <option value="292">Mandawar
                                            </option>
                                                                                <option value="293">Mandwa
                                            </option>
                                                                                <option value="294">Mangrol
                                            </option>
                                                                                <option value="295">Manohar Thana
                                            </option>
                                                                                <option value="296">Manoharpur
                                            </option>
                                                                                <option value="297">Marwar
                                            </option>
                                                                                <option value="298">Merta
                                            </option>
                                                                                <option value="299">Modak
                                            </option>
                                                                                <option value="300">Mount Abu
                                            </option>
                                                                                <option value="301">Mukandgarh
                                            </option>
                                                                                <option value="302">Mundwa
                                            </option>
                                                                                <option value="303">Nadbai
                                            </option>
                                                                                <option value="304">Naenwa
                                            </option>
                                                                                <option value="305">Nagar
                                            </option>
                                                                                <option value="306">Nagaur
                                            </option>
                                                                                <option value="307">Napasar
                                            </option>
                                                                                <option value="308">Naraina
                                            </option>
                                                                                <option value="309">Nasirabad
                                            </option>
                                                                                <option value="310">Nathdwara
                                            </option>
                                                                                <option value="311">Nawa
                                            </option>
                                                                                <option value="312">Nawalgarh
                                            </option>
                                                                                <option value="313">Neem Ka Thana
                                            </option>
                                                                                <option value="314">Neemrana
                                            </option>
                                                                                <option value="315">Newa Talai
                                            </option>
                                                                                <option value="316">Nimaj
                                            </option>
                                                                                <option value="317">Nimbahera
                                            </option>
                                                                                <option value="318">Niwai
                                            </option>
                                                                                <option value="319">Nohar
                                            </option>
                                                                                <option value="320">Nokha
                                            </option>
                                                                                <option value="321">One SGM
                                            </option>
                                                                                <option value="322">Padampur
                                            </option>
                                                                                <option value="323">Pali
                                            </option>
                                                                                <option value="324">Partapur
                                            </option>
                                                                                <option value="325">Parvatsar
                                            </option>
                                                                                <option value="326">Pasoond
                                            </option>
                                                                                <option value="327">Phalna
                                            </option>
                                                                                <option value="328">Phalodi
                                            </option>
                                                                                <option value="329">Phulera
                                            </option>
                                                                                <option value="330">Pilani
                                            </option>
                                                                                <option value="331">Pilibanga
                                            </option>
                                                                                <option value="332">Pindwara
                                            </option>
                                                                                <option value="333">Pipalia Kalan
                                            </option>
                                                                                <option value="334">Pipar
                                            </option>
                                                                                <option value="335">Pirawa
                                            </option>
                                                                                <option value="336">Pokaran
                                            </option>
                                                                                <option value="337">Pratapgarh
                                            </option>
                                                                                <option value="338">Pushkar
                                            </option>
                                                                                <option value="339">Raipur
                                            </option>
                                                                                <option value="340">Raisinghnagar
                                            </option>
                                                                                <option value="341">Rajakhera
                                            </option>
                                                                                <option value="342">Rajaldesar
                                            </option>
                                                                                <option value="343">Rajgarh
                                            </option>
                                                                                <option value="344">Rajsamand
                                            </option>
                                                                                <option value="345">Ramganj Mandi
                                            </option>
                                                                                <option value="346">Ramgarh
                                            </option>
                                                                                <option value="347">Rani
                                            </option>
                                                                                <option value="348">Raniwara
                                            </option>
                                                                                <option value="349">Ratan Nagar
                                            </option>
                                                                                <option value="350">Ratangarh
                                            </option>
                                                                                <option value="351">Rawatbhata
                                            </option>
                                                                                <option value="352">Rawatsar
                                            </option>
                                                                                <option value="353">Rikhabdev
                                            </option>
                                                                                <option value="354">Ringas
                                            </option>
                                                                                <option value="355">Sadri
                                            </option>
                                                                                <option value="356">Sadulshahar
                                            </option>
                                                                                <option value="357">Sagwara
                                            </option>
                                                                                <option value="358">Salumbar
                                            </option>
                                                                                <option value="359">Sambhar
                                            </option>
                                                                                <option value="360">Samdari
                                            </option>
                                                                                <option value="361">Sanchor
                                            </option>
                                                                                <option value="362">Sangariya
                                            </option>
                                                                                <option value="363">Sangod
                                            </option>
                                                                                <option value="364">Sardarshahr
                                            </option>
                                                                                <option value="365">Sarwar
                                            </option>
                                                                                <option value="366">Satal Kheri
                                            </option>
                                                                                <option value="367">Sawai Madhopur
                                            </option>
                                                                                <option value="368">Sewan Kalan
                                            </option>
                                                                                <option value="369">Shahpura
                                            </option>
                                                                                <option value="370">Sheoganj
                                            </option>
                                                                                <option value="371">Sikar
                                            </option>
                                                                                <option value="372">Sirohi
                                            </option>
                                                                                <option value="373">Siwana
                                            </option>
                                                                                <option value="374">Sogariya
                                            </option>
                                                                                <option value="375">Sojat
                                            </option>
                                                                                <option value="376">Sojat Road
                                            </option>
                                                                                <option value="377">Sri Madhopur
                                            </option>
                                                                                <option value="378">Sriganganagar
                                            </option>
                                                                                <option value="379">Sujangarh
                                            </option>
                                                                                <option value="380">Suket
                                            </option>
                                                                                <option value="381">Sumerpur
                                            </option>
                                                                                <option value="382">Sunel
                                            </option>
                                                                                <option value="383">Surajgarh
                                            </option>
                                                                                <option value="384">Suratgarh
                                            </option>
                                                                                <option value="385">Swaroopganj
                                            </option>
                                                                                <option value="386">Takhatgarh
                                            </option>
                                                                                <option value="387">Taranagar
                                            </option>
                                                                                <option value="388">Three STR
                                            </option>
                                                                                <option value="389">Tijara
                                            </option>
                                                                                <option value="390">Toda Bhim
                                            </option>
                                                                                <option value="391">Toda Raisingh
                                            </option>
                                                                                <option value="392">Todra
                                            </option>
                                                                                <option value="393">Tonk
                                            </option>
                                                                                <option value="394">Udaipur
                                            </option>
                                                                                <option value="395">Udpura
                                            </option>
                                                                                <option value="396">Uniara
                                            </option>
                                                                                <option value="397">Vanasthali
                                            </option>
                                                                                <option value="398">Vidyavihar
                                            </option>
                                                                                <option value="399">Vijainagar
                                            </option>
                                                                                <option value="400">Viratnagar
                                            </option>
                                                                                <option value="401">Wer
                                            </option>
                                                                                <option value="402">Agar
                                            </option>
                                                                                <option value="403">Ajaigarh
                                            </option>
                                                                                <option value="404">Akoda
                                            </option>
                                                                                <option value="405">Akodia
                                            </option>
                                                                                <option value="406">Alampur
                                            </option>
                                                                                <option value="407">Alirajpur
                                            </option>
                                                                                <option value="408">Alot
                                            </option>
                                                                                <option value="409">Amanganj
                                            </option>
                                                                                <option value="410">Amarkantak
                                            </option>
                                                                                <option value="411">Amarpatan
                                            </option>
                                                                                <option value="412">Amarwara
                                            </option>
                                                                                <option value="413">Ambada
                                            </option>
                                                                                <option value="414">Ambah
                                            </option>
                                                                                <option value="415">Amla
                                            </option>
                                                                                <option value="416">Amlai
                                            </option>
                                                                                <option value="417">Anjad
                                            </option>
                                                                                <option value="418">Antri
                                            </option>
                                                                                <option value="419">Anuppur
                                            </option>
                                                                                <option value="420">Aron
                                            </option>
                                                                                <option value="421">Ashoknagar
                                            </option>
                                                                                <option value="422">Ashta
                                            </option>
                                                                                <option value="423">Babai
                                            </option>
                                                                                <option value="424">Bada Malhera
                                            </option>
                                                                                <option value="425">Badagaon
                                            </option>
                                                                                <option value="426">Badagoan
                                            </option>
                                                                                <option value="427">Badarwas
                                            </option>
                                                                                <option value="428">Badawada
                                            </option>
                                                                                <option value="429">Badi
                                            </option>
                                                                                <option value="430">Badkuhi
                                            </option>
                                                                                <option value="431">Badnagar
                                            </option>
                                                                                <option value="432">Badnawar
                                            </option>
                                                                                <option value="433">Badod
                                            </option>
                                                                                <option value="434">Badoda
                                            </option>
                                                                                <option value="435">Badra
                                            </option>
                                                                                <option value="436">Bagh
                                            </option>
                                                                                <option value="437">Bagli
                                            </option>
                                                                                <option value="438">Baihar
                                            </option>
                                                                                <option value="439">Baikunthpur
                                            </option>
                                                                                <option value="440">Bakswaha
                                            </option>
                                                                                <option value="441">Balaghat
                                            </option>
                                                                                <option value="442">Baldeogarh
                                            </option>
                                                                                <option value="443">Bamaniya
                                            </option>
                                                                                <option value="444">Bamhani
                                            </option>
                                                                                <option value="445">Bamor
                                            </option>
                                                                                <option value="446">Bamora
                                            </option>
                                                                                <option value="447">Banda
                                            </option>
                                                                                <option value="448">Bangawan
                                            </option>
                                                                                <option value="449">Bansatar Kheda
                                            </option>
                                                                                <option value="450">Baraily
                                            </option>
                                                                                <option value="451">Barela
                                            </option>
                                                                                <option value="452">Barghat
                                            </option>
                                                                                <option value="453">Bargi
                                            </option>
                                                                                <option value="454">Barhi
                                            </option>
                                                                                <option value="455">Barigarh
                                            </option>
                                                                                <option value="456">Barwaha
                                            </option>
                                                                                <option value="457">Barwani
                                            </option>
                                                                                <option value="458">Basoda
                                            </option>
                                                                                <option value="459">Begamganj
                                            </option>
                                                                                <option value="460">Beohari
                                            </option>
                                                                                <option value="461">Berasia
                                            </option>
                                                                                <option value="462">Betma
                                            </option>
                                                                                <option value="463">Betul
                                            </option>
                                                                                <option value="464">Betul Bazar
                                            </option>
                                                                                <option value="465">Bhainsdehi
                                            </option>
                                                                                <option value="466">Bhamodi
                                            </option>
                                                                                <option value="467">Bhander
                                            </option>
                                                                                <option value="468">Bhanpura
                                            </option>
                                                                                <option value="469">Bharveli
                                            </option>
                                                                                <option value="470">Bhaurasa
                                            </option>
                                                                                <option value="471">Bhavra
                                            </option>
                                                                                <option value="472">Bhedaghat
                                            </option>
                                                                                <option value="473">Bhikangaon
                                            </option>
                                                                                <option value="474">Bhilakhedi
                                            </option>
                                                                                <option value="475">Bhind
                                            </option>
                                                                                <option value="476">Bhitarwar
                                            </option>
                                                                                <option value="477">Bhopal
                                            </option>
                                                                                <option value="478">Bhuibandh
                                            </option>
                                                                                <option value="479">Biaora
                                            </option>
                                                                                <option value="480">Bijawar
                                            </option>
                                                                                <option value="481">Bijeypur
                                            </option>
                                                                                <option value="482">Bijrauni
                                            </option>
                                                                                <option value="483">Bijuri
                                            </option>
                                                                                <option value="484">Bilaua
                                            </option>
                                                                                <option value="485">Bilpura
                                            </option>
                                                                                <option value="486">Bina Railway Colony
                                            </option>
                                                                                <option value="487">Bina-Etawa
                                            </option>
                                                                                <option value="488">Birsinghpur
                                            </option>
                                                                                <option value="489">Boda
                                            </option>
                                                                                <option value="490">Budhni
                                            </option>
                                                                                <option value="491">Burhanpur
                                            </option>
                                                                                <option value="492">Burhar
                                            </option>
                                                                                <option value="493">Chachaura Binaganj
                                            </option>
                                                                                <option value="494">Chakghat
                                            </option>
                                                                                <option value="495">Chandameta Butar
                                            </option>
                                                                                <option value="496">Chanderi
                                            </option>
                                                                                <option value="497">Chandia
                                            </option>
                                                                                <option value="498">Chandla
                                            </option>
                                                                                <option value="499">Chaurai Khas
                                            </option>
                                                                                <option value="500">Chhatarpur
                                            </option>
                                                                                <option value="501">Chhindwara
                                            </option>
                                                                                <option value="502">Chhota Chhindwara
                                            </option>
                                                                                <option value="503">Chichli
                                            </option>
                                                                                <option value="504">Chitrakut
                                            </option>
                                                                                <option value="505">Churhat
                                            </option>
                                                                                <option value="506">Daboh
                                            </option>
                                                                                <option value="507">Dabra
                                            </option>
                                                                                <option value="508">Damoh
                                            </option>
                                                                                <option value="509">Damua
                                            </option>
                                                                                <option value="510">Datia
                                            </option>
                                                                                <option value="511">Deodara
                                            </option>
                                                                                <option value="512">Deori
                                            </option>
                                                                                <option value="513">Deori Khas
                                            </option>
                                                                                <option value="514">Depalpur
                                            </option>
                                                                                <option value="515">Devendranagar
                                            </option>
                                                                                <option value="516">Devhara
                                            </option>
                                                                                <option value="517">Dewas
                                            </option>
                                                                                <option value="518">Dhamnod
                                            </option>
                                                                                <option value="519">Dhana
                                            </option>
                                                                                <option value="520">Dhanpuri
                                            </option>
                                                                                <option value="521">Dhar
                                            </option>
                                                                                <option value="522">Dharampuri
                                            </option>
                                                                                <option value="523">Dighawani
                                            </option>
                                                                                <option value="524">Diken
                                            </option>
                                                                                <option value="525">Dindori
                                            </option>
                                                                                <option value="526">Dola
                                            </option>
                                                                                <option value="527">Dumar Kachhar
                                            </option>
                                                                                <option value="528">Dungariya Chhapara
                                            </option>
                                                                                <option value="529">Gadarwara
                                            </option>
                                                                                <option value="530">Gairatganj
                                            </option>
                                                                                <option value="531">Gandhi Sagar Hydel Colony
                                            </option>
                                                                                <option value="532">Ganjbasoda
                                            </option>
                                                                                <option value="533">Garhakota
                                            </option>
                                                                                <option value="534">Garhi Malhara
                                            </option>
                                                                                <option value="535">Garoth
                                            </option>
                                                                                <option value="536">Gautapura
                                            </option>
                                                                                <option value="537">Ghansor
                                            </option>
                                                                                <option value="538">Ghuwara
                                            </option>
                                                                                <option value="539">Gogaon
                                            </option>
                                                                                <option value="540">Gogapur
                                            </option>
                                                                                <option value="541">Gohad
                                            </option>
                                                                                <option value="542">Gormi
                                            </option>
                                                                                <option value="543">Govindgarh
                                            </option>
                                                                                <option value="544">Guna
                                            </option>
                                                                                <option value="545">Gurh
                                            </option>
                                                                                <option value="546">Gwalior
                                            </option>
                                                                                <option value="547">Hanumana
                                            </option>
                                                                                <option value="548">Harda
                                            </option>
                                                                                <option value="549">Harpalpur
                                            </option>
                                                                                <option value="550">Harrai
                                            </option>
                                                                                <option value="551">Harsud
                                            </option>
                                                                                <option value="552">Hatod
                                            </option>
                                                                                <option value="553">Hatpipalya
                                            </option>
                                                                                <option value="554">Hatta
                                            </option>
                                                                                <option value="555">Hindoria
                                            </option>
                                                                                <option value="556">Hirapur
                                            </option>
                                                                                <option value="557">Hoshangabad
                                            </option>
                                                                                <option value="558">Ichhawar
                                            </option>
                                                                                <option value="559">Iklehra
                                            </option>
                                                                                <option value="560">Indergarh
                                            </option>
                                                                                <option value="561">Indore
                                            </option>
                                                                                <option value="562">Isagarh
                                            </option>
                                                                                <option value="563">Itarsi
                                            </option>
                                                                                <option value="564">Jabalpur
                                            </option>
                                                                                <option value="565">Jabalpur Cantonment
                                            </option>
                                                                                <option value="566">Jabalpur G.C.F
                                            </option>
                                                                                <option value="567">Jaisinghnagar
                                            </option>
                                                                                <option value="568">Jaithari
                                            </option>
                                                                                <option value="569">Jaitwara
                                            </option>
                                                                                <option value="570">Jamai
                                            </option>
                                                                                <option value="571">Jaora
                                            </option>
                                                                                <option value="572">Jatachhapar
                                            </option>
                                                                                <option value="573">Jatara
                                            </option>
                                                                                <option value="574">Jawad
                                            </option>
                                                                                <option value="575">Jawar
                                            </option>
                                                                                <option value="576">Jeronkhalsa
                                            </option>
                                                                                <option value="577">Jhabua
                                            </option>
                                                                                <option value="578">Jhundpura
                                            </option>
                                                                                <option value="579">Jiran
                                            </option>
                                                                                <option value="580">Jirapur
                                            </option>
                                                                                <option value="581">Jobat
                                            </option>
                                                                                <option value="582">Joura
                                            </option>
                                                                                <option value="583">Kailaras
                                            </option>
                                                                                <option value="584">Kaimur
                                            </option>
                                                                                <option value="585">Kakarhati
                                            </option>
                                                                                <option value="586">Kalichhapar
                                            </option>
                                                                                <option value="587">Kanad
                                            </option>
                                                                                <option value="588">Kannod
                                            </option>
                                                                                <option value="589">Kantaphod
                                            </option>
                                                                                <option value="590">Kareli
                                            </option>
                                                                                <option value="591">Karera
                                            </option>
                                                                                <option value="592">Kari
                                            </option>
                                                                                <option value="593">Karnawad
                                            </option>
                                                                                <option value="594">Karrapur
                                            </option>
                                                                                <option value="595">Kasrawad
                                            </option>
                                                                                <option value="596">Katangi
                                            </option>
                                                                                <option value="597">Katni
                                            </option>
                                                                                <option value="598">Kelhauri
                                            </option>
                                                                                <option value="599">Khachrod
                                            </option>
                                                                                <option value="600">Khajuraho
                                            </option>
                                                                                <option value="601">Khamaria
                                            </option>
                                                                                <option value="602">Khand
                                            </option>
                                                                                <option value="603">Khandwa
                                            </option>
                                                                                <option value="604">Khaniyadhana
                                            </option>
                                                                                <option value="605">Khargapur
                                            </option>
                                                                                <option value="606">Khargone
                                            </option>
                                                                                <option value="607">Khategaon
                                            </option>
                                                                                <option value="608">Khetia
                                            </option>
                                                                                <option value="609">Khilchipur
                                            </option>
                                                                                <option value="610">Khirkiya
                                            </option>
                                                                                <option value="611">Khujner
                                            </option>
                                                                                <option value="612">Khurai
                                            </option>
                                                                                <option value="613">Kolaras
                                            </option>
                                                                                <option value="614">Kotar
                                            </option>
                                                                                <option value="615">Kothi
                                            </option>
                                                                                <option value="616">Kotma
                                            </option>
                                                                                <option value="617">Kukshi
                                            </option>
                                                                                <option value="618">Kumbhraj
                                            </option>
                                                                                <option value="619">Kurwai
                                            </option>
                                                                                <option value="620">Lahar
                                            </option>
                                                                                <option value="621">Lakhnadon
                                            </option>
                                                                                <option value="622">Lateri
                                            </option>
                                                                                <option value="623">Laundi
                                            </option>
                                                                                <option value="624">Lidhora Khas
                                            </option>
                                                                                <option value="625">Lodhikheda
                                            </option>
                                                                                <option value="626">Loharda
                                            </option>
                                                                                <option value="627">Machalpur
                                            </option>
                                                                                <option value="628">Madhogarh
                                            </option>
                                                                                <option value="629">Maharajpur
                                            </option>
                                                                                <option value="630">Maheshwar
                                            </option>
                                                                                <option value="631">Mahidpur
                                            </option>
                                                                                <option value="632">Maihar
                                            </option>
                                                                                <option value="633">Majholi
                                            </option>
                                                                                <option value="634">Makronia
                                            </option>
                                                                                <option value="635">Maksi
                                            </option>
                                                                                <option value="636">Malaj Khand
                                            </option>
                                                                                <option value="637">Malanpur
                                            </option>
                                                                                <option value="638">Malhargarh
                                            </option>
                                                                                <option value="639">Manasa
                                            </option>
                                                                                <option value="640">Manawar
                                            </option>
                                                                                <option value="641">Mandav
                                            </option>
                                                                                <option value="642">Mandideep
                                            </option>
                                                                                <option value="643">Mandla
                                            </option>
                                                                                <option value="644">Mandleshwar
                                            </option>
                                                                                <option value="645">Mandsaur
                                            </option>
                                                                                <option value="646">Manegaon
                                            </option>
                                                                                <option value="647">Mangawan
                                            </option>
                                                                                <option value="648">Manglaya Sadak
                                            </option>
                                                                                <option value="649">Manpur
                                            </option>
                                                                                <option value="650">Mau
                                            </option>
                                                                                <option value="651">Mauganj
                                            </option>
                                                                                <option value="652">Meghnagar
                                            </option>
                                                                                <option value="653">Mehara Gaon
                                            </option>
                                                                                <option value="654">Mehgaon
                                            </option>
                                                                                <option value="655">Mhaugaon
                                            </option>
                                                                                <option value="656">Mhow
                                            </option>
                                                                                <option value="657">Mihona
                                            </option>
                                                                                <option value="658">Mohgaon
                                            </option>
                                                                                <option value="659">Morar
                                            </option>
                                                                                <option value="660">Morena
                                            </option>
                                                                                <option value="661">Morwa
                                            </option>
                                                                                <option value="662">Multai
                                            </option>
                                                                                <option value="663">Mundi
                                            </option>
                                                                                <option value="664">Mungaoli
                                            </option>
                                                                                <option value="665">Murwara
                                            </option>
                                                                                <option value="666">Nagda
                                            </option>
                                                                                <option value="667">Nagod
                                            </option>
                                                                                <option value="668">Nagri
                                            </option>
                                                                                <option value="669">Naigarhi
                                            </option>
                                                                                <option value="670">Nainpur
                                            </option>
                                                                                <option value="671">Nalkheda
                                            </option>
                                                                                <option value="672">Namli
                                            </option>
                                                                                <option value="673">Narayangarh
                                            </option>
                                                                                <option value="674">Narsimhapur
                                            </option>
                                                                                <option value="675">Narsingarh
                                            </option>
                                                                                <option value="676">Narsinghpur
                                            </option>
                                                                                <option value="677">Narwar
                                            </option>
                                                                                <option value="678">Nasrullaganj
                                            </option>
                                                                                <option value="679">Naudhia
                                            </option>
                                                                                <option value="680">Naugaon
                                            </option>
                                                                                <option value="681">Naurozabad
                                            </option>
                                                                                <option value="682">Neemuch
                                            </option>
                                                                                <option value="683">Nepa Nagar
                                            </option>
                                                                                <option value="684">Neuton Chikhli Kalan
                                            </option>
                                                                                <option value="685">Nimach
                                            </option>
                                                                                <option value="686">Niwari
                                            </option>
                                                                                <option value="687">Obedullaganj
                                            </option>
                                                                                <option value="688">Omkareshwar
                                            </option>
                                                                                <option value="689">Orachha
                                            </option>
                                                                                <option value="690">Ordinance Factory Itarsi
                                            </option>
                                                                                <option value="691">Pachmarhi
                                            </option>
                                                                                <option value="692">Pachmarhi Cantonment
                                            </option>
                                                                                <option value="693">Pachore
                                            </option>
                                                                                <option value="694">Palchorai
                                            </option>
                                                                                <option value="695">Palda
                                            </option>
                                                                                <option value="696">Palera
                                            </option>
                                                                                <option value="697">Pali
                                            </option>
                                                                                <option value="698">Panagar
                                            </option>
                                                                                <option value="699">Panara
                                            </option>
                                                                                <option value="700">Pandaria
                                            </option>
                                                                                <option value="701">Pandhana
                                            </option>
                                                                                <option value="702">Pandhurna
                                            </option>
                                                                                <option value="703">Panna
                                            </option>
                                                                                <option value="704">Pansemal
                                            </option>
                                                                                <option value="705">Parasia
                                            </option>
                                                                                <option value="706">Pasan
                                            </option>
                                                                                <option value="707">Patan
                                            </option>
                                                                                <option value="708">Patharia
                                            </option>
                                                                                <option value="709">Pawai
                                            </option>
                                                                                <option value="710">Petlawad
                                            </option>
                                                                                <option value="711">Phuph Kalan
                                            </option>
                                                                                <option value="712">Pichhore
                                            </option>
                                                                                <option value="713">Pipariya
                                            </option>
                                                                                <option value="714">Pipliya Mandi
                                            </option>
                                                                                <option value="715">Piploda
                                            </option>
                                                                                <option value="716">Pithampur
                                            </option>
                                                                                <option value="717">Polay Kalan
                                            </option>
                                                                                <option value="718">Porsa
                                            </option>
                                                                                <option value="719">Prithvipur
                                            </option>
                                                                                <option value="720">Raghogarh
                                            </option>
                                                                                <option value="721">Rahatgarh
                                            </option>
                                                                                <option value="722">Raisen
                                            </option>
                                                                                <option value="723">Rajakhedi
                                            </option>
                                                                                <option value="724">Rajgarh
                                            </option>
                                                                                <option value="725">Rajnagar
                                            </option>
                                                                                <option value="726">Rajpur
                                            </option>
                                                                                <option value="727">Rampur Baghelan
                                            </option>
                                                                                <option value="728">Rampur Naikin
                                            </option>
                                                                                <option value="729">Rampura
                                            </option>
                                                                                <option value="730">Ranapur
                                            </option>
                                                                                <option value="731">Ranipura
                                            </option>
                                                                                <option value="732">Ratangarh
                                            </option>
                                                                                <option value="733">Ratlam
                                            </option>
                                                                                <option value="734">Ratlam Kasba
                                            </option>
                                                                                <option value="735">Rau
                                            </option>
                                                                                <option value="736">Rehli
                                            </option>
                                                                                <option value="737">Rehti
                                            </option>
                                                                                <option value="738">Rewa
                                            </option>
                                                                                <option value="739">Sabalgarh
                                            </option>
                                                                                <option value="740">Sagar
                                            </option>
                                                                                <option value="741">Sagar Cantonment
                                            </option>
                                                                                <option value="742">Sailana
                                            </option>
                                                                                <option value="743">Sanawad
                                            </option>
                                                                                <option value="744">Sanchi
                                            </option>
                                                                                <option value="745">Sanwer
                                            </option>
                                                                                <option value="746">Sarangpur
                                            </option>
                                                                                <option value="747">Sardarpur
                                            </option>
                                                                                <option value="748">Sarni
                                            </option>
                                                                                <option value="749">Satai
                                            </option>
                                                                                <option value="750">Satna
                                            </option>
                                                                                <option value="751">Satwas
                                            </option>
                                                                                <option value="752">Sausar
                                            </option>
                                                                                <option value="753">Sehore
                                            </option>
                                                                                <option value="754">Semaria
                                            </option>
                                                                                <option value="755">Sendhwa
                                            </option>
                                                                                <option value="756">Seondha
                                            </option>
                                                                                <option value="757">Seoni
                                            </option>
                                                                                <option value="758">Seoni Malwa
                                            </option>
                                                                                <option value="759">Sethia
                                            </option>
                                                                                <option value="760">Shahdol
                                            </option>
                                                                                <option value="761">Shahgarh
                                            </option>
                                                                                <option value="762">Shahpur
                                            </option>
                                                                                <option value="763">Shahpura
                                            </option>
                                                                                <option value="764">Shajapur
                                            </option>
                                                                                <option value="765">Shamgarh
                                            </option>
                                                                                <option value="766">Sheopur
                                            </option>
                                                                                <option value="767">Shivpuri
                                            </option>
                                                                                <option value="768">Shujalpur
                                            </option>
                                                                                <option value="769">Sidhi
                                            </option>
                                                                                <option value="770">Sihora
                                            </option>
                                                                                <option value="771">Singolo
                                            </option>
                                                                                <option value="772">Singrauli
                                            </option>
                                                                                <option value="773">Sinhasa
                                            </option>
                                                                                <option value="774">Sirgora
                                            </option>
                                                                                <option value="775">Sirmaur
                                            </option>
                                                                                <option value="776">Sironj
                                            </option>
                                                                                <option value="777">Sitamau
                                            </option>
                                                                                <option value="778">Sohagpur
                                            </option>
                                                                                <option value="779">Sonkatch
                                            </option>
                                                                                <option value="780">Soyatkalan
                                            </option>
                                                                                <option value="781">Suhagi
                                            </option>
                                                                                <option value="782">Sultanpur
                                            </option>
                                                                                <option value="783">Susner
                                            </option>
                                                                                <option value="784">Suthaliya
                                            </option>
                                                                                <option value="785">Tal
                                            </option>
                                                                                <option value="786">Talen
                                            </option>
                                                                                <option value="787">Tarana
                                            </option>
                                                                                <option value="788">Taricharkalan
                                            </option>
                                                                                <option value="789">Tekanpur
                                            </option>
                                                                                <option value="790">Tendukheda
                                            </option>
                                                                                <option value="791">Teonthar
                                            </option>
                                                                                <option value="792">Thandia
                                            </option>
                                                                                <option value="793">Tikamgarh
                                            </option>
                                                                                <option value="794">Timarni
                                            </option>
                                                                                <option value="795">Tirodi
                                            </option>
                                                                                <option value="796">Udaipura
                                            </option>
                                                                                <option value="797">Ujjain
                                            </option>
                                                                                <option value="798">Ukwa
                                            </option>
                                                                                <option value="799">Umaria
                                            </option>
                                                                                <option value="800">Unchahara
                                            </option>
                                                                                <option value="801">Unhel
                                            </option>
                                                                                <option value="802">Vehicle Factory Jabalpur
                                            </option>
                                                                                <option value="803">Vidisha
                                            </option>
                                                                                <option value="804">Vijayraghavgarh
                                            </option>
                                                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 298px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-grand-container"><span class="select2-selection__rendered" id="select2-grand-container" role="textbox" aria-readonly="true" title=" 
                                            SelectanOption
                                        "> 
                                            SelectanOption
                                        </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bio">Author Bio</label>
                                <div id="mceu_11" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_11-body" class="mce-container-body mce-stack-layout"><div id="mceu_12" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_12-body" class="mce-container-body"><div id="mceu_13" class="mce-container mce-menubar mce-toolbar mce-first" role="menubar" style="border-width: 0px 0px 1px;"><div id="mceu_13-body" class="mce-container-body mce-flow-layout"><div id="mceu_14" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_14" role="menuitem" aria-haspopup="true"><button id="mceu_14-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">File</span> <i class="mce-caret"></i></button></div><div id="mceu_15" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_15" role="menuitem" aria-haspopup="true"><button id="mceu_15-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Edit</span> <i class="mce-caret"></i></button></div><div id="mceu_16" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_16" role="menuitem" aria-haspopup="true"><button id="mceu_16-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">View</span> <i class="mce-caret"></i></button></div><div id="mceu_17" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_17" role="menuitem" aria-haspopup="true"><button id="mceu_17-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Format</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_18" class="mce-toolbar-grp mce-container mce-panel mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_18-body" class="mce-container-body mce-stack-layout"><div id="mceu_19" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_19-body" class="mce-container-body mce-flow-layout"><div id="mceu_20" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_20-body"><div id="mceu_0" class="mce-widget mce-btn mce-first mce-disabled" tabindex="-1" role="button" aria-label="Undo" aria-disabled="true"><button id="mceu_0-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-undo"></i></button></div><div id="mceu_1" class="mce-widget mce-btn mce-last mce-disabled" tabindex="-1" role="button" aria-label="Redo" aria-disabled="true"><button id="mceu_1-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-redo"></i></button></div></div></div><div id="mceu_21" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_21-body"><div id="mceu_2" class="mce-widget mce-btn mce-menubtn mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_2" role="button" aria-haspopup="true"><button id="mceu_2-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Formats</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_22" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_22-body"><div id="mceu_3" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_3-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_4" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_4-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div></div></div><div id="mceu_23" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_23-body"><div id="mceu_5" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Align left"><button id="mceu_5-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_6" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align center"><button id="mceu_6-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_7" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align right"><button id="mceu_7-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_8" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Justify"><button id="mceu_8-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_24" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_24-body"><div id="mceu_9" class="mce-widget mce-btn mce-first" tabindex="-1" role="button" aria-label="Decrease indent"><button id="mceu_9-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div><div id="mceu_10" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Increase indent"><button id="mceu_10-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div></div></div><div id="mceu_25" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_25-body"></div></div></div></div></div></div></div></div><div id="mceu_26" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="detail_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 100px; display: block;"></iframe></div><div id="mceu_27" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_27-body" class="mce-container-body mce-flow-layout"><div id="mceu_28" class="mce-path mce-flow-layout-item mce-first"><div class="mce-path-item">&nbsp;</div></div><div id="mceu_29" class="mce-flow-layout-item mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div><span id="mceu_30" class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last"> Powered by <a href="https://www.tiny.cloud/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce" rel="noopener" target="_blank" role="presentation" tabindex="-1">Tiny</a></span></div></div></div></div><textarea id="detail" name="detail" class="form-control" placeholder="Enter your details" value="" aria-hidden="true" style="display: none;"></textarea>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg-12">
                                <div class="update-password">
                                    <label for="box1">Update Password:</label>
                                    <input type="checkbox" name="update_pass" id="myCheck" onclick="myFunction()">
                                </div>
                                </div>
                            </div>
                            <div class="password display-none" id="update-password">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="confirmpassword">Password:</label>
                                            <input name="password" class="form-control" id="password" type="password" placeholder="Enter Password" onkeyup="check();">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" onkeyup="check();"> 
                                            <span id="message" style="color: rgb(255, 0, 0);">Password Do Not Match</span>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="social-profile-block">
                            <div class="social-profile-heading">Social Profile</div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="social-block">
                                        <div class="form-group">
                                            <label for="facebook">Facebook Url</label><br>
                                            <div class="row">
                                                <div class="col-lg-2 col-2">
                                                    <div class="profile-update-icon">
                                                        <div class="product-update-social-icons"><a href="" target="_blank" title="facebook"><i class="fa fa-facebook facebook"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-10">
                                                    <input type="text" name="fb_url" value="" id="facebook" class="form-control" placeholder="Facebook.com">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="social-block">
                                        <div class="form-group">
                                            <label for="behance2">Youtube Url</label><br>
                                            <div class="row">
                                                <div class="col-lg-2 col-2">
                                                    <div class="profile-update-icon">
                                                        <div class="product-update-social-icons">
                                                            <a href="" target="_blank" title="googleplus"><i class="fab fa-youtube youtube"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-10">
                                                    <input type="text" name="youtube_url" value="" id="behance2" class="form-control" placeholder="youtube.com">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="social-block">
                                        <div class="form-group">
                                            <label for="twitter">Twitter Url</label><br>
                                            <div class="row">
                                                <div class="col-lg-2 col-2">
                                                    <div class="profile-update-icon">
                                                        <div class="product-update-social-icons"><a href="" target="_blank" title="twitter"><i class="fab fa-twitter twitter"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-10">
                                                    <input type="text" name="twitter_url" value="" id="twitter" class="form-control" placeholder="Twitter.com">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="social-block">
                                        <div class="form-group">
                                            <label for="dribbble2">Linked In Url</label><br>
                                            <div class="row">
                                                <div class="col-lg-2 col-2">
                                                    <div class="profile-update-icon">
                                                        <div class="product-update-social-icons"><a href="" target="_blank" title="linkedin"><i class="fab fa-linkedin-in linkedin"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-10">
                                                    <input type="text" name="linkedin_url" value="" id="dribbble2" class="form-control" placeholder="Linkedin.com/">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="upload-items text-right">
                            <button type="submit" class="btn btn-primary" title="upload items">Update Profile</button>
                        </div>
                        
                    </div>
                </div>

            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web-views.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/user/edit-profile.blade.php ENDPATH**/ ?>