
<?php 
$store = (isset($_GET['store']) && $_GET['store'] != '') ? $_GET['store'] : "managedashboard.myshopify.com";
?>
</head>
    <body>
        <div class="Polaris-Page__Header Polaris-Page__Header--hasPagination Polaris-Page__Header--hasBreadcrumbs Polaris-Page__Header--hasRollup Polaris-Page__Header--hasSecondaryActions logoheader">
            <div class="Polaris-Page Polaris-Page--fullWidth">
                <div class="Polaris-Page-Header Polaris-Page-Header__Header--hasBreadcrumbs">
                    <div class="Polaris-Page-Header__MainContent polaris-nav-menu">
                        <div class="Polaris-Page-Header__TitleAndActions cls_header_css">
                            <div class="Polaris-Page__Title cls_header_logo_image">
                                <a href="index.php?store=<?php echo $_SESSION['store']; ?>" class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">  <img  src="<?php echo CLS_SITE_URL; ?>/assets/images/logo1.png" alt="your image" class="logoimg" /></a>
                            </div>
                            <div class="shopifybtn">
                                <!-- <a  href="https://<?php echo $store; ?>/admin" class="Polaris-Button  Polaris-Button--success" type="button" target="_blank">
                                    <span class="Polaris-Button__Content">
                                        <span class="Polaris-Button__Text">Shopify Admin</span>
                                    </span>
                                </a> -->
                                <a  href="index.php?store=<?php echo $store; ?>" class="Polaris-Button desktopview" type="button">
                                    <span class="Polaris-Button__Content">
                                        <span class="Polaris-Button__Text">Home</span>
                                    </span>
                                </a>
                            </div>
                            <div class=" cls_enbledisable_msg">
                                <div class="Polaris-Page__Title cls_msg_enadisa_for_mobile">
                                    <span class="app-setting-msg">
                                        <div class="Polaris-Banner Polaris-Banner--withinPage clsdesign_for_msg" tabindex="0" role="alert" aria-live="polite" aria-labelledby="Banner7Heading" aria-describedby="Banner7Content" style="display: flex;align-items: center;">
                                            <div class="Polaris-Banner__Ribbon">
                                                <a href="setting.php?store=<?php echo $store; ?>" style="text-decoration: none;">
                                                    <span class="Polaris-Icon Polaris-Icon--isColored Polaris-Icon--hasBackdrop">
                                                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                                            <circle fill="currentColor" cx="10" cy="10" r="9"></circle>
                                                            <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m0-13a1 1 0 0 0-1 1v4a1 1 0 1 0 2 0V6a1 1 0 0 0-1-1m0 8a1 1 0 1 0 0 2 1 1 0 0 0 0-2"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="Polaris-Banner__Heading" id="Banner7Heading">
                                                <!-- <p class="Polaris-Heading">Activate Cookie Bar </p> -->
                                                <p class="Polaris-Heading desktopview">Activate Cookie Bar: Update color settings and click "Activate" button to activate Cookie bar on your website. </p>
                                                <p class="Polaris-Heading mobileview"> The cookie bar is activated. </p>
                                           </div>
                                            <div id="toggleButton" class="on">
                                                <div class="handle"></div>
                                            </div>
                                            <input type="hidden" id="toggleValue" value="0">
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="cls_enbledisable_btn shopifybtn">
                                <a  href="index.php?store=<?php echo $store; ?>" class="Polaris-Button mobileview" type="button">
                                    <span class="Polaris-Button__Content">
                                        <span class="Polaris-Button__Text">Home</span>
                                    </span>
                                </a>
                                <a href="setting.php?store=<?php echo $store; ?>"  class="Polaris-Button" style="text-decoration: none;">
                                    <span class="Polaris-Button__Content">
                                        <span>Setting</span>
                                    </span>
                                </a>
                                <a href="help.php?store=<?php echo $store; ?>"  class="Polaris-Button  Polaris-Button--success" style="text-decoration: none;" >
                                    <span class="Polaris-Button__Content">
                                    <span>Help </span>
                                    </span>
                                </a>
                                <!-- <a href="feature.php?store=<?php echo $store; ?>"  class="Polaris-Button  Polaris-Button--success" style="text-decoration: none;" >
                                    <span class="Polaris-Button__Content">
                                    <span>Features </span>
                                    </span>
                                </a> -->
                            </div>  
                        </div>
                        <button type="button" class="Polaris-Button bootstrap-navbar cls_menu_mobile" data-toggle="popover"  data-container="body" data-placement="bottom" data-html="true" id="form-components" tabindex="0" aria-haspopup="true" aria-expanded="false">
                            <span class="Polaris-Button__Content"><span>Menu</span>
                                <span class="Polaris-Button__Icon"><span class="Polaris-Icon"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M5 8l5 5 5-5z" fill-rule="evenodd"></path></svg></span></span></span>
                        </button>                    
                        <div class="Polaris-Popover__Wrapper" style="display: none">
                            <div id="popover-content-form-components" tabindex="-1" class="Polaris-Popover__Content">
                                <div class="Polaris-Popover__Pane Polaris-Scrollable Polaris-Scrollable--vertical" data-polaris-scrollable="true" polaris="[object Object]">
                                    <div class="Polaris-ActionList">
                                        <div class="Polaris-ActionList__Section--withoutTitle">
                                            <ul class="Polaris-ActionList__Actions">
                                                <li><a class="Polaris-ActionList__Item" href="index.php?store=<?php echo $_SESSION['store']; ?>"><div class="Polaris-ActionList__Content">Dashboard</div></a></li>
                                                <li><a class="Polaris-ActionList__Item" href="blog_post.php?store=<?php echo $_SESSION['store']; ?>"><div class="Polaris-ActionList__Content">BlogPost</div></a></li>
                                                <li><a class="Polaris-ActionList__Item" href="pages.php?store=<?php echo $_SESSION['store']; ?>"><div class="Polaris-ActionList__Content">Pages</div></a></li>
                                                <li><a class="Polaris-ActionList__Item" href="products.php?store=<?php echo $_SESSION['store']; ?>"><div class="Polaris-ActionList__Content">Products</div></a></li>
                                                <li><a class="Polaris-ActionList__Item" href="collection.php?store=<?php echo $_SESSION['store']; ?>"><div class="Polaris-ActionList__Content">Collection</div></a></li>
                                                <li><a class="Polaris-ActionList__Item" href="setting.php?store=<?php echo $store; ?>"><div class="Polaris-ActionList__Content">App Setting</div></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </body>