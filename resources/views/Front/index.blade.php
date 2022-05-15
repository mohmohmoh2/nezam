

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

        <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Cairo:wght@200;300;400;500;600;700;900&family=Dosis:wght@200;300;400;500;600;700;800&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assist/assists/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assist/assists/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assist/fontawesome-free-6.0.0-web/css/all.min.css')}}">

</head>
<body>
        <!-- Header -->
        <header class=" bgg-primary">
            @include('Front/header')
            @foreach ($sett as $s)
            <div class="container header-info flex-md-row justify-content-between">
                <div class="landing-info">
                    <div class="d-flex flex-column co">
                        <h1>{{ $s->mainName }}</h1>
                        <p class="fs-5">{{ $s->aboutUs }}</p>
                    </div>
                    <a href="#courses" class="btn btn btn-success m-3">Our Courses</a>
                </div>
                <img src="{{ asset('assist/assists/img/main2.svg') }}" alt="">
            </div>
            <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
                <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                </defs>
                <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
                </g>
                <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
                </g>
                <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
                </g>
            </svg>
            @endforeach
        </header>
    <main>
        <!-- <section class="courses" id="courses">
            <div class="container flex-row course">
                
                <div class="main-course flex-column">
                    <h2 class="main-tite"> Our Courses </h2>
                    <div class="row row-cols-1 row-cols-md-3 g-4">

                        <div class="col">
                            <div class="card card-st-cour border-primary">
                                <img src="instructorImgs/courses/" class="card-img-top cour-img" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text">
                                        </p>
                                </div>
                                <div class="me-10 text-end">
                                    <div class="card-link">
                                        <a href="cousres/index.php?id=" class="btn btn-primary">Go To The Course</a>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                	<div>
                                	    <i class="fa-regular fa-calendar"></i>
                                        <small class="text-muted">Last updated </small>
                                    </div>
                                    <div>
                                        <i class="fa-solid fa-angles-right me-1"></i>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- ======= Blog Section ======= -->
        <section id="courses" class="blog-mf sect-pt4 route mt-5">
            <div class="container">
                <div class="main-course flex-column">
                    <h2 class="main-tite"> Our Courses </h2>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($courses as $c)
                        <div class="col-md-4">
                            <div class="card card-blog box">
                            <div class="card-img">
                                <a href="{{ url('Courses/'. $c->id)  }}"><img src="{{ asset('uploads/courses/'. $c->img) }}" alt="" class="img-fluid"></a>
                            </div>
                            <div class="card-body">
                                <div class="card-category-box">
                                <div class="card-category">
                                    <h6 class="category">{{ $c->courseLevel }}</h6>
                                </div>
                                </div>
                                <h3 class="card-title"><a href="cousres/index.php?id={{ $c->id }}">{{ $c->courseName }}</a></h3>
                                <p class="card-description">{{ $c->courseDesc }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div class="post-author">
                                    @foreach ($instructors as $i)
                                        @if ($i->id == $c->instructor_id )
                                            <a>
                                                <img src="instructorImgs/instructors/" width="25" alt="" class="avatar rounded-circle">
                                                <span class="author">{{ $i->instructorName }}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="post-date"><div><i class="fa-regular fa-calendar">  </i>  <small class="text-muted"> Last updated : </small></div></div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Section -->

        <!-- About Us Section -->
        <!-- <section class="about-us" id="about-us">
            <div class="container flex-column">
                <h2 class="main-tite">About Us</h2>
                <div class="card mb-3">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assists/img/logo.jpg" class="img-fluid rounded-start" height="250" width="250" alt="...">
                    </div>
                    <div class="col-md-8 flex-column">
                        <div class="card-body flex-column">
                        <h5 class="about-card"></h5>
                        <p class="card-text"></p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Start instructor section -->
        <!-- <section class="instructors" id="instructors">
            <div class="container flex-column">
                <h2 class="main-tite">instructors</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    <div class="col">
                    <div class="card card-style border-primary">
                        <img src="instructorImgs/instructors/" class="card-img-top inct-img" alt="...">
                        <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"></p>
                        </div>
                    </div>
                    </div>
            </div>
        </section> -->
        <!-- End instructor section -->
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container flex-column" data-aos="fade-up">
                <h2 class="main-tite">Instructors</h2>
                <div class="row gy-4 mt-3">
                    @foreach ($instructors as $i)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch border-primary" data-aos="fade-up" data-aos-delay="200">
                            <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('uploads/instructors/'.  $i->instructorImg ) }}" class="img-fluid" alt="">
                                <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $i->instructorName }}</h4>
                                <p>{{ $i->instructorDesc }}</p>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Team Section -->
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-2 col-md-6 border border-primary rounded">
                        <div class="count-box">
                            <i class="fa-solid fa-face-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="14000" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Students</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mt-5 mt-md-0 border border-primary rounded">
                        <div class="count-box">
                            <i class="fa-solid fa-circle-play"></i>
                            <span data-purecounter-start="0" data-purecounter-end="241" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Courses</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mt-5 mt-lg-0 border border-primary rounded">
                        <div class="count-box">
                            <i class="fa-solid fa-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1163" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Certificates</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 mt-5 mt-lg-0 border border-primary rounded">
                        <div class="count-box">
                            <i class="fa-brands fa-medapps"></i>
                            <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Years</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counts Section -->

        <!-- Certificate Section -->
        <section class="certificate pb-0 box">
            <div class="container flex-column">
                <h2 class="main-tite">Get your Certificate</h2>
                <div class="certificate-cont d-flex justify-content-between mb-3">
                    <div class="d-flex tect align-items-center">
                        <p class="fs-4 text-white">After Completing any Course from our courses you will get A certificate From Us For finishing it</p>
                    </div>
                    <div class="imag">
                        <img src="{{ asset('assist/assists/img/cert.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-us pt-1 mt-5" id="contact-us">
            <div class="container flex-column mt-5">
                <h2 class="main-tite mb-0">Contact Us</h2>
                <div class="d-flex justify-content-between flex-md-row-reverse">
                    <div class="d-flex flex-grow-1 align-content-center justify-content-center">
                        <img src="{{ asset('assist/assists/img/contactt.svg') }}" width="300" alt="">
                    </div>
                    <div class="d-flex align-content-center justify-content-center flex-grow-1">
                        <form action="mail.php" method="post" class="d-flex align-content-center justify-content-center flex-column">
                            <div class="d-flex align-content-center justify-content-center">
                                <div class="d-flex flex-column m-3 mx-0 mt-0 align-content-center justify-content-center">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="y-name" name="y-name" placeholder="name@example.com">
                                        <label for="floatingInput">Your Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="y-phone" class="form-control" id="phone" placeholder="Password">
                                        <label for="floatingPassword">Phone Number</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Your Email</label>
                                    </div>
                                </div>
                                <div class="input-group m-3 mt-0 d-flex align-content-center justify-content-center">
                                    <textarea class="form-control" name="y-text" id="contact" placeholder="Write Your Massege Here..."></textarea>
                                </div>
                            </div>
                            <input type="submit" value="Send" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('Front/footer')
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></a>

    <script src="{{asset('assist/assists/js/purecounter.js')}}"></script>
    <script src="{{asset('assist/assists/bootstrap/bootstrap.bundle.min.js')}}" ></script>
    <script src="{{asset('assist/assists/js/main.js')}}"></script>
</body>
</html>