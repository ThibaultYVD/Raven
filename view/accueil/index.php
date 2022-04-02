<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="background carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 opacity-75" src="assets/img/banner1.png" alt="First slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5 texteVente">Nos meilleurs
        ventes</div>
    <div class="container-fluid my-5">

        <div class="col-md-12">
            <div class="row show_data">
                
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {

            load_data();
            
            function load_data(page) {


                $.ajax({
                    url: "<?= WEBROOT ?>ajax/load_data.php",
                    method: "POST",
                    data: {
                        page: page
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $(".show_data").html(data.output);

                    }
                });
            }

            function show_mycart() {
                $.ajax({
                    url: "<?= WEBROOT ?>ajax/show_mycart.php",
                    method: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $("#cart").text(data.da);
                    }
                });
            }

        });



        $(document).on("click", ".add_cart", function(event) {
            event.preventDefault();
            var id = $(this).attr("id");
            var name = $("#name" + id + "").val();
            var price = $("#price" + id + "").val();
            var quantity = $("#quantity" + id + "").val();
            var action = "add";


            $.ajax({
                url: "<?= WEBROOT ?>ajax/cart_action.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity,
                    action: action
                },
                success: function(data) {

                }
            });


        });
    </script>
</section>