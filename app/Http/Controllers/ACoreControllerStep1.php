<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleStep;
use App\Models\ModuleBlock;
use App\Models\Language;
use App\Models\Bsc;
use App\Models\Bsw;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic;
use DB;
use Session;


class ACoreControllerStep1 extends AController {
	public function add($moduleAlias, $parent) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();

		$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId(array('parent' => $parent));

		return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $newRowId));
	}

	public function addMultImages(Request $request, $moduleAlias, $parent, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where([['top_level', $moduleStep -> id], ['type', 'image']]) -> orderBy('rang', 'desc') -> first();

		$validated = $request->validate([
            'images' => 'required',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:10000',
        ]);

		foreach($request -> file('images') as $data) {
			$highestRang = DB :: table($moduleStep -> db_table)->max('rang');

			$newRowId = DB :: table($moduleStep -> db_table) -> insertGetId([
				'parent' => $id, 'rang' => $highestRang + 5 
			]);
			// dd($newRowId);
			$prefix = '';

			if($moduleBlocks -> prefix) {
				$prefix = $moduleBlocks -> prefix.'_';
			}

			$data -> storeAs('public/images/modules/'.$module -> alias.'/step_2', $prefix.$newRowId.'.'.$moduleBlocks -> file_format);	
			$imagePath = 'app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'.'.$moduleBlocks -> file_format;

			$image = ImageManagerStatic :: make(storage_path($imagePath));
			$width = $image -> width();
			$height = $image -> height();

			if($moduleBlocks -> fit_type === 'fit') {
				$image -> fit($moduleBlocks -> image_width,
								$moduleBlocks -> image_height,
								function() {},
								$moduleBlocks -> fit_position);
			}
			
			if($moduleBlocks -> fit_type === 'resize') {
				$image -> resize($moduleBlocks -> image_width,
									$moduleBlocks -> image_height,
									function ($constraint) {
									$constraint->aspectRatio();
									});
					
				if($width < $moduleBlocks -> image_width && $height < $moduleBlocks -> image_height) {
					$image = ImageManagerStatic :: make(storage_path($imagePath));																																			
				}
			}
			
			if($moduleBlocks -> fit_type === 'resize_with_bg') {
				if($width > $moduleBlocks -> image_width || $height > $moduleBlocks -> image_height) {
					$image -> resize($moduleBlocks -> image_width,
										$moduleBlocks -> image_height,
										function ($constraint) {
										$constraint->aspectRatio();
										});																																	
				}

				$image->resizeCanvas($moduleBlocks -> image_width, $moduleBlocks -> image_height, 'center', false, '#FFFFFF');
			}

			if($moduleBlocks -> fit_type === 'default') {
				$image = ImageManagerStatic :: make(storage_path($imagePath));
			}

			$image -> save();

			for($i = 1; $i < 4; $i++) {
				if($moduleBlocks -> { 'prefix_'.$i }) {
					$data -> storeAs('public/images/modules/'.$module -> alias.'/step_2', $prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format );

					if($moduleBlocks -> { 'fit_type_'.$i } === 'fit') {
						$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format)) -> fit($moduleBlocks -> { 'image_width_'.$i },
																																												$moduleBlocks -> { 'image_height_'.$i },
																																												function() {},
																																												$moduleBlocks -> fit_position);
					}
					
					if($moduleBlocks -> { 'fit_type_'.$i } === 'resize') {
						$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format)) -> resize($moduleBlocks -> { 'image_width_'.$i },
																																												$moduleBlocks -> { 'image_height_'.$i },
																																												function ($constraint) {
																																													$constraint->aspectRatio();
																																												});

						
						$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format)) -> width();
						$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format)) -> height();

						if($width < $moduleBlocks -> { 'image_width_'.$i } && $height < $moduleBlocks -> { 'image_height_'.$i }) {
							$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format));																																			
						}
					}

					if($moduleBlocks -> { 'fit_type_'.$i } === 'resize_with_bg') {
						if($width > $moduleBlocks -> { 'image_width_'.$i } || $height > $moduleBlocks -> { 'image_height_'.$i }) {
							$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format)) -> resize($moduleBlocks -> { 'image_width_'.$i },
																																																						$moduleBlocks -> { 'image_height_'.$i },
																																																						function ($constraint) {
																																																						$constraint->aspectRatio();
																																																						});																																	
						}
						
						$image-> resizeCanvas($moduleBlocks -> { 'image_width_'.$i }, $moduleBlocks -> { 'image_height_'.$i }, 'center', false, '#FFFFFF');
					}

					if($moduleBlocks -> { 'fit_type_'.$i } === 'default') {
						$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_2/'.$prefix.$newRowId.'_'.$moduleBlocks -> { 'prefix_'.$i }.'.'.$moduleBlocks -> file_format));
					}

					$image -> save();
				}
			}
		}

		return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id));
	}


	public function edit($moduleAlias, $parent, $id) {
		ACoreControllerStep2 :: deleteEmpty();

		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleParentStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();
		$pageData = DB :: table($moduleStep -> db_table) -> find($id);
		$pageParentData = DB :: table($moduleParentStep -> db_table) -> find($parent);

		// return print_r($pageData);

		$moduleBlock = ModuleBlock :: where('top_level', $moduleStep -> id) -> where('a_use_for_tags', 1) -> first();

		$use_for_tags = 'id';

		$activeSiteLang = Language :: where('like_default', 1) -> first();

		if($moduleBlock) {
			$use_for_tags = $moduleBlock -> db_column;

			if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
				$use_for_tags .= '_'.$activeSiteLang -> title;
			}
		}


		$prevId = 0;
		$nextId = 0;

		$prevIdIsSaved = false;
		$nextIdIsSaved = false;

		foreach(DB :: table($moduleStep -> db_table) -> orderBy('id') -> get() as $data) {
			if($nextIdIsSaved && !$nextId) {
				$nextId = $data -> id;
			}
			
			if($pageData -> id === $data -> id) {
				$prevIdIsSaved = true;
				$nextIdIsSaved = true;
			}
			
			if(!$prevIdIsSaved) {
				$prevId = $data -> id;
			}
		}

		
		$activeLang = Language :: where('like_default_for_admin', 1) -> first();

		
		$selectData = [];
		$selectOptgroudData = [];

		foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get() as $data) {
			if($data -> type === 'select') {
				$selectData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				foreach(DB :: table($data -> select_table) -> orderBy($data -> select_sort_by, $data -> select_sort_by_text) -> get() as $dataInside) {
					$selectData[$data -> db_column][$dataInside -> { $data -> select_search_column }] = $dataInside -> { $data -> select_option_text };
				}
			}
			
			if($data -> type === 'select_with_optgroup') {
				$selectOptgroudData[$data -> db_column][0] = '-- '.Bsw :: where('system_word', 'a_select') -> first() -> { 'word_'.$activeLang -> title }.' --';

				foreach(DB :: table($data -> select_optgroup_table) -> orderBy($data -> select_optgroup_sort_by, 'desc') -> get() as $dataInside) {
					foreach(DB :: table($data -> select_optgroup_2_table) -> orderBy($data -> select_optgroup_2_sort_by, 'desc') -> get() as $dataInsideTwice) {
						$selectOptgroudData[$data -> db_column] = array($dataInside -> { $data -> select_optgroup_text } => array($dataInside -> id => $dataInsideTwice -> { $data -> select_optgroup_2_text }, '124' => 'Lion'),
																		'tiger' => array('12' => 'Grizzle'),
																		'Dogs' => array('54' => 'Spaniel'));
					}
				}
			}
		}


		$use_for_sort = 'rang';

		$moduleStep1 = Module :: where('alias', $moduleAlias) -> first();
		$moduleStepStep1 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlockStep1 = ModuleBlock :: where('top_level', $moduleStepStep1 -> id) -> where('a_use_for_tags', 1) -> first();

		$moduleStep2 = ModuleStep :: where('top_level', $moduleStep1 -> id) -> orderBy('rang', 'desc') -> skip(2) -> take(1) -> first();
		

		$moduleStepTableData2 = false;

		$imageFormat = 'jpg';

		if($moduleStep2) {
			$moduleStepTableData2 = DB :: table($moduleStep2 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get();

			$moduleBlockForImage = ModuleBlock :: where('top_level', $moduleStep2 -> id) -> where('type', 'image') -> first();

			if($moduleBlockForImage) {
				$imageFormat = $moduleBlockForImage -> file_format;
			}
		}


		$data = array_merge(self :: getDefaultData(), ['module' => $module,
														'moduleStep' => $moduleStep,
														'moduleStepData' => DB :: table($moduleStep -> db_table) -> orderBy('rang', 'desc') -> get(),
														'moduleBlocks' => $moduleBlocks,
														'selectData' => $selectData,
														'selectOptgroudData' => $selectOptgroudData,
														'languages' => Language :: where('disable', 0) -> get(),
														'sortBy' => $use_for_sort,
														'id' => $id,
														'moduleStepTableData' => DB :: table($moduleStepStep1 -> db_table) -> where('parent', $id) ->  orderBy($use_for_sort, 'desc') -> get(),
														'moduleStep1Data' => $moduleStepStep1,
														'data' => $pageData,
														'imageFormat' => $imageFormat,
														'prevId' => $prevId,
														'nextId' => $nextId,
														'use_for_tags' => $use_for_tags,
														'parentData' => $pageParentData,
														'moduleStep2' => $moduleStep2,
														'moduleStepTableData2' => $moduleStepTableData2]);

		return view('modules.core.step2', $data);
	}


	public function update(Request $request, $moduleAlias, $parent, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		// Image - uploading image without checking it passed validation or not
			foreach($moduleBlocks as $data) {
				if($data -> type === 'image') {
					if($request -> hasFile($data -> db_column)) {
						$prefix = '';

						if($data -> prefix) {
							$prefix = $data -> prefix.'_';
						}
						
						$validator = Validator :: make($request -> all(), array(
							$data -> db_column => 'mimes:jpeg,jpg,png,gif|required|max:10000'
						));
						
						if($validator -> fails()) {
							return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id)) -> withErrors($validator) -> withInput();
						}

						$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_1', $prefix.$id.'.'.$data -> file_format);	
						
						$imagePath = 'app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'.'.$data -> file_format;

						$image = ImageManagerStatic :: make(storage_path($imagePath));
						$width = $image -> width();
						$height = $image -> height();

						if($data -> fit_type === 'fit') {
							$image -> fit($data -> image_width,
											$data -> image_height,
											function() {},
											$data -> fit_position);
						}
						
						if($data -> fit_type === 'resize') {
							$image -> resize($data -> image_width,
												$data -> image_height,
												function ($constraint) {
												$constraint->aspectRatio();
												});
								
							if($width < $data -> image_width && $height < $data -> image_height) {
								$image = ImageManagerStatic :: make(storage_path($imagePath));																																			
							}
						}
						
						if($data -> fit_type === 'resize_with_bg') {
							if($width > $data -> image_width || $height > $data -> image_height) {
								$image -> resize($data -> image_width,
													$data -> image_height,
													function ($constraint) {
													$constraint->aspectRatio();
													});																																	
							}

							$image->resizeCanvas($data -> image_width, $data -> image_height, 'center', false, '#FFFFFF');
						}

						if($data -> fit_type === 'default') {
							$image = ImageManagerStatic :: make(storage_path($imagePath));
						}

						$image -> save();

						for($i = 1; $i < 4; $i++) {
							if($data -> { 'prefix_'.$i }) {
								$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_1', $prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format );

								if($data -> { 'fit_type_'.$i } === 'fit') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> fit($data -> { 'image_width_'.$i },
																																															$data -> { 'image_height_'.$i },
																																															function() {},
																																															$data -> fit_position);
								}
								
								if($data -> { 'fit_type_'.$i } === 'resize') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> resize($data -> { 'image_width_'.$i },
																																															$data -> { 'image_height_'.$i },
																																															function ($constraint) {
																																																$constraint->aspectRatio();
																																															});

									$width = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> width();
									$height = ImageManagerStatic::make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> height();

									if($width < $data -> { 'image_width_'.$i } && $height < $data -> { 'image_height_'.$i }) {
										$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format));																																			
									}
								}

								if($data -> fit_type === 'resize_with_bg') {
									if($width > $data -> { 'image_width_'.$i } || $height > $data -> { 'image_height_'.$i }) {
										$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format)) -> resize($data -> { 'image_width_'.$i },
																																																									$data -> { 'image_height_'.$i },
																																																									function ($constraint) {
																																																									$constraint->aspectRatio();
																																																									});																																	
									}
									
									$image-> resizeCanvas($data -> { 'image_width_'.$i }, $data -> { 'image_height_'.$i }, 'center', false, '#FFFFFF');
								}

								if($data -> { 'fit_type_'.$i } === 'default') {
									$image = ImageManagerStatic :: make(storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format));
								}

								$image -> save();
							}
						}
					}
				}
			}
		// 

		// File - uploading file without checking it passed validation or not
			foreach($moduleBlocks as $data) {
				if($data -> type === 'file') {
					if($request -> hasFile($data -> db_column)) {
						$prefix = '';

						if($data -> prefix) {
							$prefix = $data -> prefix.'_';
						}

						$validator = Validator :: make($request -> all(), array(
							$data -> db_column => "required|mimes:".$data -> file_format."|max:10000"
						));

						if($validator -> fails()) {

							return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id)) -> withErrors($validator) -> withInput();
						}
						
						$request -> file($data -> db_column) -> storeAs('public/images/modules/'.$module -> alias.'/step_1', $prefix.$id.'.'.$data -> file_format);
					}
				}
			}
		// 

		// Validation
			$validationArray = [];

			foreach($moduleBlocks as $data) {
				$prefix = '';

				if($data -> prefix) {
					$prefix = $data -> prefix.'_';
				}
				
				$imagePath = storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'.'.$data -> file_format);
				
				if($data -> type === 'image' || $data -> type === 'file') {
					if(!file_exists($imagePath)){
						$validationArray[$data -> db_column] = $data -> validation;
					}
				} else {
					if($data -> type !== 'alias' && $data -> type !== 'input_with_languages' && $data -> type !== 'editor_with_languages') {
						$validationArray[$data -> db_column] = $data -> validation;
					} else {
						$validationData = [];

						foreach(Language :: where('disable', 0) -> get() as $langData) {
							$validationArray[$data -> db_column.'_'.$langData -> title] = $data -> validation;
						}
					}
				}
				
			}

			$validator = Validator :: make($request -> all(), $validationArray);

			if($validator -> fails()) {
				return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id)) -> withErrors($validator) -> withInput();
			}
		//

		$updateQuery = [];

		foreach($moduleBlocks as $data) {
			if($data -> type !== 'image'
				&& $data -> type !== 'file'
				&& $data -> type !== 'rang'
				&& $data -> type !== 'alias'
				&& $data -> type !== 'input_with_languages'
				&& $data -> type !== 'editor_with_languages'
				&& $data -> type !== 'checkbox'
				&& $data -> type !== 'multiply_checkboxes_with_category') {
				$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : '');
			}

			if($data -> type === 'alias') {
				foreach(Language :: where('disable', 0) -> get() as $langData) {
					$value = $request -> input($data -> db_column.'_'.$langData -> title);
					$value = preg_replace("/[^A-ZА-Яა-ჰ0-9 -]+/ui",
											'',
											$value);

					$value = mb_strtolower(trim($value));

					$symbols = array('     ', '    ', '   ', '  ', ' ', '.', ',', '!', '?', '=', '#', '%', '+', '*', '/', '_', '\'', '"');

					$replace_symbols = array('-', '-', '-', '-', '-', '-', '-', '', '-', '-', '', '', '-', '', '-', '-', '', '');

					$value = str_replace($symbols,
											$replace_symbols,
											$value);
											
					$updateQuery[$data -> db_column.'_'.$langData -> title] = $value;
				}
			}

			if($data -> type === 'input_with_languages') {
				foreach(Language :: where('disable', 0) -> get() as $langData) {
					$updateQuery[$data -> db_column.'_'.$langData -> title] = $request -> input($data -> db_column.'_'.$langData -> title);
				}
			}
			

			if($data -> type === 'editor_with_languages') {
				foreach(Language :: where('disable', 0) -> get() as $langData) {
					$updateQuery[$data -> db_column.'_'.$langData -> title] = $request -> input($data -> db_column.'_'.$langData -> title);
				}
			}

			
			if($data -> type === 'checkbox') {
				$updateQuery[$data -> db_column] = (!is_null($request -> input($data -> db_column)) ? $request -> input($data -> db_column) : 0);
			}
		}

		DB :: table($moduleStep -> db_table) -> where('id', $id) -> update($updateQuery);


		$request -> session() -> flash('successStatus', __('bsw.successStatus'));

		return redirect() -> route('coreEditStep1', array($module -> alias, $parent, $id));
	}

	
	public function delete($moduleAlias, $parent, $id) {
		$module = Module :: where('alias', $moduleAlias) -> first();
		$moduleStep = ModuleStep :: where('top_level', $module -> id) -> orderBy('rang', 'desc') -> skip(1) -> take(1) -> first();
		$moduleBlocks = ModuleBlock :: where('top_level', $moduleStep -> id) -> orderBy('rang', 'desc') -> get();

		foreach($moduleBlocks as $data) {
			$prefix = '';

			if($data -> prefix) {
				$prefix = $data -> prefix.'_';
			}
			
			$filePath = storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'.'.$data -> file_format);
			
			if(file_exists($filePath)) {
				for($i = 1; $i < 4; $i++) {
					$insideFilePath = storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$id.'_'.$data -> { 'prefix_'.$i }.'.'.$data -> file_format);

					if(file_exists($insideFilePath)) {
						unlink($insideFilePath);
					}
				}

				unlink($filePath);
			}
		}

		DB :: table($moduleStep -> db_table) -> delete($id);

		Session :: flash('successDeleteStatus', __('bsw.deleteSuccessStatus'));

		return redirect() -> route('coreEditStep0', array($module -> alias, $parent));
	}

	
	public static function deleteEmpty() {
		foreach(Module :: get() as $module) {
			foreach(ModuleStep :: where('top_level', $module -> id) -> skip(1) -> take(10) -> get() as $moduleStep) {
				foreach(DB :: table($moduleStep -> db_table) -> get() as $dbTableData) {
					$data = [];
					$validateRules = [];

					foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> get() as $moduleBlock) {
						if($moduleBlock -> validation) {
							if($moduleBlock -> type === 'alias' || $moduleBlock -> type === 'input_with_languages' || $moduleBlock -> type === 'editor_with_languages') {
								foreach(Language :: where('disable', 0) -> get() as $langData) {
									$validateRules[$moduleBlock -> db_column.'_'.$langData -> title] = $moduleBlock -> validation;
									$data[$moduleBlock -> db_column.'_'.$langData -> title] = $dbTableData -> { $moduleBlock -> db_column.'_'.$langData -> title };
								}
							} else {
								if($moduleBlock -> type !== 'image' && $moduleBlock -> type !== 'file') {
									$validateRules[$moduleBlock -> db_column] = $moduleBlock -> validation;
									$data[$moduleBlock -> db_column] = $dbTableData -> { $moduleBlock -> db_column };
								}
							}
						}
					}

					$validator = Validator :: make($data, $validateRules);

					if($validator -> fails()) {
						DB :: table($moduleStep -> db_table) -> delete($dbTableData -> id);

						// Delete files.
							foreach(ModuleBlock :: where('top_level', $moduleStep -> id) -> get() as $moduleBlock) {
								$prefix = '';
				
								if($moduleBlock -> prefix) {
									$prefix = $moduleBlock -> prefix.'_';
								}
								
								$filePath = storage_path('app/public/images/modules/'.$module -> alias.'/step_1/'.$prefix.$dbTableData -> id.'.'.$moduleBlock -> file_format);
		
								// dd($moduleBlock);
								
								if(file_exists($filePath)) {
									unlink($filePath);
								}
							}
						// 
					}
				}
			}
		}
	}
}