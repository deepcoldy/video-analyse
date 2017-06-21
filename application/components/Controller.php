<?php

use Intervention\Image\ImageManager;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    public function __construct($id,$module=null)
    {
        parent::__construct($id, $module);

        global $CONFIG;
    	if (!Yii::app()->session->get('user_login')) {
    		$this->redirect('/login/index');
    	}
//        RedisMultiStorage::config($CONFIG['RedisStorage']);     // 初始化redis
    }

    /**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	protected function doUploadImage()
	{
		global $CONFIG;
		$fileName = UPLOAD_PATH . uniqid() . '.jpg';
		$manager = new ImageManager(array('driver' => 'gd'));

		$img = $manager->make($_FILES['files']['tmp_name'])->orientate();

		if ($img->width() > $img->height()) {
			if ($img->height() > 400) {
				$img->resize(null, 400, function ($constraint) {
					$constraint->aspectRatio();
				});
			}
		} else {
			if ($img->width() > 400) {
				$img->resize(400, null, function ($constraint) {
					$constraint->aspectRatio();
				});
			}
		}
		$img->save($fileName);

		if (defined('ENV') && ENV == 'AWS') {
			$cfg = $CONFIG['CDN_SERVERS']['AWS_CDN'];
			$uploadService = new AwsUpload($cfg);
		} else {
			$uploadService = new AliyunUpload();
		}

		$uploadedFileName = 'dress_post/temp/'.uniqid().'.jpg';
		$uploadService->saveFileAs($fileName, $uploadedFileName, false);
		$uploadedUrl = Utility::getImageUrl($uploadedFileName);

		return $uploadedUrl;
	}

	public function isMenuOn($url)
	{
		$currentUrl = '/' . $this->id . '/' . $this->action->id;
		if ($url == $currentUrl) {
			return true;
		} else {
			return false;
		}
	}
}
