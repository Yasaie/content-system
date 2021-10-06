<?php

if(!function_exists('fileUpload')){
	/**
	 * upload files (single and multiple)
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param $inputName
	 * @param string $disk
	 * @return array|mixed
	 */
	function fileUpload(\Illuminate\Http\Request $request,$inputName,$disk='upload'){
		$files=[];
		$medias=[];
		$input=$request->file($inputName);

		if(!is_array($input)){
			$medias[]=$input;
		}else{
			$medias=$input;
		}

		foreach ($medias as $media) {
			$index=0;
			$name=pathInfo($media->getClientOriginalName(),PATHINFO_FILENAME);
			do{
				$fileName=$name.(!empty($index)?'_'.$index:'').'.'.$media->getClientOriginalExtension();
				$index++;
			}while(Storage::disk($disk)->exists($fileName));
			$fileName=preg_replace('/\s+/','-',$fileName);
			$files[]=$media->storeAs('', $fileName,$disk);
		}
		if(count($files)>1){
			//multi-file upload
			return $files;
		}
		//single file upload
		return $files[0];
	}
}

if(!function_exists('fileUploadRemove')){
	/**
	 * remove uploaded file (if exists)
	 *
	 * @param $fileName
	 * @param string $disk
	 * @return bool
	 */
	function fileUploadRemove($fileName,$disk='upload'){
		if(Storage::disk($disk)->exists($fileName)){
			Storage::disk($disk)->delete($fileName);
			return true;
		}
	}
}

if(!function_exists('fileUploadUrl')){
	/**
	 * retrieve uploaded file's URL (if exists)
	 *
	 * @param $fileName
	 * @param string $disk
	 * @return mixed
	 */
	function fileUploadUrl($fileName,$disk='upload'){
		if(Storage::disk($disk)->exists($fileName)){
			return Storage::disk($disk)->url($fileName);
		}
	}
}

if(!function_exists('fileUploadSize')){
	/**
	 * retrieve uploaded file's size (if exists)
	 *
	 * @param $fileName
	 * @param string $disk
	 * @return mixed
	 */
	function fileUploadSize($fileName,$disk='upload'){
		if(Storage::disk($disk)->exists($fileName)){
			return Storage::disk($disk)->size($fileName);
		}
	}
}
