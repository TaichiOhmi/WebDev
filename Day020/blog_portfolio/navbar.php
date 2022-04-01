<nav class="navbar navbar-expand-sm navbar-dark bg-dark px-3">
    <!-- <a class="navbar-brand" href="#">
        <i class="fa-solid fa-bullhorn text-white"></i>
    </a> -->
    <a href="posts.php" class="navbar-brand">
        <h1 class="h5">Blog Posts</h1>
    </a>
    <ul class="navbar-nav me-auto">
        <li class="nav-item ">
            <a href="profile.php" class="nav-link"><?= $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
            <a href="users.php" class="nav-link">Users</a>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a href="createNewCategory.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item">
            <a href="createNewPost.php" class="nav-link">New Post</a>
        </li>
        <li class="nav-item">
            <a href='logout.php' class="nav-link">Log out</a>
        </li>
    </ul>
</nav>