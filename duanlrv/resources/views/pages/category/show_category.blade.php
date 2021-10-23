@extends('welcome')
@section('content')

    <!-- main -->
    <section class="container dm-thucung">
        <div class="row">
            <div class="col-sm-12 col-lg-12 dntc">
                <h3 style="color: #573f1e;"><i class="fas fa-award"></i>Sản phẩm theo danh mục</h3>
                <p class="bg-span" ></p>
            </div>
            <div class="col-sm-12 col-lg-12">
                <div class="row">
                    
                    @foreach($category_by_id as $key => $cate)
                    <div class="box-tin-rao">
                        <div class="card">
                            <img class="card-img-top card-img" src="{{URL::to('uploads/'.$cate->image)}}" width="100%">
                            <p class="box-size">mới</p>
                            <div class="card-body card-ban">
                              <h5 class="card-title tin-ban">{{$cate->title}}</h5>
                              <hr>
                              <div class="row box-thongtin">
                                <p class="card-text text-gia">{{number_format($cate->price,0,',','.')}} VND</p>
                                <p class="card-text t-diachi"><i class="fas fa-map-marker-alt i-diachi"></i> Hà nội</p>
                              </div>
                              <div class="row ft-box">
                                <p class="ft-card"><i class="far fa-clock"></i> 3 ngày trước</p>
                                <a href="{{URL::to('chi-tiet-san-pham/'.$cate->slug_product)}}" class="ft-link">Xem chi tiết</a>
                              </div>
                            </div>
                          </div>
                    </div>
                    @endforeach
                    <!-- box -2 -->
                    
                    <!-- end box -->
                    <div class="col-sm-12 col-lg-12">
                        <center class="box-xemthem"><i class="fas fa-angle-double-right"></i><a href=""> Xem thêm</a></center>
                        <!-- <center><p class="kf-hover"></p></center> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @endsection