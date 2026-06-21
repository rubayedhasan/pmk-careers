<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circular Details</title>
    <!-- Linked Favicon  -->
    <link rel="shortcut icon" href="../assets/logo/main-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../styles/index.css">
    <style>
        #circular-details-header {
            height: 100vh;
            color: var(--pmk-white);
            background: linear-gradient(135deg, var(--pmk-blue-dark), #1f2933d1);
            padding: 30px 0 140px;
            overflow: hidden;
            position: relative;
        }

        .career-nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        .pmk-logo {
            width: 50px;
        }

        .pmk-logo img {
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        .home-button {
            display: block;
            color: var(--pmk-white);
            background-color: var(--pmk-green);
            padding: 12px 22px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;

            transition: all 0.5s ease;
        }

        .home-button:hover {
            background-color: var(--pmk-green-dark);
        }

        .career-header-container {
            margin-top: 50px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 40px;
        }

        .header-title {
            font-size: 3.25rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .header-title span {
            color: var(--pmk-green);
        }

        .header-text {
            color: var(--pmk-white);
        }

        .art-image {
            width: 365px;
            justify-self: flex-end;
        }

        .art-image img {
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        .wave {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            height: 180px;
            background-color: var(--pmk-green-light);
            clip-path: path("M0,90C216,170 384,10 624,70C864,130 1032,190 1272,110C1488,40 1656,30 1920,95L1920,220L0,220Z");
        }




        /* responsive styles:: small devices  */
        @media (max-width: 767.98px) {
            #circular-details-header {
                height: auto;
            }

            .pmk-logo {
                width: 40px;
            }

            .home-button {
                padding: 10px 18px;
                font-size: 0.85rem;
            }

            .career-header-container {
                grid-template-columns: repeat(2, 1fr);
            }

            .header-title {
                font-size: 2.5rem;
            }

            .art-image {
                width: 230px;
            }


        }

        @media (max-width: 576.98px) {
            .career-header-container {
                grid-template-columns: 1fr;
            }

            .header-content {
                order: 2;
            }

            .header-title {
                font-size: 2.5rem;
            }

            .art-image {
                order: 1;
                width: 100%;
            }
        }

        /* responsive styles:: medium devices  */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .pmk-logo {
                width: 40px;
            }

            .home-button {
                padding: 10px 18px;
                font-size: 0.85rem;
            }

            .header-title {
                font-size: 2.75rem;
            }

            .header-text {
                font-size: 0.95rem;
            }

            .art-image {
                width: 280px;
            }


        }
    </style>
</head>

<body>
    <header id="circular-details-header">
        <div class="container-width">
            <div class="career-nav">
                <figure class="pmk-logo">
                    <a href="https://pmk.org.bd/">
                        <img src="../assets/logo/main-logo.png" alt="pmk logo">
                    </a>
                </figure>

                <div>
                    <a class="home-button" href="../index.php">Back To Home</a>
                </div>
            </div>
            <div class="career-header-container">
                <hgroup class="header-content">
                    <h2 class="header-title">
                        <span>Current</span>
                        Opening
                    </h2>
                    <p class="header-text">
                        Explore the details of this position and see if it’s the right fit for you.
                    </p>
                </hgroup>

                <figure class="art-image">
                    <img src="../assets/images/Working remotely-bro.png" alt="working image">
                </figure>

            </div>
        </div>
        <div class="wave"></div>
    </header>

    <main style="display: flex; justify-content: center;">
        <iframe
            src="../assets/vacancy-docs/Florence_Nightingale_Nursing_Admission_Coaching.pdf"
            width="50%"
            height="1000px" style="margin: 30px 0px;">
        </iframe>
    </main>
</body>

</html>