@extends('layouts.app')

@section('title', 'My Profile | Bug Buster')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/dashboard/main.css">
@endsection

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <nav>
        <ol class="breadcrumb mb-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-dark h4">Pages</a></li>
            <li class="breadcrumb-item active text-muted fs-13 fw-normal" aria-current="page">Dashboard</li>
        </ol>
    </nav>
</div>
<div class="fOyUs_bGBk fOyUs_ImeN" style="padding: 0.75rem;text-align: center;">
    <span class="fOyUs_bGBk fOyUs_UeJS" style="margin: 0.75rem;">
        <svg role="img" aria-hidden="true" width="174" height="157" viewBox="0 0 174 157" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>Group</title>
            <defs>
                <path d="M22.825.626c-5.66.289-11.32.656-16.981 1.101-1.655.131-3.16 1.588-3.347 3.242a360.003 360.003 0 0 0-1.313 65.64h21.64V.626z" id="a"></path>
                <path d="M1.184 70.61A360.003 360.003 0 0 1 2.497 4.968c.187-1.654 1.692-3.111 3.347-3.242 5.66-.445 11.32-.812 16.98-1.101v69.983H1.185z" id="c"></path>
                <path d="M21.825 20.315c-5.66-.29-11.32-.657-16.981-1.102-1.655-.132-3.16-1.588-3.347-3.243A363.483 363.483 0 0 1 .13.843h21.695v19.472z" id="e"></path>
                <path d="M.13.843C.48 5.885.935 10.928 1.497 15.97c.187 1.655 1.692 3.111 3.347 3.243 5.66.445 11.32.812 16.981 1.102V.843H.13z" id="g"></path>
                <path d="M.322 1.704A618.04 618.04 0 0 1 22.923.908v71.083H.323V1.704z" id="i"></path>
                <path d="M22.923.908a618.04 618.04 0 0 0-22.6.796v70.287h22.6V.908z" id="k"></path>
                <path d="M22.923 20.032A617.82 617.82 0 0 1 .8 19.262V.609h22.122v19.423z" id="m"></path>
                <path d="M.8 19.262c7.375.389 14.749.646 22.123.77V.61H.8v18.653z" id="o"></path>
                <path d="M.427.917A616.582 616.582 0 0 1 22.529.92v71.117H.427V.917z" id="q"></path>
                <path d="M22.53.921A616.644 616.644 0 0 0 .426.917v71.12h22.102V.922z" id="s"></path>
                <path d="M22.367 20.022c-7.26.13-14.522.131-21.783.004V.99h21.784v19.033z" id="u"></path>
                <path d="M.585 20.026c7.26.127 14.521.126 21.783-.004V.989H.584v19.037z" id="w"></path>
                <path d="M.764.908a618.06 618.06 0 0 1 22.6.796v70.287H.765V.908z" id="y"></path>
                <path d="M23.365 1.704A618.078 618.078 0 0 0 .764.908v71.083h22.6V1.704z" id="A"></path>
                <path d="M22.885 19.262c-7.374.389-14.748.646-22.122.77V.61h22.122v18.653z" id="C"></path>
                <path d="M.763 20.032a617.846 617.846 0 0 0 22.122-.77V.609H.763v19.423z" id="E"></path>
                <path d="M.862.626c5.66.289 11.321.656 16.982 1.101 1.654.131 3.16 1.588 3.346 3.242a360.003 360.003 0 0 1 1.313 65.64H.862V.627z" id="G"></path>
                <path d="M22.503 70.61A360.003 360.003 0 0 0 21.19 4.969c-.186-1.654-1.692-3.111-3.346-3.242A621.172 621.172 0 0 0 .862.626V70.61h21.64z" id="I"></path>
                <path d="M22.557.843A363.483 363.483 0 0 1 21.19 15.97c-.186 1.655-1.692 3.111-3.346 3.243A620.62 620.62 0 0 1 .862 20.315V.843h21.695z" id="K"></path>
                <path d="M.862 20.315a620.62 620.62 0 0 0 16.982-1.102c1.654-.132 3.16-1.588 3.346-3.243A363.483 363.483 0 0 0 22.557.843H.862v19.472z" id="M"></path>
            </defs>
            <g fill="none" fill-rule="evenodd">
                <path d="M45.69 4.085l99.153 26.003" stroke="#798792" stroke-width="2" stroke-linecap="round"></path>
                <path d="M44.842 8.137a4.136 4.136 0 1 1 2.099-8 4.136 4.136 0 0 1-2.1 8z" fill="#798792"></path>
                <path d="M158.684 41.088c0 13.276-10.763 24.039-24.04 24.039-13.275 0-24.038-10.763-24.038-24.04 0-13.275 10.763-24.038 24.039-24.038 13.276 0 24.039 10.763 24.039 24.039" fill="#C0C6CB"></path>
                <path d="M158.684 41.088c0 13.276-10.763 24.039-24.04 24.039-13.275 0-24.038-10.763-24.038-24.04 0-13.275 10.763-24.038 24.039-24.038 13.276 0 24.039 10.763 24.039 24.039z" stroke="#798792" stroke-width="2"></path>
                <path fill="#C0C6CB" d="M14.448 155.088h144.396v-21H14.448z"></path>
                <path stroke="#798792" stroke-width="2" d="M14.448 155.088h144.396v-21H14.448z"></path>
                <path
                    d="M164.844 143.351a1209.137 1209.137 0 0 1-155 0c-2.206-.144-4.266-2.057-4.571-4.264-4.672-34-4.672-68 0-102 .305-2.207 2.365-4.119 4.57-4.263a1208.773 1208.773 0 0 1 155 0c2.206.143 4.266 2.056 4.572 4.263 4.672 34 4.672 68 0 102-.306 2.207-2.365 4.12-4.571 4.264"
                    fill="#F4F5F6"
                ></path>
                <path
                    d="M164.844 143.351a1209.137 1209.137 0 0 1-155 0c-2.206-.144-4.266-2.057-4.571-4.264-4.672-34-4.672-68 0-102 .305-2.207 2.365-4.119 4.57-4.263a1208.773 1208.773 0 0 1 155 0c2.206.143 4.266 2.056 4.572 4.263 4.672 34 4.672 68 0 102-.306 2.207-2.365 4.12-4.571 4.264z"
                    stroke="#778690"
                    stroke-width="2"
                ></path>
                <path
                    d="M116.844 132.41a627.204 627.204 0 0 1-97 0c-2.205-.174-4.213-2.116-4.456-4.322a369.79 369.79 0 0 1 0-80c.243-2.206 2.25-4.149 4.456-4.323a627.453 627.453 0 0 1 97 0c2.205.174 4.212 2.118 4.455 4.323a369.79 369.79 0 0 1 0 80c-.243 2.206-2.25 4.148-4.455 4.322"
                    fill="#F4F5F6"
                ></path>
                <path
                    d="M116.844 132.41a627.204 627.204 0 0 1-97 0c-2.205-.174-4.213-2.116-4.456-4.322a369.79 369.79 0 0 1 0-80c.243-2.206 2.25-4.149 4.456-4.323a627.453 627.453 0 0 1 97 0c2.205.174 4.212 2.118 4.455 4.323a369.79 369.79 0 0 1 0 80c-.243 2.206-2.25 4.148-4.455 4.322z"
                    stroke="#778690"
                    stroke-width="2"
                ></path>
                <path d="M162.844 63.588c0 8.008-6.492 14.5-14.5 14.5-8.01 0-14.5-6.492-14.5-14.5s6.49-14.5 14.5-14.5c8.008 0 14.5 6.492 14.5 14.5" fill="#75848F"></path>
                <path d="M162.844 63.588c0 8.008-6.492 14.5-14.5 14.5-8.01 0-14.5-6.492-14.5-14.5s6.49-14.5 14.5-14.5c8.008 0 14.5 6.492 14.5 14.5z" stroke="#3F5463" stroke-width="2"></path>
                <path d="M151.844 88.588a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" fill="#75848F"></path>
                <path d="M151.844 88.588a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" stroke="#3F5463" stroke-width="2"></path>
                <path d="M140.844 88.588a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" fill="#75848F"></path>
                <path d="M140.844 88.588a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" stroke="#3F5463" stroke-width="2"></path>
                <path d="M162.844 88.588a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" fill="#75848F"></path>
                <path d="M162.844 88.588a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0zm-26.693-18.833l18.842-18.103m-13.299 23.871l18.841-18.103" stroke="#3F5463" stroke-width="2"></path>
                <path d="M133.844 100.328h29m-29 5h29m-29 5h29m-29 5h29" stroke="#3F5463" stroke-width="2" stroke-linecap="round"></path>
                <g transform="translate(14 43.118)">
                    <mask id="b" fill="#fff"><use xlink:href="#a"></use></mask>
                    <path d="M21.8 70.61a1227.73 1227.73 0 0 1-21.782-.768A388.062 388.062 0 0 1 1.728.888 657.433 657.433 0 0 1 22.826-.47 687.486 687.486 0 0 0 21.8 70.61" fill="#95D4F5" mask="url(#b)"></path>
                </g>
                <g transform="translate(14 43.118)">
                    <mask id="d" fill="#fff"><use xlink:href="#c"></use></mask>
                    <path
                        d="M21.8 70.61a1227.73 1227.73 0 0 1-21.782-.768A388.062 388.062 0 0 1 1.728.888 657.433 657.433 0 0 1 22.826-.47 687.486 687.486 0 0 0 21.8 70.61z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#d)"
                    ></path>
                </g>
                <g transform="translate(15 112.118)">
                    <mask id="f" fill="#fff"><use xlink:href="#e"></use></mask>
                    <path d="M21.825 21.41A660.962 660.962 0 0 1 .728 20.051 390.33 390.33 0 0 1-.982.843c7.26.32 14.522.575 21.783.766.246 6.6.587 13.2 1.024 19.8" fill="#E8ACDD" mask="url(#f)"></path>
                </g>
                <g transform="translate(15 112.118)">
                    <mask id="h" fill="#fff"><use xlink:href="#g"></use></mask>
                    <path
                        d="M21.825 21.41A660.962 660.962 0 0 1 .728 20.051 390.33 390.33 0 0 1-.982.843c7.26.32 14.522.575 21.783.766.246 6.6.587 13.2 1.024 19.8z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#h)"
                    ></path>
                </g>
                <g transform="translate(35 42.118)">
                    <mask id="j" fill="#fff"><use xlink:href="#i"></use></mask>
                    <path d="M22.585 71.991c-7.262-.063-14.522-.19-21.784-.382A687.486 687.486 0 0 1 1.825.53C8.856.19 15.89-.035 22.923-.148a2139.173 2139.173 0 0 0-.338 72.14" fill="#94E09E" mask="url(#j)"></path>
                </g>
                <g transform="translate(35 42.118)">
                    <mask id="l" fill="#fff"><use xlink:href="#k"></use></mask>
                    <path
                        d="M22.585 71.991c-7.262-.063-14.522-.19-21.784-.382A687.486 687.486 0 0 1 1.825.53C8.856.19 15.89-.035 22.923-.148a2139.173 2139.173 0 0 0-.338 72.14z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#l)"
                    ></path>
                </g>
                <g transform="translate(35 113.118)">
                    <mask id="n" fill="#fff"><use xlink:href="#m"></use></mask>
                    <path d="M22.923 21.087a651.911 651.911 0 0 1-21.098-.678c-.436-6.6-.778-13.2-1.024-19.8C8.063.8 15.323.928 22.585.99c.08 6.699.194 13.398.338 20.096" fill="#FEC19B" mask="url(#n)"></path>
                </g>
                <g transform="translate(35 113.118)">
                    <mask id="p" fill="#fff"><use xlink:href="#o"></use></mask>
                    <path
                        d="M22.923 21.087a651.911 651.911 0 0 1-21.098-.678c-.436-6.6-.778-13.2-1.024-19.8C8.063.8 15.323.928 22.585.99c.08 6.699.194 13.398.338 20.096z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#p)"
                    ></path>
                </g>
                <g transform="translate(57 42.118)">
                    <mask id="r" fill="#fff"><use xlink:href="#q"></use></mask>
                    <path d="M22.367 71.99c-7.26.063-14.52.064-21.782.001C.292 47.945.405 23.9.923-.148c7.032-.112 14.064-.11 21.097.005.531 24.044.646 48.088.347 72.132" fill="#F9979A" mask="url(#r)"></path>
                </g>
                <g transform="translate(57 42.118)">
                    <mask id="t" fill="#fff"><use xlink:href="#s"></use></mask>
                    <path
                        d="M22.367 71.99c-7.26.063-14.52.064-21.782.001C.292 47.945.405 23.9.923-.148c7.032-.112 14.064-.11 21.097.005.531 24.044.646 48.088.347 72.132z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#t)"
                    ></path>
                </g>
                <g transform="translate(57 113.118)">
                    <mask id="v" fill="#fff"><use xlink:href="#u"></use></mask>
                    <path d="M22.02 21.083a656.57 656.57 0 0 1-21.098.004A2244.57 2244.57 0 0 1 .584.991c7.261.064 14.523.063 21.784-.002-.084 6.698-.2 13.396-.348 20.094" fill="#95D4F5" mask="url(#v)"></path>
                </g>
                <g transform="translate(57 113.118)">
                    <mask id="x" fill="#fff"><use xlink:href="#w"></use></mask>
                    <path
                        d="M22.02 21.083a656.57 656.57 0 0 1-21.098.004A2244.57 2244.57 0 0 1 .584.991c7.261.064 14.523.063 21.784-.002-.084 6.698-.2 13.396-.348 20.094z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#x)"
                    ></path>
                </g>
                <g transform="translate(78 42.118)">
                    <mask id="z" fill="#fff"><use xlink:href="#y"></use></mask>
                    <path d="M22.886 71.61c-7.261.19-14.521.317-21.783.381.292-24.046.179-48.092-.34-72.139 7.034.112 14.067.338 21.1.678a687.766 687.766 0 0 1 1.023 71.08" fill="#FEC19B" mask="url(#z)"></path>
                </g>
                <g transform="translate(78 42.118)">
                    <mask id="B" fill="#fff"><use xlink:href="#A"></use></mask>
                    <path
                        d="M22.886 71.61c-7.261.19-14.521.317-21.783.381.292-24.046.179-48.092-.34-72.139 7.034.112 14.067.338 21.1.678a687.766 687.766 0 0 1 1.023 71.08z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#B)"
                    ></path>
                </g>
                <g transform="translate(78 113.118)">
                    <mask id="D" fill="#fff"><use xlink:href="#C"></use></mask>
                    <path d="M21.862 20.41c-7.032.34-14.065.564-21.099.677.145-6.699.258-13.398.34-20.096C8.363.928 15.624.801 22.884.61c-.245 6.6-.586 13.2-1.023 19.8" fill="#F9979A" mask="url(#D)"></path>
                </g>
                <g transform="translate(78 113.118)">
                    <mask id="F" fill="#fff"><use xlink:href="#E"></use></mask>
                    <path
                        d="M21.862 20.41c-7.032.34-14.065.564-21.099.677.145-6.699.258-13.398.34-20.096C8.363.928 15.624.801 22.884.61c-.245 6.6-.586 13.2-1.023 19.8z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#F)"
                    ></path>
                </g>
                <g transform="translate(99 43.118)">
                    <mask id="H" fill="#fff"><use xlink:href="#G"></use></mask>
                    <path d="M23.67 69.843c-7.261.319-14.522.575-21.784.767A686.946 686.946 0 0 0 .862-.47C7.895-.131 14.926.322 21.959.889a388.06 388.06 0 0 1 1.71 68.954" fill="#E8ACDD" mask="url(#H)"></path>
                </g>
                <g transform="translate(99 43.118)">
                    <mask id="J" fill="#fff"><use xlink:href="#I"></use></mask>
                    <path
                        d="M23.67 69.843c-7.261.319-14.522.575-21.784.767A686.946 686.946 0 0 0 .862-.47C7.895-.131 14.926.322 21.959.889a388.06 388.06 0 0 1 1.71 68.954z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#J)"
                    ></path>
                </g>
                <g transform="translate(99 112.118)">
                    <mask id="L" fill="#fff"><use xlink:href="#K"></use></mask>
                    <path d="M21.959 20.052A657.303 657.303 0 0 1 .862 21.409c.437-6.6.779-13.2 1.024-19.8A1247.86 1247.86 0 0 0 23.67.844a391.449 391.449 0 0 1-1.711 19.209" fill="#94E09E" mask="url(#L)"></path>
                </g>
                <g transform="translate(99 112.118)">
                    <mask id="N" fill="#fff"><use xlink:href="#M"></use></mask>
                    <path
                        d="M21.959 20.052A657.303 657.303 0 0 1 .862 21.409c.437-6.6.779-13.2 1.024-19.8A1247.86 1247.86 0 0 0 23.67.844a391.449 391.449 0 0 1-1.711 19.209z"
                        stroke="#6D7A82"
                        stroke-width="2"
                        stroke-linecap="round"
                        mask="url(#N)"
                    ></path>
                </g>
            </g>
        </svg>
    </span>
    <div wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_cMDj enRcg_eQnG">Beginning of Your To-Do History</div>
    <div wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_ycrn enRcg_eQnG">You've scrolled back to your very first To-Do!</div>
