<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

// In this class will be stored all custom functions that can be used in the most of other classes
class CustomFunctions extends Model
{
    /**
     * Set new image name
     *
     * @param  \Illuminate\Http\Request $request
     * @return string $filename
     */
    public function createFilename($request, $file = 'image')
    {
        return ($request->hasFile($file)) ? str_replace(array('.',' '), array('',''), microtime()).".". $request->file($file)->guessClientExtension() : "";
    }

     /**
     * Upload the given image on the server
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  string $filename
     * @param  string $path
     * @param  string $file (*optional/default = 'image')
     */
    public function uploadImage($request, $filename, $path, $file = 'image')
    {
        // if image is uploaded
        if($request->hasFile($file)){
           
            $foldername = $this->createFolderName($path);

            $uploadImg = Image::make($request->file($file)->getRealPath())->save(public_path() . "/". $foldername . $filename);

            return $uploadImg;
        }

        return false;
    }

     /**
     * Create folder (if doesn't exist) where the images will be saved
     *
     * @return string $foldername
     */
    public function createFolderName($foldername)
    {
        if(file_exists($foldername) == false)
            Storage::makeDirectory($foldername, 0775, true);

        return $foldername;
    }

    /**
    * Check/create name url 
    * 
    * @param string $name
    * @param string $table_row 
    * @return string $titleString
    */
    public function checkNameUrl($name, $table, $table_row)
    {
        if(!is_null($name)){

            $find_url = strtolower(preg_replace('/[^A-Za-z]\p{L}]/u','-',str_replace(" ", "-", strip_tags($name))));

            $findIfExist = DB::table($table)->where($table_row,'LIKE',"%$find_url%");

            if($findIfExist->count() > 0)
            {
                $last_element = last($findIfExist->get());
                
                $urllastNum = substr(strrchr($last_element->$table_row, "-"), 1);

                if(is_numeric($urllastNum))
                {
                    $newNum = $urllastNum + 1;
                    return $find_url.'-'.$newNum;
                }else
                {
                    return $find_url.'-1';
                }
            }
        }

        return $find_url;
    }

     /**
     * Upload the given document on the server
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  string $filename
     * @param  string $path
     */
    public function uploadDocument($request, $filename, $path)
    {
        if($request->hasFile('document')){
           
            $foldername = $this->createFolderName($path);

            $docName = str_replace(str_split(' \\/:*?"+-;%&#@()$^<>|'), '_', $request->file('document')->getClientOriginalName());

            if(file_exists($path.$docName)) $docName = time().'-'.$docName;

            @move_uploaded_file($request->file('document')->getRealPath(), $path.$docName);

            return $docName;
        }

        return false;
    }
}
