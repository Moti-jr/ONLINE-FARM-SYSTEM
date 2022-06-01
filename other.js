<script>
$("#btn_cart<?php echo $row['product_id'] ?>").on("click", function() {
    var product_id = $("#product_id<?php echo $row['product_id'] ?>").val();
    var UserId = $("#UserId<?php echo $_SESSION['Id'] ?>").val();
    $.ajax({
        type: 'POST',
        url: 'cart.php',
        dataType: 'HTML',
        data: {
            product_id: product_id,
            UserId: UserId
        },
        success: function(data) {
            $("#btn_cart<?php echo $row['product_id'] ?>").html("Added to Cart");
            $("#btn_cart<?php echo $row['product_id'] ?>").css({
                "background-color": "green",
                "color": "white"
            });
            $("#cart_no").html(data);
        }
    });
});
</script>