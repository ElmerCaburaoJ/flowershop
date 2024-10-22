<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../styles/body.css">
    <link rel="stylesheet" href="../styles/item.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>PARADISE</title>
</head>
<body>
    
    <?php include("./header.php"); ?>
    
    <main>
        <div class="center">
            <div class="div">
                <div class="item-con grid" id="6">
                    <div class="img-con">
                        <img src="../products/desire.png" alt="">
                    </div>
                    <div class="right-con">
                        <h1 class="name-js">Desire</h1>
                        <div class="type">Availability: On Stock</div>
                        <div class="price-div"><span class="price">₱900</span> & Shipping Fee</div>
                        <div class="description">
                        Composed of Sunflower (1pc), Roses (4pcs), and Malaysian Mums.
                        </div>
                        <form class="message-form">
                            <label class="required" for="from">From</label>
                            <input type="text" id="from" placeholder="From">

                            <label class="required" for="to">To</label>
                            <input type="text" id="to" placeholder="To">

                            <label for="message">Message On The Card</label>
                            <textarea id="message" placeholder="Message on the Card"></textarea>
                        </form>
                        <div class="add-div">
                            <div class="qnty-td">
                                <div class="minus-btn">-</div>
                                <div class="qnty-js"><input type="text" class="qnty-input" min="1" value="1"></div>
                                <div class="add-btn">+</div>
                            </div>
                            <button class="add-cart">Add to cart</button>    
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </main>
    
    <?php include("./footer.php"); ?>

    <script src="../scripts/quantity.js"></script>
    <script src="../scripts/cartSolo.js"></script>
</body>
</html>