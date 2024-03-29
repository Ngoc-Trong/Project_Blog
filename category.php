<?php include 'include/db.php'; ?>
<?php include 'include/header.php'; ?>



<!-- Navigation -->
<?php 
include 'include/navigation.php'; 
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            if(isset($_GET['category'])){
                $the_cat_id = $_GET['category'];
            }
            if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){
                $query = "SELECT * FROM posts WHERE post_category_id = $the_cat_id ";
            }else{
            $query = "SELECT * FROM posts WHERE post_category_id = $the_cat_id AND post_status = 'published'";}
            $select_all_posts_query = mysqli_query($connection, $query);
            if(mysqli_num_rows($select_all_posts_query) < 1){
                echo "<h1>NO CATEGORY AVAILABLE</h1>";
            }else{
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,100);

                ?>
                <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
            <a href="/cms/post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
            <hr>
        <img class="img-responsive" src="/cms/images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo $post_content ;?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
                
          <?php  }} ?>
           





            <!-- Second Blog Post -->
            <!-- <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->

            <!-- Third Blog Post -->
            <!-- <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:45 PM</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->
            

            <!-- Pager -->
            <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> 
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include 'include/sidebar.php'; ?>  
    </div>
   

<!-- /.row -->
</div>

<hr>

<?php include 'include/footer.php'; ?>