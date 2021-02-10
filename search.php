<?php include "includes/db.php";  ?>

<!-- H  E  A  D  E  R -->
<?php include "includes/header.php";  ?>

<body>
    <!-- N  A  V  B  A  R -->
    <?php include "includes/navigation.php";  ?>
<div class="headerss" >
  <h1>E-Today</h1>
  <p><b>News</b> at your fingertips.</p>
</div>

    <!-- Page Content -->
    <div class="container" style="padding-top: 30px;">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <!-- First Blog Post -->
                <?php

                if (isset($_POST["submit"])) {
                    $search = $_POST['search'];

                    $sql = "SELECT * from posts where post_tags like '%$search%' ";
                    $search_query = mysqli_query($conn, $sql);
                    if (!$search_query) {
                        die("Failed" . mysqli_error($conn));
                    }
                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                        echo "<h1>No Results</h1>";
                    }
                    if ($count == !0) {
                        echo "<h1>Results Found!</h1>";
                        $sql = "SELECT * from posts where post_tags like '%$search%'";
                        $posts_query = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($posts_query)) {
                            $post_id =$row['post_id'];
                            $post_title = $row['post_title'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];


                ?>
                
        
                <h2>
                    <a href="post.php?post_id=<?php echo $post_id;  ?> "><?php echo $post_title;  ?></a>
                </h2>
            
                <p><span class=glyphicon glyphicon-time></span> Posted on <?php echo $post_date;  ?></p>
                
                <img class="img-responsive" src="./images/<?php echo $post_image;  ?>" alt="">
                <p><?php echo $post_content;  ?></p>
                <a class='btn btn-primary' href=>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                <hr>
            <?php 
                } 
            }
        }
            ?>


                <!-- \ Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>



            <!-- S  I  D  E  B  A  R  -->
            <?php include "includes/sidebar.php";  ?>




        </div>
        <!-- /.row -->

        <hr>


        <!-- F  O  O  T  E  R -->
        <?php include "includes/footer.php";  ?>



    </div>





    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>