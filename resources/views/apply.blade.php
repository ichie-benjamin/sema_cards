

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sama Bahrain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sama Bahrain Card">
    <meta name="keywords" content="Sama Bahrain Card">
    <meta name="author" content="Sama Bahrain Card">
    <meta name="MobileOptimized" content="320">


    <!--<script src="../applications/samacardbh/view/home/emcan/assets/website.js" type="text/javascript"></script>-->

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="/assets/css/website.css" rel="stylesheet" />


</head>
<body class="dir-ltr">
<div class="top-logo logo m-auto"></div>
<div class="progress progress-page-load">
    <div class="progress-bar bg-Kingfisher-Daisy progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
</div>

<div class="body-bg"></div>
<div class="row d-flex w-100">
    <div class="container">

        <div class="row d-flex w-100">

            <div class="container">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        English                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a href="#" class="dropdown-item text-left" data-lang="ar">عربي</a>
                        <a href="#" class="dropdown-item text-left" data-lang="en">English</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row d-flex w-100"></div>

        <div class="col-sm-12 col-md-12 col-lg-6 p-0 m-auto d-flex text-center">
            <div class="row d-flex w-100 align-self-center primary-links">
                <a href="http://samacardbh.com/downloadpdf" class="col-sm-12 col-md-6 col-lg-6 align-self-center primary-link">Hospitals Directory</a>
                <a class="col-sm-12 col-md-5 col-lg-5 align-self-center primary-link requset-card clicked">Request Card</a>
            </div>
        </div>

        <div class="row d-flex w-100"></div>

        <form method="post" action="" class="col-sm-12 col-sm-8 col-lg-8 m-auto form-data">
            <div class="requset-crad-form">
                <div class="form-group">
                    <div class="col-sm-12 col-sm-offset-2">

                    </div>
                </div>
                <div class="form-group col-12">
                    <input required="" type="text" class="form-control text-left dir-ltr" id="name" name="name" autocomplete="off" placeholder="Name">
                </div>

                <div class="form-group col-12">
                    <select required="" class="custom-select text-left ltr" name="gender" id="gender">
                        <option value="Male" selected="selected">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <input required="" type="text" class="form-control text-left dir-ltr" id="card_id" name="card_id" autocomplete="off" placeholder="CPR No.">
                </div>

                <div class="form-group col-12">
                    <input required="" type="text" class="form-control text-left dir-ltr" id="mobile" name="mobile" autocomplete="off" placeholder="Mobile 1">
                </div>
                <div class="form-group col-12">
                    <input required="" type="text" class="form-control text-left dir-ltr" id="mobile_2" name="mobile_2" autocomplete="off" placeholder="Mobile 2">
                </div>

                <div class="form-group col-12">
                    <input type="text" class="form-control text-left dir-ltr" id="block" name="block" autocomplete="off" placeholder="Block">
                </div>
                <div class="form-group col-12">
                    <input type="text" class="form-control text-left dir-ltr" id="road" name="road" autocomplete="off" placeholder="Road">
                </div>
                <div class="form-group col-12">
                    <input type="text" class="form-control text-left dir-ltr" id="building" name="building" autocomplete="off" placeholder="Building">
                </div>
                <div class="form-group col-12">
                    <input type="text" class="form-control text-left dir-ltr" id="flat" name="flat" autocomplete="off" placeholder="Flat">
                </div>

                <div class="form-group col-12">
                    <input type="text" class="form-control text-left dir-ltr" id="place" name="place" autocomplete="off" placeholder="Place">
                </div>

                <div required="" class="form-group col-12">
                    <input type="email" class="form-control text-left dir-ltr" id="email" name="email" autocomplete="off" placeholder="Email">
                </div>

                <div class="form-group col-12">
                    <textarea class="form-control text-left dir-ltr" name="note" id="note" rows="2" autocomplete="off" placeholder="Notes"></textarea>
                </div>
            </div>


            <div class="add-more">
                <br>
                <hr class="row d-flex m-0 w-100">
                <br>

                <div class="row min-form-additional-data">
                    <h4 class="d-block row w-100 text-info text-center">Add Other People</h4>
                    <br>
                    <div class="row m-0 input-list">
                        <div class="form-group col-12 col-md-6 float-left">
                            <input type="text" class="form-control text-left" id="additional_name" name="additional_name[]" autocomplete="off" placeholder="Name">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <select class="custom-select text-left ltr" name="additional_gender[]" id="additional_gender">
                                <option value="Male" selected="selected">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_card_id" name="additional_card_id[]" autocomplete="off" placeholder="CPR No.">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_mobile" name="additional_mobile[]" autocomplete="off" placeholder="Mobile 1">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_mobile" name="additional_mobile_2[]" autocomplete="off" placeholder="Mobile 2">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_block" name="additional_block[]" autocomplete="off" placeholder="Block">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_road" name="additional_road[]" autocomplete="off" placeholder="Road">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_building" name="additional_building[]" autocomplete="off" placeholder="Building">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_flat" name="additional_flat[]" autocomplete="off" placeholder="Flat">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="text" class="form-control text-left" id="additional_place" name="additional_place[]" autocomplete="off" placeholder="Place">
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <input type="email" class="form-control text-left" id="additional_email" name="additional_email[]" autocomplete="off" placeholder="Email">
                        </div>

                        <span class="remove_this" data-icon="&#xe906"></span>
                    </div>

                    <div class="row m-0 p-3 w-100 d-flex add-more-btn">
                        <button type="button" class="btn btn-info save-data-and-add-more col-4 btn-block p-1 m-auto">
                            <span data-icon="&#xe973"></span>Add More                        </button>

                    </div>

                </div>
            </div>

            <div class="row m-0 p-3 w-100 d-flex">
                <br>
                <button type="submit" class="btn btn-dark btn-send-data col-4 col-md-4 p-1 ml-auto" name="submit">
                    <span data-icon="&#xf1f6"></span> Send                </button>

                <button type="button" class="btn btn-light btn-add-more col-8 col-md-4 p-1 mr-auto">
                    <span data-icon="&#xf067"></span> Add Other People                </button>

            </div>

        </form>

    </div>
