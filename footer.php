



         
        
      <!--========================================
			JavaScript Files
		=========================================-->
		<script type="text/javascript" src="js/fabric.min.js"></script>
		
       
		<!-- ========== End JavaScript =================== -->
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-migrate.js"></script>
    <script src="js/jquery-ui.js"></script>
   <script src="js/popper.js"></script>
    <script src="js/owl.carousel.min.js"></script>

    <script src="js/magnific-popup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/scrollUp.min.js"></script>
    <script src="js/contact.js"></script>

    <script src="js/script.js"></script>


<!--
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
        
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-->


<!--count cart-->
<script>
        $(document).ready(function(){
                load_cart_item();

     function load_cart_item(){
        $.ajax({
            url : 'actioncart.php',
            method : 'get' ,
            data:{cartitem:"cart-item"},
            success:function(response){
                $("#cart-item").html(response);
            }
        })
    }
        
            
         });
        
        
</script>

<!--count cart-->
<script>
load_cart_items()
    function load_cart_items(){
        $.ajax({
            url : 'actioncart.php',
            method : 'get' ,
            data:{cartitems:"cart-items"},
            success:function(response){
                $("#cart-items").html(response);
            }
        })
    }
</script>

<script>
        $(document).ready(function(){
                load_cart_item();

     function load_cart_item(){
        $.ajax({
            url : 'actioncart.php',
            method : 'get' ,
            data:{cartitem:"cart-item"},
            success:function(response){
                $("#cart-item").html(response);
            }
        })
    }
        
            
         });
        
        
</script>


<script>
  //submit widh ajax
        $("#verefication").click(function(e){
           
            if(document.getElementById('reg-box').checkValidity()){
                e.preventDefault();
               $("#msg").hide();
                $("#loader").show();
                $.ajax({
                    url:'actionverfy.php',
                    method:'post',
                    //هممة هادي اساط باش تسيرياليزي داتا من لفورم
                    data:$("#reg-box").serialize(),               
                    success:function(response){
                        $("#reg-box").show();
                        $("#msg").show();
                        $("#msg").html(response);
                       $("#loader").hide();
                       $("#reg-box")[0].reset();

                        
                    }
                });
            }
            return true;
            
        });


</script>

<script>
    
    $(".itemQty").on('change',function(){
        var $el = $(this).closest('tr');
        var pid = $el.find(".pid").val();
        var pprice = $el.find(".pprice").val();
     var itemQty = $el.find(".itemQty").val();
    
   
  $.ajax({
            url : 'updatecart.php',
            method : 'post' ,
            
            cache: false,
            data:{itemQty:itemQty,pprice:pprice,pid:pid},
            success:function(response){
             load_cart_item();
                 //$(".total").html(response);
                $(".total"+pid).html(response); 
                 
                   

            }
        });
                 
        
                    });

</script>

<script>
   
    
    //product check
    
$(document).ready(function(){
    
    $(".allproduct_check").click(function(){
        
        var allaction = 'data';
        var allcategorie = get_filter('allcategorie');
              
        $.ajax({
           url:'produitaction.php',
           method:'POST',
           data:{action:allaction,allcategorie:allcategorie},
           success:function(response){
               $("#result").html(response);
               $(".shop-title").text("tout les produit");
             } 
            
        });
                              
                              });
    

    
    function get_filter(text_id){
        var filterData = [];
        $('#'+text_id+':checked').each(function(){
            filterData.push($(this).val());
            $('#allcategorie'+':checked').each(function(){                    

        });
         
        return filterData; 
    
                                 
});
                                       
}
});
    
        //product check

    ///////////////////////////////
    $(document).ready(function(){
    
    $(".product_check").click(function(){
        
                              
        var action = 'data';
        var Categorie_name = get_filter('Categorie_name');
              
        $.ajax({
           url:'produitaction.php',
           method:'POST',
           data:{action:action,Categorie_name:Categorie_name},
           success:function(response){
               $("#result").html(response);
               $(".shop-title").text("filter produit");
             } 
            
        });
                              
                              });
    
    function get_filter(text_id){
        var filterData = [];
        $('#'+text_id+':checked').each(function(){
            filterData.push($(this).val());
        });
         
        return filterData;
    }
        
    });
    
    
      ///////////////////////////////
    //btn
    
    $(document).ready(function(){
   
    $(".addItemBtn").click(function(e){
        e.preventDefault();
        var $form =$(this).closest(".form-submit");
  
       var pidd = $form.find(".pid").val();
        
        $.ajax({
            url : 'actioncart.php',
            method : 'post' ,
            data:{pidd:pidd},
            success:function(response){
                $("#message").show();
                $("#message").html(response);
                //window.scrollTo(0,0);
                load_cart_item();
               $("html, body").animate({
                   scrollTop: 0
               }, 1000);
                $("#message").hide(4000);
                
            }
            
        })
        
        
        
    });
        
    });
    load_cart_item();
    function load_cart_item(){
        $.ajax({
            url : 'actioncart.php',
            method : 'get' ,
            data:{cartitem:'cart-item'},
            success:function(response){
                $("#cart-item").html(response);
            }
        })
    }
    
    
//function scrollfunction() {
//  $.scrollUp({
//    scrollName: 'scrollUp', // Element ID
//    topDistance: '300', // Distance from top before showing element (px)
//    topSpeed: 300, // Speed back to top (ms)
//    animation: 'fade', // Fade, slide, none
//    animationInSpeed: 200, // Animation in speed (ms)
//    animationOutSpeed: 200, // Animation out speed (ms)
//    scrollText: 'Scroll to top', // Text for element
//    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
//  });
//}  
    

    
    
$(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
});
        
    

</script>
</body>

<!-- Mirrored from brotherslab.thesoftking.com/html/reptap/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Mar 2020 13:09:45 GMT -->
</html>