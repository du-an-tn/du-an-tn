@extends('welcome')
@section('content')
<section class="container-fluid slide-show">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-slide">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('/font-end/images/slide/Slider1.jpg')}}" alt="First slide" height="400px">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('/font-end/images/slide/Slider2.jpg')}}" alt="Second slide" height="400px">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('/font-end/images/slide/Slider3.jpg')}}" alt="Third slide" height="400px">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
        </div>
    </section>
    <section class="container-fluid">
        <div class="col-sm-12 col-lg-12 box-top">
            <div class="row">
            <div class="col-sm-3 box-i-1">
                <center><i aria-hidden="true" class="fas fa-shipping-fast"></i></center>
                <p>Giao hàng nhanh chóng</p>
            </div>
            <div class="col-sm-3 box-i-1">
                <center><i aria-hidden="true" class="far fa-calendar-plus"></i></center>
                <p>Phục vụ tận tình</p>
            </div>
            <div class="col-sm-3 box-i-1">
                <center><i aria-hidden="true" class="fas fa-american-sign-language-interpreting"></i></center>
                <p>Sản phẩm chính hảng</p>
            </div>
            <div class="col-sm-3 box-i-1">
                <center><i aria-hidden="true" class="far fa-comment-dots"></i></center>
                <p>Hổ trợ 24/7</p>
            </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 dntc">
                <h3><i class="fas fa-paw"></i> Danh mục thú cưng</h3>
                <p class="bg-span" ></p>
            </div>
            <div class="col-sm-12 col-lg-12">
                <div class="row">
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/mua-ban-thu-cung.jpg')}}" alt="" width="150px" height="150px">
                        <p style="text-align: center;"><a class="danhmuc-a" href="">Mua bán thú cưng</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/phoi-giong.jpg')}}" alt="" width="150px" height="150px">
                        <p  style="text-align: center;"><a class="danhmuc-a" href="">Phối giống</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/thu-y-gan-ban.jpg')}}" alt="" width="150px" height="150px">
                        <p style="text-align: center;"><a class="danhmuc-a" href="">thú y gần bạn</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/cong-dong-yeu-thu-cung.jpg')}}" alt="" width="150px" height="150px">
                        <p style="text-align: center;"><a class="danhmuc-a" href="">Cộng đồng thú cưng</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/cam-nang-thu-cung.jpg')}}" alt="" width="150px" height="150px">
                        <p style="text-align: center;"><a class="danhmuc-a" href="">Cẩm nang thú cưng</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <a href="{{URL::to('/danh-muc-phu-kien/')}}"><img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/san-pham-phu-kien.jpg')}}" alt="" width="150px" height="150px"></a>
                        <p style="text-align: center;"><a class="danhmuc-a" href="{{URL::to('/danh-muc-phu-kien/')}}">Sản phẩm phụ kiện</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/dich-vu-thu-cung.jpg')}}" alt="" width="150px" height="150px">
                        <p style="text-align: center;"><a class="danhmuc-a" href="">Dịch vụ chăm sóc thú cưng</a></p>
                    </div>
                    <div class="col-sm-3 dm-thucung">
                        <img class="img-danhmuc" src="{{asset('/font-end/images/hinh-danh-muc/bang-gia-thu-cung.jpg')}}" alt="" width="150px" height="150px">
                        <p style="text-align: center;"><a class="danhmuc-a" href="">Bảng giá thú cưng</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slide -->
    <section class="container-fluid">
      <div>
        <div class="owl_plugin owl-carousel owl-theme">
          <div class="item"><img src="{{asset('/font-end/images/slide-quang-cao/slide1.jpg')}}" alt="slide" height="150px" width="100%"></div>
          <div class="item"><img src="{{asset('/font-end/images/slide-quang-cao/slide2.jpg')}}" alt="slide" height="150px" width="100%"></div>
          <div class="item"><img src="{{asset('/font-end/images/slide-quang-cao/slide3.jpg')}}" alt="slide" height="150px" width="100%"></div>
          <div class="item"><img src="{{asset('/font-end/images/slide-quang-cao/slide4.jpg')}}" alt="slide" height="150px" width="100%"></div>
          <div class="item"><img src="{{asset('/font-end/images/slide-quang-cao/slide5.jpg')}}" alt="slide" height="150px" width="100%"></div>
          <div class="item"><img src="{{asset('/font-end/images/slide-quang-cao/slide6.jpg')}}" alt="slide" height="150px" width="100%"></div>
        </div>
      <hr>
      </div>
    </section>
    <!-- main -->
    <section class="container dm-thucung">
        <div class="row">
            <div class="col-sm-12 col-lg-12 dntc">
                <h3 style="color: #573f1e;"><i class="fas fa-award"></i> Tin rao nổi bật</h3>
                <p class="bg-span" ></p>
            </div>
            <div class="col-sm-12 col-lg-12">
                <div class="row">
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box -2 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 3 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box-4 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 5 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 6 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 7 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 8 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 9 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- box 10 -->
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">12.000.000 vnđ</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="#" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    <!-- end box -->
                    <div class="col-sm-12 col-lg-12">
                        <center class="box-xemthem"><i class="fas fa-angle-double-right"></i><a href=""> Xem thêm</a></center>
                        <!-- <center><p class="kf-hover"></p></center> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container box-line">
      <hr>
        <div class="row">
          <div class="col-sm-5 col-lg-5 dntc">
            <h3 style="color: #573f1e;"><i class="fas fa-bread-slice"></i> Sản phẩm nổi bật</h3>
          </div>
          <div class="col-sm-7 dntc">
            <ul class="nav justify-content-end">
              <li class="nav-item">
                <a class="nav-link the-a" href="#">thức ăn cho mèo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link the-a" href="#">Thức ăn cho chó</a>
              </li>
              <li class="nav-item">
                <a class="nav-link the-a" href="#">sản phẩm khác</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/thuc-pham-phu-kien/dau-tam-cho-meo.jpg" width="100%" height="100px">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box -2 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 3 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box-4 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 5 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 6 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 7 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 8 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 9 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- box 10 -->
                <div class="box-tin-rao">
                    <div class="card">
                        <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
                        <p class="box-size">mới</p>
                        <div class="card-body card-ban">
                          <h5 class="card-title tin-ban">Các Giống Mèo Anh Lông Ngắn/ Golden/Silver/Himaly...</h5>
                          <hr>
                          <div class="row box-thongtin">
                            <p class="card-text text-gia">12.000.000 vnđ</p>
                            <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                          </div>
                          <div class="row ft-box">
                            <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                            <a href="#" class="ft-link">Xem chi tiết</a>
                          </div>
                        </div>
                      </div>
                </div>
                <!-- end box -->
                <div class="col-sm-12 col-lg-12">
                    <center class="box-xemthem"><i class="fas fa-angle-double-right"></i><a href=""> Xem thêm</a></center>
                    <!-- <center><p class="kf-hover"></p></center> -->
                </div>
            </div>
          </div>
        </div>
    </section>
    <section class="container-fluid bg-cuahang">
    <div class="bg-chu">
      <h3>Nguồn Thực Phẩm dồi dào</h3>
      <p>Hỗ trợ sức khỏe thú cưng của bạn</p>
      <a href="">Cửa hàng</a>
    </div>
    </section>
    <section class="container">
      <div class="col-sm-12">
        <h2 class="txt-title" style="text-align: center;">Cẩm nang thú cưng</h2>
        <hr>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="card t-tin">
            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
            <div class="card-body card-ban">
              <h5 class="card-title tin-ban"><a href="#">Tin tức về nuôi thú...</a></h5>
              <hr>
              <div class="row box-thongtin">
                <p class="card-text text-gia"><span style="color: #FFAE19;">By</span>: admin</p>
                <p class="card-text t-diachi"><i class="far fa-comment-dots i-diachi"></i> comment: 0</p>
              </div>
                <a href="#" class="btn btn-light form-control">Xem chi tiết</a>
              </div>
          </div>
          </div>

        <div class="col-sm-4">
          <div class="card t-tin">
            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
            <div class="card-body card-ban">
              <h5 class="card-title tin-ban"><a href="#">Tin tức về nuôi thú...</a></h5>
              <hr>
              <div class="row box-thongtin">
                <p class="card-text text-gia"><span style="color: #FFAE19;">By</span>: admin</p>
                <p class="card-text t-diachi"><i class="far fa-comment-dots i-diachi"></i> comment: 0</p>
              </div>
                <a href="#" class="btn btn-light form-control">Xem chi tiết</a>
              </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card t-tin">
            <img class="card-img-top card-img" src="images/hinh-sp-cho/alaska-cho1.jpg" width="100%">
            <div class="card-body card-ban">
              <h5 class="card-title tin-ban"><a href="#">Tin tức về nuôi thú...</a></h5>
              <hr>
              <div class="row box-thongtin">
                <p class="card-text text-gia"><span style="color: #FFAE19;">By</span>: admin</p>
                <p class="card-text t-diachi"><i class="far fa-comment-dots i-diachi"></i> comment: 0</p>
              </div>
                <a href="#" class="btn btn-light form-control">Xem chi tiết</a>
              </div>
          </div>
        </div>
      </div>
    </section>
 <hr>
    <!-- end main -->
    @endsection