</div>


{{-- Phan task detail --}}


<div class="Day-styles__root planner-day">
    <h2 class="fOyUs_bGBk blnAQ_bGBk blnAQ_cVrl blnAQ_drOs"><div class="Day-styles__secondary">Wednesday, September 13, 2023</div></h2>
    <div>
        <div class="Grouping-styles__root planner-grouping" style="--bDBte-titleColor: #199eb7;">
            <div class="NotificationBadge-styles__activityIndicator NotificationBadge-styles__hasBadge">
                <div><span class="fOyUs_bGBk fOyUs_cuDs cECYn_bGBk cECYn_KksD cECYn_bXiG cECYn_dDWY cECYn_bXgF cECYn_bBTa"></span><span class="ergWt_bGBk">New activity for Đồ án cơ sở học kỳ I năm học 2023 - 2024</span></div>
            </div>
            <a href="/courses/7095" class="Grouping-styles__hero Grouping-styles__heroHover" style="background-image: url('');">
                <span class="Grouping-styles__overlay" style="background-color: rgb(25, 158, 183);"></span><span class="Grouping-styles__title">Đồ án cơ sở học kỳ I năm học 2023 - 2024</span>
            </a>
            <ol class="Grouping-styles__items" style="border-color: rgb(25, 158, 183);">
                <li>
                    <div class="PlannerItem-styles__root planner-item">
                        <div class="PlannerItem-styles__completed">
                            <div class="epRMX_bGBk">
                                <input id="uUx7fkmVLYCK" type="checkbox" class="epRMX_cwos" value="" />
                                <label for="uUx7fkmVLYCK" class="epRMX_bOnW">
                                    <span class="yyQPt_bGBk yyQPt_ycrn" style="--yyQPt-borderColor: #199eb7; --yyQPt-checkedBackground: #199eb7; --yyQPt-checkedBorderColor: #199eb7; --yyQPt-hoverBorderColor: #199eb7;">
                                        <span class="yyQPt_cSXm" aria-hidden="true"></span><span class="yyQPt_blJt"><span class="ergWt_bGBk">Announcement [Quan trọng] Danh sách phân công hướng dẫn ĐACS is not marked as done.</span></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="PlannerItem-styles__icon" aria-hidden="true" style="color: rgb(25, 158, 183);">
                            <svg
                                name="IconAnnouncement"
                                viewBox="0 0 1920 1920"
                                rotate="0"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                role="presentation"
                                focusable="false"
                                class="dUOHu_bGBk dUOHu_drOs dUOHu_eXrk cGqzL_bGBk cGqzL_owrh"
                                style="width: 1em; height: 1em;"
                            >
                                <g role="presentation">
                                    <path
                                        d="M1587.16235,31.2784941 C1598.68235,7.78672942 1624.43294,-4.41091764 1650.63529,1.46202354 C1676.16,7.56084707 1694.11765,30.2620235 1694.11765,56.4643765 L1694.11765,56.4643765 L1694.11765,570.459671 C1822.87059,596.662024 1920,710.732612 1920,847.052612 C1920,983.372612 1822.87059,1097.55614 1694.11765,1123.75849 L1694.11765,1123.75849 L1694.11765,1637.64085 C1694.11765,1663.8432 1676.16,1686.65732 1650.63529,1692.6432 C1646.23059,1693.65967 1641.93882,1694.11144 1637.64706,1694.11144 C1616.52706,1694.11144 1596.87529,1682.36555 1587.16235,1662.93967 C1379.23765,1247.2032 964.178824,1242.34673 960,1242.34673 L960,1242.34673 L564.705882,1242.34673 L564.705882,1807.05261 L652.461176,1807.05261 C640.602353,1716.92555 634.955294,1560.05026 715.934118,1456.37026 C768.338824,1389.2832 845.590588,1355.28791 945.882353,1355.28791 L945.882353,1355.28791 L945.882353,1468.22908 C881.392941,1468.22908 835.312941,1487.09026 805.044706,1525.71614 C736.263529,1613.58438 759.981176,1789.54673 774.776471,1849.97026 C778.955294,1866.79849 775.115294,1884.6432 764.498824,1898.30908 C753.769412,1911.97496 737.28,1919.99379 720,1919.99379 L720,1919.99379 L508.235294,1919.99379 C477.063529,1919.99379 451.764706,1894.80791 451.764706,1863.5232 L451.764706,1863.5232 L451.764706,1242.34673 L395.294118,1242.34673 C239.548235,1242.34673 112.941176,1115.73967 112.941176,959.993788 L112.941176,959.993788 L112.941176,903.5232 L56.4705882,903.5232 C25.2988235,903.5232 0,878.337318 0,847.052612 C0,815.880847 25.2988235,790.582024 56.4705882,790.582024 L56.4705882,790.582024 L112.941176,790.582024 L112.941176,734.111435 C112.941176,578.478494 239.548235,451.758494 395.294118,451.758494 L395.294118,451.758494 L959.887059,451.758494 C976.828235,451.645553 1380.36706,444.756141 1587.16235,31.2784941 Z M1581.17647,249.706729 C1386.46588,492.078494 1128.96,547.871435 1016.47059,560.746729 L1016.47059,560.746729 L1016.47059,1133.47144 C1128.96,1146.34673 1386.46588,1202.02673 1581.17647,1444.51144 L1581.17647,1444.51144 Z M903.529412,564.699671 L395.294118,564.699671 C301.891765,564.699671 225.882353,640.709082 225.882353,734.111435 L225.882353,734.111435 L225.882353,959.993788 C225.882353,1053.39614 301.891765,1129.40555 395.294118,1129.40555 L395.294118,1129.40555 L903.529412,1129.40555 L903.529412,564.699671 Z M1694.11765,688.144376 L1694.11765,1006.07379 C1759.73647,982.694965 1807.05882,920.577318 1807.05882,847.052612 C1807.05882,773.527906 1759.73647,711.5232 1694.11765,688.144376 L1694.11765,688.144376 Z"
                                        fill-rule="evenodd"
                                        stroke="none"
                                        stroke-width="1"
                                    ></path>
                                </g>
                            </svg>
                        </div>
                        <div class="PlannerItem-styles__layout">
                            <div class="PlannerItem-styles__innerLayout">
                                <div class="PlannerItem-styles__details PlannerItem-styles__details_no_badges">
                                    <div class="PlannerItem-styles__type">
                                        <span color="secondary" wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG enRcg_bLsb">Đồ án cơ sở học kỳ I năm học 2023 - 2024 Announcement</span>
                                    </div>
                                    <a href="/courses/7095/discussion_topics/25755" class="fOyUs_bGBk fbyHH_bGBk fbyHH_bSMN">
                                        <span class="ergWt_bGBk">Announcement [Quan trọng] Danh sách phân công hướng dẫn ĐACS posted Wednesday, September 13, 2023 11:33 AM.</span>
                                        <span aria-hidden="true">[Quan trọng] Danh sách phân công hướng dẫn ĐACS</span>
                                    </a>
                                </div>
                                <div class="PlannerItem-styles__secondary PlannerItem-styles__secondary_no_badges">
                                    <div class="PlannerItem-styles__badges"></div>
                                    <div class="PlannerItem-styles__metrics">
                                        <div class="PlannerItem-styles__due">
                                            <span wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG"><span aria-hidden="true">11:33 AM</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="PlannerItem-styles__root planner-item">
                        <div class="PlannerItem-styles__completed">
                            <div class="epRMX_bGBk">
                                <input id="uKyfYgUuzDUT" type="checkbox" class="epRMX_cwos" value="" />
                                <label for="uKyfYgUuzDUT" class="epRMX_bOnW">
                                    <span class="yyQPt_bGBk yyQPt_ycrn" style="--yyQPt-borderColor: #199eb7; --yyQPt-checkedBackground: #199eb7; --yyQPt-checkedBorderColor: #199eb7; --yyQPt-hoverBorderColor: #199eb7;">
                                        <span class="yyQPt_cSXm" aria-hidden="true"></span>
                                        <span class="yyQPt_blJt"><span class="ergWt_bGBk">Announcement Link vào nhóm Zalo đồ án cơ sở cho các SV thầy Phạm Ngọc Hưng hướng dẫn is not marked as done.</span></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="PlannerItem-styles__icon" aria-hidden="true" style="color: rgb(25, 158, 183);">
                            <svg
                                name="IconAnnouncement"
                                viewBox="0 0 1920 1920"
                                rotate="0"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                role="presentation"
                                focusable="false"
                                class="dUOHu_bGBk dUOHu_drOs dUOHu_eXrk cGqzL_bGBk cGqzL_owrh"
                                style="width: 1em; height: 1em;"
                            >
                                <g role="presentation">
                                    <path
                                        d="M1587.16235,31.2784941 C1598.68235,7.78672942 1624.43294,-4.41091764 1650.63529,1.46202354 C1676.16,7.56084707 1694.11765,30.2620235 1694.11765,56.4643765 L1694.11765,56.4643765 L1694.11765,570.459671 C1822.87059,596.662024 1920,710.732612 1920,847.052612 C1920,983.372612 1822.87059,1097.55614 1694.11765,1123.75849 L1694.11765,1123.75849 L1694.11765,1637.64085 C1694.11765,1663.8432 1676.16,1686.65732 1650.63529,1692.6432 C1646.23059,1693.65967 1641.93882,1694.11144 1637.64706,1694.11144 C1616.52706,1694.11144 1596.87529,1682.36555 1587.16235,1662.93967 C1379.23765,1247.2032 964.178824,1242.34673 960,1242.34673 L960,1242.34673 L564.705882,1242.34673 L564.705882,1807.05261 L652.461176,1807.05261 C640.602353,1716.92555 634.955294,1560.05026 715.934118,1456.37026 C768.338824,1389.2832 845.590588,1355.28791 945.882353,1355.28791 L945.882353,1355.28791 L945.882353,1468.22908 C881.392941,1468.22908 835.312941,1487.09026 805.044706,1525.71614 C736.263529,1613.58438 759.981176,1789.54673 774.776471,1849.97026 C778.955294,1866.79849 775.115294,1884.6432 764.498824,1898.30908 C753.769412,1911.97496 737.28,1919.99379 720,1919.99379 L720,1919.99379 L508.235294,1919.99379 C477.063529,1919.99379 451.764706,1894.80791 451.764706,1863.5232 L451.764706,1863.5232 L451.764706,1242.34673 L395.294118,1242.34673 C239.548235,1242.34673 112.941176,1115.73967 112.941176,959.993788 L112.941176,959.993788 L112.941176,903.5232 L56.4705882,903.5232 C25.2988235,903.5232 0,878.337318 0,847.052612 C0,815.880847 25.2988235,790.582024 56.4705882,790.582024 L56.4705882,790.582024 L112.941176,790.582024 L112.941176,734.111435 C112.941176,578.478494 239.548235,451.758494 395.294118,451.758494 L395.294118,451.758494 L959.887059,451.758494 C976.828235,451.645553 1380.36706,444.756141 1587.16235,31.2784941 Z M1581.17647,249.706729 C1386.46588,492.078494 1128.96,547.871435 1016.47059,560.746729 L1016.47059,560.746729 L1016.47059,1133.47144 C1128.96,1146.34673 1386.46588,1202.02673 1581.17647,1444.51144 L1581.17647,1444.51144 Z M903.529412,564.699671 L395.294118,564.699671 C301.891765,564.699671 225.882353,640.709082 225.882353,734.111435 L225.882353,734.111435 L225.882353,959.993788 C225.882353,1053.39614 301.891765,1129.40555 395.294118,1129.40555 L395.294118,1129.40555 L903.529412,1129.40555 L903.529412,564.699671 Z M1694.11765,688.144376 L1694.11765,1006.07379 C1759.73647,982.694965 1807.05882,920.577318 1807.05882,847.052612 C1807.05882,773.527906 1759.73647,711.5232 1694.11765,688.144376 L1694.11765,688.144376 Z"
                                        fill-rule="evenodd"
                                        stroke="none"
                                        stroke-width="1"
                                    ></path>
                                </g>
                            </svg>
                        </div>
                        <div class="PlannerItem-styles__layout">
                            <div class="PlannerItem-styles__innerLayout">
                                <div class="PlannerItem-styles__details PlannerItem-styles__details_no_badges">
                                    <div class="PlannerItem-styles__type">
                                        <span color="secondary" wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG enRcg_bLsb">Đồ án cơ sở học kỳ I năm học 2023 - 2024 Announcement</span>
                                    </div>
                                    <a href="/courses/7095/discussion_topics/25768" class="fOyUs_bGBk fbyHH_bGBk fbyHH_bSMN">
                                        <span class="ergWt_bGBk">Announcement Link vào nhóm Zalo đồ án cơ sở cho các SV thầy Phạm Ngọc Hưng hướng dẫn posted Wednesday, September 13, 2023 1:42 PM.</span>
                                        <span aria-hidden="true">Link vào nhóm Zalo đồ án cơ sở cho các SV thầy Phạm Ngọc Hưng hướng dẫn</span>
                                    </a>
                                </div>
                                <div class="PlannerItem-styles__secondary PlannerItem-styles__secondary_no_badges">
                                    <div class="PlannerItem-styles__badges"></div>
                                    <div class="PlannerItem-styles__metrics">
                                        <div class="PlannerItem-styles__due">
                                            <span wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG"><span aria-hidden="true">1:42 PM</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="PlannerItem-styles__root planner-item">
                        <div class="PlannerItem-styles__completed">
                            <div class="epRMX_bGBk">
                                <input id="ukGHCGTYpaLn" type="checkbox" class="epRMX_cwos" value="" />
                                <label for="ukGHCGTYpaLn" class="epRMX_bOnW">
                                    <span class="yyQPt_bGBk yyQPt_ycrn" style="--yyQPt-borderColor: #199eb7; --yyQPt-checkedBackground: #199eb7; --yyQPt-checkedBorderColor: #199eb7; --yyQPt-hoverBorderColor: #199eb7;">
                                        <span class="yyQPt_cSXm" aria-hidden="true"></span><span class="yyQPt_blJt"><span class="ergWt_bGBk">Announcement Meeting: 01. GV Trịnh Thanh Bình is not marked as done.</span></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="PlannerItem-styles__icon" aria-hidden="true" style="color: rgb(25, 158, 183);">
                            <svg
                                name="IconAnnouncement"
                                viewBox="0 0 1920 1920"
                                rotate="0"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                role="presentation"
                                focusable="false"
                                class="dUOHu_bGBk dUOHu_drOs dUOHu_eXrk cGqzL_bGBk cGqzL_owrh"
                                style="width: 1em; height: 1em;"
                            >
                                <g role="presentation">
                                    <path
                                        d="M1587.16235,31.2784941 C1598.68235,7.78672942 1624.43294,-4.41091764 1650.63529,1.46202354 C1676.16,7.56084707 1694.11765,30.2620235 1694.11765,56.4643765 L1694.11765,56.4643765 L1694.11765,570.459671 C1822.87059,596.662024 1920,710.732612 1920,847.052612 C1920,983.372612 1822.87059,1097.55614 1694.11765,1123.75849 L1694.11765,1123.75849 L1694.11765,1637.64085 C1694.11765,1663.8432 1676.16,1686.65732 1650.63529,1692.6432 C1646.23059,1693.65967 1641.93882,1694.11144 1637.64706,1694.11144 C1616.52706,1694.11144 1596.87529,1682.36555 1587.16235,1662.93967 C1379.23765,1247.2032 964.178824,1242.34673 960,1242.34673 L960,1242.34673 L564.705882,1242.34673 L564.705882,1807.05261 L652.461176,1807.05261 C640.602353,1716.92555 634.955294,1560.05026 715.934118,1456.37026 C768.338824,1389.2832 845.590588,1355.28791 945.882353,1355.28791 L945.882353,1355.28791 L945.882353,1468.22908 C881.392941,1468.22908 835.312941,1487.09026 805.044706,1525.71614 C736.263529,1613.58438 759.981176,1789.54673 774.776471,1849.97026 C778.955294,1866.79849 775.115294,1884.6432 764.498824,1898.30908 C753.769412,1911.97496 737.28,1919.99379 720,1919.99379 L720,1919.99379 L508.235294,1919.99379 C477.063529,1919.99379 451.764706,1894.80791 451.764706,1863.5232 L451.764706,1863.5232 L451.764706,1242.34673 L395.294118,1242.34673 C239.548235,1242.34673 112.941176,1115.73967 112.941176,959.993788 L112.941176,959.993788 L112.941176,903.5232 L56.4705882,903.5232 C25.2988235,903.5232 0,878.337318 0,847.052612 C0,815.880847 25.2988235,790.582024 56.4705882,790.582024 L56.4705882,790.582024 L112.941176,790.582024 L112.941176,734.111435 C112.941176,578.478494 239.548235,451.758494 395.294118,451.758494 L395.294118,451.758494 L959.887059,451.758494 C976.828235,451.645553 1380.36706,444.756141 1587.16235,31.2784941 Z M1581.17647,249.706729 C1386.46588,492.078494 1128.96,547.871435 1016.47059,560.746729 L1016.47059,560.746729 L1016.47059,1133.47144 C1128.96,1146.34673 1386.46588,1202.02673 1581.17647,1444.51144 L1581.17647,1444.51144 Z M903.529412,564.699671 L395.294118,564.699671 C301.891765,564.699671 225.882353,640.709082 225.882353,734.111435 L225.882353,734.111435 L225.882353,959.993788 C225.882353,1053.39614 301.891765,1129.40555 395.294118,1129.40555 L395.294118,1129.40555 L903.529412,1129.40555 L903.529412,564.699671 Z M1694.11765,688.144376 L1694.11765,1006.07379 C1759.73647,982.694965 1807.05882,920.577318 1807.05882,847.052612 C1807.05882,773.527906 1759.73647,711.5232 1694.11765,688.144376 L1694.11765,688.144376 Z"
                                        fill-rule="evenodd"
                                        stroke="none"
                                        stroke-width="1"
                                    ></path>
                                </g>
                            </svg>
                        </div>
                        <div class="PlannerItem-styles__layout">
                            <div class="PlannerItem-styles__innerLayout">
                                <div class="PlannerItem-styles__details">
                                    <div class="PlannerItem-styles__type">
                                        <span color="secondary" wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG enRcg_bLsb">Đồ án cơ sở học kỳ I năm học 2023 - 2024 Announcement</span>
                                    </div>
                                    <a href="/courses/7095/discussion_topics/25778" class="fOyUs_bGBk fbyHH_bGBk fbyHH_bSMN">
                                        <span class="ergWt_bGBk">Announcement Meeting: 01. GV Trịnh Thanh Bình posted Wednesday, September 13, 2023 5:16 PM.</span><span aria-hidden="true">Meeting: 01. GV Trịnh Thanh Bình</span>
                                    </a>
                                </div>
                                <div class="PlannerItem-styles__secondary">
                                    <div class="PlannerItem-styles__badges">
                                        <ul class="BadgeList-styles__root">
                                            <li class="BadgeList-styles__item">
                                                <span
                                                    class="fOyUs_bGBk fOyUs_fKyb fOyUs_cuDs fOyUs_cBHs fOyUs_eWbJ fOyUs_fmDy fOyUs_beQo fOyUs_cBtr fOyUs_fuTR fOyUs_cnfU"
                                                    style="padding: 0px; border-radius: 999em; border-width: 0px; max-width: 15rem;"
                                                >
                                                    <span class="dLyYq_bGBk dLyYq_bXiG">
                                                        <span class="dLyYq_eWKC">
                                                            <span class="bjXfh_daKB"><span>Replies</span></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="PlannerItem-styles__metrics">
                                        <div class="PlannerItem-styles__due">
                                            <span wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG"><span aria-hidden="true">5:16 PM</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="Day-styles__root planner-day">
    <h2 class="fOyUs_bGBk blnAQ_bGBk blnAQ_cVrl blnAQ_drOs"><div class="Day-styles__secondary">Tuesday, September 19, 2023</div></h2>
    <div>
        <div class="Grouping-styles__root planner-grouping" style="--bDBte-titleColor: #199eb7;">
            <div class="NotificationBadge-styles__activityIndicator NotificationBadge-styles__hasBadge">
                <div><span class="fOyUs_bGBk fOyUs_cuDs cECYn_bGBk cECYn_KksD cECYn_zGXc cECYn_dDWY cECYn_bXgF cECYn_bBTa"></span><span class="ergWt_bGBk">Missing items for Đồ án cơ sở học kỳ I năm học 2023 - 2024</span></div>
            </div>
            <a href="/courses/7095" class="Grouping-styles__hero Grouping-styles__heroHover" style="background-image: url('');">
                <span class="Grouping-styles__overlay" style="background-color: rgb(25, 158, 183);"></span><span class="Grouping-styles__title">Đồ án cơ sở học kỳ I năm học 2023 - 2024</span>
            </a>
            <ol class="Grouping-styles__items" style="border-color: rgb(25, 158, 183);">
                <li>
                    <div class="PlannerItem-styles__root planner-item">
                        <div class="PlannerItem-styles__completed">
                            <div class="epRMX_bGBk">
                                <input id="uLOKVynu2epj" type="checkbox" class="epRMX_cwos" value="" />
                                <label for="uLOKVynu2epj" class="epRMX_bOnW">
                                    <span class="yyQPt_bGBk yyQPt_ycrn" style="--yyQPt-borderColor: #199eb7; --yyQPt-checkedBackground: #199eb7; --yyQPt-checkedBorderColor: #199eb7; --yyQPt-hoverBorderColor: #199eb7;">
                                        <span class="yyQPt_cSXm" aria-hidden="true"></span><span class="yyQPt_blJt"><span class="ergWt_bGBk">Assignment Nộp kế hoạch dự án (nhóm thầy Tráng) is not marked as done.</span></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="PlannerItem-styles__icon" aria-hidden="true" style="color: rgb(25, 158, 183);">
                            <svg
                                name="IconAssignment"
                                viewBox="0 0 1920 1920"
                                rotate="0"
                                width="1em"
                                height="1em"
                                aria-hidden="true"
                                role="presentation"
                                focusable="false"
                                class="dUOHu_bGBk dUOHu_drOs dUOHu_eXrk cGqzL_bGBk cGqzL_owrh"
                                style="width: 1em; height: 1em;"
                            >
                                <g role="presentation">
                                    <path
                                        d="M1468.2137,0 L1468.2137,564.697578 L1355.27419,564.697578 L1355.27419,112.939516 L112.939516,112.939516 L112.939516,1807.03225 L1355.27419,1807.03225 L1355.27419,1581.15322 L1468.2137,1581.15322 L1468.2137,1919.97177 L2.5243549e-29,1919.97177 L2.5243549e-29,0 L1468.2137,0 Z M1597.64239,581.310981 C1619.77853,559.174836 1655.46742,559.174836 1677.60356,581.310981 L1677.60356,581.310981 L1903.4826,807.190012 C1925.5058,829.213217 1925.5058,864.902104 1903.4826,887.038249 L1903.4826,887.038249 L1225.8455,1564.67534 C1215.22919,1575.17872 1200.88587,1581.16451 1185.86491,1581.16451 L1185.86491,1581.16451 L959.985883,1581.16451 C928.814576,1581.16451 903.516125,1555.86606 903.516125,1524.69475 L903.516125,1524.69475 L903.516125,1298.81572 C903.516125,1283.79477 909.501919,1269.45145 920.005294,1258.94807 L920.005294,1258.94807 Z M1442.35055,896.29929 L1016.45564,1322.1942 L1016.45564,1468.225 L1162.48643,1468.225 L1588.38135,1042.33008 L1442.35055,896.29929 Z M677.637094,1242.34597 L677.637094,1355.28548 L338.818547,1355.28548 L338.818547,1242.34597 L677.637094,1242.34597 Z M903.516125,1016.46693 L903.516125,1129.40645 L338.818547,1129.40645 L338.818547,1016.46693 L903.516125,1016.46693 Z M1637.62298,701.026867 L1522.19879,816.451052 L1668.22958,962.481846 L1783.65377,847.057661 L1637.62298,701.026867 Z M1129.39516,338.829841 L1129.39516,790.587903 L338.818547,790.587903 L338.818547,338.829841 L1129.39516,338.829841 Z M1016.45564,451.769356 L451.758062,451.769356 L451.758062,677.648388 L1016.45564,677.648388 L1016.45564,451.769356 Z"
                                        fill-rule="evenodd"
                                        stroke="none"
                                        stroke-width="1"
                                    ></path>
                                </g>
                            </svg>
                        </div>
                        <div class="PlannerItem-styles__layout">
                            <div class="PlannerItem-styles__innerLayout">
                                <div class="PlannerItem-styles__details">
                                    <div class="PlannerItem-styles__type">
                                        <span color="secondary" wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG enRcg_bLsb">Đồ án cơ sở học kỳ I năm học 2023 - 2024 Assignment</span>
                                    </div>
                                    <a href="/courses/7095/assignments/56605" class="fOyUs_bGBk fbyHH_bGBk fbyHH_bSMN">
                                        <span class="ergWt_bGBk">Assignment Nộp kế hoạch dự án (nhóm thầy Tráng), due Tuesday, September 19, 2023 11:59 PM.</span><span aria-hidden="true">Nộp kế hoạch dự án (nhóm thầy Tráng)</span>
                                    </a>
                                </div>
                                <div class="PlannerItem-styles__secondary">
                                    <div class="PlannerItem-styles__badges">
                                        <ul class="BadgeList-styles__root">
                                            <li class="BadgeList-styles__item">
                                                <span
                                                    class="fOyUs_bGBk fOyUs_fKyb fOyUs_cuDs fOyUs_cBHs fOyUs_eWbJ fOyUs_fmDy fOyUs_beQo fOyUs_cBtr fOyUs_fuTR fOyUs_cnfU"
                                                    style="padding: 0px; border-radius: 999em; border-width: 0px; max-width: 15rem;"
                                                >
                                                    <span class="dLyYq_bGBk dLyYq_zGXc">
                                                        <span class="dLyYq_eWKC">
                                                            <span class="bjXfh_daKB"><span>Missing</span></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="PlannerItem-styles__metrics">
                                        <div class="PlannerItem-styles__due">
                                            <span wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_dfBC enRcg_eQnG"><span aria-hidden="true">Due: 11:59 PM</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="Day-styles__root planner-day planner-today"><h2 class="fOyUs_bGBk blnAQ_bGBk blnAQ_cVrl blnAQ_drOs blnAQ_kWwi"><div wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_cMDj enRcg_bdMA enRcg_eQnG">Tomorrow</div><div class="Day-styles__secondary">June 13</div></h2><div><span class="fOyUs_bGBk fOyUs_ImeN fOyUs_UeJS" style="margin: 0.75rem 0px 0px;">Nothing Planned Yet</span></div></div>
