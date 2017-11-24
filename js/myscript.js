jQuery(function($){
	$(document).on("click",".product a.woocommerce-LoopProduct-link,.product-inquiry", function(e){
		if($(e.target).hasClass("product-model")){
			e.preventDefault();
		}else if($(e.target).hasClass("product-cat-inquiry")){
			e.preventDefault();
			var productModel = $(this).find(".product-model").html();
			$("#ProductModel").val(productModel);
			$("#contactUs").modal();
		}else if($(e.target).hasClass("product-inquiry")){
			$("#ProductModel").val($('.product-model .value').html());
			$("#contactUs").modal();
		}
	})
	$("#contactUs").off().on('show.bs.modal', function () {
        var url = window.document.location.pathname;
        var postUrl = url + "#wpcf7-f244-o2";
        $('#contactForm').attr("action",postUrl);
        $('#productURL').val(window.document.location.href);
    });

})