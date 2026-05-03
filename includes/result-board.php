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
                            <div class="result-info">
                                <h4 class="result-card-title">Result Title</h4>
                                <p class="result-publish-date">Publish Date</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- 2nd: result card  -->
                        <div class="result-card">
                            <div class="result-info">
                                <h4 class="result-card-title">Result Title</h4>
                                <p class="result-publish-date">Publish Date</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- 3rd: result card  -->
                        <div class="result-card">
                            <div class="result-info">
                                <h4 class="result-card-title">Result Title</h4>
                                <p class="result-publish-date">Publish Date</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- 4th: result card  -->
                        <div class="result-card">
                            <div class="result-info">
                                <h4 class="result-card-title">Result Title</h4>
                                <p class="result-publish-date">Publish Date</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- 5th: result card  -->
                        <div class="result-card">
                            <div class="result-info">
                                <h4 class="result-card-title">Result Title</h4>
                                <p class="result-publish-date">Publish Date</p>
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
                            <img src="./assets/vacancy-images/account officer 50.png" alt="image" loading="lazy">
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