@if($slides->isNotEmpty())
    <!-- Start Slider -->
    <div id="rev_slider_24_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container p-0" data-alias="slider4" data-source="gallery" style="margin:0px auto;background:transparent;margin-top:0px;margin-bottom:0px;">
        <div id="rev_slider_24_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8.1">
            <ul>
                @foreach($slides as $slide)
                    @if($loop->index%2 == 0)
                        <li data-index="rs-{!! $loop->index+1 !!}" data-transition="boxslide" data-slotamount="default" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                            data-thumb="{{ (empty($slide->image) ? '' : fileUploadUrl($slide->image)) }}" data-rotate="0" data-saveperformance="off"
                            data-title="{{ $slide->title }}"
                            data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                            data-param7=""
                            data-param8="" data-param9="" data-param10="" data-description="">
                            @if(!empty($slide->image))
                                <img style="background-color: {!! $slide->color ?? 'transparent' !!};" src="{{ fileUploadUrl($slide->image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            @endif
                            <div id="rrzm_{!! $loop->index+1 !!}" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption  "
                                     id="slide-{!! $loop->index+1 !!}-layer-1"
                                     data-x="100"
                                     data-y="center" data-voffset=""
                                     data-width="['auto']"
                                     data-height="['auto']"

                                     data-type="row"
                                     data-columnbreak="3"
                                     data-responsive_offset="on"
                                     data-responsive="off"
                                     data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+8490","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[0,0,0,0]"
                                     data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption  "
                                         id="slide-{!! $loop->index+1 !!}-layer-2"
                                         data-x="100"
                                         data-y="100"
                                         data-width="['auto']"
                                         data-height="['auto']"

                                         data-type="column"
                                         data-responsive_offset="on"

                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="16.67%"
                                         data-verticalalign="top"
                                         data-margintop="[0,0,0,0]"
                                         data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]"
                                         data-marginleft="[0,0,0,0]"
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 6; width: 100%;"></div>

                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption  "
                                         id="slide-{!! $loop->index+1 !!}-layer-3"
                                         data-x="100"
                                         data-y="100"
                                         data-width="['auto']"
                                         data-height="['auto']"

                                         data-type="column"
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="66.67%"
                                         data-verticalalign="top"
                                         data-margintop="[0,0,0,0]"
                                         data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]"
                                         data-marginleft="[0,0,0,0]"
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 7; width: 100%;">
                                        <!-- LAYER NR. 4 -->
                                        <div class="   tp-resizeme"
                                             id="slide-{!! $loop->index+1 !!}-layer-5"
                                             data-x=""
                                             data-y=""
                                             data-width="['auto']"
                                             data-height="['auto']"

                                             data-type="text"
                                             data-responsive_offset="on"

                                             data-fontsize="['75', '70', '65', '50']"
                                             data-lineheight="['72', '60', '43', '38']"

                                             data-frames='[{"delay":"+0","speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-margintop="[0,0,0,0]"
                                             data-marginright="[0,0,0,0]"
                                             data-marginbottom="[0,0,0,0]"
                                             data-marginleft="[0,0,0,0]"
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"

                                             style="z-index: 8; white-space: normal; font-size: 50px !important; line-height: 72px; font-weight: 600; color: #ffffff; letter-spacing: 0px; display: block;font-family:Sans">
                                            {{ $slide->title }}
                                        </div>

                                        <!-- LAYER NR. 5 -->
                                        <div class="   tp-resizeme"
                                             id="slide-{!! $loop->index+1 !!}-layer-6"
                                             data-x=""
                                             data-y=""
                                             data-width="['auto']"
                                             data-height="['auto']"

                                             data-type="text"
                                             data-responsive_offset="on"

                                             data-fontsize="['35', '30', '28', '23']"
                                             data-lineheight="['36', '36', '24', '22']"

                                             data-frames='[{"delay":"+1070","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-margintop="[40,40,40,40]"
                                             data-marginright="[0,0,0,0]"
                                             data-marginbottom="[55,55,55,55]"
                                             data-marginleft="[0,0,0,0]"
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"

                                             style="z-index: 9; white-space: normal; font-size: 15px; line-height: 36px; font-weight: 400; color: #ffffff; letter-spacing: 0px; display: block;font-family:Sans;">
                                            {{ $slide->body }}
                                        </div>

                                    @if($slide->url)
                                        <!-- LAYER NR. 6 -->
                                            <div class="tp-caption tp-resizeme"
                                                 id="slide-{!! $loop->index+1 !!}-layer-9"
                                                 data-x=""
                                                 data-y=""

                                                 data-type="text"
                                                 data-responsive_offset="on"

                                                 data-frames='[{"delay":"+2290","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                                 data-margintop="[0,0,0,0]"
                                                 data-marginright="[0,0,0,0]"
                                                 data-marginbottom="[0,0,0,0]"
                                                 data-marginleft="[0,0,0,0]"
                                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"

                                                 style="z-index: 11; display: inline-block;">
                                                <a href="{!! $slide->url !!}" class="btn btn--rounded btn-lg btn-primary">بیشتر بخوانید</a>
                                            </div>
                                    @endif

                                    <!-- LAYER NR. 7 -->

                                    </div>

                                    <!-- LAYER NR. 8 -->
                                    <div class="tp-caption  "
                                         id="slide-{!! $loop->index+1 !!}-layer-4"
                                         data-x="100"
                                         data-y="100"
                                         data-width="['auto']"
                                         data-height="['auto']"

                                         data-type="column"
                                         data-responsive_offset="on"

                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="16.67%"
                                         data-verticalalign="top"
                                         data-margintop="[0,0,0,0]"
                                         data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]"
                                         data-marginleft="[0,0,0,0]"
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 12; width: 100%;"></div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li data-index="rs-{!! $loop->index+1 !!}" data-transition="slotzoom-horizontal" data-slotamount="default"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="default" data-thumb="{{ (empty($slide->image) ? '' : fileUploadUrl($slide->image)) }}" data-rotate="0"
                            data-saveperformance="off" data-title="{{ $slide->title }}" data-param1="" data-param2="" data-param3=""
                            data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                            data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            @if(!empty($slide->image))
                                <img style="background-color: {!! $slide->color ?? 'transparent' !!};" src="{{ fileUploadUrl($slide->image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                        @endif

                        <!-- LAYERS -->
                            <div id="rrzm_{!! $loop->index+1 !!}" class="rev_row_zone rev_row_zone_middle" style="z-index: 5;">

                                <!-- LAYER NR. 9 -->
                                <div class="tp-caption"
                                     id="slide-{!! $loop->index+1 !!}-layer-1"
                                     data-x="100"
                                     data-y="center" data-voffset=""
                                     data-width="['auto']"
                                     data-height="['auto']"

                                     data-type="row"
                                     data-columnbreak="3"
                                     data-responsive_offset="on"
                                     data-responsive="off"
                                     data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"+8490","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                     data-margintop="[0,0,0,0]"
                                     data-marginright="[0,0,0,0]"
                                     data-marginbottom="[0,0,0,0]"
                                     data-marginleft="[0,0,0,0]"
                                     data-textAlign="['inherit','inherit','inherit','inherit']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 5; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff; letter-spacing: 0px;">
                                    <!-- LAYER NR. 10 -->
                                    <div class="tp-caption"
                                         id="slide-{!! $loop->index+1 !!}-layer-2"
                                         data-x="100"
                                         data-y="100"
                                         data-width="['auto']"
                                         data-height="['auto']"

                                         data-type="column"
                                         data-responsive_offset="on"

                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="16.67%"
                                         data-verticalalign="top"
                                         data-margintop="[0,0,0,0]"
                                         data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]"
                                         data-marginleft="[0,0,0,0]"
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 6; width: 100%;"></div>

                                    <!-- LAYER NR. 11 -->
                                    <div class="tp-caption"
                                         id="slide-{!! $loop->index+1 !!}-layer-3"
                                         data-x="100"
                                         data-y="100"
                                         data-width="['auto']"
                                         data-height="['auto']"

                                         data-type="column"
                                         data-responsive_offset="on"
                                         data-responsive="off"
                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="66.67%"
                                         data-verticalalign="top"
                                         data-margintop="[0,0,0,0]"
                                         data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]"
                                         data-marginleft="[0,0,0,0]"
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 7; width: 100%;">
                                        <!-- LAYER NR. 12 -->
                                        <div class="tp-resizeme"
                                             id="slide-{!! $loop->index+1 !!}-layer-5"
                                             data-x=""
                                             data-y=""
                                             data-width="['auto']"
                                             data-height="['auto']"

                                             data-type="text"
                                             data-responsive_offset="on"

                                             data-fontsize="['50', '50', '50', '50']"
                                             data-lineheight="['72', '60', '43', '38']"

                                             data-frames='[{"delay":"+0","speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-margintop="[0,0,0,0]"
                                             data-marginright="[0,0,0,0]"
                                             data-marginbottom="[0,0,0,0]"
                                             data-marginleft="[0,0,0,0]"
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"

                                             style="z-index: 8; white-space: normal; font-size: 50px !important; line-height: 72px; font-weight: 600; color: #ffffff; letter-spacing: 0px; display: block;font-family:Sans">
                                            {{ $slide->title }}
                                        </div>

                                        <!-- LAYER NR. 5 -->
                                        <div class="tp-resizeme"
                                             id="slide-{!! $loop->index+1 !!}-layer-6"
                                             data-x=""
                                             data-y=""
                                             data-width="['auto']"
                                             data-height="['auto']"

                                             data-type="text"
                                             data-responsive_offset="on"

                                             data-fontsize="['20', '20', '18', '16']"
                                             data-lineheight="['36', '36', '24', '22']"

                                             data-frames='[{"delay":"+1070","speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                             data-margintop="[40,40,40,40]"
                                             data-marginright="[0,0,0,0]"
                                             data-marginbottom="[55,55,55,55]"
                                             data-marginleft="[0,0,0,0]"
                                             data-textAlign="['inherit','inherit','inherit','inherit']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"

                                             style="z-index: 9; white-space: normal; font-size: 15px; line-height: 36px; font-weight: 400; color: #ffffff; letter-spacing: 0px; display: block;font-family:Sans;">
                                            {{ $slide->body }}
                                        </div>

                                        <!-- LAYER NR. 6 -->
                                        @if($slide->url)
                                            <div class="tp-caption tp-resizeme"
                                                 id="slide-{!! $loop->index+1 !!}-layer-9"
                                                 data-x=""
                                                 data-y=""

                                                 data-type="text"
                                                 data-responsive_offset="on"

                                                 data-frames='[{"delay":"+2290","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                                 data-margintop="[0,0,0,0]"
                                                 data-marginright="[0,0,0,0]"
                                                 data-marginbottom="[0,0,0,0]"
                                                 data-marginleft="[0,0,0,0]"
                                                 data-textAlign="['inherit','inherit','inherit','inherit']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"

                                                 style="z-index: 11; display: inline-block;">
                                                <a target="_blank" href="{{ $slide->url }}" class="btn btn--rounded btn-lg btn-primary">بیشتر بخوانید</a>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- LAYER NR. 16 -->
                                    <div class="tp-caption"
                                         id="slide-{!! $loop->index+1 !!}-layer-4"
                                         data-x="100"
                                         data-y="100"
                                         data-width="['auto']"
                                         data-height="['auto']"

                                         data-type="column"
                                         data-responsive_offset="on"

                                         data-frames='[{"delay":"+0","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                         data-columnwidth="16.67%"
                                         data-verticalalign="top"
                                         data-margintop="[0,0,0,0]"
                                         data-marginright="[0,0,0,0]"
                                         data-marginbottom="[0,0,0,0]"
                                         data-marginleft="[0,0,0,0]"
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"

                                         style="z-index: 12; width: 100%;"></div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!-- End slider -->
@endif
