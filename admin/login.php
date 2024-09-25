<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <link rel="stylesheet" href="css/custom.css">

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
        >
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page"
                                >Home
                                <span class="visually-hidden">(current)</span></a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="dropdownId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                >Dropdown</a
                            >
                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownId"
                            >
                                <a class="dropdown-item" href="#"
                                    >Action 1</a
                                >
                                <a class="dropdown-item" href="#"
                                    >Action 2</a
                                >
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        <input
                            class="form-control me-sm-2"
                            type="text"
                            placeholder="Search"
                        />
                        <button
                            class="btn btn-outline-success my-2 my-sm-0"
                            type="submit"
                        >
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        
        <main class="container">
            <form id="loginForm" action="">
                <h3>Admin Login</h3>
                <div id="result"></div>
                <input type="text" id="username" class="mt-3 form-control" placeholder="username">
                <input type="password" id="password" class="mt-3 form-control" placeholder="password">
                <button type="submit" name="login" class="mt-3 btn btn-primary">Login</button>
            </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        <script>
            $(document).ready(function() {
                $('#loginForm').on('submit', function(e) {
                    e.preventDefault();

                    // Gather form data
                    var username = $('#username').val();
                    var password = $('#password').val();

                    // Send AJAX request to the server
                    $.ajax({
                        url: 'login_db.php',
                        type: 'POST',
                        data: {
                            username: username,
                            password: password
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Display result
                            if (response.status === 'success') {
                                window.location.href = "index.php";
                                $('#result').html('<p style="color:green;">' + response.message + '</p>');
                            } else {
                                $('#result').html('<p style="color:red;">' + response.message + '</p>');
                            }
                        },
                        error: function(response) {
                            console.log(response)
                            $('#result').html('<p style="color:red;">An error occurred. Please try again.</p>');
                        }
                    });
                });
            });
    </script>
    </body>
</html>
