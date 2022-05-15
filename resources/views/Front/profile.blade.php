<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assists/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Edir Profile</title>
    </head>
    <body>
        <header>
            @include('Front.header')
        </header>
        <div class="container">
        </div>
        <div class="container my-4">
            <ul class="nav nav-pills mb-3 justify-content-center pb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Edit Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">My Courses</button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Certificates</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane my-5 fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h2 class="mb-5 title-text">Edit Profile</h2>
                    <div class="main-cont">
                        <form class="row g-3 p-4" action="update.php" method="post">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="firstName" id="firstname" placeholder="name@example.com" value="<?php echo $_SESSION['firstName']?>" required>
                                        <label for="firstname">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="lastName" id="lastname" placeholder="name@example.com" value="<?php echo $_SESSION['lastName']?>" required>
                                        <label for="lastname">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo $_SESSION['email']?>" required disabled>
                                    <label for="email">Email address</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="address" id="Address" placeholder="name@example.com" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address']?>">
                                    <label for="Address">Address</label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="city" id="City" placeholder="name@example.com" value="<?php if(isset($_SESSION['city'])){ echo $_SESSION['city'];} else{ echo'';}?>">
                                    <label for="City">City</label>
                                </div>
                            </div>
                            <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h2 class="title-text">Enrolled Courses</h2>
                    <div class="row row-cols-1  row-cols-md-3">
                        <div class="col my-4">
                            <div class="card card-style border-primary">
                                <img src="../instructorImgs/courses/<?php echo $row['img']?>" height="200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['courseName']?></h5>
                                    <p class="card-text"><?php echo $row['shortDesc']?></p>
                                    <a href="../cousres/index.php?id=<?php echo $row['id']?>" class="btn btn-primary" target="_blanck">Go To The Course</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted"><?php echo $row['date']?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h2 class="title-text">Certificates</h2>
                    <div class="row row-cols-1 row-cols-md-3">
                        <div class="col my-4">
                            <div class="card card-style border-primary">
                                <img src="../certificate/<?php echo $row['credintialId']; ?>.jpg" height="200" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $rouw['courseName'];?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-arrow-up"></i></a>
        <script src="pre.js"></script>
        <script src="../assists/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>