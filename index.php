<?php include('partials-front/menu.php'); ?>

<!-- PRODUCT SEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <h1>Find Your Favorite Foods 🍔</h1>
<p>Search from our delicious menu</p>
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for foods" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- PRODUCT SEARCH Section Ends Here -->

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">EXPLORE FOOD CATEGORIES</h2>

        <?php 
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 50";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="box-3">
                        <a href="<?php echo SITEURL; ?>category-food.php?category_id=<?php echo $id; ?>">
                            
                            <?php 
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                                    <?php
                                }
                            ?>

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </a>
                    </div>

                    <?php
                }
            }
            else
            {
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>

    </div>
</section>
<!-- Categories Section Ends Here -->


<!-- PRODUCT MENU Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">FOOD PRODUCTS</h2>

        <?php 
        $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if($count2>0)
        {
            while($row=mysqli_fetch_assoc($res2))
            {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <!-- UPDATED STRUCTURE -->
                <div class="food-menu-box">

                    <div class="food-menu-img">
                        <?php 
                            if($image_name=="")
                            {
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>">
                                <?php
                            }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">₹<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>

                        <a href="<?php echo SITEURL; ?>purchase.php?food_id=<?php echo $id; ?>" class="btn btn-primary">
                            Order Now
                        </a>
                    </div>

                </div>

                <?php
            }
        }
        else
        {
            echo "<div class='error'>Food not available.</div>";
        }
        ?>

    </div>

    <p class="text-center" style="margin-top:20px;">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- PRODUCT MENU Section Ends Here -->

<?php include('partials-front/footer.php'); ?>
