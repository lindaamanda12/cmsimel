<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rental Mobil & Motor</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f8fafc;
            color:#1e293b;
        }

        html{
            scroll-behavior:smooth;
        }

        /* NAVBAR */

        nav{
            background:#0f172a;
            padding:18px 80px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            position:sticky;
            top:0;
            z-index:999;
            box-shadow:0 2px 10px rgba(0,0,0,.1);
        }

        .logo{
            font-size:30px;
            font-weight:bold;
            color:#38bdf8;
        }

        nav ul{
            display:flex;
            list-style:none;
            gap:30px;
        }

        nav ul li a{
            text-decoration:none;
            color:white;
            font-weight:600;
            transition:.3s;
        }

        nav ul li a:hover{
            color:#38bdf8;
        }

        /* HERO */

        .hero{
            height:85vh;
            background:
            linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
            url('https://static.wixstatic.com/media/261cbb_7b61efd5696448e195344b635b236e31~mv2.jpg/v1/fill/w_568,h_426,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/261cbb_7b61efd5696448e195344b635b236e31~mv2.jpg');
            background-size:cover;
            background-position:center;
            display:flex;
            justify-content:center;
            align-items:center;
            text-align:center;
            color:white;
        }

        .hero h1{
            font-size:65px;
            margin-bottom:20px;
        }

        .hero p{
            font-size:20px;
            max-width:700px;
            margin:auto;
            margin-bottom:30px;
            line-height:32px;
        }

        /* BUTTON */

        .btn{
            display:inline-block;
            background:#06b6d4;
            color:white;
            padding:14px 30px;
            border-radius:10px;
            text-decoration:none;
            transition:.3s;
        }

        .btn:hover{
            background:#0891b2;
        }

        /* CONTAINER */

        .container{
            width:90%;
            max-width:1400px;
            margin:auto;
            padding:80px 0;
        }

        .section-title{
            text-align:center;
            font-size:42px;
            margin-bottom:50px;
            color:#0f172a;
        }

        
        /* CARD */

        .card-container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
            gap:30px;
        }

        .card{
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-8px);
        }

        .card img{
            width:100%;
            height:220px;
            object-fit:cover;
        }

        .card-body{
            padding:20px;
        }

        .card-body h3{
            margin-bottom:10px;
        }

        .card-body p{
            color:#64748b;
            line-height:28px;
        }

        /* ==========================
            PROMO BANNER
        ========================== */

        .promo-container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(520px,1fr));
            gap:30px;
        }

        .promo-card{
            background:#fff;
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
            transition:.3s;
        }

        .promo-card:hover{
            transform:translateY(-5px);
        }

        .promo-card img{
            width:100%;
            height:auto;
            display:block;
            background:#f8fafc;
        }

        .promo-content{
            padding:24px;
        }

        .promo-title{
            font-size:28px;
            color:#0f172a;
            margin-bottom:12px;
        }

        .promo-desc{
            color:#64748b;
            line-height:28px;
            margin-bottom:20px;
        }

        .promo-btn{
            display:inline-block;
            background:#dc2626;
            color:#fff;
            text-decoration:none;
            padding:12px 24px;
            border-radius:8px;
            font-weight:600;
            transition:.3s;
        }

        .promo-btn:hover{
            background:#b91c1c;
            color:#fff;
        }

        /* ABOUT */

        .about-section{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:50px;
            align-items:center;
            background:white;
            padding:50px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
        }

        .about-image img{
            width:100%;
            height:450px;
            object-fit:cover;
            border-radius:20px;
        }

        .about-tag{
            background:#e0f2fe;
            color:#0284c7;
            padding:8px 18px;
            border-radius:50px;
            font-size:14px;
            display:inline-block;
            margin-bottom:20px;
        }

        .about-content h3{
            font-size:38px;
            margin-bottom:20px;
        }

        .about-content p{
            line-height:32px;
            color:#555;
            margin-bottom:15px;
            text-align:justify;
        }

        .about-stats{
            display:flex;
            gap:20px;
            margin-top:25px;
        }

        .stat-box{
            flex:1;
            background:#f8fafc;
            text-align:center;
            padding:20px;
            border-radius:15px;
        }

        .stat-box h4{
            color:#06b6d4;
            font-size:30px;
        }

        /* VEHICLE */

        .vehicle-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
            gap:30px;
        }

        .vehicle-card{
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .vehicle-card img{
            width:100%;
            height:250px;
            object-fit:cover;
        }

        .vehicle-content{
            padding:20px;
        }

        .vehicle-title{
            text-align:center;
            color:#dc2626;
            margin-bottom:20px;
            font-size:28px;
        }

        .vehicle-content ul{
            list-style:none;
            line-height:35px;
        }

        .vehicle-footer{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 20px;
            border-top:1px solid #eee;
        }

        .vehicle-price{
            font-size:24px;
            color:#dc2626;
            font-weight:bold;
        }

        .btn-wa{
            background:#dc2626;
            color:white;
            text-decoration:none;
            padding:12px 20px;
            border-radius:8px;
        }

        .note{
            text-align:center;
            padding:0 15px 15px;
            color:#64748b;
            font-size:13px;
        }

        /* REVIEW */

        .review-card{
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .review-card h3{
            color:#f59e0b;
            margin-bottom:15px;
        }

        /* FOOTER */

        footer{
            background:#0f172a;
            color:white;
            margin-top:50px;
        }

        .footer-container{
            width:90%;
            max-width:1400px;
            margin:auto;
            padding:60px 0;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:40px;
        }

        .footer-title{
            margin-bottom:15px;
            color:#38bdf8;
        }

        .footer-link{
            display:block;
            color:#cbd5e1;
            text-decoration:none;
            margin-bottom:10px;
        }

        .footer-link:hover{
            color:white;
        }

        .footer-bottom{
            text-align:center;
            padding:20px;
            border-top:1px solid rgba(255,255,255,.1);
        }

        /* WA FLOAT */

        .wa-float{
            position:fixed;
            bottom:25px;
            right:25px;
            background:#25D366;
            color:white;
            text-decoration:none;
            padding:15px 20px;
            border-radius:50px;
            font-weight:bold;
            box-shadow:0 5px 15px rgba(0,0,0,.2);
        }

        /* RESPONSIVE */

        @media(max-width:768px){

            nav{
                flex-direction:column;
                padding:20px;
                gap:15px;
            }

            nav ul{
                flex-wrap:wrap;
                justify-content:center;
            }

            .hero h1{
                font-size:40px;
            }

            .hero p{
                font-size:16px;
            }

            .section-title{
                font-size:30px;
            }

            .about-section{
                grid-template-columns:1fr;
                padding:25px;
            }

            .about-image img{
                height:250px;
            }

            .about-content h3{
                font-size:28px;
            }

            .about-stats{
                flex-direction:column;
            }

            .vehicle-footer{
                flex-direction:column;
                gap:10px;
            }

            .promo-container{
                grid-template-columns:1fr;
            }

            .promo-title{
                font-size:22px;
            }

            .promo-content{
                padding:18px;
            }

            

        }

    </style>

</head>

<body>

    <nav>

        <div class="logo">
            RENTALKU
        </div>

        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/mobil">Mobil</a></li>
            <li><a href="/motor">Motor</a></li>
            <li><a href="/kontak">Kontak</a></li>
        </ul>

    </nav>

    @yield('content')

    <a href="https://wa.me/62897654321" class="wa-float">
        WhatsApp
    </a>

    <footer>

        <div class="footer-container">

            <div>

                <h3 class="footer-title">
                    RENTALKU
                </h3>

                <p>
                    Penyedia jasa rental mobil dan motor terpercaya
                    dengan armada yang nyaman, bersih, dan siap digunakan.
                </p>

            </div>

            <div>

                <h3 class="footer-title">
                    Menu
                </h3>

                <a href="/" class="footer-link">Home</a>
                <a href="/mobil" class="footer-link">Mobil</a>
                <a href="/motor" class="footer-link">Motor</a>
                <a href="/kontak" class="footer-link">Kontak</a>

            </div>

            <div>

                <h3 class="footer-title">
                    Kontak
                </h3>

                <p>☎️ 0897654321</p>
                <br>
                <p>💌 info@rentalku.com</p>
                <br>
                <p>📍 Jl. Apel No.12, Yogayakarta</p>

            </div>

        </div>

        <div class="footer-bottom">
            © 2026 RENTALKU. All Rights Reserved.
        </div>

    </footer>

</body>

</html>