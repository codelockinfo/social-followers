        
<?php
include_once('cls_header.php');
include_once('dashboard_header.php');
if (isset($_GET['product_id']) && $_GET['product_id'] != '') {
    $product_id = $_GET['product_id'];
}
?>
 <style>
   .mce-notification{
   
       display:none;
   }
   
    </style>

<div class="Polaris-Page login-frm max_width_change">
    <div class="Polaris-Page__Content">
        <div class="Polaris-Layout">
            <div class="Polaris-Layout__AnnotatedSection">
                <div class="Polaris-Layout__AnnotationWrapper">
                    <div class="Polaris-Layout__AnnotationContent">
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Section">
                                <nav role="navigation" class="product-detail-view">
                                    <a href="products.php?store=<?php echo $_SESSION['store']; ?>" class="Polaris-Breadcrumbs__Breadcrumb" data-polaris-unstyled="true">
                                        <span class="Polaris-Breadcrumbs__Icon">
                                            <span class="Polaris-Icon">
                                                <svg class="Polaris-Icon__Svg" viewBox="0 0 20 20">
                                                <path d="M12 16a.997.997 0 0 1-.707-.293l-5-5a.999.999 0 0 1 0-1.414l5-5a.999.999 0 1 1 1.414 1.414L8.414 10l4.293 4.293A.999.999 0 0 1 12 16" fill-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="Polaris-Breadcrumbs__Content">Back</span>
                                    </a>
                                </nav>
                                  <div>
                                           <h2 class="Polaris-Heading" style="    margin-left: 830px; margin-top: -25px;">Product</h2>
                                       </div>
                                <div class="Polaris-Labelled__LabelWrapper">
                                                <div class="Polaris-Label">
                                                    <label id="PolarisTextField11Label" for="PolarisTextField11" class="Polaris-Label__Text">Title</label>
                                                </div>
                                            </div>
                                            <div class="Polaris-Connected"><div class="Polaris-Connected__Item_yiyol Polaris-Connected__Item--primary">
                                                    <div class="Polaris-TextField">
                                                        <input id="title" readonly name="title" placeholder="" class="Polaris-TextField__Input title" maxlength="255" aria-labelledby="PolarisTextField11Label" aria-invalid="false" value="'.$api_data_list->product->title.'">
                                                        <div class="Polaris-TextField__Backdrop">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <div class="block2">
                                    <div class="Polaris-Card__Header">
                                            <h2 class="Polaris-Heading">Images</h2>
                                        </div>
                                                <div class="Polaris-Layout__Section Polaris-Layout__Section--secondary" style="width: 50%;margin-top: -2px;">
                                                        <div class="Polaris-Card__Section ">
                                                            <div class="Polaris-DropZone Polaris-DropZone--hasOutline Polaris-DropZone--sizeExtraLarge" >
                                                                <div class="Polaris-DropZone__Container ">
                                                                            <img id="ImagePreview" class="imagepre" src="" alt="your image" style="height:100%;width:100%;" />
                                                                    </div>
                                                            </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="Polaris-Layout">
                                    <div class="Polaris-Layout__Section">
                                        <h2 class="Polaris-Heading text-left text-editer"></h2> 
                                        <textarea class="textdetails" name="description">                                          
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var product_id = "<?php echo $product_id; ?>";
        var store = "<?php echo $store; ?>";
        var routine_name = 'product_select';
        get_textarea_value(routine_name, store, product_id, "product");
    })
</script>