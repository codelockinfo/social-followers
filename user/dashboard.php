<?php
ob_start();
include_once('cls_header.php');
//include_once('../append/session.php');
$common_function = new common_function();

if (isset($_GET['store']) && $_GET['store'] != '') {
    include_once('dashboard_header.php');
} else {
    header('Location:https://accounts.shopify.com/store-login');
}

?>

<body>
<div class="Polaris-Page pagemargin max_width_change">
        <div class="Polaris-Page__Header Polaris-Page__Header--hasPagination Polaris-Page__Header--hasBreadcrumbs Polaris-Page__Header--hasRollup Polaris-Page__Header--hasSecondaryActions logoheader">
            <div class="Polaris-Page Polaris-Page--fullWidth">
                
                <div class="Polaris-Tabs__Wrapper listlink">
                    <div class="Polaris-Tabs Polaris-Tabs__TabMeasurer">
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="Measurer" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab Polaris-Tabs__Tab--selected" aria-selected="true"><span class="Polaris-Tabs__Title">Settings</span></button></li>
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="advancedMeasurer" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab" aria-selected="false"><span class="Polaris-Tabs__Title">Advanced</span></button></li>
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="honeycombMeasurer" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab" aria-selected="false"><span class="Polaris-Tabs__Title">🍯 Sell more with Honeycomb (get your FREE plan)</span></button></li>
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="growMeasurer" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab" aria-selected="false"><span class="Polaris-Tabs__Title">🌱 Grow your business</span></button></li>
                       <button type="button" class="Polaris-Tabs__DisclosureActivator" aria-label="">
                          <span class="Polaris-Tabs__Title">
                             <span class="Polaris-Icon Polaris-Icon--colorSubdued Polaris-Icon--applyColor">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                   <path d="M6 10a2 2 0 1 1-4.001-.001A2 2 0 0 1 6 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 12 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 18 10z"></path>
                                </svg>
                             </span>
                          </span>
                       </button>
                    </div>
                    <ul role="tablist" class="Polaris-Tabs linkattach" >
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="" role="tab" type="button" tabindex="0" class="Polaris-Tabs__Tab Polaris-Tabs__Tab--selected" aria-selected="true" aria-controls="settings-content" aria-label="Settings"><span class="Polaris-Tabs__Title">Settings</span></button></li>
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="advanced" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab" aria-selected="false" aria-controls="advanced-content" aria-label="Advanced"><span class="Polaris-Tabs__Title">Advanced</span></button></li>
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="honeycomb" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab" aria-selected="false" aria-controls="honeycomb-content" aria-label="🍯 Sell more with Honeycomb (get your FREE plan)"><span class="Polaris-Tabs__Title">🍯 Sell more with Honeycomb (get your FREE plan)</span></button></li>
                       <li class="Polaris-Tabs__TabContainer" role="presentation"><button id="grow" role="tab" type="button" tabindex="-1" class="Polaris-Tabs__Tab" aria-selected="false" aria-controls="grow-content" aria-label="Grow"><span class="Polaris-Tabs__Title">🌱 Grow your business</span></button></li>
                       <li class="Polaris-Tabs__DisclosureTab" role="presentation">
                          <div>
                             <button type="button" class="Polaris-Tabs__DisclosureActivator" aria-label="" tabindex="0" aria-controls="Polarispopover1" aria-owns="Polarispopover1" aria-expanded="false">
                                <span class="Polaris-Tabs__Title">
                                   <span class="Polaris-Icon Polaris-Icon--colorSubdued Polaris-Icon--applyColor">
                                      <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                         <path d="M6 10a2 2 0 1 1-4.001-.001A2 2 0 0 1 6 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 12 10zm6 0a2 2 0 1 1-4.001-.001A2 2 0 0 1 18 10z"></path>
                                      </svg>
                                   </span>
                                </span>
                             </button>
                          </div>
                       </li>
                    </ul>
                 </div>
                <div class="Polaris-Card__Section Polaris-Tabs__Panel" id="settings-content" role="tabpanel" aria-labelledby="" tabindex="-1">
                    <div class="tab-settings">
                       <div class="Polaris-Layout">
                          <div class="Polaris-Layout__Section Polaris-Layout__Section--secondary Polaris-Card">
                             <div class="Polaris-Card">
                                <div class="Polaris-Card__Header">
                                   <h2 class="Polaris-Heading">Popup Settings</h2>
                                </div>
                                <div class="Polaris-Card__Section">
                                   <div class="QuickThemes" style="margin-top: -1rem;">
                                    <div class="Polaris-FormLayout__Item">
                                        <label class="Polaris-Label__Text">Instragram URL At Popup Button </label>
                                        <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="TextField30" class="Polaris-TextField__Input" type="text" aria-describedby="TextField30HelpText" aria-labelledby="TextField30Label" aria-invalid="false" value="">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div>
                                        <div class="LinkToUpsellDescription">Ex: http//www.instagram.com/YOUR_BRAND_URL/</div>
                                    </div>
                                    <div class="Polaris-FormLayout__Item">
                                        <label class="Polaris-Label__Text">Logo Icon </label>
                                       <div class="box">
                                            <div id='img_contain'>
                                                <img id="image-preview" align='middle'src="https://seeklogo.com/images/U/up-arrow-sign-logo-8766E5A122-seeklogo.com.png" alt="your image" title=''/>
                                            </div>
                                            <input type='file' id="file-input" />
                                        </div>
                                    </div>
                                    <div class="Polaris-FormLayout__Item">
                                        <label class="Polaris-Label__Text">PopUp Top Message</label>
                                         <div class="Polaris-TextField Polaris-TextField--hasValue">
                                            <input id="TextField25" name="modalTitle" type="text" class="Polaris-TextField__Input" aria-labelledby="TextField25Label" aria-invalid="false" value="Hey Thankyou for shopping.">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div>
                                    </div>
                                    <div class="Polaris-FormLayout__Item">
                                        <label class="Polaris-Label__Text">Popup Middle Message</label>
                                        <div class="Polaris-TextField Polaris-TextField--hasValue Polaris-TextField--multiline">
                                            <textarea id="poppopMsg" name="Massage"autocomplete="off" class="Polaris-TextField__Input" type="text" rows="4" aria-labelledby=":R1n6:Label" aria-invalid="false" aria-multiline="true" style="height: 106px;"> -Existing offers & Coupons </textarea>
                                                <div class="Polaris-TextField__Backdrop">
                                                </div>
                                                <div aria-hidden="true" class="Polaris-TextField__Resizer">
                                                    <div class="Polaris-TextField__DummyInput">1776 Barnes Street<br>Orlandoundefined FL 32801<br>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="Polaris-FormLayout__Item">
                                        <label   class="Polaris-Label__Text">Popup Button</label>
                                        <div class="Polaris-TextField Polaris-TextField--hasValue">
                                            <input id="TextField25" name="addBtn" type="text" class="Polaris-TextField__Input" aria-labelledby="TextField25Label" aria-invalid="false" value="Follow Us On Instragram">
                                            <div class="Polaris-TextField__Backdrop"></div>
                                        </div> 
                                    </div>
                                </div>
                                </div>
                             </div>
                            
                          </div>
                          <div class="Polaris-Layout__Section Preview Polaris-Card" id="preview-container">
                             <div class="BarPreview">
                                <div class="link">
                                   Preview in your store
                                   <a href="https://dashboardmanage.myshopify.com" target="blank">
                                      <span class="Polaris-Icon">
                                         <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
                                            <path d="M11 4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4a1 1 0 1 1-2 0V6.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L13.586 5H12a1 1 0 0 1-1-1zM3 6.5A1.5 1.5 0 0 1 4.5 5H8a1 1 0 0 1 0 2H5v8h8v-3a1 1 0 1 1 2 0v3.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 3 15.5v-9z"></path>
                                         </svg>
                                      </span>
                                   </a>
                                </div>
                                <div class="BarPreview__PreviewContainer-sc-4yg564-0 uWgUE widget-container">
                                   <div class="WidgetComponent__WidgetContainer-sc-1933jxm-0 fOYfxi cb-cookie_consent-container animate__animated animate__fadeInUp">
                                      <div class="WidgetComponent__LayoutContainer-sc-1933jxm-1 cDdCwg cb-cookie_consent-layout_container">
                                         <div class="WidgetComponent__TextContainer-sc-1933jxm-2 ieollN cb-cookie_consent-container-text_container  previewtext">
                                            This website uses cookies to ensure you get the best experience on our website. &nbsp;<a class="WidgetComponent__LinkContainer-sc-1933jxm-3 fYVjIL cb-cookie_consent-container-link_container" target="_blank" href="https://dashboardmanage.myshopify.com/policies/privacy-policy">Learn more</a>
                                         </div>
                                         <button class="WidgetComponent__Button-sc-1933jxm-4 cVWSDZ cb-cookie_consent-container-button">Accept</button>
                                      </div>
                                   </div>
                                </div>
                            
                                <div class="modal open">
                                           
                                        <div class="modal__header">
                                            <div><img id="image-preview1" align="middle" src="https://seeklogo.com/images/U/up-arrow-sign-logo-8766E5A122-seeklogo.com.png" title=""></div>
                                            <h2 class="modaltitle">Hey Thankyou for shopping.</h2>
                                            <div class="close">×</div>
                                        </div>
                                        <div class="modal__content">
                                            <p class="addMassage">
                                                    -Existing offers & Coupons 
                                            </p>
                                        </div>  
                                        <div class="modal__footer">
                                            <button class="Polaris-Button Polaris-Button--fullWidth" type="button">
                                                <span class="Polaris-Button__Content">
                                                  <span class="Polaris-Button__Text Addmsgbtn">Follow US</span>
                                                </span>
                                            </button>
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
    <div class="footermargin">
        <div class="Polaris-FooterHelp__Text footermargin">
            ReWriter©2023 - Developed by<a target="_blank" href="http://codelocksolutions.com/" style="margin:0 5px;">Codelock Solutions</a>  team 
        </div> 
    </div>
    
</body>
</html> 

<?php include_once('dashboard_footer.php'); ?>
<script>
    cookies_bar_setting_save_first();
    cookies_bar_setting_select();
</script>