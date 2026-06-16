<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pmk Notice Board</title>
    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="./styles/result-board.css">
</head>

<body>
    <main>
        <section id="result-board">
            <div class="container-width">
                <h3 class="result-title">Results</h3>

                <!-- result board  -->
                <div class="results-container">
                    <div class="results" id="resultList">
                        <!-- 1st: result card  -->
                        <div class="result-card">
                            <img src="./assets/results/co_exam_13.06.2026.jpeg" alt="" class="result-img">
                            <div class="result-info">
                                <h4 class="result-card-title">Credit Officer Selection Result</h4>
                                <p class="result-publish-date">16.06.2026</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- 2nd: result card  -->
                        <div class="result-card">
                            <img src="./assets/results/co_exam_09.05.2026.png" alt=""
                                class="result-img">
                            <div class="result-info">
                                <h4 class="result-card-title">Credit Officer Selection Result</h4>
                                <p class="result-publish-date">12.06.2026</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- 3rd: result card  -->
                        <div class="result-card">
                            <img src="./assets/results/co_exam_06.06.2026.png" alt="" class="result-img">
                            <div class="result-info">
                                <h4 class="result-card-title">Credit Officer Selection Result</h4>
                                <p class="result-publish-date">09.06.2026</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>
                    </div>
                </div>

                <!-- result view modal  -->
                <div class="result-view-modal">
                    <div class="result-modal-content">
                        <div class="modal-content-container">
                            <h4 class="modal-title">Result Title</h4>
                            <span class="close-result-modal">&times;</span>
                        </div>

                        <figure class="modal-result-image">
                            <img src="" alt="image" loading="lazy">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Linked custom script  -->
    <script src="./js/result-board.js"></script>
</body>

</html>