<?php include 'include/head.php'?>
<body>
    <div class="wrapper">
        <?php include 'include/sidebar.php'?>
        <div class="main">
            <?php include 'include/header.php'?>
            
            <main class="content">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="card flex-fill">
                            <form action="updateProd" method="post">
                            <!-- single product -->
                            <div class="single-product mt-5 mb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="product-item">
                                                <img class="img-fluid" src="<?=base_url('/uploads/'.$selectedProduct['image'])?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="single-product-content">
                                                <input type="hidden" name="furnitureID" id="furnitureID" value="<?=$selectedProduct['furnitureID']?>">
                                                <!-- Furniture Name -->
                                                <div class="form-group my-2">
                                                    <label for="furnitureName" class="fs-3">Furniture Name:</label>
                                                    <input type="text" class="form-control" id="furnitureName" name="furnitureName" value="<?=$selectedProduct['furnitureName']?>" required>
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="furnitureDescription" class="fs-4">Furniture Description:</label>
                                                    <textarea class="form-control" id="furnitureDescription" name="furnitureDescription" rows="5" required><?= htmlspecialchars($selectedProduct['furnitureDescription']) ?></textarea>
                                                </div>
                                                <!-- Furniture Price -->
                                                <div class="form-group my-3">
                                                    <label for="furniturePrice" class="fs-4">Furniture Price (PHP):</label>
                                                    <input type="number" class="form-control" id="furniturePrice" name="furniturePrice" value="<?=$selectedProduct['furniturePrice']?>" required>
                                                </div>

                                                <!-- Stock Quantity -->
                                                <div class="form-group my-3">
                                                    <label for="stockQuantity" class="fs-4">Stock Quantity:</label>
                                                    <input type="number" class="form-control" id="stockQuantity" name="stockQuantity" value="<?=$selectedProduct['stockQuantity']?>" required>
                                                </div>
                                                
                                                <input type="submit" class="btn btn-primary" value="Save"/>
                                                <a href="/products" class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end single product -->
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    
    </div>

    <?php include 'include/scripts.php'?>
</body>
</html>