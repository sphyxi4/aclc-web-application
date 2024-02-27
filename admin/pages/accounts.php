<?php
session_start();

if (isset($_SESSION['username'])) {

    ?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="description" content=""/>
        <title>Admin</title>
        <link
            rel="stylesheet"
            href="../../node_modules/bootstrap/dist/css/bootstrap.min.css"
        />

        <link href="../assets/sidebars.css" rel="stylesheet"/>
    </head>
    <body>
    <main class="d-flex flex-nowrap">
        <div
            class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark"
            style="width: 280px"
        >
            <a
                href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
            >
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"/>
                </svg>
                <span class="fs-4">Admin</span>
            </a>
            <hr/>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white" aria-current="page">
                        <img src="../assets/git-alt.svg" alt="" class="bi pe-none me-2" width="16" height="16">

                        Repositories
                    </a>
                </li>
                <li>
                    <a href="accounts.php" class="nav-link active">
                        <img src="../assets/user.svg" alt="" class="bi pe-none me-2" width="16" height="16">

                        Accounts
                    </a>
                </li>
                <li>
                    <a href="comments.php" class="nav-link text-white">
                        <img src="../assets/comment-solid.svg" alt="" class="bi pe-none me-2" width="16" height="16">

                        Comments
                    </a>
                </li>
                <li>
                    <a href="messages.php" class="nav-link text-white">
                        <img src="../assets/message-solid.svg" alt="" class="bi pe-none me-2" width="16" height="16">
                        Messages
                    </a>
                </li>

            </ul>
            <hr/>
            <div class="dropdown">
                <a
                    href=""
                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <img
                        src="../assets/user.svg"
                        alt=""
                        width="32"
                        height="32"
                        class="rounded-circle me-2"
                    />
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="../scripts/authentication/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
        <div class="container mt-5 overflow-auto">
            <h2>Accounts List</h2>
            <a href="search/search_account.php" class="btn btn-primary">Search</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                require_once('../../db.php');

                $query = mysqli_query($conn, "SELECT * FROM accounts;");

                while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $row['full_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>

                        <td>
                            <a type="button" class="btn btn-warning btn-sm" href="./update/update_account.php?id=<?php echo $row['id']?>">
                                Update
                            </a>
                            <a type="button" class="btn btn-danger btn-sm delbtn" href="../scripts/crud/delete_account.php?id=<?php echo $row['id']?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>


                </tbody>
            </table>
        </div>
    </main>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./js/delete.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/sidebars.js"></script>
    </body>
    </html>

    <?php
} else {
    header("Location: ../index.php");
    exit();
}
?>