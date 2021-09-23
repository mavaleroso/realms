<?php
require($_SERVER['DOCUMENT_ROOT'] . '/config/session.php');
require($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
$sess->check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title><?php echo APP_NAME ?> | Dashboard</title>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/assets/CSS.php') ?>
    <link rel="stylesheet" type="text/css" href="/assets/custom/css/teacher.css">
    <input type="hidden" id="base_url" value="<?php echo BASE_URL ?>">
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <?php require($_SERVER['DOCUMENT_ROOT'] . '/layouts/modules/teacher/components/header.php') ?>
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/layouts/modules/teacher/components/sidebar.php') ?>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                                    <!-- <li class="breadcrumb-item">Pages</li>
                                    <li class="breadcrumb-item active">Sample Page</li> -->
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div id="dashboard" class="container-fluid">
                    <div class="email-wrap bookmark-wrap">
                        <div class="row">
                            <div class="col-xl-9 col-md-12 box-col-12">
                                <div class="bookmark-tabcontent">
                                    <div class="card email-body radius-left">
                                        <div class="ps-0">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                                    <div class="card mb-0 published">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Published Courses</h6>
                                                            <ul>
                                                                <li><a class="grid-published-view grid-bookmark-view" href="javascript:void(0)"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-published-view list-layout-view" href="javascript:void(0)"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body pb-0">
                                                            <div class="details-bookmark published text-center">
                                                                <div class="row" id="bookmarkData">
                                                                    <?php
                                                                    $query = "SELECT * FROM tbl_courses WHERE status=1";
                                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                    if ($result->num_rows) {
                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                            echo '<div class="col-xl-3 col-md-3">' .
                                                                                '<div class="card card-with-border bookmark-card o-hidden">' .
                                                                                '<div class="details-website"><img class="img-fluid" src="' . BASE_URL . '/storage/modules/' . $row['image'] . '" alt="">' .
                                                                                '<div class="favourite-icon favourite_0 w-0 "><button class="btn-transparent text-white" onclick="change_status(' . $row['id'] . ', 0)">unpublish</button></div> ' .
                                                                                '<div class="desciption-data">' .
                                                                                '<div class="title-bookmark"> ' .
                                                                                '<h6 class="title_0">' . $row['name'] . '</h6>' .
                                                                                '<p class="weburl_0">' . $row['description'] . '</p>' .
                                                                                '<div class="hover-block">' .
                                                                                '<ul> ' .
                                                                                '<li><a href="" onclick="editBookmark(0)" data-bs-toggle="modal" data-bs-target="#edit-bookmark"><i data-feather="edit-2"></i></a></li>' .
                                                                                '<li><a href="#"><i data-feather="link"></i></a></li> ' .
                                                                                '<li><a href="#"><i data-feather="share-2"></i></a></li>' .
                                                                                '<li><a href="#"><i data-feather="trash-2"></i></a></li> ' .
                                                                                '<li class="pull-right text-end"><a href="#"><i data-feather="tag"></i></a></li>' .
                                                                                '</ul> ' .
                                                                                '</div>' .
                                                                                '<div class="content-general"> ' .
                                                                                '<p class="desc_0"> is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</p><span class="collection_0">General</span>' .
                                                                                '</div> ' .
                                                                                '</div>' .
                                                                                '</div> ' .
                                                                                '</div>' .
                                                                                '</div>' .
                                                                                '</div>';
                                                                        }
                                                                    } else {
                                                                        echo '<div class="col-sm-12 alert alert-light dark alert-dismissible fade show" role="alert">' .
                                                                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>' .
                                                                            '<p>No published course.</p>' .
                                                                            '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>' .
                                                                            '</div>';
                                                                    }

                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-favourites" role="tabpanel" aria-labelledby="pills-favourites-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Favourites</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center">
                                                                <div class="row" id="favouriteData"></div>
                                                                <div class="no-favourite"><span>No Bookmarks Found.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-shared" role="tabpanel" aria-labelledby="pills-shared-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Shared with me</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-bookmark" role="tabpanel" aria-labelledby="pills-bookmark-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">My bookmark</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center">
                                                                <div class="row" id="bookmarkData1">
                                                                    <div class="col-xl-3 col-md-4 xl-50">
                                                                        <div class="card card-with-border bookmark-card o-hidden">
                                                                            <div class="details-website"><img class="img-fluid" src="<?php echo BASE_URL ?>/assets/cuba/assets/images/lightgallry/07.jpg" alt="">
                                                                                <div class="favourite-icon favourite_0" onclick="setFavourite(0)"><a href="#"><i class="fa fa-star"></i></a></div>
                                                                                <div class="desciption-data">
                                                                                    <div class="title-bookmark">
                                                                                        <h6 class="title_0">Admin Template</h6>
                                                                                        <p class="weburl_0">http://admin.pixelstrap.com/Cuba/ltr/landing-page.html</p>
                                                                                        <div class="hover-block">
                                                                                            <ul>
                                                                                                <li><a href="" onclick="editBookmark(0)" data-bs-toggle="modal" data-bs-target="#edit-bookmark"><i data-feather="edit-2"></i></a></li>
                                                                                                <li><a href="#"><i data-feather="link"></i></a></li>
                                                                                                <li><a href="#"><i data-feather="share-2"></i></a></li>
                                                                                                <li><a href="#"><i data-feather="trash-2"></i></a></li>
                                                                                                <li class="pull-right text-end"><a href="#"><i data-feather="tag"></i></a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="content-general">
                                                                                            <p class="desc_0">Cuba is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</p><span class="collection_0">General</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">notification</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-newsletter" role="tabpanel" aria-labelledby="pills-newsletter-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Newsletter</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-business" role="tabpanel" aria-labelledby="pills-business-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Business</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-holidays" role="tabpanel" aria-labelledby="pills-holidays-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Holidays</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-important" role="tabpanel" aria-labelledby="pills-important-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Important</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-orgenization" role="tabpanel" aria-labelledby="pills-orgenization-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Orgenization</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade modal-bookmark" id="edit-bookmark" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Bookmark</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-bookmark needs-validation" novalidate="">
                                                                    <div class="row g-2">
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Web Url</label>
                                                                            <input class="form-control" id="editurl" type="text" required="" autocomplete="off" value="http://admin.pixelstrap.com/Cuba/ltr/landing-page.html">
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Title</label>
                                                                            <input class="form-control" id="edittitle" type="text" required="" autocomplete="off" value="Admin Template">
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Description</label>
                                                                            <textarea class="form-control" id="editdesc" required="" autocomplete="off">Cuba is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</textarea>
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-6">
                                                                            <label>Group</label>
                                                                            <select class="js-example-basic-single">
                                                                                <option value="AL">My Bookmarks</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-6">
                                                                            <label>Collection</label>
                                                                            <select class="js-example-disabled-results">
                                                                                <option value="general">General</option>
                                                                                <option value="fs">fs</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-secondary" type="button">Save</button>
                                                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade modal-bookmark" id="createtag" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Create Tag</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-bookmark needs-validation" novalidate="">
                                                                    <div class="row g-2">
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Tag Name</label>
                                                                            <input class="form-control" type="text" required="" autocomplete="off">
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Tag color</label>
                                                                            <input class="form-color d-block" type="color" value="#563d7c">
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-secondary" type="button">Save</button>
                                                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card email-body radius-left">
                                        <div class="ps-0">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                                    <div class="card mb-0 unpublished">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Unpublished Courses</h6>
                                                            <ul>
                                                                <li><a class="grid-unpublished-view grid-bookmark-view" href="javascript:void(0)"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-unpublished-view list-layout-view" href="javascript:void(0)"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body pb-0">
                                                            <div class="details-bookmark unpublished text-center">
                                                                <div class="row" id="bookmarkData">
                                                                    <?php
                                                                    $query = "SELECT * FROM tbl_courses WHERE status=0";
                                                                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                                                                    if ($result->num_rows) {
                                                                        while ($row = mysqli_fetch_array($result)) {
                                                                            echo '<div class="col-xl-3 col-md-3">' .
                                                                                '<div class="card card-with-border bookmark-card o-hidden">' .
                                                                                '<div class="details-website"><img class="img-fluid" src="' . BASE_URL . '/storage/modules/' . $row['image'] . '" alt="">' .
                                                                                '<div class="favourite-icon favourite_0 w-0 "><button class="btn-transparent text-white" onclick="change_status(' . $row['id'] . ', 1)">Publish</button></div> ' .
                                                                                '<div class="desciption-data">' .
                                                                                '<div class="title-bookmark"> ' .
                                                                                '<h6 class="title_0">' . $row['name'] . ' <span class="label label-primary p-2"> ' . $row['code'] . ' </span></h6>' .
                                                                                '<p class="weburl_0">' . $row['description'] . '</p>' .
                                                                                '<div class="hover-block">' .
                                                                                '<ul> ' .
                                                                                '<li><a href="" onclick="editBookmark(0)" data-bs-toggle="modal" data-bs-target="#edit-bookmark"><i data-feather="edit-2"></i></a></li>' .
                                                                                '<li><a href="#"><i data-feather="link"></i></a></li> ' .
                                                                                '<li><a href="#"><i data-feather="share-2"></i></a></li>' .
                                                                                '<li><a href="#"><i data-feather="trash-2"></i></a></li> ' .
                                                                                '<li class="pull-right text-end"><a href="#"><i data-feather="tag"></i></a></li>' .
                                                                                '</ul> ' .
                                                                                '</div>' .
                                                                                '<div class="content-general"> ' .
                                                                                '<p class="desc_0"> is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</p><span class="collection_0">General</span>' .
                                                                                '</div> ' .
                                                                                '</div>' .
                                                                                '</div> ' .
                                                                                '</div>' .
                                                                                '</div>' .
                                                                                '</div>';
                                                                        }
                                                                    } else {
                                                                        echo '<div class="col-sm-12 alert alert-light dark alert-dismissible fade show" role="alert">' .
                                                                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>' .
                                                                            '<p>No unpublished course.</p>' .
                                                                            '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>' .
                                                                            '</div>';
                                                                    }

                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-favourites" role="tabpanel" aria-labelledby="pills-favourites-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Favourites</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center">
                                                                <div class="row" id="favouriteData"></div>
                                                                <div class="no-favourite"><span>No Bookmarks Found.</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-shared" role="tabpanel" aria-labelledby="pills-shared-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Shared with me</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-bookmark" role="tabpanel" aria-labelledby="pills-bookmark-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">My bookmark</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center">
                                                                <div class="row" id="bookmarkData1">
                                                                    <div class="col-xl-3 col-md-4 xl-50">
                                                                        <div class="card card-with-border bookmark-card o-hidden">
                                                                            <div class="details-website"><img class="img-fluid" src="<?php echo BASE_URL ?>/assets/cuba/assets/images/lightgallry/07.jpg" alt="">
                                                                                <div class="favourite-icon favourite_0" onclick="setFavourite(0)"><a href="#"><i class="fa fa-star"></i></a></div>
                                                                                <div class="desciption-data">
                                                                                    <div class="title-bookmark">
                                                                                        <h6 class="title_0">Admin Template</h6>
                                                                                        <p class="weburl_0">http://admin.pixelstrap.com/Cuba/ltr/landing-page.html</p>
                                                                                        <div class="hover-block">
                                                                                            <ul>
                                                                                                <li><a href="" onclick="editBookmark(0)" data-bs-toggle="modal" data-bs-target="#edit-bookmark"><i data-feather="edit-2"></i></a></li>
                                                                                                <li><a href="#"><i data-feather="link"></i></a></li>
                                                                                                <li><a href="#"><i data-feather="share-2"></i></a></li>
                                                                                                <li><a href="#"><i data-feather="trash-2"></i></a></li>
                                                                                                <li class="pull-right text-end"><a href="#"><i data-feather="tag"></i></a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                        <div class="content-general">
                                                                                            <p class="desc_0">Cuba is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</p><span class="collection_0">General</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">notification</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-newsletter" role="tabpanel" aria-labelledby="pills-newsletter-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Newsletter</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-business" role="tabpanel" aria-labelledby="pills-business-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Business</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-holidays" role="tabpanel" aria-labelledby="pills-holidays-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Holidays</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-important" role="tabpanel" aria-labelledby="pills-important-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Important</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fade tab-pane" id="pills-orgenization" role="tabpanel" aria-labelledby="pills-orgenization-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex">
                                                            <h6 class="mb-0">Orgenization</h6>
                                                            <ul>
                                                                <li><a class="grid-bookmark-view" href="#"><i data-feather="grid"></i></a></li>
                                                                <li><a class="list-layout-view" href="#"><i data-feather="list"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="details-bookmark text-center"><span>No Bookmarks Found.</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade modal-bookmark" id="edit-bookmark" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Bookmark</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-bookmark needs-validation" novalidate="">
                                                                    <div class="row g-2">
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Web Url</label>
                                                                            <input class="form-control" id="editurl" type="text" required="" autocomplete="off" value="http://admin.pixelstrap.com/Cuba/ltr/landing-page.html">
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Title</label>
                                                                            <input class="form-control" id="edittitle" type="text" required="" autocomplete="off" value="Admin Template">
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Description</label>
                                                                            <textarea class="form-control" id="editdesc" required="" autocomplete="off">Cuba is beautifully crafted, clean and modern designed admin theme with 6 different demos and light - dark versions.</textarea>
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-6">
                                                                            <label>Group</label>
                                                                            <select class="js-example-basic-single">
                                                                                <option value="AL">My Bookmarks</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-6">
                                                                            <label>Collection</label>
                                                                            <select class="js-example-disabled-results">
                                                                                <option value="general">General</option>
                                                                                <option value="fs">fs</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-secondary" type="button">Save</button>
                                                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade modal-bookmark" id="createtag" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Create Tag</h5>
                                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-bookmark needs-validation" novalidate="">
                                                                    <div class="row g-2">
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Tag Name</label>
                                                                            <input class="form-control" type="text" required="" autocomplete="off">
                                                                        </div>
                                                                        <div class="mb-3 mt-0 col-md-12">
                                                                            <label>Tag color</label>
                                                                            <input class="form-color d-block" type="color" value="#563d7c">
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-secondary" type="button">Save</button>
                                                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 box-col-6">
                                <div class="email-left-aside">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="email-app-sidebar left-bookmark">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h6 class="f-w-600">Actions</h6>
                                                    </div>
                                                </div>
                                                <ul class="nav main-menu" role="tablist">
                                                    <li class="nav-item">
                                                        <button class="badge-light-primary btn-block btn-mail w-100" type="button" data-bs-toggle="modal" data-bs-target="#courseModal"><i class="me-2" data-feather="plus"></i> Start a New Course</button>
                                                        <div class="modal fade modal-bookmark" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Start a New Course</h5>
                                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-bookmark needs-validation" id="course-form" novalidate="" method="post" enctype="multipart/form-data">
                                                                            <div class="row g-2">
                                                                                <div class="mb-3 mt-0 col-md-12">
                                                                                    <label for="bm-courseImg">Course Image</label>
                                                                                    <input class="form-control" id="bm-courseImg" type="file" name="image" required accept="image/png, image/jpeg">
                                                                                </div>
                                                                                <div class="mb-3 mt-0 col-md-12">
                                                                                    <label for="bm-courseName">Course Name</label>
                                                                                    <input class="form-control" id="bm-courseName" name="courseName" type="text" required autocomplete="off">
                                                                                </div>
                                                                                <div class="mb-3 mt-0 col-md-12">
                                                                                    <label>Description</label>
                                                                                    <textarea class="form-control" id="bm-desc" name="courseDesc" required autocomplete="off"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <input id="index_var" type="hidden" value="6">
                                                                            <button class="btn btn-primary" type="submit" id="Bookmark">Create course</button>
                                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="nav-item"><span class="main-title"> Views</span></li>
                                                    <li><a id="pills-created-tab" data-bs-toggle="pill" href="#pills-created" role="tab" aria-controls="pills-created" aria-selected="true"><span class="title"> Grades</span></a></li>
                                                    <hr>
                                                    </li>
                                                    <li><span class="main-title"> Tags<span class="pull-right"><a href="#" data-bs-toggle="modal" data-bs-target="#createtag"><i data-feather="plus-circle"></i></a></span></span></li>
                                                    <li><a class="show" id="pills-notification-tab" data-bs-toggle="pill" href="#pills-notification" role="tab" aria-controls="pills-notification" aria-selected="false"><span class="title"> test</span></a></li>
                                                    <!-- <li><a class="show" id="pills-newsletter-tab" data-bs-toggle="pill" href="#pills-newsletter" role="tab" aria-controls="pills-newsletter" aria-selected="false"><span class="title"> Newsletter</span></a></li>
                                                    <li><a class="show" id="pills-business-tab" data-bs-toggle="pill" href="#pills-business" role="tab" aria-controls="pills-business-tab" aria-selected="false"><span class="title"> Business</span></a></li>
                                                    <li><a class="show" id="pills-holidays-tab" data-bs-toggle="pill" href="#pills-holidays" role="tab" aria-controls="pills-holidays-tab" aria-selected="false"><span class="title"> Holidays</span></a></li>
                                                    <li><a class="show" id="pills-important-tab" data-bs-toggle="pill" href="#pills-important" role="tab" aria-controls="pills-important-tab" aria-selected="false"><span class="title"> Important</span></a></li>
                                                    <li><a class="show" id="pills-orgenization-tab" data-bs-toggle="pill" href="#pills-orgenization" role="tab" aria-controls="pills-orgenization-tab" aria-selected="false"><span class="title"> Orgenization</span></a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <?php require($_SERVER['DOCUMENT_ROOT'] . '/layouts/modules/teacher/components/footer.php') ?>
        </div>
    </div>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/assets/JS.php') ?>
    <script src="<?php echo BASE_URL ?>/assets/cuba/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo BASE_URL ?>/assets/custom/js/modules/teacher/dashboard.js"></script>
</body>

</html>