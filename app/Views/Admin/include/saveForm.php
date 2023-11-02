<!-- Modal -->
<div class="modal fade" id="saveProductModal" tabindex="-1" aria-labelledby="AddProdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/saveProduct" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 fw-bold" id="EditProdModalLabel">Add Furniture</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Furniture Name -->
                <div class="form-group">
                    <label for="furnitureName">Furniture Name:</label>
                    <input type="text" class="form-control" id="furnitureName" name="furnitureName" required>
                </div>

                <!-- Furniture Description -->
                <div class="form-group my-2">
                    <label for="furnitureDescription">Furniture Description:</label>
                    <textarea class="form-control" id="furnitureDescription" name="furnitureDescription" rows="3" required></textarea>
                </div>

                <!-- Furniture Price -->
                <div class="form-group my-2">
                    <label for="furniturePrice">Furniture Price (PHP):</label>
                    <input type="number" class="form-control" id="furniturePrice" name="furniturePrice" required>
                </div>

                <!-- Stock Quantity -->
                <div class="form-group my-2">
                    <label for="stockQuantity">Stock Quantity:</label>
                    <input type="number" class="form-control" id="stockQuantity" name="stockQuantity" required>
                </div>

                <!-- Image -->
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputImage" id="image" name="image" accept="image/*" required>
                    <label class="input-group-text" for="image">Upload</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save"/>
            </div>
        </div>
        </form>
    </div>
</div>