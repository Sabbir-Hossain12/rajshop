<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$basicinfo->name}}</title>

    @yield('meta')

    @include('webview.partials.links.header')
    @yield('subhead')
    <style>
        .header-top-inner {
            padding: 4px;
        }
        #subcategoryhover li {
            border-bottom: 1px solid #eee;
        }

        #subcategoryhover a:hover {
            color: #c30909 !important
        }

        #processing {
            top: 30% !important;
        }
        #discountpart{
            position: absolute;
            top: -2px;
            right: 0px;
            background: red;
            border-radius: 16px 0% 0% 16px;
            height: 20px;
            width: 70px;
            box-shadow: 1px 1px 10px 1px #05050522;

        }
        #discountparttwo
        {
            background: #ff0a01;
            border-radius: 50%;
            height: 32px;
            width: 32px;
            float: left;

        }
        #pdis
        {
            font-size: 10px;
            margin: 0;
            padding-top: 2px;
            float: right;
            color: white;
            font-weight: bold;
            padding-right: 4px;
        }
        .product-image
        {
            overflow:hidden;
        }
        .product-image img:hover{
            transform: scale(1.2);
        }
        .product-image img{
            transition: .5s;
        }

        #sync1 .items img:hover{
            transform: scale(1.4);
        }
        #sync1 .items img{
            transition: .5s;
        }
         #whatsapp-chat-icon , #messenger-chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            animation: bounce 2s infinite;
            z-index: 100;
            width: fit-content;
        }

        #whatsapp-chat-icon a img , #messenger-chat-icon a img{
            transition: transform 0.2s;
        }

        #whatsapp-chat-icon a:hover img , #messenger-chat-icon a:hover img{
            animation: vibrate 0.2s;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes vibrate {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 0); }
            40% { transform: translate(2px, 0); }
            60% { transform: translate(-2px, 0); }
            80% { transform: translate(2px, 0); }
            100% { transform: translate(0); }
        }
        @media (max-width: 576px) {
            #whatsapp-chat-icon , #messenger-chat-icon {
            bottom: 0;
            right: 0 !important;
            z-index: 10000;
            animation: none;

        }
        }




    </style>
 <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NVCX4H9K');</script>
<!-- End Google Tag Manager -->


</head>

