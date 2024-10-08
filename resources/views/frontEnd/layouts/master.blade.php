<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title') - {{$generalsetting->name}}</title>
        <!-- App favicon -->

        <link rel="shortcut icon" href="{{asset($generalsetting->favicon)}}" alt="Super Ecommerce Favicon" />
        <meta name="author" content="Super Ecommerce" />
        <link rel="canonical" href="" />
        @stack('seo')
        @stack('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"
            integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- toastr css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

         <link rel="stylesheet" href="{{asset('public/frontEnd/css/mobile-menu.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/wsit-menu.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{asset('public/frontEnd/css/main.css')}}" />


        @foreach($pixels as $pixel)
        <!-- Facebook Pixel Code -->
        <script>
            !(function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = "2.0";
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            })(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
            fbq("init", "{{{$pixel->code}}}");
            fbq("track", "PageView");
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id={{{$pixel->code}}}&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
        @endforeach

    </head>
    <body class="gotop">
        @php $subtotal = Cart::instance('shopping')->subtotal(); @endphp
        <div class="mobile-menu">
            <div class="mobile-menu-logo">
                <div class="logo-image">
                    <img src="{{asset($generalsetting->white_logo)}}" alt="" />
                </div>
                <div class="mobile-menu-close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <ul class="first-nav">
                @foreach($menucategories as $scategory)
                <li class="parent-category">
                    <a href="{{url('category/'.$scategory->slug)}}" class="menu-category-name">
                        <img src="{{asset($scategory->image)}}" alt="" class="side_cat_img" />
                        {{$scategory->name}}
                    </a>
                    @if($scategory->subcategories->count() > 0)
                    <span class="menu-category-toggle">
                        <i class="fa fa-chevron-down"></i>
                    </span>
                    @endif
                    <ul class="second-nav" style="display: none;">
                        @foreach($scategory->subcategories as $subcategory)
                        <li class="parent-subcategory">
                            <a href="{{url('subcategory/'.$subcategory->slug)}}" class="menu-subcategory-name">{{$subcategory->subcategoryName}}</a>
                            @if($subcategory->childcategories->count() > 0)
                            <span class="menu-subcategory-toggle"><i class="fa fa-chevron-down"></i></span>
                            @endif
                            <ul class="third-nav" style="display: none;">
                                @foreach($subcategory->childcategories as $childcat)
                                <li class="childcategory"><a href="{{url('products/'.$childcat->slug)}}" class="menu-childcategory-name">{{$childcat->childcategoryName}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
        <header id="navbar_top sticky">
            <div class="mobile-header">
                <div class="mobile-logo">
                    <div class="menu-bar">
                        <a class="toggle">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </div>
                    <div class="menu-logo">
                        <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" /></a>
                    </div>
                    <div class="menu-bag">
                        <p class="margin-shopping">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="mobilecart-qty">{{Cart::instance('shopping')->count()}}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="mobile-search">
                <form action="{{route('search')}}">
                    <input type="text" placeholder="Search Product ... " value="" class="msearch_keyword msearch_click" name="keyword" />
                    <button><i data-feather="search"></i></button>
                </form>
                <div class="search_result"></div>
            </div>



            <div class="main-header">
                <!-- header to end -->
                <div class="logo-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="logo-header">
                                    <div class="main-logo">
                                        <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" /></a>
                                    </div>
                                    <div class="main-search">
                                        <form action="{{route('search')}}">
                                            <input type="text" placeholder="Search Product..." class="search_keyword search_click" name="keyword" />
                                            <button>
                                                <i data-feather="search"></i>
                                            </button>
                                        </form>
                                        <div class="search_result"></div>
                                    </div>
                                    <div class="header-list-items">
                                        <ul>
                                            <li class="track_btn">
                                                <a href="{{route('customer.order_track')}}"> <i class="fa fa-truck"></i></a>
                                            </li>
                                            @if(Auth::guard('customer')->user())
                                            <li class="for_order">
                                                <p>
                                                    <a href="{{route('customer.account')}}">
                                                        <i class="fa-regular fa-user"></i>

                                                        {{Str::limit(Auth::guard('customer')->user()->name,14)}}
                                                    </a>
                                                </p>
                                            </li>
                                            @else
                                            <li class="for_order">
                                                <p>
                                                    <a href="{{route('customer.login')}}">
                                                        <i class="fa-regular fa-user"></i>

                                                    </a>
                                                </p>
                                            </li>
                                            @endif

                                            <li class="cart-dialog" id="cart-qty">
                                                <a href="{{route('customer.checkout')}}">
                                                    <p class="margin-shopping">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                        <span>{{Cart::instance('shopping')->count()}}</span>
                                                    </p>
                                                </a>
                                                <div class="cshort-summary">
                                                    <ul>
                                                        @foreach(Cart::instance('shopping')->content() as $key=>$value)
                                                        <li>
                                                            <a href=""><img src="{{asset($value->options->image)}}" alt="" /></a>
                                                        </li>
                                                        <li><a href="">{{Str::limit($value->name, 30)}}</a></li>
                                                        <li>Qty: {{$value->qty}}</li>
                                                        <li>
                                                            <p>৳{{$value->price}}</p>
                                                            <button class="remove-cart cart_remove" data-id="{{$value->rowId}}"><i data-feather="x"></i></button>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <p><strong>সর্বমোট : ৳{{$subtotal}}</strong></p>
                                                    <a href="{{route('customer.checkout')}}" class="go_cart"> অর্ডার করুন </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- main-header end -->
        </header>
        <div id="content">
            @yield('content')
        </div>
            <!-- content end -->
        <footer>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <div class="footer-about">
                                <a href="{{route('home')}}">
                                    <img src="{{asset($generalsetting->white_logo)}}" alt="" />
                                </a>
                                <p>{{$contact->address}}</p>
                                <a href="tel:{{$contact->hotline}}" class="footer-hotlint">{{$contact->hotline}}</a>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-3 mb-3 mb-sm-0 col-6">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Useful Link</a></li>
                                    <li>
                                        <a href="{{route('contact')}}"> <a href="{{route('contact')}}">Contact Us</a></a>
                                    </li>
                                    @foreach($pages as $page)
                                    <li><a href="{{route('page',['slug'=>$page->slug])}}">{{$page->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- col end -->
                        <div class="col-sm-2 mb-3 mb-sm-0 col-6">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title"><a>Link</a></li>
                                    @foreach($pagesright as $key=>$value)
                                    <li>
                                        <a href="{{route('page',['slug'=>$value->slug])}}">{{$value->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- col end -->
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <div class="footer-menu">
                                <ul>
                                    <li class="title stay_conn"><a>Stay Connected</a></li>
                                </ul>
                                <ul class="social_link">
                                    @foreach($socialicons as $value)
                                    <li class="social_list">
                                        <a class="mobile-social-link" href="{{$value->link}}"><i class="{{$value->icon}}"></i></a>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="d_app">
                                    <h2>Download App</h2>
                                    <a href="">
                                        <img src="{{asset('public/frontEnd/images/app-download.png')}}" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- col end -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom bg-danger">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="copyright">
                                <p>Copyright © {{ date('Y') }} {{$generalsetting->name}}. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>



        @if(request()->is('product/*'))
             <a href="{{$generalsetting->messenger}}" target="_blank" style="position: fixed;bottom: 140px;right: 18px;z-index:111">
                <img src="{{asset('public/messenger.png')}}" style="height:60px;border-radius:50%">
            </a>

            <div id="whatsapp-chat-icon" style="    bottom: 55px;">
                <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp Chat">
            </div>

            <input type="hidden" name="wp_number" value="{{$generalsetting->wp_number}}" id="wp_number">

            <!-- WhatsApp Chat Box -->
            <div id="whatsapp-chat-box">
                <header>
                    <img src="https://img.icons8.com/ios/50/000000/user.png" alt="Profile Picture">
                    <div class="info">
                        <h4>Admin</h4>
                        <p>Online</p>
                    </div>
                </header>
                <div id="messages">
                    <div class="message">
                        <p>Hi there! How can we assist you today?</p>
                    </div>
                </div>
                <div class="loading" id="loading"></div>
                <div style="display: flex;">
                    <textarea id="message-input" placeholder="Type your message..."></textarea>
                    <button id="send-message">Send</button>
                </div>
            </div>
        @else
            <div class="footer_nav">
                <ul>
                    <li>
                        <a class="toggle">
                            <span>
                                <i class="fa-solid fa-bars"></i>
                            </span>
                            Category
                        </a>
                    </li>

                   <li>
                        <a href="{{route('customer.checkout')}}">
                            <span>
                                <i class="fa-solid fa-cart-shopping"></i>
                            </span>
                            Cart
                        </a>
                    </li>

                    <li class="mobile_home">
                        <a href="{{route('home')}}">
                            <span><i class="fa-solid fa-home"></i></span> <span>Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="tel:{{$contact->hotline}}">
                            <span>
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            Call
                        </a>
                    </li>

                    @if(Auth::guard('customer')->user())
                    <li>
                        <a href="{{route('customer.account')}}">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>

                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{route('customer.login')}}">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>

                        </a>
                    </li>
                    @endif
                </ul>
            </div>


            <a href="{{$generalsetting->messenger}}" target="_blank" style="position: fixed;bottom: 100px;right: 18px;z-index:111">
                <img src="{{asset('public/messenger.png')}}" style="height:60px;border-radius:50%">
            </a>

            <div id="whatsapp-chat-icon">
                <img src="https://img.icons8.com/color/48/000000/whatsapp.png" alt="WhatsApp Chat">
            </div>

            <input type="hidden" name="wp_number" value="{{$generalsetting->wp_number}}" id="wp_number">

            <!-- WhatsApp Chat Box -->
            <div id="whatsapp-chat-box">
                <header>
                    <img src="https://img.icons8.com/ios/50/000000/user.png" alt="Profile Picture">
                    <div class="info">
                        <h4>Admin</h4>
                        <p>Online</p>
                    </div>
                </header>
                <div id="messages">
                    <div class="message">
                        <p>Hi there! How can we assist you today?</p>
                    </div>
                </div>
                <div class="loading" id="loading"></div>
                <div style="display: flex;">
                    <textarea id="message-input" placeholder="Type your message..."></textarea>
                    <button id="send-message">Send</button>
                </div>
            </div>
        @endif




        <script>

            // Function to handle chat box functionality
            function createWhatsAppChat() {
                var chatButton = document.getElementById('whatsapp-chat-icon');
                var chatBox = document.getElementById('whatsapp-chat-box');
                var sendButton = document.getElementById('send-message');
                var messageInput = document.getElementById('message-input');
                var messagesContainer = document.getElementById('messages');
                var loadingIndicator = document.getElementById('loading');

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

                // Handle send button click
                sendButton.onclick = function () {
                    var userMessage = messageInput.value.trim();
                    if (userMessage) {
                        // Show loading indicator
                        loadingIndicator.style.display = 'block';
                        setTimeout(function () {
                            // Hide loading indicator and append user message
                            loadingIndicator.style.display = 'none';
                            var userMessageDiv = document.createElement('div');
                            userMessageDiv.className = 'message me';
                            userMessageDiv.innerHTML = '<p>' + userMessage + '</p>';
                            messagesContainer.appendChild(userMessageDiv);

                            // Simulate typing indicator
                            var typingIndicator = document.createElement('div');
                            typingIndicator.className = 'loading';
                            typingIndicator.innerHTML = 'Admin is typing...';
                            messagesContainer.appendChild(typingIndicator);

                            // Simulate a reply from the contact after typing
                            setTimeout(function () {
                                messagesContainer.removeChild(typingIndicator);
                                var replyMessageDiv = document.createElement('div');
                                replyMessageDiv.className = 'message';
                                replyMessageDiv.innerHTML = '<p>Thanks for your message! We will get back to you shortly.</p>';
                                messagesContainer.appendChild(replyMessageDiv);

                                messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll to the bottom
                            }, 1500); // Simulate typing delay

                            // Open WhatsApp with the user's message
                            var whatsappUrl = 'https://wa.me/'+$('#wp_number').val()+'?text=' + encodeURIComponent(userMessage);
                            window.open(whatsappUrl, '_blank'); // Open WhatsApp with the message

                            messageInput.value = ''; // Clear the input field
                        }, 1500); // Simulate loading delay
                    } else {
                        alert('Please enter a message before sending.');
                    }
                };
            }

            // Initialize chat functionality
            window.onload = function () {
                createWhatsAppChat();
            };
        </script>

         <style>
            /* Styling for the WhatsApp chat icon */
            #whatsapp-chat-icon {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 1000;
                cursor: pointer;
                animation: bounce 2s infinite;
            }

            #whatsapp-chat-icon img {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            #whatsapp-chat-icon img:hover {
                transform: scale(1.1);
                box-shadow: 0px 0px 20px rgba(37, 211, 102, 0.6);
            }

            @keyframes bounce {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-10px);
                }
            }

            /* Styling for the chat box */
            #whatsapp-chat-box {
                position: fixed;
                bottom: 100px;
                right: 20px;
                width: 320px;
                max-height: 500px;
                background-color: #f9f9f9;
                border-radius: 20px;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
                padding: 20px;
                display: none;
                z-index: 1001;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                overflow-y: auto;
                transition: opacity 0.3s ease;
            }

            #whatsapp-chat-box header {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
            }

            #whatsapp-chat-box header img {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                margin-right: 10px;
                border: 2px solid blue;
            }

            #whatsapp-chat-box header .info {
                flex-grow: 1;
            }

            #whatsapp-chat-box header .info h4 {
                margin: 0;
                font-size: 16px;
                color: #333;
            }

            #whatsapp-chat-box header .info p {
                margin: 0;
                font-size: 12px;
                color: #666;
                position: relative;
                padding-left: 20px;
            }

            #whatsapp-chat-box header .info p:before {
                content: '';
                width: 10px;
                height: 10px;
                background-color: blue;
                border-radius: 50%;
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
            }

            #whatsapp-chat-box .message {
                display: flex;
                align-items: flex-end;
                margin-bottom: 10px;
                opacity: 0;
                transform: translateX(10px);
                animation: appear 0.5s forwards;
            }

            #whatsapp-chat-box .message.me {
                justify-content: flex-end;
            }

            #whatsapp-chat-box .message p {
                background-color: #e1ffc7;
                color: #333;
                border-radius: 15px;
                padding: 10px;
                max-width: 70%;
                word-break: break-word;
                margin: 0;
                animation: slideIn 0.5s ease;
            }

            #whatsapp-chat-box .message.me p {
                background-color: #25D366;
                color: #fff;
            }

            /* Animation for message appearance */
            @keyframes appear {
                from {
                    opacity: 0;
                    transform: translateX(10px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes slideIn {
                from {
                    transform: translateY(10px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            #whatsapp-chat-box .loading {
                display: none;
                color: #999;
                font-size: 14px;
                text-align: center;
            }

            #whatsapp-chat-box .loading:before {
                content: "•";
                animation: typing 1s infinite;
                font-size: 20px;
            }

            @keyframes typing {
                0% { content: "•"; }
                33% { content: "••"; }
                66% { content: "•••"; }
                100% { content: "•"; }
            }

            #whatsapp-chat-box textarea {
                width: calc(100% - 80px);
                height: 60px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 15px;
                margin-right: 10px;
                font-size: 14px;
                resize: none;
            }

            #whatsapp-chat-box button {
                width: 70px;
                padding: 10px;
                border: none;
                border-radius: 15px;
                background-color: #25D366;
                color: #fff;
                cursor: pointer;
            }

            #whatsapp-chat-box button:hover {
                background-color: #1ebd74;
            }
        </style>


        <div id="custom-modal"></div>
        <div id="page-overlay"></div>
        <div id="loading"><div class="custom-loader"></div></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wsit-menu.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/mobile-menu-init.js')}}"></script>
        <script src="{{asset('public/frontEnd/js/wow.min.js')}}"></script>
        <script>
            new WOW().init();
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- feather icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {!! Toastr::message() !!} @stack('script')
        <script>
            $(window).scroll( function(){
                if($(window).scrollTop() > 2) {
                    $('#mainskiky').css('margin-top','0px');
                }else{
                    $('#mainskiky').css('margin-top','56px');
                }

            });
            $(".quick_view").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('quickview')}}",
                        success: function (data) {
                            if (data) {
                                $("#custom-modal").html(data);
                                $("#custom-modal").show();
                                $("#loading").hide();
                                $("#page-overlay").show();
                            }
                        },
                    });
                }
            });
        </script>
        <!-- quick view end -->
        <!-- cart js start -->
        <script>
            $(".addcartbutton").on("click", function () {
                var id = $(this).data("id");
                var qty = 1;
                if (id) {
                    $.ajax({
                        cache: "false",
                        type: "GET",
                        url: "{{url('add-to-cart')}}/" + id + "/" + qty,
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart successfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });
            $(".cart_store").on("click", function () {
                var id = $(this).data("id");
                var qty = $(this).parent().find("input").val();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id, qty: qty ? qty : 1 },
                        url: "{{route('cart.store')}}",
                        success: function (data) {
                            if (data) {
                                toastr.success('Success', 'Product add to cart succfully');
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_remove").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.remove')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart() + cart_summary();
                            }
                        },
                    });
                }
            });

            $(".cart_increment").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.increment')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            $(".cart_decrement").on("click", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "{{route('cart.decrement')}}",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                return cart_count() + mobile_cart();
                            }
                        },
                    });
                }
            });

            function cart_count() {
                $.ajax({
                    type: "GET",
                    url: "{{route('cart.count')}}",
                    success: function (data) {
                        if (data) {
                            $("#cart-qty").html(data);
                        } else {
                            $("#cart-qty").empty();
                        }
                    },
                });
            }
            function mobile_cart() {
                $.ajax({
                    type: "GET",
                    url: "{{route('mobile.cart.count')}}",
                    success: function (data) {
                        if (data) {
                            $(".mobilecart-qty").html(data);
                        } else {
                            $(".mobilecart-qty").empty();
                        }
                    },
                });
            }
            function cart_summary() {
                $.ajax({
                    type: "GET",
                    url: "{{route('shipping.charge')}}",
                    dataType: "html",
                    success: function (response) {
                        $(".cart-summary").html(response);
                    },
                });
            }
        </script>
        <!-- cart js end -->
        <script>
            $(".search_click").on("keyup change", function () {
                var keyword = $(".search_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
            $(".msearch_click").on("keyup change", function () {
                var keyword = $(".msearch_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "{{route('livesearch')}}",
                    success: function (products) {
                        if (products) {
                            $("#loading").hide();
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
        </script>
        <!-- search js start -->
        <script></script>
        <script></script>
        <script>
            $(".district").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "{{route('districts')}}",
                    success: function (res) {
                        if (res) {
                            $(".area").empty();
                            $(".area").append('<option value="">Select..</option>');
                            $.each(res, function (key, value) {
                                $(".area").append('<option value="' + key + '" >' + value + "</option>");
                            });
                        } else {
                            $(".area").empty();
                        }
                    },
                });
            });
        </script>
        <script>
            $(".toggle").on("click", function () {
                $("#page-overlay").show();
                $(".mobile-menu").addClass("active");
            });

            $("#page-overlay").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
                $(".feature-products").removeClass("active");
            });

            $(".mobile-menu-close").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
            });

            $(".mobile-filter-toggle").on("click", function () {
                $("#page-overlay").show();
                $(".feature-products").addClass("active");
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".parent-category").each(function () {
                    const menuCatToggle = $(this).find(".menu-category-toggle");
                    const secondNav = $(this).find(".second-nav");

                    menuCatToggle.on("click", function () {
                        menuCatToggle.toggleClass("active");
                        secondNav.slideToggle("fast");
                        $(this).closest(".parent-category").toggleClass("active");
                    });
                });
                $(".parent-subcategory").each(function () {
                    const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                    const thirdNav = $(this).find(".third-nav");

                    menuSubcatToggle.on("click", function () {
                        menuSubcatToggle.toggleClass("active");
                        thirdNav.slideToggle("fast");
                        $(this).closest(".parent-subcategory").toggleClass("active");
                    });
                });
            });
        </script>

        <script>
            var menu = new MmenuLight(document.querySelector("#menu"), "all");

            var navigator = menu.navigation({
                selectedClass: "Selected",
                slidingSubmenus: true,
                // theme: 'dark',
                title: "ক্যাটাগরি",
            });

            var drawer = menu.offcanvas({
                // position: 'left'
            });

            //  Open the menu.
            document.querySelector('a[href="#menu"]').addEventListener("click", (evnt) => {
                evnt.preventDefault();
                drawer.open();
            });
        </script>

        <script>
            $(".filter_btn").click(function(){
               $(".filter_sidebar").addClass('active');
               $("body").css("overflow-y", "hidden");
            })
            $(".filter_close").click(function(){
               $(".filter_sidebar").removeClass('active');
               $("body").css("overflow-y", "auto");
            })
        </script>

    </body>
</html>
