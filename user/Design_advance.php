<?php 
    include "cls_header.php";
    include_once('dashboard_header.php');   
?>


<body>
    <div class="Polaris-Page__Header Polaris-Page__Header--hasPagination Polaris-Page__Header--hasBreadcrumbs Polaris-Page__Header--hasRollup Polaris-Page__Header--hasSecondaryActions logoheader">
        <div class="Polaris-Page Polaris-Page--fullWidth">
            <div class="Polaris-Card__Section Polaris-Tabs__Panel" id="settings-content" role="tabpanel" aria-labelledby="" tabindex="-1">
                <div class="tab-settings">
                    <div class="Polaris-Layout">
                        <div class="Polaris-Layout__Section Polaris-Layout__Section--secondary Polaris-Card">
                        <div class="BarPreview">
                            <div class="link">
                                Preview
                            </div>
                            
                            <div class="Polaris-Card previewicon" >
                                <h2 class="Polaris-Text--root Polaris-Text--bodyMd">Content inside a card</h2>
                                <div class="iconpos">
                                    <img id="image-previewdesign1" align="middle" src="https://seeklogo.com/images/U/up-arrow-sign-logo-8766E5A122-seeklogo.com.png" title="">
                                    <p class="middletext bottom__right">Hey Thankyou for shopping.</p>
                                </div>
                                        
                                </div>
                            
                        </div>
                        </div>
                        <div class="Polaris-Layout__Section Preview Polaris-Card" id="preview-container">
                            
                        <div class="Polaris-Card">
                            <div class="Polaris-Card__Header">
                                <h2 class="Polaris-Heading">Design Settings</h2>
                            </div>
                            <div class="Polaris-Card__Section">
                                <div class="QuickThemes" style="margin-top: -1rem;">
                                <div class="Polaris-FormLayout__Item">
                                    <label class="Polaris-Label__Text">Show Instragram Icon at? </label>
                                    <select name="Iconshow" id="iconShow" style="width: 100%;padding: 8px;">
                                        <option value="0">Everywhere</option>
                                        <option value="1">Pages</option>
                                        <option value="2">Homepage</option>
                                    </select>
                                </div>
                                
                                
                                <div class="Polaris-FormLayout__Item">
                                    <label class="Polaris-Label__Text">Icon Image </label>
                                    <div class="box designbox">
                                        <div id='img_contain designimg'>
                                            <img id="image-previewdesign" align='middle'src="https://seeklogo.com/images/U/up-arrow-sign-logo-8766E5A122-seeklogo.com.png" alt="your image" title=''/>
                                        </div>
                                        <input type='file' id="file-input1" />
                                    </div>
                                </div>
                                <div class="Polaris-FormLayout__Item">
                                    <label class="Polaris-Label__Text">Text With Icon</label>
                                        <div class="Polaris-TextField Polaris-TextField--hasValue">
                                        <input id="TextField25" name="texticon" type="text" class="Polaris-TextField__Input" aria-labelledby="TextField25Label" aria-invalid="false" value="Hey Thankyou for shopping.">
                                        <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                </div>
                                
                                <div class="Polaris-FormLayout__Item">
                                    <label   class="Polaris-Label__Text">Popup Middle Message</label>
                                    <select name="Iconshow" id="iconposition" style="width: 100%;padding: 8px;">
                                        <option value="0">Bottom Right</option>
                                        <option value="1">Bottom left</option>
                                        <option value="2">Bottom center</option>
                                        <option value="3">top center</option>
                                        <option value="4">top left</option>
                                        <option value="5">top right</option>
                                        <option value="6">center</option>
                                        <option value="7">center left</option>
                                        <option value="8">center right</option>
                                    </select>
                                </div>
                                <div class="Polaris-FormLayout__Item">
                                    <label class="Polaris-Label__Text">Instragram URL  </label>
                                    <div class="Polaris-TextField Polaris-TextField--hasValue"><input id="TextField30" class="Polaris-TextField__Input" type="text" aria-describedby="TextField30HelpText" aria-labelledby="TextField30Label" aria-invalid="false" value="">
                                        <div class="Polaris-TextField__Backdrop"></div>
                                    </div>
                                    <div class="LinkToUpsellDescription">Ex: http//www.instagram.com/YOUR_BRAND_URL/</div>
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
        
</body>
</html> 
<?php include_once('dashboard_footer.php'); ?>