@extends('pages.layouts.app')
@section('content')


    <section class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-outer">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item"><a href="team.html">Doctors</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Randall Clover</li>
                    </ul>
                </nav>
                <h2>Doctor Details</h2>
            </div>
        </div>
    </section>

    <section class="doctor-detail">
        <div class="container">
            <div class="doctor-title">
                <div class="doctor-image">
                    <img src="images/doctordetail.jpg" alt="Image">
                </div>
                <div class="doctor-title-content">
                    <div class="dt-outer">
                        <h2>Randall Cover</h2>
                        <ul>
                            <li><strong>Hospital Name :</strong> Internist, General Practitioner</li>
                            <li><strong>Contact :</strong> Reabilitation</li>
                            <li><strong>Phone :</strong> Since 1988</li>
                            <li><strong>E-mail:</strong> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="24574549454a50410a4756454a41644349454d480a474b49">[email&#160;protected]</a></li>
                            <li><strong>Website :</strong> 507-452-1254</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="doctor-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="content-outer">
                            <div class="intro content-item">
                                <div class="content-title">
                                    <h3>Description</h3>
                                    <span></span>
                                </div>
                                <p>Born in Britain, Samanta was the first women to receive a medical degree in America and the first women to be on the UK medical register. Blackwell helped to break down social barriers, enabling women to be accepted as doctors.PM&R physicians (also known as physiatrists) are trained to use physical modalities (stretching, strengthening, heat, cold, etc.) to mechanically enhance healing. They prescribe medications to manage pain, spasticity, nerve injury, and cognitive impairments, while also leveraging the power of physical therapy to increase cardiopulmonary fitness, muscle strength and flexibility.</p>
                            </div>
                            <div class="qualification content-item">
                                <div class="content-title">
                                    <h3>The Discount rate For Sama HealthSaver Card Holders :</h3>
                                    <span></span>
                                </div>
                                <div class="qf-table">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td>S.N</td>
                                            <td>Qualification</td>
                                            <td>University</td>
                                            <td>Passed Year</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>2</td>
                                            <td>MBBS</td>
                                            <td>King George Medical College</td>
                                            <td>2011</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Doctor of Medicine</td>
                                            <td>University of Texas</td>
                                            <td>2001</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Phaco & Uuea Training </td>
                                            <td>King George Medical College</td>
                                            <td>1997</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="skills content-item">
                                <div class="content-title">
                                    <h3>Skills</h3>
                                    <span></span>
                                </div>
                                <div class="progress-outer">
                                    <div class="progress-item">
                                        <h4>Rehabilitation</h4>
                                        <div class="progress">
                                            <div class="progress-bar color2" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <span>90%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <h4>Surgery</h4>
                                        <div class="progress">
                                            <div class="progress-bar color1" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <span>85%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <h4>Oncology</h4>
                                        <div class="progress">
                                            <div class="progress-bar color3" role="progressbar" style="width: 98%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> <span>98%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="experience content-item">
                                <div class="content-title">
                                    <h3>Work Experience</h3>
                                    <span></span>
                                </div>
                                <ul>
                                    <li>Chief Consultant Gynaecologist, Norvic international Hospital, Thapathali</li>
                                    <li>Associate Professor, MD Obstetrics &Gynaecology, National Academy of Medical Sciences, Bir Hospital, Kathmandu, Nepal, 2003</li>
                                    <li>Honorary Lecturer in Kathmandu Medical College, Sinamangal, Kathmandu 2000</li>
                                    <li>President, Gynaecology Oncology Society of Nepal (GOSON)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="detail-sidebar">
                            <div class="sidebar-box">
                                <div class="sidebar-title">
                                    <h3>Fix Appointment</h3>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label>Name:</label>
                                        <input type="text" placeholder="Sam smiths">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="text" placeholder="abc@xyz.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select>
                                            <option>Choose option</option>
                                            <option>Neurology</option>
                                            <option>Opthalmology</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-btn text-center">
                                            <a class="btn"> Book Appointment</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-ad">
                                <div class="ad-content">
                                    <p>We are available 24/7</p>
                                    <h3>Medical and Health consultant at your service</h3>
                                    <a class="btn"> Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <div class="subscribe-form">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <h3 class="white">Subscribe to newsletter</h3>
                            <p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur exercitationem repellendus.</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <form>
                                <input type="email" placeholder="abc@xyz.com">
                                <a href="#">Subscribe</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
