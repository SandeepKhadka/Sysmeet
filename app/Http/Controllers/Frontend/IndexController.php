<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\HowItWorks;
use App\Models\logo;
use App\Models\MainBanner;
use App\Models\MemberDetails;
use App\Models\OurHelp;
use App\Models\OurPartner;
use App\Models\OuterBanner;
use App\Models\ServiceList;
use App\Models\SocialInfo;
use App\Models\TeamMotto;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $main_banners = MainBanner::where(['status'=>'active'])->orderBy('id', 'DESC')->get();
        $first_banner = MainBanner::where(['status'=>'active'])->orderBy('order_id', 'ASC')->first();
        $second_banner = MainBanner::where(['status'=>'active'])->orderBy('order_id', 'ASC')->skip(1)->first();
        $outer_banners = OuterBanner::where(['status'=>'active'])->orderBy('id', 'DESC')->get();
        $statistics_banner = OuterBanner::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->limit('3')->get();
        $about_us = AboutUs::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->limit('8')->get();
        $how_it_works = HowItWorks::where(['status'=>'active'])->orderBy('order_id','ASC')->limit('4')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $team_motto = TeamMotto::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $our_partners = OurPartner::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        return view('frontend.index')->with([
            'logo'=>$logo,
            'main_banners'=>$main_banners,
            'first_banner'=>$first_banner,
            'second_banner'=>$second_banner,
            'outer_banners'=>$outer_banners,
            'statistics_banner'=>$statistics_banner,
            'our_help'=>$our_help,
            'about_us'=>$about_us,
            'service_lists'=>$service_lists,
            'how_it_works'=>$how_it_works,
            'member_details'=>$member_details,
            'team_motto'=>$team_motto,
            'our_partners'=>$our_partners,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
        ]);
    }
}
