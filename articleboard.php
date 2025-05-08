<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $title = $_POST['title'];
    $content = $_POST['content'];
    $description = $_POST['description'];
    $authort = $_POST['author'];

    $slug = $_POST['slug'];


    $stmt = $conn->prepare("INSERT INTO empirearticle (id, title, content, description, author, slug) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $id, $title, $content, $description, author, $slug);

    if ($stmt->execute()) {
        echo "Article created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grand Dragon</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Quill.js CSS -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">



    <style>
        h1 {
            text-align: center;
            color: #007bff;
        }

        h2 {
            color: #007bff;
        }

        /* Form Styling */
        form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        input[type="text"],
        input[type="file"],
        button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="file"] {
            width: auto;
        }


        #post-editor {
            height: 400px;
            /* Adjust height as needed */
            margin-bottom: 20px;
        }

        .ql-editor img {
            max-width: 100%;
            /* Responsive size */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            /* Subtle shadow */
            margin: 10px 0;
            /* Margin for spacing */
            object-fit: cover;
            /* Cover the area without distortion */
        }

        .export-button {
            background-color: #007bff;
            /* Bootstrap primary color */
            color: white;
            border: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 30px;
            /* Spacing between buttons */
            transition: background-color 0.3s;
        }

        .export-button:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
        }

        .button-container {
            display: flex;
            /* Align buttons horizontally */
            justify-content: flex-end;
            /* Align buttons to the right */
            margin: 0px 0;
            /* Add some margin */
        }

        #emailList {
            list-style: none;
            /* Remove bullet points from the list */
            padding: 0;
            /* Remove padding */
        }

        #emailList li {
            display: flex;
            /* Use flexbox to align items */
            justify-content: space-between;
            /* Space out the email text and delete button */
            align-items: center;
            /* Center items vertically */
            padding: 10px;
            border-bottom: 1px solid #ddd;
            /* Add border between list items */
            margin: 0;
            /* Remove margin to keep list items aligned */
        }

        .delete-button {
            background-color: #ff4d4d;
            /* Red color for delete button */
            color: white;
            /* White text */
            border: none;
            /* Remove border */
            border-radius: 5px;
            /* Rounded corners */
            padding: 5px 10px;
            /* Padding for the button */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        .delete-button:hover {
            background-color: #ff1a1a;
            /* Darker red on hover */
        }
    </style>

    <style>
        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Table Styling */
        /* Table Styling */
        /* Table Styling */
        .article-table {
            width: 95%;
            border-collapse: collapse;
            margin-top: 10px;
            /* Reduced top margin */
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            /* Automatically adjust left margin */
            margin-right: auto;
            /* Automatically adjust right margin */
        }

        .article-table th,
        .article-table td {
            padding: 3px 5px;
            /* Reduced padding inside table cells */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .article-table th {
            background-color: #f4f4f4;
            color: #007bff;
        }

        /* Ensuring action buttons are on the same line with borders */
        .action-buttons {
            display: flex;
            /* Use flexbox to align buttons horizontally */
            gap: 10px;
            /* Adds space between buttons */
        }

        .action-buttons button {
            padding: 5px 10px;
            /* Reduced button padding */
            border: 2px solid #ddd;
            /* Adding a border to the button */
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-left: 5px;
            /* Added left margin */
            margin-right: 5px;
            /* Added right margin */
            transition: all 0.3s ease;
            /* Smooth transition for hover effect */
        }

        .edit-btn {
            background-color: #28a745;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .edit-btn:hover {
            background-color: #218838;
            border-color: #1e7e34;
            /* Darker border on hover */
        }

        .delete-btn:hover {
            background-color: #c82333;
            border-color: #bd2130;
            /* Darker border on hover */
        }


        /* Pagination Styling */
        .pagination {
            display: flex;
            justify-content: center;
            /* Centers the pagination buttons horizontally */
            align-items: center;
            /* Vertically centers the pagination buttons */
            margin-top: 20px;
            max-width: 300px;
            /* Limit the width of pagination */
            width: 100%;
            overflow: hidden;
            /* Prevent overflow if items extend beyond max-width */
            margin-left: auto;
            /* Automatically adjust left margin */
            margin-right: auto;
            /* Automatically adjust right margin */
        }

        #pagination {
            margin-bottom: 20px; /* Adjust the value to your desired margin */
        }


        .pagination button {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            background-color:rgb(145, 145, 145);
            margin: 0 5px;
        }

        .pagination button:hover {
            background-color: #e2e6ea;
        }

        /* Quill Editor Styling */
        #editor-container {
            height: 90vh;
            min-height: 300px;
            max-height: 900px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Card Layout for Articles */
        .article-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-card h3 {
            color: #007bff;
            margin-bottom: 10px;
        }

        .article-card p {
            color: #555;
            margin-bottom: 10px;
        }

        .view-btn {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .view-btn:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body id="page-top">




    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">Grand Dragon</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="email-list.php">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span>Email List</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="staff.php">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                    <span>Staff</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="articleboard.php">
                    <i class="fas fa-archive fa-2x"></i>
                    <span>Article</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <h1>Write an Article</h1>


                <button onclick="window.location.href='article.php';" style="background-color: green; color: white; 
                                margin-left: 20px; margin-right: 40px; 
                                padding: 10px 20px; max-width: 200px;">
                    View All Articles
                </button> 

                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>

                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" required>

                    <label for="content">Content:</label>
                    <!-- Quill editor container -->
                    <div id="editor-container" style="height: 800px;"></div>
                    <!-- Hidden input to store Quill content -->
                    <input type="hidden" name="content" id="content">

                    <div>
                        <label for="image">Upload Cover Image:</label>
                        <input type="file" name="image" id="image" required>
                    </div>

                    <div>
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" required>
                    </div>

                    <button type="submit">Submit</button>
                </form>

                <!-- Include Quill JS -->
                <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
                <script>
                    // Initialize Quill editor
                    const quill = new Quill('#editor-container', {
                        theme: 'snow',
                        placeholder: 'Write your article here...',
                        modules: {
                            toolbar: {
                                container: [
                                    [{
                                        'header': [1, 2, false]
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    [{
                                        'align': []
                                    }],
                                    ['link', 'image'],
                                    [{
                                        'undo': true
                                    }, {
                                        'redo': true
                                    }] // Add Undo/Redo buttons
                                ],
                               
                                handlers: {
                                    image: function () {
                                        const input = document.createElement('input');
                                        input.setAttribute('type', 'file');
                                        input.setAttribute('accept', 'image/*');
                                        input.click();

                                        input.onchange = async () => {
                                            const file = input.files[0];
                                            const formData = new FormData();
                                            formData.append('image', file);

                                            // Upload the image to the server
                                            const response = await fetch('image_upload.php', {
                                                method: 'POST',
                                                body: formData,
                                            });

                                            const data = await response.json();
                                            if (data.success) {
                                                const range = quill.getSelection();
                                                quill.insertEmbed(range.index, 'image', data.url);
                                            } else {
                                                alert('Image upload failed');
                                            }
                                        };
                                    },
                                    'undo': function () {
                                        quill.history.undo(); // Undo action
                                    },
                                    'redo': function () {
                                        quill.history.redo(); // Redo action
                                    }
                                },
                            },
                            history: {
                                delay: 1000,
                                maxStack: 50,
                                userOnly: true
                            }
                        },
                    });

                    // Handle form submission
                    const form = document.querySelector('form');
                    form.onsubmit = function () {
                        // Get HTML content from Quill and set it to the hidden input
                        const contentInput = document.querySelector('#content');
                        contentInput.value = quill.root.innerHTML;
                    };
                </script>
            

            

                

                <h1>Manage Articles</h1>
                <!-- Add sorting options above the table -->
                <div style="margin-left: 20px; margin-right: 40px; padding: 10px 20px; max-width: 200px;">
                    <div id="article-count"></div>

                    <label for="sort-order">Sort By:</label>
                    <select id="sort-order" name="sort-order">
                        <option value="latest">Latest Article</option>
                        <option value="az">A-Z</option>
                        <option value="first">First Article</option> <!-- Add First option -->
                    </select>
                </div>



                <div id="article-list-container">
                    <table class="article-table" id="article-list">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="article-list-body"></tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination" id="pagination"></div>
                </div>

                
                <script>
                    

                    // Generate slug from title
                    function generateSlug(title) {
                        return title.toLowerCase()
                            .replace(/[^a-z0-9 -]/g, '') // Remove non-alphanumeric characters
                            .replace(/\s+/g, '-') // Replace spaces with hyphens
                            .replace(/-+/g, '-'); // Remove multiple hyphens
                    }



                    

                    // Pagination variables
                    const articlesPerPage = 10;
                    let currentPage = 1;

                    async function loadArticles() {
                        const sortOrder = document.getElementById('sort-order').value;
                        try {
                            const response = await fetch(`epCount.php?page=${currentPage}&limit=${articlesPerPage}&sort=${sortOrder}`);
                            
                            // Log the raw response text to understand its structure
                            const textResponse = await response.text();
                            

                            if (!response.ok) throw new Error('Failed to fetch articles');

                            // Attempt to parse the response as JSON
                            const data = JSON.parse(textResponse);
                            console.log('Parsed JSON data:', data);

                            // Check if articles and totalArticles exist in the response
                            if (data && data.articles && Array.isArray(data.articles)) {
                                const { articles, totalArticles } = data;

                                // Display the total article count
                                const articleCountElement = document.getElementById('article-count');
                                articleCountElement.textContent = `Total Articles: ${totalArticles}`;

                                // Display articles in table
                                const articleListBody = document.getElementById('article-list-body');
                                articleListBody.innerHTML = ''; // Clear previous content

                                articles.forEach(article => {
                                    const articleRow = document.createElement('tr');
                                    articleRow.id = `article-${article.slug}`; // Use slug as the ID
                                    articleRow.innerHTML = `
                                        <td>${article.title}</td>
                                        <td>${article.author || 'Anonymous'}</td>
                                        <td>${article.description}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button onclick="window.location.href='edit.php?slug=${article.slug}'" class="edit-btn">Edit</button>
                                                <button class="delete-btn" onclick="deleteArticle('${article.slug}')">Delete</button>
                                            </div>
                                        </td>
                                    `;
                                    articleListBody.appendChild(articleRow);
                                });

                                // Handle pagination
                                const totalPages = Math.ceil(totalArticles / articlesPerPage);
                                const paginationContainer = document.getElementById('pagination');
                                paginationContainer.innerHTML = ''; // Clear previous pagination

                                for (let i = 1; i <= totalPages; i++) {
                                    const pageButton = document.createElement('button');
                                    pageButton.textContent = i;
                                    pageButton.onclick = () => {
                                        currentPage = i;
                                        loadArticles(); // Reload articles for the selected page
                                    };
                                    paginationContainer.appendChild(pageButton);
                                }
                            } else {
                                console.error('Invalid data structure received:', data);
                            }
                        } catch (error) {
                            console.error('Error loading articles:', error);
                        }
                    }

                    // Update the articles when the sort order changes
                    document.getElementById('sort-order').addEventListener('change', loadArticles);

                    // Delete article
                    async function deleteArticle(slug) {
                        if (!slug) {
                            alert('Invalid slug');
                            return;
                        }

                        if (!confirm('Are you sure you want to delete this article?')) return;

                        try {
                            const response = await fetch(`delete_article.php?slug=${encodeURIComponent(slug)}`, {
                                method: 'GET', // Change to 'DELETE' if needed and supported by your backend
                            });

                            const text = await response.text(); // Get raw response
                            console.log('Raw response:', text); // Debug the response

                            const data = JSON.parse(text);

                            if (data.success) {
                                alert('Article deleted successfully!');
                                // Optionally remove the article from the UI
                                const articleRow = document.getElementById(`article-${slug}`);
                                if (articleRow) articleRow.remove();
                            } else {
                                alert(data.error || 'Failed to delete the article.');
                            }
                        } catch (error) {
                            console.error('Error deleting article:', error);
                            alert('Error deleting article.');
                        }
                    }

                    // Load articles on page load
                    loadArticles();
                </script>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; www.empireglobal.co.th 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>



</body>

</html>