</div>


<footer class="site-footer "></footer>

<script src="/assets/js/jquery.min.js"></script>
<script src="/front/js/custom/popper.min.js"></script>
<script src="/front/js/bootstrap/bootstrap.min.js"></script>

<script src="/assets/js/jquery-ui.min.js"></script>


<script>
    var $_tpl = '';
    $(document).ready(function(){
        $('body').on('click', '.dropdown-item', function(e){

            let lang = $(this).attr('data-lang');
            let url = location.href;
            url = new URL(url);
            url.searchParams.set('lang', lang);
            location.href = url;

            e.preventDefault();

        })

        var $_list_of_elements = $('*'),
            $_count_of_elements = ($_list_of_elements.length > 0 ? ($_list_of_elements.length - 1) : $_list_of_elements.length);
        $_list_of_elements.each(function (element_index) {
            if ($(element_index).on('ready')) {
                if (element_index < $_count_of_elements) {
                    setTimeout(function () {
                        $_percentage = Math.ceil(element_index * 100 / $_count_of_elements);
                        $(".progress-page-load .progress-bar").css("width", $_percentage + "%");
                        $(".progress-page-load .progress-bar").attr("aria-valuenow", $_percentage);
                    }, 100);
                }
            }
        });

        $_tpl = new String($('.input-list').html());

        $('.requset-card').on('click', function () {
            var position = $('.form-data').position();
            $('body,html').animate({
                scrollTop: (position.top - 8)
            }, 250);
        });

        $('.btn-add-more').on('click', function () {
            $('.form-data .add-more').slideToggle(250);
        });
        $('.remove_this').on('click', function () {
            var $_thisindex = $('.remove_this').index(this);
            $('.input-list').eq($_thisindex).remove();
        });


        $('.save-data-and-add-more').on('click', function () {
            var $_htlm = '<div class="row m-0 input-list"><hr class="row d-flex m-0 w-100"><br>' + $_tpl + '</div>';
            $('.add-more-btn').before($_htlm);
            $('.remove_this').off('click');
            $('.remove_this').on('click', function () {
                var $_thisindex = $('.remove_this').index(this);
                $('.input-list').eq($_thisindex).remove();
            });
        });
    })
</script>
</body>
</html>
