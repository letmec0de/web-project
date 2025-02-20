
<?php
    include '..\admin\database.php';
    $hinhanh = '../admin/';
    session_start();

    // Thực hiện truy vấn SQL
    $db = new database();
    $link = $db->connectDB();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\homepage\home-style.css">
    <link rel="icon" href="https://cdn.tgdd.vn/ValueIcons/iphone.jpg"  type="image/icon type">
    <meta http-equiv="UX-A Compatible" content="refresh">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../homepage/log.css">
    <title>Cửa hàng điện thoại</title>
</head>
<body>
    <div class="trangchu">
        <div class="navigation">
           
            <div class="logo">
                <a href="..\homepage\homepage.php">
                    <img src="..\img\logo.jpg" alt="T-Store">
                </a>
            </div>
            
            <div class="tragop">
                <a href="#"><img src="https://s3v2.interdata.vn:9000/s3-586-15343-storage/dienthoaigiakho/wp-content/uploads/2022/05/31012158/1200x1200_Key-Tra-Gop_2208.jpg" alt=""></a>
            </div>
          
        
          
        
           <div class="timkiem">
            <form  action="../homepage/search.php" method="get">
                <input type="text" name="q" placeholder="Bạn muốn tìm gì ?">
                <i class="fa fa-search"></i>

            </form>
           </div>
           <div class="giohang">
            <a href="../giohang/giohang.php"><i class="fas fa-shopping-cart"></i></a>
        </div>
           <div class="danhmuc">
            <div class="dropdown">
                <button class="dropbtn"><i class="fas fa-bars"></i> </button>                        <div class="dropdown-content">
                    <a href="#">Đăng xuất</a>
                </div>
            </div>
        </div>
         
        <div class="dangnhap-dangky">
            <?php
            if (isset($_SESSION["phonenumber"])) {
                echo "Xin chào " . $_SESSION["fullname"];
                echo "<a href='../admin/logout.php'><i class='fas fa-sign-out-alt'></i> Đăng xuất</a>";
            } else {
                echo "<a href='..\dangnhap-dangky\dangky.php'><i class='fas fa-user'></i> Đăng ký</a>";
            }
            ?>
        </div>
        
    
     
</div>
<div class="pagebody">
    <div class="device-type">
        <div class="dienthoai"><a href="..\sanpham\dienthoai.php">Điện thoại</a></div>        
        <div class="laptop"><a href="laptop.php">Laptop</a></div>
        <div class="amthanh"><a href="amthanh.php">Âm thanh</a></div>
        <div class="dongho"><a href="dongho.php">Đồng Hồ</a></div>
        <div class="tivi"><a href="tivi.php">Tivi</a></div>
        <div class="news"><a href="news.php">Tin tức</a></div>
    </div>
    <div class="uudai">
        <img class="mySlides" src="..\img\tai-nghe-sennheiser-momentum-true-wireless-4.webp" alt="">
        <img class="mySlides" src="..\img\MSI_sliding.webp" alt="">
        <img class="mySlides" src="..\img\samsung-galaxy.webp" alt="">
        <img class="mySlides" src="..\img\huawei-band-9-sliding.webp" alt="">
    
    </div>
    <script src="..\homepage\index.js"></script>
   
    </script>
    <div><h2>Điện thoại bán chạy</h2></div>
    <hr>

    <div class="product-list">
    <?php


// 
$sql = "SELECT products.id, products.name, productvariants.price, products.image 
FROM products 
JOIN productvariants 
ON products.id = productvariants.product_id
WHERE products.category = 'Điện thoại'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="product-item">';
        echo '<img src="' . $hinhanh . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<p>Gía: '.number_format($row['price']).'đ</p>';
        echo '<div class="rating">';
        echo '<span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>';
        echo '</div>';
        echo '<button class="add-to-cart" data-product-id="' . $row["id"] . '">Thêm vào giỏ hàng</button>';       
        echo '<a href="..\sanpham\sanpham.php?id=' . $row["id"] . '">';
        echo '<div class="detail-text">Ấn vào để xem chi tiết</div>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "No products found";
}

?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function(e){
            e.preventDefault();
            var product_id = $(this).data('product-id');
            $.ajax({
                type: "POST",
                url: "../giohang/giohang.php",
                data: {action: 'add', product_id: product_id},
                success: function(response){
                    alert("Sản phẩm đã được thêm vào giỏ hàng");
                    location.reload(); // Reload the page to update the cart
                }
            });
        });
    });
</script>

    
</div>
<script src=""></script>

    

    <footer>
        <h3>Contact</h3>
        <p>Địa chỉ: Mậu thân, Xuân Khánh ,Ninh Kiểu, Cần Thơ</p>
        <p>Email: thuanb2112012@student.ctu.edu.vn</p>
        <p>Điện thoại: 0706871283</p>
        <p>© Can Tho University</p>
    </footer>
    </div>
<!-- Add this button to your HTML -->


</body>
</html>