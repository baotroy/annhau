<style>
        /* jssor slider bullet navigator skin 21 css */
        /*
        .jssorb21 div           (normal)
        .jssorb21 div:hover     (normal mouseover)
        .jssorb21 .av           (active)
        .jssorb21 .av:hover     (active mouseover)
        .jssorb21 .dn           (mousedown)
        */
        .jssorb21 {
            position: absolute;
            bottom: 26px;
            left: 6px;
        }
        .jssorb21 div, .jssorb21 div:hover, .jssorb21 .av {
            position: absolute;
            /* size of bullet elment */
            width: 19px;
            height: 19px;
            text-align: center;
            line-height: 19px;
            color: white;
            font-size: 12px;
            background: url(<?php echo $this->base?>/images/b05.png) no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb21 div { background-position: -5px -5px; }
        .jssorb21 div:hover, .jssorb21 .av:hover { background-position: -35px -5px; }
        .jssorb21 .av { background-position: -65px -5px; }
        .jssorb21 .dn, .jssorb21 .dn:hover { background-position: -95px -5px; }
    </style>

    <!-- Arrow Navigator Style -->
    <style>
        /* jssor slider arrow navigator skin 21 css */
        /*
        .jssora21l                  (normal)
        .jssora21r                  (normal)
        .jssora21l:hover            (normal mouseover)
        .jssora21r:hover            (normal mouseover)
        .jssora21l.jssora21ldn      (mousedown)
        .jssora21r.jssora21rdn      (mousedown)
        */
        .jssora21l, .jssora21r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url(<?php echo $this->base?>/images/a21.png) center center no-repeat;
            overflow: hidden;
        }
        .jssora21l { background-position: -3px -33px; top: 123px; left: 8px; }
        .jssora21r { background-position: -63px -33px; top: 123px; right: 8px; }
        .jssora21l:hover { background-position: -123px -33px; }
        .jssora21r:hover { background-position: -183px -33px; }
        .jssora21l.jssora21ldn { background-position: -243px -33px; }
        .jssora21r.jssora21rdn { background-position: -303px -33px; }
    </style>
    <!-- Jssor Slider Begin -->
    <!-- To move inline styles to css file/block, please specify a class name for each element. --> 
    <div id="slider1_container" style="position: relative; margin: 0 auto;
        top: 0px; left: 0px; width: 1300px; height: 350px; overflow: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
            <div style="position: absolute; display: block; background: url(<?php echo $this->base; ?>/images/loading.gif) no-repeat center center;
                top: 0px; left: 0px; width: 100%; height: 100%;">
            </div>
        </div>
        <!-- Slides Container -->
        <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 1300px;
            height: 350px; overflow: hidden;">
            <div>
                <a href="a">
                    <img data-u="image" src="<?php echo $this->base; ?>/images/1920/red.jpg" alt="" />
                    
                    <div style="position: absolute; width: 480px; height: 120px; top: 2%; left: 30px; padding: 5px;
                        text-align: left; line-height: 60px; text-transform: uppercase; font-size: 30px;
                            color: #FFFFFF;">Product name 1
                    </div>
                    <div style="position: absolute; width: 480px; height: 120px; top: 60%; left: 30px; padding: 5px;
                        text-align: left; line-height: 36px; font-size: 22px;
                            color: #FFFFFF;">
                            Build your slider with anything, includes image, content, text, html, photo, picture
                    </div>
                </a>
            </div>
            <div>
                <a href="a">
                    <img data-u="image" src="<?php echo $this->base; ?>/images/1920/purple.jpg" alt="" />
                    <div style="position: absolute; width: 480px; height: 120px; top: 2%; left: 30px; padding: 5px;
                        text-align: left; line-height: 60px; text-transform: uppercase; font-size: 30px;
                            color: #FFFFFF;">Product name 2
                    </div>
                    <div style="position: absolute; width: 480px; height: 120px; top: 60%; left: 30px; padding: 5px;
                        text-align: left; line-height: 36px; font-size: 22px;
                            color: #FFFFFF;">
                            Build your slider with anything, includes image, content, text, html, photo, picture
                    </div>
                </a>
            </div>
            <div>
                <a href="a">
                    <img data-u="image" src="<?php echo $this->base; ?>/images/see-banner.jpg" alt="" />
                    <div style="position: absolute; width: 480px; height: 120px; top: 2%; left: 30px; padding: 5px;
                        text-align: left; line-height: 60px; text-transform: uppercase; font-size: 30px;
                            color: #FFFFFF;">Product name 3
                    </div>
                    <div style="position: absolute; width: 480px; height: 120px; top: 60%; left: 30px; padding: 5px;
                        text-align: left; line-height: 36px; font-size: 22px;
                            color: #FFFFFF;">
                            Build your slider with anything, includes image, content, text, html, photo, picture
                    </div>
                </a>
            </div>
        </div>
                
        <!--#region Bullet Navigator Skin Begin -->
        <!-- bullet navigator container -->
        <div data-u="navigator" class="jssorb21">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype"></div>
        </div>
        <!--#endregion Bullet Navigator Skin End -->

        <!--#region Arrow Navigator Skin Begin -->
        <!-- Arrow Left -->
        <span data-u="arrowleft" class="jssora21l">
        </span>
        <!-- Arrow Right -->
        <span data-u="arrowright" class="jssora21r">
        </span>
        <!--#endregion Arrow Navigator Skin End -->
    </div>