
<!--Menu Start-->
 <div id="strickymenu" class="menu-area backdrop-filter backdrop-blur-lg">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="logo flex">
                    <a href="http://127.0.0.1:8000"><img src="{{ URL::asset('frontend/img/logo.png') }}" alt="Bintan Inti Industrial Estate "></a>
                </div>
            </div>
            <div class="col-md-9 col-6">
                <div class="main-menu">
                    <ul class="nav-menu">
                            <li class="active-nav" style="color: #f1634c;"><a href="http://127.0.0.1:8000">Home</a></li>
                            <li><a href="http://127.0.0.1:8000/about-us">About Us</a></li>
                            
                            @foreach ($shareData as $kategori )
                            <li class="menu-item-has-children">
                                <a href="javascript:void;">{{ $kategori->name }}</a>
                                <ul class="sub-menu">
                                    @foreach ($kategori->subKategori as $subKategori)
                                        <li><a href="#">{{ $subKategori->name }}</a> </li>
                                    @endforeach
                                </ul>
                            </li>

                            @endforeach
                            <li><a href="http://127.0.0.1:8000/contact-us">Contact Us</a></li>
                            <li><a href="http://127.0.0.1:8000/contact-us">FAQs</a></li>
                            <!-- <li class="special-button"><a href="" data-toggle="modal" data-target="#appointment_modal">Appointment</a></li> -->

                    </ul>
                </div>

                <!--Mobile Menu Icon Start-->
                <div class="mobile-menuicon">
                    <span class="menu-bar" onclick="openNav()"><i class="fas fa-bars" aria-hidden="true"></i></span>
                </div>
                <!--Mobile Menu Icon End-->
            </div>
        </div>
    </div>
</div>
    <!--Mobile Menu Start-->
<div class="mobile-menu">
    <div id="mySidenav" class="sidenav">
        <a href="http://127.0.0.1:8000"><img src="http://127.0.0.1:8000/uploads/website-images/logo-2022-02-26-05-05-32-5706.png" alt=""></a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <ul>
                            <li><a href="http://127.0.0.1:8000">Home</a></li>
                                            <li><a href="http://127.0.0.1:8000/about-us">About Us</a></li>
                            <li class="menu-child"><span>Pages</span>
                <ul>
                                                                    <li><a href="http://127.0.0.1:8000/department">Departments</a></li>
                                                                    <li><a href="http://127.0.0.1:8000/service">Services</a></li>
                                                                    <li><a href="http://127.0.0.1:8000/testimonial">Testimonials</a></li>
                                                                                                    <li><a href="http://127.0.0.1:8000/custom-page/custom-page-1">Custom Page 1</a></li>
                                                    <li><a href="http://127.0.0.1:8000/custom-page/custom-page-2">Custom Page 2</a></li>
                                                                    </ul>
            </li>
                                        <li><a href="http://127.0.0.1:8000/faq">FAQ</a></li>
                                                                    <li><a href="http://127.0.0.1:8000/blog">Blog</a></li>
                                                                    <li><a href="http://127.0.0.1:8000/contact-us">Contact Us</a></li>
                                    <li class="special-button"><a href="" data-toggle="modal" data-target="#appointment_modal1">Appointment</a></li>
             <!-- Modal -->
             <div class="modal fade" id="appointment_modal1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body book-appointment">

                            <form action="http://127.0.0.1:8000/create-appointment" method="POST">
                                <input type="hidden" name="_token" value="LPVRizSycft6UNmgZCqaCVMhJ5rO09jjNwQAiNK8">                                    <div class="form-group">
                                    <label for="">Select Department</label>
                                    <select name="department_id" onchange="loadMobileModalDoctor()" class="form-control modal-department-id mySelect2Item">
                                        <option value="">Select Department</option>
                                                                                    <option value="1">Civil Rights Law</option>
                                                                                    <option value="2">Entertainment Law</option>
                                                                                    <option value="3">Health Law</option>
                                                                                    <option value="4">Immigration Law</option>
                                                                                    <option value="5">International Law</option>
                                                                                    <option value="6">Military Law</option>
                                        
                                    </select>
                                </div>

                                <div class="form-group d-none" id="mobile-modal-doctor-box">
                                    <label for="">Select Lawyer</label>
                                    <select name="" class="form-control modal-lawyer-id mySelect2Item" onchange="loadModalDate()" >
                                        <option value="">Select Lawyer</option>
                                    </select>
                                </div>
                                <div class="form-group d-none" id="mobile-modal-date-box">
                                    <label for="">Select Date</label>
                                    <input type="text" name="date" class="form-control datepicker" id="mobile-modal-datepicker-value">
                                    <input type="hidden" name="lawyer_id" value="" id="mobile_modal_lawyer_id">
                                </div>

                                <div class="form-group d-none" id="mobile-modal-schedule-box">
                                    <label for="">Select Schedule</label>
                                    <select name="schedule_id" class="form-control" id="available-mobile-modal-schedule">

                                    </select>
                                </div>
                                <div id="mobile-modal-schedule-error" class="d-none"></div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <input type="submit" value="Submit" class="btn btn-primary" id="mobile-modal-sub" disabled>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- // Modal -->



        </ul>

    </div>
</div>
<!--Mobile Menu End-->

<!--Menu End-->