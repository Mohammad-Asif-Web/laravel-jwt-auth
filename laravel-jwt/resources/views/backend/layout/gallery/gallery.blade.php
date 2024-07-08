
@extends('backend.app')

@section('title', 'Gallery')

@push('style')

@endpush

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Scroll Reveal animation</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="row photo_gallery gallery  justify-content-center" id="aniimated-thumbnials"
                            itemscope>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal " itemprop="associatedMedia"
                                itemscope><a href="img/tilt/1.jpg" itemprop="contentUrl"
                                    data-size="1600x950"><img class="img-thumbnail" src="{{asset('backend/img/tilt/1.jpg')}}"
                                        itemprop="thumbnail" alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/2.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/2.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30  reveal" itemprop="associatedMedia"
                                itemscope><a href="img/tilt/3.jpg" itemprop="contentUrl"
                                    data-size="1600x950"><img class="img-thumbnail" src="{{asset('backend/img/tilt/3.jpg')}}"
                                        itemprop="thumbnail" alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/4.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/4.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/5.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/5.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/6.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/6.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/7.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/7.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/1.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/1.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/4.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/4.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/3.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/3.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal " itemprop="associatedMedia"
                                itemscope><a href="img/tilt/1.jpg" itemprop="contentUrl"
                                    data-size="1600x950"><img class="img-thumbnail" src="{{asset('backend/img/tilt/1.jpg')}}"
                                        itemprop="thumbnail" alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/2.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/2.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30  reveal" itemprop="associatedMedia"
                                itemscope><a href="img/tilt/3.jpg" itemprop="contentUrl"
                                    data-size="1600x950"><img class="img-thumbnail" src="{{asset('backend/img/tilt/3.jpg')}}"
                                        itemprop="thumbnail" alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/4.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/4.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/5.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/5.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/6.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/6.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/7.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/7.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/1.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/1.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/4.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/4.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                            <figure class="col-lg-4 col-md-6 mb_30 reveal" itemprop="associatedMedia" itemscope>
                                <a href="img/tilt/3.jpg" itemprop="contentUrl" data-size="1600x950"><img
                                        class="img-thumbnail" src="{{asset('backend/img/tilt/3.jpg')}}" itemprop="thumbnail"
                                        alt="Image description"></a>
                            </figure>
                        </div>

                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="pswp__bg"></div>
                            <div class="pswp__scroll-wrap">
                                <div class="pswp__container">
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                </div>
                                <div class="pswp__ui pswp__ui--hidden">
                                    <div class="pswp__top-bar">
                                        <div class="pswp__counter"></div>
                                        <button class="pswp__button pswp__button--close"
                                            title="Close (Esc)"></button>
                                        <button class="pswp__button pswp__button--share" title="Share"></button>
                                        <button class="pswp__button pswp__button--fs"
                                            title="Toggle fullscreen"></button>
                                        <button class="pswp__button pswp__button--zoom"
                                            title="Zoom in/out"></button>
                                        <div class="pswp__preloader">
                                            <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                        <div class="pswp__share-tooltip"></div>
                                    </div>
                                    <button class="pswp__button pswp__button--arrow--left"
                                        title="Previous (arrow left)"></button>
                                    <button class="pswp__button pswp__button--arrow--right"
                                        title="Next (arrow right)"></button>
                                    <div class="pswp__caption">
                                        <div class="pswp__caption__center"></div>
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
@endsection

@push('script')

@endpush