<div class="EmptyDays-styles__root planner-empty-days"><h2 class="fOyUs_bGBk blnAQ_bGBk blnAQ_cVrl blnAQ_drOs blnAQ_kWwi"><div wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_ycrn enRcg_dfDs enRcg_eQnG">June 15 to June 21</div></h2><div class="EmptyDays-styles__nothingPlannedContent"><svg role="img" aria-hidden="true" viewBox="0 0 907 155" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Nothing Planned</title><defs><path id="a" d="M0 155h906.934V.53H0z"></path><path id="c" d="M0 20.299V.389h60.079V20.3z"></path></defs><g fill="none" fill-rule="evenodd"><path d="M555.847.977s12.627 2.763 15.348 17.622c0 0 8.79-8.81 22.937-5.71M586.655 30.033s9.718.942 13.089 11.843c0 0 5.805-7.394 16.692-6.335M524.082 9.733s9.763.14 14.02 10.726c0 0 5.175-7.847 16.114-7.688" stroke="#231F20" stroke-width="2"></path><path fill="#67C1F0" d="M175.898 126.104h42.195l-21.097-62.596z"></path><path stroke="#231F20" stroke-width="2" d="M175.898 126.104h42.195l-21.097-62.596z"></path><path d="M196.996 82.564v70.691M206.372 110.49l-9.376 8.512" stroke="#0E1D25" stroke-width="2"></path><path fill="#67C1F0" d="M254.73 136.103h42.195l-21.097-84.88z"></path><path stroke="#231F20" stroke-width="2" d="M254.73 136.103h42.195l-21.097-84.88z"></path><path d="M275.828 80.54v72.716M283.641 118.203l-7.813 5.158M263.3 101.624l12.527 13.59" stroke="#0E1D25" stroke-width="2"></path><path stroke="#C0C6CB" stroke-width="2" d="M583.588 153.028L723.433 15.083l56.422 54.285"></path><path stroke="#C0C6CB" stroke-width="2" d="M685.627 152.88l129.11-116.62 52.09 45.893"></path><path fill="#9BE1A4" d="M857.589 113.192h48.093L881.636 7.272z"></path><path stroke="#231F20" stroke-width="2" d="M857.589 113.192h48.093L881.636 7.272z"></path><path d="M881.635 41.305V153.81M872.082 82.37l8.596 8.143M890.053 60.063l-8.418 11.507" stroke="#0E1D25" stroke-width="2"></path><path fill="#67C1F0" d="M827.092 126.14h42.196L848.19 63.545z"></path><path stroke="#231F20" stroke-width="2" d="M827.092 126.14h42.196L848.19 63.545z"></path><path d="M848.19 82.601v70.69M857.567 110.527l-9.377 8.512" stroke="#0E1D25" stroke-width="2"></path><g transform="translate(0 -.53)"><path d="M889.994 146.914c0 4.212-3.431 7.642-7.65 7.642h-16.02v-.782h16.02a6.86 6.86 0 0 0 6.868-6.86 6.862 6.862 0 0 0-7.65-6.82 6.335 6.335 0 0 0-.226-.759c.336-.047.672-.07 1.008-.07 4.219 0 7.65 3.43 7.65 7.65z" fill="#231F20"></path><path d="M882.343 140.046a6.862 6.862 0 0 1 6.869 6.868 6.86 6.86 0 0 1-6.869 6.861h-16.019l.095-.782h15.924c3.36 0 6.088-2.726 6.088-6.079a6.09 6.09 0 0 0-6.713-6.056 6.4 6.4 0 0 0-.155-.765 6.5 6.5 0 0 1 .78-.047" fill="#231F20"></path><path d="M881.562 140.093c.07.25.117.508.156.766-.25.031-.5.07-.742.125l-.094-.39-.086-.376c.25-.055.508-.102.766-.125" fill="#231F20"></path><path d="M881.531 144.391c.195-.72.289-1.47.289-2.22 0-.445-.031-.883-.102-1.312a6.088 6.088 0 0 1 6.712 6.055 6.087 6.087 0 0 1-6.087 6.08h-15.924l.015-.172 10.424-9.151 3.915.517h.008l.75.203z" fill="#9BE1A4"></path><path d="M881.562 140.093c-.258.023-.516.07-.766.125l-.17-.758c.233-.054.475-.1.71-.125.093.25.164.5.226.758" fill="#231F20"></path><path d="M881.718 140.859c.07.43.103.867.103 1.312 0 .75-.095 1.5-.29 2.22l-.75-.203a7.836 7.836 0 0 0 .258-2.017c0-.54-.054-1.07-.156-1.578l.093.39c.242-.054.492-.093.742-.124" fill="#9BE1A4"></path><path d="M880.883 140.593a8.035 8.035 0 0 1-.102 3.595h-.007l-.75-.204a7.105 7.105 0 0 0 .101-3.18l.664-.578c.039.117.063.242.094.367" fill="#9BE1A4"></path><path d="M880.789 140.218h.008l.086.375c-.032-.125-.055-.25-.094-.367v-.008zM880.773 144.188l-3.915-.517 3.267-2.867a7.12 7.12 0 0 1-.102 3.18l.75.204zM873.193 135.1c3.423 0 6.291 2.453 6.932 5.704l-3.267 2.867-9.689-1.265a6.064 6.064 0 0 0-1.032-.578c.18-3.744 3.275-6.728 7.056-6.728" fill="#9BE1A4"></path><path d="M876.858 143.671l-10.424 9.15 1.07-9.134.547-.555a6.008 6.008 0 0 0-.882-.727l9.69 1.266z" fill="#9BE1A4"></path><path d="M880.625 139.46l.172.758h-.008a7.833 7.833 0 0 0-7.596-5.9c-4.117 0-7.493 3.172-7.821 7.212a6.48 6.48 0 0 0-.766-.187c.415-4.368 4.11-7.806 8.587-7.806 3.767 0 6.979 2.43 8.143 5.798-.234.023-.477.07-.711.125" fill="#231F20"></path><path d="M873.193 135.1c-3.78 0-6.876 2.984-7.056 6.728a4.814 4.814 0 0 0-.765-.297c.328-4.04 3.704-7.212 7.821-7.212a7.834 7.834 0 0 1 7.596 5.899v.008l-.664.578c-.64-3.251-3.509-5.704-6.932-5.704" fill="#231F20"></path><path d="M867.505 143.687l-1.07 9.135-.196.172h-2.86a5.11 5.11 0 0 1-5.102-5.103 5.11 5.11 0 0 1 5.103-5.102 5.08 5.08 0 0 1 3.578 1.454l.547-.556z" fill="#9BE1A4"></path><path d="M867.169 142.406l-1.82-.234h.78c0-.118 0-.235.009-.344.359.156.703.35 1.03.578" fill="#231F20"></path><path fill="#9BE1A4" d="M866.434 152.822l-.016.172h-.179z"></path><path fill="#231F20" d="M866.419 152.994l-.094.78v-.78z"></path><mask id="b" fill="#fff"><use xlink:href="#a"></use></mask><path fill="#231F20" mask="url(#b)" d="M865.348 154.556h.977v-.781h-.977zM866.325 152.994v.78h-.977l.891-.78z"></path><path fill="#231F20" mask="url(#b)" d="M866.239 152.994l-.891.78v-.78zM866.138 141.827c-.009.11-.009.227-.009.345h-.78c0-.22.007-.43.022-.642.259.078.517.172.767.297"></path><path d="M865.372 141.53a8.428 8.428 0 0 0-.023.642h-.602c-.062-.024-.117-.032-.18-.047 0-.266.016-.524.039-.781.258.046.516.109.766.187" fill="#231F20" mask="url(#b)"></path><path d="M865.348 142.171l1.82.234c.313.211.61.453.883.727l-.547.555a5.811 5.811 0 0 0-2.758-1.516h.602zM864.747 142.171h-.18v-.047c.063.016.118.024.18.047" fill="#231F20" mask="url(#b)"></path><path d="M864.567 142.171h.18a5.816 5.816 0 0 1 2.758 1.516l-.547.555a5.085 5.085 0 0 0-3.578-1.454 5.11 5.11 0 0 0-5.103 5.103 5.108 5.108 0 0 0 5.103 5.102h1.968v.782h-1.96a5.89 5.89 0 0 1-5.893-5.884 5.89 5.89 0 0 1 5.892-5.884c.407 0 .797.04 1.18.117v.047z" fill="#231F20" mask="url(#b)"></path><path d="M863.38 154.556a6.671 6.671 0 0 1-6.666-6.665c0-3.672 2.993-6.665 6.666-6.665.414 0 .828.039 1.227.117-.024.258-.04.516-.04.781a5.864 5.864 0 0 0-1.18-.117c-3.25 0-5.892 2.634-5.892 5.884a5.89 5.89 0 0 0 5.893 5.884h1.96v.781h-1.968z" fill="#231F20" mask="url(#b)"></path></g><path stroke="#C0C6CB" stroke-width="2" d="M681.72 56.228l21.53 9.872 17.28-9.872 25.697 7.422 19.97-7.422M797.635 51.707l24.215 6.618 8.334-6.618"></path><g transform="translate(0 70.47)"><mask id="d" fill="#fff"><use xlink:href="#c"></use></mask><path d="M50.582 20.299H9.498C4.274 20.299 0 16.025 0 10.8v-.914C0 4.664 4.274.39 9.498.39h41.084c5.224 0 9.497 4.274 9.497 9.497v.914c0 5.224-4.273 9.498-9.497 9.498" fill="#E5E7E9" mask="url(#d)"></path></g><path d="M48.657 67.596c-.886 0-1.749.101-2.577.292v.014c-1.438-5.648-6.556-9.825-12.651-9.825-7.209 0-13.053 5.844-13.053 13.054l3.586 2.524a9.756 9.756 0 0 0-6.85-2.796c-5.407 0-9.79 4.383-9.79 9.79 0 5.407 4.383 9.791 9.79 9.791h31.545c6.309 0 11.422-5.114 11.422-11.422 0-6.308-5.113-11.422-11.422-11.422" fill="#E5E7E9"></path><path d="M39.017 77.802c0 6.98 5.658 12.638 12.638 12.638 6.98 0 12.637-5.658 12.637-12.638 0-6.98-5.658-12.638-12.637-12.638-6.98 0-12.638 5.659-12.638 12.638" fill="#E5E7E9"></path><path fill="#9BE1A4" d="M49.312 112.638h42.195L70.41 27.757z"></path><path stroke="#231F20" stroke-width="2" d="M49.312 112.638h42.195L70.41 27.757z"></path><path d="M78.223 94.737l-7.813 5.159M57.883 78.158l12.526 13.59" stroke="#0E1D25" stroke-width="2"></path><path d="M191.11 22.787c0-11.456 9.287-20.743 20.743-20.743 11.457 0 20.744 9.287 20.744 20.743 0 1.845-.24 3.633-.693 5.335M196.81 26.797a15.506 15.506 0 0 0-10.886-4.442c-8.592 0-15.557 6.965-15.557 15.558s6.965 15.558 15.557 15.558h50.128" stroke="#C0C6CB" stroke-width="2"></path><path d="M231.957 17.634a18.244 18.244 0 0 1 4.096-.465c10.024 0 18.15 8.128 18.15 18.152 0 10.023-8.126 18.15-18.15 18.15h-5.186" stroke="#C0C6CB" stroke-width="2"></path><path fill="#9BE1A4" d="M148.903 112.638h48.093L172.949 6.718z"></path><path stroke="#231F20" stroke-width="2" d="M148.903 112.638h48.093L172.949 6.718z"></path><path d="M172.949 40.75v112.506M70 55v99M161.052 81.817l8.596 8.142M181.368 59.509l-8.42 11.507" stroke="#0E1D25" stroke-width="2"></path><path fill="#FDBD99" d="M69.629 126.292l-10.331 2.735 4.067 2.735z"></path><path stroke="#231F20" stroke-width="2" d="M69.629 126.292l-10.331 2.735 4.067 2.735z"></path><path fill="#FDBD99" d="M172.949 128.448l2.949 9.772 3.516-4.114z"></path><path stroke="#231F20" stroke-width="2" d="M172.949 128.448l2.949 9.772 3.516-4.114z"></path><path d="M155.5 130.98a6.355 6.355 0 1 1-12.71 0 6.355 6.355 0 0 1 12.71 0" fill="#C0C6CB"></path><path d="M155.5 130.98a6.355 6.355 0 1 1-12.71 0 6.355 6.355 0 0 1 12.71 0z" stroke="#C0C6CB" stroke-width="2"></path><path d="M72.962 125.51s16.2 19.926 44.332 20.708c28.13.782 52.319-18.935 52.319-18.935s-41.38 8.006-51.538 7.22c-10.158-.787-45.113-8.992-45.113-8.992" fill="#FDBD99"></path><path d="M72.962 125.51s16.2 19.926 44.332 20.708c28.13.782 52.319-18.935 52.319-18.935s-41.38 8.006-51.538 7.22c-10.158-.787-45.113-8.992-45.113-8.992z" stroke="#231F20" stroke-width="2"></path></g></svg><div class="EmptyDays-styles__nothingPlannedContainer"><div class="EmptyDays-styles__nothingPlanned"><span wrap="normal" letter-spacing="normal" class="enRcg_bGBk enRcg_cMDj enRcg_eQnG">Nothing Planned Yet</span></div></div></div></div>
@endsection

@section('custom-js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
