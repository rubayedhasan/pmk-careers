<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Careers Page</title>
    <style>
        :root {
            --pmk-green: #00946a;
            --pmk-green-dark: #176f4e;
            --pmk-green-dark-sublet: #1e2d26;
            --pmk-green-light: #e6f4ef;
            --pmk-blue-dark: #083d56;
            --pmk-dark: #1f2933;
            --pmk-dark-sublet: #1d2a24;
            --pmk-white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--pmk-green-dark-sublet);
            color: #222;
        }

        a {
            text-decoration: none;
            color: inherit
        }

        .container {
            width: min(1180px, 92%);
            margin: auto
        }

        .hero {
            position: relative;
            background: linear-gradient(135deg, var(--pmk-blue-dark), var(--pmk-dark));
            color: var(--pmk-white);
            padding: 30px 0 140px;
            border-bottom-left-radius: 120px;
            overflow: hidden
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 60px
        }

        .logo {
            font-weight: 700;
            color: var(--pmk-green-light)
        }

        .btn {
            background: var(--pmk-green);
            color: var(--pmk-white);
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            cursor: pointer
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.1fr .9fr;
            gap: 40px;
            align-items: center
        }

        .hero h1 {
            font-size: 58px;
            line-height: 1.05;
            margin-bottom: 18px
        }

        .hero h1 span {
            color: var(--pmk-green)
        }

        .hero p {
            opacity: .8
        }

        .art {
            height: 360px;
            position: relative
        }

        .cube {
            position: absolute;
            background: #2a315c;
            border-radius: 10px
        }

        .cube.blue {
            background: var(--pmk-green)
        }

        .person {
            position: absolute;
            right: 80px;
            bottom: 20px;
            width: 90px;
            height: 220px;
            background: #59608d;
            border-radius: 40px
        }

        .wave {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            height: 170px;
            background: var(--pmk-green-light);
            clip-path: path('M0,90 C180,170 320,10 520,70 C720,130 860,190 1060,110 C1240,40 1380,30 1600,95 L1600,220 L0,220 Z')
        }

        .main {
            background: var(--pmk-green-light);
            padding: 40px 0 80px
        }

        .section-title {
            color: var(--pmk-green);
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 12px
        }

        .lead {
            font-size: 34px;
            font-weight: 700;
            max-width: 780px;
            margin-bottom: 30px
        }

        .job-card {
            background: var(--pmk-white);
            border: 1px solid #dbe2f2;
            border-radius: 10px;
            margin-bottom: 14px;
            overflow: hidden
        }

        .job-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 20px;
            cursor: pointer
        }

        .job-head h3 {
            font-size: 18px;
            color: var(--pmk-blue-dark)
        }

        .status {
            font-size: 13px;
            color: var(--pmk-green-dark)
        }

        .status.inactive {
            color: #dc2626
        }

        .toggle {
            font-size: 22px;
            color: var(--pmk-green);
            margin-right: 12px
        }

        .job-left {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .job-body {
            display: none;
            padding: 0 20px 22px;
            color: #555;
            line-height: 1.6
        }

        .job-body.open {
            display: block
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px
        }

        .cta {
            margin-top: 34px;
            background: linear-gradient(135deg, var(--pmk-green), var(--pmk-green-dark));
            color: var(--pmk-white);
            border-radius: 18px;
            padding: 34px;
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .footer {
            background: var(--pmk-dark);
            color: #cfd5ef;
            padding: 55px 0
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 24px
        }

        .footer h4 {
            color: var(--pmk-white);
            margin-bottom: 12px
        }

        .footer ul {
            list-style: none
        }

        .footer li {
            margin: 7px 0;
            color: #aeb7d8
        }

        .copy {
            text-align: center;
            margin-top: 30px;
            color: #8d96b8
        }

        .dots {
            position: absolute;
            top: 30px;
            right: 120px;
            letter-spacing: 6px;
            opacity: .3
        }

        .shape {
            position: absolute;
            border: 1px solid rgba(78, 124, 255, .35);
            transform: rotate(45deg)
        }

        @media(max-width:900px) {
            .hero {
                padding: 20px 0 110px;
                border-bottom-left-radius: 70px
            }

            .hero-grid,
            .grid,
            .footer-grid {
                grid-template-columns: 1fr
            }

            .nav {
                gap: 12px;
                flex-wrap: wrap
            }

            .hero h1 {
                font-size: 42px
            }

            .art {
                height: 280px
            }

            .cta {
                flex-direction: column;
                gap: 18px;
                align-items: flex-start
            }

            .job-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px
            }
        }

        @media(max-width:768px) {
            .container {
                width: min(100%, 94%)
            }

            .hero {
                padding: 18px 0 90px
            }

            .nav {
                margin-bottom: 30px
            }

            .btn {
                padding: 10px 18px;
                font-size: 14px
            }

            .hero h1 {
                font-size: 34px
            }

            .lead {
                font-size: 26px
            }

            .section-title {
                font-size: 13px
            }

            .wave {
                height: 130px;
                bottom: -65px
            }

            .art {
                height: 220px
            }

            .person {
                right: 40px;
                width: 70px;
                height: 170px
            }

            .cube {
                transform: scale(.8)
            }

            .job-head h3 {
                font-size: 16px
            }

            .job-body {
                font-size: 14px
            }

            .footer {
                padding: 40px 0
            }
        }

        @media(max-width:520px) {
            body {
                font-size: 14px
            }

            .hero {
                border-bottom-left-radius: 40px
            }

            .logo {
                font-size: 14px
            }

            .nav {
                justify-content: space-between
            }

            .hero h1 {
                font-size: 28px;
                line-height: 1.15
            }

            .hero p {
                font-size: 14px
            }

            .lead {
                font-size: 22px
            }

            .dots {
                display: none
            }

            .art {
                height: 180px
            }

            .person {
                right: 20px;
                bottom: 10px;
                width: 56px;
                height: 140px
            }

            .cube {
                transform: scale(.65);
                transform-origin: left bottom
            }

            .job-card {
                border-radius: 8px
            }

            .job-head {
                padding: 14px
            }

            .status {
                font-size: 12px
            }

            .toggle {
                font-size: 18px
            }

            .cta {
                padding: 22px;
                border-radius: 14px
            }

            .cta h2 {
                font-size: 24px
            }

            .footer-grid {
                gap: 16px
            }

            .copy {
                font-size: 12px
            }
        }

        @media(max-width:380px) {
            .hero h1 {
                font-size: 24px
            }

            .lead {
                font-size: 20px
            }

            .btn {
                width: 100%;
                text-align: center
            }

            .nav .btn,
            .cta .btn {
                width: 100%
            }
        }
    </style>
</head>

<body>
    <header class="hero">
        <div class="container">
            <div class="nav">
                <div class="logo">◈ PMK</div><button class="btn">Back to home</button>
            </div>
            <div class="dots">••••••••</div>
            <div class="hero-grid">
                <div>
                    <h1><span>Careers</span> at<br>PMK NGO.</h1>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="art">
                    <div class="cube" style="left:30px;bottom:40px;width:90px;height:90px"></div>
                    <div class="cube blue" style="left:110px;bottom:90px;width:70px;height:70px"></div>
                    <div class="cube" style="left:170px;bottom:30px;width:120px;height:120px"></div>
                    <div class="cube blue" style="left:230px;bottom:140px;width:60px;height:60px"></div>
                    <div class="person"></div>
                </div>
            </div>
        </div>
        <div class="wave"></div>
    </header>
    <main class="main">
        <div class="container">
            <div class="section-title">PMK Career Opportunities</div>
            <div class="lead">Sed ut perspiciatis unde omnis iste natus error totam rem dicta sunt nemo enim ipsum quia non eius.</div>
            <div id="jobs"></div>
            <div class="cta">
                <div>
                    <h2>No position for you?</h2>
                    <p>Send your CV and we'll keep it on file.</p>
                </div><button class="btn">Send CV</button>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h4>PMK</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                </div>
                <div>
                    <h4>Pages</h4>
                    <ul>
                        <li>Home</li>
                        <li>Careers</li>
                        <li>Contact</li>
                    </ul>
                </div>
                <div>
                    <h4>Links</h4>
                    <ul>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                        <li>Lorem ipsum</li>
                    </ul>
                </div>
                <div>
                    <h4>Information</h4>
                    <ul>
                        <li>Serbia</li>
                        <li>United States</li>
                        <li>United Kingdom</li>
                    </ul>
                </div>
            </div>
            <div class="copy">Copyright © PMK 2024</div>
        </div>
    </footer>
    <script>
        const data = [{
                title: 'Senior DevOps Engineer',
                active: true,
                body: 'Build CI/CD pipelines, manage cloud infrastructure, automate deployments, and improve reliability.'
            },
            {
                title: 'Senior / Medior Front-End (React) Developer',
                active: true,
                body: 'Develop responsive interfaces using HTML, CSS, JavaScript and React. Collaborate with designers and backend engineers.'
            },
            {
                title: 'Medior UI/UX Designer',
                active: false,
                body: 'Create user flows, prototypes, design systems, and polished interfaces for web products.'
            },
            {
                title: 'Senior iOS Developer',
                active: false,
                body: 'Build and maintain native iOS apps using Swift with strong architecture and testing practices.'
            }
        ];
        const wrap = document.getElementById('jobs');
        wrap.innerHTML = data.map((j, i) => `<div class='job-card'><div class='job-head' data-i='${i}'><div class='job-left'><span class='toggle'>+</span><h3>${j.title}</h3></div><div class='status ${j.active?'':'inactive'}'>${j.active?'● Active position':'● Inactive position'}</div></div><div class='job-body ${i===1?'open':''}'>${j.body}</div></div>`).join('');
        document.querySelectorAll('.job-head').forEach(h => h.onclick = () => {
            const b = h.nextElementSibling;
            b.classList.toggle('open');
            h.querySelector('.toggle').textContent = b.classList.contains('open') ? '−' : '+'
        });
    </script>
</body>

</html>