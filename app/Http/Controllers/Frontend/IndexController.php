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
use App\Models\Quote;
use App\Models\Service;
use App\Models\ServiceList;
use App\Models\ServicesToChooseUs;
use App\Models\SocialInfo;
use App\Models\TeamMotto;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function home(){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $first_banner = MainBanner::where(['status'=>'active'])->orderBy('order_id', 'ASC')->first();
        $second_banner = MainBanner::where(['status'=>'active'])->orderBy('order_id', 'ASC')->skip(1)->first();
        $statistics_banner = OuterBanner::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->limit('3')->get();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $about_us = AboutUs::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->limit('8')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $how_it_works = HowItWorks::where(['status'=>'active'])->orderBy('order_id','ASC')->limit('4')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $team_motto = TeamMotto::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $our_partners = OurPartner::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        return view('frontend.index')->with([
            'logo'=>$logo,
            'first_banner'=>$first_banner,
            'second_banner'=>$second_banner,
            'statistics_banner'=>$statistics_banner,
            'our_help'=>$our_help,
            'all_our_help'=>$all_our_help,
            'about_us'=>$about_us,
            'service_lists'=>$service_lists,
            'all_service_lists'=>$all_service_lists,
            'how_it_works'=>$how_it_works,
            'member_details'=>$member_details,
            'team_motto'=>$team_motto,
            'our_partners'=>$our_partners,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
        ]);
    }

    public function about_us(){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $about_us = AboutUs::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $our_partners = OurPartner::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $why_choose_us = WhyChooseUs::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $services_choose = ServicesToChooseUs::where(['status'=>'active'])->orderBy('order_id','ASC')->limit('2')->get();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $quotes = Quote::where(['status'=>'active'])->orderBy('id','DESC')->get();
        return view('frontend.about_us')->with([
            'logo'=>$logo,
            'about_us'=>$about_us,
            'our_partners'=>$our_partners,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'why_choose_us'=>$why_choose_us,
            'services_choose'=>$services_choose,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
            'member_details'=>$member_details,
            'quotes'=>$quotes,
        ]);
    }

    public function our_team(){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $our_partners = OurPartner::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $team_motto = TeamMotto::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        return view('frontend.our_team')->with([
            'logo'=>$logo,
            'member_details'=>$member_details,
            'our_partners'=>$our_partners,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'team_motto'=>$team_motto,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
        ]);
    }
    
    public function team_details(Request $request){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $our_partners = OurPartner::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $member = MemberDetails::where(['status'=>'active', 'slug' => $request->slug])->first();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        return view('frontend.team_details')->with([
            'logo'=>$logo,
            'member'=>$member,
            'our_partners'=>$our_partners,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
            'member_details'=>$member_details,
        ]);
    }

    public function service(){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $our_partners = OurPartner::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->limit('3')->get();
        $service = Service::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->limit('6')->get();
        $how_it_works = HowItWorks::where(['status'=>'active'])->orderBy('order_id','ASC')->limit('4')->get();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $quotes = Quote::where(['status'=>'active'])->orderBy('id','DESC')->get();
        return view('frontend.service')->with([
            'logo'=>$logo,
            'our_help'=>$our_help,
            'service'=>$service,
            'service_lists'=>$service_lists,
            'how_it_works'=>$how_it_works,
            'our_partners'=>$our_partners,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
            'member_details'=>$member_details,
            'quotes'=>$quotes,
        ]);
    }

    public function it_solutions(Request $request){
        $id = $request->id;
        $slug = $request->slug;
        $help_id = OurHelp::find($id);
        if (!$help_id) {
            return redirect()->back();
            // return view('frontend.error');
        }
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $single_our_help = OurHelp::where(['status'=>'active', 'id' => $request->id])->first();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        return view('frontend.it_solutions')->with([
            'logo'=>$logo,
            'single_our_help'=>$single_our_help,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'member_details'=>$member_details,
        ]);
    }

    public function service_lists(Request $request){
        $id = $request->id;
        $slug = $request->slug;
        $help_id = ServiceList::find($id);
        if (!$help_id) {
            return redirect()->back();
            // return view('frontend.error');
        }
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $single_service_list = ServiceList::where(['status'=>'active', 'id' => $request->id])->first();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        $quotes = Quote::where(['status'=>'active'])->orderBy('id','DESC')->get();
        return view('frontend.service_lists')->with([
            'logo'=>$logo,
            'single_service_list'=>$single_service_list,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'member_details'=>$member_details,
            'quotes'=>$quotes,
        ]);
    }

    public function contact(Request $request){
        $logo = logo::where(['status'=>'active'])->orderBy('id', 'DESC')->first();
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $social_infos = SocialInfo::where(['status'=>'active'])->orderBy('order_id','ASC')->get();
        $footer = Footer::where(['status'=>'active'])->orderBy('id','DESC')->first();
        $all_our_help = OurHelp::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $all_service_lists = ServiceList::where(['status'=>'active'])->orderBy('order_id', 'ASC')->get();
        $member_details = MemberDetails::where(['status'=>'active'])->orderBy('id','DESC')->get();
        return view('frontend.contact')->with([
            'logo'=>$logo,
            'contact'=>$contact,
            'social_infos'=>$social_infos,
            'footer'=>$footer,
            'all_our_help'=>$all_our_help,
            'all_service_lists'=>$all_service_lists,
            'member_details'=>$member_details,
        ]);
    }

    public function send_message(Request $request){
        $data = ['name' => $request->first_name . ' ' . $request->last_name, 'data' => $request->message];
        $user['from'] = $request->email;
        $contact = Contact::where(['status'=>'active'])->orderBy('id','DESC')->first('email');
        $user['to'] = $contact->email;
        $user['subject'] = $request->subject;
        Mail::send('frontend.mail',$data,function($messages) use ($user){
            $messages ->to($user['to']);
            $messages ->from($user['from']);
            $messages->subject($user['subject']);
        });
        return redirect()->back()->with('success', 'Message sent succcessfully');
        
    }

}
