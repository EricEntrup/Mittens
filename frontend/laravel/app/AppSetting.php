<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use DB;

class AppSetting extends Model implements HasMedia
{
	use HasMediaTrait;
    protected $table = 'app_setting';

    protected $fillable = ['site_name', 'site_email', 'site_logo', 'site_favicon','site_description','site_header_code','site_footer_code','site_copyright','facebook_comment_code','contact_title','contact_address','contact_email','contact_number','facebook_url','twitter_url','gplus_url','linkedin_url','our_vision','our_mission','about_us_video','google_map_api','slider_title','slider_status','slider_image'];

	 public $timestamps = false;


	protected function getData(){

		$data=	self::get()->first();

		if($data==null){
			$data=new self;
		}
		$data->site_logo=getSingleMedia($data,'site_logo');
		$data->site_favicon=getSingleMedia($data,'site_favicon');

		return $data;

	}

}