<body class="main-body">

    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NVCX4H9K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- header -->
    @include('webview.partials.header')
    <!-- header end -->


    <!-- Body -->
    <div class="body-content" id="top-banner-and-menu">
        {{-- //main content --}}
        @yield('maincontent')
        {{-- //main content End --}}
    </div>
    <!-- Body end -->

    <!-- === FOOTER === -->
    @include('webview.partials.footer')
    <!-- === FOOTER : END === -->


    <!--Footer Js-->
    @include('webview.partials.links.footer')
    @yield('subfooter')


<div id="messenger-chat-icon">
    <a href="{{$generalsetting->messenger}}" target="_blank" style="">
        <img src="{{asset('public/messenger.png')}}" width="62px" style="border-radius:50%">
    </a>
</div>    
<!--<div id="whatsapp-chat-icon">-->
<!--    <a href="https://wa.me/+88{{App\Models\Contact::first()->phone}}?text=I%20am%20interested" target="_blank">-->
<!--        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Chat" width="55px">-->
<!--    </a>-->
<!--</div>-->
<input type="hidden" name="wp_number" value="{{$generalsetting->wp_number}}" id="wp_number">

<script>
    // Function to handle chat box functionality
    function createWhatsAppChat() {
        var chatButton = document.getElementById('whatsapp-chat-icon');
        var chatBox = document.getElementById('whatsapp-chat-box');

        // Toggle chat box visibility
        chatButton.onclick = function () {
            if (chatBox.style.display === 'none') {
                chatBox.style.display = 'block';
                chatBox.style.opacity = 1;
            } else {
                chatBox.style.opacity = 0;
                setTimeout(function () {
                    chatBox.style.display = 'none';
                }, 300); // Delay hiding to allow fade-out transition
            }
        };
    }

    // Initialize chat functionality
    window.onload = function () {
        createWhatsAppChat();
    };
</script>



    {{-- model cart --}}

    <div class="modal" id="processing">
        <div class="modal-dialog">
            <div class="modal-content" style="text-align: center">
                <i class="spinner fa fa-spinner fa-spin"
                    style="    color: #108b3a; font-size: 70px;  padding: 22px;"></i>
            </div>
        </div>
    </div>


    <div class="modal" id="cartViewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="AddToCartModel" style="padding-top: 0">

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span
                            aria-hidden="true">Add
                            More Products</span></button>
                    <a href="{{ url('checkout') }}" class="btn btn-primary">Submit Order</a>
                </div>
            </div>
        </div>
    </div>

    {{-- csrf --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

{{--{!!App\Models\Basicinfo::first()->chat_box!!}--}}


<script>
    $(document).ready(function() {
        function checkWindowSize() {
            var marquee = $('#marquee');
            if (window.innerWidth <= 768) { // Adjust the width as needed for mobile
                marquee.show();

                // Adjust the animation duration based on the content length
                var contentWidth = $('#marquee-content').width();
                var marqueeWidth = marquee.width();
                var duration = (contentWidth + marqueeWidth) / 50; // Adjust speed here

                $('#marquee-content').css('animation-duration', duration + 's');
            } else {
                marquee.hide();
            }
        }

        // Check on load
        checkWindowSize();

        // Check on resize
        $(window).resize(checkWindowSize);
    });
</script>

    <script>
        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction()
        {
            if (window.pageYOffset > sticky)
            {
                header.classList.add("sticky");
            }
            else
            {
                header.classList.remove("sticky");
            }
        }

        $(document).ready(function() {
            var idval = $('#CountSlider').val();

            $('#slider').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });

            $('#categorySlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    1000: {
                        items: 8,
                    }
                }
            });

            $('#promotionalofferSlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 6,
                    }
                }
            });

            $('#featuredProductSlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 6,
                    }
                }
            });

            $('#bestsellingproductSlide').owlCarousel({
                loop: true,
                margin: 0,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            });

            for (let i = 0; i < idval; i++) {

                $('#CategoryProductSlide' + [i]).owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 2500,
                    lazyLoad: true,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 3,
                        },
                        600: {
                            items: 3,
                        },
                        1000: {
                            items: 6,
                        }
                    }
                });
            }



        });

        var token = $("input[name='_token']").val();

        function addtocart(product_id) {
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                data: {
                    _token: token,
                    product_id: product_id,
                    qty: '1',
                },

                success: function(data) {
                    updatecart();
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('get-cart-content') }}',

                        success: function(response) {
                            $('#cartViewModal .modal-body').empty().append(
                                response);
                        },
                        error: function(error) {
                            console.log('error');
                        }
                    });
                    $('#processing').modal('hide');
                    $('#cartViewModal').modal('show');
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function buynow(product_id) {
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                data: {
                    _token: token,
                    product_id: product_id,
                    qty: '1',
                },

                success: function(data) {
                    updatecart();
                    if (data == 'success') {
                        window.location.href = 'https://seenur.com/checkout';
                        $('#processing').modal('hide');
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }


        function removeFromCartItem(rowId) {

            $.ajax({
                type: 'POST',
                url: '{{ url('remove-cart') }}',
                data: {
                    _token: token,
                    rowId: rowId,
                },

                success: function(response) {

                    updatecart();
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product remove from your Cart',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (response == 'empty') {
                        $('#loadingreload').css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'align-items': 'center'
                        })
                        $('#loadingreload').modal('show');
                        $('#cartViewModal').modal('hide');
                        location.reload();
                    } else {
                        $('#cartViewModal .modal-body').empty().append(
                            response);
                        $('#cartViewModal').modal('show');
                    }


                },
                error: function(error) {
                    console.log('error');
                }
            });
        }



        function upQuantity() {
            var qty = $('#proQuantity').val();
            if (qty >= 10) {

            } else {
                var b = parseInt(qty);
                var cq = b + 1;
                $('#proQuantity').val(cq);
                $('#qty').val(cq);
                $('#qtyor').val(cq);
            }
        }

        function downQuantity() {
            var qty = $('#proQuantity').val();
            if (qty <= 1) {

            } else {
                var b = parseInt(qty);
                var cq = b - 1;
                $('#proQuantity').val(cq);
                $('#qty').val(cq);
                $('#qtyor').val(cq);
            }


        }

        function checkcart() {
            $.ajax({
                type: 'GET',
                url: '{{ url('get-checkcart-content') }}',

                success: function(response) {
                    $('#checkcartview').html('');
                    $('#checkcartview').append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function removeFromCartItemHead(rowId) {

            $.ajax({
                type: 'POST',
                url: '{{ url('remove-cart') }}',
                data: {
                    _token: token,
                    rowId: rowId,
                },

                success: function(response) {
                    if (response == 'empty') {
                        $('#loadingreload').css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'align-items': 'center'
                        })
                        $('#loadingreload').modal('show');
                        toastr.success('Product remove from Cart');
                        checkcart();
                        viewcart();
                        updatecart();
                        location.reload();
                    } else {
                        console.log('hi');
                        toastr.success('Product remove from Cart');
                        checkcart();
                        viewcart();
                        updatecart();
                    }


                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function viewcart() {
            $.ajax({
                type: 'get',
                url: '{{ url('load-cart') }}',

                success: function(response) {
                    $('#cart-summary').empty().append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function updatecart() {
            $.ajax({
                type: 'get',
                url: '{{ url('update-cart') }}',

                success: function(response) {
                    $('.basket-item-count').html(response.item);
                    $('.cartamountvalue').html(response.amount);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function searchproduct() {
            var search = $('#modalsearchinput').val();
            $.ajax({
                type: 'GET',
                url: '{{ url('get-search-content') }}',
                data: {
                    _token: token,
                    search: search,
                },

                success: function(response) {
                    $('#searchproductlist').html('');
                    $('#searchproductlist').append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        $(document).ready(function() {
            $('img').lazyload();
        });
    </script>

</body>

</html>
