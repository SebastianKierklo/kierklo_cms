<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
use App\Models\Page_field;
use App\Models\Meta;

class PageController extends Controller
{
    public function postList(){
        try{
            $pages = Page::all();
        }catch (\Exception $ex){
            return [
                'message' => "Wystąpił błąd: ".$ex,
                'result' => false
            ];
        }
        return [
            'data' => [
                'langs' => config('languages.select'),
                'pages' => $pages
            ],
            'message' => "",
            'result' => true
        ];
    }

    public function getPage($id){
            try{
                $page = Page::where('id',$id)->with(['fields','fields.metas'])->first();
            }catch(\Exception $ex){
                return [
                    'message' => "Wystąpił błąd: ".$ex,
                    'result' => false
                ];
            }
            return [
                'data' => [
                    'langs' => config('languages.select'),
                    'pages' => $page
            ],
            'message' => "",
            'result' => true
        ];
    }

    public function postAdd(Request $request){
        DB::beginTransaction();
        try{
            $langs = config('languages.languages');
            $name = $request->input('name',null);
            $fields = $request->input('fields',null);

            $newPage = new Page();
            $newPage->name = $name;
            $newPage->save();

            foreach($fields as $field){
                $newField = new Page_field();
                $newField->name = $field['name'];
                $newField->type = $field['type'];
                $newField->page_id = $newPage->id;
                $newField->nullable = $field['nullable'];
                $newField->save();
                foreach ($langs as $lang){
                    $newMeta = new Meta();
                    $newMeta->value = 'new-field';
                    $newMeta->lang = $lang['slug'];
                    $newMeta->page_field_id = $newField->id;
                    $newMeta->save();
                }
            }

            DB::commit();
        }catch(\Exception $ex){
            DB::rollBack();
            return [
                'message' => "Wystąpił błąd: ".$ex,
                'result' => false
            ];
        }
        return [
            'message' => "Strona została dodana prawidłowo",
            'result' => true
        ];
    }
    public function postDelete($id){
        try{
            $page = Page::find($id);
            $page->delete();
        }catch(\Exception $ex){
            return [
                'message' => "Wystąpił błąd: ".$ex,
                'result' => false
            ];
        }
        return [
            'message' => "Strona została skasowana prawidłowo",
            'result' => true
        ];
    }

    public function postEdit(Request $request, $id){

    }

    public function setPageContent(Request $request){
        DB::beginTransaction();
        try{
            $pageRequest = $request->input('page',null);
            $page = Page::find($pageRequest['id']);
            $page->name = $pageRequest['name'];
            $page->save();
            foreach($pageRequest['fields'] as $field){
                foreach($field['metas'] as $item){
                    $meta = Meta::find($item['id']);
                    $meta->value = $item['value'];
                    $meta->save();
                }
            }
            DB::commit();
        }catch(\Exception $ex){
            DB::rollBack();
            return [
                'message' => "Wystąpił błąd: ".$ex,
                'result' => false
            ];
        }
        return [
            'message' => "Strona została zapisana prawidłowo",
            'result' => true
        ];
    }
}
